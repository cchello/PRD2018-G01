<?php

//Test by Xupengfey at 2009-10-2 14:40
class Casemodel extends Model
{
	function Casemodel()
	{
		parent::Model();
		$this->load->library('criticalpath');
		if(!defined("INS_STATUS_UNREADY"))define("INS_STATUS_UNREADY",'0');
		if(!defined("INS_STATUS_READY"))define("INS_STATUS_READY",'1');
		if(!defined("INS_STATUS_ONGOING"))define("INS_STATUS_ONGOING",'3');
		if(!defined("INS_STATUS_STARTED"))define("INS_STATUS_STARTED",'3');
		if(!defined("INS_STATUS_FINISHED"))define("INS_STATUS_FINISHED",'6');
	}
	
// ------------------------------------------------------------------------

/**
 * Get All Cases
 * 
 * get records of all cases
 *
 * @access	public
 * @param   int       status of the case,TRUE means opened
 * @return	array
 */	
	
	function getAllCases()
	{
		return $this->db->get('cases')->result_array();
	}
	
// ------------------------------------------------------------------------

/**
 * Get All Cases By Casename
 * get all case sorted by casename
 * @access	public
 * @return array
 */	
	
	function getAllcasebycasename()
	{
		$this->db->order_by("casename", "asc"); 
		$query = $this->db->get('cases');
		return $query->result_array();
	}
	
	
// -------------------------------------------------------------------------

/**
 * Get All Cases By Author
 * get all cases sorted by author
 * @access	public
 * @return array
 */	
	
	function getAllcasebyauthor()
	{
		$this->db->order_by("author", "asc"); 
		$query = $this->db->get('cases');
		return $query->result_array();
	}

// -------------------------------------------------------------------------

/**
 * Function getCaseFolder($caseid)
 * 功能：获取Case所在文件夹的名称
 * 参数：
 * 	$caseid:需要查询的case所属caseid
 * @access	public
 * @return
 * 	if query succeed, return result, else return FALSE
 * 
 * 
 * Added by cendy at 2010-01-09
 */	
	function getCaseFolder($caseid){
		$this->db->where('uid',$caseid);
		$result = $this->db->get('cases')->row_array();
		if($result)
			return $result['foldername'];
		else return FALSE;
	}
	
	
// -------------------------------------------------------------------------

/**
 * Get All Cases By Author
 * get all cases sorted by uploadtime
 * @access	public
 * @return array
 */	
	
	function getAllcasebyuploadtime()
	{
		$this->db->order_by("uploadtime", "asc"); 
		$query = $this->db->get('cases');
		return $query->result_array();
	}
	
	
// -------------------------------------------------------------------------

/**
 * Get All Cases By Author
 * get all cases sorted by casetype
 * @access	public
 * @return array
 */	
	
	function getAllcasebycasetype()
	{
		$this->db->order_by("casetype", "asc"); 
		$query = $this->db->get('cases');
		return $query->result_array();
	}
	
	
// -------------------------------------------------------------------------
/**
 * Get All Cases By Author
 * get all cases sorted by status
 * @access	public
 * @return array
 */	
	
	function getAllcasebystatus()
	{
		$this->db->order_by("status", "asc"); 
		$query = $this->db->get('cases');
		return $query->result_array();
	}
	
	
// -------------------------------------------------------------------------	
	
	
/**
 * Get All Open Cases
 * 
 *
 * @access	public
 * @param   int       
 * @return	array
 */	
	
	function getAllOpenCases()
	{
		$this->db->where('status', FALSE);
		return $this->db->get('cases')->result_array();
	}

// ------------------------------------------------------------------------

/**
 * Get All Inactive Cases
 * 
 * @access	public
 * @param   int       
 * @return	array
 */
	function getAllInactiveCases()
	{
		$this->db->where('status',TRUE);
		return $this->db->get('cases')->result_array();
	}
	
// ------------------------------------------------------------------------	
/**
 * Get Case By Id
 * 
 * get one record of case
 *
 * @access	public
 * @param	int	    uid of case
 * @return	array
 */	

	function getCaseById($caseid)
	{
		$this->db->where('uid', $caseid);
		return $this->db->get('cases')->row_array();
	}
	
// ------------------------------------------------------------------------

/**
 * Get Case
 * 
 * get one record of case
 *
 * @access	public
 * @param	int	    name of case
 * @return	array
 */	

	function getCaseByName($casename)
	{
		$this->db->where('casename', $casename);
		if($this->db->get('cases')->num_rows() > 0)
		{
			return $this->db->get('cases')->row_array();
		}
		else return false;
	}
	
	function getCaseNameById($caseid)
	{
		$this->db->where('uid', $caseid);
		$result = $this->db->get('cases')->row_array();
		if($result)
			return $result['casename'];
	}
	function getCaseidByName($casename)
	{
		$this->db->where('casename', $casename);
		$result = $this->db->get('cases')->row_array();
		if($result)
			return $result['uid'];
	}

// ------------------------------------------------------------------------

/**
 * Get Tasks By Caseid
 * 
 * get all tasks of case
 *
 * @access	public
 * @param	int	    uid of case
 * @return	array
 */	

	function getTasksByCaseid($caseid)
	{
		$this->db->where('caseid', $caseid);
		return $this->db->get('tasks')->result_array();
	}
// ------------------------------------------------------------------------

/**
 * Get Dependencies By Caseid
 *
 * @access	public
 * @param	int	    uid of case
 * @return	array
 */	

//	function getDependenciesByCaseid($caseid)
//	{
//		$this->db->where('caseid', $caseid);
//		return $this->db->get('dependencies')->result_array();
//	}	
	function getSuccessors($caseid,$taskid)
	{
		$this->db->select('successorid');
		$this->db->where('caseid', $caseid);
		$this->db->where('predecessorid',$taskid);
		return $this->db->get('dependencies')->result_array();
	}
// ------------------------------------------------------------------------

/**
 * Get Role Name
 *
 * @access	public
 * @param	int	    uid of case
 * @param   int     roleid
 * @return	string
 */		
	function getRoleName($caseid, $roleid)
	{
		$this->db->where('caseid', $caseid);
		$this->db->where('roleid', $roleid);
		$result = $this->db->get('roles')->row_array();
		
		if(!empty($result))
			return $result['rolename'];
		return -1;
	}
	
	
	function getRoleidByName($caseid, $rolename)
	{
		$this->db->where('caseid', $caseid);
		$this->db->where('rolename', $rolename);
		$result = $this->db->get('roles')->row_array();
		if($result)
			return $result['roleid'];
		 return -1;
	}
// ------------------------------------------------------------------------

/**
 * Get Roleid In Task
 *
 * @access	public
 * @param	int	    uid of case
 * @param   int     taskid
 * @return	string
 */		
	function getRoleidInTask($caseid,$taskid)
	{
		$this->db->select('resourceid');
		$this->db->where('caseid', $caseid);
		$this->db->where('taskid', $taskid);
		return $this->db->get('resources')->result_array();
		
	}
	
	function getTaskName($caseId, $taskId)
	{
		$this->db->where('caseid', $caseId);
		$this->db->where('taskid', $taskId);
		$result =  $this->db->get('tasks')->row_array();
		if($result)
			return $result['taskname'];
		return -1;
	}
// ------------------------------------------------------------------------

/**
 * Check Casename
 *
 * check where have existed casename in the table
 *
 * @access	public
 * @param	string	    name of case
 * @return	rool
 */
	function checkCasename($casename)
	{
		$this->db->where('casename', $casename);
		if($this->db->get('cases')->num_rows() > 0 )
			return TRUE;
		else 
			return FALSE;	
	}
	
// ------------------------------------------------------------------------

/**
 * Add Case
 *
 * Add a case into database from the zip file
 *
 * @access	public
 * @param	string	    path of xml file about a case
 * @return	rool
 */
	function addCase($file, &$msg)
	{
		$this->load->library('pbcls_zip');
		$this->load->library('pbcoparse');	
		$this->load->library('uploadedfile');	
		$this->load->library('criticalpath');
//		$this->pbcls_zip->unzip($file);
		$pbcofile=$this->pbcls_zip->getPbcoPath($file);
		$pbcoFolder = dirname($pbcofile);

		$foldername =  basename($file, ".zip");
		
/*		$this->pbcls_zip->unzip($file);
		$pbcofile = dirname($file) . "/";
		$foldername =  basename($file, ".zip");
		$pbcofile .=  $foldername . "/pbco.xml";
		if(!$this->pbcoparse->xmlTest($pbcofile,$msg)){
			return FALSE;
		}*/


		$case = $this->pbcoparse->parse($pbcofile);
//		print_r($case);
//		exit;
		$this->criticalpath->critical($case);
//		print_r($case);
//		exit;
		if($this->checkCasename($case['casename']))
		{
			$msg = $this->xmlmodel->returnXmlFactory('-1',"上传案例已存在");
			return FALSE;
		}
		//统计所有孩子的资源给父亲
		$this->preAddCase($case);
		//计算父任务的的无前驱和无后继叶子任务
		$this->casemodel->VisitParent($case,0);
		//调整依赖关系
		$this->adjustDependencies($case);

		//The transatction of addcase starts
		$this->db->trans_start();
		
		//Insert into the cases 
		$caseinfo = array(
			'casename' => $case['casename'],
			'description' => $case['description'],
			'version' => $case['version'],
		 	'author' => $case['author'],
			'email' => $case['email'],
			'creationtime' => $case['creationdate'],
			'maxplayer' => count($case['resources']),
			'foldername' => $foldername
		);
		$result_array = $this->db->query("SELECT NOW()")->row_array();
		$caseinfo['uploadtime'] = $result_array['NOW()'];
		unset($result_array);
//		print_r($caseinfo);
		$this->db->set($caseinfo);	
		$this->db->insert('cases');	

		//Insert caseino into the roles table
		$caseId = $this->db->insert_id();
		//add instructor
		$roleinfo = array(
				'roleid' => 0,
				'role' => 'instructor',
				'rolename' => '指导者',
				'description' => '',
				'caseid' => $caseId	
			);
			$this->db->set($roleinfo);
			$this->db->insert('roles');
		foreach($case['resources'] as $key => $value)
		{
			$roleinfo = array(
				'roleid' => $value['roleid'],
				'role' => $value['role'],
				'rolename' => $value['name'],
				'description' => $value['description'],
				'caseid' => $caseId	
			);
			$this->db->set($roleinfo);
			$this->db->insert('roles');
		}
		
		//Insert into the tasks, relations, dependencies, inputs, outputs
		foreach($case['tasks'] as $row)
		{
			if($row['taskid']==0)
				continue;
			
			//Insert into the tasks 
			$taskinfo = array(
				'caseid' => $caseId,
			    'taskid' => $row['taskid'],
				'taskname' => $row['taskname'],
			 	'description' => isset($row['description']) ? $row['description'] : '',
				'wbs' => $row['wbs'],
			 	'isparent' => isset($row['isparent']) ? $row['isparent'] : '',
				'ismilestone' => isset($row['ismilestone']) ? $row['ismilestone'] : '',
				'iscritical' => $row['iscritical'],
				'duration' => isset($row['duration']) ? $row['duration'] : '',
				'earlystart' => $row['earlystart'],
				'earlyfinish' => $row['earlyfinish'],
				'latestart' => $row['latestart'],
				'latefinish' => $row['latefinish'],
			);
			$this->db->set($taskinfo);
			$this->db->insert('tasks');	
			
			//Insert into relations
			if(isset($row['isparent']) && $row['isparent'] == 1)
			{
//				if(empty($row['childrenids'])){
//					print_r($row);
//				}
				foreach($row['childrenids'] as $child)
				{
					$relation = array(
						'caseid' => $caseId,
						'childid' => $child,
						'parentid' => $row['taskid']
					);
					$this->db->set($relation);
					$this->db->insert('relations');
					
				}
			}
			
			//Insert into resources
			if(isset($row['resourceids']) && $row['resourceids'] != '')
			{
				$resids_array = preg_split('/\,/', $row['resourceids']);
				$resource = array(
					'caseid' => $caseId,
					'taskid' => $row['taskid']
				);
				
				foreach ($resids_array as $resource['resourceid'])
				{
					$this->db->set($resource);
					$this->db->insert('resources');
				}
			}
			
			//Insert into dependencies
			if(isset($row['newpre']) && !empty($row['newpre']))
			{
				$dependency = array(
					'caseid' => $caseId,
					'successorid' => $row['taskid']
				);
				foreach($row['newpre'] as $dependency['predecessorid'])
				{
					$this->db->set($dependency);
					$this->db->insert('dependencies');
				}
			}else{
			
			//如果该叶子任务无前驱，则指定其前驱为0
				if($row['isparent']==0){
					$dependency = array(
							'caseid' => $caseId,
							'predecessorid' => 0,
							'successorid' => $row['taskid']
					);
					$this->db->set($dependency);
					$this->db->insert('dependencies');
				}
			}
//				如果为一级任务，且没有前驱，则制定它的前驱为0
//				if(!preg_match("/\./",$row['wbs'])){
//						$dependency = array(
//							'caseid' => $caseId,
//							'predecessorid' => 0,
//							'successorid' => $row['taskid']
//					);
//					$this->db->set($dependency);
//					$this->db->insert('dependencies');
//				}
		
			
			//Insert into inputs
			if(isset($row['inputs']) && !empty($row['inputs']))
			{
				$inputs = preg_split('/\,/', $row['inputs']);
				$input = array(
					'caseid' => $caseId,
					'taskid' => $row['taskid']
				);
				foreach($inputs as $file)
				{
					$input['input']=$file;
					$input['fileid']=array_search($file,$case['files']);
					$this->db->set($input);
					$this->db->insert('inputs');
				}
			}
			
			//Insert into outputs
			if(isset($row['outputs']) && !empty($row['outputs']))
			{
				$outputs = preg_split('/\,/', $row['outputs']);
				$output = array(
					'caseid' => $caseId,
					'taskid' => $row['taskid']
				);
				foreach($outputs as $file)
				{
//					die($file);
					$output['output']=$file;
					$output['fileid']=array_search($file,$case['files']);
					$this->db->set($output);
					$this->db->insert('outputs');
				}
			}
			
		}	

		$this->db->trans_complete();	
		
		
		
		if($this->uploadedfile->createFolder_case($caseId) == FALSE){
			$this->deleteCase($caseId);
			$msg = $this->xmlmodel->returnXmlFactory('-1',"上传失败");
			return FALSE;
		}
		else if(mysql_error() == ''){
			$msg['caseId'] = $caseId;
			$msg['path'] = $pbcoFolder;
			return TRUE;
		}
		else{
			$this->deleteCase($caseId);
			$msg = $this->xmlmodel->returnXmlFactory('-1',"上传失败");
			return FALSE;	
		}
//		echo "11";
	}
	

// ------------------------------------------------------------------------

/**
 * Delete Case
 *
 *
 * @access	public
 * @param	int	    uid of case
 * @return	bool
 */	
	function deleteCase($caseId)
	{
		$this->db->trans_start();
		//Delete from inputs
		$this->db->where('caseid', $caseId);
		$this->db->delete('inputs');
		
		//Delete from outputs
		$this->db->where('caseid', $caseId);
		$this->db->delete('outputs');
		
		//Delete from resouces
		$this->db->where('caseid', $caseId);
		$this->db->delete('resources');
		
		//Delete from dependencies
		$this->db->where('caseid', $caseId);
		$this->db->delete('dependencies');
		
		//Delete from relations
		$this->db->where('caseid', $caseId);
		$this->db->delete('relations');
		
		//Delete from tasks
		$this->db->where('caseid', $caseId);
		$this->db->delete('tasks');
		
		//Delete from roles
		$this->db->where('caseid', $caseId);
		$this->db->delete('roles');
		
		//Delete from cases
		$this->db->where('uid', $caseId);
		$this->db->delete('cases');
		
		$this->db->trans_complete();	
		
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}
	
// ------------------------------------------------------------------------

/**
 * Active Case
 *
 *
 * @access	public
 * @param	int	    uid of case
 * @return	bool
 */	
	function activeCase($caseId)
	{
		$this->db->set('status', 0);
		$this->db->where('uid', $caseId);
		$this->db->update('cases');
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
		
	}
	
// ------------------------------------------------------------------------

/**
 * Deactive Case
 *
 *
 * @access	public
 * @param	int	    uid of case
 * @return	
 */	
	function deactiveCase($caseId)
	{
		$this->db->set('status', 1);
		$this->db->where('uid', $caseId);
		$this->db->update('cases');
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}

// ------------------------------------------------------------------------

/**
 * Update Case
 *
 *
 * @access	public
 * @param	int	    uid of case
 * @return	bool
 */	
	function updateCase($data)
	{
		$caseId = $data['uid'];
		$this->db->set($data);
		$this->db->where('uid', $caseId);
		$this->db->update('cases');
		if(mysql_error() == '')
			return TRUE;
		else 
			return FALSE;
	}
	
	
	
	
// ------------------------------------------------------------------------
/**
 * function getCaseURL()
 * 功能：返回上传的案例所在的文件夹地址
 * @access	public        	
 * @return	string
 */
	function getCaseURL(){
		return $this->case_url;
	}
	
	
	

	
	
// ------------------------------------------------------------------------

/**
 * Get Instances By Caseid
 *
 *
 * @access	public
 * @param	int	    uid of caseid
 * @param   bool         
 * @return	array
 */
	function getInstancesByCaseid($caseId, $isfinished = 0){
		$sql = "SELECT DISTINCT instances.uid, `caseid` , `instancename` ,
		                        `username` AS creator, instances.status, 
		                        `creationtime` , `finishtime` , `progress` 
						FROM instances, users
						WHERE users.uid = instances.creatorid
						AND instances.caseid = $caseId";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
// ------------------------------------------------------------------------

/**
 * Get Instances By Casename
 *
 *
 * @access	public
 * @param	int	    uid of caseid
 * @param   bool         
 * @return	array
 */
	function getInstancesByCasename($casename, $isfinished = 0)
	{
		$this->db->where('casename', $casename);
		$this->db->where('isfinished', $isfinished);
		$query = $this->db->get('instances');
		return $query->result_array();
	}
	

	
// ------------------------------------------------------------------------

/**
 * Check Instancename
 *
 * check where have existed instancename in the table
 *
 * @access	public
 * @param   int         uid of case
 * @param	string	    name of instancese
 * @return	rool
 */
	function checkInstancename($caseId, $instancename)
	{
		$this->db->where('caseid', $caseId);
		$this->db->where('instancename', $instancename);
		if($this->db->get('instances')->num_rows() > 0 )
			return TRUE;
		else 
			return FALSE;	
	}
	
// ------------------------------------------------------------------------

/**
 * Add Instance
 *
 *
 * @access	public
 * @param	array   data of instance	
 * @return	
 * 
 * $instance组成：['instancename','caseid','creatorid']
 * instancename:新建的instance的名称
 * caseid:新建的instance所使用的caseid
 * creatorid:创建者的id
 */	
	function addInstance($instance)
	{
		$result = $this->db->query("SELECT NOW()")->row_array();
		$instance['creationtime'] = $result['NOW()'];
		$this->db->trans_start();
		$this->db->set($instance);
		$this->db->insert('instances');
		
		$instanceid = $this->db->insert_id();
		

		//Initilizing all tasks and roles of the instance
		if (!$this->initializeInstance($instanceid))
			return FALSE;

		//Update the value of startedinstances int the case table
		//startedinstances = startedinstances + 1
		$caseId = $this->getCaseid($instanceid);

		$this->db->query("
		UPDATE	cases
		SET instances = instances + 1
		WHERE uid = $caseId");
		
		$this->db->trans_complete();
		if(mysql_error() == '')
			return $instanceid;
		else 
			return -1;
	}
	
// ------------------------------------------------------------------------

/**
 * Delete Instance
 *
 *
 * @access	public
 * @param	int    uid of instance	
 * @return	bool
 */	
	function deleteInstance($instanceid)
	{
		$this->db->trans_start();
		//delete instance_task
		$this->db->where('instanceid', $instanceid);
		$this->db->delete('instance_task');
		//delete instance_role
		$this->db->where('instanceid', $instanceid);
		$this->db->delete('instance_role');
		//delete user_instance
		$this->db->where('instanceid', $instanceid);
		$this->db->delete('user_instance');
		//delete applications
		$this->db->where('instanceid', $instanceid);
		$this->db->delete('applications');
		//delete comments
		$this->db->where('instanceid', $instanceid);
		$this->db->delete('comments');
		//delete instances
		$this->db->where('uid', $instanceid);
		$this->db->delete('instances');
		
		$this->db->trans_complete();
		
		if(mysql_error() != '')
			return FALSE;
			
			
			return TRUE;

		
	}

// ------------------------------------------------------------------------

	/**
	 * Initialize Instances
	 *
	 *
	 * @access	private  
	 * @param	int     uid of instance   	
	 * @return	bool
	 */	
	private function initializeInstance($insId)
	{
		
		$caseId = $this->getCaseid($insId);
			
		$this->db->where('instanceid', $insId);
		$query = $this->db->get('instance_task');
		if($query->num_rows() == 0)
		{
			//Get taskids from the tasks table
			$this->db->where('caseid', $caseId);
			$result = $this->db->get('tasks')->result_array();
		
			//Insert instance_task
			$taskinfo['instanceid'] = $insId;
			foreach($result as $key => $value)
			{
				$taskinfo['taskid'] = $value['taskid'];
				$this->db->set($taskinfo);
				$this->db->insert('instance_task');
			}
		}
		
		$this->db->where('instanceid', $insId);
		$query = $this->db->get('instance_role');
		if($query->num_rows() == 0)
		{
			//Get roleids from the roles table
			$this->db->where('caseid', $caseId);
			$result = $this->db->get('roles')->result_array();
	
			//Insert instance_role
			$roleinfo['instanceid'] = $insId;
			foreach($result as $key => $value)
			{
				$roleinfo['roleid'] = $value['roleid'];
				$this->db->set($roleinfo);
				$this->db->insert('instance_role');
			}
		}
		
		
		
		//create file system for submit
		
		return 	TRUE;
			
	}
	
	function getCaseid($instanceid)
	{
		$this->db->where('uid', $instanceid);
		$result = $this->db->get('instances')->row_array();
		if(!$result)
			return FALSE;
		return  $result['caseid'];
	}
// ----------------------------------------------------------------------------	
/**
* Comsearch
*
* @access	public  
* @param	int     uid of user   	
* @return	array
*/			
	function comsearch($array) 
	{
		if(empty($array['uploadtime']))
		{
			if($array['uploadtimecomp'] == 'less')
			{
				$array['uploadtime']=date("Y-m-d h:m:s");
			}
			else 
				$array['uploadtime']="0";
		}
			
		if(empty($array['useno']))
		{
			if($array['usenocomp'] == 'less')
				$array['useno']="99999999999";
			else 
				$array['useno']="0";
		}
		
		if($array['usenocomp'] == 'less')
		{
			$array['usenocomp'] = '<';
		}
		
		if($array['uploadtimecomp'] == 'less')
		{
			$array['uploadtimecomp'] = '<';
		}
	
		$sql ="select * from cases
			   where casename like '%{$array['casename']}'
			   and status='{$array['status']}'
			   and uploader like '%{$array['uploader']}'
			   and author like '%{$array['author']}'
			   and casetype='{$array['casetype']}'
			   and uploadtime {$array['uploadtimecomp']} '{$array['uploadtime']}'
			   and instances {$array['usenocomp']} '{$array['useno']}'
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
* PruneCase
*
* @access	public  
* @param	array      	
* @return	array
*/			
	function pruneCase($array) 
	{
		if(empty($array['uploadtime']))
		{
			if($array['uploadtimecomp'] == 'less')
			{
				$array['uploadtime']=date("Y-m-d h:m:s");
			}
			else 
				   $array['uploadtime']="0";
		}
		if(empty($array['useno']))
		{
			if($array['usenocomp'] == 'less')
				   $array['useno']="99999999999";
			   else 
			    $array['useno']="0";
		}
		if($array['usenocomp'] == 'less')
			$array['usenocomp'] = '<';
	
			
		if($array['uploadtimecomp'] == 'less')
		{
			$array['uploadtimecomp'] = '<';
		}
		
		if($array['operation'] == 'deactive')  //处理operation为deactive的操作
		{
			$sql = "update cases set status=1";
		}
		else 
		{
			$sql = "delete cases";
		}
		$sql .= " where casename like '%{$array['casename']}'
			   and uploader like '%{$array['uploader']}'
			   and author like '%{$array['author']}'
			   and status='{$array['status']}'
			   and casetype='{$array['casetype']}'
			   and instances {$array['usenocomp']} '{$array['useno']}'
			   and uploadtime {$array['uploadtimecomp']} '{$array['uploadtime']}'";
//		echo $sql;
//		die();
		$this->db->query($sql);								
	}
	
	//统计所有孩子的资源给父亲
	private function preAddCase(&$case)
	{
		$this->postOrder($case,0);
	}
	//后续遍历，计算父任务需要的资源
	private function postOrder(&$case,$taskid){
		if($case['tasks'][$taskid]['isparent']!=0){
			foreach($case['tasks'][$taskid]['childrenids'] as $child){
				$this->addResouce($case['tasks'][$taskid]['resourceids'],$this->postOrder($case,$child));
			}
		}
		return $case['tasks'][$taskid]['resourceids'];
	}
	
	private function addResouce(&$resouces,$new){
		$pre=explode(',',$resouces);
		foreach(explode(',',$new) as $row){
			if(!in_array($row,$pre)){
				if($resouces)
					$resouces.=",".$row;
				else
					$resouces=$row;
			}
		}
	}
	
	//细化两个任务之间的依赖关系
	private function addNewDependency(&$case,$taskid_1,$taskid_2){
		if($case['tasks'][$taskid_1]['isparent']==0&&$case['tasks'][$taskid_2]['isparent']==0){
			$case['tasks'][$taskid_1]['newsucc'][]=$taskid_2;
			$case['tasks'][$taskid_2]['newpre'][]=$taskid_1;
		}elseif($case['tasks'][$taskid_1]['isparent']==0&&$case['tasks'][$taskid_2]['isparent']==1){
			foreach($case['tasks'][$taskid_2]['nopre'] as $row){
				$case['tasks'][$taskid_1]['newsucc'][]=$row;
				$case['tasks'][$row]['newpre'][]=$taskid_1;
			}
		}elseif($case['tasks'][$taskid_1]['isparent']==1&&$case['tasks'][$taskid_2]['isparent']==0){
			foreach($case['tasks'][$taskid_1]['nopost'] as $row){
				$case['tasks'][$row]['newsucc'][]=$taskid_2;
				$case['tasks'][$taskid_2]['newpre'][]=$row;		
			}
		}else
			foreach($case['tasks'][$taskid_1]['nopost'] as $row1)
				foreach($case['tasks'][$taskid_2]['nopre'] as $row2){
					$case['tasks'][$row1]['newsucc'][]=$row2;
					$case['tasks'][$row2]['newpre'][]=$row1;
				}
	}
	
	
	function adjustDependencies(&$case)
	{
		foreach($case['tasks'] as $task){
			if(isset($task['predecessorids'])&&!empty($task['predecessorids']))
				foreach($task['predecessorids'] as $pre)
					$this->addNewDependency($case,$pre,$task['taskid']);
		}
	}

	
	//计算父任务的的无前驱和无后继叶子任务
	 function VisitParent(&$case,$taskid)
	{
//		echo "call VisitParent( $taskid)\n";
		if($case['tasks'][$taskid]['isparent']==0)
			return;
		$case['tasks'][$taskid]['nopre']=array();
		$case['tasks'][$taskid]['nopost']=array();
		$children=$case['tasks'][$taskid]['childrenids'];
//		print_r($children);
		foreach($children as $child){
//			$case['tasks'][$child]
			$childid=$case['tasks'][$child]['taskid'];
			if($case['tasks'][$child]['isparent']==0){
				if(!isset($case['tasks'][$child]['predecessorids'])||empty($case['tasks'][$child]['predecessorids']))
					$case['tasks'][$taskid]['nopre'][]=$childid;
				if(!isset($case['tasks'][$child]['successorids'])||empty($case['tasks'][$child]['successorids']))
					$case['tasks'][$taskid]['nopost'][]=$childid;
					
			}else{
				$this->VisitParent($case,$childid);
				if(!isset($case['tasks'][$child]['predecessorids'])||empty($case['tasks'][$child]['predecessorids']))
					if(!empty($case['tasks'][$childid]['nopre']))
					foreach($case['tasks'][$childid]['nopre'] as $row)
						$case['tasks'][$taskid]['nopre'][]=$row;
				if(!isset($case['tasks'][$child]['successorids'])||empty($case['tasks'][$child]['successorids']))
					if(!empty($case['tasks'][$childid]['nopost']))
						foreach($case['tasks'][$childid]['nopost'] as $row)
							$case['tasks'][$taskid]['nopost'][]=$row;
			}						
		}
	}
	 
/*-------------reference-------------*/	
/**
 * get references which uploaded by users
 * @param int $caseId
 * @return array(fileId, fileName, uploaderId, uploadTime, path, caseId, description, downloadedTimes)
 */
	function getRefs($caseId){
		$sql = "SELECT * FROM ref_contribute WHERE caseId=$caseId";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	
// 2010/02/27 wmc	
	function getAllInstance(){
		$sql = "select 
		instances.uid,instances.instancename,cases.casename,users.username,
		instances.creationtime,instances.status
		from instances left join users on instances.creatorid=users.uid 
		left join cases on cases.uid=instances.caseid";
		$query = $this->db->query($sql)->result_array();
		if($query){
			return $query;
		}
		else return FALSE;
	}
	
	function getAllInstanceOrderByInstanceName(){
		$sql = "select 
		instances.uid,instances.instancename,cases.casename,users.username,
		instances.creationtime,instances.status
		from instances left join users on instances.creatorid=users.uid 
		left join cases on cases.uid=instances.caseid order by instances.instancename";
		$query = $this->db->query($sql)->result_array();
		if($query){
			return $query;
		}
		else return FALSE;
	}
	
	function getAllInstanceOrderByCaseName(){
		$sql = "select 
		instances.uid,instances.instancename,cases.casename,users.username,
		instances.creationtime,instances.status
		from instances left join users on instances.creatorid=users.uid 
		left join cases on cases.uid=instances.caseid order by users.username";
		$query = $this->db->query($sql)->result_array();
		if($query){
			return $query;
		}
		else return FALSE;
	}
	
	function getAllInstanceOrderByUserName(){
		$sql = "select 
		instances.uid,instances.instancename,cases.casename,users.username,
		instances.creationtime,instances.status
		from instances left join users on instances.creatorid=users.uid 
		left join cases on cases.uid=instances.caseid order by users.username";
		$query = $this->db->query($sql)->result_array();
		if($query){
			return $query;
		}
		else return FALSE;
	}
	
	function getAllInstanceOrderByCreationTime(){
		$sql = "select 
		instances.uid,instances.instancename,cases.casename,users.username,
		instances.creationtime,instances.status
		from instances left join users on instances.creatorid=users.uid 
		left join cases on cases.uid=instances.caseid order by instances.creationtime";
		$query = $this->db->query($sql)->result_array();
		if($query){
			return $query;
		}
		else return FALSE;
	}
	
	function getAllInstanceOrderByStatus(){
		$sql = "select 
		instances.uid,instances.instancename,cases.casename,users.username,
		instances.creationtime,instances.status
		from instances left join users on instances.creatorid=users.uid 
		left join cases on cases.uid=instances.caseid order by instances.status";
		$query = $this->db->query($sql)->result_array();
		if($query){
			return $query;
		}
		else return FALSE;
	}
	
	function getAllInstanceOrderByIsStarted(){
		$sql = "select 
		instances.uid,instances.instancename,cases.casename,users.username,
		instances.creationtime,instances.status
		from instances left join users on instances.creatorid=users.uid 
		left join cases on cases.uid=instances.caseid order by instances.isstarted";
		$query = $this->db->query($sql)->result_array();
		if($query){
			return $query;
		}
		else return FALSE;
	}
	
	function getAllInstanceOrderByIsFinished(){
		$sql = "select 
		instances.uid,instances.instancename,cases.casename,users.username,
		instances.creationtime,instances.status
		from instances left join users on instances.creatorid=users.uid 
		left join cases on cases.uid=instances.caseid order by instances.isfinished";
		$query = $this->db->query($sql)->result_array();
		if($query){
			return $query;
		}
		else return FALSE;
	}
	
	function getTotalCaseNo(){
		$sql = "select count(distinct uid) as caseNo from cases";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query['caseNo'];
		}
		else {
			return FALSE;
		}
	}
	
	function getTotalInstanceNo(){
	$sql = "select count(distinct uid) as instanceNo from instances";
		$query = $this->db->query($sql)->row_array();
		if($query){
			return $query['instanceNo'];
		}
		else {
			return FALSE;
		}
	}
	
	function getPerDataFromCases($per=1,$offset=0){
		$query = $this->db->limit($per,$offset)->get('cases')->result_array();
		if($query){
			return $query;
		}
        else return FALSE;
	}
	
	function getPerDataFromInstances($per=1,$offset=0){
		$query = $this->db->limit($per,$offset)->get('instances')->result_array();
		if($query){
			return $query;
		}
        else return FALSE;
	}
	
	function getInstanceByInstanceName($instancename){
		$sql = "select * from instances
		where
		instancename = '$instancename'
		";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query;
		}
		else return FALSE;
	}
	
	function getInstanceLikeInstanceName($instancename){
		$sql = "select 
		instances.uid,instances.instancename,cases.casename,users.username,
		instances.creationtime,instances.status
		from instances left join users on instances.creatorid=users.uid 
		left join cases on cases.uid=instances.caseid
		where
		instances.instancename like '%$instancename%'
		order by instances.instancename
		";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else return FALSE;
	}
	
    function instanceComSearch($array) 
	{
		if(empty($array['creationtime']))
		{
			if($array['createtimecomp'] == 'less')
			{
				$array['creationtime']=date("Y-m-d h:i:s");
			}
			else 
				$array['creationtime']="0";
		}
		
		if($array['createtimecomp'] == 'less')
		{
			$array['createtimecomp'] = '<';
		}
	
		$sql = "select 
		instances.uid,instances.instancename,cases.casename,users.username,
		instances.creationtime,instances.status
		from instances left join users on instances.creatorid=users.uid 
		left join cases on cases.uid=instances.caseid
		where 
		instances.instancename like '%{$array['instancename']}%' and
		cases.casename like '%{$array['casename']}%' and
		users.username like '%{$array['username']}%' and
		instances.creationtime {$array['createtimecomp']} '{$array['creationtime']}' and
		instances.status = '{$array['status']}'
		order by {$array['sortkey']} {$array['sort']}
		";

        $query = $this->db->query($sql);
        if($query->num_rows() > 0 )
        {
        	return $query->result_array();
        }    
		else return false;
								
	}
	
}