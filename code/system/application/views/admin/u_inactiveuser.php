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
        	<p><?php echo $this->session->userdata('user_name').",欢迎回来！"?></p>
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
            <p1><strong>用户管理</strong></p1>
            <hr />
            <table align="left" height="" width="100">
             <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/useradmin/usersearch")?>">
            <p>查找用户</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/useradmin")?>">
            <p>用户列表</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/useradmin/addUser")?>">
            <p>增加用户</p></a></td>
            </tr>
            <tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/useradmin/inactiveuser")?>">
            <p>冻结的用户</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/useradmin/permission")?>">
            <p>权限管理</p></a></td></tr>
            </table>                   
            </div>     
            
            <div class="sidebox">
            <p1><strong>用户安全</strong></p1>
            <hr />
            <table align="left" height="" width="120">
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/useradmin/banemail")?>">
            <p>封禁Email地址</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/useradmin/banip")?>">
            <p>封禁IP地址</p></a></td>
            </tr>
              <!-- 封禁用户名的功能和冻结用户的功能重复了，所以删除此功能.
                   <tr>
                   <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/useradmin/banusername")?>">
                   <p>封禁用户名</p></a></td></tr>
                   -->
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/useradmin/banregname")?>">
            <p>禁止注册的用户名</p></a></td></tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/useradmin/prune")?>">
            <p>裁剪用户</p></a></td></tr>
            
            </table>                   
            </div>     
            
          </div>
      
      
          <div class="mainbody">
               <br />
               <h3>冻结的用户</h3>
               <p>这是已经注册但是没有激活的用户列表. 您可以删除或激活他们.</p>
               <form id="user_form" name="user_form" action="<?php echo site_url('admin/useradmin/inactiveuseraction')?>" method="post"                 onSubmit="return checker(userform)">	       
               <table width="700" border="1" align="center">
                <tr>
                <td width="30" align="center">&nbsp;</td>
                <td width="50" align="center"><b>用户ID</b></td>
                <td width="100" align="center"><b>用户名</b></td>
                <td width="150" align="center"><b>电子邮件</b></td>
                <td width="150" align="center"><b>注册时间</b></td>
                <td width="100" align="center"><b>用户类型</b></td>
                <td width="70" align="center"><b>状态</b></td>
                <td width="50" align="center"><b>操作</b></td>
                </tr>
                <?php foreach($records as $row) { ?>
               <tr>
                <td align="center">
                  <input type="checkbox" name="checkbox" value="<?php echo $row['uid'] ?>" />
                </td>
                <td align="center"><p><?php echo $row['uid']?></p></td>
                <td align="center"><p><?php echo $row['username']?></p></td>
                <td align="center"><p><?php echo $row['email']?></p></td>
                <td align="center"><p><?php echo $row['registertime']?> 
                </td>
                <td align="center"><p>
                <?php if($row['groupid'] == 0) echo '管理员';elseif($row['groupid'] == 1) echo '指导者';else echo '学习者'?>
                </p></td>
                <td align="center" style="font-size:12px"><p>未激活</p></td>
                <td>
                <select name="singleoperation" size="1" onChange="singleselect()">
                <option>操作</option>
                <option value="active">激活</option>
                <option value="delete">删除</option>
                </select>
                </td>
                </tr>
                <?php } ?>
           
            </table>
                     
            <table width="298" border="0" height="50">
              <tr>
                <td width="155"> 
                <p><input type="checkbox" name="all" onClick="check_all(this,'checkbox')" />全选/全不选</p>
                </td>
                <td width="133">
                <select name="operation" size="1" onChange="select_submit()">
                  <option value="">操作</option>
                  <option value="active">激活</option>
                  <option value="delete">删除</option>
                </select></td>
              </tr>
            </table>
            <input type="hidden" name="checkboxs" value="" />
            </form>

       
          </div><!--mainbody -->
    
    </div><!--maincontent-->
     
    <div class="footer">
       <hr />
       <p align="center">Copyright 2009 PBCLS Team . All Rights Reversed .</p>
    </div>
</div>
</body>
</html>