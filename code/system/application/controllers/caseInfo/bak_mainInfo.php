<?php
	class MainInfo extends Controller{
		function MainInfo(){
			parent::Controller();
			$this->load->model('casemodel');
			$this->load->model('usermodel');			
		}
		
		private function isLoggedIn(){
			$user_name = $this->session->userdata('user_name');
			return empty($user_name)?FALSE:TRUE;
		}
				
		
		function index($caseid){
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
	}
?>