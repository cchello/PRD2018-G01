<?php
	class CaseControl extends Controller {
		function CaseControl() {
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
				$this->load->view('caseView/casePage',$data);
			}
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
					'caseId' => $caseId,
					'uploadTime' => $case['uploadtime'],
					'description' => $case['description'],
					'maxPlayer' => $case['maxplayer'],
					'caseUsed' => $case['finishedinstances'],
					'caseType' => $case['casetype'],
					'caseStatus' => $case['status'],
					'caseUrl' => site_url("/caseControl/showView")
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
		
/**
 * 功能：获取系统中的案例列表
 * @return array
 */
		private function cc_list() {
			return $this->casemodel->getAllCases();
		}
/*
 * 
 */		
		function showView($caseId){
			$data['caseId'] = $caseId;
			$this->load->view('caseView/caseInfoHeader');
			$this->load->view('caseView/caseInfoMain',$data);
			$this->load->view('caseView/caseInfoBottom');
		}
		
/**
 * 功能：加载讨论区
 * 
 */		
		function showInsDisSpa($caseId)
		{
			$data['caseid'] = $caseId;
			$data['casename'] = $this->casemodel->getCaseNameById($caseId);
			$data['records'] = $this->bbsmodel->getSubjectListByLimit($caseId,1,100);
//			print_r($data);
//			die();
			$this->load->view('caseView/disSpace',$data);
		}

/*
 * 功能：显示案例实例
 */		
		
		function showInsDetail($caseid){
			if($this->isLoggedIn() == FALSE){
				redirect('/home/notLogin'); 
			}
			else {
				if($caseid!='0'){
					$data['caseid'] = $caseid;
					$case=$this->casemodel->getCaseById($caseid);
					if(!empty($case)){
						$data['case'] = array(
							'casename' => $case['casename'],
							'author' => $case['author'],
							'email' => $case['email'],
							'version' => $case['version'],
							'instances' => $case['instances'],
							'upload_time' => $case['uploadtime'],
							'case_descri' => $case['description'],
							'max_player' => $case['maxplayer'],
							'used' => $case['finishedinstances'],
							'case_type' => $case['casetype'],
							'case_status' => $case['status'],
							'caseid' => $case['uid'],
							'description' => $case['description'],
							'casetype' => $case['casetype']
						);
					}
					else{
						$data['case'] = '';
					}
				}
				else{
					$data['case'] = '';
				}
				$this->load->view('caseView/insDetail',$data);
			}
		}

/*
 * 功能：显示案例信息
 */

		function showMainInfo($caseid){
			if($this->isLoggedIn() == FALSE){
				redirect('/home/notLogin'); 
			}
			else {
				$data['caseId'] = $caseid;
				$tmp=$this->casemodel->getInstancesByCaseId($caseid);
				if(!empty($tmp)){
					$data['caseIns'] = $tmp;
				}
				else {
					$data['caseIns'] = '';
				}
				$this->load->view('caseView/mainInfo',$data);
			}
		}
/*
 * 功能：显示同个主题的回复
 */		
			
		function showSubReply()
		{
			$subId = $this->input->post('subId');
			$data['subId'] = $subId;
			$this->load->view('caseView/subReply',$data);
		}

	}
	
	