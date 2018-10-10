<?php
class ProjectDoc extends Controller {
	private $uploadsUrl;
	function ProjectDoc() {
		parent::Controller();
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->model('usermodel');
		$this->load->model('task_model');
		$this->load->model('doc_model');
		$this->load->model('xmlmodel');
		$this->load->model('news_model');
		$this->load->model('role_model');
		$this->load->helper('html');
		define("MINE",'0');
		define("TEAMATES",'1');
		define("SUBFILES",'0');
		define("STDFILES",'1');
		if(!defined("UPLOAD_TYPE_USER"))define("UPLOAD_TYPE_USER",'1');
		if(!defined("UPLOAD_TYPE_COMPUTER"))define("UPLOAD_TYPE_COMPUTER",'2');
		$this->uploadsUrl = ".".DIRECTORY_SEPARATOR."system".DIRECTORY_SEPARATOR."application".DIRECTORY_SEPARATOR."uploadedfile";
	}

	function index(){
		echo "hello";
	}

	/**
	 * 功能：ajax请求处理者
	 * @return none
	 */
	function handler(){
		$subNav = $this->input->post('subNav');
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
		if(!$this->instance_model->isInProject($insId,$userId,EXCLUDE_CREATOR)){
			$this->_viewObserver($insId);
		}else
		switch($subNav){
			case '1':
				$this->_viewMyDoc($insId,$userId);
				break;
			case '2':
				$this->_viewTeamatesDoc($insId,$userId);
				break;
			case '3':
				$this->_viewStandardDoc($insId);
				break;
			default:
				echo "sorry,something must be error";
				break;
		}
	}

	private function _viewObserver($insId){
		$this->load->view("project/docView/docObserver_view");
	}

	private function _viewMyDoc($insId,$userId){
		$data = $this->_dataFacMyDoc($insId,$userId);
		$this->load->view('project/docView/myDoc_view',$data);
	}

	private function _viewTeamatesDoc($insId,$userId){
		$data = $this->_dataFacTeamatesDoc($insId,$userId);
		$this->load->view('project/docView/teamatesDoc_view',$data);
	}

	private function _viewStandardDoc($insId){
		$data = $this->_dataFacStandardDoc($insId);
		$this->load->view('project/docView/standardDoc_view',$data);
	}


	/**
	 * Function: standarDoc View Data Factory
	 * @return array
	 */
	private function _dataFacStandardDoc($insId){
		$caseId = $this->casemodel->getCaseid($insId);
		if($this->instance_model->isInstructor($insId,$this->session->userdata("user_id"))){
			$tmp = $this->instance_model->getAllOutputFiles($insId);
		}else{
			$tmp = array();
			$tasks = $this->instance_model->getTasks($insId);
			foreach($tasks as $task){
				if(TASK_STATUS_COMPLETED == $this->task_model->getTaskStatus($insId,$task['taskid'])){
					$tmp2 = $this->task_model->getTaskOutputs($insId,$task['taskid']);
					if(empty($tmp)){
						$tmp = $tmp2;
					}
					else {
						foreach($tmp2 as $tmp1){
							array_push($tmp,$tmp1);
						}

					}
				}
			}
			/*			print_r($tmp);
			 exit;*/
		}
		/*$caseFolder = $this->casemodel->getCaseFolder($caseId);
		 $caseURL = $this->casemodel->getCaseURL();
		 $caseURL = substr_replace($caseURL,'',0,2);*/
		$data['stdFiles'] = $this->_systemizeStdDoc($tmp);
		if($this->instance_model->isPM($insId,$this->session->userdata('user_id')) == TRUE)
		$data['role'] = '0';
		else $data['role'] = '1';
		return $data;
	}

	/**
	 * Function :teamatesDoc view data factory
	 * @return array
	 */
	private function _dataFacTeamatesDoc($insId,$userId){
		return $this->_dataFacDoc($insId,$userId,TEAMATES);
	}

	/**
	 * Function: myDoc view data factory
	 * @return array
	 */
	private function _dataFacMyDoc($insId,$userId){
		return $this->_dataFacDoc($insId,$userId,MINE);
	}

	/**
	 * Function return systemized documentation which includes mine and teamates'
	 * @param int $insId			 : the project ID
	 * @param int $userId			 : the user ID
	 * @param MINE or TEAMATES $type : show which submitted files I wanted, MINE or teamates'
	 * @return array
	 */
	private function _dataFacDoc($insId,$userId,$type = MINE){
		if($this->instance_model->isPM($insId,$userId) == TRUE){
			$data['role'] = '1';
		}else $data['role'] = '0';
		$docs = $this->_dataFacOurDocs($insId,$userId,$type);
		$data['subFiles'] = $this->_systemizeSubDoc($docs);
		return $data;
	}

	private function _dataFacPath($caseId,$insId='0',$taskId='0'){
		$path = $this->uploadsUrl.DIRECTORY_SEPARATOR."case_".$caseId.DIRECTORY_SEPARATOR;
		if($insId == '0')
		return $path."standard".DIRECTORY_SEPARATOR;
		else{
			if($taskId == '0')return $path."ins_".$insId.DIRECTORY_SEPARATOR;
			else return $path."ins_".$insId.DIRECTORY_SEPARATOR."task_".$taskId.DIRECTORY_SEPARATOR;
		}
	}
	private function _dataFacTaskFile($insId,$taskId,$type){
		// submitted files
		if($type == SUBFILES){
			$tmp = $this->task_model->getSubmitsInTask($insId,$taskId);
			$data = $this->_systemizeSubDoc($tmp);
			// standard files
		}else if($type == STDFILES){
			if(TASK_STATUS_COMPLETED == $this->task_model->getTaskStatus($insId,$taskId)){
				$tmp = $this->task_model->getTaskOutputs($insId,$taskId);
				$data = $this->_systemizeStdDoc($tmp);
			}else $data = array();
		}
		return $data;
	}

	/**
	 * function return project team member submitted files
	 * @param unknown_type $insId
	 * @param unknown_type $userId
	 * @param unknown_type $type
	 * @return unknown_type
	 */
	private function _dataFacOurDocs($insId,$userId,$type = MINE){
		$tmp = array();
		$tmp2 = $this->usermodel->getUserSubmits($insId,$userId,DOC_STATUS_UNREAD,$type);
		$tmp1 = $this->usermodel->getUserSubmits($insId,$userId,DOC_STATUS_ACCEPTED,$type);
		$tmp3 = $this->usermodel->getUserSubmits($insId,$userId,DOC_STATUS_DENIED,$type);
		if(!empty($tmp1))$tmp = array_merge($tmp,$tmp1);
		if(!empty($tmp2))$tmp = array_merge($tmp,$tmp2);
		if(!empty($tmp3))$tmp = array_merge($tmp,$tmp3);
		return $tmp;
	}

	private function _systemizeStdDoc($doc){
		$insId = $this->session->userdata('ins_id');
		$caseId= $this->instance_model->getCaseid($insId);
		$data = array();
		$count = 0;

		//		foreach($docs as $doc){
		reset($doc);
		while($value = current($doc)){
			$fileName = $value['output'];
			$path = $this->_dataFacPath($caseId)."docs".DIRECTORY_SEPARATOR.$fileName;
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'){
				$winpath= iconv('UTF-8','GBK',$path);
				$fileSize = round(filesize($winpath)/1024,2); //'文件大小';
			}else{
				$fileSize = round(filesize($path)/1024,2);
			}
			$fileName = substr(strrchr($path,DIRECTORY_SEPARATOR),1);
			$fileExt = substr(strrchr($path,'.'),1);
			$displayName = substr($fileName,0,strlen($fileName)-strlen($fileExt)-1);
			$taskStatusId = $this->task_model->getTaskStatus($insId,$value['taskid']);
			$data[$count++] = array(
					'fileName' => $displayName,
					'fileType' => $fileExt,
					'standardFileId' => $value['fileid'],
					'taskName' => $this->casemodel->getTaskName($this->instance_model->getCaseid($insId),$value['taskid']),
					'taskId' => $value['taskid'],
					'fileSize' => $fileSize.' KB',
					'filePath' => $path,
					'fileTaskStatusId' => $taskStatusId,	//文件所在任务已完成
			//'file_id' => $value['file_id']
			);
			next($doc);
			//end while
		}
		return $data;
	}

	/**
	 * function serilize the data.
	 * @param array $doc
	 * @return array
	 */
	private function _systemizeSubDoc($doc){
		$data = array();
		$count = 0;
		reset($doc);
		while($value = current($doc)){
			$caseId = $this->instance_model->getCaseid($value['instanceid']);
			$fileName = basename($value['path']);
			$filePath = $this->_dataFacPath($caseId,$value['instanceid'],$value['taskid']).$fileName;
				
			$fileExt = substr(strrchr($filePath,'.'),1);
			$displayName = substr($value['file'],0,strpos($value['file'],'.'));
			//submitted doc status
			$docStatusId = $this->doc_model->getFileStatus($value['uid']);
				
			$taskDetails = $this->task_model->getTaskDetails($caseId,$value['taskid']);
			switch($docStatusId){
				case DOC_STATUS_UNREAD:
					$docStatus = "等待处理中...";
					break;
				case DOC_STATUS_ACCEPTED:
					$docStatus = "Passed";
					break;
				case DOC_STATUS_DENIED:
					$docStatus = "Denied";
					break;
				default:
					$docStatus = "错误的文档状态！";
					break;
			}
				
			$data[$count++] = array(
				'fileName' => $displayName,
				'uploader' => $this->usermodel->getUsername($value['uploader']),
				'uploadTime' =>$value['submittime'],
				'status' => $docStatus,
				'docStatusId' => $docStatusId,
				'fileId' => $value['uid'],
				'standardFileId' => $value['standardfileid'],
				'fileExt'=> $fileExt,
				'taskName' => $taskDetails['taskname'],
				'taskId' => $taskDetails['taskid'],
				'denyReason' => $value['denyReason'],
				'denySug' => $value['denySuggestions']
			);
			next($doc);
		}
		return $data;
	}

	private function _dataFacTaskRequires($insId,$taskId){
		$taskOutputs = $this->task_model->getTaskOutputs($insId,$taskId);
		if(!empty($taskOutputs)){
			$count = 0;
			foreach($taskOutputs as $taskOutput){
				$requireName = $taskOutput['output'];
				//				$requireName = substr($requirePath,strrpos($requirePath,'/')+1);
				$requireType = substr($requireName,strrpos($requireName,'.'));
				$data[$count++] = array(
					'requireFileId' => $taskOutput['fileid'],
					'requireFileName' => $requireName,
					'requireType' => $requireType
				);
			}
			return $data;
		}else return ;
	}

	/**
	 * function: force download the requiring file
	 * @param string $docName
	 * @param int $fileId
	 * @return none
	 */
	function docDownload($fileId,$type = 'sub'){
		$this->load->helper('download');
		$insId = $this->session->userdata('ins_id');
		$caseId = $this->casemodel->getCaseid($insId);
		switch($type){
			case 'sub':
				$fileInfo = $this->doc_model->getNewSubInfo($fileId);
				$fileName = $fileInfo['file'];
				if(!empty($fileInfo)){
					$path = $fileInfo['path'];
					$data = file_get_contents($path);
					if(!force_download($fileName,$data)){  //出错提示 added by wmc 2010/06/23
						echo "<script>alert('Download error!');location.href='javascript:history.back()';</script>";					 
					}
//					force_download($fileName,$data);
				}else{
					echo "file error!";
					die();
				}
				break;
			case 'std':
				$fileInfo = $this->doc_model->getStandardFileInfo($fileId,$caseId);//add $caseId by wmc 2010/06/24
				$fileName = $fileInfo['output'];
				$path = $this->_dataFacPath($caseId)."docs".DIRECTORY_SEPARATOR;
				$data = file_get_contents($path.$fileName);
				if(!force_download($fileName,$data)){  //出错提示 added by wmc 2010/06/23
					echo "<script>alert('Download error!');location.href='javascript:history.back()';</script>";	
				}
//				force_download($fileName,$data);
				break;
			default:
				echo "file error!";
				die();
				break;
		}
	}

	function displayTaskFile(){
		$this->load->library('uploadedfile');
		$taskId = $this->input->post('taskId');
		$insId = $this->session->userdata('ins_id');
		$caseId = $this->instance_model->getCaseid($insId);
		$data['taskName'] = $this->casemodel->getTaskName($caseId,$taskId);

		if($this->instance_model->isPM($insId,$this->session->userdata('user_id'))==TRUE){
			$data['role'] = '1';
		}else $data['role'] = '-1';
		$data['subFiles'] = $this->_dataFacTaskFile($insId,$taskId,SUBFILES);
		$data['stdFiles'] = $this->_dataFacTaskFile($insId,$taskId,STDFILES);
		$data['taskName'] = $this->casemodel->getTaskName($caseId,$taskId);
		$data['taskId'] = $taskId;
		$playerInfo = $this->task_model->getTaskPlayersAndActors($insId,$taskId);
		$data['isMyTask'] = $this->task_model->isUserInTask($insId,$taskId,$this->session->userdata('user_id'));

		$this->load->view('project/tasks/taskFiles_view',$data);
	}

	function viewUploadDoc(){
		$taskId = $this->input->post('taskId');
		$insId = $this->session->userdata('ins_id');
		$this->load->helper('form');
		$caseId = $this->instance_model->getCaseid($insId);
		$taskDetail = $this->task_model->getTaskDetails($caseId,$taskId);
		$data['task'] = array(
			'taskName' => $taskDetail['taskname'],
			'taskId' => $taskDetail['taskid'],
		);
		$temp = $this->instance_model->getRoleInInstance($insId,$this->session->userdata('user_id'));
		$data['roleName'] = $temp['roleName'];
		$data['insId'] = $insId;
		$data['requires'] = $this->_dataFacTaskRequires($insId,$taskId);
		$this->load->view('project/docView/uploadDoc_view',$data);
	}

	private function _doUploadUser($insId,$taskId,$docId,$path){
		$caseId = $this->instance_model->getCaseid($insId);
		$userId = $this->session->userdata('user_id');
		$roleInfo = $this->usermodel->getUserPlayingRole($insId,$userId);
		if($roleInfo == '-1'){
			echo $this->xmlmodel->returnXmlFactory('0',"您并未担任任何角色");
			die();
		}
		$return = $this->uploadedfile->uploadFile($path,TASKFILE);
		if($return['status'] == '0'){
			echo $this->xmlmodel->returnXmlFactory('0',$return['errorMessage']);
			die();
		}else{
			$record = array(
					'instanceid' => $insId,
					'taskid'     => $taskId,
					'path'       => $return['path'],
					'file'       => $return['fileName'],
					'uploader'   => $userId,
					'uploaderCurRole' =>$roleInfo['roleId'],
					'standardfileid' => $docId
			);
			if($this->doc_model->submitFile($record,$newDocId) == FALSE){
				echo $this->xmlmodel->returnXmlFactory('0',"提交文件失败，未上传成功");
				die();
			}else{
				//log news
				$newDocInfo = $this->doc_model->getNewSubInfo($newDocId);
				$roleId = $newDocInfo['uploaderCurRole'];
				$roleName = $this->role_model->getRoleName($caseId,$roleId);
				$logParam = array(
							'insId' => $insId,
							'taskId' => $taskId,
							'msgType' => NEWS_DOC_WAITING_CHECK,
							'userInfo' => array('userId' => $roleId, 'userName' => $roleName),
							'docInfo' => array('docId' => $newDocInfo['uid'],'docName' => $newDocInfo['file'])
				);
				$this->news_model->logMessage($logParam);
				echo $this->xmlmodel->returnXmlFactory('1',"上传文件成功!"); 	//$taskId for redirection
				exit;
			}
		}
	}

	private function _doUploadComputer($insId,$taskId,$docId,$path){
		$caseId = $this->casemodel->getCaseid($insId);
		$srcPath = $this->foldermodel->projectFolderFactory($caseId).DIRECTORY_SEPARATOR.STANDARD;
		$docInfo = $this->doc_model->getStandardFileInfo($docId);
		$src = $srcPath.DIRECTORY_SEPARATOR.$docInfo['output'];
		$return = $this->uploadedfile->uploadCopyFile($src,$path);
		if(!$return){	// error handle
				
		}else{
			$record = array(
					'instanceid' => $insId,
					'taskid'     => $taskId,
					'path'       => $return['path'],
					'file'       => $return['fileName'],
					'uploader'   => '1',
					'uploaderCurRole' => '-1',
					'standardfileid' => $docId
			);
				
			if($this->doc_model->submitFile($record,$newDocId) == FALSE){
				echo $this->xmlmodel->returnXmlFactory('0',"提交文件失败，未上传成功");
				die();
			}else{
				//log news
				$newDocInfo = $this->doc_model->getNewSubInfo($newDocId);
				$logParam = array(
							'insId' => $insId,
							'taskId' => $taskId,
							'msgType' => NEWS_DOC_WAITING_CHECK,
							'userInfo' => array('userId' => $roleId, 'userName' => "系统"),
							'docInfo' => array('docId' => $newDocInfo['uid'],'docName' => $newDocInfo['file'])
				);
				$this->news_model->logMessage($logParam);
				echo $this->xmlmodel->returnXmlFactory('1',"上传成功！");
				die();
			}
		}
	}

	function doUpload($taskId,$docId,$uploadType = UPLOAD_TYPE_USER){
		$this->load->library('uploadedfile');
		$this->load->model('foldermodel');
		$this->load->model('xmlmodel');
		$this->load->model('news_model');
		$this->load->model('usermodel');
		header("Content-Type: text/xml");
		$insId = $this->session->userdata('ins_id');
		$caseId = $this->instance_model->getCaseid($insId);
		if(!$this->foldermodel->checkCaseFolder($caseId))$this->foldermodel->createCaseFolder($caseId);
		if(!$this->foldermodel->checkInsFolder($caseId,$insId))$this->foldermodel->createInsFolder($caseId,$insId);
		if(!$this->foldermodel->checkTaskFolder($caseId,$insId,$taskId))$this->foldermodel->createTaskFolder($caseId,$insId,$taskId);
		$path = $this->foldermodel->projectFolderFactory($caseId,$insId,$taskId);
		/*		echo $this->xmlmodel->returnXmlFactory('0',$path);
		 die();*/
		//		if($uploadType == UPLOAD_TYPE_USER)
		$this->_doUploadUser($insId,$taskId,$docId,$path);
		//		else if($uploadType == UPLOAD_TYPE_COMPUTER)
		//			$this->_doUploadComputer($insId,$taskId,$docId,$path);
	}

	function docOpHandler(){
		header("Content-Type: text/xml");
		$fileId = $this->input->post('fileId');
		$opType = $this->input->post('opType');
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
		$taskInfo = $this->doc_model->getNewSubInfo($fileId);
		switch($opType){
			case 'pass':
				$this->_opPassDoc($fileId,$insId,$taskInfo['taskid']);
				break;
			case 'deny':
				$this->_opDenyDoc($fileId,$insId,$taskInfo['taskid']);
				break;
			default:
				echo $this->xmlmodel->returnXmlFactory("0","错误的传递参数！");
				exit;
				break;
		}
	}

	function checkDocs(){
		header("Content-Type: text/xml");
		$fileId = $this->input->post('fileId');
		$fileInfo = $this->doc_model->getNewSubInfo($fileId);
		$taskId = $fileInfo['taskid'];
		$insId = $this->session->userdata('ins_id');
		if($this->task_model->checkAllDocPassed($insId,$taskId)){
			echo $this->xmlmodel->returnXmlFactory('1',$taskId);
			exit;
		}else{
			echo $this->xmlmodel->returnXmlFactory('0',"未完成");
			exit;
		}
	}

	private function _opPassDoc($fileId,$insId,$taskId){
		if($this->doc_model->acceptFile($fileId)){
			$docInfo = $this->doc_model->getNewSubInfo($fileId);
			// the uploader maybe not act the current role, so ,log role info instead
			$roleId = $docInfo['uploaderCurRole'];
			$roleName = $this->role_model->getRoleName($this->instance_model->getCaseid($insId),$roleId);
			$logParam = array(
						'insId' => $insId,
						'taskId' => $taskId,
						'msgType' => NEWS_DOCS_PASSED,
						'userInfo' => array('userId' => $roleId, 'userName' => $roleName),
						'docInfo' => array('docId'=> $docInfo['uid'], 'docName' => $docInfo['file'])
			);
			$this->news_model->logMessage($logParam);
			echo $this->xmlmodel->returnXmlFactory("1","操作成功！");
			exit;
		}else{
			echo $this->xmlmodel->returnXmlFactory('0',"操作失败，请稍后重试.");
			exit;
		}
	}

	private function _opDenyDoc($fileId,$insId,$taskId){
		if($this->doc_model->denyFile($fileId)){
			$docInfo = $this->doc_model->getNewSubInfo($fileId);
			$roleId = $docInfo['uploaderCurRole'];
			$roleName = $this->role_model->getRoleName($this->instance_model->getCaseid($insId),$roleId);
			$logParam = array(
						'insId' => $insId,
						'taskId' => $taskId,
						'msgType' => NEWS_DOCS_DENIED,
						'userInfo' => array('userId' => $roleId, 'userName' => $roleName),
						'docInfo' => array('docId'=> $docInfo['uid'], 'docName' => $docInfo['file'])
			);
			$this->news_model->logMessage($logParam);
			return true;
			/*			echo $this->xmlmodel->returnXmlFactory("1","操作成功！");
			 exit;*/
		}else{
			return false;
			/*			echo $this->xmlmodel->returnXmlFactory('0',"操作失败，请稍后重试.");
			 exit;*/
		}
	}

	function denyReasonSubmit(){
		header("Content-Type: text/xml");
		$denyReason = $this->input->post("denyReason");
		$denySug = $this->input->post("denySug");
		$denyFileId = $this->input->post("denyFileId");
		$insId = $this->session->userdata('ins_id');
		$taskInfo = $this->doc_model->getNewSubInfo($denyFileId);

		if(!$this->_opDenyDoc($denyFileId,$insId,$taskInfo['taskid'])){
			echo $this->xmlmodel->returnXmlFactory('0',"操作失败，请稍后重试.");
			exit;
		}
		if($this->doc_model->denySub($denyFileId,$denyReason,$denySug)){
			echo $this->xmlmodel->returnXmlFactory("1","操作成功！");
			exit;
		}else{
			echo $this->xmlmodel->returnXmlFactory("0","提交失败，请稍后再试！");
			exit;
		}
	}

	function getDenyReasons(){
		header("content-type:text/xml");
		$fileId = $this->input->post('fileId');
		$denyInfo = $this->doc_model->getDenyReason($fileId);
		if(!empty($denyInfo)){
			$output = $this->xmlmodel->xmlFactoryElement('1',"获取成功");
			$output .= "<denyReason>".$denyInfo['denyReason']."</denyReason>";
			$output .= "<denySug>".$denyInfo['denySug']."</denySug>";
			$output = $this->xmlmodel->xmlFactoryEndElement($output);
			echo $output;
			exit;
		}else{
			echo $this->xmlmodel->returnXmlFactory("0","没有拒绝信息");
			exit;
		}
	}

	function test(){
		$denyInfo = $this->doc_model->getDenyReason('1');
		if(!empty($denyInfo)){
			$output = $this->xmlmodel->xmlFactoryElement('1',"获取成功");
			$output .= "<denyReason>".$denyInfo['denyReason']."</denyReason>";
			$output .= "<denySug>".$denyInfo['denySug']."</denySug>";
			$output = $this->xmlmodel->xmlFactoryEndElement($output);
			echo $output;
			exit;
		}else{
			echo $this->xmlmodel->returnXmlFactory("0","没有拒绝信息");
			exit;
		}
	}
}