<?php
class PerSpace extends Controller {
	function PerSpace(){
		parent::Controller();
		$this->load->model('usermodel');
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->helper('html');
		define("MYINFOMATION","1");				//主要信息
		define("MYINSTANCE","2");				//我的实例
		define("CHANGEPASSWORD","3");			//更换密码
		define("CHANGEPOSTRAIT","4");			//更换头像
		define("MYMESSAGEBOX","5");				//我的信箱
	    define("MYHISTORYEVA","6");				//我的历史评价
		define("LOGINLIST","7");				//登陆记录
	}

	private function isLoggedIn(){
		$userName = $this->session->userdata('user_name');
		return empty($userName)?FALSE:TRUE;
	}
	
	function index(){
		if(!$this->isLoggedIn())redirect('/home/notLogin');
		$this->loadViews();
	}
	
	private function loadViews()
	{
		$this->load->view('perSpace/perSpaceTop',$this->session->userdata('user_name'));
		$this->load->view('perSpace/perSpaceSidebarLeft');
		$this->load->view('perSpace/perSpaceMain');
		$this->load->view('perSpace/perSpaceBottom');
	}
	
	function selfPortrait()
	{
		$this->load->view('perSpace/perPortrait');
	}
	
	function nav(){
		define("NAVLENGTH","5");
		$data['navigation'] = array("主要信息","我的实例","更换密码","更换头像","我的信箱","历史评价","登陆记录");
		$data['length'] = NAVLENGTH;
		$this->load->view('perSpace/navigation',$data);
	}
	
	function subNav(){
		$nav = $this->input->post('navigationId');
		switch($nav){
			case MYINFOMATION:
				$data['subNav'] = array("个人信息","个人动态");
			break;
			case MYINSTANCE:
				$data['subNav'] = array("实例列表");
			break;
			case CHANGEPASSWORD:
				$data['subNav'] = array("更换密码");
			break;
			case CHANGEPOSTRAIT:
				$data['subNav'] = array("更换头像");
			break;
			case MYMESSAGEBOX:
				$data['subNav'] = array("收件箱","发件箱","写邮件");
			break;
			case MYHISTORYEVA:
				$data['subNav'] = array("评价记录");
			break;
			case LOGINLIST:
				$data['subNav'] = array("登陆记录");
			break;
			default:
			break;
		}
		$data['length'] = count($data['subNav']);
		$this->load->view('perSpace/subNav',$data);
		
	}
}