<?php
class Homeadmin extends Controller
{
	function Homeadmin()
	{
		parent::Controller();
	}
	
	function index()
	{
		if($this->session->userdata('user_gid') !== '0')
            redirect('/');
		$this->load->view('admin/general');
	}
	
	function ucomplexsearch()
	{
		if($this->session->userdata('user_gid') !== '0')
            redirect('/');
        if($_POST)
        {
        	if($_POST['searchtype'] == 'simple')
        	{
        		redirect('admin/homeadmin');
        	}
        	else $this->load->view('admin/g_ucomplexsearch');
        }
	}
	
	function ccomplexsearch()
	{
		if($this->session->userdata('user_gid') !== '0')
            redirect('/');
	    if($_POST)
        {
        	if($_POST['searchtype'] == 'simple')
        	{
        		redirect('admin/homeadmin');
        	}
        	else $this->load->view('admin/g_ccomplexsearch');
        }	
	
	}
	
	function usermanage()
	{
		if($this->session->userdata('user_gid') !== '0')
            redirect('/');
		$this->load->view('admin/g_user');
	}
	
	function casemanage()
	{
		if($this->session->userdata('user_gid') !== '0')
            redirect('/');
		$this->load->view('admin/g_case');
	}
	
	function email()
	{
		if($this->session->userdata('user_gid') !== '0')
            redirect('/');
		$this->load->view('admin/g_email');
	}
	
	function registerset()
	{
		if($this->session->userdata('user_gid') !== '0')
            redirect('/');
		$this->load->view('admin/g_register');
	}
	
	function cookie()
	{
		if($this->session->userdata('user_gid') !== '0')
            redirect('/');
		$this->load->view('admin/g_cookie');
	}
	
	function server()
	{
		if($this->session->userdata('user_gid') !== '0')
            redirect('/');
		$this->load->view('admin/g_server');
	}
	
	function security()
	{
		if($this->session->userdata('user_gid') !== '0')
            redirect('/');
		$this->load->view('admin/g_security');
	}
	
}