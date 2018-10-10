<?php
class Bbs extends Controller
{
	function Bbs(){
		parent::Controller();
		$this->load->model('bbsmodel');
		$this->load->model('usermodel');
		$this->load->model('casemodel');
		$this->load->model('evaluationmodel');//added by wmc 2010/06/19
	}
	
	function index()
	{
//		echo $this->session->userdata('user_name');
//		if(!$this->session->userdata('user_name'))
//			redirect('');
//		$this->subjectList();
	}
	
//	function subjectList()
//	{
//		if(!$this->session->userdata('user_name'))
//			redirect('');
//		if(isset($_REQUEST['type']))
//		{
//			$data['records'] = $this->bbsmodel->getSubjectList($_REQUEST['type'],$_REQUEST['id']);
//		}
//		$data['records'] = $this->bbsmodel->getSubjectList(0,0);
////		print_r($data['records']);
//		$this->load->view('bbs_subjectlist',  $data); 
////		$this->load->view('case_discus', $data); 
//	}
	
	function subject($subjectid)
	{
		if(!$this->session->userdata('user_name'))
			redirect('');
		$data['caseid'] = $this->bbsmodel->getCaseidBySubjectid($subjectid);
		$data['casename'] = $this->casemodel->getCaseNameById($data['caseid']);
		$data['subject'] = $this->bbsmodel->getSubject($subjectid);
		if(isset($_REQUEST['page']))
			$page = $_REQUEST['page'];
		else 
			$page = 1;
		$num = $this->bbsmodel->getReplyNum($subjectid);
		$data['page'] = $page;
		$data['pages'] = (int)($num/10)+1;
		$data['replys'] = $this->bbsmodel->getReplyListByLimit($subjectid, $page, 10);
		$this->load->view('case/case_discuss_replys', $data);
		
		
	}
	function addReply()
	{
		if(!$this->session->userdata('user_name'))
			redirect('');
		if(isset($_POST['addreply']))
		{
			$reply = array(
				'subjectid' => $_POST['subjectid'],
				'content' => $_POST['content'],
				'authorid' => $_POST['authorid']
			);
			$this->bbsmodel->addReply($reply);
			$userId = $this->session->userdata('user_id');
			$score = 1;
			$this->evaluationmodel->addScore($userId,$score);   //added by wmc 2010/06/19		
			
			$subjectid = $_POST['subjectid'];
			redirect("bbs/subject/$subjectid");
		}
		
	}
	function deleteReply($replyid)
	{
		if(!$this->session->userdata('user_name'))
			redirect('');
		$subjectid = $this->bbsmodel->getSubjectid($replyid);
		$authorid = $this->bbsmodel->getAuthoridByReplyid($replyid);	
		if($authorid == $this->session->userdata('user_id') ||
			$this->session->userdata('user_gid') == 0)
		{
			$this->bbsmodel->deleteReply($replyid);
			$this->session->set_flashdata('msg', '删除回复成功!');
		}
		else 
			$this->session->set_flashdata('msg', '你没有相应的权限!');
		
		redirect("bbs/subject/$subjectid");
	}
	function editReply($replyid)
	{
		if(!$this->session->userdata('user_name'))
			redirect('/home/notLogin');  
		$subjectid = $this->bbsmodel->getSubjectid($replyid);
		$data['replyid'] = $replyid;
		$data['authorid'] = $this->bbsmodel->getAuthoridByReplyid($replyid);
		$data['subjectid'] = $subjectid;
		$data['caseid'] = $this->bbsmodel->getCaseidBySubjectid($subjectid);
		if($data['authorid'] == $this->session->userdata('user_id') ||
			$this->session->userdata('user_gid') == 0)
		{
			$data['record'] = $this->bbsmodel->getReply($replyid);
			$this->load->view('case/case_discuss_edit', $data);
		}
		else 
		{
			$this->session->set_flashdata('msg', '你没有相应的权限!');
			redirect("bbs/subject/$subjectid");
		}
	}
	function editSubject($subjectid)
	{
		if(!$this->session->userdata('user_name'))
			redirect('/home/notLogin');  
		$data['authorid'] = $this->bbsmodel->getAuthoridBySubjectid($subjectid);
		$data['caseid'] = $this->bbsmodel->getCaseidBySubjectid($subjectid);
		$data['subjectid'] = $subjectid;
		if($data['authorid'] == $this->session->userdata('user_id') ||
			$this->session->userdata('user_gid') == 0)
		{
			$data['record'] = $this->bbsmodel->getSubject($subjectid);
			$this->load->view('case/case_discuss_edit_subject', $data);
		}
		else 
		{
			$this->session->set_flashdata('msg', '你没有相应的权限!');
			redirect("bbs/subject/$subjectid");
		}

	}
	function do_editReply()
	{
		if(!$this->session->userdata('user_name'))
			redirect('/home/notLogin');  
		if(isset($_POST['editreply']))
		{
			$reply = array(
				'subjectid' => $_POST['subjectid'],
				'content' => $_POST['content'],
				'authorid' => $_POST['authorid']
			);
			$subjectid = $_POST['subjectid'];
			$this->bbsmodel->updateReply($_POST['replyid'], $reply);
			$this->session->set_flashdata('msg', '修改回复成功!');
			redirect("bbs/subject/$subjectid");
		}
	}
	function do_editSubject()
	{
		if(!$this->session->userdata('user_name'))
			redirect('/home/notLogin');  
		if(isset($_POST['editsubject']))
		{
			$subject = array(
				'title' => $_POST['title'],
				'content' => $_POST['content'],
				'authorid' => $_POST['authorid']
			);
			$subjectid = $_POST['subjectid'];
			$this->bbsmodel->updateSubject($subjectid, $subject);
			$this->session->set_flashdata('msg', '修改主题成功!');
			redirect("bbs/subject/$subjectid");
		}
	}

	function addSubject($caseid)
	{
		if(!$this->session->userdata('user_name'))
			redirect('/home/notLogin');  
		$data['caseid'] = $caseid;
		$this->load->view('bbs/bbs_addsubject',$data);
	}
	
	function do_add()
	{
		if(!$this->session->userdata('user_name'))
			redirect('/home/notLogin');  
		if(isset($_POST['addsubject']))
		{
			$caseid = $_POST['caseid'];
			$subject = array(
				'title' => $_POST['title'],
				'content' => $_POST['content'],
				'authorid' => $_POST['authorid'],
				'caseid' => $caseid
			);
			$subjectid = $this->bbsmodel->addSubject($subject);
			if($subjectid != -1){
				$this->session->set_flashdata('msg', '发布主题成功!');
				$userId = $this->session->userdata('user_id');
				$score = 2;
				$this->evaluationmodel->addScore($userId,$score);   //added by wmc 2010/06/19
			}				
			else 
				$this->session->set_flashdata('msg', '发布主题失败!');
			redirect("cc/ccdis/$caseid");
		}
		
	}
	
	function deleteSubject($subjectid)
	{
		if(!$this->session->userdata('user_name'))
			redirect('/home/notLogin');  
		$authorid = $this->bbsmodel->getAuthoridBySubjectid($subjectid);
		$caseid = $this->bbsmodel->getCaseidBySubjectid($subjectid);
		if($authorid == $this->session->userdata('user_id') ||
			$this->session->userdata('user_gid') == 0)
			{
				$this->bbsmodel->deleteSubject($subjectid);	
				$this->session->set_flashdata('msg', '删除主题成功!');
			}
		else 
			$this->session->set_flashdata('msg', '你没有相应的权限!');
	
		redirect("cc/ccdis/$caseid");
	}

}