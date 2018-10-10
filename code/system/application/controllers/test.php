<?php

class Test extends Controller {

	function Test()
	{
		parent::Controller();
		$this->load->model('casemodel');	
	}
	
	function index()
	{
		
		$case='d:\xampp\htdocs\pbcls\system\application\uploads\ds.zip';
		$msg="";
//		$this->casemodel->addcase($case,$msg);
		echo now();
	}

}

?>