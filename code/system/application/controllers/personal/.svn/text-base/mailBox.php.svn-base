<?php
class MailBox extends Controller{
	function MailBox(){
		parent::Controller();
		$this->load->model('usermodel');
		$this->load->model('messagemodel');
		$this->load->helper('html');
		define("RECEIVE",'1');
		define("SEND",'2');
		define("WRITE",'3');
	}
	
	private function isLoggedIn(){
		$userName = $this->session->userdata('user_name');
		return empty($userName)?FALSE:TRUE;
	}
	
	function index()
	{
		$subNav = $this->input->post('subNav');
		if (!$this->isLoggedIn()){
			redirect('/home/notLogin');
			$this->loadviews();
		}		
		else 
		{
			$username = $this->session->userdata('user_name');
			switch ($subNav){
				case RECEIVE:
					$this->showRecBox($username);
					break;
				case SEND:
					$this->showSendBox($username);
					break;
				case WRITE:
					$this->showWriBox($username);
					break;
				default:
					echo "Request Fails!";
					break;
			}
		}
	}
	
	function showRecBox($username)
	{
		$userid = $this->usermodel->getUserid($username);
		$data['receiveNum'] = $this->messagemodel->getReceivedNum($userid);
		$data['newNum'] = $this->messagemodel->getNewMessages($userid);
		$data['messages'] = $this->messagemodel->getReceivedMessagesByLimits($userid,1,100);
		$this->load->view('perSpace/receiveBox',$data);
	}
	
	function showSendBox($username)
	{
		$userid = $this->usermodel->getUserid($username);
		$data['sendNum'] = $this->messagemodel->getSentNum($userid);
		$data['messages'] = $this->messagemodel->getSentMessagesByLimits($userid,1,100);
		$this->load->view('perSpace/sendBox',$data);		
	}
	
	function showWriBox($username)
	{
		$userid = $this->usermodel->getUserid($username);
		$this->load->view('perSpace/writeMessage');
	}
	
	function getMessage(){
		$type = $this->input->post('type');
//		$count = $this->input->post('count');
//		$userid = $this->session->userdata('user_id');
//		$limit = 10;
		if ($type == "receive"){
//			if ($count > $this->messagemodel->getReceivedNum($userid)) $count = ($this->messagemodel->getReceivedNum($userid))%$limit;
			$resultArray = $this->messagemodel->getReceivedMessagesByLimits($userid,1,100);
		}
		else{
//			if ($count > $this->messagemodel->getSentNum($userid)) $count = ($this->messagemodel->getSentNum($userid))%$limit;			
			$resultArray = $this->messagemodel->getSentMessagesByLimits($userid,1,100); 
		}
		echo $resultArray;
	}
	
	function deleteMessage(){
		$messageId = $this->input->post('messageId');
		return ($this->messagemodel->deleteMessage($messageId));
	}
	
	function write(){
		if(!$this->session->userdata('user_name'))		
			redirect('/home/notLogin');
		$username = $this->session->userdata('user_name');
		$to = $this->usermodel->getUserid($this->input->post('to'));
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$userid = $this->usermodel->getUserid($username);
//		echo $username;
		if(!$userid){
			echo "<script>";
		}
		else{
			$message = array(
				'from' => $userid,
				'to' => $to,
				'title' => $title,
				'body' => $content
			);
			if(!$to){
				?><script>alert('Wrong Receiver Name!');
				window.location.href='<?php echo base_url();?>index.php/perSpace';
				</script><?php
			}
			elseif($this->messagemodel->addMessage($message)){
				?><script>alert('Send Success!');
				window.location.href='<?php echo base_url();?>index.php/perSpace';
				</script><?php
			}
			else{
			?><script>alert('Send Fail!');
				window.location.href='<?php echo base_url();?>index.php/perSpace';
				</script><?php
			}
		}
	}
}