<?php
class ProjectGantt extends Controller {
	function ProjectGantt() {
		parent::Controller();
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->model('usermodel');
		$this->load->helper('html');
		$this->load->model('ganttmodel');
	}
	
	function index(){
		echo "hello";
	}
	
	function handler(){
		$taskView = $this->input->post('taskView');
		switch($taskView){
			case '1':
				$this->_viewMyGantt();
			break;
			case '2':
				$this->_viewProGantt();
			break;
			default:
			break;
		}
	}
	
	private function _viewMyGantt(){
		$instanceid = $this->session->userdata('ins_id');
		$instance = $this->instance_model->getInstanceByid($instanceid);
		
		$caseid = $instance['caseid'];
		
		if($instanceid){
			$ganttpath="system/application/uploadedfile/case_$caseid/ins_$instanceid/gantt.png";		
		}
		if(!file_exists($ganttpath)){
			if(strtotime($instance['starttime'])==0){
				echo $instance['instancename']."还没开始";
				exit;
			}
			$project['id'] = $caseid;
			$project['name'] = $instance['instancename'];
			$project['starttime'] = strtotime($instance['starttime']);
			$project['tasks'] =  $this->casemodel->getTasksByCaseid($caseid);
			$this->ganttmodel->generate($project,$ganttpath);
		}
		$data['ganttpath']=$ganttpath;
		$this->load->view('project/gantt/myGantt_view',$data);
	}
	
	private function _viewProGantt(){
		$instanceid = $this->session->userdata('ins_id');
		$instance = $this->instance_model->getInstanceByid($instanceid);
		
		$caseid = $instance['caseid'];
		
		if($caseid){
			$ganttpath="system/application/uploadedfile/case_$caseid/gantt.png";		
		}
		if(!file_exists($ganttpath)){
			$project['id'] = $caseid;
			$project['name'] = $this->casemodel->getCaseNameById($caseid);
			$project['starttime'] = now();
//			echo $project['starttime'];
			$project['tasks'] =  $this->casemodel->getTasksByCaseid($caseid);
			$this->ganttmodel->generate($project,$ganttpath);
		}
		$data['ganttpath']=$ganttpath;
		$this->load->view('project/gantt/proGantt_view',$data);
	}
}