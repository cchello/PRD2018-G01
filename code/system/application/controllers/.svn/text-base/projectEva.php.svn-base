<?php
class ProjectEva extends Controller {
	function ProjectEva() {
		parent::Controller();
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->model('usermodel');
		$this->load->model('evaluationmodel');
		$this->load->model('task_model');
		$this->load->model('xmlmodel');
		$this->load->helper('html');
		define("EVA_ROLE_INSTRUCTOR",'0');
		define("EVA_ROLE_PM",'1');
		define("EVA_TYPE_SELF",'1');
		define("EVA_TYPE_MEMBERLIST",'2');
		define("EVA_TYPE_TEAM",'3');
		define("EVA_TYPE_TASK",'4');
		define("EVA_RESULT_TYPE_TEAM",'0');
		define("EVA_RESULT_TYPE_INSTRUCTOR",'1');
		define("EVA_RESULT_TYPE_PM",'2');
		define("EVA_RESULT_TYPE_TEAMATES",'3');
		define("EVA_RESULT_TYPE_FINAL",'4');
		
	}

	function index(){
		echo "hello";
	}
		
	/**
	 * 功能：ajax请求处理者
	 * 根据subNav的值选择显示“评价首页”“我参与的评价”“我获得的评价”中的一个
	 * @return none
	 */
	function handler(){
		$subNav = $this->input->post('subNav');
		$insId = $this->session->userdata('ins_id');
		switch($subNav){
			case '1':
				$this->_viewEvaMain();
				break;
			case '2':
				$this->_viewMyParticipationEva($insId);
				break;
			case '3':
				$this->_viewMyAcquisitionEva($insId);
				break;
			case '4':
				$this->_viewMyHistoryEva($insId);
				break;
			default:
				echo "sorry,something must be error";
				break;
		}
	}

/**
 * 评价首页控制函数，根据用户的角色显示相应的页面
 * @author wmc
 * @time 2010/06/09
 * @return unknown_type
 */
    private function _viewEvaMain(){
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
        $isPm = $this->instance_model->isPM($insId,$userId);
        $data['isPm'] = $isPm;
        $data['isInstructor'] = $this->instance_model->isInstructor($insId,$userId);
		$this->load->view('project/eva/evaMain_view',$data);
	}
//	private function _viewEvaMain(){
//		$this->load->view('project/eva/evaMain_view');
//	}
	
/**
 * "查看历史评价"控制函数
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @return unknown_type
 */
    private function _viewMyHistoryEva($insId){
    	$userId = $this->session->userdata('user_id');
        $scores=$this->evaluationmodel->getHistoryScore($userId,$insId);
        $i=0;
        $j=0;
        $averageScore=array();
        $taskNames=array();
        $taskId=array();
        	if(is_array($scores)){
        		foreach($scores as $score){        			
        		   $weight=0;
        		   if($score['self_score']){
        			    $weight++;
        		   }
        	       if($score['manager_score']){
        	    	    $weight++;
        		   }
          		   if($score['instructor_score']){
          			    $weight++;
          		   }
        		   $averageScore[$i]=($score['self_score']+$score['manager_score']+$score['instructor_score'])/$weight; 
        		   
        		  $taskId[$i]=$score['taskid'];
        		  $taskName=$this->evaluationmodel->getTaskNameFromIns($insId,$taskId[$i]);       		        		  
        		  if(is_array($taskName)){
        		      foreach($taskName as $task){ 
        		      	if(is_array($task)){
        		      		foreach($task as $ta){
        		       	       $taskNames[$j]=$ta;
        		       	       $j++;
        		      		}
        		      	}
        		      }
        		  }       		   
        		   $i++;      	    
        	    }
        	}
        	else{
        		   $taskId[$i]='100000';
        		   $averageScore[$i]='0';   
        		   $taskNames[$i]="null";  		
        	}
        	$scoreAndTask=array();
        	for($j=0;$j<$i;$j++)
        	{
        	   $scoreAndTak[$j]['score']=$averageScore[$j];
        	   $scoreAndTak[$j]['task']=$taskNames[$j];
        	}

        	        		   
		$data = array(
		     'userId'=>$userId,
		     'insId'=>$insId,
			 'historyScores' =>$averageScore,
		     'taskNames' =>$taskNames,
		);
	
		$this->load->view('project/eva/jqplot/chart',$data);
	
	}
	
/**
 * "我参与的评价"控制函数
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @return unknown_type
 */
	private function _viewMyParticipationEva($insId){
		$userId = $this->session->userdata('user_id');
		$data['evaStatus'] = $this->evaluationmodel->getEvaStatus($insId);
		if($data['evaStatus'] == '-1'){
			echo "错误！无法获取评价状态";
			exit;
		}
		if($data['evaStatus'] != '0'){
			$data['myRole'] = $this->instance_model->getRoleInInstance($this->session->userdata('ins_id'),$this->session->userdata('user_id'));
			if($data['myRole']['roleId'] < 0 ){  // this judge is added by wmc 2010/06/21
				echo "您尚未加入项目，不能参与评价！";
				exit;
			}
			$data['isInstructor'] = $this->instance_model->isInstructor($insId,$userId);
		}
		$this->load->view('project/eva/participate/evaParticiMain',$data);
	}

	
/**
 * ”我获得的评价“控制函数
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @return unknown_type
 */
	private function _viewMyAcquisitionEva($insId){
		$this->_viewEvaResultTeam($insId);	
	}
	
	private function _dataFacRolesInfo($insId){
		$rolesInfo = $this->instance_model->getRolesInfo($insId);
		$count = 0;
		reset($rolesInfo);
		while($value = current($rolesInfo)){
			$actorName = ($value['actorid'] != '-1')?$value:'';
			$roles[$count++] = array(
					'roleId' => $value['roleid'],
					'roleName' => $value['rolename'],
					'actorId' => $value['actorid'],
					'actorName' => ($value['actorid'] != '-1')?$value['username']:'',
					'roleStatus' => ($value['status'] == '1')?"开启中":"已关闭",
			);
			next($rolesInfo);
		}
		return (!empty($roles))?$roles:'-1';
	}

	
/**
 * 正在参与的评价的控制函数
 * @author wmc
 * @time 2010/06/09
 * @return unknown_type
 */	
	function evaGoingHandler(){
		$insId = $this->session->userdata('ins_id');
		$toUserId = $this->input->post('actorId');
		$myUserId = $this->session->userdata('user_id');

		if($this->instance_model->isPM($insId,$myUserId)){
			$this->_viewEvaGoingPM($insId,$myUserId,$toUserId);
		}else{
			if($this->instance_model->isInstructor($insId,$myUserId)){
				$this->_viewEvaGoingInstructor($insId,$myUserId,$toUserId);
			}else{
				$this->_viewEvaGoingStUser($insId,$myUserId,$toUserId);
			}
		}
	}
	

/**
 * Task级评价中PM对组员的评价
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @param $from
 * @param $to
 * @return unknown_type
 */	
	private function _viewEvaGoingPM($insId,$from,$to){
		
		$data['isNotMyself'] = ($from != $to)?true:false;
		
		$data['username'] = $this->usermodel->getUsername($to);
		$userRoleInfo = $this->instance_model->getRoleInInstance($insId, $from);
		$userRoleId = $userRoleInfo['roleId'];
		$toRoleInfo = $this->instance_model->getRoleInInstance($insId, $to);
		$toUserRoleId = $toRoleInfo['roleId'];
//		$taskid = $this->task_model->getJustFinishedTask($insId,$from);
		$taskid = 7;
		$data['result'] = array(
		'userid' => $from,
		'userroleid' => $userRoleId,
		'touserid' => $to,
		'touserroleid' => $toUserRoleId,
		'instanceid' => $insId,
		'taskid' => $taskid
		);
		$data['query'] = $this->evaluationmodel->getMemberDetails($insId,$taskid,$to);		
		$this->load->view("project/eva/evaGoingUserPm_view",$data);
	}
	
	
/**
 * Task级评价中Instructor对组员的评价，在0.1版本中，这个功能暂时取消
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @param $from
 * @param $to
 * @return unknown_type
 */	
	private function _viewEvaGoingInstructor($insId,$from,$to){
		$data['username'] = $this->usermodel->getUsername($to);
		$userRoleInfo = $this->instance_model->getRoleInInstance($insId, $from);
		$userRoleId = $userRoleInfo['roleId'];
		$toRoleInfo = $this->instance_model->getRoleInInstance($insId, $to);
		$toUserRoleId = $toRoleInfo['roleId'];
//		$taskid = $this->task_model->getJustFinishedTask($insId,$from);
		$taskid = 7;
		$data['result'] = array(
		'userid' => $from,
		'userroleid' => $userRoleId,
		'touserid' => $to,
		'touserroleid' => $toUserRoleId,
		'instanceid' => $insId,
		'taskid' => $taskid
		);
		$data['query'] = $this->evaluationmodel->getMemberDetails($insId,$taskid,$to);
		$this->load->view('project/eva/evaGoingUserInstructor_view',$data);
	}
	
	
/**
 * Task级评价中组员对组员的评价，即互评，在0.1版本中，这个功能暂时取消
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @param $from
 * @param $to
 * @return unknown_type
 */	
	private function _viewEvaGoingStUser($insId,$from,$to){
		if($this->instance_model->isPM($insId,$to))
			$data['target'] = '2';
		else $data['target'] = ($from == $to)?'0':'1';
		
		$data['username'] = $this->usermodel->getUsername($to);
		
		$userRoleInfo = $this->instance_model->getRoleInInstance($insId, $from);
		$userRoleId = $userRoleInfo['roleId'];
		$toRoleInfo = $this->instance_model->getRoleInInstance($insId, $to);
		$toUserRoleId = $toRoleInfo['roleId'];
//		$taskid = $this->task_model->getJustFinishedTask($insId,$from);
		$taskid = 7;
		$data['result'] = array(
		'userid' => $from,
		'userroleid' => $userRoleId,
		'touserid' => $to,
		'touserroleid' => $toUserRoleId,
		'instanceid' => $insId,
		'taskid' => $taskid
		);
		
		$data['query'] = $this->evaluationmodel->getMemberDetails($insId,$taskid,$to);
		$this->load->view('project/eva/evaGoingUserSt_view',$data);
	}
	
/**
 * 取得组员在完成某一个任务期间的活动记录
 * @param $insId
 * @param $taskId
 * @param $userId
 * @return unknown_type
 */
	private function _dataFacPmTaskEva($insId,$taskId,$userId){
		$data = array(
			'targetUserName' => $this->usermodel->getUsernameByUserid($userId),
			'targetUserId' => $userId,
			'actualTime' => $this->evaluationmodel->getTaskCompletedTime($insId,$taskId),
			'acceptno' => $this->evaluationmodel->getDenies($insId,$taskId) + 1,
			'query' => $this->evaluationmodel->getMemberDetails($insId,$taskId,$userId)
		);
		return $data;
	}
	
	private function _dataFacProEva(){
		
	}
	
	private function _dataFacInstructorPage(){
		
	}
	
//-----added by cendy	
/**
 * PM对组员的任务评价
 * @author wmc
 * @time 2010/06/09
 * @return unknown_type
 */
	function managerToMemberEvaluationAction(){
		header("content-type:text/xml");
		$taskid = $_POST['taskId'];
		$userid = $_POST['targetEvaUserId'];
		$instanceid = $this->session->userdata('ins_id');		
		$manager_attitude = $_POST['status'];
		$score = $_POST['status']*0.1 + $_POST['technique']*0.1+$_POST['communication']*0.1+$_POST['cooperation']*0.1
		    +$_POST['docpassrate']*0.05+ $_POST['docpasstime']*0.05+$_POST['docstyle']*0.1+$_POST['docinnovation']*0.1+
		    $_POST['doccorrectness']*0.3;
		    
		if(!$this->evaluationmodel->isManagerToMemberEvaluated($instanceid,$taskid,$userid,$manager_attitude)){
			$userdata = array(
			'instanceid' => $instanceid,
	        'taskid' => $taskid,
	        'userid' => $userid,
	        'manager_attitude' => $_POST['status'],
	        'manager_technique' => $_POST['technique'],
	        'manager_communication' => $_POST['communication'],
	        'manager_cooperation' => $_POST['cooperation'],			
		    'manager_docpassrate'=> $_POST['docpassrate'],
			'manager_docpasstime'=> $_POST['docpasstime'],
			'manager_docstyle'=> $_POST['docstyle'],
			'manager_docinnovation'=> $_POST['docinnovation'],
			'manager_doccorrectness'=> $_POST['doccorrectness'],
		    'manager_score' => $score,
	        'manager_mark' => $_POST['mark']	      		
	         );
	         
			if($this->evaluationmodel->managerEvaluateMember($userdata,$taskid,$userid,$instanceid)){
				$evaStatus = $this->evaluationmodel->getEvaStatus($instanceid);
				if($evaStatus > 1){
					if(!$this->evaluationmodel->setPmEvaClose($instanceid)){
						echo $this->xmlmodel->returnXmlFactory('0',"无法关闭评价系统!");
						exit;
					}
				}
				echo $this->xmlmodel->returnXmlFactory('1',"提交评价成功！");
				exit;
			}else{
				echo $this->xmlmodel->returnXmlFactory('0',"无法提交评价！");
				exit;
			}
		}else {
			echo $this->xmlmodel->returnXmlFactory('0',"您已经提交过评价了！");
			exit;
		}	
	}

/**
 * 取得自己的记录
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @param $userId
 * @return unknown_type
 */	
	private function _dataFacEvaForSelf($insId,$userId){
		$insInfo = $this->instance_model->getInstanceByid($insId);
		$instancename = $insInfo['instancename'];
		$taskid = 0;   //taskid=0 means this evaluation is for instance
		$roleid = $this->evaluationmodel->getRoleId($insId,$userId);
//		if($this->evaluationmodel->isFinished($instanceid))
//		{
		$data = array(
	    'roleid' => $roleid,
	    'taskid' => $taskid,
	    'userid' => $userId,
	    'instanceid' => $insId,
		'instancename' => $instancename
	    );
	    return $data;
/*	    if($rolegroup == 1){
	    	$this->load->view('evaluation/eva/evaluation_self_manager',$data);
	    }elseif ($rolegroup == 2){
	     	$this->load->view('evaluation/eva/evaluation_self_member',$data);
	    }elseif($rolegroup == 3){
	     	echo "<script>alert('Your are instructor!');location.href='javascript:history.back()';</script>";
	    }*/
	}

/**
 * 取得项目小组的活动记录
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @return unknown_type
 */	
	private function _dataFacEvaForTeam($insId){
		$taskid = 0; //task=0 means this evaluation is for whole project
		$insInfo = $this->instance_model->getInstanceByid($insId);
		$instancename = $insInfo['instancename'];
		$caseid = $this->casemodel->getCaseid($insId);
		$data = array(
			'instancename' => $instancename,
			'instanceid'   => $insId,
			'taskid'       => $taskid,
			'caseduration' => $this->evaluationmodel->getCaseDuration($caseid),
			'instanceduration' => $this->evaluationmodel->getInstanceDuration($insId),
			'bbsno'      => $this->evaluationmodel->getTeamValidTopicNo($insId),
			'updownno'     => $this->evaluationmodel->getTeamDocUpDownTimes($insId),
			'validdocno'   => $this->evaluationmodel->getTeamValidUpDownDocNo($insId),
			'query'            => $this->evaluationmodel->getTeamDetails($insId,$taskid)
			);
		return $data;
	}

/**
 * 根据评价对象的角色来取得其在数据库中记录的相关活动数据
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @param $userId
 * @param $touserid
 * @return unknown_type
 */	
	private function _dataFacEvaForMember($insId,$userId,$touserid){
		$insInfo = $this->instance_model->getInstanceByid($insId);
		$instancename = $insInfo['instancename'];
		$userid = $this->session->userdata('user_id');
		//target user info
/*		$touserid = $this->uri->segment(3); 
		$role = $this->uri->segment(4);*/
		
		$roleid= $this->evaluationmodel->getRoleID($insId,$touserid); 	
		$myrolegroup = $this->evaluationmodel->getRolegroup($insId,$userid);
		$caseid = $this->casemodel->getCaseid($insId);
//		$finaltaskid = $this->evaluationmodel->getFinalTaskID($caseid);
        // the following is the task information for a member
		$totaltask = $this->evaluationmodel->getTotalTaskNo($insId,$touserid);
		$oncefinishedno = $this->evaluationmodel->getTaskOnceFinishedNo($insId,$touserid);
		$ontimefinishedno = $this->evaluationmodel->getTaskOntimeFinishedNo($insId,$touserid);
		$oncerate = round($oncefinishedno / $totaltask,3) ;
		$timerate = round($ontimefinishedno / $totaltask,3);
		$taskid = 0;   //taskid=0 means this evaluation is for instance
//		if($userid == $touserid){
//			echo "<script>alert('This is yourself,pls evaluate other mumber!');location.href='javascript:history.back()';</script>";
//		}
//		else{
		switch($myrolegroup){
			case '1':
				$data = array(
				    'username' => $this->usermodel->getUsername($touserid),
				    'touserid' => $touserid,
				    'taskid' => $taskid,
				    'totaltask'  => $totaltask ,
				    'oncefinishedno' => $oncefinishedno,
				    'oncerate'  => $oncerate*100,
				    'ontimefinishedno' => $ontimefinishedno,
				    'timerate' => $timerate*100,
				    'roleid' => $roleid,
				    'instanceid' => $insId,
				    'instancename' => $instancename,
				    'query' => $this->evaluationmodel->getMemberDetails($insId,$taskid,$touserid)
				    );
			break;
			case '2':
				$data = array(
				    'username' => $this->usermodel->getUsername($touserid),
				    'touserid' => $touserid,
				    'taskid' => $taskid,
				    'roleid' => $roleid,
				    'instanceid' => $insId,
					'instancename' => $instancename,
				    );
			break;
			case '3':
				$data = array(
				    'username' => $this->usermodel->getUsername($touserid),
				    'touserid' => $touserid,
				    'taskid' => $taskid,
				    'roleid' => $roleid,
				    'instanceid' => $insId,
				    'instancename' => $instancename,
				    'instanceduration' => $this->evaluationmodel->getInstanceDuration($insId),
				    'updownno' => $this->evaluationmodel->getPersonAttendUpDownTimes($insId,$touserid),
				    'downloadno' => $this->evaluationmodel->getPersonDocDownloadTimes($insId,$touserid),
				    'bbsno' => $this->evaluationmodel->getPersonAttendTopicNo($insId,$touserid),
				    'query' => $this->evaluationmodel->getMemberDetails($insId,$taskid,$touserid)
				    );	
			break;
			default:
				$data = array();
			break;
		}
			
//		}
		return $data;
	}

/**
 * 取得同组组员列表
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @return unknown_type
 */	
	private function _dataFacMemList($insId){
		$caseId = $this->casemodel->getCaseid($insId);
		$data = $this->evaluationmodel->getTeamMember($caseId,$insId);
		return $data;
	}
	
/**
 * 控制我参与的评价页面
 * @author wmc
 * @time 2010/06/09
 * @return unknown_type
 */
	function viewEvaType(){
		$evaType = $this->input->post('evaType');
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
		switch($evaType){
			case EVA_TYPE_SELF:			//self evaluation
				$data['isPm'] = $this->instance_model->isPM($insId,$userId);
//				$data['evaData'] = ($data['isPm'] == true)?$this->_dataFacEvaForSelf($insId,$userId,EVA_ROLE_PM):$this->_dataFacEvaForSelf($insId,$userId,EVA_ROLE_COMMON);
				$data['evaData'] = $this->_dataFacEvaForSelf($insId,$userId);
				$this->load->view('project/eva/participate/evaForSelf_view',$data);
			break;
			case EVA_TYPE_MEMBERLIST:		//team member list
				$data['isInstructor'] = $this->instance_model->isInstructor($insId,$userId); //added by wmc 2010/06/11
				$data['result'] = $this->_dataFacMemList($insId);
				$this->load->view('project/eva/participate/evaMemList',$data);
			break;
			case EVA_TYPE_TEAM:			//whole team evaluation, just for instructor
				$data = $this->_dataFacEvaForTeam($insId);
				$this->load->view('project/eva/participate/evaForTeam_view',$data);
			break;
			case EVA_TYPE_TASK:			//task evaluation, just for pm and when taskEva opened
				$taskId = $this->evaluationmodel->getLastEvaTaskId($insId);
				if($taskId != '-1'){
					$taskPlayer = $this->task_model->getTaskPlayer($insId,$taskId);
					if($taskPlayer['actorId'] == '-1'){
						echo "该任务用户已经退出，无须进行评价，请返回...";
						exit;
					}
					$data['evaInfo'] = $this->_dataFacPmTaskEva($insId,$taskId,$taskPlayer['actorId']);
					$caseId = $this->instance_model->getCaseid($insId);
					$taskInfo = $this->task_model->getTaskDetails($caseId,$taskId);
					$data['task'] = array(
						'taskName' => $taskInfo['taskname'],
						'duration' => $taskInfo['duration'],
					);
					$data['taskId'] = $taskId;
					$this->load->view('project/eva/participate/evaPmTask_view',$data);
				}else{
					echo '错误的任务号！请联系系统管理员！';
					exit;
				} 
			break;
			default:
			break;
		}
	}
	
/**
 * 显示要评价的对象
 * @author wmc
 * @time 2010/06/09
 * @return unknown_type
 */	
	function viewEvaUser(){
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
		$targetUserId = $this->input->post('targetUserId');
		$data = $this->_dataFacEvaForMember($insId,$userId,$targetUserId);
		$data['myRole'] = $this->instance_model->getRoleInInstance($insId,$userId);
		$data['targetUserRole'] = $this->instance_model->getRoleInInstance($insId,$targetUserId);
		$this->load->view('project/eva/participate/evaForTeamates_view',$data);
	}

/**
 * 查看评价结果的控制器函数，负责选择相应的评价页面
 * @author wmc
 * @time 2010/06/09
 * @return unknown_type
 */
	function viewEvaResultType(){
		$resultType = $this->input->post('resultType');
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
		switch($resultType){
			case EVA_RESULT_TYPE_TEAM:
				$this->_viewEvaResultTeam($insId);
			break;
			case EVA_RESULT_TYPE_INSTRUCTOR:
				$this->_viewEvaResultFromIns($insId,$userId);
			break;
			case EVA_RESULT_TYPE_PM:
				$this->_viewEvaResultFromPm($insId,$userId);
			break;
			case EVA_RESULT_TYPE_TEAMATES:
				$this->_viewEvaResultFromTeamates($insId,$userId);
			break;
			case EVA_RESULT_TYPE_FINAL:
				$this->_viewEvaResultFinal($insId,$userId);
			break;
			default:
			break;
		}
	}
	
//-----------------------------------------------------------------------------------------------------------
/**
 * 评价Action的控制器，负责选择相关的Action函数
 * @author wmc
 * @time 2010/06/09
 * @return unknown_type
 */
	function evaAction(){
		header("content-type:text/xml");
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
		$myRole = $this->instance_model->getRoleInInstance($insId,$userId);
		switch($myRole['roleId']){
			case EVA_ROLE_INSTRUCTOR:
				$this->_evaActionInstructor($insId);
			break;
			case EVA_ROLE_PM:
				$this->_evaActionManagerToMember($insId);
			break;
			default:
				$this->_evaActionMemberToMember($insId);
			break;
		}
	}
//-----------------------------------------------------------------------------------------------------------
/**
 * 自我评价Action的控制器，负责自我评价
 * @author wmc
 * @time 2010/06/21
 * @return unknown_type
 */
	function selfEvaAction(){
		header("content-type:text/xml");
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
		$myRole = $this->instance_model->getRoleInInstance($insId,$userId);
		
		$taskid = $_POST['taskid'];
		$userid = $_POST['userid'];
		$instanceid = $_POST['instanceid'];
		$self_attitude = $_POST['status'];
		
		if($myRole['roleId'] == EVA_ROLE_PM){
			$score = $_POST['status']*0.14 + $_POST['technique']*0.14+$_POST['communication']*0.14+$_POST['cooperation']*0.14
			+$_POST['organization']*0.14+ $_POST['decision']*0.14+$_POST['achievement']*0.16;		
		}
		else{
			$score = $_POST['status']*0.2 + $_POST['technique']*0.2+$_POST['communication']*0.2+$_POST['cooperation']*0.2
			+$_POST['achievement']*0.2;
		}
		if(!$this->evaluationmodel->isMemberselfEvaluated($taskid,$userid,$instanceid ,$self_attitude))
		{
			$userdata = array(
		    'instanceid' => $_POST['instanceid'],
		    'taskid' => $_POST['taskid'],
		    'userid' => $_POST['userid'],
			'roleid' => $_POST['roleid'],
		    'self_attitude' => $_POST['status'],
		    'self_technique' => $_POST['technique'],
		    'self_communication' => $_POST['communication'],
		    'self_cooperation' => $_POST['cooperation'],
			'self_organization'=> $_POST['organization'],
			'self_decision' => $_POST['decision'],
		    'self_achievement' => $_POST['achievement'],
			'self_score' => $score,
		    'self_mark' => $_POST['evaluation'],
		    'self_expectation' => $_POST['expectation']		      		
		    );
		   if(!$this->evaluationmodel->memberSelfEvaluation($userdata,$taskid,$userid,$instanceid))
		   {
			     echo $this->xmlmodel->returnXmlFactory('0',"数据库操作失败，请稍后再试！");
					exit;
		    }
		   else 
		   {
			   echo $this->xmlmodel->returnXmlFactory('1',"评价成功！");
					exit;
		   }
		}
		else {
			echo $this->xmlmodel->returnXmlFactory('0',"无法重复评价！");
			exit;
		}

	}
	
//-----------------------------------------------------------------------------------------------------------

/**
 * Instructor对组员的评价的Action
 * @author wmc
 * @time 2010/06/09
 * @param $instanceid
 * @param $taskid
 * @return unknown_type
 */

	private function _evaActionInstructor($instanceid,$taskid = '0'){
//		if($this->instance_model->isAllTasksFinished($instanceid)){
			$targetUserId = $_POST['userid'];	
			$instructor_attitude = $_POST['status'];
			$score = $_POST['status']*0.2 + $_POST['updownquantity']*0.2+$_POST['updownquality']*0.2
		    +$_POST['bbsquantity']*0.2+$_POST['bbsquality']*0.2;
			if(!$this->evaluationmodel->isInstructorToMemberEvaluated($instanceid,$taskid,$targetUserId)){
				$userdata = array(
	            'instanceid' => $instanceid,
	            'taskid' => $taskid,
			    'userid' => $targetUserId,
			    'instructor_attitude' => $_POST['status'],
	            'instructor_updownquantity' => $_POST['updownquantity'],
	            'instructor_updownquality' => $_POST['updownquality'],
	            'instructor_bbsquantity' => $_POST['bbsquantity'],
	            'instructor_bbsquality'=> $_POST['bbsquality'],
		        'instructor_score' => $score,
	            'instructor_mark' => $_POST['mark']	      		
	            );
				if(!$this->evaluationmodel->instructorEvaluateMember($userdata,$instanceid,$taskid,$targetUserId)){
					echo $this->xmlmodel->returnXmlFactory('0',"数据库操作失败，请稍后再试！");
					exit;
				}
				else{
					echo $this->xmlmodel->returnXmlFactory('1',"评价成功！");
					exit;
				}					
			}
			else{
				echo $this->xmlmodel->returnXmlFactory('0',"无法重复评价！");
				exit;
			}
/*		}	
		else {
			echo $this->xmlmodel->returnXmlFactory('0',"项目尚未结束，无法进行评价!");
			exit;
		}	*/
	}
	
	
//-----------------------------------------------------------------------------------------------------------
/**
 * Instructor对小组的整体评价的Action
 * @author wmc
 * @time 2010/06/09
 * @return unknown_type
 */	
	function evaActionInstructorToTeam(){
		header("content-type:text/xml");
		$instanceid = $this->session->userdata('ins_id');
//		if($this->instance_model->isAllTasksFinished($instanceid)){
			$taskid = $_POST['taskid'];
		    $score = $_POST['updownquantity']*0.1 + $_POST['updownquality']*0.1+$_POST['bbsquantity']*0.1+$_POST['bbsquality']*0.1
			         +$_POST['docpasstime']*0.1+ $_POST['docinnovation']*0.1+$_POST['doccorrectness']*0.3+$_POST['docstyle']*0.1;	
		    $userdata = array(
		    'instanceid' => $instanceid,
		    'taskid' => $taskid,
		    'updownquantity' =>$_POST['updownquantity'],
		    'updownquality' =>$_POST['updownquality'],
		    'bbsquantity' =>$_POST['bbsquantity'],
		    'bbsquality'=>$_POST['bbsquality'],
		    'docpasstime'=>$_POST['docpasstime'],
		    'docinnovation'=>$_POST['docinnovation'],
		    'doccorrectness'=>$_POST['doccorrectness'],
		    'docstyle'=>$_POST['docstyle'],
		    'score' =>$score,
		    'mark' =>$_POST['mark']
		    );
		    if(!$this->evaluationmodel->isInstructorToTeamEvaluated($instanceid,$taskid)){
		    	if($this->evaluationmodel->instructorEvaluateTeam($userdata,$instanceid,$taskid)){
		    		echo $this->xmlmodel->returnXmlFactory('1',"评价成功！");
					exit;
		    	}
		    	else{
		    		echo $this->xmlmodel->returnXmlFactory('0',"数据库操作失败，请稍后再试！");
					exit;
		    	}
		    }
		    else {
		    	echo $this->xmlmodel->returnXmlFactory('0',"无法重复提交评价！");
				exit;
		    }
/*		}
		else{
			echo $this->xmlmodel->returnXmlFactory('0',"项目尚未结束！");
				exit;
		}*/
	}
	
	
//-----------------------------------------------------------------------------------------------------------

/**
 * 组员对其他人的评价的Action
 * @author wmc
 * @time 2010/06/09
 * @param $instanceid
 * @param $taskid
 * @return unknown_type
 */
	private function _evaActionMemberToMember($instanceid,$taskid = '0'){
//		if($this->instance_model->isAllTasksFinished($instanceid)){
			$touserid = $_POST['touserid'];
			$userid = $this->session->userdata('user_id');
			$attitude = $_POST['status'];
			if($_POST['roleid']==1)
			{
				$score = $_POST['status']*0.1 + $_POST['technique']*0.16+$_POST['communication']*0.16+$_POST['cooperation']*0.16
			    +$_POST['organization']*0.16+ $_POST['decision']*0.16+$_POST['helpme']*0.1;
			}
			else 
			{
				$score = $_POST['status']*0.2 + $_POST['technique']*0.2+$_POST['communication']*0.2+$_POST['cooperation']*0.2
			    +$_POST['helpme']*0.2;
			}			
			if(!$this->evaluationmodel->isMemberToMemberEvaluated($instanceid,
			$taskid,$userid,$touserid,$attitude))
			{
				$userdata = array(
		        'instanceid' => $instanceid,
		        'taskid' => $taskid,
		        'userid' => $this->session->userdata('user_id'),
				'touserid' => $_POST['touserid'],
			    'roleid' => $_POST['roleid'],
		        'attitude' => $_POST['status'],
		        'technique' => $_POST['technique'],
		        'communication' => $_POST['communication'],
		        'cooperation' => $_POST['cooperation'],
			    'organization'=> $_POST['organization'],
			    'decision' => $_POST['decision'],
		        'helpme' => $_POST['helpme'],
				'score' => $score,
		        'mark' => $_POST['mark']		      		
		        );
		         if(!$this->evaluationmodel->memberEvaluateMember($userdata,$taskid,$userid,$instanceid,$touserid))
		         {
						echo $this->xmlmodel->returnXmlFactory('0',"数据库操作失败，请稍后再试！");
						exit;	         
		         }
		         else 
		         {
					echo $this->xmlmodel->returnXmlFactory('1',"评价成功！");
					exit;
		         }
			}
			else 
			{
				echo $this->xmlmodel->returnXmlFactory('0',"无法重复评价！");
				exit;
			}
/*		}else{
			echo $this->xmlmodel->returnXmlFactory('0',"项目尚未结束，无法进行评价!");
			exit;
		}*/
	}
	
//-----------------------------------------------------------------------------------------------------------

/**
 * PM对组员的评价的Action函数
 * @author wmc
 * @time 2010/06/09
 * @param $instanceid
 * @param $taskid
 * @return unknown_type
 */
	private function _evaActionManagerToMember($instanceid,$taskid= '0'){
//		if($this->instance_model->isAllTasksFinished($instanceid)){
			$targetUserId = $_POST['touserid'];		
			$manager_attitude = $_POST['status'];
			$score = $_POST['status']*0.1 + $_POST['technique']*0.1+$_POST['communication']*0.1+$_POST['cooperation']*0.1
			    +$_POST['docpassrate']*0.05+ $_POST['docpasstime']*0.05+$_POST['docstyle']*0.1+$_POST['docinnovation']*0.1+
			    $_POST['doccorrectness']*0.3;		
			if(!$this->evaluationmodel->isManagerToMemberEvaluated($instanceid,
			$taskid,$targetUserId,$manager_attitude))
			{
				$userdata = array(
				'instanceid' => $instanceid,
		        'taskid' => $taskid,
		        'userid' => $_POST['touserid'],
		        'manager_attitude' => $_POST['status'],
		        'manager_technique' => $_POST['technique'],
		        'manager_communication' => $_POST['communication'],
		        'manager_cooperation' => $_POST['cooperation'],			
			    'manager_docpassrate'=> $_POST['docpassrate'],
				'manager_docpasstime'=> $_POST['docpasstime'],
				'manager_docstyle'=> $_POST['docstyle'],
				'manager_docinnovation'=> $_POST['docinnovation'],
				'manager_doccorrectness'=> $_POST['doccorrectness'],
			    'manager_score' => $score,
		        'manager_mark' => $_POST['mark']	      		
		         );
		         if(!$this->evaluationmodel->managerEvaluateMember($userdata,$taskid,$targetUserId,$instanceid))
		         {
					echo $this->xmlmodel->returnXmlFactory('0',"数据库操作失败，请稍后再试！");
					exit;	
		         }
		         else 
		         {
		         	 echo $this->xmlmodel->returnXmlFactory('1',"评价成功！");
						exit;
		         }
			}
			else 
			{
				echo $this->xmlmodel->returnXmlFactory('0',"无法重复评价！");
				exit;
			}
/*		}else{
			echo $this->xmlmodel->returnXmlFactory('0',"项目尚未结束，无法进行评价!");
			exit;
		}*/
	}

//-----------------------------------------------------------------------------------------------------------	
/**
 * Instructor对小组的整体评价
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @return unknown_type
 */	
	private function _viewEvaResultTeam($insId){
		$data['evaStatus'] = $this->evaluationmodel->getEvaStatus($insId);
		$data['teamresult'] = $this->evaluationmodel->getTeamEvaluationFromInstructor($insId,0);
		$data['evaResultType'] = '0';
		$data['myRole'] = $this->instance_model->getRoleInInstance($insId,$this->session->userdata('user_id'));
		$this->load->view('project/eva/result/evaResultMain',$data);	
	}

//-----------------------------------------------------------------------------------------------------------	
/**
 * 来自Instructor对自己的评价
 * @param $insId
 * @param $userId
 * @return unknown_type
 */	
	private function _viewEvaResultFromIns($insId,$userId){
		$taskId = '0'; //represent whole project;
		$data['result']= $this->evaluationmodel->getEvaluationFromInstructor($insId,$taskId,$userId);
		$data['evaResultType'] = '1';
		$this->load->view("project/eva/result/evaResultFromIns_view",$data);
	}

//-----------------------------------------------------------------------------------------------------------	
/**
 * 来自PM对自己的评价
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @param $userId
 * @return unknown_type
 */
	private function _viewEvaResultFromPm($insId,$userId){
		$data['result']= $this->evaluationmodel->getEvaluationFromManager($insId,$userId);
		$data['evaResultType'] = '2';
		$this->load->view("project/eva/result/evaResultFromPm_view",$data);
	}

//-----------------------------------------------------------------------------------------------------------	
/**
 * 来自同组学院对自己的评价
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @param $userId
 * @return unknown_type
 */
	private function _viewEvaResultFromTeamates($insId,$userId){
		$taskid = '0';	//represent whole project;
		$data['isPm'] = $this->instance_model->isPM($insId,$userId);
		$data['allinfo'] = $this->evaluationmodel->getEvaluationFromAllMember($insId,$taskid,$userId);
		$data['evaResultType'] = '3';
		$this->load->view("project/eva/result/evaResultFromTeamates_view",$data);
	}

//-----------------------------------------------------------------------------------------------------------	
/**
 * 最终评价结果的显示
 * @author wmc
 * @time 2010/06/09
 * @param $insId
 * @param $userId
 * @return unknown_type
 */	
	private function _viewEvaResultFinal($insId,$userId){
		$taskid = '0'; 	//represent whole project
		$insInfo = $this->instance_model->getInstanceByid($insId);
		$instancename = $insInfo['instancename'];
		$selfEvaluationResult = $this->evaluationmodel->getSelfEvaluation($insId,$taskid,$userId);
		$memberEvaluationResult = $this->evaluationmodel->getEvaluationResultFromMember($insId,$taskid,$userId);
		$managerEvaluationResult = $this->evaluationmodel->getEvaluationResultFromManager($insId,$userId);
		$instrutorEvaluationResult = $this->evaluationmodel->getEvaluationFromInstructor($insId,$taskid,$userId);
		$teamEvaluationResult = $this->evaluationmodel->getTeamEvaluationFromInstructor($insId,$taskid);
		$finalEvaluationResult = $this->getFinalEvaluationScore($insId,$taskid,$userId);
		$data = array(
			'instancename' => $instancename,
			'selfEvaluationResult' => $selfEvaluationResult['self_score'],
			'memberEvaluation' => $memberEvaluationResult['score'],
			'managerEvaluationResult' => $managerEvaluationResult['manager_score'],
			'instrutorEvaluationResult' => $instrutorEvaluationResult['instructor_score'],
			'teamEvaluationResult' => $teamEvaluationResult['score'],
			'finalEvaluationResult' => $finalEvaluationResult		
		);
		$data['evaResultType'] = '4';
		$this->load->view("project/eva/result/evaResultFinal_view",$data);
	}
	
//-----------------------------------------------------------------------------------------------------------	
/**
 * 取得最终评价的总成绩分数
 * @author wmc
 * @time 2010/06/09
 * @param $instanceid
 * @param $taskid
 * @param $userid
 * @return unknown_type
 */

	private function getFinalEvaluationScore($instanceid,$taskid,$userid){
		$selfEvaluationScore = $this->evaluationmodel->getSelfEvaluationScore($instanceid,$taskid,$userid);
		
		$memberEvaluationScore = $this->evaluationmodel->getMemberEvaluationScore($instanceid,$taskid,$userid);
		
		$managerEvaluationScore = $this->evaluationmodel->getManagerEvaluationScore($instanceid,$userid);
		
		$instructorEvaluationScore = $this->evaluationmodel->getInstructorEvaluationScore($instanceid,$taskid,$userid);
		
		$teamEvaluationScore = $this->evaluationmodel->getTeamEvaluationScore($instanceid,$taskid);
		
		$personEvaluationScore = $selfEvaluationScore['self_score'] * 0.1 + $memberEvaluationScore['score'] *0.2
		+ $managerEvaluationScore['manager_score'] *0.4 + $instructorEvaluationScore['instructor_score'] *0.3;
		$finalEvaluationScore = $personEvaluationScore *0.6 + $teamEvaluationScore['score'] *0.4;
		
		return $finalEvaluationScore;
	}

//-----------------------------------------------------------------------------------------------------------	
	function evaStd(){
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
        $isPm = $this->instance_model->isPM($insId,$userId);
        $data['isPm'] = $isPm;
        $data['isInstructor'] = $this->instance_model->isInstructor($insId,$userId);
		$this->load->view('project/eva/evaMain_evaReference_view',$data);
	}
//-----------------------------------------------------------------------------------------------------------	
	function test(){
		$insId = $this->session->userdata('ins_id');
		$data = $this->_dataFacEvaForTeam($insId);
		print_r($data);
		exit;
		
	}
	
}