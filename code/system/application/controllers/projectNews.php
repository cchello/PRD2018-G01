<?php
class ProjectNews extends Controller {
	function ProjectNews() {
		parent::Controller();
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->model('usermodel');
		$this->load->model('news_model');
		$this->load->model('task_model');
		$this->load->model('xmlmodel');
		$this->load->helper('html');
		define("MYNEWS",'1');
		define("PROJECTNEWS",'2');
	}
	
	function index(){
		echo "hello";
	}
	
	function handler(){
		$subNav = $this->input->post('subNav');
		$insId = $this->session->userdata('ins_id');
		switch($subNav){
			case MYNEWS:
				$this->myNews($insId);
			break;
			case PROJECTNEWS:
				$this->proNews($insId);
			break;
			default:
				echo "sorry,something must be error";
			break;
		}
	}
	
	private function myNews($insId){
		$userId = $this->session->userdata('user_id');
		$role = $this->usermodel->getUserPlayingRole($insId,$userId);
		if($role == '-1'){
			echo "您尚未参与项目...";
			exit;
		}
		$news = $this->news_model->getMyNews($insId,$role['roleId']);
		$data = array();
		if($news != '-1'){
			foreach($news as $key => $content){
				$caseId = $this->casemodel->getCaseid($insId);
				$taskDetails = $this->task_model->getTaskDetails($caseId,$content['taskId']);
				$data['news'][$key] = array(
					'taskName' => $taskDetails['taskname'],
					'newsContent' => $content['newsContent']
				);
			}
		}
		$this->load->view('project/news/myNews_view',$data);
	}
	
	private function proNews($insId){
		$news = $this->news_model->getProNews($insId);
		$data = array();
		if($news != '-1'){
			$data['news'] = $this->_dataFacNewsFormate($insId,$news);
/*			foreach($news as $key => $content){
				$caseId = $this->casemodel->getCaseid($insId);
				if($content['taskId'] == '-1'){	//project news
					$type = '1';
					$taskName = '';
				}
				else{ 	//task news
					$type = '2';
					$taskDetails = $this->task_model->getTaskDetails($caseId,$content['taskId']);
					$taskName = $taskDetails['taskname'];
				}
				$data['news'][$key] = array(
					'newsType' => $type,
					'taskName' => $taskName,
					'newsContent' => $content['newsContent']
				);
			}*/
		};
		$this->load->view('project/news/projectNews_view',$data);
	}
	
/*--------------------------news for sidebar-----------------------------------*/
	
	function getSidebarNews(){
		$insId = $this->session->userdata('ins_id');
		$time = $this->input->post('time');
		$result = $this->news_model->getSidebarNews($insId,$time);
		header("Content-type:text/xml");
		if($result == '-1'){
			echo $this->xmlmodel->newsReturn();
			exit;
		}else{
			$data = $this->_dataFacNewsFormate($insId,$result);
			echo $this->xmlmodel->newsReturn($data);
			exit;
		}
	}

	private function _dataFacNewsFormate($insId,$param){
		$data = array();
		foreach($param as $key => $content){
				$caseId = $this->casemodel->getCaseid($insId);
				if($content['taskId'] == '-1'){	//project news
					$type = '1';
					$taskName = '';
				}
				else{ 	//task news
					$type = '2';
					$taskDetails = $this->task_model->getTaskDetails($caseId,$content['taskId']);
					$taskName = $taskDetails['taskname'];
				}
				$data[$key] = array(
					'newsType' => $type,
					'taskName' => $taskName,
					'newsContent' =>$content['newsContent']
				);
	}
		return $data;
	}
} //end project news