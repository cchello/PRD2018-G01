<?php 
	
						//add subject
		for ($count = 1; $count <= 20; $count++) {
		
			$result = $this->db->query("SELECT NOW()")->row_array();

			
			$subject = array(
				'title' => "第".$count."个主题",
				'content' =>  $count.$count,
				'authorid' => $count % 6 + 1,
//				'submittime' => $result['NOW()'],
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

?>