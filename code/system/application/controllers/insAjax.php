<?php
class InsAjax extends Controller {
	function InsAjax() {
		parent::Controller();
		header("Content-Type: text/xml");
		$this->load->helper('html');
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->model('usermodel');
		$this->load->model('xmlmodel');
		$this->load->helper('form');
		define("SUCCESS",'1');
		define("ERROR",'0');
	}

/**
 * 功能：判断insId和userId是否已设置，主要为了保持Indicator相应操作兼容性
 * @return TRUE OR FALSE
 */
	private function checkInsAndUser(){
		return (!isset($_POST['insId'])==TRUE||!isset($_POST['userId'])==TRUE)?TRUE:FALSE;
	}	

/**
 * 功能：快捷返回xml的一个简单文档。为了保持Indicator相应操作兼容性
 * @param $flag		: 需要返回的标记
 * @param $message	：需要返回的消息
 * @return XML
 */
	private function returnXmlFactory($flag,$message){
		$output = $this->xmlmodel->xmlFactoryElement($flag,$message);
		$output = $this->xmlmodel->xmlFactoryEndElement($output);
		return $output;
	}
	
	private function validateRole($indId,$roleId){
		return TRUE;
	}
	
	private function validateUser($userId){
		return TRUE;
	}
	
/**
 * function getInsInfor()
 * 功能：用于ajax返回项目的相关信息，返回格式为XML
 * @return XML
 */
	function getInsInfor(){
		if(!isset($_POST['insId'])){
			echo $this->xmlmodel->xmlError();
			die();
		}
		$insId = $_POST['insId'];
		$ins = $this->instance_model->getInstanceByid($insId);
		if(!empty($ins)){
			$tmp = $this->instance_model->getRolesInfo($insId);
			$playerNum = 0;
			foreach($tmp as $row){	//get players
				if($row['actorid'] != '0'){
					$playerNum++;
				}
			}
			$caseid = $this->instance_model->getCaseid($insId);
			$caseinfo = $this->casemodel->getCaseByid($caseid);//get case information
			// switch is added by wmc 2010/06/19;
			switch($ins['status']){
				case 0 : $ins_status="尚未就绪";break;
				case 1 : $ins_status="准备开始";break;
				case 2 : $ins_status="正在进行";break;
				case 3 : $ins_status="正在进行";break;
				case 6 : $ins_status="已经结束";break;
				default: $ins_status=$ins['status'];break;
			}
			$insInfo = array(
				'creator' => $this->usermodel->getUsername($ins['creatorid']),
				'creatTime' => $ins['creationtime'],
				'playerNum' => $playerNum,
//				'insStatus' => $ins['status'],
				'insStatus' => $ins_status,
				'fromCase' => $caseinfo['casename'],
				'insUrl' => site_url("/ins/insshow/".$insId)
			);
			$output = $this->xmlmodel->xmlFactoryElement('1','获取数据成功');
			$output .= $this->xmlmodel->xmlFactoryMaker($insInfo,"insInfo");
			$output = $this->xmlmodel->xmlFactoryEndElement($output);//xml Factory
		}
		else{
			echo $this->xmlmodel->xmlError();
			die();
		}
		echo ($output);
	} // end getInsInfor
	
	
/**
 * function changeRoleStatus()
 * 功能：改变某个项目中的某个角色的开或者关的状态，用于ajax调用
 * @param:
 * 		$_POST['indId']:  项目id
 * 		$_POST['roleId']: 角色id
 * 		$_POST['flag']:	     关或者开的指示器。flag=0时关;flag=1时开
 * @return xml文档
 */
	function changeRoleStatus(){
		if(!isset($_POST['insId']) || !isset($_POST['roleId']) || !isset($_POST['flag'])){
			echo $this->xmlmodel->xmlError();
			die();
		}
		define("CLOSE_ROLE",'0');
		define("OPEN_ROLE",'1');
		$insId = $_POST['insId'];
		$roleId = $_POST['roleId'];
		$changeFlag = $_POST['flag'];
		if($this->validateRole($insId,$roleId)){ //For extend
			if($changeFlag == CLOSE_ROLE && $this->instance_model->closeRole($insId,$roleId)){
				$output = $this->xmlmodel->xmlFactoryElement('0',"关闭角色成功");
				$output = $this->xmlmodel->xmlFactoryEndElement($output);
				$flag = TRUE;
			}
			else if($changeFlag == OPEN_ROLE && $this->instance_model->openRole($insId,$roleId)){
				$this->xmlmodel->xmlFactoryElement('1',"打开角色成功");
				$output = $this->xmlmodel->xmlFactoryEndElement($output);
				$flag = TRUE;
			}
			if($flag === FALSE){
				$this->xmlmodel->xmlFactoryElement('-1',"ajaxError");
				$output = $this->xmlmodel->xmlFactoryEndElement($output);
			}
			echo $output;
		}
		else{
			echo $this->xmlmodel->xmlError();
			die();
		} 
	} // end changRoleStatus

	
/**
 * function changeRolePlayer()
 * 功能：改变某个项目中的某个角色的扮演者，用于ajax调用
 * @param:
 * 		$_POST['indId']:  项目id
 * 		$_POST['roleId']: 角色id
 * 		$_POST['userId']: 即将扮演者的ID
 * @return xml文档
 */	
	function changeRolePlayer(){
		if(!isset($_POST['insId']) || !isset($_POST['roleId']) || !isset($_POST['userId'])){
			echo $this->xmlmodel->xmlError();
			die();
		}
		$insId = $_POST['insId'];
		$roleId = $_POST['roleId'];
		$userId = $_POST['userId'];
		if($this->validateRole($insId,$roleId) && $this->validateUser($userId)){ //For extend
			$this->instance_model->acceptRole($insId,$roleId,$userId);
			$userName = $this->usermodel->getUsername($userId);
			$output = $this->xmlmodel->xmlFactoryElement(SUCCESS,'更改角色成功');
			$insInfo = array(
				'insId' => $insId,
				'roleId' => $roleId
			);
			$player = array(
				'userId' => $userId,
				'userName' => $userName
			);
			$output .= $this->xmlmodel->xmlFactoryMaker($insInfo,'insInfo');
			$output .= $this->xmlmodel->xmlFactoryMaker($player,'player');
			$output .= $this->xmlmodel->xmlFactoryFront('applyerList');
			$applyingList = $this->instance_model->getApplyer($insId,0,$roleId);
			foreach($applyingList as $applyer){
				$applyer = array(
					'applyerId' => $applyer['userid'],
					'applyerName' => $applyer['username']
				);
				$output .= $this->xmlmodel->xmlFactoryMaker($applyer,'applyer');
			}
			$output .= $this->xmlmodel->xmlFactoryEnd('applyerList');
			$output = $this->xmlmodel->xmlFactoryEndElement($output);
			echo $output;
			die();
		}
		if($flag === FALSE){
			echo $this->xmlmodel->xmlError();
			die();
		}
	}	//end changeRolePlayer

	
/**
 * function apply
 * 功能：提供用户的申请控制，用于ajax
 * @param
 * 	$_POST['roleId']:	角色ID
 * 	$_POST['insId']：	项目ID
 * 	$_POST['flag']：		操作符
 * 		flag: ‘0’:		申请操作
 * 			  ‘1’：		取消申请操作
 * 			  ‘2’：		退出角色操作
 * @return XML
 */
	function applyOp(){
		if(!isset($_POST['roleId']) || !isset($_POST['insId']) || !isset($_POST['flag'])){
			echo $this->xmlmodel->xmlError();
			die();
		}
		define("OP_APPLY",'0');
		define("OP_CANCEL",'1');
		define("OP_QUIT",'2');
		define("OP_SUCCESS",'1');
		define("OP_ERROR",'0');
		$roleId = $_POST['roleId'];
		$insId = $_POST['insId'];
		$userId = $this->session->userdata('user_id');
		$flag = $_POST['flag'];
		switch($flag){
			case OP_APPLY: //Apply a role
			if(!$this->instance_model->isInProject($insId,$userId)
			&& ($this->instance_model->getApplyingRoleid($insId,$userId) == '-1')
				&& $this->instance_model->applyRole($insId,$roleId,$userId)){
					$output = $this->xmlmodel->xmlFactoryElement(OP_SUCCESS,"申请角色成功");
					$output = $this->xmlmodel->xmlFactoryEndElement($output);
				}
				else{ 
					$output = $this->xmlmodel->xmlFactoryElement(OP_ERROR,"申请角色失败");
					$output = $this->xmlmodel->xmlFactoryEndElement($output);
				}
			break;
			case OP_CANCEL:	//Apply to cancel a role apply
				if($this->instance_model->isAppliedRoleid($insId,$roleId,$userId)
				&& $this->instance_model->quitApply($insId,$userId)){
					$output = $this->xmlmodel->xmlFactoryElement(OP_SUCCESS,"取消申请成功");
					$output = $this->xmlmodel->xmlFactoryEndElement($output);
				}
				else{ 
					$output = $this->xmlmodel->xmlFactoryElement(OP_ERROR,"取消申请失败");
					$output = $this->xmlmodel->xmlFactoryEndElement($output);
				}
			break;
			case OP_QUIT:	////Apply to quit a role play
			if($userId == $this->instance_model->getRolePlayerid($insId,$roleId)
			&& $this->banPlayer($insId,$userId)){
				$output = $this->xmlmodel->xmlFactoryElement(OP_SUCCESS,"取消角色成功");
				$output = $this->xmlmodel->xmlFactoryEndElement($output);
			}else{ 
				$output = $this->xmlmodel->xmlFactoryElement(OP_ERROR,"取消角色失败");
				$output = $this->xmlmodel->xmlFactoryEndElement($output);
			}
			break;	
			default:
				$output = $this->xmlmodel->xmlFactoryElement('-1',"error");
				$output = $this->xmlmodel->xmlFactoryEndElement($output);
			break;
		};
		echo $output;
	}
	
/**
 * function banUser
 * 功能：将某个项目内居于某个角色上的用户剔除,用于ajax调用
 * @param
 * 	$_POST['insId']:	项目ID
 *  $_POST['roleId']:	该角色ID
 * @return XML
 */
	function banUser(){
		if(!isset($_POST['insId']) || !isset($_POST['roleId'])){
			echo $this->xmlmodel->xmlError();
			die();
		}
		$insId = $_POST['insId'];
		$roleId = $_POST['roleId'];
		$userId = $this->instance_model->getRolePlayerid($insId,$roleId);
		//需要对用户权限做一个判断
		//if()	
		if($this->instance_model->banUser($insId,$userId)){
			$output = $this->xmlmodel->xmlFactoryElement(SUCCESS,"操作成功");
			$output = $this->xmlmodel->xmlFactoryEndElement($output);
		}
		else{
			$output = $this->xmlmodel->xmlFactoryElement(ERROR,"操作失败");
			$output = $this->xmlmodel->xmlFactoryEndElement($output);
		}
		echo $output;
	}

	
/**
 * function changeMyRole
 * 功能：更改项目中自己（创建者）的角色，用于ajax返回
 * @return xml文档
 */
	function changeMyRole(){
		if(!isset($_POST['insId']) || !isset($_POST['roleId'])){
			echo $this->xmlmodel->xmlError();
			die();
		}
		$insId = $_POST['insId'];
		$roleId = $_POST['roleId'];
		//需要对用户权限进行判断
		//if(user)
		if($this->instance_model->banUser($insId,$this->session->userdata('user_id')) &&
			$this->instance_model->acceptRole($insId,$roleId,$this->session->userdata('user_id'))
		){
			$caseId = $this->casemodel->getCaseid($insId);
			$playerName = $this->usermodel->getUsername($this->session->userdata('user_id'));
			$roleName = $this->casemodel->getRoleName($caseId,$roleId);
			$output = $this->xmlmodel->xmlFactoryElement(SUCCESS,"更新角色成功");
			$rolePlayer = array(
				'roleName' => $roleName,
				'playerName' => $playerName
				);
			$output .= $this->xmlmodel->xmlFactoryMaker($rolePlayer,'rolePlayer');
			$output = $this->xmlmodel->xmlFactoryEndElement($output);
			echo $output;
			die();
			}
		else{
				$output = $this->xmlmodel->xmlFactoryElement(ERROR,"更新角色失败");
				$output = $this->xmlmodel->xmlFacotoryEndElement($output);
				echo $output;
				die();
			}
	}

/**
 * 功能：申请担任项目指导者
 * @param $insId：		项目ID
 * @param $userId：		用户ID
 * @return XML文档
 */
	function applyIndicator(){
		if($this->checkInsAndUser()){
			echo $this->returnXmlFactory(ERROR,"错误，无法找到您要的数据");
			exit;
		}
		$insId = $_POST['insId'];
		$userId = $_POST['userId'];
		if($this->instance_model->isApplyingIndicator($insId,$userId) || $this->instance_model->isIndicator($insId,$userId)){
			echo $this->returnXmlFactory(ERROR,"您正在申请指导者角色或者您已经担任项目指导者角色");
			exit;
		}else{
			if($this->instance_model->applyIndicator($insId,$userId)){
				echo $this->returnXmlFactory(SUCCESS, "申请成功");
				exit;
			}else{
				echo $this->returnXmlFactory(ERROR,"未完成申请，请稍后重试");
				exit;
			}
		}
	}

/**
 * 功能：拒绝某用户担任项目指导者的申请
 * @param $insId：		项目ID
 * @param $userId：		用户ID
 * @return XML文档
 */
	function denyApplyIndicator(){
		if($this->checkInsAndUser()){
				echo $this->returnXmlFactory(ERROR,"错误，无法找到您要的数据");
				exit;
			}
		$insId = $_POST['insId'];
		$userId = $_POST['userId'];
		$myUserId = $this->session->userdata('user_id');
		$insInfo = $this->instance_model->getInstanceByid($insId);
		if($insInfo['creatorid'] != $myUserId ){
			echo $this->returnXmlFactory(ERROR,"无法完成操作：您不是该项目创建者");
			exit;
		}
		if(!$this->instance_model->isApplyingIndicator($insId,$userId)){
			echo $this->returnXmlFactory(ERROR,"无法完成操作：该用户未申请担任项目指导者");
			exit;
		}
		if($this->instance_model->denyApplyIndicator($insId,$userId)){
			echo $this->returnXmlFactory(SUCCESS,"操作成功！");
			exit;
		}else{
			echo $this->returnXmlFactory(ERROR,"无法完成操作，请稍后再试");
			exit;
		}
	}

/**
 * 功能：通过某用户担任项目指导者的申请
 * @param $insId：		项目ID
 * @param $userId：		用户ID
 * @return XML文档
 */
	function acApplyIndicator(){
		if($this->checkInsAndUser()){
				echo $this->returnXmlFactory(ERROR,"错误，无法找到您要的数据");
				exit;
			}
		$insId = $_POST['insId'];
		$userId = $_POST['userId'];
		$myUserId = $this->session->userdata('user_id');
		$insInfo = $this->instance_model->getInstanceByid($insId);
		if($insInfo['creatorid'] != $myUserId){
			echo $this->returnXmlFactory(ERROR,"无法完成操作：您不是该项目创建者");
			exit;
		}	
		if($this->instance_model->acApplyIndicator($insId,$userId)){
			$applyers = $this->instance_model->getIndicatorApplyers($insId);
			$output = $this->xmlmodel->xmlFactoryElement(SUCCESS,"操作成功");
			$user = array(
				'userName' => $this->usermodel->getUsername($userId),
				'userId' => $userId
			);
			$output .= $this->xmlmodel->xmlFactoryMaker($user,'user');
			$output .= $this->xmlmodel->xmlFactoryFront('applyerList');
			foreach($applyers as $temp){
				$applyer = array(
					'applyerName' => $temp['username'],
					'applyerId' => $temp['userid']
				);
				$output .= $this->xmlmodel->xmlFactoryMaker($applyer,'applyer');
			}
			$output .= $this->xmlmodel->xmlFactoryEnd('applyerList');
			$output = $this->xmlmodel->xmlFactoryEndElement($output);
			echo $output;
			exit;
		}else{
			echo $this->returnXmlFactory(ERROR,"错误！无法完成操作，请稍后再试!");
			exit;
		}
	}

/**
 * 功能：取消担任项目指导者的申请
 * @param $insId：		项目ID
 * @param $userId：		用户ID
 * @return XML文档
 */
	function cancelApplyIndicator(){
		if($this->checkInsAndUser()){
				echo $this->returnXmlFactory(ERROR,"错误，无法找到您要的数据");
				exit;
		}
		$insId = $_POST['insId'];
		$userId = $_POST['userId'];
		$myUserId = $this->session->userdata('user_id');
		$insInfo = $this->instance_model->getInstanceByid($insId);
		if($userId != $myUserId && $userId!= $insInfo['creatorid']){
			echo $this->returnXmlFactory(ERROR,"无法完成操作：您无权取消该用户的申请");
			exit;
		}
		if(!$this->instance_model->isApplyingIndicator($insId,$userId)){
			echo $this->returnXmlFactory(ERROR,"无法完成操作：您未申请担任指导者或您已经担任指导者");
			exit;
		}
		if($this->instance_model->cancelApplyIndicator($insId,$userId)){
			echo $this->returnXmlFactory(SUCCESS,"操作成功！");
			exit;
		}else{
			echo $this->returnXmlFactory(ERROR,"无法完成操作：请稍后在试");
			exit;
		}
	}

/**
 * 功能：申请取消担任项目指导者
 * @param $insId：		项目ID
 * @param $userId：		用户ID
 * @return XML文档
 */
	function cancelIndicatorAct(){
		if($this->checkInsAndUser()){
				echo $this->returnXmlFactory(ERROR,"错误，无法找到您要的数据");
				exit;
		}
		$insId = $_POST['insId'];
		$userId = $_POST['userId'];
		$myUserId = $this->session->userdata('user_id');
		$insInfo = $this->instance_model->getInstanceByid($insId);
		if($userId != $myUserId && $userId!= $insInfo['creatorid']){
			echo $this->returnXmlFactory(ERROR,"无法完成操作：您无权取消该用户的角色");
			exit;
		}
		if($this->instance_model->isIndicator($insId,$userId) 
		&&$this->instance_model->cancelIndicatorAct($insId,$userId)){
				echo $this->returnXmlFactory(SUCCESS,"角色取消成功");
				exit;
		}else echo $this->returnXmlFactory(ERROR,"无法完成操作：用户未担任该角色");
	}
}//end InsAjax