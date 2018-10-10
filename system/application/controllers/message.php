<?php
class Message extends Controller
{
	function Message()
	{
		parent::Controller();
		$this->load->model('messagemodel');
		$this->load->model('usermodel');
	}
	
	function index()
	{
		if(!$this->session->userdata('user_name'))
		    redirect('');
		redirect('message/receiveds');
	}
	
	function receiveds()
	{
		if(!$this->session->userdata('user_name'))
		    redirect('');

		$id = $this->session->userdata('user_id');
		$data['totalmessages'] = $this->messagemodel->getReceivedNum($id);
		$data['newmessages'] = $this->messagemodel->getNewMessages($id);
		if(isset($_REQUEST['page']))
			$page = $_REQUEST['page'];
		else 
			$page = 1;
			
		$data['messages'] = $this->messagemodel->getReceivedMessagesByLimits($id,$page,10);
		$data['page'] = $page; 
		$data['pages'] = (int)($data['totalmessages']/10) + 1;
		
		$this->load->view('messageBoard/receiveds', $data);
	}
	
	function sents()
	{
		if(!$this->session->userdata('user_name'))
		    redirect('');
		$id = $this->session->userdata('user_id');
		$data['totalmessages'] = $this->messagemodel->getSentNum($id);
		if(isset($_REQUEST['page']))
			$page = $_REQUEST['page'];
		else 
			$page = 1;
		$data['messages'] = $this->messagemodel->getSentMessagesByLimits($id,$page,10);
		$data['page'] = $page; 
		$data['pages'] = (int)($data['totalmessages']/10) + 1;
		$this->load->view('messageBoard/sents', $data);
	}
	
	function readMessage($id)
	{
		if(!$this->session->userdata('user_name'))
		    redirect('');
		$data = $this->messagemodel->getMessage($id);
		if($data['isreaded'] == 0 && $data['to'] == $id)
			$this->messagemodel->changeMessageStatus($data['uid']);
//		print_r($data);
		$this->load->view('messageBoard/showmessage',$data);
	}
	
	function writeMessage()
	{
		if(!$this->session->userdata('user_name'))
			redirect('');
		$this->load->view('messageBoard/writemessage');	
	}
	
	function sendMessage()
	{
//		print_r($_POST);
		if(!$this->session->userdata('user_name'))		
			redirect('');
		if($_POST['send'])
		{
			if(preg_match('/^[a-zA-Z]/',$_POST['to'])) //如果以字母开头,把用户名转化成id
				$to = $this->usermodel->getUserid($_POST['to']);

			else 
				$to = $_POST['to'];
			
			if(!$this->usermodel->checkUserid($to))
			{
				$msg = "这个用户不存在！";
				$this->session->set_flashdata('msg', $msg);
				redirect('message/receiveds');
//				echo "<script type=\"text/javascript\">history.go(-1)</script>" ;  
			}
			$message = array(
				'from' => $this->session->userdata['user_id'],
				'to' => $to,
				'title' => $_POST['title'],
				'body' => $_POST['body']
			);
			if($this->messagemodel->addMessage($message))
				$msg = "消息发送成功！";
			else 
				$msg="消息发送失败！";
			$this->session->set_flashdata('msg', $msg);
			redirect('message/receiveds');
		}
	}
	
	function deleteMessages()
	{
		if(!$this->session->userdata('user_name'))
		   redirect('');	
//		 print_r($_POST);	
		if(!$_POST)
		    redirect('message');   

		$ids = preg_split('/\,/', $_POST['checkboxs']);
		if($ids)
			foreach($ids as $id)
				$this->messagemodel->deleteMessage($id);
		redirect('message');
	}
}
