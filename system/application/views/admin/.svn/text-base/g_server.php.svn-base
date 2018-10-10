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
          <h3>服务器设定</h3>
          <p>这里配置服务器和域名相关的设定. 请确保输入的数据是正确可靠的, 错误将导致email包含错误信息. 档输入域名时记住不包含            http:// 和其他协议头. 只有当您的服务器使用一个特别的端口时才需要更改端口号, 一般使用的都是80.</p>
          <br />
          
          <div class="mainbox">
              <br/>
            <form method="post" action="">
             <div class="mainbox1">
             <table width="340" height="30">
                <tr>
                <td height="" align="left" ><b>强制设定服务器URL:</b></td>
                </tr>
                <tr style="font-size:12px"><td height="" align="left" >如果设置为是,以下的设定将启用.</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>服务协议:</b></td>
                </tr>
                <tr style="font-size:12px"><td height="" align="left" >如果强制设定, 这将用于服务               器协议. 如果留空或未强制设定, 协议由cookie安全设定决定 (http:// or https://).</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>域名:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >网站所在域名 (例如: www.foo.bar).</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>服务器端口:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >服务器运行的端口,通常是 80,如果不清楚请不要更改.</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                

                           
             </table>
         
             </div>
             <div class="mainbox3">
              <table name="action1" width="350" height="30">
                  <tr style="font-size:12px">
                  <td height="" align="center"><input type="radio" name="server" value="是" />是
                  <input type="radio" name="server" value="否" />否
                  </td>
                  <tr><td align="center">&nbsp;</td></tr>
                  <tr><td align="center">&nbsp;</td></tr>

                  
                  
                  <tr style="font-size:12px" align="center">
                  <td><input type="text" name="" value="http://" /></td>
                  </td>     
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                    <tr><td align="center">&nbsp;</td></tr>
                  
                  
                  <tr align="center">
                  <td ><input type="text" name="" value="localhost" /></td>       
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                  <tr><td align="center">&nbsp;</td></tr>
                  
                  
                  <tr align="center">
                  <td ><input type="text" name="" value="80" /></td>      
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                  <tr><td align="center">&nbsp;</td></tr>
                  
                 </table>
         
             </div>
              <br />
             <table width="600" align="center">
             <tr><td>&nbsp;</td>
             <td width="200"><input type="submit" value="提交" /><input type="reset" value="重置" /></td>
             </tr>
             </table>
             
             </form>
         
       </div>

          
    </div>
        
    
    
<?php $this->load->view('admin/footer'); ?>
