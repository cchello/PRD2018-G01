<?php
class ShowContent extends Controller{
	function ShowContent(){
		parent::Controller();
		$this->load->model('bbsmodel');
		$this->load->model('xmlmodel');
		$this->load->helper('html');
	}
	
	function index(){
		header("content-type:text/xml");
		$subId = $this->input->post('param');
		$data['subId'] = $subId;
		$data['reply'] = $this->bbsmodel->getReplyListByLimit($subId,1,100);
		$this->load->view('caseView/subContent',$data);
	}
	
	function getMess(){
		header("content-type:text/xml");
		$subId = $this->input->post('subId');
		echo $this->xmlmodel->returnXmlFactory('1',$subId);
		exit;
		$data['subId'] = $subId;
		$data['reply'] = $this->bbsmodel->getReplyListByLimit($subId,1,100);
		$this->load->view('caseView/subContent',$data);
	}
}