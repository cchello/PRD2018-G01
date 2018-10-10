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
            <p1><strong>快速入口</strong></p1>
            <hr />
            <table align="left" height="" width="100">
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/homeadmin/usermanage")?>"><p>用户管理</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/homeadmin/casemanage")?>"><p>案例管理</p></a></td></tr>
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
          <p1><strong>客户端设置</strong></p1>
            <br />
            <hr />
          <table align="left" height="" width="100">
          <tr>
             <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/homeadmin/email")?>"><p>Email设定</p></a></td></tr>
          <tr>
             <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/homeadmin/registerset")?>"><p>用户注册设定</p></a></td>          
          </tr>
          </table>    
                            
        </div>
        <div class="sidebox">
            <p1><strong>服务器配置</strong></p1>
             <br />
             <hr />
            <table align="left" height="" width="100">
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/homeadmin/cookie")?>"><p>Cookie设定</p></a></td>
            </tr>
            <tr>
           <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/homeadmin/server")?>"><p>服务器设定</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/homeadmin/security")?>"><p>安全设定</p></a></td>
            </tr>
            </table>                     
        </div>      
    </div>


        <div class="mainbody">
          <br />
          <h3>Email设定</h3>
          <p>在论坛向用户发送e-mail时将使用这个信息. 请确保e-mail地址有效, 任何被退回和无法投递的消息将很可能被发回至这个地址. 如果您的主机不提供本地(基于PHP的) email服务, 您可以使用SMTP发送消息. 这需要服务器的地址 (必要的话询问提供者). 如果服务器需要验证 (并且只有在需要时) 输入必要的用户名和密码.</p>
          <br />
          
          <div class="mainbox">
              <br/>
            <form method="post" action="">
             <div class="mainbox1">
             <table width="340" height="30">
                <tr>
                <td height="" align="left" ><b>允许系统发送email:</b></td>
                </tr>
                <tr style="font-size:12px"><td height="" align="left" >如果禁用,系统将不会发送任何email.</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>用户通过系统发送email:</b></td>
                </tr>
                <tr style="font-size:12px"><td height="" align="left" >可以使用系统发送email而不显示用户的email地址.</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>Email函数名称:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >在PHP中用于发送email的函数.</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>email联络地址:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >这将使用在任何需要指定联络方式的场合, 例如系统消息,技术联络等等.</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                
                
                 <tr>
                <td height="" align="left" ><b>Email签名:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >将在系统发送的email后附加这段文字.</td></tr>
                <tr><td>&nbsp;</td></tr>
                           
             </table>
         
             </div>
             <div class="mainbox3">
              <table name="action1" width="350" height="30">
                  <tr style="font-size:12px">
                  <td height="" align="center"><input type="radio" name="sysmail" value="启用" />启用
                  <input type="radio" name="sysmail" value="停用" />停用
                  </td>
                  <tr><td align="center">&nbsp;</td></tr>

                  
                  
                  <tr style="font-size:12px">
                  <td height="" align="center"><input type="radio" name="usermail" value="启用" />启用
                  <input type="radio" name="usermail" value="停用" />停用
                  </td>     
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                    <tr><td align="center">&nbsp;</td></tr>
                  
                  
                  <tr align="center">
                  <td ><input type="text" name="" value="mail" /></td>
                       
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                  <tr><td align="center">&nbsp;</td></tr>
                  
                  
                  <tr align="center">
                  <td><input type="text" name="" value="<?php echo "admin@163.com";?>" /></td>      
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                  <tr><td align="center">&nbsp;</td></tr>
                  
                  <tr align="center">
 
                  <td><textarea style="font-size:12px" name=comment rows=1 cols=21>感谢您对PBCLS项目的关注!</textarea>
                  </td>
                  </tr>

                 </table>
         
             </div>
              <br />
             <table width="600" align="center">
             <tr><td>&nbsp;</td>
             <td width="180"><input type="submit" value="提交" /><input type="reset" value="重置" /></td>
             </tr>
             </table>
             
             </form>
         
       </div>

          
    </div>
        
    
    
<?php $this->load->view('admin/footer'); ?>
