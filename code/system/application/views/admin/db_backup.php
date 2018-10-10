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
        <h3>数据库备份</h3>
        <p>这里您可以备份所有PBCLS相关的数据. 您可以将备份保存在 store/ 文件夹下. 如果您的服务器支持, 您可以将文件压缩成好几种格式.</p>       
        <div class="mainbox">                   
            <div class="mainbox1">
                <table width="200" height="90" align="left">
                   <tr>
                     <td height="30" align="center"><b>备份类型：</b></td>
                  </tr>
                  <tr>
                    <td height="30" align="center"><b>文件类型：</b></td>
                  </tr>
                  <tr>
                    <td height="30" align="center"><b>操作：</b></td>
                  </tr>     
                </table>
          
            </div>
            <div class="mainbox2">
              <form name="备份形式" method="post" action="<?php echo site_url("admin/sysadmin/dbbackup_action")?>">
              <table width="350" height="" >
              <tr>
                  <td height="30" width="114" ><input name="backup_style" type="radio" value="1" checked="checked" />
                <b>完整</b></td>
                  <td height="30" width="130" ><input type="radio" name="backup_style" value="2" />
                  <b>仅结构</b></td>
                  <td height="30" width="90" ><input type="radio" name="backup_style" value="3" />
                  <b>仅数据</b></td>
              </tr>
              <tr>
                  <td height="30" width="114"><input name="mycheck" type="radio" value="1" />
                <b>gzip</b></td>
                  <td height="30" width="130"><input type="radio" name="mycheck" value="2" checked="checked" />
                  <b>zip</b></td>
                  <td height="30" width="130"><input type="radio" name="mycheck" value="3" />
                  <b>text</b></td>
              </tr>
              <tr>
                  <td height="30" width="114"><input type="radio" name="operate" value="1" />
                  <b>存储并下载</b></td>
                  <td height="30" width="130"><input name="operate" type="radio" value="2" checked="checked" />
                <b>本地存储文件</b></td>
                  <td height="30" width="90"><input type="radio" name="operate" value="3" />
                  <b>下载</b></td>
              </tr>
              <tr>
                  <td>&nbsp;</td>
              </tr>
              <tr>
                  <td width="114" align="left"><input type="submit" name="submit" value="提交" /></td>
                  <td width="130" align="left"><input type="reset" name="reset" value="重置" /></td>
              </tr>
              </table> 
              </form>
                    
            </div>
        
        </div>  

        
        
                 
        
    </div> 
   


</div>

    <div class="footer">
       <hr />
       <p align="center">Copyright 2009 PBCLS Team. All Rights Reserved.</p>
    </div>
</div>
</body>
</html>


