<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>项目</title>
<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>css/main.css' />
<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>css/message.css' />
<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>css/bbs.css' />
<script type="text/javascript" src="<?php echo base_url();?>js/main.js">
</script>
</head>

<body>
<?php 

	$msg = $this->session->flashdata('msg');
	if($msg)
		echo "<script language=\"JavaScript\">alert(\"$msg\");</script>"; 

?>
<div class="container">
    <div class="header">
      <div class="logo">
      <div class="per_info" align="center">
        	<p><?php echo $this->session->userdata('user_name')	;?>，欢迎回来！</p>
        	<p>积分：<?php echo $this->session->userdata('score');  ?>分 | 等级：<?php               
			switch($this->session->userdata('grade'))			
            {
				case 1: echo "新手上路";break;
				case 2: echo "初学乍练";break;
				case 3: echo "略有小成";break;
				case 4: echo "渐入佳境";break;
				case 5: echo "炉火纯青";break;
				case 6: echo "登峰造极";break;
			}
			?>    |   
            在线时间：<?php 
            $onlinetime = $this->session->userdata('onlinetime');         
            echo $onlinetime;?>
            </p>
            <a href="http://10.214.29.18/pbclsweb/">关于我们</a>           
            <a href=<?php echo site_url('home/quit/')?>>退出</a>
      </div>
      </div>
      <ul class="nav">
        <li><a href=<?php echo site_url("home/index")?>><strong>首 页</strong></a></li>
        <li><a href=<?php echo site_url("cc/index")?>><strong>案例列表</strong></a></li>
        <li><a href=<?php echo site_url("ins/index")?>><strong>项目列表</strong></a></li>
        <li><a href=<?php echo site_url("perSpace")?>><strong>个人空间</strong></a></li>
      </ul>
    </div>
