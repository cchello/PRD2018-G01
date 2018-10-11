<?php
class Doc_model extends Model
{
	function Doc_model()
	{
		parent::Model();
		if(!defined("DOC_STATUS_UNREAD"))define("DOC_STATUS_UNREAD",'0');
		if(!defined("DOC_STATUS_ACCEPTED"))define("DOC_STATUS_ACCEPTED",'3');
		if(!defined("DOC_STATUS_DENIED"))define("DOC_STATUS_DENIED",'6');
	}

/**
 * function :return information of a newsubmitted file
 * @param int $fileId
 * @return array
 */
	function getNewSubInfo($fileId){
		$this->db->where('uid',$fileId);
		return $this->db->get('newsubmits')->row_array();
	}
	
	function getStandardFileInfo($fileId,$caseId){  //add $caseId by wmc 2010/06/24 
		$this->db->where('caseid',$caseId);
		$this->db->where('fileid',$fileId);
		return $this->db->get('outputs')->row_array();
	}

/**
 * submit File
 *
 * submit a file for a task
 * @access	public  
 * @param   array $record(instanceid,taskid,file,uploader)
 * @return	bool
 * //param file为增加的文件所在文件夹以及文件名的全程 added by cendy 2009/10/27
 */	
	function submitFile($record,&$fileId){
		$result_array = $this->db->query("SELECT NOW()")->row_array();
		$record['submittime'] =  $result_array['NOW()'];
		$this->db->set($record);
		$this->db->insert('newsubmits');
		$fileId = $this->db->insert_id();
		return (mysql_error() == '')?TRUE:FALSE;
	}
	
/**
 * deny File
 *
 * Deny a file for a task
 *
 * @access	public  
 * @param	int     uid of newsubmit  	
 * @return	bool
 */	
	function denyFile($fileId){
		//get instanceid、taskid 
		$this->db->where('uid', $fileId);
		$resultArray = $this->db->get('newsubmits')->row_array();
		$taskId = $resultArray['taskid'];
		$insId = $resultArray['instanceid'];
		
		//get denies
		$this->db->where('instanceid', $insId);
		$this->db->where('taskid', $taskId);
		$resultArray = $this->db->get('instance_task')->row_array();
		$denies = $resultArray['denies'] + 1;
		
		/* ---------update start-------- */
		$this->db->trans_start();
		//update newsubmits
		$this->db->set('status', DOC_STATUS_DENIED);
		$this->db->where('uid', $fileId);
		$this->db->update('newsubmits');

		//update instance_task
		$this->db->set('denies', $denies);
		$this->db->where('instanceid', $insId);
		$this->db->where('taskid', $taskId);
		$this->db->update('instance_task');
		
		$this->db->trans_complete();
		/* ---------update finish-------- */
		
		return (mysql_error() == '')?TRUE:FALSE;
	}
	
/**
 * Accept File
 *
 * accept submit file
 *
 * @access	public  
 * @param	int     uid of newsubmit   	
 * @return	bool
 */	
	function acceptFile($fileId){
		//update newsubmits
		$time = $this->db->query("SELECT NOW()")->row_array();
		$this->db->set('status',DOC_STATUS_ACCEPTED);
		$this->db->set('accepttime', $time['NOW()']);
		$this->db->where('uid', $fileId);
		$this->db->update('newsubmits');
/*		
		//get instanceid、taskid and caseid
		$this->db->where('uid', $fileId);
		$resultArray = $this->db->get('newsubmits')->row_array();
		$taskId = $resultArray['taskid'];
		$insId = $resultArray['instanceid'];
		$caseId = $this->getCaseid($insId); 
		//get the number accepted files 
		$this->db->where('instanceid', $insId);
		$this->db->where('taskid', $taskId);
		$this->db->from('newsubmits');
		$numAccept = $this->db->count_all_results();
		//get the number output files
		$this->db->where('caseid', $caseId);
		$this->db->where('taskid', $taskId);
		$this->db->from('outputs');*/
		return (mysql_error() == '')?TRUE:FALSE;
	}

	function getFileStatus($fileId){
		$this->db->where('uid', $fileId);
		$result = $this->db->get('newsubmits')->row_array();
		if($result) return $result['status'];
		else return '-1';
	}
	
	function denySub($fileId,$denyReason,$denySug){
		$data = array(
			'denyReason' => $denyReason,
			'denySuggestions' => $denySug
		);
		$this->db->where('uid',$fileId);
		$this->db->update('newsubmits',$data);
		return (mysql_error() == '')?TRUE:FALSE;		
	}
	
	function getDenyReason($fileId){
		$sql = "SELECT denyReason, denySuggestions AS denySug
					FROM newsubmits WHERE uid=$fileId";
		$query = $this->db->query($sql);
		return $this->db->query($sql)->row_array();
	}
}