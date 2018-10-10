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
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/useradmin/userlist")?>">
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
            <div class="mainbar">
            <form name="typeform" method="post" action="<?php echo site_url('admin/useradmin/userinfotype')?>">
            <table width="100" height="30" >
              <tr>             
                <td width="100" height="" align="center">
                <select name="searchtype" size="1" onChange="changetype()">
                  <option value="general">纵览</option>
                  <option value="info" selected="selected">资料</option>
                  <option value="avatar">头像</option>
                  <option value="permission">权限</option>
                </select>
                </td>
              </tr>
            </table>
             <input type="hidden" name="username" value="<?php echo $row['username']?>" />
            </form>
            </div>
         <h3>用户信息</h3>
         <p>这里您可以改变您的用户信息和一些特定选项.</p>
         
         <div class="mainbox">
              <br/>
              <form method="post" action="<?php echo site_url('admin/useradmin/updateinfo2') ?>">
              <table width="640">
              <tr align="center" style="font-size:12px" height="30">
              <th width="300" align="left">完成的案例：</th>
              <td width="340" style="border-left: thin solid #CACACA" align="center"><input name="finisheds" type="text" value="<?php echo $row['finisheds']?>"></td>
              </tr>
              <tr align="left" style="font-size:12px" height="30">
              <th width="300" align="left">正在进行的案例：</th>
              <td width="340" style="border-left: thin solid #CACACA" align="center"><input name="ongoings" type="text" value="<?php echo $row['ongoings']?>"></td>
              </tr>
              <tr align="left" style="font-size:12px" height="30">
              <th width="300" align="left">QQ 号码：</th>
              <td width="340" style="border-left: thin solid #CACACA" align="center"><input name="qq" type="text" value="<?php echo $row['qq']?>"></td>
              </tr>
               <tr align="left" style="font-size:12px" height="30">
              <th width="300" align="left">MSN 账号：</th>
              <td width="340" style="border-left: thin solid #CACACA" align="center"><input name="msn" type="text" value="<?php echo $row['msn']?>"></td>
              </tr>
               <tr align="left" style="font-size:12px" height="30">
              <th width="300" align="left">个人主页：</th>
              <td width="340" style="border-left: thin solid #CACACA" align="center"><input name="homepage" type="text" value="<?php echo $row['homepage']?>"></td>
              </tr>
               <tr align="left" style="font-size:12px" height="30">
              <th width="300" align="left">爱好：</th>
              <td width="340" style="border-left: thin solid #CACACA" align="center"><input name="interests" type="text" value="<?php echo $row['interests']?>"></td>
              </tr>
               <tr align="left" style="font-size:12px" height="30">
              <th width="300" align="left">个性签名：</th>
              <td width="340" style="border-left: thin solid #CACACA" align="center"><input name="signature" type="text" value="<?php echo $row['signature']?>"></td>
              </tr>
              </table>
              <table width="600" align="center">
              <tr><td>&nbsp;</td>
              <td width="200"><input type="submit" value="提交" /><input type="reset" value="重置" /></td>
              </tr>
              </table>
              <input type="hidden" name="uid" value="<?php echo $row['uid'] ?>"  />
              <input type="hidden" name="username" value="<?php echo $row['username'] ?>"  />
              </form>
         
       </div>
                
    </div> 


</div>

<?php $this->load->view('admin/footer'); ?>


