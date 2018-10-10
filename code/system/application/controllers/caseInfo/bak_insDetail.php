<?php
	class InsDetail extends Controller{
		function InsDetail(){
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
	}
?>