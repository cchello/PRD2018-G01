<?php
class Task_model extends Model
{
	function Task_model()
	{
		parent::Model();
		if(!defined("TASK_STATUS_UNREADY"))define("TASK_STATUS_UNREADY",'0');
		if(!defined("TASK_STATUS_READY"))define("TASK_STATUS_READY",'2');
		if(!defined("TASK_STATUS_UNCONFIRMED"))define("TASK_STATUS_UNCONFIRMED",'4');
		if(!defined("TASK_STATUS_ONGOING"))define("TASK_STATUS_ONGOING",'6');
		if(!defined("TASK_STATUS_STARTED"))define("TASK_STATUS_STARTED",'6');
		if(!defined("TASK_STATUS_WAITING_FINISH"))define("TASK_STATUS_WAITING_FINISH",'7');
		if(!defined("TASK_STATUS_COMPLETED"))define("TASK_STATUS_COMPLETED",'8');
		if(!defined("DOC_STATUS_UNREAD"))define("DOC_STATUS_UNREAD",'0');
		if(!defined("DOC_STATUS_ACCEPTED"))define("DOC_STATUS_ACCEPTED",'3');
		if(!defined("DOC_STATUS_DENIED"))define("DOC_STATUS_DENIED",'6');
	}
	
	function index(){
		
	}
	
//----------------------Task operations------------------------------------------	
/**
 * check a task's status , to see whethe it is status like $type 
 * @param int $insId
 * @param int $taskId
 * @param defined task status $type
 * @return bool
 */	
	private function _checkTaskStatus($insId,$taskId,$type){
		$this->db->where('instanceid', $insId);
		$this->db->where('taskid', $taskId);
		$resultArray = $this->db->get('instance_task')->row_array();
		if($resultArray['status'] != $type)return FALSE;
		return true;
	}
/**
 * check whethe all task managers have confirmed already
 * @param $insId
 * @param $taskId
 * @return bool
 */	
	function checkConfirmFinish($insId,$taskId){
		$this->db->where('insId',$insId);
		$this->db->where('taskId',$taskId);
		$all = $this->db->get('ins_task_confirm')->num_rows();
		$this->db->where('insId',$insId);
		$this->db->where('taskId',$taskId);
		$this->db->where('isConfirmed','1');
		$checked = $this->db->get('ins_task_confirm')->num_rows();
		return ($checked == $all)?true:false;
	}
	
/**
 * check whether all wanted docs have be passed by PM
 * if so , then we could opFinsiTask
 * @param $insId
 * @param $taskId
 * @return unknown_type
 */	
	function checkAllDocPassed($insId,$taskId){
		$caseId = $this->getCaseId($insId);
		$this->db->where('caseid',$caseId);
		$this->db->where('taskid',$taskId);
		$resultArray = $this->db->get('outputs')->result_array();
		//if it is empty, then return true becasue all docs passed
		if(empty($resultArray))return true;
		$numRows = count($resultArray);
		for($i = 0; $i < $numRows; $i++){
			$this->db->where('instanceid',$insId);
			$this->db->where('taskid',$taskId);
			$this->db->where('standardfileid',$resultArray[$i]['fileid']);
			$this->db->where('status',DOC_STATUS_ACCEPTED);
			if($this->db->get('newsubmits')->num_rows() <= '0') return false;
		}
		return true;
	}
	
/**
 * check whether all players in instance are computers
 * @param $insId
 * @param $taskId
 * @return '-1' or array->$chargePersons
 */	
	
 	function getTaskPlayer($insId,$taskId){
 		$chargePersons = $this->getTaskPlayersAndActors($insId,$taskId);
 		$allComputers = true;
		foreach($chargePersons as $chargePerson){
			if($chargePerson['actorId'] != '-1'){
				$allComputers = false;
				break;
			}
		}
//		return ($allComputers == true)?$chargePersons:'-1';
		return $chargePersons;
 	}
	
	function setPlayersUnconfirm($insId,$taskId,$chargePerson){
			if($chargePerson['actorId'] != '-1'){
				$data = array(
              		'insId' => $chargePerson['insId'],
					'taskId' => $chargePerson['taskId'],
					'roleId' => $chargePerson['roleId'],
					'isConfirmed' => '0'
          		);
				$this->db->insert('ins_task_confirm', $data); 	
			}
		return (mysql_error() == '')?TRUE:FALSE; 
	}
	
	function opReadyTask($insId,$taskId){
		$this->db->set('status', TASK_STATUS_READY);
		$this->db->where('instanceid', $insId);
		$this->db->where('taskid', $taskId);
		$this->db->update('instance_task');
		return (mysql_error() == '')?TRUE:FALSE;
	}
	
/**
 * Begin task, but still waiting for task manager to confirm--> opConfirmTask
 * @param $insId
 * @param $taskId
 * @return bool
 */	
	
	function opBeginTask($insId,$taskId){
/*		$chargePersons = $this->getTaskPlayersAndActors($insId,$taskId);
		$allComputers = true;
		foreach($chargePersons as $chargePerson){
			if($chargePerson['actorId'] != '-1'){
				$allComputers = false;
				$data = array(
              		'insId' => $chargePerson['insId'],
					'taskId' => $chargePerson['taskId'],
					'roleId' => $chargePerson['roleId'],
					'isConfirmed' => '0'
          		);
				$this->db->insert('ins_task_confirm', $data); 	
			}
		}*/
/*		
		if($allComputers == true){
			return $this->opStartTask($insId,$taskId,'1');
		}else{*/
			// set status to TASK_STATUS_UNCONFIRMED
			$this->db->set('status', TASK_STATUS_UNCONFIRMED);
			$this->db->where('instanceid', $insId);
			$this->db->where('taskid', $taskId);
			$this->db->update('instance_task');
			return (mysql_error() == '')?TRUE:FALSE;
//		}
	}

/**
 * task manager to confirm a task. 
 * if all task managers confirmed then opStartTask
 * @param $insId
 * @param $taskId
 * @param $userId
 * @return bool
 */	
	function opConfirmTask($insId,$taskId,$roleId){
		$this->db->where('insId',$insId);
		$this->db->where('taskId',$taskId);
		$this->db->where('roleId',$roleId);
		if($this->db->get('ins_task_confirm')->num_rows() > '0'){
			$this->db->where('insId',$insId);
			$this->db->where('taskId',$taskId);
			$this->db->where('roleId',$roleId);
			$this->db->set('isConfirmed','1');
			$this->db->update('ins_task_confirm');
			return (mysql_error() == '')?TRUE:FALSE;
		}else return true;
	}



/**
 * Start Task
 *
 * task a task
 *
 * @access	public  
 * @param	int     uid of instance  
 * @param   int     taskid in the instance    	
 * @return	bool
 */	
	function opStartTask($insId, $taskId,$caller = '0'){
		//get a record from instance_task
		$this->db->where('instanceid', $insId);
		$this->db->where('taskid', $taskId);
		$resultArray = $this->db->get('instance_task')->row_array();
		switch($caller){
			case '0':
				if(!$this->_checkTaskStatus($insId,$resultArray['taskid'],TASK_STATUS_UNCONFIRMED))
					return false;
			break;
			case '1':
				if(!$this->_checkTaskStatus($insId,$resultArray['taskid'],TASK_STATUS_READY))
					return false;
			break;
			default:
			break;
		}

		//else update instance_task
		$resultArray = $this->db->query("SELECT NOW()")->row_array();
		$startTime = $resultArray['NOW()'];
		$this->db->set('status', TASK_STATUS_STARTED);
		$this->db->set('starttime', $startTime);
		$this->db->where('instanceid', $insId);
		$this->db->where('taskid', $taskId);
		$this->db->update('instance_task');
		return (mysql_error() == '')?TRUE:FALSE;
	}
	
	function opReadyFinishTask($insId,$taskId){
		$this->db->where('instanceid', $insId);
		$this->db->where('taskid', $taskId);
		$resultArray = $this->db->get('instance_task')->row_array();
		if(!$this->_checkTaskStatus($insId,$resultArray['taskid'],TASK_STATUS_STARTED))return false;
		//update instance_task
		$this->db->set('status', TASK_STATUS_WAITING_FINISH);
		$this->db->where('instanceid', $insId);
		$this->db->where('taskid', $taskId);
		$this->db->update('instance_task');
		return (mysql_error() == '')?TRUE:FALSE;
	}
	
	function opFinishTask($insId, $taskId){	
		//get a record from instance_task
		$this->db->where('instanceid', $insId);
		$this->db->where('taskid', $taskId);
		$resultArray = $this->db->get('instance_task')->row_array();
		if(!$this->_checkTaskStatus($insId,$resultArray['taskid'],TASK_STATUS_WAITING_FINISH))return false;

		$resultArray = $this->db->query("SELECT NOW()")->row_array();
		$finishtTime = $resultArray['NOW()'];
		//update instance_task
		$this->db->set('status', TASK_STATUS_COMPLETED);
		$this->db->set('finishtime', $finishtTime);
		$this->db->where('instanceid', $insId);
		$this->db->where('taskid', $taskId);
		$this->db->update('instance_task');
		return (mysql_error() == '')?TRUE:FALSE;
	}
	

	/**
	 * isAllTaskPreFinished
	 *
	 * isAllTaskPreFinished,(visit task) check whether all predecessors are finished , if it is 
	 * true, then update the status of current task to ready
	 *
	 * @access	private  
	 * @param	int     uid of instance 
	 * @param   int     taskid of the case  	
	 * @return	bool
	 */		
	function isAllTaskPreFinished($insId, $taskId){
		//find out the predecessor tasks 
		$caseId = $this->getCaseid($insId);
		$predecessorTasks = $this->getTaskPredecessors($caseId,$taksId);
		//check whether all predecessors are finished
		foreach($predecessorTasks as $key => $value){
			//get the status of the task
			$this->db->where('instanceid', $insId);
			$this->db->where('taskid', $value['taskid']);
			$dataArray = $this->db->get('instance_task')->row_array();
			if($dataArray['status'] != TASK_STATUS_COMPLETED)return FALSE;
		}
		//update the status	
		return true;
	}
	
//---------------------get task informations-------------------------
/**
 * Get Task Starttime
 *
 *
 * @access	public  
 * @param	int     uid of instance 
 * @param	int     taskid	
 * @return	array
 */
	function getTaskStartTime($insId, $taskId){
		$result = $this->getTaskInfo($insId,$taskId);
		if($result)
			return $result['starttime'];
		return ;
	}
	
/**
 * Get Task Finishtime
 * @access	public  
 * @param	int     uid of instance 
 * @param	int     taskid	
 * @return	array
 */
	function getTaskFinishTime($insId, $taskId){
		$result = $this->getTaskInfo($insId,$taskId);
		if($result)
			return $result['finishtime'];
		return ;
	}
	
	private function getTaskInfo($insId,$taskId){
		$this->db->where('instanceid', $insId);
		$this->db->where('taskid', $taskId); 
		return $this->db->get('instance_task')->row_array();
	}
	
	function getTaskInputs($insId,$taskId){
		$caseId = $this->casemodel->getCaseid($insId);
		$sql = "SELECT * from inputs WHERE caseid=$caseId AND taskid=$taskId";
		return $this->db->query($sql)->result_array();
	}
	
	function getTaskOutputs($insId,$taskId){
		$caseId = $this->getCaseId($insId);
		$sql = "SELECT * from outputs WHERE caseid=$caseId AND taskid=$taskId";
		return $this->db->query($sql)->result_array(); 
	}

/**
 * get submited docs in a task
 * @param int $insId
 * @param int $taskId
 * @return array
 */	
 	function getSubmitsInTask($insId,$taskId){
 		$this->db->where('instanceid', $insId);
 		$this->db->where('taskid', $taskId);
 		return $this->db->get('newsubmits')->result_array();
 	}
	
/**
 * Get Task Details
 *
 *
 * @access	public
 * @param   int     caseid
 * @param	int	    taskid
 * @return	array
 */
 	function getTaskDetails($caseId, $taskId){	
//	  	$sql = "SELECT temp1.taskid, taskname, description, output
//				FROM (
//				SELECT * 
//				FROM tasks
//				WHERE (
//				tasks.caseid =$caseId
//				AND tasks.taskid =$taskId
//				)
//				) AS temp1
//				LEFT JOIN (
//				
//				SELECT * 
//				FROM outputs
//				WHERE (
//				outputs.caseid =$caseId
//				AND outputs.taskid =$taskId
//				)
//				) AS temp2 ON temp1.caseid = temp2.caseid";
	  	$sql = "select * from tasks where caseid =$caseId
				AND taskid =$taskId ";
 		return $this->db->query($sql)->row_array();
 	}
 	
 /**
  * 功能：返回指导者在该项目中填写的ref和suggest
  * @param $insId			： 项目ID
  * @param $taskId			： 任务ID
  * @return array
  */
 	function getTaskRefAndSuggestions($insId,$taskId){
 		$sql = "SELECT instanceid,taskid,reference,suggestions FROM instance_task WHERE instanceid=$insId AND taskid=$taskId";
 		return $this->db->query($sql)->row_array();
 	}
 	
/**
 * 功能：提交指导者的ref和suggestion
 * @param $insId		：项目ID
 * @param $taskId		：任务ID
 * @param $data			：包含REF和suggestion的数组
 * @return TRUE OR FALSE
 */
 	function setTaskRefAndSuggestions($insId,$taskId,$data){
 		$this->db->set('reference',$data['ref']);
 		$this->db->set('suggestions',$data['suggestion']);
		$this->db->where('instanceid', $insId);
		$this->db->where('taskid', $taskId);
		$this->db->update('instance_task');
		return mysql_error()==''?TRUE:FALSE;
 	}
 	

 /**
  * 功能：获得某个任务由哪个角色进行扮演
  * @param $caseId			案例ID
  * @param $taskId			任务ID
  * @return array：包括caseId,insId,taskId,roleId,role,roleName,actorId,playerName
  */
 	function getTaskPlayersAndActors($insId,$taskId){
 		$caseId = $this->getCaseId($insId);
 		$sql = "SELECT DISTINCT resources.caseid AS caseId,
 				instance_role.instanceid AS insId,
 				resources.taskid AS taskId,
 				roles.roleid AS roleId,
 				role AS role,
 				rolename AS roleName,
 				instance_role.actorid AS actorId 
				FROM resources
				INNER JOIN roles ON resources.resourceid = roles.roleid AND resources.caseid = roles.caseid
				INNER JOIN tasks ON resources.caseid = tasks.caseid AND resources.taskid = tasks.taskid
				INNER JOIN instance_role ON instance_role.roleid = roles.roleid
				LEFT JOIN users ON instance_role.actorid = users.uid
				WHERE resources.caseid =$caseId
				AND instance_role.instanceid = $insId
				AND resources.taskid =$taskId";
 /*		$sql = "SELECT DISTINCT resources.caseid,resources.taskid,resources.resourceid,roleid,role,rolename 
 		FROM resources 
 		INNER JOIN roles ON resources.resourceid=roles.roleid AND resources.caseid=roles.caseid 
 		INNER JOIN tasks ON resources.caseid=tasks.caseid AND resources.taskid=tasks.taskid 
 		WHERE resources.caseid=$caseId AND resources.taskid=$taskId";*/
 		return $this->db->query($sql)->row_array();
 	}
 	
/**
 * Get Predecessors 
 *
 *
 * @access	public
 * @param   int     caseid
 * @param	int	    taskid
 * @return	array
 */
 	function getTaskPredecessors($caseId, $taskId){
 			$sql = "SELECT taskid, taskname
				FROM tasks 
				WHERE caseid =$caseId
				AND
				taskid
				IN (
				
				SELECT predecessorid
				FROM dependencies
				WHERE (
				caseid =$caseId
				AND successorid =$taskId
				)
				)";
 		return $this->db->query($sql)->result_array();
 	}
 	
/**
 * Get Sucecessors 
 *
 *
 * @access	public
 * @param   int     caseid
 * @param	int	    taskid
 * @return	array
 */
 	function getTaskSucecessors($caseId, $taskId){	
 			$sql = "SELECT taskid, taskname
				FROM tasks
				WHERE caseid =$caseId
				AND
				taskid
				IN (
				
				SELECT successorid
				FROM dependencies
				WHERE (
				caseid =$caseId
				AND predecessorid =$taskId
				)
				)";
 		return $this->db->query($sql)->result_array();
 	}
 	
/**
 * Get Task Status
 *
 * @access	public
 * @param   int     instanceid
 * @param   int     taskid
 * @return	int
 */
 	function getTaskStatus($insId, $taskid){
 		$this->db->where('instanceid', $insId);
 		$this->db->where('taskid', $taskid);
 		$result = $this->db->get('instance_task')->row_array();
 		if($result) return $result['status'];
 		else return '-1';
 	}
 	
 	function isUserInTask($insId,$taskId,$userId){
 		$player = $this->getTaskPlayersAndActors($insId,$taskId);
 		if($player['actorId'] == $userId)return true;
 			else return false;
/* 		$caseId = $this->getCaseId($insId);
 		$sql = "SELECT DISTINCT caseid,taskid,instance_role.roleid AS roleid,instance_role.actorid AS actorid
 		FROM resources
 		INNER JOIN instance_role ON resources.resourceid=instance_role.roleid
 		WHERE resources.caseid=$caseId AND resources.taskid=$taskId";
 		$resultArray = $this->db->query($sql)->result_array();
 		foreach($resultArray as $actor){
 			if($actor['actorid'] == $userId)return true;
 		}
 		return false;*/
 	}
 	
 	private function getCaseId($insId){
 		$this->db->where('uid', $insId);
		$resultArray = $this->db->get('instances')->row_array();
		return $resultArray['caseid'];
 	}
}
	