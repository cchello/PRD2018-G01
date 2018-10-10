<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pbcls_Zip
{
	function Pbcls_Zip(){
	
	}
	

	function unzip($zipfile)
	{
	
		$zipfile = str_replace("\\", "/", $zipfile); 
//		if(mb_detect_encoding($zipfile) != 'GBK')
//			$zipfile= iconv('UTF-8','GBK',$zipfile); 
//		$zipfile= iconv('UTF-8','GBK',$zipfile);
		$path = dirname($zipfile);
//		$path = dirname($zipfile).basename($zipfile,'.zip');
//		die(basename($zipfile,'.zip'));
//		mkdir("$path") or die("Mkdir $path failed!!!");
		$zip = zip_open($zipfile);
		
		if(!preg_match('/#/',"$zip"))
			die("cann't open $zipfile!");
		$dirpatten = "/\/$/";
		while($zip_entry = zip_read($zip))
		{
			$file = zip_entry_name($zip_entry);

			if(mb_detect_encoding($file) != 'UTF-8')
				$file= iconv('GBK','UTF-8',$file); 
			if(preg_match($dirpatten, $file))
			{
				$file = substr($file, 0, strlen($file) - 1);
				if(file_exists("$path/$file"))
				{
					$this->deldir("$path/$file");
				}
				mkdir("$path/$file") or die("Mkdir failed!!!");
			}
			else
			{			
				if(zip_entry_open($zip, $zip_entry, "r"))
				{
					$buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
					zip_entry_close($zip_entry);
				}
				$fp = fopen("$path/$file", "w");
				fwrite($fp, $buf);
				fclose($fp);
			}
		}
	}
	
	function getPbcoPath($zipfile){
		$zipfile = str_replace("\\", "/", $zipfile); 
//		if(mb_detect_encoding($zipfile) != 'GBK')
//			$zipfile= iconv('UTF-8','GBK',$zipfile); 
		$path = dirname($zipfile);
		$zip = zip_open($zipfile);
		if(!preg_match('/#/',"$zip"))
			die("cann't open $zipfile!");

		$pbcopatten = "/pbco.xml/";
		
		while($zip_entry = zip_read($zip))
		{
			$file = zip_entry_name($zip_entry);
			if(mb_detect_encoding($file) != "UTF-8")
				$file= iconv('GBK','UTF-8',$file);
			if(preg_match($pbcopatten, $file))		
				return "$path/$file";
		}
		die("pbco.xml not found!");
	}
	
	function getXsdPath($zipfile){
		$zipfile = str_replace("\\", "/", $zipfile); 
//		if(mb_detect_encoding($zipfile) != 'GBK')
//			$zipfile= iconv('UTF-8','GBK',$zipfile); 
		$path = dirname($zipfile);
		$zip = zip_open($zipfile);
		if(!preg_match('/#/',"$zip"))
			die("cann't open $zipfile!");

		$xsdpatten = "/.xsd$/";
		
		while($zip_entry = zip_read($zip))
		{
			$file = zip_entry_name($zip_entry);
			if(mb_detect_encoding($file) != "UTF-8")
				$file= iconv('GBK','UTF-8',$file);
			if(preg_match($xsdpatten, $file))		
				return "$path/$file";
		}
		return "pbco.xsd not found!";
	}
/*

	function unzip($zipfile){
		$zip = new ZipArchive();   
		$rs = $zip->open($zipfile);
		if($rs){   
		    $fd=explode(".",basename($zipfile));   
		    $zip->extractTo(dirname($zipfile).'/'.$fd[0]);   
		    $zip->close();   
		}
	}	
*/
	function deldir($dir) {		
	  $dh=opendir($dir);
	  while ($file=readdir($dh)) {
	    if($file!="." && $file!="..") {
	      $fullpath=$dir."/".$file;
	      if(!is_dir($fullpath)) {
	          unlink($fullpath);
	      } else {
	          $this->deldir($fullpath);
	      }
	    }
	  }
	  closedir($dh);  
	  if(rmdir($dir)) {
	    return true;
	  } else {
	    return false;
	  }
	}
}