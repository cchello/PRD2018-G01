<?php
class Bbsmodel extends Model
{
	function Bbsmodel()
	{
		parent::Model();
	}
 	
	function getAuthoridBySubjectid($subjectid)
	{
		$this->db->where('uid', $subjectid);
		$result = $this->db->get('bbs_subjects')->row_array();
		return $result['authorid'];
	}
	function getCaseidBySubjectid($subjectid)
	{
		$this->db->where('uid', $subjectid);
		$result = $this->db->get('bbs_subjects')->row_array();
		if($result)
			return $result['caseid'];
		return -1;
	}
//	function getSubjectidByReplyid($replyid)
//	{
//		$this->db->where('uid', $replyid);
//		$result = $this->db->get('bbs_replys')->row_array();
//		if($result)
//			return $result['subjectid'];
//		return -1;
//	}
	
	function getAuthoridByReplyid($replyid)
	{
		$this->db->where('uid', $replyid);
		$result = $this->db->get('bbs_replys')->row_array();
		if($result)
			return $result['authorid'];
		return -1;
		
	}
	function getSubjectid($replyid)
	{
		$this->db->where('uid', $replyid);
		$result = $this->db->get('bbs_replys')->row_array();
		if($result)
			return $result['subjectid'];
		return -1;
	}
	function getSubjectNum($caseid)
	{
		$sql = "select count(*) 
				from bbs_subjects
				where caseid=$caseid";
		$result =  $this->db->query($sql)->row_array();
		return $result['count(*)'];
		
	}
	function getSubject($subjectid)
	{
		$sql = "select bbs_subjects.uid as subjectid, title, content, authorid,username as author,submittime
				from bbs_subjects inner join users 
				on bbs_subjects.authorid = users.uid
				where $subjectid = bbs_subjects.uid";
		return $this->db->query($sql)->row_array();;
	}
	function getReplyNum($subjectid)
	{
		$sql = "select count(*) 
				from bbs_replys
				where subjectid=$subjectid";
		$result =  $this->db->query($sql)->row_array();
		return $result['count(*)'];
	}
	
	function getReply($replyid)
	{
		$this->db->where('uid', $replyid);
		return $this->db->get('bbs_replys')->row_array();
	}
	
	function getSubjectListByLimit($caseid, $page, $limit)
	{
		$index = ($page-1)*$limit;
		$sql = "SELECT uid AS subjectid, title, authorid, submittime, clicks, 
						replys, lastauthorid, lastreplytime
				FROM bbs_subjects
				LEFT JOIN (
				SELECT subjectid, authorid AS lastauthorid, max( submittime ) AS lastreplytime
				FROM bbs_replys
				GROUP BY subjectid) AS lastreplys ON bbs_subjects.uid = lastreplys.subjectid
			   	WHERE caseid = $caseid
			   	LIMIT $index, $limit";
		return $this->db->query($sql)->result_array();;
		
	}
	
	
	function getReplyListByLimit($subjectid, $page, $limit)
	{
		$index = ($page-1)*$limit;
		$this->db->query("
		UPDATE bbs_subjects
		SET clicks = clicks + 1
		WHERE uid = $subjectid");
		
		$sql = "select bbs_replys.uid as replyid, content, authorid, username as author,submittime
				from bbs_replys inner join users 
				on bbs_replys.authorid = users.uid
				where $subjectid = bbs_replys.subjectid
				order by submittime
				limit $index, $limit";
		return $this->db->query($sql)->result_array();
	}
	
	//admin
	function deleteSubject($subjectid)
	{
		$this->db->trans_start();
		$this->db->where('subjectid', $subjectid);
		$this->db->delete('bbs_replys');
		$this->db->where('uid', $subjectid);
		$this->db->delete('bbs_subjects');
		$this->db->trans_complete();
	}
	
	function deleteReply($id)
	{
		$this->db->where('uid', $id);
		$record = $this->db->get('bbs_replys')->row_array();
		$subjectid = $record['subjectid'];
		
		$this->db->trans_start();
		$this->db->where('uid', $id);
		$this->db->delete('bbs_replys');
		$this->db->query("UPDATE bbs_subjects
						  SET replys = replys -1
					 	  WHERE uid = $subjectid");
		$this->db->trans_complete();
	}
	
	function addReply($data)
	{ 
		$subjectid = $data['subjectid'];
		$result = $this->db->query("SELECT NOW()")->row_array();
		$data['submittime'] = $result['NOW()'];
		
		$this->db->trans_start();
		$this->db->set($data);
		$this->db->insert('bbs_replys');

		$this->db->query("UPDATE bbs_subjects
						  SET replys = replys + 1
					 	  WHERE uid = $subjectid");
		$this->db->trans_complete();
	}
	
	function updateReply($id, $data)
	{
		$result = $this->db->query("SELECT NOW()")->row_array();
		$data['submittime'] = $result['NOW()'];
		$this->db->set($data);
		$this->db->where('uid', $id);
		$this->db->update('bbs_replys');
	}
	function updateSubject($id, $data)
	{
		$result = $this->db->query("SELECT NOW()")->row_array();
		$data['submittime'] = $result['NOW()'];
		$this->db->set($data);
		$this->db->where('uid', $id);
		$this->db->update('bbs_subjects');
	}

	
	function addSubject($data)
	{
		$result = $this->db->query("SELECT NOW()")->row_array();
		$data['submittime'] = $result['NOW()'];
		$this->db->set($data);
		$this->db->insert('bbs_subjects');
		if($this->db->affected_rows() > 0)
			return $this->db->insert_id();
		else 
			return -1;
	}
}