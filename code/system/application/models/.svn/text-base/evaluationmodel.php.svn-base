<?php

class Evaluationmodel extends Model
{
	function Evaluationmodel()
	{
		parent::Model();
		if(!defined("INS_STATUS_UNREADY"))define("INS_STATUS_UNREADY",'0');
		if(!defined("INS_STATUS_READY"))define("INS_STATUS_READY",'1');
		if(!defined("INS_STATUS_ONGOING"))define("INS_STATUS_ONGOING",'3');
		if(!defined("INS_STATUS_STARTED"))define("INS_STATUS_STARTED",'3');
		if(!defined("INS_STATUS_FINISHED"))define("INS_STATUS_FINISHED",'6');
		if(!defined("EVA_TYPE_EACHTASK"))define("EVA_TYPE_EACHTASK",'1');
		if(!defined("EVA_TYPE_ALLTASKFINISHED"))define("EVA_TYPE_ALLTASKFINISHED",'2'); //Modified by wmc 2010/06/09
		if(!defined("EVA_TYPE_FINALPROJECT"))define("EVA_TYPE_FINALPROJECT",'3');      //Modified by wmc 2010/06/09
		if(!defined("TASK_STATUS_UNREADY"))define("TASK_STATUS_UNREADY",'0');
		if(!defined("TASK_STATUS_READY"))define("TASK_STATUS_READY",'2');
		if(!defined("TASK_STATUS_UNCONFIRMED"))define("TASK_STATUS_UNCONFIRMED",'4');
		if(!defined("TASK_STATUS_ONGOING"))define("TASK_STATUS_ONGOING",'6');
		if(!defined("TASK_STATUS_STARTED"))define("TASK_STATUS_STARTED",'6');
		if(!defined("TASK_STATUS_WAITING_FINISH"))define("TASK_STATUS_WAITING_FINISH",'7');
		if(!defined("TASK_STATUS_COMPLETED"))define("TASK_STATUS_COMPLETED",'8');
	}


// --------------------------------------------------------------------------	

	/**
 * Get all the instance'id that user take part in
 * 
 * get all instances id
 * @access public
 * @param $userId
 * @return array()
 * @edit by dw
 * 
 */	
	function getInstanceId($userId){
		$sql = "SELECT distinct instanceid    
        FROM evaluation_member
        where userid= $userId       
        ";
        $result= $this->db->query($sql)->result_array();
        if(!$result)
        {
        	return FALSE;
        }
     	return $result;
	}
		
// --------------------------------------------------------------------------	

	/**
 * Get all user's score
 * 
 * get user's history scroe in all instances
 * @access public
 * @param $userId
 * @return array()
 * @edit by dw
 */	
		
	function getUserScore($instanceId){	
  	    $sql =" SELECT score
                from evaluation_team
                where instanceid=$instanceId	
        	    ";
        $result= $this->db->query($sql)->result_array();    	        
        if(!$result)
        {
        	return FALSE;
        }
     	return $result;
	}	
	
// --------------------------------------------------------------------------	

	/**
 * Get all Case name
 * 
 * get user's case name in all instances
 * @access public
 * @param $userId
 * @return array()
 * @edit by dw
 */
	
	function getCaseName($instanceId){
        	 $sql="SELECT cases.casename
             from instances,cases
        	 where instances.uid=$instanceId
             and instances.caseid=cases.uid
        	 ";
        	 $result= $this->db->query($sql)->result_array();
        if(!$result)
        {
        	return FALSE;
        }
     	return $result;
	}
	
	
// --------------------------------------------------------------------------		
	
/**
 * Get history score
 * 
 * get user's history scroe in a instance
 * @access public
 * @param $instanceId $userId
 * @return array()
 * @edit by dw
 */
	
	function getHistoryScore($userId,$instanceId){
		$sql = "SELECT *    
        FROM evaluation_member
        where userid= $userId 
        and   instanceid = $instanceId
        and   taskid !=0
        ";
        $result= $this->db->query($sql)->result_array();
        if(!$result)
        {
        	return FALSE;
        } 
		return $result;
	}
	
// --------------------------------------------------------------------------		

/**
 * Get task name
 * 
 * get task name
 * @access public
 * @param $instanceId $userId
 * @return array()
 * @edit by dw
 */
	
	function getTaskNameFromIns($insId,$taskId){
		$sql = "SELECT taskname     
        FROM instances,tasks
        where instances.uid=$insId 
        and instances.caseid=tasks.caseid
        and tasks.taskid= $taskId
        ";
        $result= $this->db->query($sql)->result_array();
        if(!$result)
        {
        	return FALSE;
        } 
		return $result;
	}
	
	
// --------------------------------------------------------------------------		
	/**
	 * Get System Sscore
	 *
	 * 取得系统积分
	 * @access public
	 * @param uid
	 * @return score
	 */

	function getSystemScore($user_id)
	{
		$userid = $user_id;
		$this->db->select('score');
		$this->db->where('uid',$userid);
		$result_array = $this->db->get('users')->row_array();
		if(!$result_array)
		{
			return False;
		}
		return $result_array['score'];
	}
	
	// --------------------------------------------------------------------------
	/**
	 * Get Online Time
	 * get online time in pbcls system
	 * @access public
	 * @param uid
	 * @return onlinetime
	 */

	function getSystemOnlineTime($user_id)
	{
		$userid = $user_id ;
		$this->db->select('onlinetime');
		$this->db->where('uid',$userid);
		$result_array = $this->db->get('users')->row_array();
		if(!$result_array)
		{
			return False;
		}
		$totaltime = $result_array['onlinetime'];
		$h = floor($totaltime / 3600);
		$m = $totaltime % 3600;
		$i = floor($m / 60);
		$s = $m % 60;
		$data = array(
		    'hour' => $h,
		    'minute' => $i,
		    'second' => $s
		);
		return $h."小时".$i."分".$s."秒";
	}

	// --------------------------------------------------------------------------

	/**
	 * Update Online Time
	 * update the onlinetime when quited
	 * @param $userid
	 * @return unknown_type
	 */
	function updateOnlineTime($userid)
	{
		$logintime= $this->session->userdata('logintime');  //取得登录时记录的登陆时间戳
		//		$tm1 = date('y-m-d h:i:s',$logintime);              //把登陆时间戳转换成标准日期
		//		$tm2 = date('y-m-d h:i:s',time());                  //把推出登陆时的时间戳转换成标准日期
		//		$time1 = strtotime($tm1);
		//		$time2 = strtotime($tm2);
		//		$durationtime = $time2 - $time1;         //取得登陆后退出时之间的时间差		
		$time = time();
		$durationtime = $time - $logintime;
		$this->db->select('onlinetime');
		$this->db->where('uid',$userid);
		$lastonlinetime = $this->db->get('users')->row_array();
		$onlinetime = $durationtime + $lastonlinetime['onlinetime'];
		$data = array(
		    'onlinetime' => $onlinetime
		);
		$this->db->where('uid',$userid);
		$this->db->update('users',$data);
		//		echo $durationtime;
		//		die();
		if($this->db->affected_rows() == 0){
			return FALSE;
		}
	}
	// --------------------------------------------------------------------------

	function updateWorkday($userid)
	{
		$logintime= $this->session->userdata('logintime');
		if(!empty($logintime)){
			$time = time();
			$durationtime = $time - $logintime;
			//如果持续时间大于30分钟，则计为一个工作日
			$duration = ceil($durationtime / 3600);
			$instanceid = $this->session->userdata('ins_id');
			if(!empty($instanceid)){
				$taskid = 0;
				if($duration > 30){
					$sql = "select * from evaluation_member
				    where
				    instanceid = $instanceid and
				    userid = $userid and
				    taskid = $taskid";
					$query = $this->db->query($sql);
					if($query->num_rows() > 0){
						$sql2 = "update evaluation_member set workday=workday+1
					    where
					    instanceid=$instanceid and 
					    taskid=$taskid and 
					    userid=$userid
					    ";
						$this->db->query($sql2);
						if($this->db->affected_rows() >0){
							return true;
						}
						else return FALSE;
					}
					else {
						$data = array(
					    'userid' => $userid,
					    'taskid' => $taskid,
					    'instanceid' => $instanceid,
					    'workday'  => 1
						);
						$this->db->insert('evaluation_member',$data);
						if($this->db->affected_rows() >0){
							return true;
						}
						else return false;
					}
				}
			}
		}
	}

	//-------------------------------------------------------------------------------


	/**
	 * Get System Grade
	 *
	 * get grade in pbcls system
	 *
	 * @access public
	 * @param uid
	 * @return grade
	 */

	function getSystemGrade($user_id)
	{
		$userid = $user_id ;
		$this->db->select('finisheds');
		$this->db->where('uid',$userid);
		$result_array = $this->db->get('users')->row_array();
		if(!$result_array)
		{
			return False;
		}
		$finisheds = $result_array['finisheds'];
		$grade = "0";
		if($finisheds == 0)
		{
			$grade = 1;
			return $grade;
		}
		elseif ($finisheds>=1 && $finisheds<=5)
		{
			$grade = 2;
			return $grade;
		}
		elseif ($finisheds>=6 && $finisheds<=15)
		{
			$grade = 3;
			return $grade;
		}
		elseif ($finisheds>=16 && $finisheds<=30)
		{
			$grade = 4;
			return $grade;
		}
		elseif ($finisheds>=31 && $finisheds<=50)
		{
			$grade = 5;
			return $grade;
		}
		elseif ($finisheds>=51)
		{
			$grade = 6;
			return $grade;
		}
	}
	// --------------------------------------------------------------------------

	/**
	 * Get Team Mumber
	 *
	 * get team mumber in a instance
	 * @access public
	 * @param $instanceid
	 * @return array()
	 *
	 */

	function getTeamMember($caseid,$instanceid){
		$sql = "SELECT role,roles.roleid,rolename,uid, username
        FROM instance_role,roles,users
            where
            roles.caseid = $caseid
            and instance_role.instanceid = $instanceid
            and instance_role.roleid= roles.roleid
            and instance_role.actorid = users.uid";
		$result= $this->db->query($sql)->result_array();
		if(!$result)
		{
			return FALSE;
		}
		return $result;
	}
	// --------------------------------------------------------------------------
	/**
	 * Get Role ID
	 *
	 * get role from tale instance_role
	 * @access public
	 * @param $instanceid,$uid
	 * @return Roleid
	 */

	function getRoleId($instanceid,$userid)
	{
		$sql = "select roleid from instance_role
		where
		instanceid = $instanceid
		and actorid = $userid
		";
		$result = $this->db->query($sql)->row_array();
		if(!$result)
		{
			return False;
		}
		else return $result['roleid'];
	}

	// --------------------------------------------------------------------------


	/**
	 * Get Rolegroup
	 *
	 * get rolegoup of player
	 * @access public
	 * @param $instanceid,$uid
	 * @return int
	 */
	function getRolegroup($instanceid,$uid)
	{
		$sql = "select rolegroup from user_instance
		    where 
		    instanceid = $instanceid
		    and userid = $uid
		";
		$result= $this->db->query($sql)->row_array();
		if(!$result)
		{
			return False;
		}
		return $result['rolegroup'];

	}


	// --------------------------------------------------------------------------

	/**
	 * Member Self Evaluation
	 *
	 * Member to evaluate himself,
	 * first to confirm whether the user to be evaluated exists,
	 * if it exists ,then to update the userdate,
	 * if it dosen't exists, then to insert the userdata
	 *
	 *
	 * @param $userdata
	 * @param $taskid
	 * @param $userid
	 * @param $instanceid
	 * @return unknown_type
	 */
	function memberSelfEvaluation($userdata,$taskid,$userid,$instanceid)
	{
		$sql = " select * from evaluation_member
        where 
        instanceid = $instanceid and
        taskid = $taskid and
        userid = $userid
        ";
		$this->db->query($sql);
		$query = $this->db->query($sql)->num_rows();
		if($query >= 1)
		{
			$this->db->where('instanceid',$instanceid);
			$this->db->where('taskid',$taskid);
			$this->db->where('userid',$userid);
			$this->db->update('evaluation_member',$userdata);
			if($this->db->affected_rows() > 0)
			return TRUE;
			else
			return FALSE;
		}
		else
		{
			$this->db->where('instanceid',$instanceid);
			$this->db->where('taskid',$taskid);
			$this->db->where('userid',$userid);
			$this->db->insert('evaluation_member', $userdata);
			if($this->db->affected_rows() > 0)
			return TRUE;
			else
			return FALSE;

		}
	}

	function isEvaluated($taskid, $userid)
	{
		$sql= "select * from evaluation_member
		 where
		 taskid=$taskid and 
		 userid=$userid limit 1";
		$this->db->query($sql);
		if($this->db->affected_rows() >0 )
		return TRUE;
		return FALSE;

	}

	// ----------------------------------------------------------------------------------------
	/**
	 * Is Memberself Evaluated
	 *
	 * to judge whether the memberself is evaluated or not
	 *
	 * @param $taskid
	 * @param $userid
	 * @param $instanceid
	 * @param $self_attitude
	 * @return unknown_type
	 */
	function isMemberselfEvaluated($taskid, $userid,$instanceid,$self_attitude)
	{
		$sql = "select * from evaluation_member
		where
		 instanceid = $instanceid and
		 taskid=$taskid and 
		 userid=$userid and
		 self_attitude != 0  limit 1
		";
		$this->db->query($sql);
		if($this->db->affected_rows() >0 )
		{
			return TRUE;
		}
		else return False;
	}
	// --------------------------------------------------------------------------

	/**
	 * Is Member To Member Evaluated
	 *
	 * To judge whether the member is evaluated by this member who is the logining member or not
	 *
	 * @param $instanceid
	 * @param $taskid
	 * @param $userid
	 * @param $touserid
	 * @param $attitude
	 * @return unknown_type
	 */

	function isMemberToMemberEvaluated($instanceid,$taskid,$userid,$touserid,$attitude)
	{
		$sql = "select * from evaluation_mutual
		where
		instanceid = $instanceid and
		taskid = $taskid and
		userid = $userid and
		touserid = $touserid and
		attitude != 0  limit 1
		";
		$this->db->query($sql);
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else return FALSE;
	}

	// --------------------------------------------------------------------------
	/**
	 * Member Evaluate Member
	 *
	 * function for member to evaluate other team member
	 *
	 * @param $userdata
	 * @param $taskid
	 * @param $userid
	 * @param $instanceid
	 * @param $touserid
	 * @return unknown_type
	 */
	function memberEvaluateMember($userdata,$taskid,$userid,$instanceid,$touserid)
	{
		$this->db->where('instanceid',$instanceid);
		$this->db->where('taskid',$taskid);
		$this->db->where('userid',$userid);
		$this->db->where('touserid',$touserid);
		$this->db->insert('evaluation_mutual', $userdata);
		if($this->db->affected_rows() > 0)
		return TRUE;
		else
		return FALSE;
	}

	// -----------------------------------------------------------------------------------------

	/**
	 * Is Manager To Member Evaluated
	 *
	 * To judge whether the manager who is logining evaluated the team member or not
	 *
	 * @param $instanceid
	 * @param $taskid
	 * @param $userid
	 * @param $manager_attitude
	 * @return unknown_type
	 */
	function isManagerToMemberEvaluated($instanceid,$taskid,$userid,$manager_attitude)
	{
		$sql = "select * from evaluation_member
		where
		instanceid = $instanceid and
		taskid = $taskid and
		userid = $userid and
		manager_attitude != 0 limit 1
		";
		$this->db->query($sql);
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else return FALSE;
	}

	// --------------------------------------------------------------------------
	/**
	 * Mnager Evaluate Member
	 *
	 * Manger to evaluate member,
	 * first to confirm whether the user to be evaluated exists,
	 * if it exists ,then to update the userdate,
	 * if it dosen't exists, then to insert the userdata.
	 *
	 * @param $userdata
	 * @param $taskid
	 * @param $userid
	 * @param $instanceid
	 * @return unknown_type
	 */
	function managerEvaluateMember($userdata,$taskid,$userid,$instanceid)
	{
		$sql="select * from evaluation_member
		where
		instanceid = $instanceid and
		taskid = $taskid and
		userid = $userid
		";
		$query = $this->db->query($sql)->num_rows();
		if($query >= 1)
		{
			$this->db->where('instanceid',$instanceid);
			$this->db->where('taskid',$taskid);
			$this->db->where('userid',$userid);
			$this->db->update('evaluation_member',$userdata);
			if($this->db->affected_rows() > 0)
			{
				return TRUE;
			}
			else return FALSE;
		}
		else
		{
			$this->db->where('instanceid',$instanceid);
			$this->db->where('taskid',$taskid);
			$this->db->where('userid',$userid);
			$this->db->insert('evaluation_member',$userdata);
			if($this->db->affected_rows() > 0)
			{
				return TRUE;
			}
			else return FALSE;
		}
	}
	//----------------------------------------------------------------------------------

	function isInstructorToMemberEvaluated($instanceid,$taskid,$userid)
	{
		$sql = "select * from evaluation_member
		where
		instanceid = $instanceid and
		taskid = $taskid and
		userid = $userid and
		instructor_attitude IS NOT NULL
		";

		$query = $this->db->query($sql)->num_rows();

		if($query >= 1)
		{
			return TRUE;
		}
		else return FALSE;
	}

	function instructorEvaluateMember($userdata,$instanceid,$taskid,$userid)
	{
		$sql="select * from evaluation_member
		where
		instanceid = $instanceid and
		taskid = $taskid and
		userid = $userid
		";
		$query = $this->db->query($sql)->num_rows();
		if($query >= 1)
		{
			$this->db->where('instanceid',$instanceid);
			$this->db->where('taskid',$taskid);
			$this->db->where('userid',$userid);
			$this->db->update('evaluation_member',$userdata);

			return (mysql_error() == '')?TRUE:FALSE;
			/*
			 if($this->db->affected_rows() > 0)
			 {
			 return TRUE;
			 }
			 else return FALSE;		*/
		}
		else
		{
			$this->db->where('instanceid',$instanceid);
			$this->db->where('taskid',$taskid);
			$this->db->where('userid',$userid);
			$this->db->insert('evaluation_member',$userdata);

			return (mysql_error() == '')?TRUE:FALSE;

			//		    if($this->db->affected_rows() > 0)
			//		    {
			//		    	return TRUE;
			//		    }
			//		    else return FALSE;
		}
	}


	//----------------------------------------------------------------------------------
	function isInstructorToTeamEvaluated($instanceid,$taskid)
	{
		$sql = "select * from evaluation_team
		where
		instanceid = $instanceid and
		taskid = $taskid
		";
		$query = $this->db->query($sql)->num_rows();
		if($query >= 1)
		{
			return TRUE;
		}
		else return FALSE;
	}

	//-------------------------------------------------------------------
	/**
	 *
	 *
	 *
	 * @param $userdata
	 * @param $instanceid
	 * @param $taskid
	 * @return unknown_type
	 */
	function instructorEvaluateTeam($userdata,$instanceid,$taskid)
	{
		$this->db->where('instanceid',$instanceid);
		$this->db->where('taskid',$taskid);
		$this->db->insert('evaluation_team',$userdata);
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		return FALSE;
	}

	//--------------------------------------------------------------------------

	/**
	 * Change To Grade
	 * change all evaluation items to grade A,B,C,D
	 *
	 * @access public
	 * @param $data
	 * @return unknown_type
	 */
	function changeIntToGrade($data){
		switch ($data)
		{
			case 100: return "A";break;
			case 80:  return "B";break;
			case 60:  return "C";break;
			case 40:  return "D";break;
		}

	}
	//-----------------------------------------------------------------------
	/**
	 * Change Score To Grade
	 * change all float score to grade A,B,C,D
	 *
	 * @access pbulic
	 * @param $score
	 * @return unknown_type
	 */

	function changeFloatToGrade($score){
		if($score >=85.0 && $score <=100.0){
			return "A";
		}
		elseif ($score >=70.0 && $score <85.0){
			return "B";
		}
		elseif ($score >=55.0 && $score <70.0){
			return "C";
		}
		elseif ($score <55.0){
			return "D";
		}
	}
	//------------------------------------------------------------------------------
	/**
	 * Get Self Evaluation
	 *
	 *
	 * @param $instanceid
	 * @param $taskid
	 * @param $user_id
	 * @return unknown_type
	 */
	function getSelfEvaluation($instanceid,$taskid,$user_id){
		$sql = "select * from evaluation_member
		where
		instanceid = $instanceid and
		taskid = $taskid and
		userid = $user_id
		";
		$query = $this->db->query($sql)->row_array();
		if(!$query){
			return FALSE;
		}
		else{
			$data = array(
			'self_attitude'     => $this->changeIntToGrade($query['self_attitude']),
			'self_technique'    => $this->changeIntToGrade($query['self_technique']),
			'self_communication'=> $this->changeIntToGrade($query['self_communication']),
			'self_cooperation'  => $this->changeIntToGrade($query['self_cooperation']),
			'self_achievement'  => $this->changeIntToGrade($query['self_achievement']),
			'self_organization' => $this->changeIntToGrade($query['self_organization']),
			'self_decision'     => $this->changeIntToGrade($query['self_decision']),
			'self_score'        => $this->changeFloatToGrade($query['self_score']),
			'self_mark'         => $query['self_mark'],
			'self_expectation'  => $query['self_expectation']
			);
			return $data;
		}
	}

	function getSelfEvaluationScore($instanceid,$taskid,$user_id){
		$sql = "select * from evaluation_member
		where
		instanceid = $instanceid and
		taskid = $taskid and
		userid = $user_id
		";
		$query = $this->db->query($sql)->row_array();
		if(!$query){
			return FALSE;
		}
		else{
			return $query;
		}
	}


	/**
	 * Get Evaluation From Instructor
	 * get evaluation result from instrucotr
	 *
	 * @access public
	 * @param $instanceid
	 * @param $taskid
	 * @param $user_id
	 * @return unknown_type
	 */

	function getEvaluationFromInstructor($instanceid,$taskid,$user_id){
		$sql = "select * from evaluation_member
		where
		instanceid = $instanceid and
		taskid = $taskid and
		userid = $user_id
		";
		$query = $this->db->query($sql)->row_array();
		if(!$query){
			return False;
		}
		else{
			$data = array(
			'instructor_attitude'       => $this->changeIntToGrade($query['instructor_attitude']),
			'instructor_updownquantity' => $this->changeIntToGrade($query['instructor_updownquantity']),
			'instructor_updownquality'  => $this->changeIntToGrade($query['instructor_updownquality']),
			'instructor_bbsquantity'    => $this->changeIntToGrade($query['instructor_bbsquantity']),
			'instructor_bbsquality'     => $this->changeIntToGrade($query['instructor_bbsquality']),
			'instructor_score'          => $this->changeFloatToGrade($query['instructor_score']),
			'instructor_mark'	        => $query['instructor_mark']
			);
			return $data;
		}
	}

	function getInstructorEvaluationScore($instanceid,$taskid,$user_id){
		$sql = "select * from evaluation_member
		where
		instanceid = $instanceid and
		taskid = $taskid and
		userid = $user_id
		";
		$query = $this->db->query($sql)->row_array();
		if(!$query){
			return False;
		}
		else{
			return $query;
		}
	}
	//-------------------------------------------------------------------------------
	/**
	 *
	 *
	 * @param $instanceid
	 * @param $taskid
	 * @return unknown_type
	 */
	function getTeamEvaluationFromInstructor($instanceid,$taskid){
		$sql = "select * from evaluation_team
		where
		instanceid = $instanceid and
		taskid = $taskid
		";
		$query = $this->db->query($sql)->row_array();
		if(!$query){
			return FALSE;
		}
		else{
			$data = array(
			'updownno'        => $query['mark'],
			'downno'          => $query['downno'],
			'bbsno'           => $query['bbsno'],
			'updownquantity'  => $this->changeIntToGrade($query['updownquantity']),
			'updownquality'   => $this->changeIntToGrade($query['updownquality']),
			'bbsquantity'     => $this->changeIntToGrade($query['bbsquantity']),
			'bbsquality'      => $this->changeIntToGrade($query['bbsquality']),
			'docpasstime'     => $this->changeIntToGrade($query['docpasstime']),
			'docinnovation'   => $this->changeIntToGrade($query['docinnovation']),
			'doccorrectness'  => $this->changeIntToGrade($query['doccorrectness']),
			'docstyle'        => $this->changeIntToGrade($query['docstyle']),
			'score'           => $this->changeFloatToGrade($query['score']),
			'mark'            => $query['mark']
			);
			return $data;
		}
	}

	function getTeamEvaluationScore($instanceid,$taskid){
		$sql = "select * from evaluation_team
		where
		instanceid = $instanceid and
		taskid = $taskid
		";
		$query = $this->db->query($sql)->row_array();
		if(!$query){
			return FALSE;
		}
		else{
			return $query;
		}
	}

	//-------------------------------------------------------------------------------
	/**
	 *
	 *
	 * @param $instanceid
	 * @param $taskid
	 * @param $user_id
	 * @return unknown_type
	 */
	//	function getEvaluationFromManager($instanceid,$taskid,$user_id){
	//		$sql = "select * from evaluation_member
	//		where
	//		instanceid = $instanceid and
	//		taskid = $taskid and
	//		userid = $user_id
	//		";
	//		$query = $this->db->query($sql)->row_array();
	//		if(!$query){
	//			return FALSE;
	//		}
	//		else{
	//			$data = array(
	//			'manager_attitude'      => $this->changeIntToGrade($query['manager_attitude']),
	//			'manager_technique'     => $this->changeIntToGrade($query['manager_technique']),
	//			'manager_communication' => $this->changeIntToGrade($query['manager_communication']),
	//			'manager_cooperation'   => $this->changeIntToGrade($query['manager_cooperation']),
	//			'manager_docpasstime'   => $this->changeIntToGrade($query['manager_docpasstime']),
	//			'manager_docpassrate'   => $this->changeIntToGrade($query['manager_docpassrate']),
	//			'manager_doccorrectness'=> $this->changeIntToGrade($query['manager_doccorrectness']),
	//			'manager_docinnovation' => $this->changeIntToGrade($query['manager_docinnovation']),
	//			'manager_docstyle'      => $this->changeIntToGrade($query['manager_docstyle']),
	//			'manager_score'         => $this->changeFloatToGrade($query['manager_score']),
	//			'manager_mark'          => $query['manager_mark']
	//			);
	//			return $data;
	//		}
	//	}

	//这个函数取得经理对自己评价的各个任务的所有信息	
	function getEvaluationFromManager($instanceid,$userid){
		$sql="select * from evaluation_member
		where
		instanceid = $instanceid and
		userid = $userid
		";
		$query = $this->db->query($sql)->result_array();
		if($query){
			return $query;
		}
		else return FALSE;
	}

	//这个函数取得整个项目阶段经理对自己评价的平均分数
	function getManagerEvaluationScore($instanceid,$userid){
		$sql ="select AVG(manager_attitude) AS manager_attitude,
		AVG(manager_technique) AS manager_technique,AVG(manager_communication) AS manager_communication,
		AVG(manager_cooperation) AS manager_cooperation,AVG(manager_docpasstime) AS manager_docpasstime,
		AVG(manager_docpassrate) AS manager_docpassrate,AVG(manager_doccorrectness) AS manager_doccorrectness,
		AVG(manager_docinnovation) AS manager_docinnovation,AVG(manager_docstyle) AS manager_docstyle,
		AVG(manager_score) AS manager_score
		from evaluation_member
		where
		instanceid = $instanceid and
		userid = $userid
		";
		$query= $this->db->query($sql)->row_array();
		if(!$query){
			return FALSE;
		}
		else {
			return $query;
		}
	}
	//这个函数取得整个项目阶段经理对自己评价的平均分数对应的等级
	function getEvaluationResultFromManager($instanceid,$userid){
		$sql ="select AVG(manager_attitude) AS manager_attitude,
		AVG(manager_technique) AS manager_technique,AVG(manager_communication) AS manager_communication,
		AVG(manager_cooperation) AS manager_cooperation,AVG(manager_docpasstime) AS manager_docpasstime,
		AVG(manager_docpassrate) AS manager_docpassrate,AVG(manager_doccorrectness) AS manager_doccorrectness,
		AVG(manager_docinnovation) AS manager_docinnovation,AVG(manager_docstyle) AS manager_docstyle,
		AVG(manager_score) AS manager_score
		from evaluation_member
		where
		instanceid = $instanceid and
		userid = $userid
		";
		$query= $this->db->query($sql)->row_array();
		if(!$query['manager_score']){
			return FALSE;
		}
		else {
			$data = array(
			'manager_attitude'      => $this->changeIntToGrade($query['manager_attitude']),
			'manager_technique'     => $this->changeIntToGrade($query['manager_technique']),
			'manager_communication' => $this->changeIntToGrade($query['manager_communication']),
			'manager_cooperation'   => $this->changeIntToGrade($query['manager_cooperation']),
			'manager_docpasstime'   => $this->changeIntToGrade($query['manager_docpasstime']),
			'manager_docpassrate'   => $this->changeIntToGrade($query['manager_docpassrate']),
			'manager_doccorrectness'=> $this->changeIntToGrade($query['manager_doccorrectness']),
			'manager_docinnovation' => $this->changeIntToGrade($query['manager_docinnovation']),
			'manager_docstyle'      => $this->changeIntToGrade($query['manager_docstyle']),
			'manager_score'         => $this->changeFloatToGrade($query['manager_score']),
			);
			return $data;
		}
	}

	//-------------------------------------------------------------------------------
	/**
	 *
	 * 这个函数得到是除经理外所有组员对自己评价的综合结果
	 * @param $instanceid
	 * @param $taskid
	 * @param $user_id
	 * @return unknown_type
	 */
	//这个函数是取得组员对自己的评价的平均得分
	function getMemberEvaluationScore($instanceid,$taskid,$user_id){
		$sql ="select AVG(attitude) AS attitude,
		AVG(technique) AS technique,AVG(communication) AS communication, AVG(cooperation) AS cooperation,
		AVG(organization) AS organization,AVG(decision) AS decision,AVG(helpme) AS helpme,AVG(score) AS score
		from evaluation_mutual
		where
		instanceid = $instanceid and
		taskid = $taskid and
		touserid = $user_id
		";
		$query= $this->db->query($sql)->row_array();
		if(!$query['score']){
			return FALSE;
		}
		else {
			return $query;
		}
	}

	//这个函数是取得组员对自己的评价得分对应的等级
	function getEvaluationResultFromMember($instanceid,$taskid,$user_id){
		$sql ="select AVG(attitude),
		AVG(technique),AVG(communication), AVG(cooperation),
		AVG(organization),AVG(decision),AVG(helpme),AVG(score)
		from evaluation_mutual
		where
		instanceid = $instanceid and
		taskid = $taskid and
		touserid = $user_id
		";
		$query= $this->db->query($sql)->row_array();
		if(!$query['AVG(score)']){
			return FALSE;
		}
		else{
			$data = array(
		    'attitude'      => $this->changeFloatToGrade($query['AVG(attitude)']),
		    'technique'     => $this->changeFloatToGrade($query['AVG(technique)']),
		    'communication' => $this->changeFloatToGrade($query['AVG(communication)']),
		    'cooperation'   => $this->changeFloatToGrade($query['AVG(cooperation)']),
		    'organization'  => $this->changeFloatToGrade($query['AVG(organization)']),
		    'decision'      => $this->changeFloatToGrade($query['AVG(decision)']),
		    'helpme'        => $this->changeFloatToGrade($query['AVG(helpme)']),
		    'score'         => $this->changeFloatToGrade($query['AVG(score)']),
			);
			return $data;
		}

	}

	//这个函数是取得同组同学对自己评价的所有原始数据	
	function getEvaluationFromAllMember($instanceid,$taskid,$userid){
		$sql = "select evaluation_mutual.attitude,evaluation_mutual.technique,
		evaluation_mutual.communication,evaluation_mutual.cooperation,evaluation_mutual.organization,
		evaluation_mutual.decision,evaluation_mutual.helpme,evaluation_mutual.score,
		evaluation_mutual.mark,users.username	
		from evaluation_mutual left join users on evaluation_mutual.userid=users.uid
		where
		evaluation_mutual.instanceid = $instanceid and
		evaluation_mutual.taskid     = $taskid     and
		evaluation_mutual.touserid   = $userid
		";
		$query = $this->db->query($sql)->result_array();
		if($query){
			return $query;
		}
		else return FALSE;
	}


	//----------------------------------------------------------------------------------------
	function getMemberDetails($instanceid,$taskid,$id){
		$sql = "select * from evaluation_member
		where
		instanceid = $instanceid and
		taskid = $taskid and
		userid = $id";
		$query = $this->db->query($sql)->row_array();
		if(!$query){
			return FALSE;
		}
		else return $query;
	}

	function getTeamDetails($instanceid,$taskid){
		$sql = "select * from evaluation_team
		where
		instanceid = $instanceid and
		taskid = $taskid
		";
		$query = $this->db->query($sql)->row_array();
		if(!$query){
			return FALSE;
		}
		else return $query;
	}


	function getMilestone($caseid){
		$sql = "select taskid,taskname from tasks
		where
		caseid = $caseid and
		ismilestone = 1
		";
		$query = $this->db->query($sql)->result_array();
		if(!$query){
			return FALSE;
		}
		else return $query;
	}
	//--------------------------------------------------------------------------

	function getFinalTaskId($caseid){
		$sql = "select MAX(taskid) as taskid from tasks where caseid = 1";
		$result = $this->db->query($sql)->row_array();
		return  $result['taskid'] ;

	}
	function isFinished($instanceid)
	{
		$this->db->where('uid', $instanceid);
		$this->db->where('status', INS_STATUS_FINISHED);
		$query = $this->db->get('instances');
		if($query->num_rows() > 0)
		return TRUE;
		return FALSE;
	}
	function getPlayerRoleId($caseid,$taskid){
		$sql = "select resourceid from resources
		where
		caseid = $caseid and
		taskid = $taskid
		";
		$query= $this->db->query($sql)->row_array();
		if($query){
			return $query['resourceid'];
		}
		else return FALSE;
	}

	function getTaskName($caseid,$taskid){
		$sql = "select taskname from tasks
		where
		caseid = $caseid and
		taskid = $taskid
		";
		$query= $this->db->query($sql)->row_array();
		if($query){
			$taskname = $query['taskname'];
			return $taskname;
		}
		else{
			return FALSE;
		}
	}

	function getPlayerId($instanceid,$roleid){
		$sql= "select actorid from instance_role
		where
		instanceid = $instanceid and
		roleid     = $roleid
		";
		$query= $this->db->query($sql)->row_array();
		if($query){
			$actorid = $query['actorid'];
			return $actorid;
		}
		else return FALSE;

	}

	function getDenies($instanceid,$taskid){
		$sql = "select denies from instance_task
		where
		instanceid = $instanceid and
		taskid     = $taskid
		";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query['denies'];
		}
		else {
			return FALSE;
		}
	}

	function getTaskDuration($caseid,$taskid){
		$sql = "select duration from tasks
		where
		caseid = $caseid and
		taskid = $taskid
		";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query['duration'];
		}
		else return FALSE;
	}

	function getTaskTimeInfo($instanceid,$taskid){
		$sql = "select starttime,finishtime from instance_task
		where
		instanceid = $instanceid and
		taskid     = $taskid
		";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query;
		}
		else return FALSE;
	}

	function getTaskCompletedTime($instanceid,$taskid){
		$sql = "select starttime,finishtime from instance_task
		where
		instanceid = $instanceid and
		taskid     = $taskid and
		status = 8
		";
		$query = $this->db->query($sql)->row_array();
		if($query){
			$starttime  = strtotime($query['starttime']);
			$finishtime = strtotime($query['finishtime']);
			$duration   = $finishtime - $starttime;
			$days = ceil($duration / 86400);
			return $days;
		}
		else return FALSE;
	}




	function getUserId($instanceid,$taskid){

	}

	// ------------------------------------------------------------------------
	/**
	 * Get My Tasks
	 *
	 *
	 * @access	public
	 * @param   int     userid
	 * @param	int	    uid of instance
	 * @return	array
	 */
	function getMyTasks($instanceid,$userid )
	{
		//get caseid
		$caseid = $this->casemodel->getCaseid($instanceid);

		//get roleid
		$this->db->where('instanceid', $instanceid);
		$this->db->where('actorid', $userid);
		$result = $this->db->get('instance_role')->row_array();
		if(!$result)
		return ;
		$roleid = $result['roleid'];

		$sql = "SELECT *
				FROM `tasks` 
				NATURAL JOIN (
				
				SELECT * 
				FROM resources
				WHERE (
				caseid =$caseid
				AND resourceid  =$roleid
				)
				) AS temp";

		return $this->db->query($sql)->result_array();
	}
	//------------------------------------------------------------------
	/**
	 * 取得某个实例中用户的任务个数
	 * @param $instanceid
	 * @param $userid
	 * @return unknown_type
	 */
	function getTotalTaskNo($instanceid,$userid){
		$caseid = $this->casemodel->getCaseid($instanceid);

		//get roleid
		$this->db->where('instanceid', $instanceid);
		$this->db->where('actorid', $userid);
		$result = $this->db->get('instance_role')->row_array();
		if(!$result)
		return ;
		$roleid = $result['roleid'];

		//get total task no.
		$sql = "select count(taskid) as taskno from resources
		where
		caseid     = $caseid and
		resourceid = $roleid
		";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query['taskno'];
		}
		else return FALSE;

	}
	//-----------------------------------------------------------------
	/**
	 * 取得某个实例中某个用户的所有任务
	 * @param $instanceid
	 * @param $userid
	 * @return unknown_type
	 */
	function getAllMyTaskId($instanceid,$userid ){
		//get caseid
		$caseid = $this->casemodel->getCaseid($instanceid);

		//get roleid
		$this->db->where('instanceid', $instanceid);
		$this->db->where('actorid', $userid);
		$result = $this->db->get('instance_role')->row_array();
		if(!$result)
		return ;
		$roleid = $result['roleid'];

		$sql = "SELECT taskid
				FROM `tasks` 
				NATURAL JOIN (
				
				SELECT * 
				FROM resources
				WHERE (
				caseid =$caseid
				AND resourceid  =$roleid
				)
				) AS temp";

		return $this->db->query($sql)->result_array();
	}
	//-----------------------------------------------------------------
	/**
	 *
	 * 取得一次提交通过的任务次数
	 * @param $instanceid
	 * @param $userid
	 * @return unknown_type
	 */

	function isTaskFinished($instanceid,$taskid){
		$sql = "select status from instance_task
		where
		instanceid = $instanceid and
		taskid = $taskid
		";
		$query = $this->db->query($sql)->row_array();
		$status = $query['status'];
		if($status == 8){
			return TRUE;
		}
		else return FALSE;
	}

	function getTaskOnceFinishedNo($instanceid,$userid){
		//get all my taskid
		$data = $this->getAllMyTaskId($instanceid,$userid);

		//get the no. of all my oncetime finished task
		$count = 0;
		foreach ($data as $row)
		{
			$taskid = $row['taskid'];
			$finished = $this->isTaskFinished($instanceid,$taskid);
			if($finished){
				$sql = "select denies from instance_task
			    where
			    instanceid = $instanceid and
			    taskid = $taskid
			    ";
				$result = $this->db->query($sql)->row_array();
				if($result['denies'] == 0){
					$count = $count+1;
				}
			}
		}
		return $count;
	}
	//-----------------------------------------------------------------
	/**
	 * 取得按时完成的任务的个数
	 * @param $instanceid
	 * @param $userid
	 * @return unknown_type
	 */
	function getTaskOntimeFinishedNo($instanceid,$userid){
		//get all my taskid
		$data = $this->getAllMyTaskId($instanceid,$userid);
		$count = 0;
		$caseid = $this->casemodel->getCaseid($instanceid);
		foreach ($data as $row)
		{
			$taskid = $row['taskid'];
			$finished = $this->isTaskFinished($instanceid,$taskid);
			if($finished){
				$taskcompletedtime = $this->getTaskCompletedTime($instanceid,$taskid);
				$taskduration = $this->getTaskDuration($caseid,$taskid);

				if($taskcompletedtime <= $taskduration){
					$count = $count+1;
				}
			}
			//			$taskcompletedtime = $this->getTaskCompletedTime($instanceid,$taskid);
			//			$taskduration = $this->getTaskDuration($caseid,$taskid);
			//
			//			if($taskcompletedtime <= $taskduration){
			//				$count = $count+1;
			//			}
		}
		return $count;
	}
	//----------------------------------------------------------------------------
	/**
	 * 取得项目完成应花费的时间
	 * @param $caseid
	 * @return unknown_type
	 */

	function getCaseDuration($caseid){
		$sql = "select max(latefinish) as caseduration from tasks
		where
		caseid = $caseid
		";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query['caseduration'];
		}
		else return FALSE;
	}

	//------------------------------------------------------------------------
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
	 * 取得项目完成实际所用的时间
	 * @param $instanceid
	 * @return $days
	 */
	function getInstanceDuration($instanceid){
		if($this->isAllTasksFinished($instanceid)){
			$starttime   = strtotime($this->getInstanceStartTime($instanceid));
			$finishtime  = strtotime($this->getInsTasksFinishedTime($instanceid));
			$duration   = $finishtime - $starttime;
			$days = ceil($duration / 86400);
			return $days;
		}
		else return FALSE;


		//		$this->db->where('uid', $instanceid);
		//		$this->db->where('isfinished', 1);
		//		$query = $this->db->get('instances');
		//		if($query->num_rows() > 0){
		//			$sql = "select starttime,finishtime from instances
		//		    where
		//		    uid = $instanceid
		//		    ";
		//			$query = $this->db->query($sql)->row_array();
		//			if($query){
		//				$starttime  = strtotime($query['starttime']);
		//			    $finishtime = strtotime($query['finishtime']);
		//			    $duration   = $finishtime - $starttime;
		//			    $days = ceil($duration / 86400);
		//			    return $days;
		//			}
		//			else return FALSE;
		//		}
		//		else return FALSE;
	}

	function getInstanceStartTime($instanceid){
		if($this->isAllTasksFinished($instanceid)){
			$sql = "select starttime from instances
		    where
		    uid = $instanceid";
			$query = $this->db->query($sql)->row_array();
			if(!empty($query)){
				return $query['starttime'];
			}
			else return FALSE;
		}
		else return FALSE;
	}

	function getInstanceFinishedTime($instanceid){
		if($this->isAllTasksFinished($instanceid)){
			$sql = "select finishtime from instances
		    where
		    uid = $instanceid
		    ";
			$query = $this->db->query($sql)->row_array();
			if(!empty($query)){
				return $query['finishtime'];
			}
			else return FALSE;
		}
		else return FALSE;
	}

	function getInsTasksFinishedTime($instanceid){
		if($this->isAllTasksFinished($instanceid)){
			$sql = "select tasksfinishtime from instances
		    where
		    uid = $instanceid
		    ";
			$query = $this->db->query($sql)->row_array();
			if($query){
				return $query['tasksfinishtime'];
			}
			else return FALSE;
		}
		else return FALSE;
	}
	//--------------------------------------------------------------------------------------
	//下面几个函数是取得关于BBS讨论区相关数据的函数

	//取得个人发起的主题的个数	
	function getPersonSubjectTopicNo($instanceid,$userid){
		$starttime = $this->getInstanceStartTime($instanceid);
		if($this->isAllTasksFinished($instanceid)){
			$finishtime = $this->getInstanceFinishedTime($instanceid);
		}
		else $finishtime = date('Y-m-d h:i:s',now());
		$caseid = $this->casemodel->getCaseid($instanceid);
		$sql = "select count(authorid) as subjectno from bbs_subjects
			where
			authorid = $userid and
			caseid   = $caseid and
			submittime between '$starttime' and '$finishtime' ";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query['subjectno'];
		}
		else return FALSE;
	}


	//取得个人回复的主题的个数	
	function getPersonReplyTopicNo($instanceid,$userid){
		$starttime = $this->getInstanceStartTime($instanceid);
		if($this->isAllTasksFinished($instanceid)){
			$finishtime = $this->getInstanceFinishedTime($instanceid);
		}
		else $finishtime = date('Y-m-d h:i:s',now());
		$caseid = $this->casemodel->getCaseid($instanceid);
		$sql = "select count(distinct subjectid) as topic from bbs_replys
			where
			authorid = $userid and
			submittime between '$starttime' and '$finishtime' ";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query['topic'];
		}
		else return FALSE;
	}

	//取得个人既发起又回复的主题的个数
	function getPersonSubmitAndReplyTopicNo($instanceid,$userid){
		$starttime = $this->getInstanceStartTime($instanceid);
		if($this->isAllTasksFinished($instanceid)){
			$finishtime = $this->getInstanceFinishedTime($instanceid);
		}
		else $finishtime = date('Y-m-d h:i:s',now());
		$caseid = $this->casemodel->getCaseid($instanceid);
		$sql = "select count(distinct bbs_replys.subjectid) as topic from bbs_replys,bbs_subjects
		where
		bbs_subjects.caseid   = $caseid and
		bbs_subjects.authorid = $userid and
		bbs_subjects.uid      = bbs_replys.subjectid and
		bbs_replys.submittime between '$starttime' and '$finishtime' and
		bbs_subjects.submittime between '$starttime' and '$finishtime'
		";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query['topic'];
		}
		else {
			return FALSE;
		}
	}

	//取得某个人参与讨论主题的个数	
	function getPersonAttendTopicNo($instanceid,$userid){
		$submittopic = $this->getPersonSubjectTopicNo($instanceid,$userid);
		$replytopic  = $this->getPersonReplyTopicNo($instanceid,$userid);
		$submitandreply = $this->getPersonSubmitAndReplyTopicNo($instanceid,$userid);
		$attendtopic = $submittopic + $replytopic - $submitandreply;
		if($attendtopic == null){
			return FALSE;
		}
		else {
			return $attendtopic;
		}
	}

	//取得小组所有回帖大于等于10的帖子的数量
	function getTeamValidTopicNo($instanceid){
		$starttime = $this->getInstanceStartTime($instanceid);
		if($this->isAllTasksFinished($instanceid)){
			$finishtime = $this->getInstanceFinishedTime($instanceid);
		}
		else $finishtime = date('Y-m-d h:i:s',now());
		$caseid = $this->casemodel->getCaseid($instanceid);
		$data = $this->getTeamMember($caseid,$instanceid);
		$topicno = 0;
		foreach ($data as $row){
			$userid = $row['uid'];
			$sql = "select count(uid) as topicno from bbs_subjects
			where
			authorid = $userid and
			replys >= 10 and
			submittime between '$starttime' and '$finishtime'
			";
			$query = $this->db->query($sql)->row_array();
			if($query){
				$topicno = $topicno + $query['topicno'];
			}
		}
		return $topicno;
	}
	//-----------------------------------------------------------------------------
	//以下几个函数是取得公共资料区相关上传、下载数据的函数

	//取得某个人上传文档的次数
	function getPersonUploadTimes($instanceid,$userid){
		$starttime = $this->getInstanceStartTime($instanceid);
		if($this->isAllTasksFinished($instanceid)){
			$finishtime = $this->getInstanceFinishedTime($instanceid);
		}
		else $finishtime = date('Y-m-d h:i:s',now());
		$caseid = $this->casemodel->getCaseid($instanceid);
		$sql = "select count(fileId) as uploadno from ref_contribute
		where
		caseId      = $caseid and
		uploaderId = $userid and
		uploadTime between '$starttime' and '$finishtime'
		";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query['uploadno'];
		}
		else return FALSE;
	}

	//取得某个人下载不同文档的次数
	function getPersonDownloadTimes($instanceid,$userid){
		$starttime = $this->getInstanceStartTime($instanceid);
		if($this->isAllTasksFinished($instanceid)){
			$finishtime = $this->getInstanceFinishedTime($instanceid);
		}
		else $finishtime = date('Y-m-d h:i:s',now());
		$sql = "select count(distinct fileId) as downloadno from ref_download
		where
		downloadUserId = $userid and
		downloadTime between '$starttime' and '$finishtime'
		";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query['downloadno'];
		}
		else return FALSE;
	}

	//取得某个人上传且下载同一个文档的次数
	function getPersonUploadAndDownloadTimes($instanceid,$userid){
		$starttime = $this->getInstanceStartTime($instanceid);
		if($this->isAllTasksFinished($instanceid)){
			$finishtime = $this->getInstanceFinishedTime($instanceid);
		}
		else $finishtime = date('Y-m-d h:i:s',now());
		$caseid = $this->casemodel->getCaseid($instanceid);
		$sql = "select count(distinct ref_download.fileId) as updownno from ref_download,ref_contribute
		where
		ref_download.downloadUserId = ref_contribute.uploaderId and
		ref_download.fileId = ref_contribute.fileId and
		ref_contribute.caseId = $caseid and
		ref_download.downloadTime between '$starttime' and '$finishtime'
		";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query['updownno'];
		}
		else return FALSE;
	}

	//取得某个人有效的上传下载次数
	function getPersonAttendUpDownTimes($instanceid,$userid){
		$uploadtimes = $this->getPersonUploadTimes($instanceid,$userid);
		$downloadtimes = $this->getPersonDownloadTimes($instanceid,$userid);
		$updowntimes = $this->getPersonUploadAndDownloadTimes($instanceid,$userid);
		$attendupdowntimes = $updowntimes + $downloadtimes - $updowntimes;
		if($attendupdowntimes == null){
			return FALSE;
		}
		else {
			return $attendupdowntimes;
		}
	}

	//取得某人上传的所有文档被下载的最大次数
	function getPersonDocDownloadTimes($instanceid,$userid){
		$starttime = $this->getInstanceStartTime($instanceid);
		if($this->isAllTasksFinished($instanceid)){
			$finishtime = $this->getInstanceFinishedTime($instanceid);
		}
		else $finishtime = date('Y-m-d h:i:s',now());
		$caseid = $this->casemodel->getCaseid($instanceid);
		$sql = "select max(downloadedTimes) as downloadtimes from ref_contribute
		where
		uploaderId = $userid and
		caseId = $caseid and
		uploadTime between '$starttime' and '$finishtime'
		";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query['downloadtimes'];
		}
		else return FALSE;

	}

	//取得小组所有资源上传下载的次数

	function getTeamDocUpDownTimes($instanceid){
		$starttime = $this->getInstanceStartTime($instanceid);
		if($this->isAllTasksFinished($instanceid)){
			$finishtime = $this->getInstanceFinishedTime($instanceid);
		}
		else $finishtime = date('Y-m-d h:i:s',now());
		$caseid = $this->casemodel->getCaseid($instanceid);
		$data = $this->getTeamMember($caseid,$instanceid);
		$updownno = 0;
		foreach ($data as $row){
			$userid = $row['uid'];
			$updownno = $updownno + $this->getPersonAttendUpDownTimes($instanceid,$userid);
		}
		return $updownno;
	}

	//取得小组所有上传的文档中被下载次数超过10次的文档个数
	function getTeamValidUpDownDocNo($instanceid){
		$starttime = $this->getInstanceStartTime($instanceid);
		if($this->isAllTasksFinished($instanceid)){
			$finishtime = $this->getInstanceFinishedTime($instanceid);
		}
		else $finishtime = date('Y-m-d h:i:s',now());
		$caseid = $this->casemodel->getCaseid($instanceid);
		$data = $this->getTeamMember($caseid,$instanceid);
		$validno = 0;
		foreach ($data as $row){
			$userid = $row['uid'];
			$sql = "select count(fileId) as validno from ref_contribute
			where
			uploaderId = $userid and
			caseId = $caseid and
			downloadedTimes >= 10 and
			uploadTime between '$starttime' and '$finishtime'
			";
			$query = $this->db->query($sql)->row_array();
			if($query){
				$validno = $validno + $query['validno'];
			}
		}
		return $validno;
	}
	//判断对组员个人的评价是否完成	2010/03/03
	function isEvaluationMemberEvaluated($instanceid){
		$sql = "select * from evaluation_member
		where 
		instanceid = $instanceid and
		taskid = 0
		";
		$query = $this->db->query($sql)->num_rows();
		if($query > 0){
			return TRUE;
		}
		else return FALSE;
	}
	//判断互评是否完成	2010/03/03
	function isEvaluationMutaulEvaluated($instanceid){
		$sql = "select * from evaluation_mutual
		where 
		instanceid = $instanceid and
		taskid = 0
		";
		$query = $this->db->query($sql)->num_rows();
		if($query > 0){
			return TRUE;
		}
		else return FALSE;
	}
	//判断指导者对小组的评价是否完成   2010/03/03
	function isEvaluationTeamEvaluated($instanceid){
		$sql = "select * from evaluation_team
		where 
		instanceid = $instanceid and
		taskid = 0
		";
		$query = $this->db->query($sql)->num_rows();
		if($query > 0){
			return TRUE;
		}
		else return FALSE;
	}
	function isInstanceEvaluationFinished($instanceid){
		$isEvaluationMemberEvaluated = $this->isEvaluationMemberEvaluated($instanceid);
		$isEvaluationMutaulEvaluated = $this->isEvaluationMutaulEvaluated($instanceid);
		$isEvaluationTeamEvaluated = $this->isEvaluationTeamEvaluated($instanceid);
		if($isEvaluationMemberEvaluated && $isEvaluationMutaulEvaluated && $isEvaluationTeamEvaluated){
			return TRUE;
		}
		else return FALSE;
	}



	//-------------------------------------------------------------------------------
	/**
	 * 测试用数据，用于向user_instance表添加一个小组的数据
	 * @return unknown_type
	 */
	function addTestData(){
		$data = array(
		'data1' => array(
		'userid'=> 3,
		'instanceid' =>2,
		'rolegroup' => 1
		),
		'data2' => array(
		'userid'=> 4,
		'instanceid' =>2,
		'rolegroup' => 2		
		),
		'data3' => array(
		'userid'=> 5,
		'instanceid' =>2,
		'rolegroup' => 2	
		),
		'data4' => array(
		'userid'=> 6,
		'instanceid' =>2,
		'rolegroup' => 2	
		),
		'data5' => array(
		'userid'=> 7,
		'instanceid' =>2,
		'rolegroup' => 2	
		),
		'data6' => array(
		'userid'=> 8,
		'instanceid' =>2,
		'rolegroup' => 3	
		)
		);

		foreach($data as $row)
		{
			$this->db->insert('user_instance',$row);
		}
		$query = $this->db->affected_rows();
		if($query >0)
		return TRUE;
		else return FALSE;
	}

	function deleteTestData()
	{
		$this->db->where('instanceid',2);
		$this->db->delete('user_instance');
		$query = $this->db->affected_rows();
		if($query >0)
		return TRUE;
		else return FALSE;

	}



	// added by cendy 2010 mar-1-20:17

	function setPmEvaOpen($insId,$taskId){
		$sql = "SELECT * FROM instances WHERE uid=$insId";
		$query = $this->db->query($sql);
		$data = $query->row_array();
		//		$status = $data['evaluationstatus'];          // modified by wmc 2010/06/10
		//		$status = $status | 0x01;                    // modified by wmc 2010/06/10

		$data = array(
		//			'evaluationstatus' => $status,                   // modified by wmc 2010/06/10
			'evaluationstatus' => EVA_TYPE_EACHTASK,         // modified by wmc 2010/06/10
			'lastevataskid' => $taskId
		);
		$this->db->set($data);
		$this->db->where('uid', $insId);
		$this->db->update('instances');
		return (mysql_error() == '')?TRUE:FALSE;
	}

	function setPmEvaClose($insId){
		$sql = "SELECT * FROM instances WHERE uid=$insId";
		$query = $this->db->query($sql);
		$data = $query->row_array();
		//		$status = $data['evaluationstatus'];         // modified by wmc 2010/06/10
		//		$status = $status & 0x10;                    // modified by wmc 2010/06/10

		$data = array(
		//			'evaluationstatus' => $status,           // modified by wmc 2010/06/10
			'evaluationstatus' => EVA_TYPE_ALLTASKFINISHED,  // modified by wmc 2010/06/10
			'lastevataskid' => '-1'
			);
			$this->db->set($data);
			$this->db->where('uid', $insId);
			$this->db->update('instances');
			return (mysql_error() == '')?TRUE:FALSE;
	}

	function setProEvaOpen($insId){
		$sql = "SELECT * FROM instances WHERE uid=$insId";
		$query = $this->db->query($sql);
		$data = $query->row_array();
		//		$status = $data['evaluationstatus'];    // modified by wmc 2010/06/10
		//		$status = $status | 0x10;              // modified by wmc 2010/06/10


		$data = array(
			'evaluationtype'   => EVA_TYPE_ALLTASKFINISHED,  //modified by wmc 2010/06/21
			'evaluationstatus' => EVA_TYPE_ALLTASKFINISHED  // modified by wmc 2010/06/10
		);
		$this->db->set($data);
		$this->db->where('uid', $insId);
		$this->db->update('instances');
		return (mysql_error() == '')?TRUE:FALSE;
	}

	/**
	 * @time 2010/06/09
	 * 用于设置evaluationStatus的值为3，从而不能再进行评价，但这个函数在项目中没有用到，这一功能在instance_model中的finishInstance函数中实现
	 * @param $insId
	 * @return unknown_type
	 */
	function setProEvaClose($insId){
		$sql = "SELECT * FROM instances WHERE uid=$insId";
		$query = $this->db->query($sql);
		$data = $query->row_array();
		$status = $data['evaluationstatus'];
		$status = $status & 0x01;

		$data = array(
			'evaluationstatus' => $status
		);
		$this->db->set($data);
		$this->db->where('uid', $insId);
		$this->db->update('instances');
		return (mysql_error() == '')?TRUE:FALSE;
	}

	function getEvaStatus($insId){
		$sql = "SELECT * FROM instances WHERE uid=$insId";
		$query = $this->db->query($sql);
		$data = $query->row_array();
		return (!empty($data))?$data['evaluationstatus']:'-1';
	}

	function getLastEvaTaskId($insId){
		$sql = "SELECT lastevataskid FROM instances WHERE uid=$insId";
		$query = $this->db->query($sql);
		$data = $query->row_array();
		return(!empty($data))?$data['lastevataskid']:'-1';
	}

	function getEvaType($insId){
		$sql = "SELECT * FROM instances WHERE uid=$insId";
		$query = $this->db->query($sql);
		$data = $query->row_array();
		return (!empty($data))?$data['evaluationtype']:'-1';
	}
// ----------------------------------------------------------
	/**
	 * wmc 2010/06/19
	 * 用于在user表中增加用户的系统得分
	 * @param unknown_type $userId
	 * @param unknown_type $score
	 */
	function addScore($userId,$score){
		$sql = "update users set score = score+ $score where uid=$userId";
		$this->db->query($sql);
	}

// ---------------------------------------------------------------------------------

/**
 * wmc 2010/06/19
 * 用于取得某个用户的最终项目得分等级
 * @param unknown_type $instanceid
 * @param unknown_type $taskid
 * @param unknown_type $userid
 */
	function getFinalEvaluationGrade($instanceid,$taskid,$userid){
		$selfEvaluationScore = $this->evaluationmodel->getSelfEvaluationScore($instanceid,$taskid,$userid);

		$memberEvaluationScore = $this->evaluationmodel->getMemberEvaluationScore($instanceid,$taskid,$userid);

		$managerEvaluationScore = $this->evaluationmodel->getManagerEvaluationScore($instanceid,$userid);

		$instructorEvaluationScore = $this->evaluationmodel->getInstructorEvaluationScore($instanceid,$taskid,$userid);

		$teamEvaluationScore = $this->evaluationmodel->getTeamEvaluationScore($instanceid,$taskid);

		$personEvaluationScore = $selfEvaluationScore['self_score'] * 0.1 + $memberEvaluationScore['score'] *0.2
		+ $managerEvaluationScore['manager_score'] *0.4 + $instructorEvaluationScore['instructor_score'] *0.3;

		$finalEvaluationScore = $personEvaluationScore *0.6 + $teamEvaluationScore['score'] *0.4;

		if($finalEvaluationScore > 85.0 && $finalEvaluationScore <= 100.0)
		{
			return "A";
		}
		elseif($finalEvaluationScore > 70.0 && $finalEvaluationScore <= 85.0)
		{
			return "B";
		}
		elseif($finalEvaluationScore > 55.0 && $finalEvaluationScore <= 70.0)
		{
			return "C";
		}
		elseif($finalEvaluationScore >= 0.0 && $finalEvaluationScore <= 55.0)
		{
			return "D";
		}

	}

// -------------------------------------------------------------------------------

/**
 * wmc 2010/06/19
 * 用于项目结束时根据每个用户得项目等级给与不同的系统加分
 * @param unknown_type $insId
 */
	function addScoreBasedProject($insId){
		$caseid = $this->casemodel->getCaseid($insId);
		$teamMembers = $this->getTeamMember($caseid,$insId);
		$taskid = 0;
		foreach ($teamMembers as $row){
			$userid = $row['uid'];
			$grade = $this->getFinalEvaluationGrade($insId,$taskid,$userid);
			switch($grade){
				case "A": $this->addScore($userid,50);break;
				case "B": $this->addScore($userid,40);break;
				case "C": $this->addScore($userid,30);break;
				case "D": $this->addScore($userid,20);break;
			}			
		}
	}
	
	
	

}
?>