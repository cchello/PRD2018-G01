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
          <h3>冻结的案例</h3>
          <p>这里列出了系统中所有冻结的案例，你可以改变案例的状态.</p>
          <br />

            <form id="user_form" name="user_form" action="<?php echo site_url('admin/caseadmin/action')?>" 

method="post" onSubmit="return checker(userform)">	       
            <table width="" border="1" align="center">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="160" align="center"><b>案例名</b></td>
                <td width="100" align="center"><b>创建者</b></td>
                <td width="200" align="center"><b>上传时间</b></td>
                <td width="100" align="center"><b>案例类型</b></td>
                <td width="70" align="center"><b>状态</b></td>
                <td width="50" align="center"><b>操作</b></td>
              </tr>
              <?php foreach($records as $row) { ?>
               <tr>
                <td align="center">
                  <input type="checkbox" name="checkbox" value="<?php echo $row['uid']?>" />
                </td>
                <td align="center"><p><?php echo $row['casename']?></p></td>
                <td align="center"><p><?php echo $row['author']?></p></td>
                <td align="center"><p><?php echo $row['uploadtime']?></p></td>
                <td align="center"><p><?php if($row['casetype'] == 0) echo '自学案例';else echo '教学案例'?></p></td>

                <td align="center"><p><?php if($row['status'] == 0) echo '已启用';else echo '未启用'?></p></td>
                <td align="center"><a href="activestatus/<?php echo $row['uid']?>"><p>启用</p></a></td>
              <?php	
              }?>
            </table>
                     
            <table width="298" border="0" height="50">
              <tr>
                <td width="155"> 
                <p><input type="checkbox" name="all" onClick="check_all(this,'checkbox')" />全选/全不选</p>
                </td>
                <td width="133">
                <select name="operation" size="1" onChange="select_submit()">
                  <option value="">操作</option>
                  <option value="active">启用</option>
                </select></td>
              </tr>
            </table>
            <input type="hidden" name="checkboxs" value="" />
            </form>
    
        </div>
    </div>
        
    
    
<?php $this->load->view('admin/footer'); ?>