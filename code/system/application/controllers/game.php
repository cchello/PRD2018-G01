<?php
class Game extends Controller {
	function Game() {
		parent::Controller();
		$this->load->model('instance_model');
		$this->load->model('casemodel');
		$this->load->model('usermodel');
		$this->load->helper('html');
		if(!defined("NAV_NEWS"))define("NAV_NEWS","1");			//news view
		if(!defined("NAV_MYTASK"))define("NAV_MYTASK","2");		//my task view
		if(!defined("NAV_PROVIEW"))define("NAV_PROVIEW","3");		//project view
		if(!defined("NAV_DOCVIEW"))define("NAV_DOCVIEW","4");		//documentation view
		if(!defined("NAV_REFVIEW"))define("NAV_REFVIEW","5");
		if(!defined("NAV_MYEVA"))define("NAV_MYEVA","6");		//evaluation view
		if(!defined("NAV_MANAGE"))define("NAV_MANAGE","7");
	}
	
	private function isLoggedIn(){
		$userName = $this->session->userdata('user_name');
		return empty($userName)?FALSE:TRUE;
	}
	
	function index(){
		if(!$this->isLoggedIn())redirect('/home/notLogin');
		$this->loadViews();
	}
	
	private function loadViews(){
		$this->load->view('proGlobal/project_top_view');
		
		$this->load->view('proGlobal/project_sidebar_left_view');
		
		$this->load->view('proGlobal/project_sidebar_right_view');
		
		$this->load->view('proGlobal/project_main_view');
		
		$this->load->view('proGlobal/project_bottom_view');
	}
	
//--------------------------------------------------------------
// In the leftBar

	
	function selfInfo(){
		$data['myRole'] = $this->instance_model->getRoleInInstance($this->session->userdata('ins_id'),$this->session->userdata('user_id'));
		if($data['myRole']['roleId'] == '-2'){
			if($this->instance_model->isInsCreator($this->session->userdata('ins_id'),$this->session->userdata('user_id'))){
				$data['myRole']['roleName'] = "项目创建者";
				$data['myRole']['roleId'] = "-1";
			}
			else{
				$data['myRole']['roleName'] = "尚未分配";	
				$data['myRole']['roleId'] = "-2";
			}
		}
		$this->load->view('project/main/selfInfo_view',$data);
	}
	
	function nav(){
		if($this->instance_model->isInsCreator($this->session->userdata('ins_id'),$this->session->userdata('user_id'))){
			$data['navigation'] = array("最新消息","我的任务","项目总揽","文档浏览","参考资料","我的评价","管理项目");
		}else {
			if($this->isInProject($this->session->userdata('ins_id'),$this->session->userdata('user_id'))){
				$data['navigation'] = array("最新消息","我的任务","项目总揽","文档浏览","参考资料","我的评价","项目成员");
			}
			else{
				$data['navigation'] = array("最新消息","我的任务","项目总揽","文档浏览","参考资料","我的评价","申请加入");
			}
		}
		$data['length'] = count($data['navigation']);
		$this->load->view('project/main/navigation',$data);
	}
	
	function teamate(){
		$this->load->view('project/main/teamate');
						
	}

	
	
//--------------------------------------------------------------
// In the rightBar

	
	function progressNews(){
		$this->load->view('project/main/proNews');
		
	}
	
	function im(){
		$this->load->view('project/main/im');
		
	}
	
	function quit(){
		$this->load->view('project/main/quitFunc');
		
	}
	
	
//--------------------------------------------------------------
// In the main container

	
	function subNav(){
		$nav = $this->input->post('navigationId');
		switch($nav){
			case NAV_NEWS:
				$data['subNav'] = array("我的消息","项目消息");
			break;
			case NAV_MYTASK:
				$data['subNav'] = array("正在进行","我的任务总揽","我的甘特图");
			break;
			case NAV_PROVIEW:
				$data['subNav'] = array("任务总揽","项目甘特图");
			break;
			case NAV_DOCVIEW:
				$data['subNav'] = array("我的文档","队友文档","标准文档");
			break;
			case NAV_REFVIEW:
				$data['subNav'] = array("已有资料列表","我要上传");
			break;
			case NAV_MYEVA:
				$data['subNav'] = array("评价首页","我参与的评价","我获得的评价","评价情况统计");
			break;
			case NAV_MANAGE:
				if($this->isInProject($this->session->userdata('ins_id'),$this->session->userdata('user_id'))){
					if($this->instance_model->isInsCreator($this->session->userdata('ins_id'),$this->session->userdata('user_id')))
						$data['subNav'] = array("组员管理","项目管理");
					else $data['subNav'] = array("项目成员");
				}
				else $data['subNav'] = array("申请加入");
			break;
			default:
			break;
		}
		$data['length'] = count($data['subNav']);
		$this->load->view('project/main/subNav',$data);
		
	}
	
	function main(){
		
	}
	
	private function isInProject($insId,$userId){
		return $this->instance_model->isInProject($insId,$userId,INCLUDE_CREATOR);
	}

}