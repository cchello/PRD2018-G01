<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
error_reporting(0);
class Usermodel extends Model
{
	
	function Usermodel() 
	{
		parent::Model();
		if(!defined("DOC_STATUS_UNREAD"))define("DOC_STATUS_UNREAD",'0');
		if(!defined("DOC_STATUS_ACCEPTED"))define("DOC_STATUS_ACCEPTED",'3');
		if(!defined("DOC_STATUS_DENIED"))define("DOC_STATUS_DENIED",'6');
		if(!defined("USER_ROLE_APPLYING"))define("USER_ROLE_APPLYING",'1');
		if(!defined("USER_ROLE_DENIED"))define("USER_ROLE_DENIED",'3');
		if(!defined("USER_ROLE_ACCEPTED"))define("USER_ROLE_ACCEPTED",'5');
// following added by wmc 2010/06/11		
		if(!defined("INS_STATUS_UNREADY"))define("INS_STATUS_UNREADY",'0');
		if(!defined("INS_STATUS_READY"))define("INS_STATUS_READY",'1');
		if(!defined("INS_STATUS_ONGOING"))define("INS_STATUS_ONGOING",'3');
		if(!defined("INS_STATUS_STARTED"))define("INS_STATUS_STARTED",'3');
		if(!defined("INS_STATUS_FINISHED"))define("INS_STATUS_FINISHED",'6');
	}

// ------------------------------------------------------------------------

		/**
	 * Get Login History
	 *
	 *
	 * @access	public  
	 * @param	int     uid of user   	
	 * @return	array
	 * @edit by dw
	 */	
	function getLoginHistory($userid)
	{
		$sql = "select time,ip
		        from login_history
		        where userid=$userid
		       ";
        $result= $this->db->query($sql)->result_array();
        if(!$result)
        {
        	return FALSE;
        } 
		return $result;
	}
	
	
// ------------------------------------------------------------------------

/**
 * Get Userid
 *
 * get userid by username
 *
 * @access	public
 * @param	string	    username
 * @return	int
 */
	function getUserid($username)
	{
		$this->db->where('username', $username);
		$result_array = $this->db->get('users')->row_array();
		if(!$result_array)
			return FALSE;
		return $result_array['uid'];
	}

// ------------------------------------------------------------------------

/**
 * Get All User By Uid
 * get all users sorted by uid
 * @access	public
 * return array
 */	
	function getAlluserbyuid()
	{
		$this->db->order_by("uid", "asc"); 
		$query = $this->db->get('users');
		return $query->result_array();
	}
	
// ------------------------------------------------------------------------	

/**
 * Get All User By Uid
 * get all users sorted by uid
 * @access	public
 * return array
 */	
	function getAlluserbyusername()
	{
		$this->db->order_by("username", "asc"); 
		$query = $this->db->get('users');
		return $query->result_array();
	}
	
// ------------------------------------------------------------------------	

/**
 * Get All User By Uid
 * get all users sorted by uid
 * @access	public
 * return array
 */	
	function getAlluserbyemail()
	{
		$this->db->order_by("email", "asc"); 
		$query = $this->db->get('users');
		return $query->result_array();
	}
	
// ------------------------------------------------------------------------	

/**
 * Get All User By Uid
 * get all users sorted by uid
 * @access	public
 * return array
 */	
	function getAlluserbyregtime()
	{
		$this->db->order_by("registertime", "asc"); 
		$query = $this->db->get('users');
		return $query->result_array();
	}
	
// ------------------------------------------------------------------------	
/**
 * Get All User By Uid
 * get all users sorted by uid
 * @access	public
 * return array
 */	
	function getAlluserbyusertype()
	{
		$this->db->order_by("groupid", "asc"); 
		$query = $this->db->get('users');
		return $query->result_array();
	}
	
// ------------------------------------------------------------------------	
/**
 * Get All User By Uid
 * get all users sorted by uid
 * @access	public
 * return array
 */	
	function getAlluserbystatus()
	{
		$this->db->order_by("status", "asc"); 
		$query = $this->db->get('users');
		return $query->result_array();
	}
	
// ------------------------------------------------------------------------		
	
/**
 * Get Username
 *
 * get username by userid
 *
 * @access	public
 * @param	int	    userid
 * @return	string
 */
	function getUsername($userid)
	{
		$this->db->where('uid',$userid);
		$result_array = $this->db->get('users')->row_array();
		if(!empty($result_array))return $result_array['username'];
		else return '-1';
	}
	
// ------------------------------------------------------------------------

/**
 * Authen
 *
 * Authen username and password
 *
 * @access	public
 * @param	string	    username
 * @param   string      password
 * @return	rool
 */
	function authen($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('users');
		if($query->num_rows() > 0 )
			return TRUE;
		else
			return FALSE;
	}
	
// ------------------------------------------------------------------------

/**
 * Get Groupid
 *
 * get groupid of a user
 *
 * @access	public
 * @param	string	    username
 * @return	int
 */
	function getGroupid($username)
	{
		$this->db->where('username', $username);
		$result_array = $this->db->get('users')->row_array();
		return $result_array['groupid'];
	}
	
// ------------------------------------------------------------------------

/**
 * Get Username By id
 *
 *
 * @access	public
 * @param	int	    userid
 * @return	string
 */
	function getUsernameByUserid($userid)
	{
		$this->db->where('uid', $userid);
		$resultArray = $this->db->get('users')->row_array();
		return (!empty($resultArray))?$resultArray['username']:'-1';
	}
	
// ------------------------------------------------------------------------

/**
 * Get User
 *
 * get a record of a user
 *
 * @access	public
 * @param	int	    uid of a user
 * @return	array
 */
	function getUser($userid)
	{
		$this->db->where('uid', $userid);
		return $this->db->get('users')->row_array();
	}
	
// ------------------------------------------------------------------------
/**
 * Get User By Name
 * 
 * get a record of a uer
 * @access	public
 * @param	int	    uid of a user
 * @return	array
 * @wmc 2009/11/17
 */
	
	function getUserbyname($name)
	{
		$this->db->where('username', $name);	
		$result = $this->db->get('users');
		if($result->num_rows() > 0)
		{
		    return $result->row_array();
		}
		  
		else return null;

	}	
	
// ------------------------------------------------------------------------
/**
 * Check Username
 *
 * check whether the username has existed
 *
 * @access	public
 * @param	string	    
 * @return	bool
 */
	function checkUsername($username)
	{
		$this->db->where('username', $username);
		if($this->db->get('users')->num_rows() > 0)
			return TRUE;
		else 
			return FALSE;
	}
	
// ------------------------------------------------------------------------
/**
 * Check checkUserEmail
 *
 * check whether the username has existed
 *
 * @access	public
 * @param	string	    
 * @return	bool
 */
	function checkUserEmail($userEmail){
		$this->db->where('email', $userEmail);
		if($this->db->get('users')->num_rows() > 0)
			return TRUE;
		else 
			return FALSE;
	}
	
// ------------------------------------------------------------------------

/**
 * Check Userid
 *
 * check whether the userid has existed
 *
 * @access	public
 * @param	string	    
 * @return	bool
 */
	function checkUserid($userid)
	{
		$this->db->where('uid', $userid);
		if($this->db->get('users')->num_rows() > 0)
			return TRUE;
		else 
			return FALSE;
	}
	
// ------------------------------------------------------------------------

/**
 * Get All Users
 *
 * get all records of users
 *
 * @access	public
 * @param		    
 * @return	array
 */
	function getAllUsers()
	{
		return $this->db->get('users')->result_array();
	}

// ------------------------------------------------------------------------

/**
 * Get All Inactive users
 * @access	public
 * @param		    
 * @return	array
 * writer wmc
 * @date 2009/11/13
 */	
	function getAllInactiveUsers()
	{
		$this->db->where('status','1');
		return $this->db->get('users')->result_array();
	}
	
//  ------------------------------------------------------------------------	

/**
 * Get Ban Email
 * @access	public
 * @param		    
 * @return	array
 * writer wmc
 * @date 2009/11/23
 */	
	function getBanemail()
	{
		return $this->db->get('ban_emaillist')->result_array();
	}
	
//  ------------------------------------------------------------------------

/**
 * Get Ban Email Info
 * @access	public
 * @param		    
 * @return	array
 * writer wmc
 * @date 2009/11/25
 */	
	function getBanemailinfo($email)
	{
		$this->db->where('email',$email);
		return $this->db->get('ban_emaillist')->result_array();		
	}
	
//  ------------------------------------------------------------------------
/**
 * Get Delete Ban Email
 * @access	public
 * @param		    
 * @return	array
 * writer wmc
 * @date 2009/11/25
 */	
	function deleteBanemail($email)
	{
		$this->db->where('email',$email);
		$this->db->delete('ban_emaillist');
		if($this->db->affected_rows() > 0)
			return TRUE;
		else
			return FALSE;
			
	}
	
//  ------------------------------------------------------------------------

/**
 * Add Ban Email
 * @access	public
 * @param		    
 * @return	array
 * writer wmc
 * @date 2009/11/24
 */	
	function addBanemail($user)
	{
		$data = $user;
		$this->db->insert('ban_emaillist',$data);
		if($this->db->affected_rows() > 0)
			return TRUE;
		else
			return FALSE;
	}
	
//  ------------------------------------------------------------------------

/**
 * Get Ban Email
 * @access	public
 * @param		    
 * @return	array
 * writer wmc
 * @date 2009/11/23
 */	
	function getBanip()
	{
		return $this->db->get('ban_iplist')->result_array();
	}
	
//  ------------------------------------------------------------------------

/**
 * Get Ban IP Info
 * @access	public
 * @param		    
 * @return	array
 * writer wmc
 * @date 2009/11/25
 */	
	function getBanipinfo($ip)
	{
		$this->db->where('ip',$ip);
		return $this->db->get('ban_iplist')->result_array();		
	}
	
//  ------------------------------------------------------------------------
/**
 * Get Delete Ban Email
 * @access	public
 * @param		    
 * @return	array
 * writer wmc
 * @date 2009/11/25
 */	
	function deleteBanip($ip)
	{
		$this->db->where('ip',$ip);
		$this->db->delete('ban_iplist');
		if($this->db->affected_rows() > 0)
			return TRUE;
		else
			return FALSE;
			
	}
	
//  ------------------------------------------------------------------------

/**
 * Add Ban IP
 * @access	public
 * @param		    
 * @return	array
 * writer wmc
 * @date 2009/11/25
 */	
	function addBanip($user)
	{
		$data = $user;
		$this->db->insert('ban_iplist',$data);
		if($this->db->affected_rows() > 0)
			return TRUE;
		else
			return FALSE;
	}
	
//  ------------------------------------------------------------------------
	
/**
 * Get Ban Regname
 * @access	public
 * @param		    
 * @return	array
 * writer wmc
 * @date 2009/11/25
 */	
	function getBanregname()
	{
		return $this->db->get('ban_regnamelist')->result_array();
	}
	
//  ------------------------------------------------------------------------

/**
 * Get Ban Regname Info
 * @access	public
 * @param		    
 * @return	array
 * writer wmc
 * @date 2009/11/25
 */	
	function getBanregnameinfo($name)
	{
		$this->db->where('name',$name);
		return $this->db->get('ban_regnamelist')->result_array();		
	}
	
//  ------------------------------------------------------------------------
/**
 * Delete Ban Regname
 * @access	public
 * @param		    
 * @return	array
 * writer wmc
 * @date 2009/11/25
 */	
	function deleteBanregname($name)
	{
		$this->db->where('name',$name);
		$this->db->delete('ban_regnamelist');
		if($this->db->affected_rows() > 0)
			return TRUE;
		else
			return FALSE;
			
	}
	
//  ------------------------------------------------------------------------

/**
 * Add Ban Regname
 * @access	public
 * @param		    
 * @return	array
 * writer wmc
 * @date 2009/11/25
 */	
	function addBanregname($user)
	{
		$data = $user;
		$this->db->insert('ban_regnamelist',$data);
		if($this->db->affected_rows() > 0)
			return TRUE;
		else
			return FALSE;
	}
	
//  ------------------------------------------------------------------------	
/**
 * Get Total
 * 
 * get total user number
 * 
 * @access public
 * @param
 * @return integer
 */
function get_total(){
       $query = $this->db->get('users');
       $total = $query->num_rows($query); 
       return $total;
     }
//  -----------------------------------------------------------------------
/**
 * Get Per Data
 * 
 * get per data / page
 * @param $per
 * @param $offset
 * @return array
 */
     
     function get_per_data($per=1,$offset=0){
        $query = $this->db->limit($per,$offset)->get('users');
        return $query;
     }
//  ------------------------------------------------------------------------
/**
 * Add User
 *
 *
 * @access	public
 * @param	array	   $uers('name','password','email') 
 * @return	bool
 */
	function addUser($user, $groupid = 2)
	{
		$result = $this->db->query("SELECT NOW()")->row_array();
		$user['registertime'] = $result['NOW()'];
		$user['groupid'] =  $groupid;
		$this->db->insert('users', $user);
		if($this->db->affected_rows() > 0)
			return TRUE;
		else
			return FALSE;
	}
	
// ------------------------------------------------------------------------
/**
 * Delete User
 *
 *
 * @access	public
 * @param	int	     uid of the user
 * @return	bool
 */	

	function deleteUser($userid)
	{
		$this->db->where('uid', $userid);
		$this->db->delete('users');
		if($this->db->affected_rows() > 0)
			return TRUE;
		else
			return FALSE;
	}
	
// ------------------------------------------------------------------------
/**
 * Active User
 *
 *
 * @access	public
 * @param	int	     uid of the user
 * @return	bool
 */	
	function activeUser($userid)
	{
		$this->db->set('status', 0);
		$this->db->where('uid', $userid);
		$this->db->update('users');
	}
	
// ------------------------------------------------------------------------
/**
 * Deactive User
 *
 *
 * @access	public
 * @param	int	     uid of the user
 * @return	bool
 */	
	function deactiveUser($userid)
	{
		$this->db->set('status', 1);
		$this->db->where('uid', $userid);
		$this->db->update('users');
	}
// ------------------------------------------------------------------------
/**
 * Update User
 *
 *
 * @access	public
 * @param	int	     uid of the user
 * @param	array	 
 * @return	bool
 */	
	function updateUser($user)
	{
		$userid = $user['uid'];
		$this->db->set($user);
		$this->db->where('uid', $userid);
		$this->db->update('users');
		if($this->db->affected_rows() > 0)
			return TRUE;
		else
			return FALSE;
	}	
	
// ------------------------------------------------------------------------
/**
 * Change Password
 *
 *
 * @access	public
 * @param	int	     uid of the user
 * @param   string   new password 
 * @return	bool
 */	
	function changePassword($userid, $newpassword)
	{
		$this->db->set('password', $newpassword);
		$this->db->where('uid', $userid);
		$this->db->update('users');
		if($this->db->affected_rows() > 0)
			return TRUE;
		else
			return FALSE;
	}


	
// ------------------------------------------------------------------------

/**
* User  Complexsearch
*
* @access	public  
* @param	int     uid of user   	
* @return	array
*/			
	function comsearch($array) 
	{
		if(empty($array['regtime']))
		{
			if($array['regtimecomp'] == 'less')
			{
				$array['regtime']=date("Y-m-d h:m:s");
			}
			else 
				$array['regtime']="0";
		}
			
		if(empty($array['caseno']))
		{
			if($array['casenocomp'] == 'less')
				$array['caseno']="99999999999";
			else 
				$array['caseno']="0";
		}
		
		if($array['casenocomp'] == 'less')
		{
			$array['casenocomp'] = '<';
		}
		
		if($array['regtimecomp'] == 'less')
		{
			$array['regtimecomp'] = '<';
		}
	
		$sql ="select * from users
			   where username like '%{$array['username']}'
			   and status='{$array['userstatus']}'
			   and groupid='{$array['usertype']}'
			   and registertime {$array['regtimecomp']} '{$array['regtime']}'
			   and finisheds {$array['casenocomp']} '{$array['caseno']}'
			   order by {$array['sortkey']} {$array['sort']}";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0 )
        {
        	return $query->result_array();
        }
		else return false;
								
	}
	
// --------------------------------------------------------------------------------
/**
* PruneUser
*
* @access	public  
* @param	array      	
* @return	array
*/			
	function pruneUser($array) 
	{
		if(empty($array['regtime']))
		{
			if($array['regtimecomp'] == 'less')
			{
				$array['regtime']=date("Y-m-d h:m:s");
			}
			else 
				   $array['regtime']="0";
		}
		if(empty($array['caseno']))
		{
			if($array['casenocomp'] == 'less')
				   $array['caseno']="99999999999";
			   else 
			    $array['caseno']="0";
		}
		if($array['casenocomp'] == 'less')
			$array['casenocomp'] = '<';
	
			
		if($array['regtimecomp'] == 'less')
		{
			$array['regtimecomp'] = '<';
		}
		
		if($array['operation'] == 'deactive')  //处理operation为deactive的操作
		{
			$sql = "update users set status=1";
		}
		else 
		{
			$sql = "delete users";
		}
		$sql .= " where username like '%{$array['username']}'
			   and email like '%{$array['email']}'
			   and registertime {$array['regtimecomp']} '{$array['regtime']}'
			   and finisheds {$array['casenocomp']} '{$array['caseno']}'";
//		echo $sql;
//		die();
		$this->db->query($sql);						
	}
	
// ------------------------------------------------------------------------

	/**
	 * Get Playing Instances
	 *
	 *
	 * @access	public  
	 * @param	int     uid of user   	
	 * @return	array(insId, creatorId, insStatus, roleName, caseName ,insName, creationTime, progress)
	 */		
	function getPlayingInstances($userid)
	{
		$sql = "SELECT DISTINCT 
					instances.uid AS insId, instances.creatorid AS creatorId, 
					instances.status AS insStatus, roles.rolename AS roleName, 
					cases.casename AS caseName, instances.instancename AS insName,
					 instances.creationtime AS creationTime, instances.progress
				FROM cases, instances, roles, instance_role
				WHERE instance_role.actorid = $userid
				AND instance_role.instanceid = instances.uid
				AND instances.caseid = cases.uid
				AND instance_role.roleid = roles.roleid
				AND cases.uid = roles.caseid
				AND instances.status != 6 
				";   //instances.status !=6 is added by wmc 2010/06/11 目的是去除已经结束的项目
		return $this->db->query($sql)->result_array();
	}

// ------------------------------------------------------------------------

	/**
	 * Get Indicating Instances
	 *
	 *
	 * @access	public  
	 * @param	int     uid of user   	
	 * @return	array
	 */	
	function getIndicatingInstances($userid)
	{
		$sql = "SELECT DISTINCT
					   instances.uid AS instanceid,
					   instances.creatorid,
					   instances.status,
	                   cases.casename,
					   instances.instancename,
					   instances.creationtime,
					   instances.progress,
					   user_instance.accepttime
				FROM cases,instances,roles,user_instance
				WHERE $userid = user_instance.userid AND
					  user_instance.isvalid = 1 AND
					  user_instance.rolegroup = 3 AND
				      user_instance.instanceid = instances.uid AND
				      instances.caseid = cases.uid";
		$result_array = $this->db->query($sql)->result_array();
		return $result_array;
	}
	
// ------------------------------------------------------------------------

	/**
	 * Get Observering Instances
	 *
	 *
	 * @access	public  
	 * @param	int     uid of user   	
	 * @return	array
	 */		
	function getObserveringInstances($userid)
	{
		$sql = "SELECT DISTINCT 
				  	   instances.uid AS instanceid,
					   instances.creatorid,
					   instances.status,
					   cases.casename,
					   instances.instancename,
					   instances.creationtime,
					   instances.progress,
					   user_instance.accepttime
				FROM cases,instances,roles,user_instance
				WHERE $userid = user_instance.userid AND
					  user_instance.isvalid = 1 AND
					  user_instance.rolegroup = 4 AND
				      user_instance.instanceid = instances.uid AND
				      instances.caseid = cases.uid";
		$result_array = $this->db->query($sql)->result_array();
		return $result_array;
	}
	

/**
 * GET user submits which includes unread, accepted, denied. seperated by $flag
 * $flag:	DOC_STATUS_UNREAD, DOC_STATUS_ACCEPTED, DOC_STATUS_DENIED
 * @param $insId
 * @param $userId
 * @param $flag
 * @param $type	: '0' stand for mine, '1' stand for teamates
 * @return array
 */	
	function getUserSubmits($insId,$userId,$flag,$type = '0'){
		switch($flag){
			case DOC_STATUS_UNREAD:
				$where = array('instanceid' => $insId, 'status' => DOC_STATUS_UNREAD);
			break;
			case DOC_STATUS_ACCEPTED:
				$where = array('instanceid' => $insId, 'status' => DOC_STATUS_ACCEPTED);
			break;
			case DOC_STATUS_DENIED:
				$where = array('instanceid' => $insId, 'status' => DOC_STATUS_DENIED);
			break;
			default:
				return '-1';
			break;
		}
		if($userId != '0' && $this->isInProject($insId,$userId)){
			$tmp = ($type == '0')?array('uploader' => $userId):array('uploader !=' => $userId);
			$where = array_merge($where,$tmp);
			$this->db->where($where);
			return $this->db->get('newsubmits')->result_array();
		}else return '-1';
	}
	
/**
 * Get Applying Roleid	
 * get a user's applying roleid
 * @access	public
 * @param	int     uid of instance   
 * @param	int     uid of user   	
 * @return	int     Roleid or -1
 */	
	function getUserApplyingRoleId($insId, $userId){
				$this->db->where('insId', $insId);
		$this->db->where('userId', $userId);
		$this->db->where('status', USER_ROLE_APPLYING);
		$query = $this->db->get('userinsrole');
		if($query->num_rows() > 0){
			$result = $query->row_array();
			$caseId = $this->getCaseId($insId);
			$this->db->where('caseid',$caseId);
			$this->db->where('roleid',$result['roleId']);
			$ret = $this->db->get('roles')->row_array();
			if(!empty($ret)){
				return array('roleId' => $result['roleId'],"roleName" => $ret['rolename']);
			}else return '-1';
		}
			return '-1';
			
//		$this->_getUserRole($insId,$userId,USER_ROLE_APPLYING);
	}
	
/*	function getUserDeniedRole($insId,$userId){
		$this->_getUserRole($insId,$userId,USER_ROLE_DENIED);
	}
	
	private function _getUserRole($insId,$userId,$type){
		$this->db->where('insId', $insId);
		$this->db->where('userId', $userId);
		$this->db->where('status', $type);
		$query = $this->db->get('userinsrole');
		if($query->num_rows() > 0){
			$result = $query->row_array();
			$caseId = $this->getCaseId($insId);
			$this->db->where('caseid',$caseId);
			$this->db->where('roleid',$result['roleId']);
			$ret = $this->db->get('roles')->row_array();
			if(!empty($ret)){
				return array('roleId' => $result['roleId'],"roleName" => $ret['rolename']);
			}else return '-1';
		}
			return '-1';
	}*/
	
	function getUserPlayingRole($insId,$userId){
		$this->db->where('instanceid',$insId);
		$this->db->where('actorid',$userId);
		$result =  $this->db->get('instance_role')->row_array();
		if(!empty($result))$roleId =  $result['roleid'];
		else return '-1';
		$caseId = $this->getCaseId($insId);
		$this->db->where('caseid',$caseId);
		$this->db->where('roleid',$roleId);
		$ret = $this->db->get('roles')->row_array();
		if(!empty($ret)){
			return array('roleId' => $roleId,"roleName" => $ret['rolename']);
		}else return '-1';
	}
	
	function getCaseId($insId){
		$this->db->where('uid', $insId);
		$resultArray = $this->db->get('instances')->row_array();
		return $resultArray['caseid'];
	}	
	
	private function isInProject($insId,$userId){
		$sql = "SELECT roleid,actorid FROM instance_role WHERE instanceid=$insId";
		$query = $this->db->query($sql);
		$actors = $query->result_array();
		foreach($actors as $actor){
			if($actor['actorid'] == $userId){
				return TRUE;
			}
		}
		return FALSE;
	}
	
	
	//是否存在头像

	function checkUserPorPath($username)
	{
		$this->db->where('username', $username);
		$result_array = $this->db->get('users')->row_array();
		if($result_array['portraitpath']){
			return TRUE;
		}	
		return FALSE;
	}
	
	//查询头像路径
	function getUserPorPath($username)
	{
		$this->db->where('username', $username);
		$result_array = $this->db->get('users')->row_array();
		return $result_array['portraitpath'];		
	}
	
	//更新头像
	function changePorPath($username,$newpath){
		$this->db->set('portraitpath',$newpath);
		$this->db->where('username',$username);
		$this->db->update('users');
	}
	
	
	

}