<?php
class Time_model extends Model
{
//	private $standardTime = "2010-01-01 00:00:00";
	private $standardTime;
	function Time_model()
	{
		parent::Model();
		$this->standardTime = strtotime("2010-01-01 00:00:00");
	}

	function getCurrentTime(){
		$tmp = $this->db->query("SELECT NOW()")->row_array();
		return $tmp['NOW()'];
	}
	
	function changeTimeFormate($time){
		return strtotime($time) - $this->standardTime; 
	}
	
	function getStandardTime(){
		return $this->standardTime;
	}
	
	function getTimeStamp(){
		return time();
/*		$timeStamp = $this->getCurrentTime();
		return strtotime($timeStamp) - $this->standardTime;*/
	}
}