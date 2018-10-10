<?php
class General extends Controller {

	function General()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$username = $this->session->userdata('username');//注意，这里括号里面的username前不能加"$",否则会出错
    	$this->load->view('admin/general_view');

	}
	
	function findallmember()
	{
		$this->load->model('Useradmin_model');
		
		$config['base_url']='http://localhost/pbcls/index.php/admni/general/findallmember/';
		$total=$config['total_rows']=$this->Useradmnin_model->getAllUsers();
		
		$per=$config['per_page'] = '1';
		$offset= $this->uri->segment(3);
		
		if($offset>=$total || $offset<0)
		{
			echo "wrong in line 28";
		}
		
		$this->pagination->initialize($config);
		$data=array();
		$data['query']=$this->Useradmin_model->get_per_data($per,$offset);
		
		$this->load->view('admin/userlist_view',$data);
	}
	
	function findamember()
	{
		$this->load->model('Useradmin_model');
		
		$config['base_url']='http://localhost/pbcls/index.php/admni/general/findamember/';
		

		$data=array();
		$data['query']=$this->Useradmin_model->get_per_data($per,$offset);
		
		$this->load->view('admin/userlist_view',$data);	
		
	}
	
	function user_info()
	{
		$this->load->view('admin/user_info_view');
	}
	
	
     function show(){                //分页显示角色组的所有信息_一个分页的测试

     	 $this->output->cache(1);  //设置缓存

     	 $this->load->model('Useradmin_model');  //载入模型 Usermodel
     	 $this->load->library('pagination');  //载入 分页类

     	 $config['base_url'] = 'http://localhost/pbcls/index.php/admin/general/show/'; //设置基本的分页url地址
         $total = $config['total_rows'] = $this->Useradmin_model->getAllTotals();  //取得总数

         $per = $config['per_page'] = '1'; //每页的个数


         $offset = $this->uri->segment(4); //取得地址栏的 第四个参数

         if($offset>=$total||$offset<0){
           echo "Wrong";  //比较 offset 和 total  这样可以避免 缓存的漏洞  但不能根治所有
         }

         $this->pagination->initialize($config);  //载入分页的设置
     	 $data = array(); //定义data 数组 为了 传数组
     	 $data['query'] = $this->Useradmin_model->get_per_data($per,$offset); // 得到Usermodel的get_per_data方法留言记录

     	 $this->load->view('admin/test_view',$data);  //载入test_view 页面
     }
	
	

}
