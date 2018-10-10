<?php
define("IS_INDICATOR",'2');
define("IS_PM",'1');
class Project extends Controller {
	function Project() {
		parent::Controller();
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->model('usermodel');
		$this->load->helper('html');
		define("PROJECT_MANAGER",'1');
	}

	/*判断用户是否在该项目中*/
	private function isInProject($insId){
		if($this->isLoggedIn() == FALSE){
			return FALSE;
		}
		$user_id = $this->session->userdata('user_id');
		if($this->instancemodel->isIndicator($insId,$user_id)){
			return TRUE;
		}
		$actors = $this->instancemodel->getActorid($insId);
		foreach($actors as $actor){
			if($actor['actorid'] == $user_id){
				return TRUE;
			}
		}
		return FALSE;
	}

	/*判断用户是否登录*/
	private function isLoggedIn(){
		$user_name = $this->session->userdata('user_name');
		return empty($user_name)?FALSE:TRUE;
	}
	/*判断用户是否为PM*/
	private function isPM($insId,$user_id){
		$roles = $this->instancemodel->getActorid($insId);
		foreach($roles as $row){
			if($row['roleid'] == PROJECT_MANAGER && $row['actorid'] == $this->session->userdata('user_id')){
				return TRUE;
			}
		}
		return FALSE;
	}

	private function isInTask($insId,$taskId){
		$roles = $this->casemodel->getRoleidInTask($this->instancemodel->getCaseid($insId),$taskId);
		foreach($roles as $role){
			$playerid = $this->instancemodel->getRolePlayerid($insId, $role['resourceid']);
			if($playerid == $this->session->userdata('user_id')){
				return true;
			}
		}
		return false;
	}

	private function checkUser(){
		if(!$this->isLoggedIn()){
			redirect('/home/notLogin');
		}
		$tmp = $this->session->userdata('ins_id');
		if(!isset($tmp) || !$this->isInProject($tmp)){
			$data['errorMessage'] = "您未参与本项目";
			$data['redirection'] = "home/index/";
			$this->load->view('main/redirect',$data);
		}
	}

	function index($insId = '0'){
		if($insId =='0'){
			$insId = $this->session->userdata('ins_id');
			if(!empty($insId)){
				$this->proTasks();
			}
			else{
				$data['errorMessage'] = "错误的实例";
				$data['redirection'] = $_SERVER['HTTP_REFERER'];
				$this->load->view('main/redirect',$data);
			}
		}
		else{
			if(!$this->isLoggedIn()){
				redirect('/home/notLogin');
			}
			if(!$this->isInProject($insId)){
				$data['errorMessage'] = "您未参与本项目";
				$data['redirection'] = "home/index/";
				$this->load->view('main/redirect',$data);
			}
			if(TRUE == $this->instancemodel->isStarted($insId)){
				$now_ins = $this->session->userdata('ins_id');
				if(empty($now_ins)){
					$this->session->set_userdata('ins_id',$insId);
				}
				$this->mytask();
			}else{
				//				echo "项目暂未开始"; 	
				if($this->isPM($insId,$this->session->userdata('user_id'))){
					redirect(site_url('ins/charge'.'/'.$insId));
				}else{
					redirect(site_url('ins/apply'.'/'.$insId));
				}
			}
		}
	}

	function proTasks(){
		$insId = $this->session->userdata('ins_id');
		$tmp = $this->instancemodel->getTasks($insId);
		foreach($tmp as $key => $sorttmp){
			$id[$key] = $sorttmp['taskid'];
		}
		array_multisort($id,$tmp);
		$count = 0;
		reset($tmp);
		while($value = current($tmp)){
			$task_add = "project/details/".$value['taskid'];
			$status = $this->instancemodel->getTaskStatus($insId,$value['taskid']);
			$data['tasks'][$count++]=array(
				'taskname' => $value['taskname'],
				'starttime' => $value['starttime'],
				'duration' => $value['duration'],
				'finishtime' => $value['finishtime'],
				'taskstatus' => $status,
				'task_id' => $value['taskid'],
				'task_add' => $task_add//任务的地址
			);
			next($tmp);
		}
		if($this->isPM($insId,$this->session->userdata('user_id')) == TRUE)
		$data['role'] = '0';
		else $data['role'] = '1';
		$temp = $this->instancemodel->getRoleInInstance($insId,$this->session->userdata('user_id'));
		$data['rolename'] = $temp['rolename'];
		$data['ins_id'] = $insId;
		//		print_r($data['tasks']);
		//		die();
		$this->load->view('game/game_pro_tasks',$data);
	}

	/**
	 * 功能：对于指导者的myTask页面数据组织
	 * @param $indId	：案例ID
	 * @return array
	 */
	private function myTaskIndicator($insId){
		$tmp = $this->instancemodel->getTasks($insId);
		foreach($tmp as $key => $sorttmp){
			$id[$key] = $sorttmp['taskid'];
		}
		array_multisort($id,$tmp);
		$count = 0;
		reset($tmp);
		while($value = current($tmp)){
			$task_add = "project/details/".$value['taskid'];
			$status = $this->instancemodel->getTaskStatus($insId,$value['taskid']);
				
			$data['mytask'][$count++] = array(
				'taskname' => $value['taskname'],
				'progress' => '',//undefined, wait to handled in next version
				'starttime' => $value['starttime'],
				'duration' => $value['duration'],
				'finishtime' => $value['finishtime'],
				'status' => $status,
				'task_id' => $value['taskid'],
				'task_add' => $task_add
			);
			next($tmp);
			/*
			 $data['mytask'][$count++]=array(
				'taskname' => $value['taskname'],
				'starttime' => $value['starttime'],
				'duration' => $value['duration'],
				'finishtime' => $value['finishtime'],
				'taskstatus' => $status,
				'task_id' => $value['taskid'],
				'task_add' => $task_add//任务的地址
				);
				next($tmp);*/
		}
		$data['role'] = IS_INDICATOR;
		$data['rolename'] = "指导者";
		$data['ins_id'] = $insId;
		return $data;
	}

	/**
	 * 功能：对于学生的myTask页面数据组织
	 * @param $indId	：案例ID
	 * @return unknown_type
	 */
	private function myTaskStudents($insId){
		$tmp = $this->instancemodel->getMytasks($insId,$this->session->userdata('user_id'));
		foreach($tmp as $key => $sorttmp){
			$id[$key] = $sorttmp['taskid'];
		}
		array_multisort($id,$tmp);
		$count = 0;
		reset($tmp);
		while($value = current($tmp)){
			$task_add = "project/details/".$value['taskid'];
			$status = $this->instancemodel->getTaskStatus($insId,$value['taskid']);
			if($status < '2'){
				$start_time = '0';
				$finish_time = '0';
			}
			else if($status == '2'){
				$start_time = $this->instancemodel->getTaskStarttime($insId,$value['taskid']);
				$finish_time = '0';
			}
			else if($status == '3'){
				$start_time = $this->instancemodel->getTaskStarttime($insId,$value['taskid']);
				$finish_time = $this->instancemodel->getTaskFinishtime($insId,$value['taskid']);
			}
			$data['mytask'][$count++] = array(
				'taskname' => $value['taskname'],
				'progress' => '',//undefined, wait to handled in next version
				'starttime' => $start_time,
				'duration' => $value['duration'],
				'finishtime' => $finish_time,
				'status' => $status,
				'task_id' => $value['taskid'],
				'task_add' => $task_add
			);
			next($tmp);
		}//end while
		$data['ins_id'] = $insId;
		$temp = $this->instancemodel->getRoleInInstance($insId,$this->session->userdata('user_id'));
		$data['rolename'] = $temp['rolename'];
		$data['roleid'] = $temp['roleid'];
			
		return $data;
			
	}

	/**
	 * 功能：对”我的任务“进行数据组织于处理
	 * @return 无
	 */
	function mytask(){
		$this->checkUser();
		$insId = $this->session->userdata('ins_id');
		if($this->instancemodel->isIndicator($insId,$this->session->userdata('user_id'))){
			$data = $this->myTaskIndicator($insId);
		}
		else $data = $this->myTaskStudents($insId);
		$this->load->view('game/game_todo_task',$data);
	}
	/*
	 * function pubFiles
	 * 功能：获得公共文件，即标准案例库内的文件
	 * @param
	 * 	$insId:当前实例的id
	 * return:无
	 */
	private function pubFiles($insId){
		if($this->instancemodel->isIndicator($insId,$this->session->userdata("user_id"))){
			$tmp = $this->instancemodel->getAllOutputFiles($insId);
		}else $tmp = $this->instancemodel->getOutputFiles($insId);
		$caseFolder = $this->casemodel->getCaseFolder($this->casemodel->getCaseid($insId));
		$caseURL = $this->casemodel->getCaseURL();
		$caseURL = substr_replace($caseURL,'',0,2);
		$count = 0;
		reset($tmp);
		while($value = current($tmp)){
			$path = base_url().$caseURL.'/'.$caseFolder.'/'.$value['output'];
			$filename = substr(strrchr($path,'/'),1);
			$fileext = substr(strrchr($filename,'.'),1);
			$filesize = /*filesize($path)*/'文件大小';
			$task_status = $this->instancemodel->getTaskStatus($insId,$value['taskid']);
			$data['pub_files'][$count++] = array(
				'file_name' => $filename,
				'description' => '',
				'file_type' => $fileext,
				'taskname' => $this->casemodel->getTaskName($this->instancemodel->getCaseid($insId),$value['taskid']),
				'task_id' => $value['taskid'],
				'file_size' => $filesize,
				'file_add' => $path,
				'file_task_status' => $task_status,	//文件所在任务已完成
			//'file_id' => $value['file_id']
			);
			next($tmp);
		}//end while
		if($this->isPM($insId,$this->session->userdata('user_id')) == TRUE)
		$data['role'] = '0';
		else $data['role'] = '1';
		$data['ins_id'] = $insId;
		$temp = $this->instancemodel->getRoleInInstance($insId,$this->session->userdata('user_id'));
		if($this->instancemodel->isIndicator($insId,$this->session->userdata('user_id'))){
			$data['rolename'] = "指导者";
			$data['role'] = IS_INDICATOR;
		}else $data['rolename'] = $temp['rolteamatesDocename'];
		$this->load->view('game/game_files_pub',$data);
	}

	/*
	 * function subFiles
	 * 功能：获取当前已上传的文件
	 * @param:
	 * 	$insId:当前的实例id
	 * return:无
	 */
	private function subFiles($insId){
		if($this->isPM($insId,$this->session->userdata('user_id')) == TRUE){
			$data['role'] = '0';
		}else $data['role'] = '1';
		$tmp1 = $this->instancemodel->getAcceptedSubmits($insId);
		$tmp2 = $this->instancemodel->getNewSubmits($insId);
		$tmp = array_merge($tmp1,$tmp2);
		$tmp3 = $this->instancemodel->getDeniedSubmits($insId);
		$tmp = array_merge($tmp,$tmp3);
		//		}
		//		else{
		//			$data['role'] = '1';
		//			$tmp = $this->instancemodel->getAcceptedSubmits($insId);
		//			$tmp1 = $this->instancemodel->getDeniedSubmits($insId);
		//			$tmp = array_merge($tmp,$tmp1);
		//		}
		$count = 0;
		reset($tmp);
		while($value = current($tmp)){
			$caseId = $this->instancemodel->getCaseid($value['instanceid']);
			$file_path = substr_replace($value['path'],'',0,2);
			$file_path = base_url().$file_path;
			$data['sub_files'][$count++] = array(
				'file_name' => $value['file'],
				'file_path' => $file_path,
				'description' => '',
				'taskname' => $this->casemodel->getTaskName($caseId,$value['taskid']),
				'uploader' => $this->usermodel->getUsername($value['uploader']),
				'upload_time' =>$value['submittime'],
				'status' => $this->instancemodel->getFileStatus($value['uid']),
				'taskid' => $value['taskid'],
				'fileid' => $value['uid']
			);
			next($tmp);
		}
		$data['ins_id'] = $insId;
		$temp = $this->instancemodel->getRoleInInstance($insId,$this->session->userdata('user_id'));
		$data['rolename'] = $temp['rolename'];
		$this->load->view('game/game_files_submited',$data);
	}

	function files($type = '0'){
		$this->checkUser();
		$insId = $this->session->userdata('ins_id');
		if($type == '0'){	//PUBLIC files
			$this->pubFiles($insId);
		}
		else if($type == '1'){	//submitted files
			$this->subFiles($insId);
		}
		else{

			redirect($_SERVER['HTTP_REFERER']);

		}
	}

	function details($taskId){
		$this->checkUser();
		$insId = $this->session->userdata('ins_id');
		$caseId = $this->instancemodel->getCaseid($insId);
		$tmp = $this->instancemodel->getTaskDetails($caseId,$taskId);
		//ref和suggestions
		$refAndSug = $this->instancemodel->getTaskRefAndSuggestions($insId,$taskId);
		$status = $this->instancemodel->getTaskStatus($insId,$taskId);
		$taskfile = site_url("project/taskfile"."/".$taskId);
		$uploadfile = site_url("project/upload"."/".$taskId);
		$taskpre = $this->instancemodel->getPredecessors($caseId,$taskId);
		$tasknext = $this->instancemodel->getSucecessors($caseId,$taskId);
		$is_in_task = $this->isInTask($insId,$taskId);
		$data['task'] = array(
			'taskname' => $tmp['taskname'],
			'taskpre' => $taskpre,
			'description' => $tmp['description'],
			'tasknext' => $tasknext,
			'reference' => $refAndSug['reference'],
			'suggestions' => $refAndSug['suggestions'],
			'status' => $status,
			'taskfile_add' => $taskfile,
			'taskfile_upload' => $uploadfile,
			'is_in_task' => $is_in_task
		);
		if($this->isPM($insId,$this->session->userdata('user_id')) == TRUE){
			$data['role'] = '0';
		}
		else $data['role'] = '1';
		$data['ins_id'] = $insId;
		$data['task_id'] = $taskId;
		$data['playername'] = $this->instancemodel->getTaskPlayer($caseId,$taskId);
		$temp = $this->instancemodel->getRoleInInstance($insId,$this->session->userdata('user_id'));
		$data['rolename'] = $temp['rolename'];
		$data['isIndicator'] = $this->instancemodel->isIndicator($insId,$this->session->userdata('user_id'));
		/*		print_r($data['playername']);
		 die();*/
		$this->load->view('game/game_task_detail',$data);
	}

	//某个任务内的文件
	function taskfile($taskId){
		$this->checkUser();
		$insId = $this->session->userdata('ins_id');
		$this->load->library('uploadedfile');
		if($this->isPM($insId,$this->session->userdata('user_id'))==TRUE){
			$data['role'] = '0';
		}
		else $data['role'] = '1';
		$tmp = $this->instancemodel->getOutputTaskFiles($insId,$taskId);
		$count = 0;
		reset($tmp);
		$taskstatus = $this->instancemodel->getTaskStatus($insId,$taskId);
		if($taskstatus == '3'){
			while($value = current($tmp)){
				$path = $value['output'];
				$filename = substr(strrchr($path,'/'),1);
				$fileext = substr(strrchr($filename,'.'),1);
				$data['pub_files'][$count++] = array(
					'filename' => $filename,
					'filetype' => $fileext,
					'description' => '',
					'file_add' => $path
				);
				next($tmp);
			}
		}
		$tmp2 = $this->instancemodel->getSubmitsInTask($insId,$taskId);
		$count = 0;
		reset($tmp2);
		while($value = current($tmp2)){
			$data['sub_files'][$count++] = array(
				'filename' => $value['file'],
				'filetype' => $this->uploadedfile->fileext($value['file']),
				'uploader' => $value['uploader'],
				'uploadtime' => $value['submittime'],
				'status' =>$this->instancemodel->getFileStatus($value['uid']),
				'file_add' => $value['path'],
				'taskid' => $value['taskid'],
				'fileid' => $value['uid']
			);
			next($tmp2);
		}
		$data['ins_id'] = $insId;
		$data['task_id'] = $taskId;
		$temp = $this->instancemodel->getRoleInInstance($insId,$this->session->userdata('user_id'));
		$data['rolename'] = $temp['rolename'];
		$this->load->view('game/game_task_file',$data);
	}

	function fileop($taskId,$file_id,$op_id){
		$this->checkUser();
		$insId = $this->session->userdata('ins_id');
		$user_id = $this->session->userdata('user_id');
		if($this->isPM($insId,$user_id) == FALSE){
			echo "您不是PM，不能进行这项操作";
			sleep(2);
			redirect($_SERVER['HTTP_REFERER']);
		}
		if($op_id == '0'){	//对文件进行同意操作
			$this->instancemodel->acceptFile($file_id);
		}
		else if($op_id == '1'){	//对文件进行拒绝操作
			$this->instancemodel->denyFile($file_id);
		}
		//$this->taskfile($insId,$taskId);
		$this->subFiles($insId);
	}
	/*
	 * 上传任务文件
	 */
	function upload($taskId){
		$this->checkUser();
		$insId = $this->session->userdata('ins_id');
		$this->load->helper('form');
		$caseid = $this->instancemodel->getCaseid($insId);
		$task_detail = $this->instancemodel->getTaskDetails($caseid,$taskId);
		$data['task'] = array(
			'taskname' => $task_detail['taskname'],
			'taskid' => $task_detail['taskid'],
			'require' => ''
			);
			$temp = $this->instancemodel->getRoleInInstance($insId,$this->session->userdata('user_id'));
			$data['rolename'] = $temp['rolename'];
			$data['ins_id'] = $insId;
			$this->load->view('game/game_task_upload',$data);
	}

	function uploadop($taskId){
		$this->load->library('uploadedfile');
		$this->load->model('foldermodel');
		$this->checkUser();
		$insId = $this->session->userdata('ins_id');
		$caseId = $this->instancemodel->getCaseid($insId);
		if(!$this->foldermodel->checkCaseFolder($caseId))$this->foldermodel->createCaseFolder($caseId);
		if(!$this->foldermodel->checkInsFolder($caseId,$insId))$this->foldermodel->createInsFolder($caseId,$insId);
		if(!$this->foldermodel->checkTaskFolder($caseId,$insId,$taskId))$this->foldermodel->createTaskFolder($caseId,$insId,$taskId);
		$path = $this->foldermodel->projectFolderFactory($caseId,$insId,$taskId);
		$return = $this->uploadedfile->uploadFile($path,TASKFILE);
		if($return['status'] == '0'){
			echo $return['errorMessage'];
			die();
		}else{
			$recorde = array(
					'instanceid' => $insId,
					'taskid'     => $taskId,
					'path'       => $return['path'],
					'file'       => $return['fileName'],
					'uploader'   => $this->session->userdata('user_id')
			);
			if($this->instancemodel->submitFile($recorde) == FALSE){
				echo "提交文件失败，未上传成功";
			}
			//echo "OK";
			$this->files($insId,1);
			echo "successful!";
		}
	}

/*	function uploadop($taskId){
		$this->checkUser();
		$insId = $this->session->userdata('ins_id');
		$this->load->library('uploadedfile');
		$file_name = $_FILES['uploadfile']['name'];
		$file_size = $_FILES['uploadfile']['size'];
		$tmp_path = $_FILES['uploadfile']['tmp_name'];
		$erroes=$_FILES['uploadfile']['error'];
		if($erroes != '0'){
			switch($erroes){
				case 1:
					Echo   "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值."; break;
				case 2:
					Echo   "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。";    break;
				case 3:
					Echo   "文件只有部分被上传";break;
				case 4:
					Echo   "没有文件被上传";break;
			}
			exit;
		}
		$caseId = $this->instancemodel->getCaseid($insId);
		if(!$this->uploadedfile->checkFileName($file_name)){
			echo "您只能上传以下几类文件";
			echo $this->uploadedfile->fileType();
		}
		else{
			$new_path = $this->uploadedfile->movefile($caseId,$insId,$taskId,$tmp_path,$file_name,&$msg);
			if($new_path == '-1'){//未上传成功
				echo $msg;
			}
			else{//上传成功
				$recorde = array(
					'instanceid' => $insId,
					'taskid' => $taskId,
					'path' => $new_path,
					'file' =>$file_name,
					'uploader' => $this->session->userdata('user_id')
				);
				if($this->instancemodel->submitFile($recorde) == FALSE){
					echo "提交文件失败，未上传成功";
				}
				//echo "OK";
				$this->files($insId,1);
				echo "successful!";
			}
		}
	}*/

	function taskop($taskId,$op_id = '0'){
		$this->checkUser();
		$insId = $this->session->userdata('ins_id');
		$user_id = $this->session->userdata('user_id');
		if($this->isPM($insId,$user_id) == FALSE){
			echo "您不是PM，不能进行这项操作";
			sleep(2);
			redirect($_SERVER['HTTP_REFERER']);
		}
		$status = $this->instancemodel->getTaskStatus($insId,$taskId);
		//如果任务状态是'1'即可以开始，而且操作代码为'1'即”开始“时，开始任务
		if($status == '1' && $op_id == '1'){
			$this->instancemodel->startTask($insId,$taskId);
			$caseId = $this->instancemodel->getCaseid($insId);
			//检查该任务分配的roleid
			$roles = $this->casemodel->getRoleidInTask($caseId,$taskId);
			//检查roleid是否为computer
			$flag = '0';
			foreach($roles as $row){
				if($row != '0'){
					$flag = '1';
					break;
				}
			}
			if($flag == '0'){//全部是机器人扮演
				$output_file = $this->instancemodel->getOutputFiles($insId);
				print_r($output_file);
			}
			//是computer的话自动上传标准库里的文件
		}
		$this->details($taskId);
	}

	function gant(){
		$data['ins_id'] = $this->session->userdata('ins_id');
		$role = $this->instancemodel->getRoleInInstance($data['ins_id'],$this->session->userdata('user_id'));
		$data['rolename'] = $role['rolename'];
		$this->load->view('game/game_pro_gant',$data);
	}

	function mygant(){
		$data['ins_id'] = $this->session->userdata('ins_id');
		$role = $this->instancemodel->getRoleInInstance($data['ins_id'],$this->session->userdata('user_id'));
		$data['rolename'] = $role['rolename'];
		$this->load->view('game/game_todo_gant',$data);
	}

	function exitToIndex(){
		if(isset($this->session->userdata['ins_id'])){
			$this->session->unset_userdata['ins_id'];
		}
		redirect('home/index/');
	}

	/**
	 * 功能：提交指导者所提交的reference和suggestion,AJAX调用
	 * @return XML
	 */
	function subRefAndSug(){
		header("Content-type: text/xml");
		if(!isset($_POST['insId']) || !isset($_POST['taskId'])){
			echo $this->returnXmlFactory('0',"错误，无法获取您要的信息!");
			exit;
		}
		$insId = $_POST['insId'];
		$taskId = $_POST['taskId'];
		$userId = $this->session->userdata('user_id');
		/*		if(!$this->instancemodel->isIndicator($insId,$userId)){
			echo $this->returnXmlFactory('0',"错误，您不是该项目指导者!");
			exit;
			}*/
		if(isset($_POST['suggestions']))$data['suggestion'] = $_POST['suggestions'];
		if(isset($_POST['ref']))$data['ref'] = $_POST['ref'];
		if($this->instancemodel->setTaskRefAndSuggestions($insId,$taskId,$data)){
			echo $this->returnXmlFactory('1',"提交成功");
			exit;
		}else{
			echo $this->returnXmlFactory('0',"数据库错误请稍后再试");
			exit;
		}

	}

	/**
	 * 功能：返回简单的AJAX调用所需要的返回XML格式
	 * @param $flag:		用于填充返回的<flag>标签
	 * @param $message：		用于填充返回的<message>标签
	 * @return XML
	 * 备注：下一个版本可以把几个controller里面的XML的factory整合一下
	 */
	private function returnXmlFactory($flag,$message){
		$output = "<?xml version='1.0' encoding='utf-8' ?>
							<return>
								<flag>".$flag."</flag>
								<message>".$message."</message>
							</return>";
		return $output;
	}
}