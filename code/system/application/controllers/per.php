<?php
class Per extends Controller {
	function Per() {
		parent::Controller();
		$this->load->helper('html');
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->model('usermodel');
		$this->load->helper('form');
	}

	/**
	 * 	Judge whether the user has logged in
	 */
	private function isLoggedIn(){
		$user_name = $this->session->userdata('user_name');
		return empty($user_name)?FALSE:TRUE;
	}

	function index(){
		if($this->isLoggedIn() == FALSE){
			redirect('/home/notLogin');
		}else
		{
			$this->load->model('evaluationmodel');
			$user_name = $this->session->userdata('user_name');
			$user_id=$this->usermodel->getUserid($user_name);
			$user_data = $this->usermodel->getUser($user_id);
			$data['self_info'] = array(
			'sex' => $user_data['sex'],
			'reg_time' => $user_data['registertime'],
			'login_times' => '',
			'hobbies' => $user_data['interests'],
			'signature' => $user_data['signature']
			);
			$data['contact_info'] = array (
			'qq' => $user_data['qq'],
			'msn' => $user_data['msn'],
			'email' => $user_data['email'],
			'home_page' => $user_data['homepage']
			);
			$this->load->view('perSpace/per_space',$data);
		}
	}

	function portrait() {
		if($this->isLoggedIn() == FALSE){
			redirect('/home/notLogin');
		}
		else{
			$this->load->view('perSpace/per_portrait');
		}
	}
	function ins(){
		if($this->isLoggedIn() == FALSE){
			redirect('/home/notLogin');
		}else{
			$user_name = $this->session->userdata('user_name');
			$user_id=$this->usermodel->getUserid($user_name);
			$tmp = $this->usermodel->getPlayingInstances($user_id);
			$count = 0;
			reset($tmp);
			$data = array();
			while($value = current($tmp)){
				$apply_per = $this->instance_model->getApplyingUserList($value['instanceid']);
				$playing = $this->instance_model->getPlayingUserList($value['instanceid']);
				$caseinfo = $this->casemodel->getCaseByName($value['casename']);
				$from_case = $caseinfo['casename'];
				$creator = $this->usermodel->getUsername($value['creatorid']);
				$is_started = ($this->instance_model->getInsStatus($value['instanceid']) == INS_STATUS_ONGOING)?'1':'0';
				if($value['creatorid'] == $user_id)
				$is_creator = TRUE;
				else
				$is_creator = FALSE;
				$data['per_ins'][$count++] = array(
				'ins_name' => $value['instancename'],
				'from_case' => $caseinfo['casename'],
				'ins_status' => $value['status'],
				'applying' => $apply_per,
				'ins_players_now' => $playing,
				'ins_myrole' => '',
				'ins_creator' => $creator,
				'isstarted' => 	$is_started,
				'is_creator' => $is_creator
				);
				next($tmp);
			}
			$this->load->view('perSpace/per_instances',$data);
		}
	}

	function changpass(){
		if($this->isLoggedIn() == FALSE){
			redirect('/home/notLogin');
		}else{
			$this->load->view('perSpace/per_passchange');
		}
	}

	function mail(){
		if($this->isLoggedIn() == FALSE){
			redirect('/home/notLogin');
		}else{
			//		$this->load->view('perSpace/per_mail');
			redirect('message');
		}
	}
}