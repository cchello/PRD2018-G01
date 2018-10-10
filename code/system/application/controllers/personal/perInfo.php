<?php
class PerInfo extends Controller {
	function PerInfo(){
		parent::Controller();
		$this->load->model('usermodel');
		$this->load->helper('html');
		define("SELFINFORMATION",'1');
		define("SELFNEWS",'2');
	}
	
	function index() {
		$subNav = $this->input->post('subNav');
		if (!$this->isLoggedIn()){
			redirect('/home/notLogin');
			$this->loadviews();
		}
		else {
			$username = $this->session->userdata('user_name');
			switch ($subNav){
				case SELFINFORMATION:
					$this->showInfo($username);
					break;
				case SELFNEWS:
					$this->showNews($username);
					break;
				default:
					echo "Request Fails!";
					break;
			}
		}
	}
	
	function showInfo($username){
		$user_data = $this->usermodel->getUserbyname($username);
		$data['self_info'] = array(
			'sex' => $user_data['sex'],
			'reg_time' => $user_data['registertime'],
			'login_times' => '',
			'hobbies' => $user_data['interests'],
			'signature' => $user_data['signature']
		);
		$data['contact_info'] = array (
			'qq' => $user_data['qq'],
			'msn' => $user_data['msn'],
			'email' => $user_data['email'],
			'home_page' => $user_data['homepage']
		);
		$this->load->view('perSpace/selfInfo',$data);
	}
	
		
	function showNews($username){
//		$data = $this->usermodel->getNewsbyname($username);
		$this->load->view('perSpace/selfNews');
	}
	
	
	
	
	
	private function isLoggedIn(){
		$userName = $this->session->userdata('user_name');
		return empty($userName)?FALSE:TRUE;
	}
}