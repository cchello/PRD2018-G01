<!--
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
        	<p><?php echo $this->session->userdata('user_name').",欢迎回来dsfs！"?></p>
            <a href="http://10.214.29.18/pbcls/">关于我们</a>
            <a href="<?php echo site_url("home/quit/")?>">退出</a>        </div>
      </div>
      <ul class="nav">
        <li><a href="<?php echo site_url("admin/homeadmin")?>"><strong>后台首页</strong></a></li>
        <li><a href="<?php echo site_url("admin/caseadmin")?>"><strong>案例管理</strong></a></li>
        <li><a href="<?php echo site_url("admin/useradmin")?>"><strong>用户管理</strong></a></li>
        <li><a href="<?php echo site_url("admin/sysadmin")?>"><strong>系统管理</strong></a></li>
      </ul>
    </div>
-->
<?php $this->load->view('admin/admin_header'); ?>    
<div class="maincontent">
  <div class="sidebar">
        <div class="sidebox">
            <p1><strong>系统任务</strong></p1>
            <hr />
            <table align="left" height="" width="100">
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin")?>"><p>系统更新</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin/language_pack")?>"><p>语言包</p></a></td>            </tr>
            </table>                   
        </div>
       <!--    此功能将在项目第二阶段实现
        <div class="sidebox">
            <p1><strong>模块管理</strong></p1>
            <ul class="sidebox_nav">
                <li><a href="<?php echo site_url("admin/sysadmin/admin_panel")?>"><p>管理员控制面板</p></a></li>
                <li><a href="<?php echo site_url("admin/sysadmin/user_panel")?>"><p>用户控制面板</p></a></li>
            </ul>                    
        </div>
        --> 
        
        <div class="sidebox">
          <p1><strong>日志管理</strong></p1>
            <br />
            <hr />
          <table align="left" height="" width="100">
          <tr>
             <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin/admin_log")?>"><p>管理日志</p></a></td          ></tr>
          <tr>
             <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin/user_log")?>"><p>用户日志</p></a></td>          </tr>
          <tr>
         <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin/error_log")?>"><p>系统错误日志</p></a></td>          </tr>
          </table>    
                            
        </div>
        <div class="sidebox">
            <p1><strong>数据库管理</strong></p1>
             <br />
             <hr />
            <table align="left" height="" width="100">
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin/db_backup")?>"><p>数据库备份</p></a></td>
            </tr>
            <tr>
           <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin/db_restore")?>"><p>数据库恢复</p></a></td>
            </tr>
            </table>                     
        </div>      
    </div>
  <div class="mainbody">
        <br />
         <h3>版本检查</h3>
        <p>检查当前使用版本是否最新及是否需要升级</p>
        <br />
        <br />
        <table name="version" width="700" border="1">
            <tr>
                <td width="350" height="20" align="center"><b>当前版本</b></td>
                <td width="350" height="20" align="center"><b>0.1</b></td>
            </tr>
            <tr>
                <td width="350" height="20" align="center"><b>最新版本</b></td>
                <td width="350" height="20" align="center"><b>0.1</b></td>
            </tr>
        </table>
    </div> 


</div>

<?php $this->load->view('admin/footer'); ?>
