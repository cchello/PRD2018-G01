<?php
	class Cc extends Controller {
		function Cc() {
			parent::Controller();
			$this->load->helper('form');
			$this->load->model('casemodel');
			$this->load->model('usermodel');
			$this->load->model('bbsmodel');
			$this->load->model('xmlmodel');
		}
/**
 * 功能：判断用户是否已登录
 * @return unknown_type
 */
	private function isLoggedIn(){
		$user_name = $this->session->userdata('user_name');
		return empty($user_name)?FALSE:TRUE;
		}

/**
 * 功能：获得某一案例的详细信息，为Ajax后台调用
 * @param  $_POST['caseid']:案例ID号
 * @return XML
 */
		function getCcInfor(){
			header("Content-Type:text/xml");			
			$caseId = $this->input->post('caseId');
			$case = $this->casemodel->getCaseById($caseId);
			if(!empty($case)){
				$caseInfo = array(
					'caseName' => $case['casename'],
					'uploadTime' => $case['uploadtime'],
					'description' => $case['description'],
					'maxPlayer' => $case['maxplayer'],
					'caseUsed' => $case['finishedinstances'],
					'caseType' => $case['casetype'],
					'caseStatus' => $case['status'],
					'caseUrl' => site_url("/cc/ccshow/".$caseId)
				);
				$output = $this->xmlmodel->xmlFactoryElement('1','获取数据成功');
				$output .= $this->xmlmodel->xmlFactoryMaker($caseInfo,"caseInfo");
				$output = $this->xmlmodel->xmlFactoryEndElement($output);

				echo ($output);
				die();
			}
			else{
				echo $this->xmlmodel->xmlError();
				die();
			}
		}
		
		function index($caseid='0') {
			if($this->isLoggedIn() == FALSE){
				redirect('/home/notLogin'); 
			}else{
			$data['case_list'] = $this->cc_list();
			if($caseid!='0'){
				$data['caseid'] = $caseid;
				$case=$this->casemodel->getCaseById($caseid);
				if(!empty($case)){
					$data['case'] = array(
						'casename' => $case['casename'],
						'upload_time' => $case['uploadtime'],
						'case_descri' => $case['description'],
						'max_player' => $case['maxplayer'],
						'used' => $case['finishedinstances'],
						'case_type' => $case['casetype'],
						'case_status' => $case['status'],
						'caseid' => $case['uid']
					);
				}
				else{
					$data['case'] = array(
						'casename' => '',
						'upload_time' => '',
						'case_descri' => '',
						'max_player' => '',
						'used' => '',
						'case_type' => '',
						'case_status' => '',	
						'caseid' =>''					
					);
				}
			}
			else{
				$data['case'] = array(
					'casename' => '',
					'upload_time' => '',
					'case_descri' => '',
					'max_player' => '',
					'used' => '',
					'case_type' => '',
					'case_status' => '',
					'caseid' =>''
				);
				$data['caseid'] = '0';
			}
			$this->load->view('case/case_page',$data);
		}
		}

/**
 * 待定
 * @return unknown_type
 */
		private function cc_all() {
			return $this->casemodel->getAllCases();
		}

/**
 * 功能：获取系统中的案例列表
 * @return array
 */
		private function cc_list() {
			return $this->casemodel->getAllCases();
		}
		
/**
 * 待定
 * @return unknown_type
 */		
		private function cc_upload(){
			
		}

/**
 * 待定
 * @return unknown_type
 */
		private function cc_show_mess(){
		
		}
		
/**
 * 待定
 * @return unknown_type
 */
		private function cre_ins() {
			
		}

/**
 * 返回案例的详细信息view页面
 * @param $case_id		:案例ID
 * @return none
 */
		function ccshow($case_id) {
		if($this->isLoggedIn() == FALSE){
				redirect('/home/notLogin');   
		}else{
			$tmp=$this->casemodel->getCaseById($case_id);
			if(!empty($tmp)){
				$data['case_info'] = array(
					'casename' => $tmp['casename'],
					'uploader' => $tmp['uploader'],
					'upload_time' => $tmp['uploadtime'],
					'max_player' => $tmp['maxplayer'],
					'discriptions' => $tmp['description'],
					'caseid' => $tmp['uid']
				);
			}
			else{
				$data['case_info'] = array(
					'name' => '',
					'uploader' => '',
					'upload_time' => '',
					'max_player' => '',
					'discriptions' => '',	
					'caseid' => ''
				);			
			}
			$this->load->view('case/case_info',$data);
		}
		}

/**
 * 功能：返回由案例生成的项目总列表
 * @param $case_id		：案例ID
 * @return none
 */
		function ccins($case_id){
		if($this->isLoggedIn() == FALSE){
				redirect('/home/notLogin'); 
		}else{
			$data['case_id'] = $case_id;
			$tmp=$this->casemodel->getInstancesByCaseId($case_id);
			if(!empty($tmp)){
				$data['case_ins'] = $tmp;
			}
			else {
				
				$data['case_ins'] = '';
			}
			$this->load->view('case/case_ins',$data);
		}
		}
		
/**
 * 功能：返回案例讨论区的view页面
 * @param $case_id		:案例的ID
 * @return none
 */
		function ccdis($case_id){
		if($this->isLoggedIn() == FALSE){
				redirect('/home/notLogin');  
		}else{
			$data['caseid'] = $case_id;
			$data['casename'] = $this->casemodel->getCaseNameById($case_id);
			if(isset($_REQUEST['page']))
				$page = $_REQUEST['page'];
			else 
				$page = 1;
			$num = $this->bbsmodel->getSubjectNum($case_id);
			$data['page'] = $page;
			$data['pages'] = (int)($num/10)+1;
			$data['records'] = $this->bbsmodel->getSubjectListByLimit($case_id,$page,10);
			$this->load->view('case/case_discus',$data);
		}
		}
		
	/*
 * 新建一个实例
 */
	function createIns(){
		$this->load->library('uploadedfile');
		$this->load->model('xmlmodel');
		$caseId = $this->input->post('caseId');
		$insName = $this->input->post('insName');
		$userId = $this->session->userdata('user_id');
		header('content-type:text/xml');
		$ins = array(
			'instancename' =>$insName,
			'caseid' => $caseId,
			'creatorid' => $userId
		);
/*		$playingIns = $this->usermodel->getPlayingInstances($userId);
		if(!empty($playingIns)){
			echo $this->xmlmodel->returnXmlFactory('0',"您已经开始了一个项目，无法创建！");
			die();
		}*/
		if('-1' == ($insId = $this->casemodel->addInstance($ins))){
			echo $this->xmlmodel->returnXmlFactory('0',"新建案例失败，请稍后重试！");
			die();
		}
		if(false == $this->uploadedfile->createFolder_ins($insId,$caseId)){
			$this->casemodel->deleteInstance($insId);
			echo $this->xmlmodel->returnXmlFactory('0',"建立项目文件夹不成功,请联系系统管理员！");
			die();
		}
		echo $this->xmlmodel->returnXmlFactory('1',$insId);
		exit;
//			$this->insEntry($insId);
	}
}