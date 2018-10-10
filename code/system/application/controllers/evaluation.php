<?php
class Evaluation extends Controller {
	function Evaluation() {
		parent::Controller();
			
		$this->load->helper('html');
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->model('usermodel');
		$this->load->model('xmlmodel');
		$this->load->model('evaluationmodel');
		$this->load->helper('form');
		$this->load->helper('download');
		$this->load->helper('file');
		define("INDICATOR_APPLYING", "1");
		define("INDICATOR_PLAYING",'2');
		define("INDICATOR_NONE",'0');
	}
// -----------------------------------------------------------------------------------	
    function index(){
		$user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		else {	
			$user_id = $this->usermodel->getUserid($user_name);
			$instanceid = $this->session->userdata('ins_id');
			$insInfo = $this->instance_model->getInstanceByid($instanceid);
		    $instancename = $insInfo['instancename'];
			$data['user_id'] = $user_id;
			$data['instancename'] = $instancename;
			$rolegroup = $this->evaluationmodel->getRolegroup($instanceid,$user_id);
			$user_data = array(
									'instancename' => $instancename	,
			                        'instanceid' => $instanceid	,							
					);
			$this->session->set_userdata($user_data);
			if($rolegroup == 3)
			{
				redirect('evaluation/instructorMain');
//				$caseid = $this->casemodel->getCaseid($instanceid);
//		        $data['result']= $this->evaluationmodel->getTeamMember($caseid,$instanceid);
//				$this->load->view('evaluation/eva/evaluation_final_instructorMain',$data);
			}
			else 
			{
				$this->load->view('evaluation/eva/evaluation_main',$data);
			}
		}	
	}
// -----------------------------------------------------------------------------------	
	
/**
 * sefl evaluation page
 * 
 * @return unknown_type
 */	
	function selfEvaluation(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		$instanceid = $this->session->userdata('ins_id');
		$insInfo = $this->instance_model->getInstanceByid($instanceid);
		$instancename = $insInfo['instancename'];
		$caseid = $this->casemodel->getCaseid($instanceid);
//		$taskid = $this->evaluationmodel->getFinalTaskID($caseid);
		$taskid = 0;   //taskid=0 means this evaluation is for instance
		$uid = $this->session->userdata('user_id');
		$roleid = $this->evaluationmodel->getRoleId($instanceid,$uid);
		$rolegroup = $this->evaluationmodel->getRolegroup($instanceid,$uid);
//		if($this->evaluationmodel->isFinished($instanceid))
//		{
			$data['result'] = array(
		    'roleid' => $roleid,
		    'taskid' => $taskid,
		    'userid' => $uid,
		    'instanceid' => $instanceid,
			'instancename' => $instancename
		    );
		    if($rolegroup == 1){
		    	$this->load->view('evaluation/eva/evaluation_self_manager',$data);
		    }
		     elseif ($rolegroup == 2){
		     	$this->load->view('evaluation/eva/evaluation_self_member',$data);
		     }
		     elseif($rolegroup == 3){
		     	echo "<script>alert('Your are instructor!');location.href='javascript:history.back()';</script>";
		     }
//		}
//		else{
//			echo "<script>alert('Your Instance Is Not Finished!');location.href='javascript:history.back()';</script>";
//		}
//		$data['result'] = array(
//		    'roleid' => $roleid,
//		    'taskid' => $taskid,
//		    'userid' => $uid,
//		    'instanceid' => $instanceid
//		);
//        if($rolegroup == 1){
//        	$this->load->view('evaluation/evaluation_self_manager',$data);
//        }
//        elseif ($rolegroup == 2){
//        	$this->load->view('evaluation/evaluation_self_member',$data);
//        }
//        elseif($rolegroup == 3){
//        	$this->load->view('evaluation/evaluation_instructor');
//        }
	}
// -----------------------------------------------------------------------------------	
    function selfEvaluationAction(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		$taskid = $_POST['taskid'];
		$userid = $_POST['userid'];
		$instanceid = $_POST['instanceid'];
		$self_attitude = $_POST['status'];
		if($_POST['roleid']==1)
		{
			$score = $_POST['status']*0.14 + $_POST['technique']*0.14+$_POST['communication']*0.14+$_POST['cooperation']*0.14
			+$_POST['organization']*0.14+ $_POST['decision']*0.14+$_POST['achievement']*0.16;
		}
		else 
		{
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
			     echo "<script>alert('error!');location.href='javascript:history.back()';</script>";
		    }
		   else 
		   {
			    echo "<script>alert('successful!');location.href='javascript:history.back()';</script>";
		   }
		}
		else echo "<script>alert('You have evaluated yourself!');location.href='javascript:history.back()';</script>";
//		$role = $this->instance_model->getroleininstance($userid,$instancename);
		
        
	}
// -----------------------------------------------------------------------------------		
	
	
	
/**
 * 
 * main page for mutual evaluation 
 * 
 * @return unknown_type
 */	
	
	function mutualMain(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		
		$instanceid = $this->session->userdata('ins_id');
		$insInfo = $this->instance_model->getInstanceByid($instanceid);
		$instancename = $insInfo['instancename'];
		$caseid = $this->casemodel->getCaseid($instanceid);
		$userid = $this->session->userdata('user_id');
		$myrolegroup = $this->evaluationmodel->getRolegroup($instanceid,$userid);
//		if($myrolegroup == 1){
//			$data['result']= $this->evaluationmodel->getTeammeMber($caseid,$instanceid);
//			$data['instancename'] = $instancename;
//		    if($data['result']){
//				$this->load->view('evaluation/eva/evaluation_mutual_main',$data);
//			}
//		    else{
//			    echo "<script>alert('No Team Member!');location.href='javascript:history.back()';</script>";
//		    }
//		}
//		else {
//			if(isFinished($instanceid)){
//			    $data['result']= $this->evaluationmodel->getTeammeMber($caseid,$instanceid);
//			    $data['instancename'] = $instancename;
//			    if($data['result']){
//				    $this->load->view('evaluation/eva/evaluation_mutual_main',$data);
//			    }
//		        else{
//			        echo "<script>alert('No Team Member!');location.href='javascript:history.back()';</script>";
//		        }
//			}
//			else {
//				echo "<script>alert('Your Instance Is Not Finished!');location.href='javascript:history.back()';</script>";
//			}
//			
//		}
//	    if($this->evaluationmodel->isFinished($instanceid))
//		{
			$data['result']= $this->evaluationmodel->getTeammeMber($caseid,$instanceid);
			$data['instancename'] = $instancename;
			if($data['result']){
				$this->load->view('evaluation/eva/evaluation_mutual_main',$data);
			}
		    else{
			echo "<script>alert('No Team Member!');location.href='javascript:history.back()';</script>";
		    }
//		}
//		else{
//			echo "<script>alert('Your Instance Is Not Finished!');location.href='javascript:history.back()';</script>";
//		}
//		
		
		
//		$data['result']= $this->evaluationmodel->getTeammeMber($caseid,$instanceid);
//		if($data['result']){
//			$this->load->view('evaluation/evaluation_mutual_main',$data);
//		}
//		else{
//			echo "<script>alert('No Team Member!');location.href='javascript:history.back()';</script>";
//		}
		
		
	}
// -----------------------------------------------------------------------------------		
/**
 * Evaluate Whom
 * 
 * to confirm whom will be evaluated and load the relative view_page
 * @return unknown_type
 */
	function evaluateWhom(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		
		$instanceid =   $this->session->userdata('ins_id');
		$insInfo = $this->instance_model->getInstanceByid($instanceid);
		$instancename = $insInfo['instancename'];
		$userid = $this->session->userdata('user_id');
		$touserid = $this->uri->segment(3); 
		$role = $this->uri->segment(4);
		$roleid= $this->evaluationmodel->getRoleID($instanceid,$touserid); 	
		$myrolegroup = $this->evaluationmodel->getRolegroup($instanceid,$userid);
		$caseid = $this->casemodel->getCaseid($instanceid);
//		$finaltaskid = $this->evaluationmodel->getFinalTaskID($caseid);
        // the following is the task information for a member
		$totaltask = $this->evaluationmodel->getTotalTaskNo($instanceid,$touserid);
		$oncefinishedno = $this->evaluationmodel->getTaskOnceFinishedNo($instanceid,$touserid);
		$ontimefinishedno = $this->evaluationmodel->getTaskOntimeFinishedNo($instanceid,$touserid);
		$oncerate = ceil($oncefinishedno / $totaltask) ;
		$timerate = ceil($ontimefinishedno / $totaltask);
		$taskid = 0;   //taskid=0 means this evaluation is for instance
		if($userid == $touserid){
			echo "<script>alert('This is yourself,pls evaluate other mumber!');location.href='javascript:history.back()';</script>";
		}
		else{
			if($myrolegroup == 1){
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
				    'instanceid' => $instanceid,
				    'instancename' => $instancename,
				    'query' => $this->evaluationmodel->getMemberDetails($instanceid,$taskid,$touserid)
				    );
				$this->load->view('evaluation/eva/evaluation_mutual_managerToMember',$data);
			}
			elseif($myrolegroup == 2){
				if($role == "PM" | $role =="项目经理"){
					$data = array(
				    'username' => $this->usermodel->getUsername($touserid),
				    'touserid' => $touserid,
				    'taskid' => $taskid,
				    'roleid' => $roleid,
				    'instanceid' => $instanceid,
					'instancename' => $instancename,
				    );
				    $this->load->view('evaluation/eva/evaluation_mutual_memberToManager',$data);
				}
				else {
					$data = array(
				    'username' => $this->usermodel->getUsername($touserid),
				    'touserid' => $touserid,
				    'taskid' => $taskid,
				    'roleid' => $roleid,
				    'instanceid' => $instanceid,
					'instancename' => $instancename,
				    );
					$this->load->view('evaluation/eva/evaluation_mutual_memberToMember',$data);
				}
			}
			elseif ($myrolegroup == 3){
				$data = array(
				    'username' => $this->usermodel->getUsername($touserid),
				    'touserid' => $touserid,
				    'taskid' => $taskid,
				    'roleid' => $roleid,
				    'instanceid' => $instanceid,
				    'instancename' => $instancename,
				    'instanceduration' => $this->evaluationmodel->getInstanceDuration($instanceid),
				    'updownno' => $this->evaluationmodel->getPersonAttendUpDownTimes($instanceid,$touserid),
				    'downloadno' => $this->evaluationmodel->getPersonDocDownloadTimes($instanceid,$touserid),
				    'bbsno' => $this->evaluationmodel->getPersonAttendTopicNo($instanceid,$touserid),
				    'query' => $this->evaluationmodel->getMemberDetails($instanceid,$taskid,$touserid)
				    );	
				$this->load->view('evaluation/eva/evaluation_final_instructorToMember',$data);
			}
			
		}
	}
	
	function evaluateWhom_origin(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		$instanceid =   $this->session->userdata('instanceid');
		$userid = $this->session->userdata('user_id');
//		$myroleid = $this->evaluationmodel->getRoleID($instanceid,$userid);    //$myroleid is the id of the man who will evaluate others
		$id = $this->uri->segment(3);         // This ID is the man who will be evaluated
		$role = $this->uri->segment(4);       //This Role is of the man who will be evaluate
		$roleid= $this->evaluationmodel->getRoleID($instanceid,$id);          //$roleid is of the man who will be evaluated	
		$myrolegroup = $this->evaluationmodel->getRolegroup($instanceid,$userid);
		$taskid = 1;
		if($id == $userid)
		{
			echo "<script>alert('This is yourself,pls evaluate other mumber!');location.href='javascript:history.back()';</script>";
		}
		else 
		{
			if($myrolegroup == 1)
			{
				$data = array(
				    'username' => $this->usermodel->getUsername($id),
				    'touserid' => $id,
				    'taskid' => $taskid,
				    'roleid' => $roleid,
				    'instanceid' => $instanceid,
				    'query' => $this->evaluationmodel->getMemberDetails($instanceid,$taskid,$id)
				    );
				$this->load->view('evaluation/evaluation_mutual_managertomember',$data);
			}
			elseif ($myrolegroup ==2) 
			{
			    if($role == "PM")
			    {
			    	$data = array(
				    'username' => $this->usermodel->getUsername($id),
				    'touserid' => $id,
				    'taskid' => $taskid,
				    'roleid' => $roleid,
				    'instanceid' => $instanceid
				    );
				    $this->load->view('evaluation/evaluation_mutual_membertomanager',$data);
			    }	
			    else 
			    {
			    	$data = array(
				    'username' => $this->usermodel->getUsername($id),
				    'touserid' => $id,
				    'taskid' => $taskid,
				    'roleid' => $roleid,
				    'instanceid' => $instanceid
				    );
				    $this->load->view('evaluation/evaluation_mutual_membertomember',$data);
			    }
			}
			elseif ($myrolegroup == 3)
			{
				$data = array(
				    'username' => $this->usermodel->getUsername($id),
				    'touserid' => $id,
				    'taskid' => $taskid,
				    'roleid' => $roleid,
				    'instanceid' => $instanceid,
				    'query' => $this->evaluationmodel->getMemberDetails($instanceid,$taskid,$id)
				    );
//				$data['query'] = $this->evaluationmodel->getMemberDetails($instanceid,$taskid,$id);
				$this->load->view('evaluation/evaluation_instructor_tostudent',$data);
			}
		}	
	}
// -----------------------------------------------------------------------------------	

/**
 * Member To Member Evaluation Action
 * action for normal player to evaluate manager or normal player
 * 
 * @access public
 * @return unknown_type
 */	
	function memberToMemberEvaluationAction(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		
		if($_POST)
		{
			$taskid = $_POST['taskid'];
			$touserid = $_POST['touserid'];
			$instanceid = $_POST['instanceid'];
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
		        'instanceid' => $_POST['instanceid'],
		        'taskid' => $_POST['taskid'],
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
		         	echo "<script>alert('error!');location.href='javascript:history.back()';</script>";
		         }
		         else 
		         {
		         	 echo "<script>alert('successful!');location.href='javascript:history.back()';</script>";
		         }
			}
			else 
			{
				echo "<script>alert('You have evaluated himself!');location.href='javascript:history.back()';</script>";
			}
		}		
	}
	
// -----------------------------------------------------------------------------------	

/**
 * 
 * Manager TO Member Evaluation Action
 * 
 * action for manager to evaluate normal players
 * 
 * @return unknown_type
 */
		
	function managerToMemberEvaluationAction(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		if($_POST)
		{
			$taskid = $_POST['taskid'];
			$userid = $_POST['touserid'];
			$instanceid = $_POST['instanceid'];			
			$manager_attitude = $_POST['status'];
			$score = $_POST['status']*0.1 + $_POST['technique']*0.1+$_POST['communication']*0.1+$_POST['cooperation']*0.1
			    +$_POST['docpassrate']*0.05+ $_POST['docpasstime']*0.05+$_POST['docstyle']*0.1+$_POST['docinnovation']*0.1+
			    $_POST['doccorrectness']*0.3;		
			if(!$this->evaluationmodel->isManagerToMemberEvaluated($instanceid,
			$taskid,$userid,$manager_attitude))
			{
				$userdata = array(
				'instanceid' => $_POST['instanceid'],
		        'taskid' => $_POST['taskid'],
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
		         if(!$this->evaluationmodel->managerEvaluateMember($userdata,$taskid,$userid,$instanceid))
		         {
		         	echo "<script>alert('error!');location.href='javascript:history.back()';</script>";
		         }
		         else 
		         {
		         	 echo "<script>alert('successful!');location.href='javascript:history.back()';</script>";
		         }
			}
			else 
			{
				echo "<script>alert('You have evaluated himself!');location.href='javascript:history.back()';</script>";
			}
		}		
	}
// -----------------------------------------------------------------------------------		
	
	
	function instructorMain(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
//			$learninginstance = $this->usermodel->getPlayingInstances($user_id);
//          $user_data = array(
//                'instancename' => $learninginstance
//		    );
//		    $this->session->set_userdata($user_data);
			
		$instanceid = $this->session->userdata('ins_id');
		$insInfo = $this->instance_model->getInstanceByid($instanceid);
		$instancename = $insInfo['instancename'];
		$caseid = $this->casemodel->getCaseid($instanceid);
		$userid = $this->session->userdata('user_id');
		$data['instancename'] = $instancename ;
//		$instancename = "testinstance";
//		$instanceid = "2";
//		$caseid = 17;		    
//		$instanceid =   $this->session->userdata('instanceid');
        $data['result']= $this->evaluationmodel->getTeammeMber($caseid,$instanceid);
		$this->load->view('evaluation/eva/evaluation_final_instructorMain',$data);		
	}
	
// -------------------------------------------------------------------	
	
/**
 * 
 * 
 * 
 * @return unknown_type
 */
	
	function instructorToMemberAction(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		if($_POST)
		{
			$instanceid = $_POST['instanceid'];	
			if($this->evaluationmodel->isFinished($instanceid)){
				$taskid = $_POST['taskid'];
				$userid = $_POST['userid'];	
				$instructor_attitude = $_POST['status'];
				$score = $_POST['status']*0.2 + $_POST['updownquantity']*0.2+$_POST['updownquality']*0.2
			    +$_POST['bbsquantity']*0.2+$_POST['bbsquality']*0.2;
				if(!$this->evaluationmodel->isInstructorToMemberEvaluated($instanceid,$taskid,$userid)){
					$userdata = array(
		            'instanceid' => $instanceid,
		            'taskid' => $taskid,
				    'userid' => $userid,
				    'instructor_attitude' => $_POST['status'],
		            'instructor_updownquantity' => $_POST['updownquantity'],
		            'instructor_updownquality' => $_POST['updownquality'],
		            'instructor_bbsquantity' => $_POST['bbsquantity'],
		            'instructor_bbsquality'=> $_POST['bbsquality'],
			        'instructor_score' => $score,
		            'instructor_mark' => $_POST['mark']	      		
		            );
					if(!$this->evaluationmodel->instructorEvaluateMember($userdata,$instanceid,$taskid,$userid)){
						echo "<script>alert('error!');location.href='javascript:history.back()';</script>";
					}
					else{
						echo "<script>alert('successful!');location.href='javascript:history.back()';</script>";
					}					
				}
				else{
					echo "<script>alert('You have evaluated himself!');location.href='javascript:history.back()';</script>";
				}
			}	
			else {
				echo "<script>alert('Instance is not finished!');location.href='javascript:history.back()';</script>";
			}	
//			if(!$this->evaluationmodel->isInstructorToMemberEvaluated($instanceid,$taskid,$userid))
//			{
//				$userdata = array(
//		        'instanceid' => $instanceid,
//		        'taskid' => $taskid,
//				'userid' => $userid,
//				'instructor_attitude' => $_POST['status'],
//		        'instructor_updownquantity' => $_POST['updownquantity'],
//		        'instructor_updownquality' => $_POST['updownquality'],
//		        'instructor_bbsquantity' => $_POST['bbsquantity'],
//		        'instructor_bbsquality'=> $_POST['bbsquality'],
//			    'instructor_score' => $score,
//		        'instructor_mark' => $_POST['mark']	      		
//		         );
//		         if(!$this->evaluationmodel->instructorEvaluateMember($userdata,$instanceid,$taskid,$userid))
//		         {
//		         	echo "<script>alert('error!');location.href='javascript:history.back()';</script>";
//		         }
//		         else 
//		         {
//		         	 echo "<script>alert('successful!');location.href='javascript:history.back()';</script>";
//		         }
//			}
//			else 
//			{
//				echo "<script>alert('You have evaluated himself!');location.href='javascript:history.back()';</script>";
//			}
		}		
	}
	
	
// -----------------------------------------------------------------------------------	
	
/**
 * InStructor To Team
 * 
 * Control the view page for instructortoteam evaluation
 * 
 * @return unknown_type
 */
		
	function instructorToTeam(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		$taskid = 0; //task=0 means this evaluation is for whole project
		$instanceid = $this->session->userdata('ins_id');
		$insInfo = $this->instance_model->getInstanceByid($instanceid);
		$instancename = $insInfo['instancename'];
		$caseid = $this->casemodel->getCaseid($instanceid);
		$data = array(
		'instancename' => $instancename,
		'instanceid'   => $instanceid,
		'taskid'       => $taskid,
		'caseduration' => $this->evaluationmodel->getCaseDuration($caseid),
		'instanceduration' => $this->evaluationmodel->getInstanceDuration($instanceid),
		'bbsno'      => $this->evaluationmodel->getTeamValidTopicNo($instanceid),
		'updownno'     => $this->evaluationmodel->getTeamDocUpDownTimes($instanceid),
		'validdocno'   => $this->evaluationmodel->getTeamValidUpDownDocNo($instanceid),
		'query'            => $this->evaluationmodel->getTeamDetails($instanceid,$taskid)
		);
		$this->load->view('evaluation/eva/evaluation_final_InstructorToTeam',$data);
	}
// -----------------------------------------------------------------------------------	
/**
 * 
 * Instructor To Team Action 
 * @return unknown_type
 */	
	
	function instructorToTeamAction(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		$instanceid = $_POST['instanceid'];
		if($this->evaluationmodel->isFinished($instanceid)){
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
		    		echo "<script>alert('successful!');location.href='javascript:history.back()';</script>";
		    	}
		    	else{
		    		echo "<script>alert('error!');location.href='javascript:history.back()';</script>";
		    	}
		    }
		    else {
		    	echo "<script>alert('You have evaluated this team!');location.href='javascript:history.back()';</script>";
		    }
		}
		else{
			echo "<script>alert('Instance is not finished!');location.href='javascript:history.back()';</script>";
		}
	}
	
/**
 * 
 * 
 * Control the view page for evaluation from instructor
 * 
 * @return unknown_type
 */

	
	function from_instructor(){
		$user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		$instanceid = $this->session->userdata('ins_id');
		$insInfo = $this->instance_model->getInstanceByid($instanceid);
		$instancename = $insInfo['instancename'];
		$caseid = $this->casemodel->getCaseid($instanceid);
		$userid = $this->session->userdata('user_id');
		$myrolegroup = $this->evaluationmodel->getRolegroup($instanceid,$userid);
		$data['user_id'] = $userid;
		$data['instancename'] = $instancename;
		$taskid = 0;
		$data['result']= $this->evaluationmodel->getEvaluationFromInstructor($instanceid,$taskid,$userid);
		$data['teamresult'] = $this->evaluationmodel->getTeamEvaluationFromInstructor($instanceid,$taskid);
		if($myrolegroup == 1){
			if($data['result'] == FALSE){
				echo "<script>alert('There is no data!');location.href='javascript:history.back()';</script>";
			}
			$this->load->view('evaluation/eva/evaluation_fromInstructor',$data);
		}
		elseif ($myrolegroup == 2){
		    if($data['result'] == FALSE){
				echo "<script>alert('There is no data!');location.href='javascript:history.back()';</script>";
			}
			$this->load->view('evaluation/eva/evaluation_fromInstructor',$data);
		}
	}
	
	function from_manager(){
		$user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		$userid = $this->usermodel->getUserid($user_name);
		$instanceid = $this->session->userdata('ins_id');
		$insInfo = $this->instance_model->getInstanceByid($instanceid);
		$instancename = $insInfo['instancename'];
		$caseid = $this->casemodel->getCaseid($instanceid);
		$myrolegroup = $this->evaluationmodel->getRolegroup($instanceid,$userid);
		
		
		$data['userid'] = $userid;
		$data['instancename'] = $instancename;
//		$instanceid = "2";
//		$taskid = "1";
//		$taskname ="测试任务";
//		$data['taskname'] = $taskname;
		$data['result']= $this->evaluationmodel->getEvaluationFromManager($instanceid,$userid);
//		print_r($data['result']);
		if($data['result'] == FALSE){
			echo "<script>alert('There is no data!');location.href='javascript:history.back()';</script>";
		}
		else {
			$this->load->view('evaluation/eva/evaluation_fromManager',$data);
		}
		
	}
	
	function from_member(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		$instanceid = $this->session->userdata('ins_id');
		$insInfo = $this->instance_model->getInstanceByid($instanceid);
		$instancename = $insInfo['instancename'];
		$caseid = $this->casemodel->getCaseid($instanceid);
		$userid = $this->session->userdata('user_id');
		$myrolegroup = $this->evaluationmodel->getRolegroup($instanceid,$userid);
		
		$data['user_id'] = $userid;
		$data['instancename'] = $instancename;
//		$instancename = "testinstance";
//		$instanceid = "2";
		$taskid = 0;
		if($myrolegroup == 1)
		{
//			$data['result']= $this->evaluationmodel->getEvaluationFromMember($instanceid,$taskid,$userid);
			$data['allinfo'] = $this->evaluationmodel->getEvaluationFromAllMember($instanceid,$taskid,$userid);
		    if($data['allinfo'] == FALSE){
				echo "<script>alert('There is no data!');location.href='javascript:history.back()';</script>";
			}
			$this->load->view('evaluation/eva/evaluation_fromMember_manager',$data);
		}
		elseif ($myrolegroup == 2){
//			$data['result']= $this->evaluationmodel->getEvaluationFromMember($instanceid,$taskid,$userid);
			$data['allinfo'] = $this->evaluationmodel->getEvaluationFromAllMember($instanceid,$taskid,$userid);
		    if($data['allinfo'] == FALSE){
				echo "<script>alert('There is no data!');location.href='javascript:history.back()';</script>";
			}
			$this->load->view('evaluation/eva/evaluation_fromMember_member',$data);
		}
	}
	
	
	
// -----------------------------------------------------------------------------------		
/**
 * 
 * 
 * Download the document for principle of evaluation
 * 
 * @return unknown_type
 */	
	function downloadevaluationdoc(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		
        $filepath = "system/docs/";
		$filename = $filepath."evaluation.xlsx";
		$data = file_get_contents($filename);
        $name = 'evaluation.xlsx';
        force_download($name, $data); 	
        	
	}
// -----------------------------------------------------------------------------------		
/**
 * History Evaluation
 * Main page to show milestone event
 * 
 * @access pbulic
 * @return unknown_type
 */	
	
	function historyEvaluation(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		$userid = $this->session->userdata('user_id');
		$instanceid = $this->session->userdata('instanceid');
		$caseid = 17;
//		$caseid = $this->instance_model->getCaseid($instanceid);
		$data['result'] = $this->evaluationmodel->getMilestone($caseid);
		if($data['result']){
			$this->load->view('evaluation/evaluation_history_view',$data);
		}
		else{
			echo "<script>alert('You have not finished any task!');location.href='javascript:history.back()';</script>";
		}
	}
// -----------------------------------------------------------------------------------		
/**
 * History Milestone
 * 
 * The page to show evaluation details in a milestone event
 * 
 * @access public
 * @return unknown_type
 */	
	function historyMilestone(){
	    $user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}		
		$taskid = $this->uri->segment(3);
		$taskname = $this->uri->segment(4);
		$userid = $this->session->userdata('user_id');	
		$instanceid = $this->session->userdata('instanceid');
		$rolegroup = $this->evaluationmodel->getRolegroup($instanceid,$userid);
		$selfEvaluation = $this->evaluationmodel->getSelfEvaluation($instanceid,$taskid,$userid);
		$memberEvaluation = $this->evaluationmodel->getEvaluationFromMember($instanceid,$taskid,$userid);
		$managerEvaluation = $this->evaluationmodel->getEvaluationFromManager($instanceid,$taskid,$userid);
		$instructorEvaluation = $this->evaluationmodel->getEvaluationFromInstructor($instanceid,$taskid,$userid);
		$data = array(
		'taskid'              => $taskid,
		'taskname'            => $taskname,
		'selfevaluation'        => $selfEvaluation,
		'memberevaluation'    => $memberEvaluation,
		'managerevaluation'   => $managerEvaluation,
		'instructorevaluation'=> $instructorEvaluation
		);
		if($rolegroup == 1){
			$this->load->view('evaluation/evaluation_history_milestone_manager',$data);
		}
		elseif ($rolegroup == 2){
			$this->load->view('evaluation/evaluation_history_milestone_member',$data);
		}

	}
	
	function finalEvaluation(){
		$userid = $this->session->userdata('user_id');
		$instanceid = $this->session->userdata('instanceid');
		$rolegroup = $this->evaluationmodel->getRolegroup($instanceid,$userid);
		if($rolegroup == 1){
			
		}
		elseif ($rolegroup == 2){
			
		}
		elseif ($rolegroup == 3){
			
		}
	}
	
	function onGoingManagerEvaluteMember(){
		$user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}	
		$userid = $this->session->userdata('user_id');
		$instanceid = $this->session->userdata('ins_id');
		$caseid = $this->casemodel->getCaseid($instanceid);
		$insInfo = $this->instance_model->getInstanceByid($instanceid);
		$instancename = $insInfo['instancename'];
		$taskid = $this->session->userdata('currenttaskid');
//		$caseid = $this->casemodel->getCaseid($instanceid);
		$roleid = $this->evaluationmodel->getPlayerRoleId($caseid,$taskid);
		$touserid = $this->instance_model->getRolePlayerid($instanceid, $roleid);		
		$taskname = $this->evaluationmodel->getTaskName($caseid,$taskid);
		$duration = $this->evaluationmodel->getTaskDuration($caseid,$taskid);
		$completedtime = $this->evaluationmodel->getTaskCompletedTime($instanceid,$taskid);
//		$touserid = $this->evaluationmodel->getUserId($instanceid,$taskid);		
		$data = array(
				    'username'     => $this->usermodel->getUsername($touserid),
				    'touserid'     => $touserid,
				    'taskid'       => $taskid,
		            'taskname'     =>$taskname,
				    'roleid'       => $roleid,
				    'instanceid'   => $instanceid,
				    'instancename' => $instancename,
		            'duration'     => $duration,
		            'completedtime'=> $completedtime,
		            'acceptno'     => $this->evaluationmodel->getDenies($instanceid,$taskid)+1,
				    'query'        => $this->evaluationmodel->getMemberDetails($instanceid,$taskid,$touserid)
				    );
		$this->load->view('evaluation/eva/evaluation_ongoing_managerToMember',$data);
	}
	

	function evaluationResult(){
		$user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}	
		$userid = $this->session->userdata('user_id');
		$instanceid = $this->session->userdata('ins_id');
		$caseid = $this->casemodel->getCaseid($instanceid);
		$insInfo = $this->instance_model->getInstanceByid($instanceid);
		$instancename = $insInfo['instancename'];
		$taskid = 0 ;
		
		$selfEvaluationResult = $this->evaluationmodel->getSelfEvaluation($instanceid,$taskid,$userid);
		$memberEvaluationResult = $this->evaluationmodel->getEvaluationResultFromMember($instanceid,$taskid,$userid);
		$managerEvaluationResult = $this->evaluationmodel->getEvaluationResultFromManager($instanceid,$userid);
		$instrutorEvaluationResult = $this->evaluationmodel->getEvaluationFromInstructor($instanceid,$taskid,$userid);
		$teamEvaluationResult = $this->evaluationmodel->getTeamEvaluationFromInstructor($instanceid,$taskid);
		$finalEvaluationResult = $this->getFinalEvaluationScore($instanceid,$taskid,$userid);
		$data = array(
		'instancename' => $instancename,
		'selfEvaluationResult' => $selfEvaluationResult['self_score'],
		'memberEvaluation' => $memberEvaluationResult['score'],
		'managerEvaluationResult' => $managerEvaluationResult['manager_score'],
		'instrutorEvaluationResult' => $instrutorEvaluationResult['instructor_score'],
		'teamEvaluationResult' => $teamEvaluationResult['score'],
		'finalEvaluationResult' => $finalEvaluationResult		
		);
		
		$this->load->view('evaluation/eva/evaluation_final_result',$data);
		
	}
	 
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

 


	
	
	
	
	
}


































?>