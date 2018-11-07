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
            <tr>
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
            
            <h3>禁止注册的用户名</h3>
            <p>在这里您可以进行对注册用户名、IP地址或信箱地址的封禁操作。如果愿意，您可以给出一个简短（至多255字节）的封禁理由，它将显示在管理记录中.</p>
            <p>这里您可以管理禁止使用的用户名. 可以使用通配符 *. 请注意这对已经注册的用户名是无效的.</p>     
            
            <div class="mainbox">
            <br />
            <form name="banregname" method="post" action="<?php echo site_url('admin/useradmin/banregname') ?>">
            <table width="640">
              <tr align="center" style="font-size:12px" height="30">
              <th width="300" align="left">用户名:</th>
              <td width="340" style="border-left: thin solid #CACACA" align="center"><textarea name="name"></textarea></td>
              </tr>
              <tr>
              <td style="font-size:12px">您可以使用通配符 *来禁止使用某类的用户名.</td><td>&nbsp;</td>
              </tr>
              
              <tr align="left" style="font-size:12px" height="30">
              <th width="300" align="left">封禁原因：</th>
              <td width="340" style="border-left: thin solid #CACACA" align="center"><input name="reason" type="text" value="" size="25"></td>
              </tr>
                            
              <tr align="center" style="font-size:12px">
              <td>&nbsp;</td><td><input type="submit" value="提交" /><input type="reset" value="重置" /></td>
              </tr>
 
              </table>
              </form>
              
              <h5>删除一个禁用的用户名</h5>
              <p>您可以选择多个用户名并对其执行解除禁用的操作.</p>
              <form name="regnamelist" method="post" action="<?php echo site_url('admin/useradmin/banregnameinfo') ?>">
              <table width="640">
              <tr align="center" style="font-size:12px" height="30">
              <th width="300" align="left">用户名 列表:</th>
              <td width="340" style="border-left: thin solid #CACACA" align="center">
               <select name="namebox" size="2" onChange="banselect()" style="width:180">
                  <?php 
				 foreach ($records as $row)
				 {
				 ?>
                  <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                   <?php 
			     }
				 ?>
                  </select>
              </td>
              </tr>             
              </table>
              </form>
              
              <table width="640">
              <tr align="left" style="font-size:12px" height="30">
              <th width="300" align="left">封禁原因：</th>
              <td width="340" style="border-left: thin solid #CACACA" align="center"><input name="reason" type="text" value="" size="25"></td>
              </tr>
             
              <tr align="center" style="font-size:12px">
              <td>&nbsp;</td><td><input type="submit" value="提交" /><input type="reset" value="重置" /></td>
              </tr>
 
              </table>
           </div>
                     
      </div>
   
    </div>
     
    <div class="footer">
       <hr />
       <p align="center">Copyright 2009 PBCLS Team . All Rights Reversed .</p>
    </div>
</div>
</body>
</html>