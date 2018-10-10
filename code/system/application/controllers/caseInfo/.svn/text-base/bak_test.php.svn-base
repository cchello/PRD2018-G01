<?php
	class Test extends Controller{
		function Test(){
			parent::Controller();
			$this->load->model('usermodel');
			$this->load->model('casemodel');
			$this->load->model('bbsmodel');
		}
		
		function index($caseId){
			$data['caseId'] = $caseId;
			$this->load->view('caseView/caseInfoHeader');
			$this->load->view('caseView/caseInfoMain',$data);
			$this->load->view('caseView/caseInfoBottom');
		}
		
		function insDisSpa($caseId)
		{
			$data['caseid'] = $caseId;
			$data['casename'] = $this->casemodel->getCaseNameById($caseId);
			$data['records'] = $this->bbsmodel->getSubjectListByLimit($caseId,1,100);
//			print_r($data);
//			die();
			$this->load->view('caseView/disSpace',$data);
		}
		
		function showContent()
		{
			$subId = $this->input->post('subId');
			$data['subId'] = $subId;
			$this->load->view('caseView/subContent',$data);
		}
	}

?>