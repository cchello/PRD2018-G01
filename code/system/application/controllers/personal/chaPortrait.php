<?php
class ChaPortrait extends Controller{
	function ChaPortrait(){
		parent::Controller();
		$this->load->model('usermodel');
		$this->load->helper('html');
	}
	
	private function isLoggedIn(){
		$user_name = $this->session->userdata('user_name');
		return empty($user_name)?FALSE:TRUE;
		}
	
	function index(){
		if($this->isLoggedIn() == FALSE){
			redirect('/home/notLogin'); 
		}
		else{
			$this->load->view('perSpace/changePortrait');
		}
	}
	
	function change()
	{
		$this->load->library('uploadedfile');
		$username = $this->session->userdata('user_name');
		$oldPath = NULL;
		if ($this->usermodel->checkUserPorPath($username)){
			$oldPath = $this->usermodel->getUserPorPath($username);
		}
		$path = ".".DIRECTORY_SEPARATOR."system".DIRECTORY_SEPARATOR."application".DIRECTORY_SEPARATOR."uploadedfile".DIRECTORY_SEPARATOR."portrait".DIRECTORY_SEPARATOR;
		$return = $this->uploadedfile->uploadFile($path,USERPORTRAIT);
		if($return['status'] == '0')
		{
			?><script>alert("File too large or Not right type!");
			window.location.href='<?php echo base_url();?>index.php/perSpace';
			</script><?php 
		}
		else {
			$path = $return['path'];
			$this->usermodel->changePorPath($username,$path);
			if(!$this->resizePortrait($path))
			{
				?><script>alert("Upload fail, please change another one!");
				window.location.href='<?php echo base_url();?>index.php/perSpace';
				</script><?php 
			}
			if ($oldPath){
				$this->delUserOldPor($oldPath);
			}
			?><script>alert('Upload Success!');
				window.location.href='<?php echo base_url();?>index.php/perSpace';</script><?php
		}
	}
	
	//删除旧文件
	function delUserOldPor($oldPath)
	{
		unlink($oldPath);
	}
	
	function resizePortrait($path)
	{
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['width'] = 150;
		$config['height'] = 165;
		$config['source_image'] = $path;
		$this->image_lib->initialize($config);
		if($this->image_lib->resize())
			return TRUE;
		else return FALSE;
		
	}
}
?>