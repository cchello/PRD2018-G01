<?php
class Rank extends Controller {
	function Rank() {
		parent::Controller();
		$this->load->model('rankmodel');
		define("ROLERANK","1");				//人物排行
		define("INSTANCERANK","2");				//项目排行
	}
	
	function index() {
		$user_name = $this->session->userdata('user_name');
		if(empty($user_name)){
			redirect('/home/notLogin');  
		}
		else {	
			$data=array(
			 'test'=>"测试"
			);
			$this->load->view('rank/rank',$data);
		}	
	}

}

?>