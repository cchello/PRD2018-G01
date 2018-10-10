$file = "system/application/cases/testcase2.zip";

//		
//	//add admin
	$user = array(
		'username' => 'admin',
		'password' => md5('admin'),
		'groupid' => '0',
		'email' => 'admin@163.com'
	);
	if($this->usermodel->addUser($user, 0))
		echo "addUser admin success!"."\n";
	else 
	 	echo "addUser admin failed!"."\n";

	//add indicator
	$user = array(
		'username' => 'yangcheng',
		'password' => md5('1'),
		'groupid' => '1',
		'email' => 'yangcheng@163.com'
	);
	if($this->usermodel->addUser($user, 1))
		echo "addUser indicator success!"."\n";
	else 
	 	echo "addUser indicator failed!"."\n";
	 	
 	//add user
	$user = array(
		'username' => 'user',
		'password' => md5('user'),
		'groupid' => '2',
		'email' => 'user@163.com'
	);
	if($this->usermodel->addUser($user))
		echo "addUser user success!"."\n";
	else 
	 	echo "addUser user failed!"."\n";

 	//add xupengfey
	$user = array(
		'username' => 'xupengfey',
		'password' => md5('1'),
		'groupid' => '2',
		'email' => 'xupengfey@163.com'
	);
	if($this->usermodel->addUser($user))
		echo "addUser xupengfey success!"."\n";
	else 
	 	echo "addUser xupengfey failed!"."\n";
	 	
	//add cendy
	$user = array(
		'username' => 'cendy',
		'password' => md5('456123'),
		'groupid' => '2',
		'email' => 'cendy@163.com'
	);
	if($this->usermodel->addUser($user))
		echo "addUser cendy success!"."\n";
	else 
	 	echo "addUser cendy failed!"."\n";

	//add wmc
	$user = array(
		'username' => 'wmc',
		'password' => md5('1'),
		'groupid' => '2',
		'email' => 'wmc@163.com'
	);
	if($this->usermodel->addUser($user))
		echo "addUser wmc success!"."\n";
	else 
	 	echo "addUser wmc failed!"."\n";	 	
	 	
	 //add test case
	 $file = 'system/application/cases/testcase2.zip';
	if($this->casemodel->addCase($file))
		echo "Add test case success!"."\n";
	else 
		echo "Add test case failed!"."\n";
		
     //add first instance
     $firstinstance = array(
     	'instancename' => 'first instance',
     	'caseid' => 1,
     	'creatorid' => 3
     );
    if($this->casemodel->addInstance($firstinstance))
		echo "Add first instance success!"."\n";
	else 
		echo "Add first instance failed!"."\n";
     
     //add second instance
     $secondinstance = array(
     	'instancename' => 'second instance',
     	'caseid' => 1,
     	'creatorid' => 4
     );
    if($this->casemodel->addInstance($secondinstance))
		echo "Add second instance success!"."\n";
 	else 
		echo "Add second instance failed!"."\n";
		
     //add third instance
      $thirdinstance = array(
     	'instancename' => 'third instance',
     	'caseid' => 1,
     	'creatorid' => 5
     );
    if($this->casemodel->addInstance($thirdinstance))
		echo "Add third instance success!"."\n";
 	else 
		echo "Add third instance failed!"."\n"; 
		
		
      //add 4 instance
      $forthinstance = array(
     	'instancename' => 'forth instance',
     	'caseid' => 1,
     	'creatorid' => 6
     );
    if($this->casemodel->addInstance($forthinstance))
		echo "Add forth instance success!"."\n";
 	else 
		echo "Add forth instance failed!"."\n"; 
     






///////////////////////////////////////////////////////////////////  
		
	//user apply the pm of first instance
	if($this->instancemodel->applyRole(1,1,3))
		echo "User apply the pm of first instance success!"."\n";
 	else 
		echo "User apply the pm of first instance failed!"."\n"; 
		
	//xupengfey apply 2 role of first instance
	if($this->instancemodel->applyRole(1,2,4))
		echo "Xupengfey apply 2 role of first instance success!"."\n";
 	else 
		echo "Xupengfey apply 2 role of first instance failed!"."\n"; 
	
		
	//Cendy apply 3 role of first instance
	if($this->instancemodel->applyRole(1,3,5))
		echo "Cendy apply 3 role of first instance success!"."\n";
 	else 
		echo "Cendy apply 3 role of first instance failed!"."\n"; 
		
	//yangcheng apply indicator of first instance
	if($this->instancemodel->applyIndicator(1,2))
		echo "yangcheng apply indicator of first instance success!"."\n";
 	else 
		echo "yangcheng apply indicator of first instance failed!"."\n"; 
		
		
	//wmc apply observer of first instance
	if($this->instancemodel->applyObserver(1,6))
		echo "yangcheng apply indicator of first instance success!"."\n";
 	else 
		echo "yangcheng apply indicator of first instance failed!"."\n"; 	

	$this->instancemodel->applyIndicator(1,3);
	$this->instancemodel->applyObserver(1,3);
	$this->instancemodel->acceptIndicator(1,3);
	$this->instancemodel->acceptObserver(1,3);
	
	//user accept user's apply for the firs instance
	if($this->instancemodel->acceptRole(1,1,3))
		echo "user accept user's apply for the firs instance success!"."\n";
 	else 
		echo "user accept user's apply for the firs instance failed!"."\n"; 
		
	//user accept xupengfey's apply for the first instance
	if($this->instancemodel->acceptRole(1,2,4))
		echo "user accept xupengfey's apply for the first instance success!"."\n";
 	else 
		echo "user accept xupengfey's apply for the first instance failed!"."\n"; 
		
	//user accept cendy's apply for the first instance
//<!--	if($this->instancemodel->acceptRole(1,3,5))-->
//<!--		echo "user accept cendy's apply for the first instance!"."\n";-->
//<!-- 	else -->
//<!--		echo "user accept cendy's apply for the first instance!"."\n"; -->
		
	//user accept yangcheng as indicator
	if($this->instancemodel->acceptIndicator(1,2))
		echo "user accept yangcheng as indicator success!"."\n";
 	else 
		echo "user accept yangcheng as indicator failed!"."\n"; 
		
	//user accept wmc as observer
	if($this->instancemodel->acceptIndicator(1,2))
		echo "user accept wmc as observer!"."\n";
 	else 
		echo "user accept wmc as observer!"."\n"; 	
		
		
	/**************************************************************/
	//user apply a role of 2 instance
	if($this->instancemodel->applyRole(2,2,3))
		echo "yangcheng apply indicator of first instance success!"."\n";
 	else 
		echo "yangcheng apply indicator of first instance failed!"."\n"; 
		
	//user apply observer of 3 instance
	if($this->instancemodel->applyObserver(3,3))
		echo "user apply observer of 3 instance success!"."\n";
 	else 
		echo "user apply observer of 3 instance failed!"."\n"; 	
		
		
//<!--	//xupengfey accept user as a role2	-->
//<!--	if($this->instancemodel->acceptRole(2,2,3))-->
//<!--		echo "xupengfey accept user as a role2	success!"."\n";-->
//<!-- 	else -->
//<!--		echo "xupengfey accept user as a role2 failed!"."\n"; -->
		
	//cendy accept user as a observer
	if($this->instancemodel->acceptObserver(3,3))
		echo "cendy accept user as a observer!"."\n";
 	else 
		echo "cendy accept user as a observer!"."\n"; 		
		
	$from = 4;
	$to = 3;;
	for ($count = 1; $count < 20; $count++)
	{
		$title = "第".$count."个消息";
		$content = $count;
		$result = $this->db->query("SELECT NOW()")->row_array();
	
		$message = array(
			'title' => $title,
			'body' => $content,
			'from' => $from,
			'to' => $to,		
			'sendtime' => $result['NOW()']
		);
		$this->messagemodel->addMessage($message);
		
		
			for ($count = 1; $count <= 20; $count++) {
		
			$result = $this->db->query("SELECT NOW()")->row_array();

			
			$subject = array(
				'title' => "第".$count."个主题",
				'content' =>  $count.$count,
				'authorid' => $count % 6 + 1,
				'submittime' => $result['NOW()'],
				'type' => $count % 3,
				'typeid' => 1
			);
			$this->bbsmodel->addSubject($subject);
		}
		
		//add reply
		for ($subjectid = 1; $subjectid <= 20; $subjectid++)
		{
			for ($index = 1; $index <= 10; $index++) {
				$result = $this->db->query("SELECT NOW()")->row_array();
				$reply = array(
					'subjectid' => $subjectid,
					'content' => "XXX",
//					'submittime' => $result['NOW()'],
					'authorid' => $index % 6 + 1
				);
			$this->bbsmodel->addReply($reply);	
				
			}
		}