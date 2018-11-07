<?php
class Login extends Controller
{
	function Login()
	{
		parent::Controller();
		$this->load->model('usermodel');
	}
	
	function index()
	{
		$this->load->view('admin/login');
	}
	
	function authen()
	{ 
		if($this->usermodel->authen($_POST['username'], md5($_POST['username'])))
		{
			$groupid = $this->usermodel->getGroupid($_POST['username']);
			$this->session->set_userdata('user_name',$_POST['username']);
			$this->session->set_userdata('user_gid', $groupid);
			redirect('admin/useradmin');
		}
		else 
		{
			$data['error'] = "用户名密码错误";
			$this->load->view('admin/login', $data);
		}
	}
}