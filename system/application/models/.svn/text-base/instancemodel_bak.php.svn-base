<?php
class Instancemodel extends Model
{
	function Instancemodel()
	{
		parent::Model();
	}
	

// ------------------------------------------------------------------------

/**
 * Get Instance By Id
 *
 *
 * @access	public
 * @param	int	    uid of instance
 * @return	array
 */
//	function getInstanceByid($instanceid)
//	{	
//		$sql = "SELECT DISTINCT instances.uid,cases.uid as caseid,casename,instancename,username AS creator,
//		               instances.status,instances.creationtime,instances.creatorid,
//		               finishtime,progress,isfinished
//		        FROM   users,instances,cases
//		        WHERE  instances.uid = $instanceid
//		        AND    users.uid = instances.creatorid
//		        AND    instances.caseid = cases.uid";
//		$query = $this->db->query($sql);;
//		return $query->row_array();
//	}	
	
	function getInstanceByid($instanceid)
	{
		$this->db->where('uid', $instanceid);
		return $this->db->get('instances')->row_array();
	}
	
// ------------------------------------------------------------------------

/**
 * Get All Instances 
 *
 *
 * @access	public
 * @param   bool         
 * @return	array
 */
	function getAllInstances()
	{
		$query = $this->db->get('instances');
		return $query->result_array();
	}

// ------------------------------------------------------------------------

/**
 * Get Finished Instances 
 *
 *
 * @access	public
 * @param   bool         
 * @return	array
 */
	function getFinishedInstances()
	{
		$this->db->where('isfinished', 1);
		$query = $this->db->get('instances');
		return $query->result_array();
	}
	
// ------------------------------------------------------------------------

/**
 * Get Ongoing Instances 
 *
 *
 * @access	public
 * @param   bool         
 * @return	array
 */
	function getOngoingInstances()
	{
		$this->db->where('isstarted', 1);
		$this->db->where('isfinished', 0);
		$query = $this->db->get('instances');
		return $query->result_array();
	}
// ------------------------------------------------------------------------

/**
 * Get Opended Instances 
 *
 *
 * @access	public
 * @param   bool         
 * @return	array
 */
	function getOpenedInstances()
	{
		$this->db->where('status', 0);
		$query = $this->db->get('instances');
		return $query->result_array();
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
	
// ------------------------------------------------------------------------

/**
 * Get RolesInfo 
 *
 *
 * @access	public
 * @param   int         
 * @return	array
 */
	function getRolesInfo($instanceid)
	{
		$caseid = $this->getCaseid($instanceid);
		$sql = "SELECT *
				FROM (SELECT * FROM roles WHERE caseid = $caseid)AS tmp1
				NATURAL JOIN (SELECT * FROM instance_role WHERE instanceid = $instanceid)AS tmp2 ";
		return $this->db->query($sql)->result_array();	
	}
	
// ------------------------------------------------------------------------

/**
 * Get Applyer 
 *
 *
 * @access	public
 * @param   int        instanceid
 * @param   int        0 = player 1= indicator 2 = observer
 * @param   int        roleid of the case      
 * @return	array
 */
	function getApplyer($instanceid, $roletype, $roleid = 0)
	{
		if($roletype == 0)  //apply player
		{

			$sql = "SELECT DISTINCT username,userid
				FROM applications,users
				WHERE $instanceid = applications.instanceid
				AND $roleid = applications.roleid
				AND applications.ischecked = 0
				AND applications.userid = users.uid"; 
			/*
			$sql = "SELECT userid 
				FROM applications 
				WHERE $instanceid = instanceid 
				AND ischecked = 0";
			*/
		}
		elseif($roletype == 1)  //apply indicator
		{
			$sql = "SELECT DISTINCT username,userid
				FROM applications,users
				WHERE $instanceid = applications.instanceid
				AND applications.isindicator = 1
				AND applications.ischecked = 0
				AND applications.userid = users.uid"; 
		}
		elseif($roletype == 2)  //apply observer
		{
			$sql = "SELECT DISTINCT username,userid
				FROM applications,users
				WHERE $instanceid = applications.instanceid
				AND applications.isindicator = 1
				AND applications.ischecked = 0
				AND applications.userid = users.uid"; 
		}
		else 
			exit("wrong param of roletype!!!");
		return $this->db->query($sql)->result_array();	
	}
	
// ------------------------------------------------------------------------

/**
 * Is Opened
 *
 *
 * @access	public
 * @param   int        instanceid
 * @param   int        0 = player 1= indicator 2 = observer
 * @param   int        roleid of the case  
 * @return	bool
 */
	function isOpened($instanceid, $roletype, $roleid = 0)
	{
		if($roletype == 0)  //player
		{
			$sql = "SELECT status
				FROM instance_role
				WHERE $instanceid = instance_role.instanceid
				AND $roleid = instance_role.roleid"; 
			$result = $this->db->query($sql)->row_array();

			if($result['status'] == 0)
				return TRUE;
			else 
				return FALSE;
		}
		elseif($roletype == 1)  //indicator
		{
			$this->db->where('uid', $instanceid);
			$result = $this->db->get('instances')->row_array();
			if($result['acceptindicator'] == 1)
				return TRUE;
			else 
				return FALSE;
		}
		elseif($roletype == 2)  //apply observer
		{
			$this->db->where('uid', $instanceid);
			$result = $this->db->get('instances')->row_array();
			if($result['acceptobserver'] == 1)
				return TRUE;
			else 
				return FALSE;
		}
		else 
			exit("wrong param of roletype!!!");
	}
	
// ------------------------------------------------------------------------

/**
 * Start Instance
 *
 *
 * @access	public
 * @param	int    uid of instance	
 * @return	bool
 */
	function startInstance($instanceid)
	{
		$result = $this->db->query("SELECT now()")->row_array();
		$data = array(
			'starttime' => $result['now()'],
			'progress' => 0,
			'isstarted' => 1
		);
		$this->db->trans_start();
		$this->db->set($data);
		$this->db->where('uid', $instanceid);
		$this->db->update('instances');
		
		$caseid = $this->getCaseid($instanceid);
		
		//Get all tasks
		$this->db->where('caseid', $caseid);
		$tasks = $this->db->get('tasks')->result_array();
		
		//initialize the status of task
		foreach($tasks as $key => $value)
		{
			$this->visitTask($instanceid, $value['taskid']);
		}
		
		$this->db->trans_complete();
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
		
	}
// ------------------------------------------------------------------------

/**
 * Finish Instance
 *
 *
 * @access	public
 * @param	int    uid of instance	
 * @return	bool
 */	
	function finishInstance($instanceid)
	{
		$result = $this->db->query("SELECT now()")->row_array();
		$this->db->trans_start();
		$data = array(
			'finishtime' => $result['now()'],
			'progress' => 100,
			'isfinished' => 1
		);
		$this->db->trans_start();
		$this->db->set($data);
		$this->db->where('uid', $instanceid);
		$this->db->update('instances');

		//Update the value of finishedinstances int the case table
		//finishedinstances = finishedinstances + 1
		$caseid = $this->getCaseid($instanceid);
		$this->db->query("LOCK TABLE cases write");
		$this->db->query("SET @a= 
		(SELECT finishedinstances 
		FROM cases 
		WHERE uid = $caseid)");
		$this->db->query("SET @a = @a + 1");
		$this->db->query("UPDATE  cases
		SET finishedinstances = @a
		WHERE uid = $caseid");
		$this->db->query("UNLOCK TABLES");
		
		//Delete the value of status in the user_instance table
		$this->db->where('instanceid', $instanceid);
		$this->db->delete('user_instance');
		$this->db->where('instanceid', $instanceid);
		$this->db->delete('applications');
		$this->db->trans_complete();
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	
		
	}
/**
 * Set Instance Open
 *
 *
 * @access	public
 * @param	int    uid of instance	
 * @return	bool
 */	
	function setInstanceOpen($instanceid)
	{
		$this->db->set('status', 0);
		$this->db->where('uid', $instanceid);
		$this->db->update('instances');
	}
	
/**
 * Set Instance Close
 *
 *
 * @access	public
 * @param	int    uid of instance	
 * @return	bool
 */	
	function setInstanceClose($instanceid)
	{
		$this->db->set('status', 1);
		$this->db->where('uid', $instanceid);
		$this->db->update('instances');
	}
	
// ------------------------------------------------------------------------

/**
 * Is Applied Roleid
 *
 *
 * @access	public
 * @param	int     uid of instance   
 * @param	int     roleid in the instance 
 * @param	int     uid of user   	
 * @return	bool
 */	
	function isAppliedRoleid($instanceid, $roleid, $userid)
	{
		$this->db->where('instanceid', $instanceid);
		$this->db->where('roleid', $roleid);
		$this->db->where('userid', $userid);
		$this->db->where('ischecked', 0);
		return $this->db->get('applications')->num_rows();
	/*
		if($this->db->get('applications')->num_rows() > 0)
			return TRUE;
		return FALSE;
		*/
	}
	
	
// ------------------------------------------------------------------------

/**
 * Apply Role
 *
 *
 * @access	public
 * @param	int     uid of instance   
 * @param	int     roleid in the instance 
 * @param	int     uid of user   	
 * @return	bool
 */	
	
	function applyRole($instanceid, $roleid, $userid)
	{
		$data = array(
			'userid' => $userid,
			'instanceid' => $instanceid,
			'roleid' => $roleid
		);

		$this->db->set($data);
		$this->db->insert('applications');
		if(mysql_error() == '')
				return TRUE;
		else 
			return FALSE;
	}

// ------------------------------------------------------------------------

/**
 * Quit Apply
 *
 *
 * @access	public
 * @param	int     uid of instance   
 * @param	int     uid of user   	
 * @return	bool
 */	
	
	function quitApply($instanceid, $userid)
	{
		$this->db->where('instanceid', $instanceid);
		$this->db->where('userid', $userid);
		$this->db->delete('applications');
		//Added by cendy at 2010-01-16
		if(mysql_error() == '')
			return TRUE;
		else
			return FALSE;
	}
// ------------------------------------------------------------------------

/**
 * Get Applying Roleid
 *
 *
 * @access	public
 * @param	int     uid of instance   
 * @param	int     uid of user   	
 * @return	int     Roleid or -1
 */	
	
	function getApplyingRoleid($instanceid, $userid)
	{
		$this->db->where('instanceid', $instanceid);
		$this->db->where('userid', $userid);
		$this->db->where('ischecked', 0);
		$query = $this->db->get('applications');
		if($query->num_rows() > 0)
		{
			$result = $query->row_array();
			return $result['roleid'];
		}
		
			return -1;
	}
// ------------------------------------------------------------------------

/**
 * Quit Role
 *
 *
 * @access	public
 * @param	int     uid of instance   
 * @param	int     uid of user   	
 * @return	bool
 */	
	
	function quitRole($instanceid,  $userid)
	{
		$this->db->where('instanceid', $instanceid);
		$this->db->where('userid', $userid);
		$this->db->set('isvalid', 0);
		$this->db->update('user_instance');
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}
	
// ------------------------------------------------------------------------

/**
 * Quit Instance
 *
 *
 * @access	public
 * @param	int     uid of instance   
 * @param	int     uid of user   	
 * @return	bool
 */	
	
	
	function quitInstance($instanceid,  $userid)
	{
		return quitRole($instanceid,  $userid);
	}

// ------------------------------------------------------------------------

/**
 * Apply Observer
 *
 *
 * @access	public
 * @param	int     uid of instance    
 * @param	int     uid of user   	
 * @return	bool
 */	
	function applyObserver($instanceid, $userid)
	{
		$data = array(
			'userid' => $userid,
			'instanceid' => $instanceid,
			'isobserver' => 1
		);
		$this->db->set($data);
		$this->db->insert('applications');
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}	
	
// ------------------------------------------------------------------------

/**
 * Accept Role
 *
 *
 * @access	public
 * @param	int     uid of instance    
 * @param	int     roleid in the instance  
 * @param	int     uid of user   	
 * @return	bool
 */		
	function acceptRole($instanceid, $roleid, $userid)
	{
		
		$this->db->trans_start();
		
		//update applications
		$data = array(
			'userid' => $userid,
			'instanceid' => $instanceid,
			'roleid' => $roleid
		);
		$this->db->set('ischecked', 1);
		$this->db->set('isaccepted', 1);
		$this->db->where($data);
		$this->db->update('applications');
		
		//update instance_role
		$this->db->set('actorid', $userid);
		$this->db->where('instanceid', $instanceid);
		$this->db->where('roleid', $roleid);
		$this->db->update('instance_role');
	
		//update or insert user_instance
		$caseid = $this->getCaseid($instanceid);
		$this->db->where('caseid', $caseid);
		$this->db->where('roleid', $roleid);
		$result_array = $this->db->get('roles')->row_array();
		$this->db->where('userid', $userid);
		$this->db->where('instanceid', $instanceid);
		if($this->db->get('user_instance')->num_rows() > 0)
			$action = 'update';
		else 
			$action = 'insert';
			
		$result = $this->db->query("SELECT now()")->row_array();
		$tmp['accepttime'] = $result['now()'];
		if($result_array['role'] == 'PM')
			$tmp['rolegroup'] = 1;
		else 
			$tmp['rolegroup'] = 2;
		$tmp['isvalid'] = 1;
		$tmp['userid'] = $userid;
		$tmp['instanceid'] = $instanceid;

		$this->db->set($tmp);
		$this->db->where('userid', $userid);
		$this->db->where('instanceid', $instanceid);
		if($action == 'update')
			$this->db->update('user_instance');
		else 
			$this->db->insert('user_instance');

		$this->db->trans_complete();
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}
	
	
// ------------------------------------------------------------------------

/**
 * Accept Indicator
 *
 *
 * @access	public
 * @param	int     uid of instance    
 * @param	int     uid of user   	
 * @return	bool
 */		
function acceptIndicator($instanceid, $userid){
		$this->db->trans_start();
		
		//update applications
		$data = array(
			'instanceid' => $instanceid,
			'userid' => $userid
		);
		$this->db->set('ischecked', 1);
		$this->db->set('isaccepted', 1);
		$this->db->where($data);
		$this->db->update('applications');
		
		//update or insert user_instance
		$this->db->where('userid', $userid);
		$this->db->where('instanceid', $instanceid);
		if($this->db->get('user_instance')->num_rows() > 0)
			$action = 'update';
		else 
			$action = 'insert';
			
		$result = $this->db->query("SELECT now()")->row_array();
		$tmp['accepttime'] = $result['now()'];
		$tmp['rolegroup'] = 3;
		$tmp['isvalid'] = TRUE;
		$tmp['userid'] = $userid;
		$tmp['instanceid'] = $instanceid;
		
		$this->db->set($tmp);
		$this->db->where($data);
		if($action == 'update')
			$this->db->update('user_instance');
		else 
			$this->db->insert('user_instance');
			
		$this->db->trans_complete();
			
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}
	

	
// ------------------------------------------------------------------------

/**
 * Accept Observer
 *
 *
 * @access	public
 * @param	int     uid of instance    
 * @param	int     uid of user   	
 * @return	bool
 */		
	function acceptObserver($instanceid, $userid)
	{
		$this->db->trans_start();
		
		//update applications
		$data = array(
			'instanceid' => $instanceid,
			'userid' => $userid
		);
		$this->db->set('ischecked', 1);
		$this->db->set('isaccepted', 1);
		$this->db->where($data);
		$this->db->update('applications');
		
		//update or insert user_instance
		$this->db->where('userid', $userid);
		$this->db->where('instanceid', $instanceid);
		if($this->db->get('user_instance')->num_rows() > 0)
			$action = 'update';
		else 
			$action = 'insert';
		$result = $this->db->query("SELECT now()")->row_array();
		$tmp['accepttime'] = $result['now()'];
		$tmp['rolegroup'] = 4;
		$tmp['isvalid'] = TRUE;
		$tmp['userid'] = $userid;
		$tmp['instanceid'] = $instanceid;
		
		$this->db->set($tmp);	
		$this->db->where($data);
		if($action == 'update')
			$this->db->update('user_instance');
		else 
			$this->db->insert('user_instance');
			
		$this->db->trans_complete();
			
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}
	
	
// ------------------------------------------------------------------------

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
	function banUser($instanceid, $userid)
	{
		
		$this->db->trans_start();
		//update user_instance
		$this->db->set('isvalid', 0);
		$this->db->where('instanceid', $instanceid);
		$this->db->where('userid',$userid);
		$this->db->update('user_instance');
		//update instance_role
		$this->db->set('actorid',0);
		$this->db->where('instanceid', $instanceid);
		$this->db->where('actorid',$userid);
		$this->db->update('instance_role');
		$this->db->trans_complete();
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
		
	}

// ------------------------------------------------------------------------

	/**
	 * Change Player
	 *
	 * change a role actor in a instance
	 *
	 * @access	public  
	 * @param	int     uid of instance  
	 * @param   int     roleid in the instance 
	 * @param   int     userid of before change
	 * @param   int     userid of after change    	
	 * @return	bool
	 */	
	function changePlayer($instanceid, $roleid, $user1, $user2)
	{
		
	}
	
// ------------------------------------------------------------------------

	/**
	 * Open Role
	 *
	 * open a role in a instance
	 *
	 * @access	public  
	 * @param	int     uid of instance  
	 * @param   int     roleid in the instance    	
	 * @return	bool
	 */	
	function openRole($instanceid, $roleid)
	{
		//update instance_role
		$this->db->set('status', 0);
		$this->db->where('instanceid', $instanceid);
		$this->db->where('roleid', $roleid);
		$this->db->update('instance_role');
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}
	
	
// ------------------------------------------------------------------------

	/**
	 * Close Role
	 *
	 * close a role in a instance
	 *
	 * @access	public  
	 * @param	int     uid of instance  
	 * @param   int     roleid in the instance    	
	 * @return	bool
	 */	
	function closeRole($instanceid, $roleid)
	{
		//update instance_role
		$this->db->set('status', 1);
		$this->db->where('instanceid', $instanceid);
		$this->db->where('roleid', $roleid);
		$this->db->update('instance_role');
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}

// ------------------------------------------------------------------------

	/**
	 * Get Role Playerid

	 *
	 * @access	public  
	 * @param	int     uid of instance  
	 * @param   int     roleid in the instance    	
	 * @return	bool
	 */	
	function getRolePlayerid($instanceid, $roleid)
	{
		$this->db->where('instanceid', $instanceid);
		$this->db->where('roleid', $roleid);
		$result = $this->db->get('instance_role')->row_array();
		if(!empty($result))
			return $result['actorid'];
		return -1;
	}

	 
	
// ------------------------------------------------------------------------

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
	function startTask($instanceid, $taskid)
	{
		//get a record from instance_task
		$this->db->where('instanceid', $instanceid);
		$this->db->where('taskid', $taskid);
		$result_array = $this->db->get('instance_task')->row_array();
		
		if($result_array['isready'] == FALSE)
			return FALSE;
		
		//else update instance_task
		$this->db->set('isstarted', TRUE);
		$result_array = $this->db->query("SELECT NOW()")->row_array();
		$starttime = $result_array['NOW()'];
		$this->db->set('starttime', $starttime);
		$this->db->where('instanceid', $instanceid);
		$this->db->where('taskid', $taskid);
		$this->db->update('instance_task');
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}

// ------------------------------------------------------------------------

	/**
	 * submit File
	 *
	 * submit a file for a task
	 *
	 * @access	public  
	 * @param   array $record(instanceid,taskid,file,uploader)
	 * @return	bool
	 * //param file为增加的文件所在文件夹以及文件名的全程 added by cendy 2009/10/27
	 */	
	function submitFile($record)
	{
		//insert newsubmits
//		$data = array(
//			'instanceid' => $instanceid,
//			'taskid' => $taskid,
//			'file' => $file 
//		);
		$result_array = $this->db->query("SELECT NOW()")->row_array();
		$record['submittime'] =  $result_array['NOW()'];
		$this->db->set($record);
		$this->db->insert('newsubmits');
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}
	

	

	
// ------------------------------------------------------------------------

	/**
	 * deny File
	 *
	 * Deny a file for a task
	 *
	 * @access	public  
	 * @param	int     uid of newsubmit  	
	 * @return	bool
	 */	
	function denyFile($newsubmitid)
	{
		$this->db->trans_start();
		//update newsubmits
		$this->db->set('ischecked', 1);
		$this->db->where('uid', $newsubmitid);
		$this->db->update('newsubmits');
		
		//get instanceid、taskid 
		$this->db->where('uid', $newsubmitid);
		$result_array = $this->db->get('newsubmits')->row_array();
		$taskid = $result_array['taskid'];
		$instanceid = $result_array['instanceid'];
		
		//get denies
		$this->db->where('instanceid', $instanceid);
		$this->db->where('taskid', $taskid);
		$result_array = $this->db->get('instance_task')->row_array();
		$denies = $result_array['denies'] + 1;
		
		//update instance_task
		$this->db->set('denies', $denies);
		$this->db->where('instanceid', $instanceid);
		$this->db->where('taskid', $taskid);
		$this->db->update('instance_task');
		
		$this->db->trans_complete();
		
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}
	
// ------------------------------------------------------------------------

	/**
	 * Accept File
	 *
	 * accept submit file
	 *
	 * @access	public  
	 * @param	int     uid of newsubmit   	
	 * @return	bool
	 */	
	function acceptFile($newsubmitid)
	{
		//update newsubmits
		$this->db->set('ischecked', 1);
		$this->db->set('isaccepted', 1);
		$result_array = $this->db->query("SELECT NOW()")->row_array();
		$this->db->set('accepttime', $result_array['NOW()']);
		$this->db->where('uid', $newsubmitid);
		$this->db->update('newsubmits');
					
		//get instanceid、taskid and caseid
		$this->db->where('uid', $newsubmitid);
		$result_array = $this->db->get('newsubmits')->row_array();
		$taskid = $result_array['taskid'];
		$instanceid = $result_array['instanceid'];
		$caseid = $this->getCaseid($instanceid); 
		 
		
		//get the number accepted files 
		$this->db->where('instanceid', $instanceid);
		$this->db->where('taskid', $taskid);
		$this->db->from('newsubmits');
		$num_accept = $this->db->count_all_results();
		
		//get the number output files
		$this->db->where('caseid', $caseid);
		$this->db->where('taskid', $taskid);
		$this->db->from('outputs');
		$num_need = $this->db->count_all_results();
		
		//compare the number accepted files and the number output files
		if($num_accept >= $num_need)
			return $this->finishTask($instanceid, $taskid);
		return TRUE;
	}
	
// ------------------------------------------------------------------------

	/**
	 * Is Finished
	 *
	 * check whether all tasks have finished
	 *
	 * @access	public  
	 * @param	int     uid of instance   	
	 * @return	bool
	 */	
	function isAllTasksFinished($instanceid)
	{
		$this->db->where('instanceid', $instanceid);
		$this->db->where('isfinished', 0);
		if($this->db->get('instance_task')->num_rows() == 0)
			return TRUE;
		else 
			return FALSE;
	}
	
	function isFinished($instanceid)
	{
		$this->db->where('instanceid', $instanceid);
		$this->db->where('isfinished', 1);
		$query = $this->db->get('instances');
		if($query->num_rows() > 0)
			return TRUE;
		return FALSE;
	}
// ------------------------------------------------------------------------

	/**
	 * Is Started
	 *
	 * @access	public  
	 * @param	int     uid of instance   	
	 * @return	bool
	 */	
	function isStarted($instanceid)
	{
		$this->db->where('uid', $instanceid);
		$this->db->where('isstarted', 1);
		$query = $this->db->get('instances');
		if($query->num_rows() > 0)
			return TRUE;
		return FALSE;
		
	}
	
// ------------------------------------------------------------------------

	/**
	 * Get Actorid 
	 *
	 *
	 * @access	public  
	 * @param	int     uid of instance 	
	 * @return	array
	 */

	function getActorid($insId)
	{
		$sql = "SELECT roleid,actorid FROM instance_role WHERE instanceid=$insId";
		$query = $this->db->query($sql);
		return $query->result_array();
		
/*		$this->db->select('roleid,actorid');
		$this->db->where('instanceid', $insId);
		return  $this->db->get('instance_role')->result_array();*/
		
	}
	
// ------------------------------------------------------------------------

	/**
	 * Get Role In Instance
	 *
	 *
	 * @access	public  
	 * @param	int     uid of instance 	
	 * @param   int     userid
	 * @return	array
	 */

	function getRoleInInstance($instanceid, $userid)
	{
		//get caseid
		$caseid = $this->getCaseid($instanceid);
		
		//get roleid
		$this->db->where('instanceid', $instanceid);
		$this->db->where('actorid', $userid);
		$result = $this->db->get('instance_role')->row_array();
		if(!$result)
			return ;
		$roleid = $result['roleid'];
		
		$this->db->where('caseid', $caseid);
		$this->db->where('roleid', $roleid);
		$result = $this->db->get('roles')->row_array();
		if(!$result)
			return ;
		$rolename = $result['rolename'];
		
		return array('roleid' => $roleid, 'rolename' => $rolename);
		
		
	}
	
// ------------------------------------------------------------------------

	/**
	 * Get Task Starttime
	 *
	 *
	 * @access	public  
	 * @param	int     uid of instance 
	 * @param	int     taskid	
	 * @return	array
	 */
	
	function getTaskStarttime($instanceid, $taskid)
	{		
		$this->db->where('instanceid', $instanceid);
		$this->db->where('taskid', $taskid);
		$result = $this->db->get('instance_task')->row_array();
		if($result)
			return $result['starttime'];
		return ;
	}
	
// ------------------------------------------------------------------------

	/**
	 * Get Task Finishtime
	 *
	 *
	 * @access	public  
	 * @param	int     uid of instance 
	 * @param	int     taskid	
	 * @return	array
	 */
	
	function getTaskFinishtime($instanceid, $taskid)
	{
		$this->db->where('instanceid', $instanceid);
		$this->db->where('taskid', $taskid);
		$result = $this->db->get('instance_task')->row_array();
		if($result)
			return $result['finishtime'];
		return ;
	}
	
// ------------------------------------------------------------------------

	/**
	 * Get Tasks 
	 *
	 *
	 * @access	public  
	 * @param	int     uid of instance 	
	 * @return	array
	 */

	function getTasks($instanceid)
	{
		/*
		$sql = "SELECT distinct instance_task.taskid, instance_task.starttime, instance_task.finishtime,
					 instance_task.isready, instance_task.isstarted, instance_task.isfinished, 
					 instance_task.denies, taskname, description, isparent, ismilestone, iscritical,
					  duration, earlystart, earlyfinish, latestart, latefinish, input,output
				FROM (
				instance_task
				LEFT JOIN instances ON instance_task.instanceid = instances.uid
				)
				JOIN (
				(
				tasks
				LEFT JOIN inputs ON tasks.taskid = inputs.taskid)
				LEFT JOIN outputs ON tasks.taskid = outputs.taskid) ON ( instances.caseid = tasks.caseid
				AND instance_task.taskid = tasks.taskid ) 
				WHERE instanceid =$instanceid";
				*/
		$sql = "SELECT distinct instance_task.taskid, instance_task.starttime, instance_task.finishtime,
					 instance_task.isready, instance_task.isstarted, instance_task.isfinished, 
					 instance_task.denies, taskname, description, isparent, ismilestone, iscritical,
					  duration, earlystart, earlyfinish, latestart, latefinish
				FROM (
				instance_task
				LEFT JOIN instances ON instance_task.instanceid = instances.uid
				)
				JOIN tasks ON instances.caseid = tasks.caseid AND instance_task.taskid = tasks.taskid
				WHERE instanceid =$instanceid";
		return $this->db->query($sql)->result_array();
	}
	
	function getTaskInputs($instanceId,$taskid){
		$caseid = $this->casemodel->getCaseid($instanceId);
		$sql = "SELECT * from inputs WHERE caseid=$caseid AND taskid=$taskid";
		return $this->db->query($sql)->result_array();
	}
	
	function getTaskOutputs($instanceId,$taskid){
		$caseid = $this->casemodel->getCaseid($instanceId);
		$sql = "SELECT * from outputs WHERE caseid=$caseid AND taskid=$taskid";
		return $this->db->query($sql)->result_array(); 
	}
	
// ------------------------------------------------------------------------

	/**
	 * Get New Submits
	 *
	 *
	 * @access	public  
	 * @param	int     uid of instance 	
	 * @param   int     uid of stask
	 * @return	array
	 */
//	function getNewSubmits($instanceid, $taskid)
//	{
//		$this->db->select('file','submittime','uploader');
//		$this->db->where('instanceid', $instanceid);
//		$this->db->where('taskid', $taskid);
//		$this->db->where('ischecked', 0);
//		return $this->db->get('newsubmits')->result_array();
//	}
// ------------------------------------------------------------------------

	/**
	 * Get New Submits
	 *
	 *
	 * @access	public  
	 * @param	int     uid of instance 	
	 * @param   int     uid of stask
	 * @return	array
	 */
	function getNewSubmits($insId,$userId = '0',$type = '0')
	{
		$where = array('instanceid' => $insId, 'ischecked' => '0');
		if($userId != '0' && $this->isInProject($insId,$userId)){
			if($type == '0'){
				$tmp = array('uploader' => $userId);
				
			}
			else{
				$tmp = array('uploader !=' => $userId);
			} 
			$where = array_merge($where,$tmp);
			$this->db->where($where);
		}else if($userId != '0')
			return ;
		
/*		$this->db->where('instanceid', $insId);
		$this->db->where('ischecked', 0);
		if($userId != '0' && $this->isInProject($insId,$userId)){
			if($type == '0')$where ="uploader=$userId";
			else $where = "uploader!=$userId";
			$this->db->where($where);
		}else if($userId != '0')
			return ;*/
		return $this->db->get('newsubmits')->result_array();
	}
		
// ------------------------------------------------------------------------

	/**
	 * Get Accepted Submits
	 *
	 *
	 * @access	public  
	 * @param	int     uid of instance 	
	 * @param   int     uid of stask
	 * @return	array
	 */
//	function getAcceptedSubmits($instanceid, $taskid)
//	{
//		$this->db->select('file','submittime','uploader','accepttime');
//		$this->db->where('instanceid', $instanceid);
//		$this->db->where('taskid', $taskid);
//		$this->db->where('isacepted', 1);
//		return $this->db->get('newsubmits')->result_array();
//	}
	
// ------------------------------------------------------------------------

	/**
	 * Get Accepted Submits
	 *	if $userId == '0' then return all accepted submited files
	 *	if $userId != '0'&& $type == '0' then return my accepted submited files
	 *	if $userId != '0' && $type != '0' then return my teamates accepted submited files
	 *
	 * @access	public  
	 * @param	int     uid of instance 	
	 * @param   int     uid of stask
	 * @return	array
	 */
	function getAcceptedSubmits($insId,$userId = '0',$type = '0')
	{
		$where = array('instanceid' => $insId, 'isaccepted' => '1');
		if($userId != '0' && $this->isInProject($insId,$userId)){
			if($type == '0'){
				$tmp = array('uploader' => $userId);
			}
			else{
				$tmp = array('uploader !=' => $userId);
			} 
			$where = array_merge($where,$tmp);
			$this->db->where($where);
		}else if($userId != '0')
			return ;
/*		$this->db->where('instanceid', $insId);
		$this->db->where('isaccepted', 1);
		if($userId != '0' && $this->isInProject($insId,$userId)){
			if($type == '0')$where ="uploader=$userId";
			else $where = "uploader!=$userId";
			$this->db->where($where);
		}else if($userId != '0')
			return ;*/
		
		return $this->db->get('newsubmits')->result_array();
	}
	
	function getDeniedSubmits($insId,$userId = '0',$type = '0')
	{
		$where = array('instanceid' => $insId,'isaccepted' => '0','ischecked' =>'1');
		if($userId != '0' && $this->isInProject($insId,$userId)){
			if($type == '0'){
				$tmp = array('uploader' => $userId);
			}
			else{
				$tmp = array('uploader !=' => $userId);
			} 
			$where = array_merge($where,$tmp);
			$this->db->where($where);
		}else if($userId != '0')
			return ;
/*		$this->db->where('instanceid', $insId);
		$this->db->where('ischecked', 1);
		$this->db->where('isaccepted', 0);
		if($userId != '0' && $this->isInProject($insId,$userId)){
			if($type == '0')$where ="uploader=$userId";
			else $where = "uploader!=$userId";
			$this->db->where($where);
		}else if($userId != '0')
			return ;*/
		return $this->db->get('newsubmits')->result_array();
	}
	
	function getFileStatus($fileid)
	{
		$this->db->where('uid', $fileid);
		$result = $this->db->get('newsubmits')->row_array();
		if($result)
		{
			if($result['isaccepted'] == 1)//通过
				return 1;
			if($result['ischecked'] == 1 && $result['isaccepted'] == 0)//拒绝
				return 2;
			if($result['ischecked'] == 0)//未检查
				return 0;
		}
		return -1;
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
	function getMyTasks($insId,$userId )
	{
		//get caseid
		$caseId = $this->getCaseid($insId);
		
		//get roleid
		$this->db->where('instanceid', $insId);
		$this->db->where('actorid', $userId);
		$result = $this->db->get('instance_role')->row_array();
		if(!$result)
			return ;
		$roleId = $result['roleid'];
		
		$sql = "SELECT * 
				FROM `tasks` 
				NATURAL JOIN (
				
				SELECT * 
				FROM resources
				WHERE (
				caseid =$caseId
				AND resourceid  =$roleId
				)
				) AS temp";

		return $this->db->query($sql)->result_array();
	}
	
/**
 * Get My Tasks
 *
 *
 * @access	public
 * @param   int     userid
 * @param	int	    uid of instance
 * @return	array
 */
//	function getMyTasks($userid, $instanceid)
//	{
//		//get caseid
//		$caseid = $this->getCaseid($instanceid);
//		//get roleid
//		$this->db->where('instanceid', $instanceid);
//		$this->db->where('actorid', $userid);
//		$result = $this->db->get('instance_role')->row_array();
//		if(!$result)
//			return ;
//		$roleid = $result['roleid'];
//		
//		$sql = "SELECT * 
//				FROM (
//					(
//					SELECT * 
//					FROM instance_task
//					WHERE instanceid =$instanceid
//					) AS temp1
//				)
//				Natural JOIN (
//					(
//					SELECT taskid
//					FROM tasks
//					WHERE caseid =$caseid
//					AND roleid =$roleid
//					) AS temp2";
//		return $this->db->query($sql)->result_array();
//	}
	
// ------------------------------------------------------------------------

/**
 * Get Input Task Files
 *
 *
 * @access	public
 * @param   int     instanceid
 * @param	int	    taskid
 * @return	array
 */
	function getInputTaskFiles($instanceid, $taskid)
	{
		//get caseid
		$caseid = $this->getCaseid($instanceid);
		
		$this->db->select('input');
		$this->db->where('caseid', $caseid);
		$this->db->where('taskid', $taskid);
		return $this->db->get('inputs')->result_array();
		
	}
	
// ------------------------------------------------------------------------

/**
 * Get Task Details
 *
 *
 * @access	public
 * @param   int     caseid
 * @param	int	    taskid
 * @return	array
 */
 	function getTaskDetails($caseid, $taskid)
 	{	
 	 		$sql = "SELECT temp1.taskid, taskname, description, output
					FROM (
					
					SELECT * 
					FROM tasks
					WHERE (
					tasks.caseid =$caseid
					AND tasks.taskid =$taskid
					)
					) AS temp1
					LEFT JOIN (
					
					SELECT * 
					FROM outputs
					WHERE (
					outputs.caseid =$caseid
					AND outputs.taskid =$taskid
					)
					) AS temp2 ON temp1.caseid = temp2.caseid";
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
 		if(isset($data['ref']) && $data['ref'] != '')
 			$this->db->set('reference',$data['ref']);
 		if(isset($data['suggestion']) && $data['suggestion'] != '')
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
  * @return array：包括roleId，roleName
  */
 	
 	function getTaskPlayer($caseId,$taskId){
 		$sql = "SELECT DISTINCT resources.caseid,resources.taskid,resources.resourceid,roleid,role,rolename FROM resources INNER JOIN roles ON resources.resourceid=roles.roleid AND resources.caseid=roles.caseid INNER JOIN tasks ON resources.caseid=tasks.caseid AND resources.taskid=tasks.taskid WHERE resources.caseid=$caseId AND resources.taskid=$taskId";
 		return $this->db->query($sql)->result_array();
 		
 	}
 	
// ------------------------------------------------------------------------

/**
 * Get Predecessors 
 *
 *
 * @access	public
 * @param   int     caseid
 * @param	int	    taskid
 * @return	array
 */
 	function getPredecessors($caseid, $taskid)
 	{
 			$sql = "SELECT taskid, taskname
				FROM tasks
				WHERE taskid
				IN (
				
				SELECT predecessorid
				FROM dependencies
				WHERE (
				caseid =$caseid
				AND successorid =$taskid
				)
				)";
 		return $this->db->query($sql)->row_array();
 	}
 	
// ------------------------------------------------------------------------

/**
 * Get Sucecessors 
 *
 *
 * @access	public
 * @param   int     caseid
 * @param	int	    taskid
 * @return	array
 */
 	function getSucecessors($caseid, $taskid)
 	{	
 			$sql = "SELECT taskid, taskname
				FROM tasks
				WHERE taskid
				IN (
				
				SELECT successorid
				FROM dependencies
				WHERE (
				caseid =$caseid
				AND predecessorid =$taskid
				)
				)";
 		return $this->db->query($sql)->row_array();
 	}

// ------------------------------------------------------------------------

/**
 * Get Input Files
 *
 * get all input files 
 * @access	public
 * @param   int     instanceid
 * @return	array
 */
 	function getInputFiles($instanceid)
 	{
 		//get caseid
 		$caseid = $this->getCaseid($instanceid);
 		
 		$sql = "SELECT taskid,input
				FROM (
				
				SELECT * 
				FROM inputs
				WHERE caseid =$caseid
				) AS temp1
				NATURAL JOIN (
				
				SELECT * 
				FROM instance_task
				WHERE instanceid =$instanceid
				AND isstarted = 1
				) AS temp2";
 		return $this->db->query($sql)->result_array();
 		 
 	}
 	
// ------------------------------------------------------------------------

/**
 * Get Output Files
 *
 * get all Output files 
 * @access	public
 * @param   int     instanceid
 * @return	array
 */
 	function getOutputFiles($instanceid)
 	{
 		//get caseid
 		$caseid = $this->getCaseid($instanceid);
 		
 		$sql = "SELECT taskid,output
				FROM (
				
				SELECT * 
				FROM outputs
				WHERE caseid =$caseid
				) AS temp1
				NATURAL JOIN (
				
				SELECT * 
				FROM instance_task
				WHERE instanceid =$instanceid
				AND isfinished = 1
				) AS temp2";
 		return $this->db->query($sql)->result_array();
 		 
 	}

 /**
  * 功能：获得某一个项目的所有标准文档，用于指导者
  * @param $insId		：项目ID
  * @return array
  */	
 	function getAllOutputFiles($insId){
 		if($this->isIndicator($insId,$this->session->userdata('user_id'))){
			$caseid = $this->getCaseid($insId);
	 		$sql = "SELECT taskid,output FROM outputs WHERE caseid=$caseid";
	 		return $this->db->query($sql)->result_array();
 		}else return ;
 	}
 	
 	function getSubmitsInTask($intanceid,$taskid)
 	{
 		$this->db->where('instanceid', $intanceid);
 		$this->db->where('taskid', $taskid);
 		return $this->db->get('newsubmits')->result_array();
 	}
// ------------------------------------------------------------------------

/**
 * Get Output Task Files
 *
 * get Output Task files 
 * @access	public
 * @param   int     instanceid
 * @param   int     taskid
 * @return	array
 */
 	function getOutputTaskFiles($instanceid, $taskid)
 	{
 		//get caseid
		$caseid = $this->getCaseid($instanceid);
		$this->db->where('caseid', $caseid);
		$this->db->where('taskid', $taskid);
		return $this->db->get('outputs')->result_array();
 	}
 	
// ------------------------------------------------------------------------

/**
 * Get Task Status
 *
 * @access	public
 * @param   int     instanceid
 * @param   int     taskid
 * @return	int
 */
 	function getTaskStatus($instanceid, $taskid)
 	{
 		$this->db->where('instanceid', $instanceid);
 		$this->db->where('taskid', $taskid);
 		$result = $this->db->get('instance_task')->row_array();
 		if(!$result)
 			return -1;
 		if($result['isready'] == 0)
 			return 0;
 		if($result['isready'] == 1 && $result['isstarted'] == 0 && $result['isfinished'] == 0)
 			return 1;
 		if($result['isstarted'] == 1 && $result['isfinished'] == 0)
 			return 2;
 		if($result['isfinished'] == 1)
 			return 3;
 	}
 	 
// ------------------------------------------------------------------------

	/**
	 * Finish Task
	 *
	 * finish task
	 *
	 * @access	private  
	 * @param	int     uid of instance 
	 * @param   int     taskid of the case  	
	 * @return	bool
	 */	
	
	private function finishTask($instanceid, $taskid)
	{	
		//update instance_task
		$this->db->set('isfinished', 1);
		$result_array = $this->db->query("SELECT NOW()")->row_array();
		$finishtime = $result_array['NOW()'];
		$this->db->set('finishtime', $finishtime);
		$this->db->where('instanceid', $instanceid);
		$this->db->where('taskid', $taskid);
		$this->db->update('instance_task');
		
		//find out all successor tasks
		$caseid = $this->getCaseid($instanceid);
		$this->db->where('caseid', $caseid);
		$this->db->where('predecessorid', $taskid);
		$result_array = $this->db->get('dependencies')->result_array();
		
		//visit and update statu of each task
		$flag = TRUE;
		foreach($result_array as $key => $value)
			$flag = $flag && $this->visitTask($instanceid, $value['successorid']);
		
		return $flag;
	}
	
// ------------------------------------------------------------------------

	/**
	 * Visit Task
	 *
	 * visit a task, check whether all predecessors are finished , if it is 
	 * true, then update the status of current task to ready
	 *
	 * @access	private  
	 * @param	int     uid of instance 
	 * @param   int     taskid of the case  	
	 * @return	bool
	 */		
	private function visitTask($instanceid, $taskid){
		//find out the predecessor tasks 
		$caseid = $this->getCaseid($instanceid);
		$this->db->where('caseid', $caseid);
		$this->db->where('successorid', $taskid);
		$result_array = $this->db->get('dependencies')->result_array();
		
		//check whether all predecessors are finished
		$flag = TRUE;
		foreach($result_array as $key => $value)
		{
			//get the status of the task
			$this->db->where('instanceid', $instanceid);
			$this->db->where('taskid', $value['predecessorid']);
			$data_array = $this->db->get('instance_task')->row_array();
			$flag = $flag && $data_array['isfinished'];
		}

		//update the status	
		$this->db->set('isready', $flag);
		$this->db->where('instanceid', $instanceid);
		$this->db->where('taskid', $taskid);
		$this->db->update('instance_task');
		
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}

	
// ------------------------------------------------------------------------

/**
 * Get Caseid
 *
 *
 * @access	private
 * @param	int	    uid of instance
 * @return	int
 */
	function getCaseid($instanceid)
	{
		$this->db->where('uid', $instanceid);
		$result_array = $this->db->get('instances')->row_array();
		return $result_array['caseid'];
	}	
	
	function isInProject($insId,$userId){
		if($this->isIndicator($insId,$userId)){
			return TRUE;
		}
		$actors = $this->getActorid($insId);
		foreach($actors as $actor){
			if($actor['actorid'] == $userId){
				return TRUE;
			}
		}
		return FALSE;
	}
	
	
// Added by cendy at 2010-01-19
// Indicator handles

/**
 * 功能：返回一个项目中的所有指导者的ID及用户名
 * @param $ins_id
 * @return array——指导者的数组，包括userid,instanceid,username
 */
	function getIndicators($insId){
		$sql = "select distinct userid,instanceid,instance_indicator.status,username from instance_indicator LEFT JOIN users ON instance_indicator.userid=users.uid where instanceid=$insId AND instance_indicator.status=1";
		/*$sql = "SELECT distinct instance_indicator.userid,instance_indicator.instanceid,instance_indicator.status,username
		FROM instance_indicator LEFT JOIN users ON instance_indicator.userid=users.uid
		where instanceid=$insId";*/
		return $this->db->query($sql)->result_array();
	}
	
/**
 * 功能：返回一个项目中的所有正在申请的指导者的ID及用户名
 * @param $ins_id
 * @return array——指导者的数组，包括userid,instanceid,username
 */
	function getIndicatorApplyers($insId){
		$sql = "select distinct userid,instanceid,instance_indicator.status,username from instance_indicator LEFT JOIN users ON instance_indicator.userid=users.uid where instanceid=$insId AND instance_indicator.status=0";
		return $this->db->query($sql)->result_array();
	}
	
/**
 * 功能：申请担任某个项目的指导者（Indicator)
 * @param $insId：	项目ID
 * @param $userId：	用户ID
 * @return TRUE OR FALSE
 */
	function applyIndicator($insId,$userId){
		$result_array = $this->db->query("SELECT NOW()")->row_array();
//		$data['applytime'] =  $result_array['NOW()'];
		$data = array(
			'userid' => $userId,
			'instanceid' => $insId,
			'status' => '0',
			'applytime' => $result_array['NOW()']
		);
		$this->db->set($data);
		$this->db->insert('instance_indicator');
		return mysql_error()==''?TRUE:FALSE;
	}
	
/**
 * 功能：取消申请担任某个项目的指导者（Indicator）
 * @param $insId：	项目ID
 * @param $userId:	用户ID
 * @return unknown_type
 */	
	function cancelApplyIndicator($insId,$userId){
		$this->db->where('instanceid', $insId);
		$this->db->where('userid', $userId);
		$this->db->delete('instance_indicator');
		return mysql_error()==''?TRUE:FALSE;
	}
	
/**
 * 功能：取消担任某个项目的指导者（Indicator）
 * @param $insId：	项目ID
 * @param $userId：	用户ID
 * @return unknown_type
 */
	function cancelIndicatorAct($insId,$userId){
		$this->db->where('instanceid', $insId);
		$this->db->where('userid', $userId);
		$this->db->delete('instance_indicator');
		return mysql_error()==''?TRUE:FALSE;
	}
	
/**
 * 功能：通过某个用户申请担任项目指导者的申请，由项目创建者完成
 * @param $insId：	项目ID
 * @param $userId：	用户ID
 * @return unknown_type
 */
	function acApplyIndicator($insId,$userId){
		$result_array = $this->db->query("SELECT NOW()")->row_array();
		$this->db->set('status', '1');
		$this->db->set('handletime',$result_array['NOW()']);
		$this->db->where('instanceid', $insId);
		$this->db->where('userid', $userId);
		$this->db->update('instance_indicator');
		return mysql_error()==''?TRUE:FALSE;
	}
	
/**
 * 功能：拒绝某个用户申请担任项目指导者的申请，由项目创建者完成
 * @param $insId：	项目ID
 * @param $userId：	用户ID
 * @return unknown_type
 */
	function denyApplyIndicator($insId,$userId){
		$this->db->where('instanceid', $insId);
		$this->db->where('userid', $userId);
		$this->db->delete('instance_indicator');
		return mysql_error()==''?TRUE:FALSE;
	}

/**
 * 功能：判断一个用户是否正在申请成为该项目指导者
 * @param $ins_id: 项目ID
 * @param $user_id： 用户ID
 * @return TRUE or FALSE
 */		
	function isApplyingIndicator($insId,$userId){
		$sql = "SELECT * from instance_indicator WHERE instanceid=$insId AND userid=$userId AND status='0'";
		$query = $this->db->query($sql);
		return ($query->num_rows() > 0)?TRUE:FALSE;
/*		$this->db->where('instanceid', $insId);
		$this->db->where('userid', $userId);
		$this->db->where('status','0');
		$result = $this->db->get('instance_indicator');
		return ($result->num_rows()>0)?TRUE:FALSE;	*/
	}
	
// End Indicator's operations	
//--------------------------------------------------------------------

	
	function isPM($insId,$userId){
		$roles = $this->getActorid($insId);
		define("PROJECT_MANAGER",'1');
		foreach($roles as $row){
			if($row['roleid'] == PROJECT_MANAGER && $row['actorid'] == $userId){
				return TRUE;
			}
		}
		return FALSE;
	}
	
}