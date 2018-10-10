<?php
Class Show extends Controller{
	function Show(){
		parent::Controller();
		
	}
	
	function index()
	{
		$this->load->database();
		$this->load->model('Usermodel');
		$query=$this->Usermodel->getAllUsers();
		$data['query']=$query;
		$this->load->view('show_test_view',$data);
	}
	
	
	
}
