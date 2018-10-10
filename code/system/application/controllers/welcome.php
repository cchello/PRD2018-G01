<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
		
	}
	
	function index()
	{
		$this->load->library(array('encrypt','form_validation','session'));
		$this->load->helpers(array('form','url'));
		$this->load->helper('html');
		$this->load->model('usermodel');
		$this->load->model('evaluationmodel');   //引入评价模型 wmc 2010/01/26
		
		//SET VALIDATION RULES
		$this->form_validation->set_rules('user_name', 'username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('user_pass', 'password', 'required|trim|md5');
		$this->form_validation->set_error_delimiters('<em>','</em>');
		
		if($this->input->post('login'))
		{
			if($this->form_validation->run())
			{
				$user_name=$this->input->post('user_name');
				$user_pass=$this->input->post('user_pass');
				/*
				 check the user_name and user_pass in db;
				 */
				if($this->usermodel->authen($user_name,$user_pass ) == true)
				{
					$user_gid = $this->usermodel->getGroupid($user_name);
					$user_id = $this->usermodel->getUserid($user_name);
					$score = $this->evaluationmodel->getsystemscore($user_id);
					$onlinetime = $this->evaluationmodel->getsystemonlinetime($user_id);				
					$grade = $this->evaluationmodel->getsystemgrade($user_id);
					$logintime = time();
					$user_data = array(
									'user_name' => $user_name,
									'user_gid' => $user_gid,	
									'user_id' => $user_id,
					                'score' => $score,              //在session中加入系统得分 wmc 2010/01/26
					                'onlinetime' => $onlinetime,    //在session中加入系统在线时间 wmc 2010/01/26
					                'grade' => $grade,			    //在session中加入系统等级 wmc 2010/01/26
					                'logintime' => $logintime                 //在session中加入登录时的时间 mc 2010/01/26
					);
					
				   date_default_timezone_set('Asia/Shanghai');
				   $showtime=date("Y-m-d H:i:s");
				   $ip=$_SERVER['REMOTE_ADDR'];
				   $userData = array(
									'userid' => $user_id,
					                'time' => $showtime,                 //在session中加入登录时的时间 mc 2010/01/26
				                    'ip'=>$ip
					);
					
					$this->session->set_userdata($user_data);
					if($this->usermodel->getGroupid($user_name)>'0'){
						redirect('home/index/');
					}
					else{
						redirect('admin/homeadmin/');
					}
				}
				else{
					$this->session->set_flashdata('message','User name or Password error');
					redirect('welcome/index/');
				}
			}	
		}
		
		$this->load->view('main/login_page');
	}
	function general()
	{
		$this->load->view('admin/general');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */