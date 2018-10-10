<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
class Instance_model extends Model
{

	function Instance_model(){
		if(!defined("ROLE_INSTRUCTOR"))define("ROLE_INSTRUCTOR",'0');
		if(!defined("ROLE_PM"))define("ROLE_PM",'1');
		if(!defined("INS_STATUS_UNREADY"))define("INS_STATUS_UNREADY",'0');
		if(!defined("INS_STATUS_READY"))define("INS_STATUS_READY",'1');
		if(!defined("INS_STATUS_ONGOING"))define("INS_STATUS_ONGOING",'3');
		if(!defined("INS_STATUS_STARTED"))define("INS_STATUS_STARTED",'3');
		if(!defined("INS_STATUS_FINISHED"))define("INS_STATUS_FINISHED",'6');
		if(!defined("INS_ALL"))define("INS_ALL",'0');
		if(!defined("INS_ONGOING"))define("INS_ONGOING",'1');
		if(!defined("INS_FINISHED"))define("INS_FINISHED",'2');
		if(!defined("USER_ROLE_APPLYING"))define("USER_ROLE_APPLYING",'1');
		if(!defined("USER_ROLE_DENIED"))define("USER_ROLE_DENIED",'3');
		if(!defined("USER_ROLE_ACCEPTED"))define("USER_ROLE_ACCEPTED",'5');
		if(!defined("PLAYER_APPLYING"))define("PLAYER_APPLYING",'1');
		if(!defined("INSTRUCTOR_APPLYING"))define("INSTRUCTOR_APPLYING",'2');
		if(!defined("TASK_STATUS_UNREADY"))define("TASK_STATUS_UNREADY",'0');
		if(!defined("TASK_STATUS_READY"))define("TASK_STATUS_READY",'2');
		if(!defined("TASK_STATUS_UNCONFIRMED"))define("TASK_STATUS_UNCONFIRMED",'4');
		if(!defined("TASK_STATUS_ONGOING"))define("TASK_STATUS_ONGOING",'6');
		if(!defined("TASK_STATUS_STARTED"))define("TASK_STATUS_STARTED",'6');
		if(!defined("TASK_STATUS_WAITING_FINISH"))define("TASK_STATUS_WAITING_FINISH",'7');
		if(!defined("TASK_STATUS_COMPLETED"))define("TASK_STATUS_COMPLETED",'8');
		if(!defined("INCLUDE_CREATOR"))define("INCLUDE_CREATOR",'0');
		if(!defined("EXCLUDE_CREATOR"))define("EXCLUDE_CREATOR",'1');
		if(!defined("EVA_TYPE_EACHTASK"))define("EVA_TYPE_EACHTASK",'1');
		if(!defined("EVA_TYPE_ALLTASKFINISHED"))define("EVA_TYPE_ALLTASKFINISHED",'2'); //Modified by wmc 2010/06/09
		if(!defined("EVA_TYPE_FINALPROJECT"))define("EVA_TYPE_FINALPROJECT",'3');      //Modified by wmc 2010/06/09
		parent::Model();
	}

	function getInstanceByid($insId){
		$this->db->where('uid', $insId);
		return $this->db->get('instances')->row_array();
	}
	
	
/**
 * Get Actorid 
 *
 *
 * @access	public  
 * @param	int     uid of instance 	
 * @return	array(roleid,actorid);
 */
	function getActorid($insId){
		$sql = "SELECT roleid,actorid FROM instance_role WHERE instanceid=$insId";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function getInstances($type){
		switch($type){
			case INS_ALL:
				break;
			case INS_ONGOING:
				$this->db->where('status', INS_STATUS_ONGOING);
				break;
			case INS_FINISHED:
				$this->db->where('status', INS_FINISHED);
				break;
			default:
				break;
		}
		$query = $this->db->get('instances');
		return $query->result_array();
	}
	
	function getTasks($insId){
		$sql = "SELECT DISTINCT instance_task.taskid, instance_task.starttime, instance_task.finishtime,
					 instance_task.status,taskname, description, isparent, ismilestone, iscritical,
					  duration, earlystart, earlyfinish, latestart, latefinish
				FROM instance_task
				LEFT JOIN instances ON instance_task.instanceid = instances.uid
				INNER JOIN tasks ON instances.caseid = tasks.caseid AND instance_task.taskid = tasks.taskid
				WHERE instanceid =$insId and tasks.isparent=0 "; 
//				and tasks.ismilestone=0";     // milestone 事件也要显示出来 wmc20100701
		return $this->db->query($sql)->result_array();
	}
	
	function setTasksFinishedTime($insId,$time){
		$data = array(
			'tasksfinishtime' => $time,
		);
		$this->db->where('uid',$insId);
		$this->db->update('instances',$data);
		return (mysql_error() == '')?TRUE:FALSE;
	}

	/**
	 * Get Applying user list, whole users ,roles.
	 * @access	public
	 * @param   int
	 * @return	int
	 */
	function getApplyingUserList($insId){
		$sql = "SELECT count( DISTINCT userId )
				FROM userinsrole
				WHERE userinsrole.insId = $insId
				AND userinsrole.status = ".USER_ROLE_APPLYING;
		$result_array = $this->db->query($sql)->row_array();
		return $result_array['count( DISTINCT userId )'];
	}

/**
 * Get Input Files
 *
 * get all input files 
 * @access	public
 * @param   int     instanceid
 * @return	array
 */
 	function getInsInputFiles($insId){
 		//get caseid
 		$caseId = $this->getCaseid($insId);
 		
 		$sql = "SELECT taskid,input
				FROM (
				
				SELECT * 
				FROM inputs
				WHERE caseid =$caseId
				) AS temp1
				NATURAL JOIN (
				
				SELECT * 
				FROM instance_task
				WHERE instanceid =$insId
				AND status = ".TASK_STATUS_STARTED."
				) AS temp2";
 		return $this->db->query($sql)->result_array();
 	}
 	
/**
 * Get Output Files
 *
 * get all Output files 
 * @access	public
 * @param   int     instanceid
 * @return	array
 */
 	function getInsOutputFiles($insId){
 		//get caseid
/* 		$caseId = $this->getCaseid($insId);
 		$sql = "SELECT taskid,output
				FROM (
				
				SELECT * 
				FROM outputs
				WHERE caseid =$caseId
				) AS temp1
				NATURAL JOIN (
				
				SELECT * 
				FROM instance_task
				WHERE instanceid =$insId
				AND isfinished = 1
				) AS temp2";
 		return $this->db->query($sql)->result_array();*/
 		if($this->isInstructor($insId,$this->session->userdata('user_id'))){
			$caseid = $this->getCaseid($insId);
	 		$sql = "SELECT taskid,output FROM outputs WHERE caseid=$caseid";
	 		return $this->db->query($sql)->result_array();
 		}else return ;
 	}
 	
 /**
  * 功能：获得某一个项目的所有标准文档，用于指导者
  * @param $insId		：项目ID
  * @return array
  */	
 	function getAllOutputFiles($insId){
		$caseid = $this->getCaseid($insId);
 		$sql = "SELECT * FROM outputs WHERE caseid=$caseid";
 		return $this->db->query($sql)->result_array();
 	}
 	
/**
 * Get Caseid
 * @access	private
 * @param	int	    uid of instance
 * @return	int
 */
	function getCaseid($insId){
		$this->db->where('uid', $insId);
		$resultArray = $this->db->get('instances')->row_array();
		return $resultArray['caseid'];
	}	
 	
	/**
	 * Get Playing user list
	 * @access	public
	 * @param   int
	 * @return	int
	 */
	function getPlayingUserList($insId){
		$sql = "SELECT count( DISTINCT userid )
				FROM user_instance
				WHERE user_instance.isvalid = 1
				AND user_instance.instanceid = $insId";
		$result_array = $this->db->query($sql)->row_array();
		return $result_array['count( DISTINCT userid )'];
	}

	/**
	 * Get RolesInfo
	 * @access	public
	 * @param   int
	 * @return	array
	 */
	function getRolesInfo($insId){
		$caseId = $this->getCaseid($insId);
		$sql = "SELECT distinct 
		instance_role.roleid,instance_role.actorid,instance_role.status,roles.rolename,users.username,roles.description,roles.role AS responsbility 
		FROM instance_role 
		LEFT JOIN users ON instance_role.actorid=users.uid 
		LEFT JOIN roles ON instance_role.roleid=roles.roleid 
		WHERE roles.caseid=$caseId AND instance_role.instanceid=$insId";
/*		$sql = "SELECT *
				FROM (SELECT * FROM roles WHERE caseid = $caseId)AS tmp1
				NATURAL JOIN (SELECT * FROM instance_role WHERE instanceid = $insId)AS tmp2 ";*/
		return $this->db->query($sql)->result_array();
	}
	
/**
 * Get My Tasks
 * @access	public
 * @param   int     userid
 * @param	int	    uid of instance
 * @return	array
 */
	function getMyTasks($insId,$userId ){
		//get caseid
		$caseId = $this->getCaseid($insId);
		//get roleid
		$this->db->where('instanceid', $insId);
		$this->db->where('actorid', $userId);
		$result = $this->db->get('instance_role')->row_array();
		if(!$result)
			return ;
		$roleId = $result['roleid'];
		$sql = "SELECT * FROM tasks 
		INNER JOIN resources ON tasks.caseid=resources.caseid AND resources.taskid=tasks.taskid
		WHERE tasks.caseid=$caseId AND resources.resourceid=$roleId AND tasks.isparent=0";

		return $this->db->query($sql)->result_array();
	}
	
/**
 * Get Role In Instance

 * @access	public  
 * @param	int     uid of instance 	
 * @param   int     userid
 * @return	array
 */
	function getRoleInInstance($insId, $userId){
		//get caseid
		$caseId = $this->getCaseid($insId);
		//get roleid
		$this->db->where('instanceid', $insId);
		$this->db->where('actorid', $userId);
		$result = $this->db->get('instance_role')->row_array();
		if(!$result) return array('roleId' => '-2', 'roleName' => "尚未分配");
		$roleId = $result['roleid'];
		$this->db->where('caseid', $caseId);
		$this->db->where('roleid', $roleId);
		$result = $this->db->get('roles')->row_array();
/*		if(!$result)
			return array('roleId' => '-2', 'roleName' => "尚未分配");*/
		$roleName = $result['rolename'];
		return array('roleId' => $roleId, 'roleName' => $roleName);
	}
/**
 * return instance status
 * @param int $insId
 * @return int
 */	
	function getInsStatus($insId){
		$this->db->where('uid',$insId);
		$resultArray = $this->db->get('instances')->row_array();
		return $resultArray['status'];
	}

	//--------------------------------instance operation----------------------------

	/**
	 * Start Instance
	 *
	 *
	 * @access	public
	 * @param	int    uid of instance
	 * @return	bool
	 */
	function startInstance($insId,$evaType = EVA_TYPE_EACHTASK){
// get current time
		$resultArray = $this->db->query("SELECT NOW()")->row_array();
		$startTime = $resultArray['NOW()'];
// set instance to be INS_STATUS_STARTED
		$result = $this->db->query("SELECT now()")->row_array();
		$caseId = $this->getCaseid($insId);
		$data = array(
			'starttime' => $result['now()'],
			'progress' => 0,
			'status' => INS_STATUS_STARTED,
			'evaluationtype' => $evaType
		);
//sql start		
		$this->db->trans_start();
		$this->db->set($data);
		$this->db->where('uid', $insId);
		$this->db->update('instances');
		$this->db->trans_complete();
//get start point tasks 
		$this->db->where('caseid', $caseId);
		$this->db->where('predecessorid','0');	//'0' stand for the start point
		$tasks = $this->db->get('dependencies')->result_array();
		if(mysql_error() != '') return '-1';
//return start point tasks
		else return $tasks;	
		
		
/*--------------------------delete------------------------*/	
/*	
//set start point tasks to be TASK_STATUS_READY		
		foreach($tasks as $startTask){
			$this->db->where('instanceid',$insId);
			$this->db->where('taskid',$startTask['successorid']);
			$this->db->set('status',TASK_STATUS_READY);
			$this->db->set('starttime',$startTime);
			$this->db->update('instance_task');
		}
		$this->db->trans_complete();
//sql complete		
		return (mysql_error() == '')?TRUE:FALSE;
*/
/*----------------------------delete-----------------------*/
	}

	/**
	 * Finish Instance
	 * @access	public
	 * @param	int    uid of instance
	 * @return	bool
	 */
	function finishInstance($insId){
		$result = $this->db->query("SELECT now()")->row_array();
		$this->db->trans_start();
		$data = array(
			'finishtime' => $result['now()'],
			'progress' => 100,
			'status' => INS_STATUS_FINISHED,
		    'evaluationtype' => EVA_TYPE_FINALPROJECT,         //added by wmc 2010/06/09
			'evaluationstatus' => EVA_TYPE_FINALPROJECT        //added by wmc 2010/06/09
		);
		$this->db->trans_start();
		$this->db->set($data);
		$this->db->where('uid', $insId);
		$this->db->update('instances');
		//Update the value of finishedinstances int the case table
		//finishedinstances = finishedinstances + 1
		$caseId = $this->getCaseid($insId);
		$this->db->query("LOCK TABLE cases write");
		$this->db->query("SET @a=
		(SELECT finishedinstances 
		FROM cases 
		WHERE uid = $caseId)");
		$this->db->query("SET @a = @a + 1");
		$this->db->query("UPDATE  cases
		SET finishedinstances = @a
		WHERE uid = $caseId");
		$this->db->query("UNLOCK TABLES");
		//Delete the value of status in the user_instance table
		$this->db->where('instanceid', $insId);
		$this->db->delete('user_instance');
		$this->db->where('insId', $insId);
		$this->db->delete('userinsrole');
		$this->db->trans_complete();
		return (mysql_error() == '')?TRUE:FALSE;
	}
	
/**
 * Quit Instance 
 * quit a instance
 * @access	public
 * @param	int     uid of instance   
 * @param	int     uid of user   	
 * @return	bool
 */	
	function quitInstance($instanceid,  $userid){
		return;
//		return quitRole($instanceid,  $userid);
	}
	
/**
 * Ban user
 *
 * ban a user in a instance
 *
 * @access	public  
 * @param	int     uid of instance  
 * @param   int     uid of user 	
 * @return	bool
 */	
	function banUser($insId, $userId){
		
		$this->db->trans_start();
		//update user_instance
		$this->db->set('isvalid', 0);
		$this->db->where('instanceid', $insId);
		$this->db->where('userid',$userId);
		$this->db->update('user_instance');
		//update instance_role
		$this->db->set('actorid',0);
		$this->db->where('instanceid', $insId);
		$this->db->where('actorid',$userId);
		$this->db->update('instance_role');
		$this->db->trans_complete();
		return (mysql_error() == '')?TRUE:FALSE;
	}
	
/**
 * Is Finished
 *
 * check whether all tasks have finished
 *
 * @access	public  
 * @param	int     uid of instance   	
 * @return	bool
 */	
	function isAllTasksFinished($insId){
		$where = array(
			'instanceid' => $insId,
			'status !=' => TASK_STATUS_COMPLETED
		);
		$this->db->where($where);
/*		$this->db->where('instanceid', $insId);
		$this->db->where('isfinished', 0);*/
		return ($this->db->get('instance_task')->num_rows() == 0)?TRUE:FALSE;
	}

/**
 * judge whether a user is in a project
 * @param int $insId
 * @param int $userId
 * @param int $type: 
 * @return unknown_type
 */	
	function isInProject($insId,$userId,$type = INCLUDE_CREATOR){
		if($type == INCLUDE_CREATOR){
			if($this->isInsCreator($insId,$userId))return TRUE;
		}
		$actors = $this->getActorid($insId);
		foreach($actors as $actor){
			if($actor['actorid'] == $userId){
				return TRUE;
			}
		}
		return FALSE;
	}
	
	function isPM($insId,$userId){
		$roles = $this->getActorid($insId);
		if(!defined("PROJECT_MANAGER"))define("PROJECT_MANAGER",'1');
		foreach($roles as $row){
			if($row['roleid'] == PROJECT_MANAGER && $row['actorid'] == $userId){
				return TRUE;
			}
		}
		return FALSE;
	}
	
	function isInstructor($insId,$userId){
		$sql = "SELECT * from instance_role WHERE instanceid=$insId AND actorid= $userId AND roleId= 0";

//		$sql = "SELECT * from userinsrole WHERE insId=$insId AND userid=$userId AND roleId= '0' AND status=".USER_ROLE_ACCEPTED;
		$query = $this->db->query($sql);
		return ($query->num_rows() > 0)?TRUE:FALSE;
	}
	
	function isInsCreator($insId,$userId){
		$insInfo = $this->getInstanceByid($insId);
		return ($insInfo['creatorid'] == $userId)?TRUE:FALSE;
	}
// ------------------------------------------------------------------------

/**
 * Get Apply 
 *
 *
 * @access	public
 * @param   int         
 * @return	int
 */
	function getApplying($instanceid)
	{
		$sql = "SELECT count( DISTINCT userid ) 
				FROM applications
				WHERE applications.instanceid = $instanceid
				AND applications.ischecked = 0";
		$result_array = $this->db->query($sql)->row_array();
		return $result_array['count( DISTINCT userid )'];
	}	
// ------------------------------------------------------------------------

/**
 * Get Palying 
 *
 *
 * @access	public
 * @param   int         
 * @return	int
 */
	function getPlaying($instanceid)
	{
		$sql = "SELECT count( DISTINCT userid ) 
				FROM user_instance
				WHERE user_instance.isvalid = 1
				AND user_instance.instanceid = $instanceid";
		$result_array = $this->db->query($sql)->row_array();
		return $result_array['count( DISTINCT userid )'];
	}
	
	function isInstanceFinished($instanceId){
		$sql= "select status from instances where uid = $instanceId and status = {INS_STATUS_FINISHED}";
		$result = $this->db->query($sql);
		if($result->num_rows() > 0){
			return TRUE;
		}
		else return FALSE;
	}
}