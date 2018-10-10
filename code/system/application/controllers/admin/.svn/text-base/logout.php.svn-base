<?php
class Logout extends Controller
{
	function Logout()
	{
		parent::Controller();
	}
	
	function index()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}