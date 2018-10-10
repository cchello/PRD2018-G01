<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的案例</title>
<link rel="stylesheet" type="text/css" href="/pbcls/system/application/views/admin/main.css" />
<link rel="stylesheet" type="text/css" href="/pbcls/system/application/views/admin/admin.css" />
<script type="text/javascript" src="/pbcls/system/application/views/admin/main.js">

</script>

</head>

<body>
<?php
$msg = $this->session->userdata('msg');
if($msg)
{
	echo "<script language=\"JavaScript\">alert(\"$msg\");</script>"; 
	$this->session->set_userdata('msg',''); 	
}
?>
<div class="container">
    <div class="header">
      <div class="logo">
      <div class="per_info" align="center">
        	<p><?php echo $this->session->userdata('user_name').",欢迎回来！"?></p>
            <a href="http://10.214.29.18/pbcls/">关于我们</a>
            <a href="<? echo site_url("admin/logout")?>">退出</a>        </div>
      </div>
      <ul class="nav">
        <li><a href="<? echo site_url("admin/homeadmin")?>"><strong>后台首页</strong></a></li>
        <li><a href="<? echo site_url("admin/caseadmin")?>"><strong>案例管理</strong></a></li>
        <li><a href="<? echo site_url("admin/useradmin")?>"><strong>用户管理</strong></a></li>
        <li><a href="<? echo site_url("admin/sysadmin")?>"><strong>系统管理</strong></a></li>
      </ul>
    </div>
    
    <div class="sidebar">
        <div class="sidebox">
            <p1><strong>案例管理</strong></p1>
            <hr />
            <table align="left" height="" width="100">
            <tr>
            <td height="20" width="100" align="left"><a href="<? echo site_url("admin/caseadmin")?>"><p>案例列表</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<? echo site_url("admin/caseadmin/uploadcase")?>"><p>案例上传</p></a            ></td></tr>
            </table>                   
       </div>     
    </div>
    
    <div class="mainbody">
        <br />
        <h3>选择案例并上传</h3>
           <table height="60" border="0">
             <tr height="30">
                
                <td width="350">
	                <form action="<?php echo site_url('admin/caseadmin/do_upload')?>" method="post" enctype="multipart/form-data">				
					<input type="file" name="userfile" size="20" />	
					<input type="submit" value="上传案例" />			
					</form>          
		        </td>
            </tr>
            </table>
 
    
    </div>
    
    
    
<?php $this->load->view('admin/footer'); ?>