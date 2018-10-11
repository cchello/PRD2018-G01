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
        <h3>数据库恢复</h3>
        <p>这将使用备份文件进行一次所有PBCLS表单的完整恢复. 如果您的服务器支持您可以使用gzip或bzip2格式压缩的文本文件. </p>
        <p><strong>警告:</strong> </p>
        <p>这将覆盖所有现在的数据. 恢复可能需要一个很长的时间, 在其完成前请不要动这个页面. 备份存储在 store/文件夹,由PBCLS的备份功能生成. 使用由其他系统生的备份进行恢复操作可能会失败.</p>             
         <br />
        <div class="mainbody" >
                        
        <form method="post" action="<?php echo site_url("admin/sysadmin/dbrestore_action")?>">
        <table>
        <tr><th align="center" style="font-size:12px">请选择一个备份：</th></tr>
        </table>
        <table width="400" height="60" align="center" border="1">
          <tr>
            <td width="200" bgcolor="#DDDDDB" align="center"><b>备份数据</b></td>  
            <td width="200" bgcolor="#DDDDDB" align="center"><b>备份时间</b></td>                    
          </tr>   
          
          <?php foreach($result as $row)
		  {
          ?>         
          <tr align="center" style="font-size: 12px;">
          <td><input type="radio" name="db" value="<?php echo $row['name']?>" /><b><?php echo $row['name']?></b></td>
          <td><?php echo date('Y-m-d h:i:s',$row['date'])?></td>
          
          </tr>
          <?php
          }
          ?>
          <tr align="center" style="font-size:12px">
          <td colspan="2"><input type="radio" name="action" value="1" />恢复<input type="radio" name="action" value="2" />删除</td>
          </tr>
                                            
        </table>
        
        <table width="300" height="30" align="center" >
          <tr><td>&nbsp;</td></tr>
          <tr align="center">
          <td><input type="submit" name="submit" value="提交" /></td>
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



