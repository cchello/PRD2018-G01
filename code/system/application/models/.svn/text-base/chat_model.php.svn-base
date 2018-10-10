<?php
class Chat_model extends Model
{
//	private $standardTime = "2010-01-01 00:00:00";
	private $standardTime;
	function Chat_model()
	{
		parent::Model();
//		$this->standardTime = strtotime("2010-01-01 00:00:00");
		define("DATABASE_MAX_MSGES",'10');
	}

	
/*	function getTime(){
		$this->db->where('insId','1');
		return $this->db->get('chat_room')->row_array();
	}*/
	
	function getData($insId,$time){
//		usleep(99999);
		$this->db->trans_start();
		$sql = "SELECT * FROM chat_room WHERE time >= $time AND insId = $insId ORDER BY id ASC";
		$query = $this->db->query($sql);
		$this->db->trans_complete();
		if($query->num_rows() > 0)
			return $query->result_array();
		else return '-1';
	}
	
	function setData($insId,$senderId,$msg){
		$data = array(
			'insId' => $insId,
			'time' => time(),
			'senderId' => $senderId,
			'message' => $msg
		);
		$this->db->trans_start();
		$this->db->insert('chat_room',$data);
		$this->db->trans_complete();
		return (mysql_error() == '')?TRUE:FALSE;
	}
	
	function checkMessageNum($insId){	//keep DATABASE_MAX_MSGES messages in the database
		$sql = "CALL checkMessageNum($insId,".DATABASE_MAX_MSGES.")";
		$this->db->query($sql);
		return (mysql_error() == '')?TRUE:FALSE;
	}
}