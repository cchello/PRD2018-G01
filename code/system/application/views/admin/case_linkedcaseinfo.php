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
             <table width="680" align="center" style="font-size:12px">
             <tr>
             <th>案例名称：</th>
             <td><?php echo $records['casename'] ?></td>
             <th>案例类型：</th>
             <td><?php if($records['casetype'] == 0) echo '自学案例';else echo '教学案例'?></td>
             </tr>            
             <tr>
             <th>案例作者：</th>
             <td><?php echo $records['author']?></td>
             <th>案例版本：</th>
             <td><?php echo $records['version']?></td>
             
             </tr>
             <tr>
             <th>上传者：</th>
             <td><?php if($records['uploader'] == 0) echo '管理员';else echo '用户'?></td>
             <th>上传时间：</th>
             <td><?php echo $records['uploadtime']?></td>
             </tr>    
             <tr>
             <th>案例状态：</th>
             <td><?php if($records['status'] == 0) echo '已启用';else echo '未启用'?></td>
             <th>实例个数：</th>
             <td><?php echo $records['instances']?></td>
             </tr>   
             <tr>
             <th>案例简介：</th>
             <td colspan="3"><textarea rows="3" cols="61"><?php echo $records['description']?></textarea></td>
             </tr>                
             </table>
             <br />
             <br />
                         
         </div>

          
          
          
          
      </div>      
      
      
</div>
        
    
    
<?php $this->load->view('admin/footer'); ?>
