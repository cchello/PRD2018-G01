<?php
class News_model extends Model
{
	private $newsMsg = array();
	function News_model()
	{
		parent::Model();
		define("NEWS_PROJECT_START",'1');
		define("NEWS_PROJECT_FINISH",'2');
		
		define("NEWS_TASK_WAITING_BEGIN",'11');
		define("NEWS_TASK_WAITING_CONFIRM",'12');
		define("NEWS_TASK_WAITING_OTHERS_CONFIRM",'13');
		define("NEWS_TASK_START",'14');
		define("NEWS_TASK_WAITING_FINISH",'15');
		define("NEWS_TASK_ALREADY_FINISHED",'16');
		
		define("NEWS_DOC_WAITING_CHECK",'21');
		define("NEWS_DOCS_PASSED",'22');
		define("NEWS_DOCS_DENIED",'23');
		
	}
	
	function logMessage($logParam){
		$params = array();
		$isDoc = false;
		switch($logParam['msgType']){
			case NEWS_PROJECT_START:
				$insert = array('msg' => "项目创建者开始了工程！",
						'recRoles' => '-1');
				array_push($params,$insert);
			break;
			case NEWS_PROJECT_FINISH:
				$insert = array('msg' => "工程结束！",
						'recRoles' => '-1');
				array_push($params,$insert);
			break;
			case NEWS_TASK_WAITING_BEGIN:
				//rec Roles must be roles in task
				$insert = array('msg' => "任务准备就绪，等待项目经理开始任务！",
						'recRoles' => '-1');
				array_push($params,$insert);
				$insert = array('msg' => "任务准备就绪，等待您开始任务！",
						'recRoles' => '1');
				array_push($params,$insert);
			break;
			case NEWS_TASK_WAITING_CONFIRM:
				$insert = array('msg' => "您已经开始任务，等待项目负责人的确认！",
						'recRoles' => '1');
				$insert = array('msg' => "项目经理已经确认开始任务，等待您的确认！",
						'recRoles' => $logParam['taskCharger']);
				array_push($params,$insert);
/*				foreach($logParam['taskChargers'] as $taskCharger){
					$insert = array('msg' => "项目经理已经确认开始任务，等待您的确认！",
						'recRoles' => $taskCharger);
					array_push($params,$insert);
				}*/
			break;
			case NEWS_TASK_WAITING_OTHERS_CONFIRM:
				$insert = array('msg' => "您已经确认开始任务，等待其他负责人的确认！",
						'recRoles' => $logParam['userInfo']['userId']);
				array_push($params,$insert);
			break;
			case NEWS_TASK_START:
				$insert = array('msg' => "任务负责人确认完毕，任务正式开始！",
						'recRoles' => '-1');
				array_push($params,$insert);
			break;
			case NEWS_TASK_WAITING_FINISH:
				$insert = array('msg' => "所有文档准备就绪，等待您结束任务！",
						'recRoles' => '1');
				array_push($params,$insert);
				$insert = array('msg' => "所有文档准备就绪，等待项目经理结束任务！",
						'recRoles' => '-1');
				array_push($params,$insert);
			break;
			case NEWS_TASK_ALREADY_FINISHED:
				$insert = array('msg' => "项目经理已经结束了任务！",
						'recRoles' => '-1');
				array_push($params,$insert);
			break;
			case NEWS_DOC_WAITING_CHECK:
				$isDoc = true;
				$insert = array('msg' => '您已经上传了文档'.$logParam['docInfo']['docName'].',等待项目经理的确认',
						'recRoles' => $logParam['userInfo']['userId']);
				array_push($params,$insert);
				$insert = array('msg' => $logParam['userInfo']['userName'].'已经上传了文档'.$logParam['docInfo']['docName'].',等待您的确认',
						'recRoles' => '1'
				);
				array_push($params,$insert);
			break;
			case NEWS_DOCS_PASSED:
				$isDoc = true;
				$insert = array('msg' => '您已经通过了'.$logParam['userInfo']['userName'].'上传的文档'.$logParam['docInfo']['docName'],
						'recRoles' => '1'
				);
				array_push($params,$insert);
				$insert = array('msg' => '项目经理已经通过了您提交的文档'.$logParam['docInfo']['docName'],
						'recRoles' => $logParam['userInfo']['userId']
				);
				array_push($params,$insert);
			break;
			case NEWS_DOCS_DENIED:
				$isDoc = true;
				$insert = array('msg' => '您拒绝了'.$logParam['userInfo']['userName'].'上传的文档'.$logParam['docInfo']['docName'],
						'recRoles' => '1'
				);
				array_push($params,$insert);
				$insert = array('msg' => '项目经理拒绝了您提交的文档'.$logParam['docInfo']['docName'],
						'recRoles' => $logParam['userInfo']['userId']
				);
				array_push($params,$insert);
			break;
			default:
			break;
		}
		$errorFlag = false;
		if($isDoc){
			foreach($params as $param){
				if(!$this->setNews($logParam['insId'],$logParam['taskId'],$param['recRoles'],$param['msg'],$logParam['docInfo']['docId']))
					$errorFlag = true;			
			}
		}else{
			foreach($params as $param){
				if(!$this->setNews($logParam['insId'],$logParam['taskId'],$param['recRoles'],$param['msg']))
					$errorFlag = true;
			}
		}
		return ($errorFlag == false)?true:false;
	}

	private function setNews($insId,$taskId,$recRoleId,$msg,$docId = '-1'){
		$data = array(
			'insId' => $insId,
			'taskId' => $taskId,
			'time' => time(),
			'recRoleId' => $recRoleId,
			'newsContent' => $msg,
			'docId' => $docId
		);
		$this->db->insert('news_table', $data);
		return (mysql_error() == '')?TRUE:FALSE;
	}
	
	function getProNews($insId){
		$sql = "SELECT * FROM news_table 
				WHERE insId=$insId AND recRoleId='-1' ORDER BY time DESC,taskId DESC
				";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
			return $query->result_array();
		else return '-1';
	}
	
	function getMyNews($insId,$roleId){
		$sql = "SELECT * FROM news_table 
				WHERE insId=$insId AND recRoleId=$roleId ORDER BY time DESC
				";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
			return $query->result_array();
		else return '-1';
	}
	
	function getSidebarNews($insId,$time){
		$sql = "SELECT * FROM news_table 
				WHERE insId=$insId AND time >= $time AND recRoleId= -1 ORDER BY time DESC";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
			return $query->result_array();
		else return '-1';
	}
}