<?php
define("STANDARD",'standard');
//Test by Xupengfey at 2009-10-2 14:40
class Foldermodel extends Model
{
	private	$uploadUrl;
	function Foldermodel()
	{
		parent::Model();
		$this->load->model('xmlmodel');
		$this->uploadUrl = ".".DIRECTORY_SEPARATOR."system".DIRECTORY_SEPARATOR."application".DIRECTORY_SEPARATOR."uploadedfile";
	}
	
	function getUploadUrl(){
		return $this->uploadUrl;
	}

	function moveCaseFolder($file,$caseId){

		$targeFolder = $this->upload_url.DIRECTORY_SEPARATOR."case_".$caseId.DIRECTORY_SEPARATOR.STANDARD;
		if(!$this->createFolder($targeFolder))return false;

		$dirFrom = dirname($file).DIRECTORY_SEPARATOR.basename($file, ".zip");
		//		log_message("debug",$dirFrom);
		if(!$this->copyDir($dirFrom,$targeFolder))return false;
		if(!$this->removeDir($dirFrom))return false;
		return true;
	}

/**
 * copy a directory from source to destination
 * @param dir $source
 * @param dir $dest
 * @return true or false
 */
	function copyDir($source, $dest){
		// Simple copy for a file
		if (is_file($source)) {
			$c = copy($source, $dest);
			chmod($dest, 0777);
			return $c;
		}
		// Make destination directory
		if (!is_dir($dest)) {
			$oldumask = umask(0);
			mkdir($dest, 0777);
			umask($oldumask);
		}
		// Loop through the folder
		$dir = dir($source);
		while (false !== $entry = $dir->read()) {
			// Skip pointers
			if ($entry == "." || $entry == "..") {
				continue;
			}
			// Deep copy directories
			if ($dest !== "$source/$entry") {
				$this->copyDir("$source/$entry", "$dest/$entry");
			}
		}
		// Clean up
		$dir->close();
		return true;
	}

/**
 * delete a dir
 * @param dir $dirName
 * @return true or false
 */
	function removeDir($dirName){
		if(!is_dir($dirName)){
			//			log_message('error', "DIR name error".$dirName);
		}
		$handle = opendir($dirName);
		while(($file = readdir($handle)) !== false){
			if($file != '.' && $file != '..'){
				$dir = $dirName . DIRECTORY_SEPARATOR . $file;
				is_dir($dir)?removeDir($dir):unlink($dir);
			}
		}
		closedir($handle);
		return rmdir($dirName)?true:false;
	}
	
/**
 * folder operator
 * @param $path
 * @return unknown_type
 */	
	function checkFolder($path){
		return (file_exists($path) && is_dir($path))?TRUE:FALSE;
	}	
	
	function createFolder($dirName){
		if(file_exists($dirName) && is_dir($dirName))return true;
		if(!mkdir($dirName,0777)){
//			log_message('error', "No permission to create a folder in ".$dirName);
			return false;
		}
		return true;
	}

/**
 * Case folder operator
 * @param int $caseId
 * @return true or false
 */
	function checkCaseFolder($caseId){
		$path = $this->uploadUrl.DIRECTORY_SEPARATOR."case_".$caseId;
		return $this->checkFolder($path);
	}
	
	function createCaseFolder($caseId){
		$path = $this->uploadUrl.DIRECTORY_SEPARATOR."case_".$caseId;
		return $this->createFolder($path);
	}

/** 
 * Ins Folder operator
 * @param int $caseId
 * @param int $insId
 * @return true or false
 */
	function checkInsFolder($caseId,$insId){
		$path = $this->uploadUrl.DIRECTORY_SEPARATOR."case_".$caseId.DIRECTORY_SEPARATOR."ins_".$insId;
		return $this->checkFolder($path);
	}
	
	function createInsFolder($caseId,$insId){
		$path = $this->uploadUrl.DIRECTORY_SEPARATOR."case_".$caseId.DIRECTORY_SEPARATOR."ins_".$insId;
		return $this->createFolder($path);
	}

/**
 * task Folder operator
 * @param int $caseID
 * @param int $insId
 * @param int $taskId
 * @return true or false
 */
	function checkTaskFolder($caseId,$insId,$taskId){
		$path = $this->uploadUrl.DIRECTORY_SEPARATOR."case_".$caseId.DIRECTORY_SEPARATOR."ins_".$insId.DIRECTORY_SEPARATOR."task_".$taskId;
		return $this->checkFolder($path);
	}
	
	function createTaskFolder($caseId,$insId,$taskId){
		$path = $this->uploadUrl.DIRECTORY_SEPARATOR."case_".$caseId.DIRECTORY_SEPARATOR."ins_".$insId.DIRECTORY_SEPARATOR."task_".$taskId;
		return $this->createFolder($path);
	}

/**
 * reference folder
 * @param $caseId
 * @return unknown_type
 */	
	function checkRefFolder($caseId){
		$path = $this->uploadUrl.DIRECTORY_SEPARATOR."case_".$caseId.DIRECTORY_SEPARATOR."reference";
		return $this->checkFolder($path);
	}
	
	function createRefFolder($caseId){
		$path = $this->uploadUrl.DIRECTORY_SEPARATOR."case_".$caseId.DIRECTORY_SEPARATOR."reference";
		return $this->createFolder($path);
	}
	
	function projectFolderFactory($caseId,$insId = '0',$taskId = '0'){
		if($insId == '0' && $taskId == '0')return $this->uploadUrl.DIRECTORY_SEPARATOR."case_".$caseId;
		else{
			if($taskId == '0')return $this->uploadUrl.DIRECTORY_SEPARATOR."case_".$caseId.DIRECTORY_SEPARATOR."ins_".$insId;
			else return $this->uploadUrl.DIRECTORY_SEPARATOR."case_".$caseId.DIRECTORY_SEPARATOR."ins_".$insId.DIRECTORY_SEPARATOR."task_".$taskId;
		}
	}
}