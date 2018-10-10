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
					'caseId' => $caseId,
					'uploadTime' => $case['uploadtime'],
					'description' => $case['description'],
					'maxPlayer' => $case['maxplayer'],
					'caseUsed' => $case['finishedinstances'],
					'caseType' => $case['casetype'],
					'caseStatus' => $case['status'],
					'caseUrl' => site_url("/caseInfo/test/index")
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
			$this->load->view('caseView/casePage',$data);
		}
		}
/**
 * 功能：获取系统中的案例列表
 * @return array
 */
		private function cc_list() {
			return $this->casemodel->getAllCases();
		}

	}