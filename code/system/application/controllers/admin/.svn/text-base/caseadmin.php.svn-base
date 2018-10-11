<?php
Class Caseadmin extends Controller
{
	function Caseadmin()
	{
		parent::Controller();
		$this->load->model('casemodel');
		$this->load->library('pagination');  //载入 分页类
	}
	
	function index2()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/home/notLogin');
//         echo "here";
	     $config['base_url'] = 'http://10.214.29.112:8080/index.php/admin/caseadmin/index'; //设置基本的分页url地址
         $total = $config['total_rows'] = $this->casemodel->getTotalCaseNo();  //取得总数
         $per = $config['per_page'] = '7'; //每页的个数


         $offset = $this->uri->segment(4); //取得地址栏的 第3个参数

//         if($offset>=$total||$offset<0){
//           show_404();  //比较 offset 和 total  这样可以避免 缓存的漏洞  但不能根治所有
//         }

         $this->pagination->initialize($config);  //载入分页的设置

     	 $data = array(); //定义data 数组 为了 传数组
     	 $data['records'] = $this->casemodel->getPerDataFromCases($per,$offset); // 得到Cases的记录

         
			
//		$data['records'] = $this->casemodel->getAllCases();
		$this->load->view('admin/case_list', $data); 
	}
	
	function index(){
		if($this->session->userdata('user_gid') !== '0')
			redirect('/home/notLogin');
		$data['records'] = $this->casemodel->getAllCases();
		$this->load->view('admin/case_list', $data);
	}
	
	function casesearch()
	{
		if($this->session->userdata('user_gid') !== '0')
		   redirect('/home/notLogin');
		$this->load->view('admin/case_search');
	}
	
	function complexsearch()   //复杂查找
	{
		if($this->session->userdata('user_gid') !== '0')
		   redirect('/home/notLogin');
		if($_POST)
		{
			if($_POST['searchtype']=='simple')
			   $this->load->view('admin/case_search');
			else $this->load->view('admin/case_complexsearch');
			   
		}
	}
	
	function comsearchresult()  //复杂查找的结果列表
	{
		if($this->session->userdata('user_gid') !== '0')
		   redirect('/home/notLogin');
		if(!empty($_POST))
        {
        	$array = $_POST;
        	$data['records'] = $this->casemodel->comsearch($array);
        	$this->load->view('admin/case_comsearchresult',$data);
        }
        
        else $this->load->view('admin/case_complexsearch');
		 
		
	}
	
	function casesearchinfo()
	{
		$id = $this->uri->segment(4);
		$data['records'] = $this->casemodel->getCaseById($id);
		$this->load->view('admin/case_info',$data);
       
	}
	
	function caseinfo()          //单个案例的详细信息
	{
		if($this->session->userdata('user_gid') !== '0')
		{
			redirect('/home/notLogin');
		}
		$id = $this->uri->segment(4);
		if($id !== false)  //显示通过caselist链接得到的case信息
		{
			$data['records'] = $this->casemodel->getCaseById($id);
		    $this->load->view('admin/case_info',$data);
		}   
		
		else   //显示通过casesearch搜素得到的case信息
		{
		  if($_POST['casename'] !== '')
		  {
			$casename=$_POST['casename'];
			if($this->casemodel->getCaseByName($casename) !== false)
			{
				$data['records']=$this->casemodel->getCaseByName($casename);
		        $this->load->view('admin/case_info',$data);
			}
		    else 
		    {
		    	echo "<script>alert('Wrong name !');location.href='javascript:history.back()';</script>";
		    }
		  }
		  else 
		  {
			echo "<script>alert('Pls input case name !');location.href='javascript:history.back()';</script>";
		  }
		}
	}
	
	function updatecase()
	{
		if($this->session->userdata('user_gid') !== '0')
		   redirect('/home/notLogin');
		   
		if($_POST)
		{
			$id=$_POST['caseid'];
			$array = array('uid' => $_POST['caseid'], 'casename' => $_POST['casename'],
			 'casetype' => $_POST['casetype'], 'author' => $_POST['author'],
			'version' => $_POST['version'], 'uploader' => $_POST['uploader'],
			'uploadtime' => $_POST['uploadtime'], 'status' => $_POST['casestatus'],
			'instances' => $_POST['instanceno'], 'description' => $_POST['description'],
			);
            $this->casemodel->updateCase($array);
			$data['records'] = $this->casemodel->getCaseById($id);
		    $this->load->view('admin/case_info',$data);			
		}   
		
	}
	
	function caselist()
	{
		if($this->session->userdata('user_gid') !== '0')
		   redirect('/home/notLogin');
		$data['records'] = $this->casemodel->getAllCases();
		$this->load->view('admin/case_list', $data);
	}
	
	function inactivecase()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/home/notLogin');
		$data['records']= $this->casemodel->getAllInactiveCases();
		$this->load->view('admin/case_inactivelist',$data);
	}
	
	function instanceadmin(){
		if($this->session->userdata('user_gid') !== '0')
			redirect('/home/notLogin');	
		$data['records']= $this->casemodel->getAllInstance();
		$this->load->view('admin/case_instancelist',$data);
	}
	
	function deleteInstance(){
		if($this->session->userdata('user_gid') !== '0')
			redirect('/home/notLogin');
		$instanceid = $this->uri->segment(4);	
		$this->casemodel->deleteInstance($instanceid);
		redirect('admin/caseadmin/instanceadmin');
	}
	
	function activestatus()
	{
		
		if($this->session->userdata('user_gid') !== '0')
			redirect('/home/notLogin');
		$id = $this->uri->segment(4);	
		$record = $this->casemodel->getCaseById($id);
		$record['status'] = !$record['status'];
		$this->casemodel->updateCase($record);
		redirect('admin/caseadmin/inactivecase');
	}
	
	function prunecase()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/home/notLogin');
		$data['records']= $this->casemodel->getAllCases();
		$this->load->view('admin/case_prune',$data);
	}
	
	function prune()
	{
	    if($this->session->userdata('user_gid') !== '0')
			redirect('/home/notLogin');
//
//		if(!($_POST['casename'] == '' && $_POST['uploader'] == '' && 
//		   $_POST['author'] == '' && $_POST['useno'] == '' && $_POST['uploadtime'] == ''))
		
        if(isset($_POST['operation']))
		{
			$array = $_POST ;
			$data = $this->casemodel->pruneCase($array);	
			$this->load->view('admin/case_prune');
		}
		else 
		{
			$this->load->view('admin/case_prune');
			
		}
	}
	
	function uploadcase()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/home/notLogin');
		$this->load->view('admin/case_upload');
	}
	
	
function do_upload()
	{
		header("Content-Type: text/xml");	
		$this->load->model('xmlmodel');
		if(!isset($_FILES['myfile']['name'])){
			echo $this->xmlmodel->xmlError();
			die();
		}
		if(mb_detect_encoding($_FILES['myfile']['name']) != 'GBK')
			$_FILES['myfile']['name']= iconv('UTF-8','GBK',$_FILES['myfile']['name']);
		$this->load->library('pbcls_zip');
		$this->load->library('pbcoparse');
		$this->load->model('foldermodel');
		
		$uploaddir = './system/application/uploads/';
		$uploadfile = $uploaddir.basename($_FILES['myfile']['name']);
		
		if(!preg_match("/\.zip$/", $uploadfile)){ //judge whether it is a zip file
			echo $this->xmlmodel->returnXmlFactory('-1',"案例文件必须为ZIP格式");
			die();
		}

		if(move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile) != TRUE){
			echo $this->xmlmodel->returnXmlFactory('-1',"移动案例文件失败");
			die();
		}
		
		$this->pbcls_zip->unzip($uploadfile);	//need check function
		
		$pbcofile=$this->pbcls_zip->getPbcoPath($uploadfile);
		
		$xsdfile=$this->pbcls_zip->getXsdpath($uploadfile);

		if(preg_match("/found/", $xsdfile))
			$xsdfile="";
			
/*		if($this->pbcoparse->xmlTest($pbcofile,$msg,$xsdpath) != TRUE){
			echo $msg;
			die();
		}*/
		
		log_message("debug","case xml test successed!");

		if($this->casemodel->addCase($uploadfile, $msg1) != TRUE){
			echo $msg1;
			die();
		}
		
		log_message("debug","case added into database");
		$caseId = $msg1['caseId'];	
		$dirFrom = $msg1['path'];
//		$dirFrom = dirname($uploadfile).DIRECTORY_SEPARATOR.basename($uploadfile, ".zip").DIRECTORY_SEPARATOR;	
		$upload_url = "./system/application/uploadedfile";
		$targeFolder = $upload_url.DIRECTORY_SEPARATOR."case_".$caseId.DIRECTORY_SEPARATOR."standard".DIRECTORY_SEPARATOR;

		
		if(!$this->foldermodel->createFolder($targeFolder)){
			echo $this->xmlmodel->returnXmlFactory('-1',"can't create case folder");
			die();
		}

		log_message("debug","case merge folder created");
		if(!$this->foldermodel->copyDir($dirFrom,$targeFolder)){
			echo $this->xmlmodel->returnXmlFactory('-1',"can't move files ");
			die();
		}
		log_message("debug","case merged successed!");
		echo $this->xmlmodel->returnXmlFactory('1',"上传成功");
	}
	
	function action()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/home/notLogin');
		if(isset($_REQUEST['do']))
		{
			
			$id = $_REQUEST['id'];
			if($_REQUEST['do'] == 'changecasetype')
			{
				$this->changeCasetype($id);
			}
				
			elseif($_REQUEST['do'] == 'changestatus')
			{
				$this->changeStatus($id);
			}
				
			elseif($_REQUEST['do'] == 'delete')
			{
				$this->casemodel->deleteCase($id);
			}
			redirect('admin/caseadmin')	;						
		}
		if($_POST)
		{
	   		$ids = preg_split('/\,/', $_POST['checkboxs']);
	   		if($_POST['operation'])
	   		{
	   			if($_POST['operation'] == 'active')
	   			{
	   				foreach ($ids as $key => $value);
	   				$this->casemodel->activeCase($value);
	   			}
	   			elseif($_POST['operation'] == 'deactive')
	   			{
	   				foreach($ids as $key => $value)
					$this->casemodel->deactiveCase($value);
	   			}
	   			elseif($_POST['operation'] == 'delete')
	   			{
	   				foreach($ids as $key => $value)
					$this->casemodel->deleteCase($value);	
	   			}
	   			redirect('admin/caseadmin');
	   		}
	   		
		    if($_POST['sort'])
	   		{
	   			if($_POST['sort'] == 'casename')
	   			{
	   				$data['records']=$this->casemodel->getAllcasebycasename();
	   				$this->load->view('admin/case_list',$data);
	   			}
	   			elseif($_POST['sort'] == 'author')
	   			{	   				
	   				$data['records']=$this->casemodel->getAllcasebyauthor();
	   				$this->load->view('admin/case_list',$data);
	   			}
	   			elseif($_POST['sort'] == 'uploadtime')
	   			{
	   				$data['records']=$this->casemodel->getAllcasebyuploadtime();
	   				$this->load->view('admin/case_list',$data);
	   			}
	   		    elseif($_POST['sort'] == 'casetype')
	   			{
	   				$data['records']=$this->casemodel->getAllcasebycasetype();
	   				$this->load->view('admin/case_list',$data);	
	   			}
	   		    elseif($_POST['sort'] == 'status')
	   			{
	   				$data['records']=$this->casemodel->getAllcasebystatus();
	   				$this->load->view('admin/case_list',$data);
	   			}
	   		}
		
		}
		//redirect('admin/caseadmin/caselist');

	}

	private function changeCasetype($id)
	{
		$record = $this->casemodel->getCaseById($id);
		$record['casetype'] = !$record['casetype'];
		$this->casemodel->updateCase($record);
	}
	
	private function changeStatus($id)
	{
		$record = $this->casemodel->getCaseById($id);
		$record['status'] = !$record['status'];
		$this->casemodel->updateCase($record);
	}
	function changStatus($id)
	{
		
		$record = $this->casemodel->getCaseById($id);
		$record['status'] = !$record['status'];
		$this->casemodel->updateCase($record);
		redirect('admin/inactivecase');
		
	}
	
//--------------------------------------------------
   //wmc 2010/02/28	
	function instanceAction(){
	    if($this->session->userdata('user_gid') !== '0')
			redirect('/home/notLogin');
		if($_POST)
		{
	   		$ids = preg_split('/\,/', $_POST['checkboxs']);
	   		if($_POST['operation'])
	   		{	   
	   			if($_POST['operation'] == 'delete')
	   			{
	   				foreach($ids as $key => $value)
					$this->casemodel->deleteInstance($value);	
	   			}
	   			redirect('admin/caseadmin/instanceadmin');
	   		}
	   		
		    if($_POST['sort'])
	   		{
	   			if($_POST['sort'] == 'instancename')
	   			{
	   				$data['records']=$this->casemodel->getAllInstanceOrderByInstanceName();
	   				$this->load->view('admin/case_instancelist',$data);
	   			}
	   			elseif($_POST['sort'] == 'casename')
	   			{	   				
	   				$data['records']=$this->casemodel->getAllInstanceOrderByCaseName();
	   				$this->load->view('admin/case_instancelist',$data);
	   			}
	   			elseif($_POST['sort'] == 'username')
	   			{
	   				$data['records']=$this->casemodel->getAllInstanceOrderByUserName();
	   				$this->load->view('admin/case_instancelist',$data);
	   			}
	   		    elseif($_POST['sort'] == 'creationtime')
	   			{
	   				$data['records']=$this->casemodel->getAllInstanceOrderByCreationTime();
	   				$this->load->view('admin/case_instancelist',$data);	
	   			}
	   		    elseif($_POST['sort'] == 'status')
	   			{
	   				$data['records']=$this->casemodel->getAllInstanceOrderByStatus();
	   				$this->load->view('admin/case_instancelist',$data);
	   			}
	   		    elseif($_POST['sort'] == 'isstarted')
	   			{
	   				$data['records']=$this->casemodel->getAllInstanceOrderByIsStarted();
	   				$this->load->view('admin/case_instancelist',$data);
	   			}
	   		    elseif($_POST['sort'] == 'isfinished')
	   			{
	   				$data['records']=$this->casemodel->getAllInstanceOrderByIsFinished();
	   				$this->load->view('admin/case_instancelist',$data);
	   			}
	   		}
		
		}
	}
	
	function instanceSearch(){
		if($this->session->userdata('user_gid') !== '0')
		   redirect('/home/notLogin');
		$this->load->view('admin/case_instance_search');
	}

	function instanceComplexSearch()   //复杂查找
	{
		if($this->session->userdata('user_gid') !== '0')
		   redirect('/home/notLogin');
		if($_POST)
		{
			if($_POST['searchtype']=='simple')
			   $this->load->view('admin/case_instance_search');
			else $this->load->view('admin/case_instance_comSearch');
			   
		}
	}
	
	function instanceSimSearchResult(){
		if($this->session->userdata('user_gid') !== '0')
		   redirect('/home/notLogin');
		if(!empty($_POST['instancename'])){
			$name = $_POST['instancename'];
			$data['name'] = $name;
        	$data['records'] = $this->casemodel->getInstanceLikeInstanceName($name);
        	if(empty($data['records'])){
        		echo "<script>alert('The name is wrong !');location.href='javascript:history.back()';</script>";
        	}        	
        	$this->load->view('admin/case_instance_simSearchResult',$data);
		}
        else {
        	echo "<script>alert('Pls input instance name !');location.href='javascript:history.back()';</script>";
        }
	}
	
	function instanceComsearchResult()  //复杂查找的结果列表
	{
		if($this->session->userdata('user_gid') !== '0')
		   redirect('/home/notLogin');
		if(!empty($_POST))
        {
        	$array = $_POST;
        	$data['records'] = $this->casemodel->instanceComSearch($array);
//        	if(empty($data['records'])){
//        		echo "<script>alert('There is no related data !');location.href='javascript:history.back()';</script>";
//        	}
//        	print_r($data['records']);                                                               
//        	die();
        	$this->load->view('admin/case_instance_comSearchResult',$data);
        }
        
        else $this->load->view('admin/case_instance_complexsearch');
		 
		
	}
	
	
	function instanceSearchResultDelete(){
		if($this->session->userdata('user_gid') !== '0')
			redirect('/home/notLogin');
		$instanceid = $this->uri->segment(4);	
		$searchname = $this->uri->segment(5);
		$this->casemodel->deleteInstance($instanceid);
		$data['name'] = $searchname;
		$data['records'] = $this->casemodel->getInstanceLikeInstanceName($searchname);
		if(empty($data['records'])){
			redirect('admin/caseadmin/instanceSearch');
		}
		else {			
			$this->load->view('admin/case_instance_simSearchResult',$data);
		}
//		redirect('admin/caseadmin/instanceadmin');
//		$this->load->view('admin/case_instance_search');
	}
	
	function instanceSearchResultAction(){
	    if($this->session->userdata('user_gid') !== '0')
			redirect('/home/notLogin');
		if($_POST)
		{
	   		$ids = preg_split('/\,/', $_POST['checkboxs']);
	   		if($_POST['operation'])
	   		{	   
	   			if($_POST['operation'] == 'delete')
	   			{
	   				foreach($ids as $key => $value)
					$this->casemodel->deleteInstance($value);	
	   			}
	   			$this->load->view('admin/case_instance_search');
	   		}
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

}

?>