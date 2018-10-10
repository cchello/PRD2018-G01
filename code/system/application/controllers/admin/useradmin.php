<?php
Class Useradmin extends Controller
{
	function Useradmin()
	{
		parent::Controller();
		$this->load->model('usermodel');
	}
	
	function index()
	{
		if($this->session->userdata('user_gid') !== '0')
            redirect('/');
        $data['records'] = $this->usermodel->getAllUsers();
		$this->load->view('admin/user_list',$data);
	}
	
	function addUser()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/');
				
		if($_POST)
		{
			$user = array(
				'username' => $_POST['username'],
				'password' => md5($_POST['password']),
				'email' => $_POST['email']
			);
			$groupid = $_POST['groupid'];
			$msg = "";
			if(!$this->usermodel->addUser($user, $groupid))
				$msg = "增加用户失败！"; 
			$this->session->set_userdata('msg', $msg);
			redirect('admin/useradmin');
		}
		else 
			$this->load->view('admin/add_user');
	}

	
	function action()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/');
			
		if(isset($_REQUEST['do']))
		{
			$id = $_REQUEST['userid'];
			if($_REQUEST['do'] == 'delete')
			{
				$this->usermodel->deleteUser($id);
				redirect('admin/useradmin/');
			}
			elseif($_REQUEST['do'] == 'edit')
			{
				$this->edit_user($id);
			}
			elseif($_REQUEST['do'] == 'changestatus')
			{
				$this->changeStatus($id);
				redirect('admin/useradmin/');
			}
			
		}
		if($_POST)
		{
	   		$ids = preg_split('/\,/', $_POST['checkboxs']);	
	   		if($_POST['operation'])
	   		{
	   			if($_POST['operation'] == 'active')
	   			{
	   				foreach($ids as $key => $value)
					$this->usermodel->activeUser($value);
	   			}
	   			elseif ($_POST['operation'] == 'deactive')
	   			{
	   				foreach($ids as $key => $value)
					$this->usermodel->deactiveUser($value);
	   			}
	   			elseif ($_POST['operation'] == 'delete')
	   			{
	   				foreach($ids as $key => $value)
					$this->usermodel->deleteUser($value);
	   			}
	   			redirect('admin/useradmin/');
	   		}  

	   		if($_POST['sort'])
	   		{
	   			if($_POST['sort'] == 'uid')
	   			{
	   				$data['records']=$this->usermodel->getAlluserbyuid();
	   			    $this->load->view('admin/user_list',$data);
	   			}
	   			elseif($_POST['sort'] == 'username')
	   			{
	   				$data['records']=$this->usermodel->getAlluserbyusername();
	   			    $this->load->view('admin/user_list',$data);
	   			}
	   			elseif($_POST['sort'] == 'email')
	   			{
	   				$data['records']=$this->usermodel->getAlluserbyemail();
	   			    $this->load->view('admin/user_list',$data);
	   			}
	   		    elseif($_POST['sort'] == 'regtime')
	   			{
	   				$data['records']=$this->usermodel->getAlluserbyregtime();
	   			    $this->load->view('admin/user_list',$data);
	   			}
	   		    elseif($_POST['sort'] == 'usertype')
	   			{
	   				$data['records']=$this->usermodel->getAlluserbyusertype();
	   			    $this->load->view('admin/user_list',$data);
	   			}
	   		    elseif($_POST['sort'] == 'status')
	   			{
	   				$data['records']=$this->usermodel->getAlluserbystatus();
	   			    $this->load->view('admin/user_list',$data);
	   			}
	   		}
		
		}
		
	}

	private function changeStatus($id)
	{
		$user = $this->usermodel->getUser($id);
		$user['status'] = !$user['status'];	
		$this->usermodel->updateUser($user);
	}
	
	private function edit_user($id)
	{
		$user['records']=$this->usermodel->getUser($id);
		$this->load->view('admin/edit_user',$user);
	}
	
	function updateinfo()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/');
		if($_POST)
		{
			$user = array(
			'uid' => $_POST['uid'],
			'username' => $_POST['username'],
			'groupid' => $_POST['groupid'],
			);	
			
			if($_POST['emailconf'] !== '' && $_POST['emailconf'] == $_POST['email'])
			{
				$user['email']= $_POST['emailconf'];
			}
			else $user['email']= $_POST['email'];
			
			if($_POST['password'] !== '' && $_POST['passwordconf'] !== '' 
			&& $_POST['password'] == $_POST['passwordconf'])
			{
				$user['password'] = md5($_POST['passwordconf']);
			}
		}
		if($this->usermodel->updateUser($user))
			{
				$name=$_POST['username'];
				$data['row']=$this->usermodel->getUserbyname($name);
		        $this->load->view('admin/u_info',$data);
			}		      
	    
	}
	
	function updateinfo2()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/');
		if($_POST)
		{
			$user = array(
			'uid' => $_POST['uid'],
			'finisheds'	=>$_POST['finisheds'],
			'ongoings' =>$_POST['ongoings'],
			'qq' => $_POST['qq'],
			'msn' => $_POST['msn'],	
			'homepage' => $_POST['homepage'],
			'interests' => $_POST['interests'],
			'signature' => $_POST['signature']
			);	
		}
		if($this->usermodel->updateUser($user))
			{
				$name=$_POST['username'];
				$data['row']=$this->usermodel->getUserbyname($name);
		        $this->load->view('admin/u_info2',$data);
			}		      
	}
	
	function updateavatar()
	{
		
	}
	
	function inactiveuser()
	{
		if($this->session->userdata('user_gid')!=='0')
		    redirect('/');
		$data['records'] = $this->usermodel->getAllInactiveUsers();
		$this->load->view('admin/u_inactiveuser',$data);
	}
	         
	function inactiveuseraction()
	{
	    if($_POST['singleoperation'])
        {
            $ids = preg_split('/\,/', $_POST['checkboxs']);   
       
            if($_POST['singleoperation'] == 'active')
            {
                foreach($ids as $key => $value)
                    $this->usermodel->activeUser($value);
                redirect('admin/useradmin/inactiveuser');
            }
            elseif($_POST['singleoperation'] == 'delete')
            {
                foreach($ids as $key => $value)
                    $this->usermodel->deleteUser($value);
                redirect('admin/useradmin/inactiveuser');
            }           
        }
        if($_POST['operation'])
        {
        	$ids = preg_split('/\,/', $_POST['checkboxs']);   
       
            if($_POST['operation'] == 'active')
            {
                foreach($ids as $key => $value)
                    $this->usermodel->activeUser($value);
                redirect('admin/useradmin/inactiveuser');
            }
            elseif($_POST['operation'] == 'delete')
            {
                foreach($ids as $key => $value)
                    $this->usermodel->deleteUser($value);
                redirect('admin/useradmin/inactiveuser');
            }           
        }
        redirect('admin/useradmin/inactiveuser');
	}
	
    function usersearch()
    {
    	if($this->session->userdata('user_gid') !== '0')
			redirect('/');
		
		$this->load->view('admin/u_usersearch');
    }
    
    function complexsearch()
    {
        if($this->session->userdata('user_gid') !== '0')
            redirect('/');
        if($_POST)
        {
        	if($_POST['searchtype'] == 'simple')
        	{
        		$this->load->view('admin/u_usersearch');
        	}
        	else $this->load->view('admin/u_complexsearch');
        }
    }
    
    function comsearchresult()
    {
    	if($this->session->userdata('user_gid') !== '0')
            redirect('/');
        
        if(!empty($_POST))
        {
        	$array = $_POST;
        	$data['records'] = $this->usermodel->comsearch($array);
        	$this->load->view('admin/u_comsearchresult',$data);
        }
        
        else $this->load->view('admin/u_complexsearch');
    }

    function userlinkedinfo()
    {
        $userid = $this->uri->segment(4);
 	   	if($userid !== false)
 	   	{
 	   		$data['row']=$this->usermodel->getUser($userid);
		    $this->load->view('admin/u_info',$data);
 	   	}
    }
    
    function usersearchlinkedinfo()
    {
        $userid = $this->uri->segment(4);
 	   	if($userid !== false)
 	   	{
 	   		$data['row']=$this->usermodel->getUser($userid);
		    $this->load->view('admin/u_info',$data);
 	   	}
    }
    
    function userinfo()
    {
    	if($this->session->userdata('user_gid') !== '0')
    	{
    		redirect('/');	
    	}
 	   		   
 	   	if($_POST['username']!=='')
    	{
    		$name=$_POST['username'];    			 	  			
    		if($this->usermodel->getUserbyname($name) !== null)
    		{
    			$data['row']=$this->usermodel->getUserbyname($name);
		        $this->load->view('admin/u_info',$data);	 			
    		}	 
    		else
    		{
    			echo "<script>alert('Wrong name!');location.href='javascript:history.back()';</script>";
    		}
   		   		 
    	}
        else
    		{
    			echo "<script>alert('Name if full!');location.href='javascript:history.back()';</script>";
    		}

    }
    
    function userinfotype()
    {
    	if($this->session->userdata('user_gid') !== '0')
            redirect('/');
        
        $name=$_POST['username'];
        if($_POST)
		{
			if($_POST['searchtype'] == 'general')
			{				
		        $data['row']=$this->usermodel->getUserbyname($name);
				$this->load->view('admin/u_info',$data);				
			}						
			elseif ($_POST['searchtype'] == 'info')
			{
				$data['row']=$this->usermodel->getUserbyname($name);
				$this->load->view('admin/u_info2',$data);
			}
			elseif ($_POST['searchtype'] == 'avatar')
			{
				$data['row']=$this->usermodel->getUserbyname($name);
				$this->load->view('admin/u_info_avatar',$data);
			}
			elseif ($_POST['searchtype'] == 'permission')
			{
				$data['row']=$this->usermodel->getUserbyname($name);
				$this->load->view('admin/u_permissionlist',$data);
			}
		}
    }
    
    function userlist()
    {
    	if($this->session->userdata('user_gid') !== '0')
			redirect('/');
		$data['records'] = $this->usermodel->getAllUsers();
		$this->load->view('admin/user_list', $data);
    }
    function u_permissionsearch()
    {
    	if($this->session->userdata('user_gid') !== '0')
			redirect('/');	
		if($_POST)
        {
        	if($_POST['searchtype'] == 'simple')
        	{
        		$this->load->view('admin/u_permissionsearch');
        	}
        	else $this->load->view('admin/u_compermissionsearch');
        }
    }
    
    function u_permission()
    {
    	if($this->session->userdata('user_gid') !== '0')
			redirect('/');
		
		if($_POST['username']!== '')
		{
			$name=$_POST['username'];	
			if($this->usermodel->getUserbyname($name))	
			{
				$data['row']=$this->usermodel->getUserbyname($name);
		        $this->load->view('admin/u_permissionlist',$data);
			}	
		    else echo "<script>alert('Wrong name!');location.href='javascript:history.back()';</script>";
		}
		else echo "<script>alert('Name if full!');location.href='javascript:history.back()';</script>";
		
    }
	
	
	function banemail()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/');				
		if($_POST)
		{
			if($_POST['email'] !== '')
			{
				$user = array(
			    'email' => $_POST['email'],
			    'time'	=>$_POST['untilltime'],
			    'mark' =>$_POST['reason']			
			    );	
			    $msg = "";
			    if(!$this->usermodel->addBanemail($user))
			    {
				    $msg = "增加禁止email失败！";
			    }
			    $this->session->set_userdata('msg',$msg);
			}					
		}

		$data['records'] = $this->usermodel->getbanemail();
		$this->load->view('admin/u_banemail',$data);
	}
	
	function banemailinfo()
	{
		
		if($this->session->userdata('user_gid') !== '0')
			redirect('/');			
		if($_POST['emailbox'])
		{
			$email = $_POST['emailbox'];
			$data['detail'] = $this->usermodel->getbanemailinfo($email);
			$data['records']= $this->usermodel->getbanemail();
			$data['email']=$email;
			$this->load->view('admin/u_banemailinfo',$data);
		}
	}
	
	function unbanemail()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/');
			
		if($_POST['object'])
		{
			$email = $_POST['object'];
			if(!$this->usermodel->deletebanemail($email))
			{
				echo "false";
			}
		}
		$data['records'] = $this->usermodel->getbanemail();
		$this->load->view('admin/u_banemail',$data);

	}
		
	function permission()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/');
	    if($_POST)
        {
        	if($_POST['searchtype'] == 'simple')
        	{
        		$this->load->view('admin/u_permission');
        	}
        	else $this->load->view('admin/u_compermissionsearch');
        }
        else $this->load->view('admin/u_permission');
	}
	
	function banip()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/');
		
		if($_POST)
		{
			if($_POST['ip'] !== '')
			{
				$user = array(
			    'ip' => $_POST['ip'],
			    'time'	=>$_POST['untilltime'],
			    'mark' =>$_POST['reason']			
			    );	
			    $msg = "";
			    if(!$this->usermodel->addBanip($user))
			    {
				    $msg = "增加禁止email失败！";
			    }
			    $this->session->set_userdata('msg',$msg);
			}					
		}

		$data['records'] = $this->usermodel->getbanip();
		$this->load->view('admin/u_banip',$data);	
	}
	
	function banipinfo()
	{
	    if($this->session->userdata('user_gid') !== '0')
			redirect('/');			
		if($_POST['ipbox'])
		{
			$ip = $_POST['ipbox'];
			$data['detail'] = $this->usermodel->getbanipinfo($ip);
			$data['records']= $this->usermodel->getbanip();
			$data['ip']=$ip;
			$this->load->view('admin/u_banipinfo',$data);
		}
	}
	
	function unbanip()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/');
			
		if($_POST['object'])
		{
			$ip = $_POST['object'];
			if(!$this->usermodel->deletebanip($ip))
			{
				echo "false";
			}
		}
		$data['records'] = $this->usermodel->getbanip();
		$this->load->view('admin/u_banip',$data);
	}
	
	function banusername()
	{
		if($this->session->userdata('user_gid') !== '0')
			redirect('/');
		$this->load->view('admin/u_banname');
	}
	
    function banregname()
    {
    	if($this->session->userdata('user_gid') !== '0')
			redirect('/');
		if($_POST)
		{
			if($_POST['name'] !== '')
			{
				$user = array(
			    'name' => $_POST['name'],
			    'mark' =>$_POST['reason']			
			    );	
			    $msg = "";
			    if(!$this->usermodel->addBanregname($user))
			    {
				    $msg = "增加禁止email失败！";
			    }
			    $this->session->set_userdata('msg',$msg);
			}					
		}

		$data['records'] = $this->usermodel->getbanregname();
		$this->load->view('admin/u_banregname',$data);	
    }
    
    function banregnameinfo()
    {
        if($this->session->userdata('user_gid') !== '0')
			redirect('/');			
		if($_POST['namebox'])
		{
			$name = $_POST['namebox'];
			$data['detail'] = $this->usermodel->getbanregnameinfo($name);
			$data['records']= $this->usermodel->getbanregname();
			$data['name']=$name;
			$this->load->view('admin/u_banregnameinfo',$data);
		}
    }
    
    function unbanregname()
    {
    	if($this->session->userdata('user_gid') !== '0')
			redirect('/');
			
		if($_POST['object'])
		{
			$name = $_POST['object'];
			if(!$this->usermodel->deletebanregname($name))
			{
				echo "false";
			}
		}
		$data['records'] = $this->usermodel->getbanregname();
		$this->load->view('admin/u_banregname',$data);
    }
	
    function prune()
    {
    	if($this->session->userdata('user_gid') !== '0')
			redirect('/');
		$this->load->view('admin/u_prune');
    }
    
    function pruneUser()
    {
    	if($this->session->userdata('user_gid') !== '0')
			redirect('/');

		if(!($_POST['username'] == '' && $_POST['email'] == '' && 
		   $_POST['regtime'] == '' && $_POST['caseno'] == ''))
		{
			$array = $_POST ;
			$data = $this->usermodel->pruneUser($array);	
			$this->load->view('admin/u_prune');
		}
		else 
		{
			$this->load->view('admin/u_prune');
			
		}
				
    }

}