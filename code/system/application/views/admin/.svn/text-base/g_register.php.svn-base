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
          <h3>用户注册设定</h3>
          <p>这里您可以进行用户注册和资料修改相关的设置.</p>
          <br />
          
          <div class="mainbox">
              <br/>
            <form method="post" action="">
             <div class="mainbox1">
             <table width="340" height="30">
                <tr>
                <td height="" align="left" ><b>帐号激活:</b></td>
                </tr>
                <tr style="font-size:12px"><td height="" align="left" >这决定了用户是否可以在注册后立刻浏览论坛, 还是必须进行确认. 您也可以禁止新用户注册.</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>用户名长度:</b></td>
                </tr>
                <tr style="font-size:12px"><td height="" align="left" >用户名字符的最大和最小长度.</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>密码长度:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >在PHP中用于密码长度:</td></tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>限制用户名字符:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >限制用于用户名的字符类型, 包括; 空格, -, +, _, [ 和 ]</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                
                
                 <tr>
                <td height="" align="left" ><b>允许重复使用email地址:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >不同的用户可以使用相同的email注册.</td></tr>
                <tr><td>&nbsp;</td></tr>
                           
             </table>
         
             </div>
             <div class="mainbox3">
              <table name="action1" width="350" height="30">
                  <tr style="font-size:12px">
                  <td height="" align="center"><input type="radio" name="regaccount" value="禁止" />禁止
                  <input type="radio" name="regaccount" value="无" />无<input type="radio" name="regaccount" value="由用户" />由用户<input type="radio" name="regaccount" value="由管理员" />由管理员
                  </td>
                  <tr><td align="center">&nbsp;</td></tr>
                   <tr><td align="center">&nbsp;</td></tr>


                  
                  
                  <tr style="font-size:12px">
                  <td height="" align="center"><input type="text" size="1" />&nbsp;最小&nbsp;<input type="text" size="1" />&nbsp;最大
                  </td>    
                 
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                   <tr><td align="center">&nbsp;</td></tr>
              

                  
                  <tr align="right" style="font-size:12px">
                  <td height="" align="center"><input type="text" size="1" />&nbsp;最小&nbsp;<input type="text" size="1" />&nbsp;最大
                  </td>  
                    
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                   <tr><td align="center">&nbsp;</td></tr>
        
                  
                  
                  <tr align="center">
                  <td><input type="text" name="" value="" /></td>      
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
              
         
                  
                  <tr>
                  <td height="" align="center" style="font-size:12px"><input type="radio" name="regmail" value="是" />是
                  <input type="radio" name="regmail" value="否" />否
                  </td>
                 
                  </tr>

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

