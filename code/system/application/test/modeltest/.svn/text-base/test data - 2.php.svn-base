<?php 

	$from = 4;
	$to = 3;;
	for ($count = 1; $count < 50; $count++)
	{
		$title = "第".$count."个消息";
		$content = $count;
		$result = $this->db->query("SELCT NOW()")->row_array();
	
		$message = array(
			'title' => $title,
			'body' => $content,
			'from' => $from,
			'to' => $to,		
			'sendtime' => $result['SELCT NOW()']
		);
		$this->messagemodel->addMessage($message);
}
?>