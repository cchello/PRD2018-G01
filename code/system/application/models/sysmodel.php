<?php
Class Sysmodel extends Model
{
	private $mysql_path;
	private $mysql;
	private $mysqldump;
    private $backup_path;
    private $bakupfile;
    private $username = "root";
    private $passwd = "admin";
    private $dbname = "pbcls";
    
	function Sysmodel()
	{
		parent::Model();
		$this->mysql_path = "d:\\xampp\\mysql";
		$this->mysql = $this->mysql_path."\\bin\\mysql";
		$this->mysqldump = $this->mysql_path."\\bin\\mysqldump";
		$this->backup_path = getcwd()."\\system\\store";
	}
// ----------------------------------------------------------------------
// Modified by wmc 2010/06/18	
// following DBBackup 函数适用于在windows系统中使用	
	//return 0 means exec backup db success!
//	function DBBackup($filename)
//	{
//		$username = "root";
//		$passwd = "admin";
//		$dbname = "pbcls";
//        $backupfile = $this->backup_path."\\".$filename;
//		$cmd = "$this->mysqldump -u$username -p$passwd $dbname > $backupfile";
//		exec($cmd,$output,$rc);
//		return $rc;
//	}
//---------------------------------------------------------------------
//  following DBBackup函数适用于在Linux系统中使用，注意要使/store/文件夹具有写权限	

	//return 0 means exec backup db success!
/**
 * 此函数用于备份数据库
 * @param $filename
 */
	function DBBackup($filename){
		$backuppath = getcwd()."/system/store/";
		if(!is_dir($backuppath)){
			mkdir($backuppath);
		}
		$username = $this->db->username;
		$passwd = $this->db->password;
		$dbname = $this->db->database;
		$backupfile = $backuppath."/".$filename;
		$mysqldump = "/usr/bin/mysqldump";
		$cmd = "$mysqldump -u$username -p$passwd $dbname > $backupfile";
		exec($cmd,$output,$rc);
		return $rc;
	}
// ----------------------------------------------------------------------	
/**
 * 此函数用于恢复数据库,适用于在Linux系统中使用 wmc 2010/06/18
 * @param unknown_type $backfile
 */	
	function DBRestore($backfile) //ruturn 0 means restore is success.
	{
		$username = $this->db->username;
		$passwd = $this->db->password;
		$dbname = $this->db->database;		
		$mysql = "/usr/bin/mysql";
		$cmd = 	"$mysql -u$username -p$passwd $dbname < $backfile";
		exec($cmd,$output,$rc);
		return $rc;
	}
	

}