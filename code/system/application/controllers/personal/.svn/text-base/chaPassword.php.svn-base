<?php
class ChaPassword extends Controller{
	function ChaPassword(){
		parent::Controller();
		$this->load->model('usermodel');
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('security');
	}
	private function isLoggedIn(){
		$userName = $this->session->userdata('user_name');
		return empty($userName)?FALSE:TRUE;
	}
		
	function index(){
		if($this->isLoggedIn() == FALSE){
				redirect('/home/notLogin');  
		}else{
			$this->load->view('perSpace/changePassword');
		}
	}
	
	function change(){
		$oldPassword = $_POST['old_pass'];
		$newPassowrd = $_POST['new_pass'];
		$passConfirm = $_POST['pass_confirm'];
		if($newPassowrd != $passConfirm){
				echo "<script>
					alert('you are not key in the same passwords two times');
					location.href='javascript:history.back()';
					</script>";
		}
		else {
			$userName = $this->session->userdata('user_name');
			if ($this->usermodel->authen($userName,dohash($oldPassword,'md5'))){
				$userid = $this->usermodel->getUserid($userName);
				if($this->usermodel->changePassword($userid,dohash($newPassowrd,'md5'))){
					echo "<script>
					alert('change success');
					location.href='javascript:history.back()';
					</script>";
				}
				else {
					echo "<script>
					alert('change fail');
					location.href='javascript:history.back()';					
					</script>";
				}
			}
			else {
				 echo "<script>
					alert('not the right old password');
					location.href='javascript:history.back()';
					</script>";
			}
				
		}
	}
}