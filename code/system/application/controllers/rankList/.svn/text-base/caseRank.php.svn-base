<?php
class CaseRank extends Controller {
	function CaseRank(){
		parent::Controller();
		$this->load->model('usermodel');
		$this->load->model('pagermodel');
		$this->load->model('instance_model');
		$this->load->model('rankmodel');
		$this->load->model('casemodel');
		$this->load->helper('html');
	}

	private function isLoggedIn(){
		$userName = $this->session->userdata('user_name');
		return empty($userName)?FALSE:TRUE;
	}
	
	function index(){
		if(!$this->isLoggedIn())redirect('/home/notLogin');
		$caserank=$this->rankmodel->getCaseRank();
		$caseArray=array();
		$index=0;
		if(is_array($caserank)){
		   foreach($caserank as $case){
		       $casename=$this->rankmodel->getCaseName($case['caseid']);
		          $caseitem['casename']=$casename['0']['casename'];
		          $caseitem['count']=$case['count(caseid)'];
		          $caseitem['caseid']=$case['caseid'];
		          
		          $caseArray[$index]=$caseitem;
		          $index++;
		   }
		}
		
	    $current_page = $this->input->post('page');
		if($current_page==0){
		  $current_page=1;
		}
		
	    $pager=new Pagermodel();
		$pager->setPagermodel($caseArray,$current_page,10);
  
		$data=array(
	     'caserank'=>$caseArray,
		 'page'=>$pager, 
		);
		$this->load->view("rank/caseRankView",$data);
	}		
}