<?php
class ProjectTask extends Controller {
	function ProjectTask() {
		parent::Controller();
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->model('usermodel');
		$this->load->model('task_model');
		$this->load->model('role_model');
		$this->load->model('xmlmodel');
		$this->load->model('news_model');
		$this->load->model('time_model');
		$this->load->helper('html');
		if(!defined("TASK_STATUS_UNREADY"))define("TASK_STATUS_UNREADY",'0');
		if(!defined("TASK_STATUS_READY"))define("TASK_STATUS_READY",'2');
		if(!defined("TASK_STATUS_UNCONFIRMED"))define("TASK_STATUS_UNCONFIRMED",'4');
		if(!defined("TASK_STATUS_ONGOING"))define("TASK_STATUS_ONGOING",'6');
		if(!defined("TASK_STATUS_STARTED"))define("TASK_STATUS_STARTED",'6');
		if(!defined("TASK_STATUS_WAITING_FINISH"))define("TASK_STATUS_WAITING_FINISH",'7');
		if(!defined("TASK_STATUS_COMPLETED"))define("TASK_STATUS_COMPLETED",'8');
		if(!defined("MYSTARTED"))define("MYSTARTED",'0');
		if(!defined("MYWHOLE"))define("MYWHOLE",'1');
		if(!defined("PROJECTORINSTRUCTORVIEW"))define("PROJECTORINSTRUCTORVIEW",'2');
		if(!defined("TASK_PLAYER_USERS"))define("TASK_PLAYER_USERS",'0');
		if(!defined("TASK_PLAYER_ALL_COMPUTERS"))define("TASK_PLAYER_ALL_COMPUTERS",'1');
	}

	function index(){
		echo "hello";
	}
	
	function test(){
		$insId = $this->session->userdata('ins_id');
	}

	function handler(){
		$subNav = $this->input->post('subNav');
		$taskView = $this->input->post('taskView');
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
		if(!$this->instance_model->isInProject($insId,$userId,EXCLUDE_CREATOR)){
			$this->_viewObserver($insId);
		}else 
		switch($taskView){
			case '1':
				if($this->instance_model->isInstructor($insId,$this->session->userdata('user_id'))){
					$this->_viewInstructor($insId,$subNav);
				}else{
					if($subNav == '1') $this->_viewMyStartedTasks($insId);
					else if($subNav == '2') $this->_viewMyWholeTasks($insId);
				}
				break;
			case '2':
				$this->_viewProjectTasks($insId);
				break;
			default:
				break;
		}
	}
	
	private function _viewObserver($insId){
		$this->load->view("project/tasks/taskObserver_view");
	}
	
	private function _viewInstructor($insId,$subNav){
		$data = $this->_dataFacTasksInfo($insId,PROJECTORINSTRUCTORVIEW);
		if($subNav == '1') $this->load->view('project/tasks/myStartedTasks_view',$data);
		else if($subNav == '2') $this->load->view('project/tasks/myWholeTasks_view',$data);
	}

	private function _viewProjectTasks($insId){
		$data = $this->_dataFacTasksInfo($insId,PROJECTORINSTRUCTORVIEW);
		$this->load->view('project/tasks/proTasks_view',$data);
	}

	private function _viewMyWholeTasks($insId){
		$data = $this->_dataFacTasksInfo($insId,MYWHOLE);
		$this->load->view('project/tasks/myWholeTasks_view',$data);
	}
	
	private function _viewMyStartedTasks($insId){
		$data = $this->_dataFacTasksInfo($insId,MYSTARTED);
		$this->load->view('project/tasks/myStartedTasks_view',$data);
	}

	private function _dataFacTasksInfo($insId,$type){
		if($type == PROJECTORINSTRUCTORVIEW) $tmp = $this->instance_model->getTasks($insId);
		else $tmp = $this->instance_model->getMytasks($insId,$this->session->userdata('user_id'));
		if(!empty($tmp)){
			foreach($tmp as $key => $sorttmp){
				$id[$key] = $sorttmp['taskid'];
			}
			array_multisort($id,$tmp);
			$count = 0;
			reset($tmp);
			//serilize data
			while($value = current($tmp)){
				$taskStatusId = $this->task_model->getTaskStatus($insId,$value['taskid']);
				$startTime = '0';
				$finishTime = '0';
				switch($taskStatusId){
					case TASK_STATUS_ONGOING:
					case TASK_STATUS_STARTED:
						$statusName = "任务已经开始!";
						$startTime = $this->task_model->getTaskStarttime($insId,$value['taskid']);
						$finishTime = '0';
					break;
					case TASK_STATUS_COMPLETED:
						$statusName = "任务已经结束!";
						$startTime = $this->task_model->getTaskStarttime($insId,$value['taskid']);
						$finishTime = $this->task_model->getTaskFinishtime($insId,$value['taskid']);
					break;
					case TASK_STATUS_WAITING_FINISH:
						$statusName="任务文档准备就绪，等待项目经理结束任务.";
						$startTime = $this->task_model->getTaskStarttime($insId,$value['taskid']);
						$finishTime = '0';
					break;
					case TASK_STATUS_UNREADY:
						$statusName = "开始条件不足!";
					break;
					case TASK_STATUS_READY:
						$statusName = "任务准备就绪!";
					break;
					case TASK_STATUS_UNCONFIRMED:
						$statusName = "项目经理已经开始，等待成员确认!";
					break;
					default:
						$statusName = "error!";
					break;
				}
				if($taskStatusId >= TASK_STATUS_READY || $type != MYSTARTED)
					$data['tasks'][$count++] = array(
						'taskName' => $value['taskname'],
						'startTime' => $startTime,
						'duration' => $value['duration'],
						'finishTime' => $finishTime,
						'statusName' => $statusName,
						'statusId' => $taskStatusId,
						'taskId' => $value['taskid'],
						'isMyTask' => $this->task_model->isUserInTask($insId,$value['taskid'],$this->session->userdata('user_id')),
						);
				next($tmp);
			}//end while
		}else{
			$data['tasks'] = array();
		}
		$temp = $this->instance_model->getRoleInInstance($insId,$this->session->userdata('user_id'));
		$data['roleId'] = $temp['roleId'];
		if($type == MYSTARTED){
			
		}
		return $data;
	}
	
	private function _dataFacTaskDetail($insId,$taskId){
		$caseId = $this->instance_model->getCaseid($insId);
		$tmp = $this->task_model->getTaskDetails($caseId,$taskId);
		//ref和suggestions
		$refAndSug = $this->task_model->getTaskRefAndSuggestions($insId,$taskId);
		$status = $this->task_model->getTaskStatus($insId,$taskId);
		switch($status){
			case TASK_STATUS_UNREADY:
				$statusName = "任务尚未开始";
			break;
			case TASK_STATUS_READY:
				$statusName = "任务尚未开始";
			break;
			case TASK_STATUS_UNCONFIRMED:
				$statusName = "任务尚未开始";
			break;
			case TASK_STATUS_ONGOING:
			case TASK_STATUS_STARTED:
				$statusName = "任务已经开始";
			break;
			case TASK_STATUS_COMPLETED:
				$statusName = "任务已经结束";
			break;
			case TASK_STATUS_WAITING_FINISH:
				$statusName = "任务等待结束";
			break;
			default:
				$statusName = "错误的任务状态";
			break;
		}
		$taskFile = site_url("project/taskfile"."/".$taskId);
		$uploadFile = site_url("project/upload"."/".$taskId);
		$taskPre = $this->task_model->getTaskPredecessors($caseId,$taskId);
		$taskNext = $this->task_model->getTaskSucecessors($caseId,$taskId);
		$isInTask = $this->isInTask($insId,$taskId);

		$data['task'] = array(
			'taskName' => $tmp['taskname'],
			'taskPre' => $taskPre,
			'description' => $tmp['description'],
			'WBS' => $tmp['WBS'],
			'duration' => $tmp['duration'],
		    'inputs' => $this->task_model->getTaskInputs($insId,$taskId),
			'outputs' => $this->task_model->getTaskOutputs($insId,$taskId),
			'taskNext' => $taskNext,
			'reference' => $refAndSug['reference'],
			'suggestions' => $refAndSug['suggestions'],
			'status' => $statusName,
			'taskFileAdd' => $taskFile,
			'taskFileUpload' => $uploadFile,
			'isInTask' => $isInTask
		);

		if($this->instance_model->isPM($insId,$this->session->userdata('user_id')) == TRUE){
			$data['role'] = '0';
		}
		else $data['role'] = '1';
		$data['taskId'] = $taskId;
		$data['playerName'] = $this->task_model->getTaskPlayersAndActors($insId,$taskId);
		$temp = $this->instance_model->getRoleInInstance($insId,$this->session->userdata('user_id'));
		$data['roleName'] = $temp['roleName'];
		
		return $data;
	}
	
	private function _dataFacTaskStatusArray($displayType,$displayName,$opType){
		return array(
			'displayType' => $displayType,
			'displayName' => $displayName,
			'opType' => $opType,
		);
	}
	
	private function _dataFacTaskDetailStatus($insId,$taskId,$userId){
		if($this->instance_model->isInstructor($insId,$userId)){
			$data[0] = $this->_dataFacTaskStatusArray("button","查看任务文档","displayTaskFiles");
			return $data;
		}
		$taskStatus = $this->task_model->getTaskStatus($insId,$taskId);
		if($taskStatus == '-1') return '';
		switch($taskStatus){
			case TASK_STATUS_UNREADY:
				$data[0] = $this->_dataFacTaskStatusArray("text","该任务尚未开始","none");
			break;
			case TASK_STATUS_READY:
				if($this->instance_model->isPM($insId,$userId)){
					$data[0] = $this->_dataFacTaskStatusArray("button","开始任务","beginTask");
				}else {
					$data[0] = $this->_dataFacTaskStatusArray("text","该任务尚未开始","none");
				}
			break;
			case TASK_STATUS_UNCONFIRMED:
				if($this->task_model->isUserInTask($insId,$taskId,$userId)){
					$data[0] = $this->_dataFacTaskStatusArray("button","确认开始","confirmTask");
				}else{
					$data[0] = $this->_dataFacTaskStatusArray("text","该任务尚未开始","none");
				}
			break;
			case TASK_STATUS_ONGOING:
			case TASK_STATUS_STARTED:
				$data[0] = $this->_dataFacTaskStatusArray("button","查看任务文档","displayTaskFiles");
				if($this->task_model->isUserInTask($insId,$taskId,$userId)){
					$data[1] = $this->_dataFacTaskStatusArray("button","上传任务需求文件","uploadTaskFile");
				}			
			break;
			case TASK_STATUS_COMPLETED:
				$data[0] = $this->_dataFacTaskStatusArray("button","查看任务文档","displayTaskFiles");
			break;
			case TASK_STATUS_WAITING_FINISH:
				if($this->instance_model->isPM($insId,$userId)){
					$data[0] = $this->_dataFacTaskStatusArray("button","结束任务","finishTask");
				}else {
					$data[0] = $this->_dataFacTaskStatusArray("text","文档就绪，等待项目经理结束","none");
				}
			break;
			default:
				return ;
			break;			
		}
		return $data;
	}
	
	private function _dataFacEvaData($insId,$taskId,$userId){
		$this->load->model('evaluationmodel');
		$data = array(
			'targetUserName' => $this->usermodel->getUsernameByUserid($userId),
			'targetUserId' => $userId,
			'actualTime' => $this->evaluationmodel->getTaskCompletedTime($insId,$taskId),
			'acceptno' => $this->evaluationmodel->getDenies($insId,$taskId) + 1,
			'query' => $this->evaluationmodel->getMemberDetails($insId,$taskId,$userId)
		);
		return $data;
	}

	private function isInTask($insId,$taskId){
		$roles = $this->casemodel->getRoleidInTask($this->instance_model->getCaseid($insId),$taskId);
		foreach($roles as $role){
			$playerid = $this->role_model->getRolePlayerid($insId, $role['resourceid']);
			if($playerid == $this->session->userdata('user_id')){
				return true;
			}
		}
		return false;
	}
	
	function getTaskDetails(){
		$insId = $this->session->userdata('ins_id');
		$taskId = $this->input->post('taskId');
		$data = $this->_dataFacTaskDetail($insId,$taskId);
		$data['isInstructor'] = $this->instance_model->isInstructor($insId,$this->session->userdata('user_id'));
		$data['taskStatus'] = $this->_dataFacTaskDetailStatus($insId,$taskId,$this->session->userdata('user_id'));
		$tmp = $this->task_model->getTaskPlayersAndActors($insId,$taskId);
		$data['evaInfo'] = ($tmp['actorId'] == '-1')?'-1':$this->_dataFacEvaData($insId,$taskId,$tmp['actorId']);

		$this->load->view('project/tasks/taskDetail_view',$data);
	}
	
	private function _opBeginTask($insId,$taskId,$userId){
		if(!$this->instance_model->isPM($insId,$userId)){
			echo $this->xmlmodel->returnXmlFactory('0',"您不是PM，无法完成操作!");
			exit;
		}
		if($this->task_model->opBeginTask($insId,$taskId)){
			$taskPlayer = $this->task_model->getTaskPlayer($insId,$taskId);
//			if($taskPlayers == '-1'){	//all computers
//				$this->_opCheckConfirm($insId,$taskId,TASK_PLAYER_ALL_COMPUTERS);
//			}else{
				if(!$this->task_model->setPlayersUnconfirm($insId,$taskId,$taskPlayer)){
					echo $this->xmlmodel->returnXmlFactory('0',"无法开启确认面板!");
					exit;
				}
				
/*				for($i = 0; $i < count($taskPlayer); $i++)
					$taskCharger[$i] = $taskPlayer[$i]['roleId'];*/
				$taskCharger = $taskPlayer['roleId'];
				$logParam = array(
					'insId' => $insId,
					'taskId' => $taskId,
					'msgType' => NEWS_TASK_WAITING_CONFIRM,
					'taskCharger' => $taskCharger,
				);
				
				$this->news_model->logMessage($logParam);
				echo $this->xmlmodel->returnXmlFactory('1',"任务开始成功,等待任务负责人确认!");
				exit;
			}
	//	}
		else{ 
			echo $this->xmlmodel->returnXmlFactory('0',"操作失败，请稍后重试!");
			exit;
		}
	}
	
	private function _opConfirmTask($insId,$taskId,$userId){
		if(!$this->task_model->isUserInTask($insId,$taskId,$userId)){
			echo $this->xmlmodel->returnXmlFactory('0',"您并未参与该任务!");
			exit;
		}
		$role = $this->usermodel->getUserPlayingRole($insId,$userId);
		if(!$this->task_model->opConfirmTask($insId,$taskId,$role['roleId'])){
			echo $this->xmlmodel->returnXmlFactory('0',"操作失败，请稍后重试!");
			exit;
		}else{
			$userId = $this->session->userdata('user_id');
			$userName = $this->usermodel->getUsernameByUserid($userId);
			$logParam = array(
				'insId' => $insId,
				'taskId' => $taskId,
				'msgType' => NEWS_TASK_WAITING_OTHERS_CONFIRM,
				'userInfo' => array('userId' =>$userId,'userName' => $userName ),
			);
			$this->news_model->logMessage($logParam);
			echo $this->xmlmodel->returnXmlFactory('1',"任务确认成功！");
			exit;
		}
	}
	
	private function _opCheckConfirm($insId,$taskId,$isAllComputer = TASK_PLAYER_USERS){
		if($this->task_model->checkConfirmFinish($insId,$taskId)){
			if($this->_opStartTask($insId,$taskId)){
				$logParam = array(
					'insId' => $insId,
					'taskId' => $taskId,
					'msgType' => NEWS_TASK_START
				);
				$this->news_model->logMessage($logParam);
				echo $this->xmlmodel->returnXmlFactory('1',"所有成员确认完毕，任务正式开始！");
				exit;
					
				/*if($isAllComputer == TASK_PLAYER_USERS ){
					echo $this->xmlmodel->returnXmlFactory('1',"所有成员确认完毕，任务正式开始！");
					exit;
				}else{	//all computers
					echo $this->xmlmodel->returnXmlFactory('3',"任务开始完毕！");
					exit;
				}*/
			}else{
				echo $this->xmlmodel->returnXmlFactory('0',"开始任务错误!");
				exit;
			}
		}
	}
	
	private function _opReadyFinishTask($insId,$taskId,$userId){
		if($this->task_model->opReadyFinishTask($insId,$taskId)){
			$time =  $this->time_model->getTimeStamp();
			$logParam = array(
					'insId' => $insId,
					'taskId' => $taskId,
					'time' => $time,
					'msgType' => NEWS_TASK_WAITING_FINISH
				);
				$this->news_model->logMessage($logParam);
			echo $this->xmlmodel->returnXmlFactory('1',"文档准备就绪，等待项目经理结束");
			exit;
		}else{
			echo $this->xmlmodel->returnXmlFactory('0',"转换任务状态失败，请稍后重试！");
			exit;
		}
	}
	
	private function _opStartTask($insId,$taskId){
		return $this->task_model->opStartTask($insId,$taskId);
	}
	
	private function _opFinishTask($insId,$taskId,$userId = '-1'){
		$this->load->model('evaluationmodel');
		$isAllTasksFinished = false;
		$evaProFlag = false;
		$evaTaskFlag = false;
		$sucecessorFlag = false;
		
		if($this->task_model->opFinishTask($insId,$taskId)){
			$logParam = array(
						'insId' => $insId,
						'taskId' => $taskId,
						'msgType' => NEWS_TASK_ALREADY_FINISHED
					);
			$this->news_model->logMessage($logParam);
			
			//judge task evaluation
			$actualTime = $this->evaluationmodel->getTaskCompletedTime($insId,$taskId);
			$msg = '';
			$evaTaskFlag = $this->_opStartTaskEva($insId,$taskId,$msg);
			if($evaTaskFlag == false && $msg != '-1'){
				echo $this->xmlmodel->returnXmlFactory('-1',$msg);
				exit;
			}
			
			//judge whole project, and then open project evaluation
			if($this->instance_model->isAllTasksFinished($insId)){
				$tasksFinishTime = $this->task_model->getTaskFinishTime($insId,$taskId);
				if(!$this->instance_model->setTasksFinishedTime($insId,$tasksFinishTime)){
					echo $this->xmlmodel->returnXmlFactory('-1',"设置任务完成时间失败！");
					exit;
				}
				$isAllTasksFinished = true;
				$evaProFlag = $this->_opStartProEva($insId,$msg);
				if($evaProFlag == false){
					echo $this->xmlmodel->returnXmlFactory('-1',$msg);
					exit;
				}
			} 
			
			//ready sucecessor tasks
			if(!$isAllTasksFinished){
				$caseId = $this->instance_model->getCaseid($insId);
				$sucecessorTasks = $this->task_model->getTaskSucecessors($caseId,$taskId);
				$sucecessorFlag = true;
				foreach($sucecessorTasks as $successor){
					if(!$this->task_model->opReadyTask($insId,$successor['taskid'])){
						$sucecessorFlag = false;
						break;
					}else{
						//log news
						$params = array(
							'insId' => $insId,
							'taskId' => $successor['taskid'],
							'msgType' => NEWS_TASK_WAITING_BEGIN,
						);
						$this->news_model->logMessage($params);
					}
				}
				if(!$sucecessorFlag){
					echo $this->xmlmodel->returnXmlFactory('-1',"无法开启新任务！");
					exit;
				}
				
				// whether task evaluation opened
				if($evaTaskFlag){
					echo $this->xmlmodel->returnXmlFactory('2',$actualTime);
					exit;
				}else{
					echo $this->xmlmodel->returnXmlFactory('1',"任务结束成功！后续任务准备就绪！");
					exit;
				}
			}else{
				//all tasks finished
				if($evaTaskFlag){
					echo $this->xmlmodel->returnXmlFactory('4',$actualTime);
					exit;
				}else{
					echo $this->xmlmodel->returnXmlFactory('3',"所有任务都已结束，评价系统开启！");
					exit;
				}
			}
			
		}else{
			echo $this->xmlmodel->returnXmlFactory('0',"错误，未能结束任务！");
			exit;
		}
	}
	
	private function _opStartTaskEva($insId,$taskId,&$msg){
		$msg = '-1';
		$evaType = $this->evaluationmodel->getEvaType($insId);
		if($evaType == '-1'){
			$msg = "错误的评价类型！";
			return false;
		}
		$tmp = $this->task_model->getTaskPlayersAndActors($insId,$taskId);
		if($evaType == EVA_TYPE_EACHTASK && $tmp['actorId'] != '-1'){
			if(!$this->evaluationmodel->setPmEvaOpen($insId,$taskId)){
				$msg = "无法开启评价系统！";
				return false;
			}else{
				return true;
			}
		}
		return false;
	}
	
	private function _opStartProEva($insId,&$msg){
//project evaluation open
		if(!$this->evaluationmodel->setProEvaOpen($insId)){
			$msg = "无法开启评价系统！";
			return false;
		}
		return true;
	}
	
	

/**
 * task operations handler.
 * like startTask, ConfirmTask
 * @return none
 */	
	function taskOpHandler(){
		header("Content-Type: text/xml");
		$opType = $this->input->post('opType');
		$taskId = $this->input->post('taskId');
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');

		switch($opType){
			case 'beginTask':	//begin task
				$this->_opBeginTask($insId,$taskId,$userId);
			break;
			case 'confirmTask':	//confirm task
				$this->_opConfirmTask($insId,$taskId,$userId);
			break;
			case 'checkConfirm':
				$this->_opCheckConfirm($insId,$taskId);
			break;
			case 'finishTask':
				$this->_opFinishTask($insId,$taskId,$userId);
			break;
			case 'readyFinishTask':
				$this->_opReadyFinishTask($insId,$taskId,$userId);
			break;
			default:
				echo "error opType";
			break;			
		}
	}
	
/**
 * instructor set reference and suggestion info
 * @return unknown_type
 */	
	function setTaskRefSug(){
		header("content-type:text/xml");
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
		if(!$this->instance_model->isInstructor($insId,$userId)){
			echo $this->xmlmodel->returnXmlFactory('0',"您不是指导者，无法完成该操作！");
			exit;
		}
		$data['ref'] = $this->input->post("ref");
		$data['suggestion'] = $this->input->post("sug");
		$taskId = $this->input->post("taskId");
		if($this->task_model->setTaskRefAndSuggestions($insId,$taskId,$data)){
			echo $this->xmlmodel->returnXmlFactory('1',"添加建议成功！");
			exit;
		}else{
			echo $this->xmlmodel->returnXmlFactory('0',"数据库错误，请稍后重试！");
			exit;
		}
	}
}