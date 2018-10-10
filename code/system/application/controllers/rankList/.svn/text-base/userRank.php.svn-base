<?php
class UserRank extends Controller {
	function UserRank(){
		parent::Controller();
		$this->load->model('rankmodel');
		$this->load->model('pagermodel');
		$this->load->helper('html');
	}

	private function isLoggedIn(){
		$userName = $this->session->userdata('user_name');
		return empty($userName)?FALSE:TRUE;
	}
	
	function index(){
		if(!$this->isLoggedIn())redirect('/home/notLogin');
		$userName = $this->session->userdata('user_name');	
			
		$userrank=$this->rankmodel->getUserRank();
		
		$current_page = $this->input->post('page');
		if($current_page==0){
		  $current_page=1;
		}
       	
		$pager=new Pagermodel();
		$pager->setPagermodel($userrank,$current_page,10);
		
		$data=array(
		 'username'=>$userName,	 
		 'page'=>$pager,
		 'index'=>-1
		);
		$this->load->view("rank/userRankView",$data);	
	}	
	
}