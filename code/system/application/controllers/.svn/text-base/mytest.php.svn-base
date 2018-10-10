<?php

class Mytest extends Controller {

	function Mytest()
	{
		parent::Controller();
		$this->load->helper('file');
		$this->load->model('sysmodel');
		$this->load->model('casemodel');
		$this->load->model('usermodel');
		$this->load->helper('download');
		$this->load->model('evaluationmodel');

	}

	function index()
	{
		$path = "/var/www/pbcls/system/application/uploads/DS_Project_1_Performance Measurement/docs/";
		
		$fileName = "testcases.txt";
		$data = file_get_contents($path.$fileName);
		if(empty($data)){
			echo "empty";
		}
		else print_r($data);
//		force_download($fileName,$data);

		////		echo "here";
		//		$backuppath = "./system/store/";
		//		if(!is_dir($backuppath)){
		//			echo "not dir";
		////			mkdir($backuppath);
		//		}
		//		$username = $this->db->username;
		//		$passwd = $this->db->password;
		//		$dbname = $this->db->database;
		//		$backupfile = $backuppath."/test.sql";
		//		$mysqldump = "/usr/bin/mysqldump";
		//		$cmd = "$mysqldump -u$username -p$passwd $dbname > $backupfile";
		//		exec($cmd,$output,$rc);
		//		echo $rc;

		//		echo exec(getcwd(),$output,$rc);
		//		$username = $this->db->username;
		//		$passwd = $this->db->password;
		//		$dbname = $this->db->database;
		//		echo $username;
		//		echo $passwd;
		//		echo $dbname;

		//		$filename = "test.sql";
		//		$rc = $this->sysmodel->DBBackup($filename);
		//		echo $rc;
		//
		//		$rc = $this->sysmodel->select();
		//		print_r($rc);

		//		$this->sysmodel->DBbackuptest();
		//		echo($this->sysmodel->DBbackup($filename));
		//		$userid = 6;
		//		$data = $this->usermodel->getPlayingInstances($userid);
		//		print_r($data);
		//		$this->evaluationmodel->deleteTestData();
		//		$this->db->where('userid',6);
		//		$this->db->where('instanceid',2);
		//		$this->db->where('taskid',1);
		//		$result = $this->db->get('evaluation_member')->row_array();

		//		$instanceid = 2;
		//		$taskid = 1;
		//		$userid = 3;
		//		$data = $this->evaluationmodel->getTeamMember($instanceid);
		//        $caseid = 12;
		//        $data = $this->evaluationmodel->getMilestone($caseid);
		////		echo $data;
		//		print_r($data);

		//		 if(!$this->evaluationmodel->managerEvaluateMember($userdata,$taskid,$userid,$instanceid))
		//		  {
		//		      echo "<script>alert('error!');location.href='javascript:history.back()';</script>";
		//		  }
		//		  else
		//		  {
		//		      echo "<script>alert('successful!');location.href='javascript:history.back()';</script>";
		//		  }
		//		echo "here";
		//	    $backfile= "system/store/"."20100120-102136.sql";
		////	    $data['result'] = get_dir_file_info("system/store/");
		////	    print_r($data['result']);
		//        $length = filesize($backfile);
		////        echo $length;
		//        $file= fopen($backfile,"r");
		//        $contents = fread($file,$length);
		//        fclose($file);
		//        $lines = explode(";",$contents);
		//        $count = 0;
		//        foreach ($lines as $line)
		//        {
		//        	$tmp = trim($line);
		//        	if($tmp != ''){
		//	        	$sql = $tmp.';';
		///*	        	echo $sql;
		//	        	echo "<br/><br/><br/>";
		//	        	$sql = '';
		//        		*/
		//	        	if($this->db->query($sql))
		//	        	{
		//	        		$count++;
		//	        		echo "$count:$sql query OK<br/>";
		//	        	}else{
		//	        		echo "$count:$sql query error<br/>";
		//	        	}
		//        	}
		//
		//        }
		//          $filename= "system/store/1.gz";
		//          $zp   =   gzopen($filename,   "w9");    //   open   file   for   writing   with   maximum   compression
		//          $s   =   "Only   a   test,   test!\n";
		//          gzwrite($zp,   $s);                     //   write   string   to   file
		//          gzclose($zp);                           //   close   file
		 
		 
		//            $data['result'] = get_dir_file_info("system/store/");
		//            print_r($data['result']);


		//		    $filenamepath= "system/store/".$filename;
		//                        $zp   =   gzopen($filenamepath,   "w9");    //   open   file   for   writing   with   maximum   compression
		//                        $string = read_file($path);
		//                        gzwrite($zp,   $sting);                     //   write   string   to   file
		//                        gzclose($zp);
		//	    $filename = "system/store/20100121-081232.sql.gzip";
		//	    $zip = new ZipArchive;
		//        $res = $zip->open($filename);      //打开zip文档
		//        if ($res === TRUE)
		//        {
		//            $zip->extractTo("system/store/temp/");    //将zip文档解压到“system/store/temp”文件夹下
		//            $zip->close();
		//            return 1;
		//
		//        }
		//        else {
		//            return 0;
		//        }
		//   open   file   for   reading
		//        $filepath= "/system/application/";

		//        $user_name = $this->session->userdata('user_name');
		//		$instancename = $this->session->userdata('instancename');
		//         print_r($_POST);
		//        $instancename = "testinstance";
		//        $userdata = array(
		//		    'instancename' => $instancename,
		//		    'taskid' => $_POST['taskid'],
		//		    'userid' => $_POST['userid'],
		//		    'self_attitude' => $_POST['status'],
		//		    'self_technique' => $_POST['technique'],
		//		    'self_communication' => $_POST['communication'],
		//		    'self_cooperation' => $_POST['cooperation'],
		//		    'self_achievement' => $_POST['achievement'],
		//		    'self_mark' => $_POST['evaluation'],
		//		    'self_expectation' => $_POST['expectation']
		//		    );
		//          $this->evaluationmodel->addevaluation($userdata);
		//            $userid = "3";
		//            $time = $this->evaluationmodel->getsystemonlinetime($userid);
		//            echo $time;
		//        $logintime= $this->session->userdata('logintime');  //取得登录时记录的登陆时间戳
		//		$tm1 = date('y-m-d h:i:s',$logintime);              //把登陆时间戳转换成标准日期
		//		$tm2 = date('y-m-d h:i:s',time());                  //把推出登陆时的时间戳转换成标准日期
		//		$time1 = strtotime($tm1);
		//		$time2 = strtotime($tm2);
		//		$durationtime = $time2 - $time1;         //取得登陆后退出时之间的时间差		
		//        $id = "2";
		//        $sql = "SELECT role, username
		//        FROM instance_role,roles,users
		//            where instance_role.instanceid = $id
		//            and instance_role.roleid= roles.roleid
		//            and instance_role.actorid=users.uid
		//        ";
		//        $result= $this->db->query($sql)->result_array();
		//
		//		$this->db->select('actorid');
		//		$this->db->where('instanceid',$id);
		//		$result = $this->db->get('instance_role')->result_array();
		//		$actorid = $result['0']['actorid'];
		//		echo $actorid;
		//		print_r($result);
		//		foreach ($result as $row)
		//		{
		////			$data['$i++']= $row['actorid'];
		//            echo $row['actorid']."<br>";
		//		}
		//		print_r($data['1']);

		//            $std = "20000000";
		//             $time = "1200000095";
		////             $ym = time();
		//            echo timespan($time,$std)."<br>";
		//            echo $std."<br>";
		//            echo $time;
		//              $time1= "1264774136";
		//              $ym= date('y-m-d h:i:s',time());
		//              $tm =date('y-m-d h:i:s',$time1);
		//              $str1= strtotime($ym);
		//              $str2= strtotime($tm);
		//              $sub= $str1 - $str2;
		//
		//              echo $sub;
		////
		//              $post_date = '1079621429';
		//              $now = time();
		//              echo timespan($post_date, $now);
		//             $now = time();
		////             $t=$now -$time;
		//             $ymd =timespan($time, $now);

		//        redirect('evaluation');


		//  print_r($result);



		//   read   3   char
		//  echo   gzread($zp,   3);

		//   output   until   end   of   the   file   and   close   it.
		//  gzpassthru($zp);
		//  gzclose($zp);





	}

	/**
	 * 功能：压缩一个文件
	 */

	function zipfile()
	{
		$this->load->library('zip');       //引入ZIP类;
		$file= "system/store/20100120-102136.sql";
		$this->zip->read_file($file);       //读取一个已经存在的文档
		//		$this->zip->download('my_backup.zip'); //下载到桌面上
		$this->zip->archive('system/store/my_backup.zip'); //将文档压缩在某个地址
	}

	/**
	 * 功能：备份功能
	 */

	function dbbackup_action()
	{
		if($_POST)
		{
			$operate = $_POST['operate'];
			$mycheck = $_POST['mycheck'];
			$this->db_backupOpType($mycheck,$operate);
			redirect("admin/sysadmin/db_backup");
		}
	}

	private function db_backupOpType($type,$op)
	{
		$ym=date('Ym',time());                          //取得年月时间，做为contents目录下的年月目录名                     
		$d=date('d',time());                            //取得具体的天数，做为年月目录下某天日志的名称的前一部分
		$time=date('His',time());                       //取得分秒时，做为年月目录下某天日志的名称的后一部分
		$name=$ym.$d.'-'.$time.".sql";                  //取得文件名
		switch($type){
			case 1:                                     //文件类型是Gzip格式的
				$filename= $name.".gzip";
				switch ($op)
				{
					case 1:
						break;
					case 2:
						break;
					case 3:
						break;
				}
				break;
			case 2:
				$filename= $name.".zip";                //文件类型是Zip格式的   
				switch ($op)
				{
					case 1:
						$this->sysmodel->DBBackup();



						break;
					case 2:
						break;
					case 3:
						break;
				}
				break;
			case 3:                            //文件类型是Text格式的
				switch ($op)
				{
					case 1:
						break;
					case 2:
						break;
					case 3:
						break;
				}
				break;
		}
	}



























}
