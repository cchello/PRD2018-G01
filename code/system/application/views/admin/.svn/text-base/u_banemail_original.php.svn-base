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
                
                
             <div class="sidebar">   <!-- sidebar这一层 -->
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
            
             </div>  <!-- sidebar这一层 -->          
                      
         <div class="mainbody">
         
            <h3>封禁信箱地址</h3>
          <p>在这里您可以进行对IP地址或信箱地址的封禁操作。如果愿意，您可以给出一个简短（至多255字节）的封禁理由，它将显示在管理记录中。您也可以控制封禁期限，如果您希望设定一个封禁解除日期，请将封禁期限设定为 直到 ，并在下面以 yyyy-mm-dd（年-月-日）的格式填入日期。</p>
            <p>要指定多个Email地址，请在每行输入一个。可以使用 * 作为通配符，例如：*@hotmail.com，*@*.domain.tld，等.</p>
            <br />
            
            <div class="mainbox">
              <br/>
            <form method="post" action="">
             <div class="mainbox1">
             <table width="340" height="30">
                <tr>
                <td height="" align="left" ><b>Email 地址:</b></td>
                </tr>
                <tr style="font-size:12px"><td height="" align="left" >&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>封禁期限:</b></td>
                </tr>
                <tr style="font-size:12px"><td height="" align="left" >&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>封禁原因:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" align="left" >&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>                         
             </table>     
                 
             </div><!-- mainbox1-->
             
             <div class="mainbox3">
              <table name="action1" width="350" height="30">
                  <tr style="font-size:12px" align="left">
                  <td width="60">&nbsp;</td>
                  <td><textarea name="emaillist" rows="3" cols="22" wrap="soft"></textarea></td>
            
                  <tr style="font-size:12px">
                  <td width="60">&nbsp;</td>
                  <td height="" align="left">
                  <select name="bantime" size="1" onChange="<?php ?>">
                  <option value="" selected>永久</option>
                  <option value="">1小时</option>
                  <option value="">12小时</option>
                  <option value="">1天</option>
                  <option value="">7天</option>
                  <option value="">14天</option>
                  <option value="">30天</option>
                  </select>
                  </td>                  
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
         
                  <tr align="left" style="font-size:12px">
                  <td width="60">&nbsp;</td>
                  <td width="" height="" align="left"><input type="text" name="" value="" /></td>      
                  </tr>
                  
                 </table>
         
             </div>  <!--mainbox3-->
              <br />
             <table width="600" align="left">
             <tr><td>&nbsp;</td>
             <td width="200"><input type="submit" value="提交" /><input type="reset" value="重置" /              ></td>
             </tr>
             </table>
             
             </form>
         
             </div><!-- mainbox-->
             <div class="mainbox">
                  <br />
                  <h4>解除封禁Email地址</h4>
                  <p>您可以选择多个Email地址并对其执行解除封禁的操作。</p>
                  <form method="post" action="">
                  <div class="mainbox1">
                  <table width="340" height="30">
                  <tr>
                  <td height="" align="left" ><b>Email 列表:</b></td>
                  </tr>
                  <tr style="font-size:12px"><td height="" align="left" >&nbsp;</td></tr>
                  <tr><td>&nbsp;</td></tr>      
                  </table>
         
                  </div>
                  <div class="mainbox3">
                  <table name="action1" width="350" height="30">
                  <tr style="font-size:12px" align="left">
                  <td width="60">&nbsp;</td>
                  <td>
                  <select name="activemail" size="3" onChange="">
                  <?php 
				 foreach ($records as $row)
				 {
				 ?>
                  <option value="<?php echo $row['email'] ?>"><?php echo $row['email'] ?></option>
                   <?php 
			     }
				 ?>
                  </select>
                  </td>
                  
                  <tr><td></td></tr>                  
                  </table>
                  
                  </textarea></td>
                  </table>     
                  </div>
                  <table width="600" align="left">
                    <tr><td>&nbsp;</td>
                     <td width="200"><input type="submit" value="解除封禁" /></td>
                    </tr>
                   </table>
                  </form>
             </div><!--mainbox-->
         
           </div><!--mainbody-->
          
          </div> <!-- maincontent这一层 -->
            
         
     
      <div class="footer">
       <hr />
       <p align="center">Copyright 2009 PBCLS Team . All Rights Reversed .</p>
      </div>
</div>
</body>
</html>