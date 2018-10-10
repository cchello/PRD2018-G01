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
               <br />
        <h3>用户权限设定</h3>
        <p>权限基于简单的 是/否 系统. 设定用户组和用户选项为 从不 将覆盖其他设定的值. 如果您不希望给这个用户或用户组设定           值, 请选择 否 . 如果值在其他地方设定, 他们将在设定中使用, 否则请选择 从不 . 所有选中的对象 (他们前面的勾选框)           将复制您设置的权限组.</p>
            <br>
            <br>
             
           <div class="mainbox">
                   <table width="150" style="font-size:12px">
                       <tr>
                           <th align="left" width="75">用户名:</th>
                           <td style="font-size:12px"><?php echo $row['username']?></td>
                       </tr>
                       <tr>
                           <th align="left" width="75">用户类型:</th>
                           <td style="font-size:12px"><?php if($row['groupid'] == 0) echo '管理员';elseif($row['groupid'] == 1) echo '指导者';else echo '学习者'?></td>
                       </tr>
                   </table>
                   
                   <br>
                   <br>
                   
                      <table width="680" border="1" style="font-size:12px">
                        <tr>
                          <th width="170">权限</th>
                          <th width="170">是</th>
                          <th width="170">否</th>
                          <th width="170">从不</th> 
                        </tr>
                        <tr>
                          <th width="170">创建实例</th>
                          <td width="170" align="center"><input type="radio" name="instance" value="yes"></td>
                          <td width="170" align="center"><input type="radio" name="instance" value="no"></td>
                          <td width="170" align="center"><input type="radio" name="instance" value="allno"></td>
                        </tr>  
                        <tr>
                          <th width="170">BBS留言</th>
                          <td width="170" align="center"><input type="radio" name="bbs" value="yes"></td>
                          <td width="170" align="center"><input type="radio" name="bbs" value="no"></td>
                          <td width="170" align="center"><input type="radio" name="bbs" value="allno"></td>
                        </tr> 
                        <tr>
                          <th width="170">角色申请</th>
                          <td width="170" align="center"><input type="radio" name="role" value="yes"></td>
                          <td width="170" align="center"><input type="radio" name="role" value="no"></td>
                          <td width="170" align="center"><input type="radio" name="role" value="allno"></td>
                        </tr>    
                        <tr>
                          <th width="170">上传案例</th>
                          <td width="170" align="center"><input type="radio" name="case" value="yes"></td>
                          <td width="170" align="center"><input type="radio" name="case" value="no"></td>
                          <td width="170" align="center"><input type="radio" name="case" value="allno"></td>
                        </tr>    
                        <tr>
                          <th width="170">全部锁定</th>
                          <td width="170" align="center"><input type="radio" name="status" value="yes"></td>
                          <td width="170" align="center"><input type="radio" name="status" value="no"></td>
                          <td width="170" align="center"><input type="radio" name="status" value="allno"></td>
                        </tr>                                                  
                      </table>
                      <table width="680" style="font-size:12px">
                        <tr></tr>
                        <tr></tr>
                        <tr>
                          <td width="170">&nbsp;</td>  
                          <td width="170">&nbsp;</td>  
                          <td width="170" align="right"><input type="reset" value="重置"></td>  
                          <td width="170" align="center"><input type="submit" value="应用权限"></td>  
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