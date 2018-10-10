<?php
/*
* 
* @copyright (c) 2010 The PBCLS Team 
* @author wsn
* @version 0.1
* 
*/  
?>
<?php $username = $this->session->userdata('user_name');
    			if(!$this->usermodel->checkUserPorPath($username)){
    				echo img('./img/u25.jpg');
    			}
    			else echo img($this->usermodel->getUserPorPath($username));?>
<p>用户名:<?echo $username;?></p>