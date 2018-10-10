<?php
	class Register extends Controller {
		function Register() {
			parent::Controller();
			$this->load->helper('form');
			$this->load->model('casemodel');
			$this->load->model('usermodel');
			$this->load->model('bbsmodel');
			$this->load->helper('security');
		}

		function isMailUnique(){
			$email = $_POST["email"];
			$user = $this->usermodel->checkUserEmail($email);
			if ($user) echo FALSE;
			else echo TRUE;
		}
		
		function isNameUnique(){
			$username = $_POST["username"];
			if ($this->usermodel->checkUserName($username)) echo FALSE;
			else echo TRUE;
//			echo $username;
		}		
			
		function index(){
			$this->load->view('register/register');
		}

		
		function userRegister(){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$confirm = $_POST['confirm'];
			$email = $_POST['email'];
			if ($this->usermodel->checkUserName($username)) {
				$errorMsg ="此用户名已被他人申请，请另选用户名！3秒钟自动跳转，或点击此处返回至注册页面重新注册";
				$data['errorMsg'] = $errorMsg;
				$this->load->view('register/regFail',$data);
			}
			elseif ($password != $confirm) {
				$errorMsg ="两次密码输入不一致，3秒钟自动跳转，或点击此处返回至注册页面重新注册";
				$data['errorMsg'] = $errorMsg;
				$this->load->view('register/regFail',$data);
			}
			elseif ($this->usermodel->checkUserEmail($email)){
				$errorMsg = "此邮箱已被他人申请，请另选邮箱！3秒钟自动跳转，或点击此处返回至注册页面重新注册";
				$data['errorMsg'] = $errorMsg;
				$this->load->view('register/regFail',$data);
			}
			elseif (!preg_match("/^[\w\-\.]+@[\w\-]+(\.\w+)+$/", $email)){
				$errorMsg = "邮箱格式不合法，请重新输入！3秒钟自动跳转，或点击此处返回至注册页面重新注册";
				$data['errorMsg'] = $errorMsg;
				$this->load->view('register/regFail',$data);
			}
			else{
				$user['username'] = $username;
				$user['password'] = dohash($password,'md5');
				$user['email'] = $email;
				if ($this->usermodel->addUser($user)){ 
					$data['succMsg'] = "成功注册，3秒钟自动跳转，或点击此处返回主页登录";
					$this->load->view('register/regSuccess',$data);
				}
			}
			
		}
	}
?>