<?php
class MyRank extends Controller {
	function MyRank(){
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
		
		$index=1;
		if(is_array($userrank)){
		     foreach($userrank as $user){
		           if($user['username']==$userName){
		                  break;
		           }else{
		             $index++;
		           }
		     }
		}

       	$current_page=ceil($index/10);
		$pager=new Pagermodel();
		$pager->setPagermodel($userrank,$current_page,10);
         		
		$data=array(
		 'username'=>$userName,
		 'page'=>$pager,
		 'current_page'=>$current_page,
		 'index'=>$index-1		 		
		);
		$this->load->view("rank/test",$data);
	
	}	
}
