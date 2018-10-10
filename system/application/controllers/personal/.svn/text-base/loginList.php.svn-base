<?php
class LoginList extends Controller{
	function ChaPortrait(){
		parent::Controller();
	}
	
	private function isLoggedIn(){
		$user_name = $this->session->userdata('user_name');
		return empty($user_name)?FALSE:TRUE;
		}
	
	function index(){
		$this->load->model('usermodel');
		if($this->isLoggedIn() == FALSE){
			redirect('/home/notLogin'); 
		}
		else{
			$this->show();

		}
	}	
	
	function show(){
		$userid = $this->session->userdata('user_id');			
		$loginArray=$this->usermodel->getLoginHistory($userid);
			$data=array(
			    'array'=>$loginArray
			);
		$this->load->view('perSpace/loginHistory',$data);
	}	
}
?>