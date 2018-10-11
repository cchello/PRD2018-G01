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
            <table align="left" height="" width="150" style="font-size:12px">
            <tr>
            <td height="20" width="150" align="left"><a href="<?php echo site_url("admin/useradmin/banemail")?>">
            <p>封禁Email地址</p></a></td>
            </tr>
            <tr>
            <td height="20" width="150" align="left"><a href="<?php echo site_url("admin/useradmin/banip")?>">
            <p>封禁IP地址</p></a></td>
            </tr>
             <!-- 封禁用户名的功能和冻结用户的功能重复了，所以删除此功能.
                   <tr>
                   <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/useradmin/banusername")?>">
                   <p>封禁用户名</p></a></td></tr>
                   -->
            <tr>
            <td height="20" width="150" align="left"><a href="<?php echo site_url("admin/useradmin/banregname")?>">
            <p>禁止注册的用户名</p></a></td></tr>
            <tr>
            <td height="20" width="150" align="left"><a href="<?php echo site_url("admin/useradmin/prune")?>">
            <p>裁剪用户</p></a></td></tr>
            
            </table>                   
            </div>     
            
    </div>
      
     <div class="mainbody">
       <br />
            <h3>用户列表</h3>
            <p>这里列出了所有用户，你可以对现有用户的进行激活、锁定或删除用户.</p>
            
       <br />
            
            <form id="user_form" name="user_form" action="<?php echo site_url('admin/useradmin/action')?>" method="post" onSubmit="return checker(userform)">	       
            <table border="1">
            <tr style="font-size:12px" align="center">
            <th width="30">&nbsp;</th>
            <th width="50">用户ID</th>
            <th width="100">用户名</th>
            <th width="140">电子邮件</th>
            <th width="180">注册时间</th>
            <th width="80">用户类型</th>
            <th width="70">状态</th>
            <th width="70">操作</th>
            </tr>
            
            <?php foreach($records as $row) { ?>
            
            <tr style="font-size:12px" align="center">
            <td><input type="checkbox" name="checkbox" value="<?php echo $row['uid']?>" /></td>
            <td><?php echo $row['uid'] ?></td>
            <td><a href="useradmin/userlinkedinfo/<?php echo $row['uid'] ?>"><?php echo $row['username']?></a></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['registertime']?></td>
            <td><?php if($row['groupid'] == 0) echo '管理员';elseif($row['groupid'] == 1) echo '指导者';else echo '学习者'?></td>
            <td><a href="useradmin/action?do=changestatus&userid=<?php echo $row['uid']?>"><?php if($row['status'] == 0) echo '已激活';else echo '未激活'?></a></td>
            <td><a href="useradmin/action?do=delete&userid=<?php echo $row['uid']?>">删除</a></td>
            </tr>
            
             <?php	}?>
      
            </table>
                     
            <table width="300" border="0" height="50">
             <tr>
                <td width="120"> 
                <p><input type="checkbox" name="all" onClick="check_all(this,'checkbox')" />全选/全不选</p>
                </td>
                <td width="90" align="center">
                <select name="operation" size="1" onChange="select_submit()">
                  <option value="">操作</option>
                  <option value="active">激活</option>
                  <option value="deactive">不激活</option>
                  <option value="delete">删除</option>
                </select></td>   
                <td width="90" align="center">
                <select name="sort" size="1" onChange="changesort()">
                <option value="">排序</option>
                <option value="uid">用户ID</option>
                <option value="username">用户名</option>
                <option value="email">Email</option>
                <option value="regtime">注册时间</option>
                <option value="usertype">用户类型</option>
                <option value="status">用户状态</option>
                </select>
                </td>           
              </tr>
          </table>
          <input type="hidden" name="checkboxs" value="" />
          </form>
            
              
        </div>
    
    </div>
     
    <div class="footer">
       <hr />
       <p align="center">Copyright 2009 PBCLS Team . All Rights Reversed .</p>
    </div>
</div>
</body>
</html>
