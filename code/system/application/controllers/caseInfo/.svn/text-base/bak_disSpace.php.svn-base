<?php
	class DisSpace extends Controller{
		function DisSpace(){
			parent::Controller();
			$this->load->model('usermodel');
			$this->load->model('casemodel');
			$this->load->model('bbsmodel');
		}
		
		private function isLoggedIn(){
			$user_name = $this->session->userdata('user_name');
			return empty($user_name)?FALSE:TRUE;
		}
		
		function index($caseId){
			if($this->isLoggedIn() == FALSE){
				redirect('/home/notLogin');  
			}
			else{
				$data['caseid'] = $caseId;
				$data['casename'] = $this->casemodel->getCaseNameById($caseId);
//				if(isset($_REQUEST['page']))
//					$page = $_REQUEST['page'];
//				else 
//					$page = 1;
//				$num = $this->bbsmodel->getSubjectNum($caseId);
//				$data['page'] = $page;
//				$data['pages'] = (int)($num/10)+1;
				$data['records'] = $this->bbsmodel->getSubjectListByLimit($caseId,1,100);
				$this->load->view('caseView/disSpace',$data);
			}
		}
	}