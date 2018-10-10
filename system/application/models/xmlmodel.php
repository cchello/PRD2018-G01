<?php
/*
 * XML工厂
 */
class Xmlmodel extends Model{
	
	function Xmlmodel(){
		parent::Model();
	}
	
	function xmlFactoryElement($flag,$message){
		$output = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
					<return>
						<flag>".$flag."</flag>
						<message>".$message."</message>";
		return $output;
	}
	
	function xmlFactoryMaker($array,$name){
		$output = "<".$name.">";
		foreach($array as $keyName => $value){
			$output .= "<".$keyName.">".$value."</".$keyName.">";
		}
		$output .="</".$name.">";
		return $output;
	}
	
	function xmlFactoryEndElement($output){
		$output .="</return>";
		return $output;
	}
	
	function xmlError(){
		$output =  $this->xmlFactoryElement('0','无法获取您所需数据');
		$output = $this->xmlFactoryEndElement($output);
		return $output;
	}
	
	function xmlFactoryFront($frontElement){
		return "<".$frontElement.">";
	}
	
	function xmlFactoryEnd($endElement){
		return "</".$endElement.">";
	}
	
	function returnXmlFactory($flag,$message){
		$output = $this->xmlFactoryElement($flag,$message);
		$output = $this->xmlFactoryEndElement($output);
		return $output;
	}
	
	function chatReturn($timeStamp,$messsages = '0'){
		$output = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
					<return>
						<time>$timeStamp</time>";
		if($messsages == '0'){
			$output .="<status>2</status>";	//no message after timeStamp
		}else if($messsages == '-1'){
			$output .="<status>0</status>";	//error return
		}else{
			$output .="<status>1</status>";	// there are messages after timeStamp
			foreach($messsages as $message){
				$this->db->where('uid', $message['senderId']);
				$tmp = $this->db->get('users')->row_array();
				$userName = $tmp['username'];
				$content = $message['message'];
				
				$output .="<message>";
				$output .="<author>$userName</author>";
				$output .="<content>$content</content>";
				$output .="</message>";
			}
		}
		$output .="</return>";
		return $output;
	}
	
	function newsReturn($news = '-1'){
		$output = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
						<return>";
		if($news == '-1'){
			$output .="<status>2</status>";
		}else{
			$output .="<status>1</status>";
			foreach($news as $newsContent){
				if($newsContent['newsType'] == '1'){	//project news
					$newsType = "整体工程";
				}else{
					$newsType = "任务->".$newsContent['taskName'];
				}
				$content = $newsContent['newsContent'];
				$output .="<news>";
				$output .="<newsType>$newsType</newsType>";
				$output .="<content>$content</content>";
				$output .="</news>";
			}
		}
		
		$output .="</return>";
		return $output;
	}
	
} //end Xmlmodel

	