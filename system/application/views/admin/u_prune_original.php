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
          <h3>裁减用户</h3>
          <p>这里您可以将论坛中的会员删除（或者冻结）。 你可以有多种形式搜寻，然后删除。如：发帖数量和最后一次的时间等等... 这些方式可以自由组合，如：你可以选用2001年1月1日之前发贴量少于10篇的会员来删除。 你也可以选择批量删除，只需要将会员名单放进删除栏目中即可。此功能须小心使用！ 一旦用户被删除后将无法再恢复。</p>
          <br />
          
          <div class="mainbox">
              <br/>
            <form method="post" action="">
             <div class="mainbox1">
             <table width="340" height="30">
                <tr>
                <td height="" align="left" ><b>用户名:</b></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>Email:</b></td>
                </tr>               
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>注册:</b></td>
                </tr>
                 <tr style="font-size:12px"><td width="300" height="" align="left" >输入日期，使用 YYYY-MM-DD 格式</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>最后活动:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >输入日期，使用 YYYY-MM-DD 格式</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                
                 <tr>
                <td height="" align="left" ><b>完成案例:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >&nbsp;</td>
                </tr>
                
                 <tr>
                <td height="" align="left" ><b>裁剪用户:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >在这里输入特定会员，他们将会用于上述的设定标准</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                
                
                 <tr>
                <td height="" align="left" ><b>冻结或者删除:</b></td>
                </tr>
                <tr style="font-size:12px"><td width="300" height="" align="left" >选择冻结会员或者删除会员，注：此操作无法回复！</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                
                
                           
             </table>
         
             </div>
             <div class="mainbox3">
              <table name="action1" width="350" height="30">
                  <tr style="font-size:12px" align="center">
                  <td height="" align="center"><input type="text" value="" />
                  </td>
                  <tr><td align="center">&nbsp;</td></tr>
         
                  
                  <tr style="font-size:12px" align="center">                 
                  <td height="" align="center"><input type="text" value="<?php echo "" ?>" />
                  </td>    
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                  
                  <tr style="font-size:12px" align="center">
                  <td align="center">
                  <select name="" size="1">
                  <option value="before">早于</option>
                  <option value="after">晚于</option>
                  </select>                                    
                  <input type="text" size="11" value="<?php echo "" ?>" />
                  </td>    
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                  
                  
                  <tr style="font-size:12px" align="center">
                  <td align="center">
                  <select name="" size="1">
                  <option value="before">早于</option>
                  <option value="after">晚于</option>
                  </select>      
                  <input type="text" size="11" value="<?php echo "" ?>" />
                  </td>    
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                
                  <tr align="center" style="font-size:12px">
                  <td align="center">
                  <select name="" size="1">
                  <option value="equ">等于</option>
                  <option value="less">小于</option>
                  </select>                    
                  <input type="text" size="11" value="" />
                  </td>                      
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>
                  
                  
                  
                  <tr align="center">
                 
                  <td height="" align="center"><textarea style="font-size:12px" name=comment rows=1 cols=21></textarea>
                  </td>
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>

        
                  
                  
                  <tr align="center" style="font-size:12px">
                  <td height="" align="center"><input type="radio" name="" value="冻结" />冻结
                  <input type="radio" value="删除" />删除
                  </td>     
                  </tr>
                  <tr><td align="center">&nbsp;</td></tr>         

                 </table>
         
             </div>
              <br />
             <table width="600" align="center">
             <tr><td>&nbsp;</td>
             <td width="205"><input type="submit" value="提交" /><input type="reset" value="重置" /></td>
             </tr>
             </table>
             
             </form>
         
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