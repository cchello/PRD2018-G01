<?php
class InsInfo extends Controller{
	function InsInfo(){
		parent::Controller();
		$this->load->model('instance_model');
		$this->load->model('usermodel');
		$this->load->model('casemodel');
		$this->load->helper('html');
	}
	
	private function isLoggedIn(){
		$userName = $this->session->userdata('user_name');
		return empty($userName)?FALSE:TRUE;
	}
	
	function index(){
		$subNav = $this->input->post('subNav');
		if (!$this->isLoggedIn()){
			redirect('/home/notLogin');
			$this->loadviews();
		}
		else {
			$username = $this->session->userdata('user_name');
			$userid = $this->usermodel->getUserid($username);
			$tmp = $this->usermodel->getPlayingInstances($userid);
			$count = 0;
			reset($tmp);
			$data = array();
			while($value = current($tmp)){
				$apply_per = $this->instance_model->getApplying($value['insId']);
				$playing = $this->instance_model->getPlaying($value['insId']);
				$caseinfo = $this->casemodel->getCaseByName($value['caseName']);
				$from_case = $caseinfo['casename'];
				$creator = $this->usermodel->getUsername($value['creatorId']);
				if ($this->instance_model->getInsStatus($value['insId']) == 3)
					$is_started = 1;
				else $is_started = 0;
				if($value['creatorId'] == $userid)
					$is_creator = 1;
				else
					$is_creator = 0;
				$data['per_ins'][$count++] = array(
					'ins_name' => $value['insName'],
					'from_case' => $caseinfo['casename'],
					'ins_status' => $value['insStatus'],
					'applying' => $apply_per,
					'ins_players_now' => $playing,
					'ins_myrole' => $value['roleName'],
					'ins_creator' => $creator,
					'isstarted' => 	$is_started,
					'is_creator' => $is_creator
				);		
				next($tmp);
			}
			$this->load->view('perSpace/selfInstance',$data);
			
		}
	}
}