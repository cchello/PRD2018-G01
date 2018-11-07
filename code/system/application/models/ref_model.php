<?php
class Ref_model extends Model
{
	function Ref_model()
	{
		parent::Model();
	}
	
	function getRefDetails($refId){
		$sql = "SELECT * FROM ref_contribute WHERE fileId=$refId";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	
	function submitRefFile($record,&$fileId){
		$result_array = $this->db->query("SELECT NOW()")->row_array();
		$record['uploadTime'] =  $result_array['NOW()'];
		$this->db->set($record);
		$this->db->insert('ref_contribute');
		$fileId = $this->db->insert_id();
		return (mysql_error() == '')?TRUE:FALSE;
	}
	
	function downloadCount($refId,$userId){
		$result_array = $this->db->query("SELECT NOW()")->row_array();
		$record['downloadTime'] =  $result_array['NOW()'];
		$record['downloadUserId'] = $userId;
		$record['fileId'] = $refId;
		
		$this->db->trans_start();
		$this->db->set($record);
		$this->db->insert('ref_download');

		$this->db->query("LOCK TABLE ref_contribute write");
		$this->db->query("SET @a=
		(SELECT downloadedTimes 
		FROM ref_contribute 
		WHERE fileId = $refId)");
		$this->db->query("SET @a = @a + 1");
		$this->db->query("UPDATE  ref_contribute
		SET downloadedTimes = @a
		WHERE fileId = $refId");
		$this->db->query("UNLOCK TABLES");

		$this->db->trans_complete();
		return (mysql_error() == '')?TRUE:FALSE;
	}

/**
 * judge whether user have downloaded the specifice reference
 * @param int $refId
 * @param int $userId
 * @return true or false
 */	
	function isUserDownloaded($refId,$userId){
		$sql = "SELECT * FROM ref_download WHERE downloadUserId=$userId AND fileId=$refId";
		$query = $this->db->query($sql);
		return ($query->num_rows() > 0)?true:false;
	}
}