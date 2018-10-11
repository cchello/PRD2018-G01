<?php
class Commentmodel extends Model
{
	function Commentmodel()
	{
		parent::Model();
	}
	
	
// ------------------------------------------------------------------------

/**
 * Get Comments From Case
 *
 * @param   int     uid of case
 * @access	public
 * @return	array
 */	
	function getCommentsFromCase($caseid)
	{
		$this->db->where('caseid', $caseid);
		return $this->db->get('comments')->result_array();
	}
	
// ------------------------------------------------------------------------

/**
 * Get Comments From Instance
 *
 * @param   int     uid of instance
 * @access	public
 * @return	array
 */	
	function getCommentsFromInstance($instanceid)
	{
		$this->db->where('instanceid', $instanceid);
		return $this->db->get('comments')->result_array();
	}
	
// ------------------------------------------------------------------------

/**
 * Add Comment To Case
 *
 * @param   array    $comment('author'=>,'content','caseid')
 * @access	public
 * @return	bool
 */	
	function addCommentToCase($comment)
	{
//		$comment = array(
//			'author' => $username,
//			'content' => $content,
//			'caseid' => $caseid
//		);
		$this->db->set($comment);
		$this->db->insert('comments');
		if($this->db->affected_rows() > 0)
			return TRUE;
		else 
			return FALSE;
	}
	
// ------------------------------------------------------------------------

/**
 * Add Comment To Instance
 *
 * @param   array    $comment('author'=>,'content','caseid')
 * @access	public
 * @return	bool
 */	
	function addCommentsToInstance($comment)
	{
//		$comment = array(
//			'author' => $username,
//			'content' => $content,
//			'instanceid' => $instanceid
//		);
		$this->db->set($comment);
		$this->db->insert('comments');
		if($this->db->affected_rows() > 0)
			return TRUE;
		else 
			return FALSE;
	}
	
// ------------------------------------------------------------------------

/**
 * Delete Comment 
 *
 * @param   int     uid of comment
 * @access	public
 * @return	bool
 */	
	function deleteComment($commentid)
	{
		$this->db->where('uid', $commentid);
		$this->db->delete('comments');
		if($this->db->affected_rows() > 0)
			return TRUE;
		else 
			return FALSE;
	}
	
	/*name: deleteCommentsFromCase
	input: $caseid
	return: true or false*/
	function deleteCommentsFromCase($caseid)
	{
		$this->db->where('caseid', $caseid);
		$this->db->delete('comments');
		if($this->db->affected_rows() > 0)
			return TRUE;
		else 
			return FALSE;
	}
	
	/*name: deleteCommentsFromInstance
	input: $instanceid
	return: true or false*/
	function deleteCommentsFromInstance($instanceid)
	{
		$this->db->where('instanceid', $instanceid);
		$this->db->delete('comments');
		if($this->db->affected_rows() > 0)
			return true;
		else 
			return false;
	}
}