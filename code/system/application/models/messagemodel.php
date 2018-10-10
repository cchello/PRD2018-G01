<?php
class Messagemodel extends Model
{
	function Messagemodel()
	{
		parent::Model();
	}
	
// ------------------------------------------------------------------------

/**
 * Get All Messages
 *
 *
 * @access	public
 * @param	int 	uid of user
 * @return	array
 */
	
	function getAllMessages($userid)
	{
		$this->db->select('uid,from,to,title,sendtime,isreaded');
		$this->db->where('to', $userid);
		$reslut_array = $this->db->get('messages')->result_array();
		return $reslut_array;
	}
	
	
// ------------------------------------------------------------------------

/**
 * Get Received Messages
 *
 *
 * @access	public
 * @param	int 	uid of user
 * @param   int     page number
 * @param   int     records of per page
 * @return	array
 */
	
	function getReceivedMessagesByLimits($userid,$page,$limits)
	{
		$offset = ($page - 1) * $limits;
		$sql = "SELECT * 
				FROM `messages` 
				WHERE `to` =$userid
				ORDER BY sendtime DESC
				LIMIT $offset,$limits";
		return $this->db->query($sql)->result_array();
	}
// ------------------------------------------------------------------------

/**
 * Get Received Num
 *
 *
 * @access	public
 * @param	int 	uid of user
 * @return	int
 */
	
	function getReceivedNum($userid)
	{
		$this->db->where('to', $userid);
		$this->db->from('messages');
		return $this->db->count_all_results();
	}
// ------------------------------------------------------------------------

/**
 * Get Sent Messages
 *
 *
 * @access	public
 * @param	int 	uid of user
 * @return	array
 */
	
	function getSentMessagesByLimits($userid,$page,$limits)
	{
		$offset = ($page - 1) * $limits;
		$sql = "SELECT * 
				FROM `messages` 
				WHERE `from` =$userid
				ORDER BY sendtime DESC
				LIMIT $offset,$limits";
		return $this->db->query($sql)->result_array();
	}
	
// ------------------------------------------------------------------------

/**
 * Get Sent Num
 *
 *
 * @access	public
 * @param	int 	uid of user
 * @return	int
 */
	
	function getSentNum($userid)
	{
		$this->db->where('from', $userid);
		$this->db->from('messages');
		return $this->db->count_all_results();
	}
	
// ------------------------------------------------------------------------

/**
 * Get New Messages
 *
 *
 * @access	public
 * @param	int 	uid of user
 * @return	int
 */
	
	function getNewMessages($userid)
	{
		$this->db->where('to', $userid);
		$this->db->where('isreaded', 0);
		$this->db->from('messages');
		return $this->db->count_all_results();
	}
// ------------------------------------------------------------------------

/**
 * Delete All Messages
 *
 *
 * @access	public
 * @param	int 	uid of user
 * @return	array
 */
	
	function deleteAllMessages($userid)
	{
		$this->db->select('uid,from,to,title,sendtime,readed');
		$this->db->where('to', $userid);
		$this->db->delete('messages');
	}
	
// ------------------------------------------------------------------------

/**
 * Get A Messages
 *
 *
 * @access	public
 * @param	int 	uid of message
 * @return	array
 */
	
	function getMessage($messageid)
	{
		$this->db->where('uid', $messageid);
		$reslut_array = $this->db->get('messages')->row_array();
		if($reslut_array['isreaded'] == 0)//if unreaded
		{
			$this->db->set('isreaded', 1);
			$this->db->where('uid', $messageid);
			$this->db->update('messages');
		}
		return $reslut_array;
	}
	

	
// ------------------------------------------------------------------------

/**
 * Add A Messages
 *
 *
 * @access	public
 * @param	array 	cotent of message
 * @return	bool
 */
	
	function addMessage($message)
	{
		$this->db->set($message);
		$this->db->insert('messages');
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}
	
// ------------------------------------------------------------------------

/**
 * Delete A Messages
 *
 *
 * @access	public
 * @param	int 	uid of message
 * @return	bool
 */
	
	function deleteMessage($messageid)
	{
		$this->db->where('uid', $messageid);
		$this->db->delete('messages');
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}
	
// ------------------------------------------------------------------------

/**
 * Change  Message Status
 *
 *
 * @access	public
 * @param	int 	uid of message
 * @return	
 */
	
	function changeMessageStatus($messageid)
	{
		$this->db->set('isreaded', 1);
		$this->db->where('uid', $messageid);
		$this->db->update('messages');
	}

}