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
          <h3>案例搜索结果</h3>
          <p>这里列出了搜索的所有案例.</p>
          <br />
    
            <table width="" border="1" align="center">
              <tr>
                <td width="200" align="center"><b>案例名</b></td>
                <td width="90" align="center"><b>创建者</b></td>
                <td width="180" align="center"><b>上传时间</b></td>
                <td width="70" align="center"><b>案例类型</b></td>
                <td width="70" align="center"><b>状态</b></td>
              </tr>
              <?php foreach($records as $row) { ?>
               <tr>
                <td align="center"><p><a href="casesearchinfo/<?php echo $row['uid'] ?>"><?php echo $row['casename']?></a></p></td>
                <td align="center"><p><?php echo $row['author']?></p></td>
                <td align="center"><p><?php echo $row['uploadtime']?></p></td>
                <td align="center"><p><?php if($row['casetype'] == 0) echo '自学案例';else echo '教学案例'?></p></td>
                <td align="center"><p><?php if($row['status'] == 0) echo '已启用';else echo '未启用'?></p></td>
                
              <?php	
              }?>
            </table>

        </div>
    </div>
        
    
    
<?php $this->load->view('admin/footer'); ?>
