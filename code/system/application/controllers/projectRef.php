<?php
class ProjectRef extends Controller {
	function ProjectRef() {
		parent::Controller();
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->model('ref_model');
		$this->load->model('usermodel');
		$this->load->model('xmlmodel');
		$this->load->helper('html');
	}
	
	function index(){
		echo "hi,this is projectRef";
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
				$this->_viewRefList($insId);
			break;
			case '2':
				$this->_viewUploadRef();
			break;
			default:
				echo "sorry,something must be error";
				break;
		}
	}
	
	private function _viewObserver($insId){
		echo 'observer view';
	}
	
	private function _viewRefList($insId){
		$caseId = $this->instance_model->getCaseid($insId);
		$refList = $this->casemodel->getRefs($caseId);
		if(!empty($refList)){
			$count = 0;
			foreach($refList as $ref){
				$data['refList'][$count++] = array(
					'fileName' => $ref['refName'],
					'fileId' => $ref['fileId'],
					'uploader' => $this->usermodel->getUsernameByUserid($ref['uploaderId']),
					'uploadTime' => $ref['uploadTime'],
					'downloadedTimes' => $ref['downloadedTimes']
				);
			}
		}else $data['refList'] = array();
		$this->load->view('project/reference/refMain_view',$data);
	}
	
	private function _viewUploadRef(){
		$userId = $this->session->userdata('user_id');
		$data['userName'] = $this->usermodel->getUsernameByUserid($userId);
		$this->load->view('project/reference/refUpload_view',$data);
	}
	
	function doUpload(){
		$this->load->library('uploadedfile');
		$this->load->model('foldermodel');
		header("content-type:text/xml");
		$insId = $this->session->userdata('ins_id');
		$caseId = $this->instance_model->getCaseid($insId);
		if(!$this->foldermodel->checkRefFolder($caseId))$this->foldermodel->createRefFolder($caseId);
		$path = $this->foldermodel->projectFolderFactory($caseId);
		$path = $path.DIRECTORY_SEPARATOR."reference";
		
		$return = $this->uploadedfile->uploadFile($path,REFERENCE);
		$return['description'] = $this->input->post('refDescription');
		$return['refName'] = $this->input->post('refName');
		
		if($return['status'] == '0'){
			echo $this->xmlmodel->returnXmlFactory('0',$return['errorMessage']);
			die();
		}else{
			$record = array(
				'fileName' => $return['fileName'],
				'refName' => $return['refName'],
				'uploaderId' => $this->session->userdata('user_id'),
				'path' => $return['path'],
				'caseId' => $caseId,
				'description' => $return['description'],
				'downloadedTimes' => '0'
			);
			if($this->ref_model->submitRefFile($record,$newDocId) == FALSE){
				echo $this->xmlmodel->returnXmlFactory('0',"上传资料失败，请稍后重试!");
				die();
			}else{
				echo $this->xmlmodel->returnXmlFactory('1',"上传文件成功!"); 
				exit;
			}
		}
	}
	
	function getRefDetails(){
		$fileId = $this->input->post('fileId');
		$insId = $this->session->userdata('ins_id');
		$refDetails = $this->ref_model->getRefDetails($fileId);
		//in this place, path includes the file name
		$path = $refDetails['path'];
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'){
			$tmpPath= iconv('UTF-8','GBK',$path);
			$fileSize = round(filesize($tmpPath)/1024,2); //'文件大小';
		}else{
			$fileSize = round(filesize($path)/1024,2); //'文件大小';
		}
		$fileType = substr(strrchr($refDetails['fileName'],'.'),1);
		$uploader = $this->usermodel->getUsernameByUserid($refDetails['uploaderId']);
		$data['refDetails'] = array(
			'refId' => $refDetails['fileId'],
			'refName' => $refDetails['refName'],
			'fileSize' =>$fileSize.' KB',
			'fileType' => $fileType,
			'uploader' => $uploader,
			'uploadTime' => $refDetails['uploadTime'],
			'downloadedTimes' => $refDetails['downloadedTimes'],
			'description' => $refDetails['description']
		);
		$this->load->view('project/reference/refDetails_view',$data);
	}
	
	/**
	 * function: force download the requiring file
	 * @param string $docName
	 * @param int $fileId
	 * @return none
	 */
	function refDownload($fileId){
		$this->load->helper('download');
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
		
		if(!$this->ref_model->isUserDownloaded($fileId,$userId)){
			$this->ref_model->downloadCount($fileId,$userId);
		}
		$refInfo = $this->ref_model->getRefDetails($fileId);
		$fileName = $refInfo['fileName'];
		$path = $refInfo['path'];
		$data = file_get_contents($path);
		force_download($fileName,$data);
	}
}