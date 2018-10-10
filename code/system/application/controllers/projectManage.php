<?php
class ProjectManage extends Controller {
	function ProjectManage() {
		parent::Controller();
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->model('usermodel');
		$this->load->model('task_model');
		$this->load->model('role_model');
		$this->load->model('doc_model');
		$this->load->model('xmlmodel');
		$this->load->helper('html');
	}
	
	function index(){
		echo 'hello';
	}
	
	function handler(){
		$subNav = $this->input->post('subNav');
		switch($subNav){
			case '1':
				if($this->instance_model->isInsCreator($this->session->userdata('ins_id'),$this->session->userdata('user_id')))
					$this->_viewMemberManagePage();
				else $this->_viewApplyPage();
			break;
			case '2';
				$this->_viewProjectManagePage();
			break;
			default:
				echo "sorry,something must be error";
			break;
		}
	}
	
	//for freshman apply
	private function _viewApplyPage(){
		$insId = $this->session->userdata('ins_id');
		$data['myRole'] = $this->_dataFacApplyPage($insId,$this->session->userdata('user_id'));
		$data['roles'] = $this->_dataFacRolesInfo($insId);
		$this->load->view("project/manage/projectApply_view",$data);
	}
	
	//for creator manages team member
	private function _viewMemberManagePage(){
		$data['myRole'] = $this->_dataFacMyRoleInfo($this->session->userdata('ins_id'),$this->session->userdata('user_id'));
		$data['roles'] = $this->_dataFacRolesInfo($this->session->userdata('ins_id'));
		$this->load->view("project/manage/projectMemMana_view",$data);
	}
	
	//for creator manages the whole project
	private function _viewProjectManagePage(){
		$this->load->model('evaluationmodel');
		$insId = $this->session->userdata('ins_id');
		$data['insStatusId'] = $this->instance_model->getInsStatus($insId);
		$data['insStatus'] = $this->_dataFacInsStatus($insId);
		$data['evaType'] = $this->evaluationmodel->getEvaType($insId);
		$this->load->view("project/manage/projectManage_view",$data);
	}
	
	private function _dataFacApplyPage($insId,$userId){
		$isApplying = $this->usermodel->getUserApplyingRoleId($insId,$userId);
		if($isApplying != '-1'){
			$myRoleArray = array(
				'status' => '1',
				'name' => '正在申请',
				'roleName' => $isApplying['roleName'],
				'roleId' => $isApplying['roleId']
			);
		}else{
			$isPlaying = $this->usermodel->getUserPlayingRole($insId,$userId);
			if($isPlaying != '-1'){
				$myRoleArray = array(
				'status' => '2',
				'name' => '正在担任',
				'roleName' => $isPlaying['roleName'],
				'roleId' => $isPlaying['roleId']
				);
			}else{
				$myRoleArray = array(
				'status' => '-1',
				'name' => "未参与项目",
				"roleName" => '',
				'roleId' => '-1'
				);
			}
		}
/*		$beDenied = $this->usermodel->getUserDeniedRole($insId,$userId);
		$myRoleArray['deniedId'] = ($beDenied != '-1')?$beDenied['roleId']:'-1';
		$myRoleArray['deniedName'] = ($beDenied != '-1')?$beDenied['roleName']:'-1';*/
		return $myRoleArray;
	}
	
	private function _dataFacInsStatus($insId){
		$status =  $this->instance_model->getInsStatus($insId);
		switch($status){
			case INS_STATUS_UNREADY:
				return "项目尚未开始！";
			break;
			case INS_STATUS_READY:
				return "项目准备就绪！";
			break;
			case INS_STATUS_ONGOING:
			case INS_STATUS_STARTED:
				return "项目已开始！";
			break;
			case INS_STATUS_FINISHED:
				return "项目已结束！";
			break;
			default:
				return '';
			break;
		}
	}
	
	private function _dataFacMyRoleInfo($insId,$userId){
		$roleInfo = $this->usermodel->getUserPlayingRole($insId,$userId);
		return ($roleInfo != '-1')?$roleInfo:'-1';
	}
	
	private function _dataFacRolesInfo($insId){
		$rolesInfo = $this->instance_model->getRolesInfo($insId);
		$count = 0;
		reset($rolesInfo);
		while($value = current($rolesInfo)){
			$actorName = ($value['actorid'] != '-1')?$value:'';
			$applyingList = $this->role_model->getSpecRoleApplyers($insId,$value['roleid']);
			$roles[$count++] = array(
					'roleId' => $value['roleid'],
					'roleName' => $value['rolename'],
					'roleDescription' => $value['description'],
					'roleResponsbility' => $value['responsbility'],
					'actorId' => $value['actorid'],
					'actorName' => ($value['actorid'] != '-1')?$value['username']:'',
					'roleStatus' => ($value['status'] == '1')?"开启中":"已关闭",
					'applyingList' => $applyingList
			);
			next($rolesInfo);
		}
		return (!empty($roles))?$roles:'-1';

	}

	private function _ajaxRet($flag,$message){
		header("Content-type:text/xml");
		echo $this->xmlmodel->returnxmlFactory($flag,$message);
		exit;
	}
	
	private function _opAcceptPlayer($insId,$roleId,$userId){
		if($this->_checkAcRoleStatus($insId,$roleId,$msg) == '-1')$this->_ajaxRet('-1',$msg);
		$this->_doAcPlayer($insId,$roleId,$userId);
	}
	
	private function _doAcPlayer($insId,$roleId,$userId){
		if($this->role_model->acceptRole($insId,$roleId,$userId))$this->_ajaxRet('1',"操作成功！");
		else $this->_ajaxRet('-1',"操作失败！请稍后再试...");
	}
	
	private function _opBanRolePlayer($insId,$roleId){
		$rolePlayer = $this->role_model->getRolePlayerid($insId,$roleId);
		if($rolePlayer == '-1')$this->_ajaxRet('-1',"该角色上没有用户!");
		if($this->role_model->banRolePlayer($insId,$roleId))$this->_ajaxRet('1',"操作成功");
		else $this->_ajaxRet('0',"操作失败！请稍后再试...");
	}
	
	private function _opRefusePlayerApply($insId,$roleId,$userId){
		$applyers = $this->role_model->getSpecRoleApplyers($insId,$roleId);
		foreach($applyers as $applyer){
			if($applyer['userId'] == $userId){
				if($this->role_model->refusePlayerApply($insId,$roleId,$userId))
					$this->_ajaxRet('1',"操作成功");
				else $this->_ajaxRet('0',"操作失败！请稍后再试...");
			}
		}
		$this->_ajaxRet('-1',"该用户未申请该角色");
	}
	
	private function _opOpenRole($insId,$roleId){
		if($this->role_model->openRole($insId,$roleId))
			$this->_ajaxRet('1',"操作成功");
		else $this->_ajaxRet('0',"操作失败！请稍后再试...");
	}
	
	private function _opCloseRole($insId,$roleId){
		if($this->role_model->closeRole($insId,$roleId))
			$this->_ajaxRet('1',"操作成功");
		else $this->_ajaxRet('0',"操作失败！请稍后再试...");
	}
	
	private function _opApplyRole($insId,$roleId,$userId){
		if($this->_checkAcRoleStatus($insId,$roleId,$msg) == '-1')$this->_ajaxRet('-1',$msg);
		if('-1' != $this->usermodel->getUserApplyingRoleId($insId,$userId)) $this->_ajaxRet('0',"您已经申请了其他角色");
		$playing = $this->usermodel->getPlayingInstances($userId);
		if(!empty($playing))$this->_ajaxRet('0',"您已经在本项目或者其他项目中扮演了某些角色");
		if($this->role_model->applyRole($insId,$roleId,$userId)) $this->_ajaxRet('1',"操作成功！");
		else $this->_ajaxRet('0',"操作失败！请稍后再试...");
	}
	
// cancel apply	
	private function _opCancelRoleApply($insId,$roleId,$userId){
		$applyers = $this->role_model->getSpecRoleApplyers($insId,$roleId);
		foreach($applyers as $applyer){
			if($applyer['userId'] == $userId){
				if($this->role_model->cancelRoleApply($insId,$roleId,$userId))
					$this->_ajaxRet('1',"操作成功");
				else $this->_ajaxRet('0',"操作失败！请稍后再试...");
			}
		}
		$this->_ajaxRet('0',"您并未申请该角色！");
	}

//quit play	
	private function _opQuitRolePlay($insId,$roleId,$userId){
		$rolePlayer = $this->role_model->getRolePlayerid($insId,$roleId);
		if($rolePlayer == '-1')$this->_ajaxRet('-1',"该角色上没有用户!");
		else if($rolePlayer != $userId) $this->_ajaxRet('-1',"您并未扮演该角色");
		if($this->role_model->quitRole($insId,$roleId,$userId))$this->_ajaxRet('1',"操作成功");
		else $this->_ajaxRet('0',"操作失败！请稍后再试...");
	}
	
	private function _checkAcRoleStatus($insId,$roleId,&$msg){
		$rolePlayer = $this->role_model->getRolePlayerid($insId,$roleId);
		if($rolePlayer != '-1'){$msg = "该角色已经有用户担任!";return '-1';}
		if(!$this->role_model->isRoleOpened($insId,$roleId)){$msg = "该角色处于关闭状态，请先开启!";return '-1';}
	}

// start Instance	
	function startInstance(){
		$this->load->model('news_model');
		$evaType = $this->input->post('evaType');
		if(empty($evaType))$evaType = EVA_TYPE_EACHTASK; //改变evaluationType wmc0603
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
		if(!$this->instance_model->isInsCreator($insId,$userId))$this->_ajaxRet('0',"您不是项目创建者，无法完成操作！");
		if(INS_STATUS_UNREADY != $this->instance_model->getInsStatus($insId))$this->_ajaxRet('0',"项目已经开始或结束！");
		$startStatus = $this->instance_model->startInstance($insId,$evaType);
		if($startStatus == '-1')$this->_ajaxRet('0',"项目开始失败！请稍后再试...");
		else{ 
			$params = array(
				'insId' => $insId,
				'taskId' => '-1',
				'msgType' => NEWS_PROJECT_START,
			);
			$this->news_model->logMessage($params);
			
			foreach($startStatus as $startTask){
				if(!$this->task_model->opReadyTask($insId,$startTask['successorid'])){
					$this->_ajaxRet('0',"初始任务准备失败！请联系管理员进行修正...");
				}else{	//log news
					$params = array(
						'insId' => $insId,
						'taskId' => $startTask['successorid'],
						'msgType' => NEWS_TASK_WAITING_BEGIN,
					);
					$this->news_model->logMessage($params);
				}
			}
			$this->_ajaxRet('1',"项目开始成功！");
		}
	}
	
	function completeInstance(){
		$this->load->model('evaluationmodel');
		$this->load->model('news_model');
		header("content-type:text/xml");
		$insId = $this->session->userdata('ins_id');
		$ins_status = $this->instance_model->getInsStatus($insId);
		
		if($ins_status < 3 ){   //added by wmc 2010/06/22 防止在项目还为开始时就点击结束项目
			echo $this->xmlmodel->returnXmlFactory('0',"项目还未开始！");
			exit;
		}
		if($ins_status == 6 ){   //added by wmc 2010/06/21
				echo $this->xmlmodel->returnXmlFactory('1',"项目已经结束！");
				exit;
		 	}
		
		if($this->instance_model->isAllTasksFinished($insId)
		 && $this->evaluationmodel->isInstanceEvaluationFinished($insId)){		 	
			 
		 	if($this->instance_model->finishInstance($insId)){
					//log news
					$params = array(
						'insId' => $insId,
						'taskId' => '-1',
						'msgType' => NEWS_PROJECT_FINISH,
					);
					$this->evaluationmodel->addScoreBasedProject($insId); //added by wmc 2010/06/19
					$this->news_model->logMessage($params);
					echo $this->xmlmodel->returnXmlFactory('1',"项目结束成功！");
			}else{
					echo $this->xmlmodel->returnXmlFactory('0',"无法结束项目！");
			}
		}else {
			echo $this->xmlmodel->returnXmlFactory('0',"评价或任务尚未完成，无法结束项目！");
			exit;
		}
	}
	
/**
 * return players and applyers of a role
 * @return array();
 */	
	function getRoleUsers(){
		header("Content-type:text/xml");
		$insId = $this->session->userdata('ins_id');
		$roleId = $this->input->post('roleId');
		$applyers = $this->role_model->getSpecRoleApplyers($insId,$roleId);
		$playerId = $this->role_model->getRolePlayerid($insId,$roleId);
		$isRoleOpened = $this->role_model->isRoleOpened($insId,$roleId);
		$playerFlag = ($playerId == '-1')?0:1;
		$applyerFlag = (empty($applyers))?0:2;
		$flag = $playerFlag | $applyerFlag;
		if($flag == '0'){
			$output =  $this->xmlmodel->xmlFactoryElement('0',"没有数据");
			$output .= "<roleStatus>$isRoleOpened</roleStatus>";
			$output = $this->xmlmodel->xmlFactoryEndElement($output); 
			echo $output;
			exit;
		}else $output = $this->xmlmodel->xmlFactoryElement($flag,"返回成功");
		$output .= "<roleStatus>$isRoleOpened</roleStatus>";
		if($playerId != '-1'){
			$player = array(
				'playerId' => $playerId,
				'playerName' => $this->usermodel->getUsernameByUserid($playerId)
			);
			$output .=$this->xmlmodel->xmlFactoryMaker($player,'player');
		}
		//role Status
		if(!empty($applyers)){
			$output .= $this->xmlmodel->xmlFactoryFront('applyers');
			foreach($applyers as $applyer){
				$output .= $this->xmlmodel->xmlFactoryMaker($applyer,'applyer');
			}
			
			$output .= $this->xmlmodel->xmlFactoryEnd('applyers');
			
		}
		$output = $this->xmlmodel->xmlFactoryEndElement($output);
		echo $output;
	}
	
	function roleOperations(){
		$insId = $this->session->userdata('ins_id');
		$roleId = $this->input->post('roleId');
		$userId = $this->input->post('userId');
		if($userId == '0')$userId = $this->session->userdata('user_id');
		$opType = $this->input->post('opType');
		switch($opType){
			case OP_AC:
				$this->_opAcceptPlayer($insId,$roleId,$userId);
			break;
			case OP_BAN:
				$this->_opBanRolePlayer($insId,$roleId);
			break;
			case OP_REFUSE:
				$this->_opRefusePlayerApply($insId,$roleId,$userId);
			break;
			case OP_OPEN:
				$this->_opOpenRole($insId,$roleId);
			break;
			case OP_CLOSE:
				$this->_opCloseRole($insId,$roleId);
			break;
			case OP_APPLY:
				$this->_opApplyRole($insId,$roleId,$userId);
			break;
			case OP_CANCEL:
				$this->_opCancelRoleApply($insId,$roleId,$userId);
			break;
			case OP_QUIT:
				$this->_opQuitRolePlay($insId,$roleId,$userId);
			break;
			default:
			break;
		}
		
	}
	
	function changeMyRole(){
		$insId = $this->session->userdata('ins_id');
		$roleId = $this->input->post('roleId');
		if($this->_checkAcRoleStatus($insId,$roleId,$msg) == '-1')$this->_ajaxRet('-1',$msg);
		$myRole = $this->usermodel->getUserPlayingRole($insId,$this->session->userdata('user_id'));
		if($myRole != '-1'){
			if($this->role_model->changeRole($insId,$roleId,$this->session->userdata('user_id'),$myRole['roleId']))
			$this->_ajaxRet('1',"操作成功");
			else $this->_ajaxRet('0',"操作失败！请稍后再试...");
		}
		else $this->_doAcPlayer($insId,$roleId,$this->session->userdata('user_id'));
	}
	
	function instanceFinished(){
		echo "项目结束";
		exit;
	}
	
}