<?php $this->load->view('admin/admin_header'); ?>

      <div class="maincontent">
        <div class="sidebar">
          <div class="sidebox">
            <p1><strong>案例管理</strong></p1>
            <hr />
               <table align="left" height="" width="100">
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/casesearch")?>"><p>查找案例</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin")?>"><p>案例列表</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/instanceadmin")?>"><p>实例列表</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/inactivecase")?>"><p>冻结的案例</p></a>            </td></tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/uploadcase")?>"><p>案例上传</p></a>           </td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/prunecase")?>"><p>裁剪案例</p></a>            </td>
            </tr>
            </table>           
          </div>  
          <div class="sidebox">
          <p1><strong>实例管理</strong></p1>
            <hr />
           <table align="left" height="" width="100">
            
              <tr>
              <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/instanceSearch")?>"><p>查找实例</p>
              </a></td>
              </tr>
              <tr>
              <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/instanceadmin")?>"><p>实例列表</p>
              </a></td>
              </tr>
           </table> 
          </div>
            
        </div>


      <div class="mainbody">
          <br />
          <h3>案例信息</h3>
          <p>这里列出了案例的相关信息.</p>
          <br />
           <div class="mainbox">
         <br/>
             <form name="caseinfo" method="post" action="<?php echo site_url('admin/caseadmin/updatecase') ?>">
             <table width="680" align="center" style="font-size:12px">
             <tr>
             <th>案例名称：</th>
             <td><input type="text" size="20" name="casename" value="<?php echo $records['casename'] ?>" ></td>
             <th>案例类型：</th>
             <td><input type="text" size="6" name="type" value="<?php if($records['casetype'] == 0) echo '自学案例';else echo '教学案例'?>" >
             <select name="casetype" size="1">
             <option>操作</option>
             <option value="0">自学案例</option>
             <option value="1">教学案例</option>
             </select>
             </td>
             </tr>            
             <tr>
             <th>案例作者：</th>
             <td><input type="text" size="20" name="author" value="<?php echo $records['author']?>" ></td>
             <th>案例版本：</th>
             <td><input type="text" size="20" name="version" value="<?php echo $records['version']?>" ></td>
             
             </tr>
             <tr>
             <th>上传者：</th>
             <td><input type="text" size="20" name="uploader" value="<?php if($records['uploader'] == 0) echo '管理员';else echo '用户'?>" ></td>
             <th>上传时间：</th>
             <td><input type="text" size="20" name="uploadtime" value="<?php echo $records['uploadtime']?>" ></td>
             </tr>    
             <tr>
             <th>案例状态：</th>
             <td><input type="text" size="8" name="status" value="<?php if($records['status'] == 0) echo '已启用';else echo '未启用'?>" >
             <select name="casestatus" size="1">
             <option>操作</option>
             <option value="0">已启用</option>
             <option value="1">未启用</option>
             </select>
             </td>
             <th>实例个数：</th>
             <td><input type="text" size="20" name="instanceno" value="<?php echo $records['instances']?>" ></td>
             </tr>   
             <tr>
             <th>案例简介：</th>
             <td colspan="4"><textarea style="font-size:12px" name="description" rows="5" cols="69"><?php echo $records['description']?></textarea></td>
             </tr>                
             </table>
             <br />
             <br />
             <table width="680" align="center" style="font-size:12px">
               <tr align="center"><td><input type="submit" value="提交" /><input type="reset" value="重置" /></td></tr>
             </table>
             <input type="hidden" name="caseid" value="<?php echo $records['uid']?>" >
             </form>
         </div>

          
          
          
          
      </div>      
      
      
</div>
        
    
    
<?php $this->load->view('admin/footer'); ?>