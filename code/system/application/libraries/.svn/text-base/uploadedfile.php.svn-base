<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
define("CASEFILE",'0');
define("TASKFILE",'1');
define("USERPORTRAIT",'2');
define("REFERENCE",'3');
class uploadedfile
{	//上传目录的服务器地址
	private $upload_url;
	//目前能上传的文件类型后缀名
	private $fileType;
	//头像后缀名
	private $picType;
	
	function uploadedfile()
	{
		$this->upload_url = ".".DIRECTORY_SEPARATOR."system".DIRECTORY_SEPARATOR."application".DIRECTORY_SEPARATOR."uploadedfile";
		$this->fileType = array('doc','rar','docx','pdf','jpg','zip','rar','c','cpp');
		$this->picType = array('jpg','gif','bmp','pmg');
	}


	
/*
|--------------------------------------------------------------------------
| is_exist_?
|--------------------------------------------------------------------------
|
| 判断文件或者目录在uploaded目录下是否存在
|
|	@access	public
|	@param	id:case、instance、task、filename
|			$type:
|	@return TRUE or FALSE
|
*/	
	function is_exist_case($id){
		return $this->isExist($this->upload_url.DIRECTORY_SEPARATOR."case_".$id);
	}
	
	function is_exist_instance($caseid,$insid){
		return $this->isExist($this->upload_url.DIRECTORY_SEPARATOR."case_".$caseid.DIRECTORY_SEPARATOR."ins_".$insid);
	}
	
	function is_exist_task($taskid,$insid,$caseid){
		return $this->isExist($this->upload_url.DIRECTORY_SEPARATOR."case_".$caseid.DIRECTORY_SEPARATOR."ins_".$insid.DIRECTORY_SEPARATOR."task_".$taskid);
	}
	
	private function isExist($dirName){
		return (file_exists($dirName))?TRUE:FALSE;
	}
	function check_folder($case_id,$ins_id,$task_id){
		if($this->is_exist_case($case_id) == FALSE || $this->is_exist_instance($case_id,$ins_id) == FALSE
		 || $this->is_exist_task($task_id,$ins_id,$case_id) == FALSE){
			return FALSE;
		}
		return TRUE;
	}
	
	private function createFolder($dirName){
		if($this->isExist($dirName) && is_dir($dirName))return true;
		if(false == mkdir($dirName,0777)){
			log_message('error', "No permission to create a folder in ".$dirName);
			return false;
		}
		return true;
	}
/*
|--------------------------------------------------------------------------
| createFolder_?
|--------------------------------------------------------------------------
|
| 新建相应的目录或者文件
|
|	@access	public
|	@param	case_id、ins_id、task_id、filename
|			
|	@return TRUE or FALSE
|
|	注：需要在外部进行是否存在该folder，否则会发生错误
*/	
	function createFolder_case($case_id){
		return $this->createFolder( $this->upload_url.DIRECTORY_SEPARATOR."case_".$case_id);
	}

	function createFolder_ins($ins_id,$case_id){
		return $this->createFolder($this->upload_url.DIRECTORY_SEPARATOR."case_".$case_id.DIRECTORY_SEPARATOR."ins_".$ins_id);
/*		
		$name = "ins_".$ins_id;
		$case_name = "case_".$case_id;
		if(file_exists($this->upload_url.'/'.$case_name.'/'.$name) && is_dir($this->upload_url.'/'.$case_name.'/'.$name)){
			return true;
		}else{
			if(false == mkdir($this->upload_url.'/'.$case_name.'/'.$name,0777)){
				$this->deleteFolder_ins($ins_id,$case_id);
				return false;
			}
			return true;	
		}
		*/
	}
	
	private function createFolder_task($task_id,$ins_id,$case_id){
		return $this->createFolder($this->upload_url.DIRECTORY_SEPARATOR."case_".$case_id.DIRECTORY_SEPARATOR."ins_".$ins_id.DIRECTORY_SEPARATOR."task_".$task_id);
/*		$name = "task_".$task_id;
		$ins_name = "ins_".$ins_id;
		$case_name = "case_".$case_id;
		if(file_exists($this->upload_url.'/'.$case_name.'/'.$ins_name.'/'.$name) &&
		is_dir($this->upload_url.'/'.$case_name.'/'.$ins_name.'/'.$name)){
			return true;
		}
		else{
			if(false == mkdir($this->upload_url.'/'.$case_name.'/'.$ins_name.'/'.$name,0777)){
				$this->deleteFolder_task($task_id,$ins_id,$case_id);
				return false;
			}
			return true;
		}*/
	}
	
	
	
	private function deleteFolder_task($task_id,$ins_id,$case_id){
		if($this->is_exist_task($task_id,$ins_id,$case_id))
			return rmdir($this->upload_url.DIRECTORY_SEPARATOR.$case_name.DIRECTORY_SEPARATOR.$ins_name.DIRECTORY_SEPARATOR.$name);
		else return true;
	}
	
	function deleteFolder_ins($ins_id,$case_id){
		if($this->is_exist_instance($case_id,$ins_id)){
			$ins_name = "ins_".$ins_id;
			$case_name = "case_".$case_id;
			$dir = $this->upload_url.DIRECTORY_SEPARATOR.$case_name.DIRECTORY_SEPARATOR.$ins_name;
			if($handle = opendir($dir)){
				while(false !== ($file = readdir($handle))){
					if($file!='.' && $file !='..'){
						$fullpath = $dir.DIRECTORY_SEPARATOR.$file;
						if(is_dir($fullpath)){
							$task_id = explode('_',$file);
							if(false == $this->deleteFolder_task($task_id[1],$ins_id,$case_id)){
								return false;
							}
						}
					}
				}
				close($handle);
				return true;
			}
			else{
				echo "无法打开文件夹".$handle;
				return false;
			}
		}else{
			return true;
		}
	}
	
	function deleteFolder_case($case_id){
		if($this->is_exist_case($case_id)){
			$case_name = "case_".$case_id;
			$dir = $this->upload_url.DIRECTORY_SEPARATOR.$case_name;
			if($handle = opendir($dir)){
				while(false !== ($file = readdir($handle))){
					if($file !='.' && $file != '..'){
						$fullpath = $dir.DIRECTORY_SEPARATOR.$file;
						if(is_dir($fullpath)){
							$ins_id = explode('_',$file);
							if(false == $this->deleteFolder_ins($ins_id[1],$case_id)){
								return false;
							}
						}
					}
				}
				close($handle);
				return true;
			}	
			else{
				echo "无法打开文件夹".$handle;
				return false;
			}
		}
		else{
			return true;
		}
	}

	function fileExt($fileName){
		return substr(strrchr($fileName,'.'),1);
	}
	
	function checkFileName($fileName){
		if(!in_array(strtolower($this->fileExt($fileName)),$this->fileType)){
			return FALSE;
		}
		return TRUE;
	}
	
	function picExt($picName)
	{
		return substr(strrchr($picName,'.'),1);
	}
	
	function checkPicName($picName)
	{
		if(!in_array(strtolower($this->picExt($picName)),$this->picType)){
			return FALSE;
		}
		return TRUE;
	}
/*
|--------------------------------------------------------------------------
| 函数filetype
|--------------------------------------------------------------------------
| 功能：
| 返回现在所能够接受的文件类型
*/	
	function fileType(){
		return implode(',',$this->fileType);
	}
	
	function picType(){
		return implode(',',$this->picType);
	}

/*
|--------------------------------------------------------------------------
| 函数random_name
|--------------------------------------------------------------------------
| 功能：
| 生成随机文件名，以保证文件名不重名
|
| @param $length:文件名的长度
*/	
	private function randomName($length){
		$hash = 'CR-';
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$max = strlen($chars) -1;
		mt_srand((double)microtime() * 1000000);
		for($i = 0; $i < $length; $i++)
        {
                $hash .= $chars[mt_rand(0, $max)];
        }
        return $hash;
		
	}
/*
|--------------------------------------------------------------------------
| 函数movefile
|--------------------------------------------------------------------------
| 功能：
| 将文件移动到$upload_url目录下的指定case,instantce,task下.
| @param 
|	ins_id：指定的instance的ID的文件夹
|	task_id：指定的task的ID的文件夹
|	tmp_path：文件原来存放处
|	file_name:文件名
|
| 返回：
|	文件新的路径和文件名
*/
	function movefile($case_id,$ins_id,$task_id,$tmp_path,$file_name,$msg){	
		if($this->check_folder($case_id,$ins_id,$task_id) == FALSE){
			if(false == $this->createFolder_case($case_id)){
				$msg = "建立案例文件夹失败";
				return '-1';
			}
			if(false == $this->createFolder_ins($ins_id,$case_id)){
				$msg = "建立项目文件夹失败";
				return '-1';
			}
			if(false == $this->createFolder_task($task_id,$ins_id,$case_id)){
				$msg = "建立任务文件夹失败";
				return '-1';
			}
		}
		$new_path = $this->upload_url.DIRECTORY_SEPARATOR."case_".$case_id.DIRECTORY_SEPARATOR."ins_".$ins_id.DIRECTORY_SEPARATOR."task_".$task_id.DIRECTORY_SEPARATOR;
		do{
			$new_name = $this->randomName('20').'.'.$this->fileExt($file_name);
		}while(file_exists($new_path.$new_name));
		
		if(move_uploaded_file($tmp_path,$new_path.$new_name) == TRUE){
			return $new_path.$new_name;
		}
		else{
			$msg = "移动临时文件失败";
			return '-1';
		}
	}

	
/**
 * upload file, case ZIP file, task file or user portrait
 * @param string $path
 * @param int $type
 * @return array(
 * 			status: '0' stand for error and '1' stand for success
 * 			errorMessage: if STATUS == '0' then this include the messages
 * 			path:	new file entry;
 * 			fileName: the uploaded file name 
 * 			);
 */	
	function uploadFile($path,$type){
		$erroes=$_FILES['uploadFile']['error'];
		$return['status'] = '1';
		$return['errorMessage'] = '';
		if($erroes != '0'){
			switch($erroes){
			        case 1:
			        	$return['errorMessage'] = "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值.";
			        	break;
			        case 2:
			        	$return['errorMessage'] = "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值.";
			        	break;
			        case 3:
			        	$return['errorMessage'] = "文件只有部分被上传.";
			        	break;
			        case 4:
			        	$return['errorMessage'] = "没有文件被上传.";
			        	break;
			}
			$return['status'] = '0';
			return $return;
			exit;
		}
		$fileName = $_FILES['uploadFile']['name'];
		$fileSize = $_FILES['uploadFile']['size'];
		$tmpPath = $_FILES['uploadFile']['tmp_name'];
		$return['fileName'] = $fileName;
		switch($type){
			case CASEFILE:
			break;
			case REFERENCE:
				$return['fileName'] = $fileName;
			case TASKFILE:
				if(!$this->checkFileName($fileName)){
					$return['status'] = '0';
					$return['errorMessage'] = "您只能上传以下几类文件:<br/>".$this->fileType();
					// <br>换成<br/> 否则后面的类型显示不出来 modified by wmc 2010/06/23 
					break;
				}
				do{
					$newName = $this->randomName('20').'.'.$this->fileExt($fileName);
				}while(file_exists($path.$newName));
				if(move_uploaded_file($tmpPath,$path.DIRECTORY_SEPARATOR.$newName)){
					$return['path'] = $path.DIRECTORY_SEPARATOR.$newName;
				}else{ 
					$return['status'] = '0';
					$return['errorMessage'] = "移动临时文件失败";
				}
			break;
			case USERPORTRAIT:
				if (!$this->checkPicName($fileName)){
					$return['status'] = '0';
					$return['errorMessage'] = "您只能上传以下几类文件格式:<br>".$this->picType();
					break;
				}
				do{
					$newName = $this->randomName('10').'.'.$this->fileExt($fileName);
				}while(file_exists($path.$newName));
				if (move_uploaded_file($tmpPath,$path.$newName)){
					$return['path'] = $path.$newName;
				}else{
					$return['status'] = '0';
					$return['errorMessage'] = "移动临时文件失败";
				}
			break;
			default:
			break;
		}
		return $return;
	}

//upload file while all players are computers	
/**
 * 
 * @param $src	:source file , include file name
 * @param $dest	:destionation , exclude file name.
 * @return 0 or array('filename', 'path');
 */
	function uploadCopyFile($src,$dest){
		$fileName = basename($src);
		$destination = $dest.DIRECTORY_SEPARATOR.$fileName;
		if(!copy($src,$destination)){
			if(!file_exists($destination)){
				return 0;
			}else{
				$return['fileName'] = $fileName;
				$return['path'] = $destination;
				return $return;
			}
		}
	}
}