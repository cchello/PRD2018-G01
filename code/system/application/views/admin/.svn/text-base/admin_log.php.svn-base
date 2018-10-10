<?php $this->load->view('admin/admin_header'); ?>
<div class="maincontent">
  <div class="sidebar">
        <div class="sidebox">
            <p1><strong>系统任务</strong></p1>
            <hr />
            <table align="left" height="" width="100">
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin")?>"><p>系统更新</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin/language_pack")?>"><p>语言包</p></a></td>            </tr>
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
          <p1><strong>日志管理</strong></p1>
            <br />
            <hr />
          <table align="left" height="" width="100">
          <tr>
             <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin/admin_log")?>"><p>管理日志</p></a></td          ></tr>
          <tr>
             <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin/user_log")?>"><p>用户日志</p></a></td>          </tr>
          <tr>
         <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin/error_log")?>"><p>系统错误日志</p></a></td>          </tr>
          </table>    
                            
        </div>
        <div class="sidebox">
            <p1><strong>数据库管理</strong></p1>
             <br />
             <hr />
            <table align="left" height="" width="100">
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin/db_backup")?>"><p>数据库备份</p></a></td>
            </tr>
            <tr>
           <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/sysadmin/db_restore")?>"><p>数据库恢复</p></a></td>
            </tr>
            </table>                     
        </div>      
    </div>
  <div class="mainbody">
        <br />
        <h3>管理日志</h3>
        <p>这里列出了所有管理员登录后的操作记录。</p>
        <br />
        <br />
        <table width="700" border="1">
            <tr style="font-size:12px">
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>用户名</strong></td>
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>登陆IP</strong></td>
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>登陆时间</strong></td>
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>操作</strong></td>
                <td width="60"  height="20" bgcolor="#DDDDDB" align="center"><strong>标记</strong></td>
            </tr>
            <tr style="font-size:12px">
                <td height="20" align="center">admin</td>
                <td height="20" align="center">10.214.29.112</td>
                <td height="20" align="center">2009/10/24 22:00:00</td>
                <td height="20" align="center">登录成功</td>
                <td height="20" align="center">
                    <input type="checkbox" name="checkbox" value="" />
                </td>              
            </tr>
            <tr style="font-size:12px">
                <td height="20" align="center">admin</td>
                <td height="20" align="center">10.214.29.10</td>
                <td height="20" align="center">2009/10/26 19:55:00</td>
                <td height="20" align="center">登录成功</td>
                <td height="20" align="center">
                    <input type="checkbox" name="checkbox" value="" />
                </td> 
            </tr>             
         
        </table>
        <hr />
        <table width="700">
            <tr>
                <td width="600" height="20" align="right"><input type="submit" name="submit" value="删除所有" /></td>
                <td width="100" height="20" align="right"><input type="submit" name="submit" value="删除标记" /></td>
                
            </tr>
        </table>
        
    </div> 


</div>

<?php $this->load->view('admin/footer'); ?>

