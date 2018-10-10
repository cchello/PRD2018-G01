<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
class Role_model extends Model
{
	function Role_model()
	{
		parent::Model();
		if(!defined("ROLE_OPENED"))define("ROLE_OPENED",'1');
		if(!defined("ROLE_CLOSED"))define("ROLE_CLOSED",'0');
		if(!defined("USER_ROLE_APPLYING"))define("USER_ROLE_APPLYING",'1');
		if(!defined("USER_ROLE_DENIED"))define("USER_ROLE_DENIED",'3');
		if(!defined("USER_ROLE_ACCEPTED"))define("USER_ROLE_ACCEPTED",'5');
		if(!defined("ROLE_INSTRUCTOR"))define("ROLE_INSTRUCTOR",'0');
		if(!defined("ROLE_PM"))define("ROLE_PM",'1');
		if(!defined("OP_OPEN"))define("OP_OPEN",'0');
		if(!defined("OP_CLOSE"))define("OP_CLOSE",'1');
		if(!defined("OP_AC"))define("OP_AC",'2');
		if(!defined("OP_BAN"))define("OP_BAN",'3');
		if(!defined("OP_REFUSE"))define("OP_REFUSE",'4');
		if(!defined("OP_APPLY"))define("OP_APPLY",'5');
		if(!defined("OP_CANCEL"))define("OP_CANCEL",'6');
		if(!defined("OP_QUIT"))define("OP_QUIT",'7');
	}

	function index(){

	}

	/**
	 * Get a spec role applyer list

	 * @access	public
	 * @param   int        instanceid
	 * @param   int        0 = player 1= indicator 2 = observer
	 * @param   int        roleid of the case
	 * @return	array(userName,userId)
	 */
	function getSpecRoleApplyers($insId, $roleId){
		$sql = "SELECT DISTINCT username as userName,userid as userId
				FROM userinsrole,users
				WHERE $insId = userinsrole.insId
				AND $roleId = userinsrole.roleId
				AND userinsrole.status =".USER_ROLE_APPLYING."
				AND userinsrole.userid = users.uid";
		return $this->db->query($sql)->result_array();
	}

	function getRoleName($caseId ,$roleId){
		$this->db->where('caseid',$caseId);
		$this->db->where('roleId',$roleId);
		$result =  $this->db->get('roles')->row_array();
		if(!empty($result))return $result['rolename'];
		else return '-1';
	}

	/**
	 * Get Role Playerid

	 *
	 * @access	public
	 * @param	int     uid of instance
	 * @param   int     roleid in the instance
	 * @return	bool
	 */
	function getRolePlayerid($insId, $roleId){
		$this->db->where('instanceid', $insId);
		$this->db->where('roleid', $roleId);
		$result = $this->db->get('instance_role')->row_array();
		if(!empty($result) && $result['actorid'] != '-1')return $result['actorid'];
		else return '-1';
	}

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
	function isRoleOpened($insId, $roleId){
		$this->db->where('instanceid',$insId);
		$this->db->where('roleid',$roleId);
		$result = $this->db->get('instance_role')->row_array();
		if(empty($result))return '-1';
		return ($result['status'] == ROLE_OPENED)?TRUE:FALSE;
	}

	//-------------------------------Role operations--------------------------------
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
	function openRole($insId, $roleId){
		//update instance_role
		$this->db->set('status', ROLE_OPENED);
		$this->db->where('instanceid', $insId);
		$this->db->where('roleid', $roleId);
		$this->db->update('instance_role');
		return (mysql_error() == '')?TRUE:FALSE;
	}

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
	function closeRole($insId, $roleId){
		//update instance_role
		$this->db->set('status', ROLE_CLOSED);
		$this->db->where('instanceid', $insId);
		$this->db->where('roleid', $roleId);
		$this->db->update('instance_role');
		return (mysql_error() == '')?TRUE:FALSE;
	}

	/**
	 * Apply Role
	 * @access	public
	 * @param	int     uid of instance
	 * @param	int     roleid in the instance
	 * @param	int     uid of user
	 * @return	bool
	 */
	function applyRole($insId, $roleId, $userId){
		$nowTime = $this->db->query("SELECT now()")->row_array();
		$nowTime = $nowTime['now()'];
		$data = array(
			'userId' => $userId,
			'insId' => $insId,
			'roleId' => $roleId,
			'applyTime' => $nowTime,
			'status' => USER_ROLE_APPLYING
		);
		$this->db->set($data);
		$this->db->insert('userinsrole');
		return (mysql_error() == '')?TRUE:FALSE;
	}

	function changeRole($insId,$roleTo,$userId,$roleFrom = '-1'){
		if($roleFrom == '-1')return $this->acceptRole($insId,$roleTo,$userId);
		else{
			$nowTime = $this->db->query("SELECT now()")->row_array();
			$nowTime = $nowTime['now()'];
			$this->db->trans_start();
			
			//ban user start
			$this->db->where('instanceid', $insId);
			$this->db->where('userid', $userId);
			$this->db->delete('user_instance');

			$this->db->where('insId',$insId);
			$this->db->where('roleId',$roleFrom);
			$this->db->where('userId',$userId);
			$this->db->delete('userinsrole');

			$this->db->where('instanceid',$insId);
			$this->db->where('roleid',$roleFrom);
			$this->db->set('actorid','-1');
			$this->db->update('instance_role');
			//ban user finished
			
			//ac user start
			$data = array(
			'userId' => $userId,
			'insId' => $insId,
			'roleId' => $roleTo,
			);
			$this->db->set('status',USER_ROLE_ACCEPTED);
			$this->db->set('handleTime',$nowTime);
			$this->db->set('applyTime',$nowTime);
			$this->db->where($data);
			$this->db->update('userinsrole');
			//update instance_role
			$this->db->set('actorid', $userId);
			$this->db->where('instanceid', $insId);
			$this->db->where('roleid', $roleTo);
			$this->db->update('instance_role');

			//update or insert user_instance
			$caseid = $this->getCaseid($insId);
			$this->db->where('caseid', $caseid);
			$this->db->where('roleid', $roleTo);
			$result_array = $this->db->get('roles')->row_array();
			$this->db->where('userid', $userId);
			$this->db->where('instanceid', $insId);
			$action = ($this->db->get('user_instance')->num_rows() > 0)?'1':'0'; //1 for update, 0 for insert
			$tmp['accepttime'] = $nowTime;
			switch($roleTo){
				case ROLE_PM:
					$tmp['rolegroup'] = 1;
					break;
				case ROLE_INSTRUCTOR:
					$tmp['rolegroup'] = 3;
					break;
				default:
					$tmp['rolegroup'] = 2;
					break;
			}
			$tmp['isvalid'] = 1;
			$tmp['userid'] = $userId;
			$tmp['instanceid'] = $insId;

			$this->db->set($tmp);
			$this->db->where('userid', $userId);
			$this->db->where('instanceid', $insId);
			if($action)	$this->db->update('user_instance');
			else $this->db->insert('user_instance');
			//ac user finished
			$this->db->trans_complete();
			return (mysql_error() == '')?TRUE:FALSE;
		}
	}
	/**
	 * Accept Role
	 * @access	public
	 * @param	int     uid of instance
	 * @param	int     roleid in the instance
	 * @param	int     uid of user
	 * @return	bool
	 */
	function acceptRole($insId, $roleId, $userId){
		$nowTime = $this->db->query("SELECT now()")->row_array();
		$nowTime = $nowTime['now()'];

		$this->db->trans_start();
		//update userinsrole
		$data = array(
			'userId' => $userId,
			'insId' => $insId,
			'roleId' => $roleId,
		);
		$this->db->set('status',USER_ROLE_ACCEPTED);
		$this->db->set('handleTime',$nowTime);
		$this->db->where($data);
		$this->db->update('userinsrole');
		//update instance_role
		$this->db->set('actorid', $userId);
		$this->db->where('instanceid', $insId);
		$this->db->where('roleid', $roleId);
		$this->db->update('instance_role');

		//update or insert user_instance
		$caseid = $this->getCaseid($insId);
		$this->db->where('caseid', $caseid);
		$this->db->where('roleid', $roleId);
		$result_array = $this->db->get('roles')->row_array();
		$this->db->where('userid', $userId);
		$this->db->where('instanceid', $insId);
		$action = ($this->db->get('user_instance')->num_rows() > 0)?'1':'0'; //1 for update, 0 for insert
		$tmp['accepttime'] = $nowTime;
		switch($roleId){
			case ROLE_PM:
				$tmp['rolegroup'] = 1;
				break;
			case ROLE_INSTRUCTOR:
				$tmp['rolegroup'] = 3;
				break;
			default:
				$tmp['rolegroup'] = 2;
				break;
		}
		$tmp['isvalid'] = 1;
		$tmp['userid'] = $userId;
		$tmp['instanceid'] = $insId;

		$this->db->set($tmp);
		$this->db->where('userid', $userId);
		$this->db->where('instanceid', $insId);
		if($action)	$this->db->update('user_instance');
		else $this->db->insert('user_instance');
		$this->db->trans_complete();
		return (mysql_error() == '')?TRUE:FALSE;
	}

	function refusePlayerApply($insId,$roleId,$userId){
/*		$nowTime = $this->db->query("SELECT now()")->row_array();
		$nowTime = $nowTime['now()'];
		$data = array(
			'userId' => $userId,
			'insId' => $insId,
			'roleId' => $roleId,
		);
		$this->db->set('status',USER_ROLE_DENIED);
		$this->db->set('handleTime',$nowTime);
		$this->db->where($data);
		$this->db->update('userinsrole');
		return (mysql_error() == '')?TRUE:FALSE;*/
		return $this->refuseConfirm($insId,$roleId,$userId); //added "return" by wmc 2010/06/19
	}

	function refuseConfirm($insId,$roleId,$userId){
		$data = array(
			'userId' => $userId,
			'insId' => $insId,
			'roleId' => $roleId
		);
		$this->db->where($data);
		$this->db->delete('userinsrole');
		return (mysql_error() == '')?TRUE:FALSE;
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
	function banRolePlayer($insId, $roleId){
		return $this->banRolesPlayer($insId,$roleId);
	}

	/**
	 * Quit Apply
	 * @access	public
	 * @param	int     uid of instance
	 * @param	int     uid of user
	 * @return	bool
	 */
	function cancelRoleApply($insId, $roleId, $userId){
		$this->db->where('insId', $insId);
		$this->db->where('userId', $userId);
		$this->db->where('roleId',$roleId);
		$this->db->delete('userinsrole');
		return (mysql_error() == '')?TRUE:FALSE;
	}

	/**
	 * Quit Role
	 * @access	public
	 * @param	int     uid of instance
	 * @param	int     uid of user
	 * @return	bool
	 */
	function quitRole($insId,$roleId,$userId){
		return $this->banRolesPlayer($insId,$roleId);
	}

	private function banRolesPlayer($insId,$roleId){
		$userId = $this->getRolePlayerid($insId,$roleId);
		$this->db->trans_start();

		$this->db->where('instanceid', $insId);
		$this->db->where('userid', $userId);
		$this->db->delete('user_instance');

		$this->db->where('insId',$insId);
		$this->db->where('roleId',$roleId);
		$this->db->where('userId',$userId);
		$this->db->delete('userinsrole');

		$this->db->where('instanceid',$insId);
		$this->db->where('roleid',$roleId);
		$this->db->set('actorid','-1');
		$this->db->update('instance_role');

		$this->db->trans_complete();
		return (mysql_error() == '')?TRUE:FALSE;
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
}
