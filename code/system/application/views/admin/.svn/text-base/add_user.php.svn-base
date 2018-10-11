<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
            <a href="http://10.214.29.18/pbclsweb/">关于我们</a>
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
            <table align="left" height="" width="120">
             <tr>
            <td height="20" width="120" align="left"><a href="<?php echo site_url("admin/useradmin/usersearch")?>">
            <p>查找用户</p></a></td>
            </tr>
            <tr>
            <td height="20" width="120" align="left"><a href="<?php echo site_url("admin/useradmin")?>">
            <p>用户列表</p></a></td>
            </tr>
            <tr>
            <td height="20" width="120" align="left"><a href="<?php echo site_url("admin/useradmin/addUser")?>">
            <p>增加用户</p></a></td>
            </tr>
            <tr>
            <tr>
            <td height="20" width="120" align="left"><a href="<?php echo site_url("admin/useradmin/inactiveuser")?>">
            <p>冻结的用户</p></a></td>
            </tr>
            <tr>
            <td height="20" width="120" align="left"><a href="<?php echo site_url("admin/useradmin/permission")?>">
            <p>权限管理</p></a></td></tr>
            </table>                   
            </div>     
            
            <div class="sidebox">
            <p1><strong>用户安全</strong></p1>
            <hr />
            <table align="left" height="" width="120">
            <tr>
            <td height="20" width="120" align="left"><a href="<?php echo site_url("admin/useradmin/banemail")?>">
            <p>封禁Email地址</p></a></td>
            </tr>
            <tr>
            <td height="20" width="120" align="left"><a href="<?php echo site_url("admin/useradmin/banip")?>">
            <p>封禁IP地址</p></a></td>
            </tr>
             <!-- 封禁用户名的功能和冻结用户的功能重复了，所以删除此功能.
                   <tr>
                   <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/useradmin/banusername")?>">
                   <p>封禁用户名</p></a></td></tr>
                   -->
            <tr>
            <td height="20" width="120" align="left"><a href="<?php echo site_url("admin/useradmin/banregname")?>">
            <p>禁止注册的用户名</p></a></td></tr>
            <tr>
            <td height="20" width="120" align="left"><a href="<?php echo site_url("admin/useradmin/prune")?>">
            <p>裁剪用户</p></a></td></tr>
            
            </table>                   
            </div>     
            
        </div>


      <div class="mainbody">
        <table height="" border="0">
            <br />
            <br />
             <tr height="30" style="font-size:14px">
           	   <td width="200"><strong>增加用户</strong></td>
               <td width="500" valign="top">&nbsp;</td>
            </tr>
  			<tr height="30">
           	   <td width="200">
	                  <table width="100" height="">
                        <tr><td height="100" bor><img src="/pbcls/system/application/views/admin/portrait.jpg"></td>
                        </tr>
                        <tr><td height="40"><input name="" type="submit" value="上传/更新头像"/></td></tr>
                      </table>
              </td>
               <td width="500" valign="top"><table width="383"><tr height=""><td width="114"><div align="left">
                 <form method="post" action="<?php echo site_url('admin/useradmin/addUser')?>">
                 <table width="383">
                   <tr height="">
                     <th width="114" style="font-size:12px"><div align="left">用户名：</div></th>
                     <td width="257"><input type="text" name="username" /></td>
                   </tr>
                   <tr height="">
                     <th width="114" style="font-size:12px"><div align="left">密码：</div></th>
                     <td width="257"><input type="password" name="password" /></td>
                   </tr>
                   <tr height="">
                     <th width="114" style="font-size:12px"><div align="left">电子邮箱：</div></th>
                     <td width="257"><input type="text" name="email"/></td>
                   </tr>
                   <tr height="">
                     <th width="114" style="font-size:12px"><div align="left">用户类型：</div></th>
                     <td width="257" style="font-size:12px"><div align="left">
                         <select name="groupid">
                           <option value="2">学习者</option>
                           <option value="1">指导者</option>
                           <option value="0">管理员</option>
                         </select>
                     </div></td>
                   </tr>
                   <tr height="">
                     <td height="50" style="font-size:12px"><input name="adduser" type="submit" value="确定"/></td>
                     <td></td>
                   </tr>
                 </table>
                 </form>
               </div></td>
                   </tr>
                      
              
              
               </table>
                    
              </td>
            </tr>   
            </table>
              
       </div>
    </div>
   
   
    
    
<?php $this->load->view('admin/footer'); ?>
