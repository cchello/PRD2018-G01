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
          <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/homeadmin/usermanage")?>"><p>查找用户</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/homeadmin/casemanage")?>"><p>查找案例</p></a></td></tr>
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
          <p1><strong>客户端通信</strong></p1>
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
            <div class="mainbar">
            <form name="typeform" method="post" action="<?php echo site_url('admin/homeadmin/ccomplexsearch')?>">
            <table width="100" height="30" >
              <tr>             
                <td width="100" height="" align="center">
                <select name="searchtype" size="1" onChange="changetype()">
                  <option value="simple">简单查找</option>
                  <option value="multiple" selected="selected">复杂查找</option>
                </select>
                </td>
              </tr>
            </table>
            </form>
            </div>
         <h3>查找案例</h3>
         <p>用这个表单查找特定的案例。您不必填写所有的表格。匹配部分字符可以使用 * 作为通配符。当输入日期时请使用格式YYYY-MM-DD，e.g. 2009-11-12。使用多选框选择一个或多个用户名（是否接受多个用户名取决于表单本身）并点击选择选中的按钮回到原先的表单。</p>
         <div class="mainbox">
         <br/>
             <form name="searchcase" method="post" action="<?php echo site_url('admin/caseadmin/comsearchresult') ?>">
             <table width="680" align="center" style="font-size:12px">
             <tr>
             <th>案例名称：</th>
             <td><input name="casename" type="text" value="" /></td>
             <th>案例类型：</th>
             <td>
             <select name="casetype" size="1" >
             <option value="0">自学案例</option>
             <option value="1">教学案例</option>
             </select>
             </td>
             </tr>  
                                   
             <tr>
             <th>上传者：</th>
             <td><input name="uploader" type="text" value="" /></td>
             <th>上传时间：</th>
             <td>
             <select name="uploadtimecomp" size="1">
             <option value="less">早于</option>
             <option value="=">等于</option>
             <option value=">">晚于</option>
             </select>
             <input name="uploadtime" type="text" value="" />
             </td>
             </tr>  
               
             <tr>
             <th>案例作者：</th>
             <td>
             <input name="author" type="text" value="" />
             </td>
             <th>使用次数：</th>
             <td>
             <select name="usenocomp" size="1">
             <option value=">">大于</option>
             <option value="=">等于</option>
             <option value="less" >小于</option>
             </select>
             <input name="useno" type="text" value="" />
             </td>
             </tr> 
               
             <tr>
             <th>案例状态：</th>
             <td>
             <select name="status" size="1">
             <option value="0">已启用</option>
             <option value="1">未启用</option>
             </select>
             </td>
             <th>排序：</th>
             <td>
                  <select name="sortkey">
                  <option value="casename">名称</option>
                  <option value="uploader">上传者</option>
                  <option value="author">作者</option>
                  <option value="status">案例状态</option>
                  <option value="casetype">案例类型</option>
                  <option value="uploadtime">上传时间</option>
                  <option value="useno">使用次数</option>
                  </select>
                  <select name="sort">
                  <option value="asc">升序</option>
                  <option value="des">降序</option>
                  </select>
             </td>
             </tr>                
             </table>
             <br />
             <br />
             <table width="680" align="center" style="font-size:12px">
               <tr align="center"><td><input type="submit" value="提交" /><input type="reset" value="重置" /></td></tr>
             </table>
             
             </form>
         </div>
         
         
         
    </div>
     
    


</div>

<?php $this->load->view('admin/footer'); ?>
