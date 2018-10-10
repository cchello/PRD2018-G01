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
          <h3>安全设定</h3>
          <p>这里您可以进行对话和登录相关的设定.</p>
          <br />
          
          <div class="mainbox">
              <br/>
            <form method="post" action="">
             <div class="mainbox1">
             <table width="340" height="30">
                <tr>
                <td height="" align="left" ><b>允许自动登录:</b></td>
                </tr>
                <tr style="font-size:12px"><td height="" align="left" >决定用户是否可以在浏览论坛时自动登录.</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>自动登录失效时间 (天数):</b></td>
                </tr>
                <tr style="font-size:12px"><td height="" align="left" >设置为0将取消限制.</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>强制密码变更:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >强制用户在一段时间(天数)后更改密码. 设置为0则取消限制.</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>最大登录尝试次数:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >在超过尝试次数后用户必须进行可视化登录验证.</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                            
             </table>
         
             </div>
             <div class="mainbox3">
              <table name="action1" width="350" height="30">
                  <tr style="font-size:12px">
                  <td height="" align="center"><input type="radio" name="security" value="是" />是
                  <input type="radio" name="security" value="否" />否
                  </td>
                  <tr><td align="center">&nbsp;</td></tr>

                  
                  
                  <tr style="font-size:12px">
                  <td height="" align="center"><input type="text" size="1" value="0" />天
                  </td>     
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                    <tr><td align="center">&nbsp;</td></tr>
                  
                  
                  <tr style="font-size:12px">
                  <td height="" align="center"><input type="text" size="1" value="0" />天
                  </td>     
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                  <tr><td align="center">&nbsp;</td></tr>
                  
                  
                  <tr style="font-size:12px">
                  <td height="" align="center"><input type="text" size="1" value="0" />次
                  </td>     
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

