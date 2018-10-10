<?php
class ProjectChat extends Controller {
	function ProjectChat() {
		parent::Controller();
		$this->load->model('chat_model');
		$this->load->model('xmlmodel');
		$this->load->model('time_model');
		header("Content-type:text/xml");
	}
	
	function index(){
		echo 'hi';
	}
	
	function imHandler(){
		$msg = $this->input->post('msg');
		$time = $this->input->post('time');
		if(!isset($msg) || empty($msg)){
			$this->_getMessages($time);
		}else{
			$this->_setMessage($msg,$time);
		}
	}
	
	function getMessages($time = '-1'){
		$insId = $this->session->userdata('ins_id');
		if($time == '-1')$time = $this->input->post('time');
		$result = $this->chat_model->getData($insId,$time);
/*		if($time == '-1')$time = $this->input->post('time');
		$timeFormate = $this->chat_model->changeTimeFormate($time);
		$result = $this->chat_model->getData($insId,$timeFormate);
		$timeStamp = $this->chat_model->getTimeStamp();*/
		$timeStamp = time();
		if($result == '-1'){
			echo $this->xmlmodel->chatReturn($timeStamp);
			exit;
		}else{
			echo $this->xmlmodel->chatReturn($timeStamp,$result);
			exit;
		}
	}
	
	function setMessage(){
		$msg = $this->input->post('msg');
		$time = $this->input->post('time');
		$insId = $this->session->userdata('ins_id');
		$userId = $this->session->userdata('user_id');
		if($this->chat_model->setData($insId,$userId,$msg) 
			&& $this->chat_model->checkMessageNum($insId)){
			$this->getMessages($time);
		}else{
			echo $this->xmlmodel->chatReturn('0','-1');	//error return
			exit;
		}
	} 
}