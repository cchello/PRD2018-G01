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
          <h3>查找实例</h3>
          <p>这里列出了系统中您搜索到的实例，您可以删除长期没有开始的实例.</p>
          <p><strong>注意：实例一旦删除将不能恢复，请审慎操作！</strong></p>
          <br />
           <form id="user_form" name="user_form" action="<?php echo site_url('admin/caseadmin/instanceSearchResultAction');?>" method="post" onSubmit="return checker(user_form)">	       
            <table width="" border="1" align="center">
              <tr>
                <td width="40">&nbsp;</td>
                <td width="130" align="center"><b>实例名称</b></td>
                <td width="200" align="center"><b>所属案例</b></td>
                <td width="80" align="center"><b>创建者</b></td>
                <td width="150" align="center"><b>创建时间</b></td>
                <td width="60" align="center"><b>状态</b></td>
                <td width="60" align="center"><b>操作</b></td>
              </tr>
              <?php foreach($records as $row) { ?>
               <tr>
                <td align="center">
                  <input type="checkbox" name="checkbox" value="<?php echo $row['uid']?>" /></td>
                <td align="center"><p><?php echo $row['instancename']?></p></td>
                <td align="center"><p><?php echo $row['casename']?></p></td>
                <td align="center"><p><?php echo $row['username']?></p></td>
                <td align="center"><p><?php echo $row['creationtime']?></p></td>
                <td align="center"><p><?php if($row['status'] == 3) echo '开始';else echo '结束'?></p></td>            
                <td align="center"><p><a href="instanceSearchResultDelete/<?php echo $row['uid']?>/<?php echo $name ?>">删除<a></p></td>
              <?php	
              }?>
            </table>
                     
            <table width="300" border="0" height="50">
              <tr>
                <td width="120"> 
                <p><input type="checkbox" name="all" onClick="check_all(this,'checkbox')" />全选/全不选</p>
                </td>
                <td width="90" align="center">
                <select name="operation" size="1" onChange="select_submit()">
                  <option value="">操作</option>
                  <option value="delete">删除</option>
                </select>
                </td>
              </tr>
            </table>
            <input type="hidden" name="checkboxs" value="" />
            </form>
             
        </div>
    </div>
        
    
    
<?php $this->load->view('admin/footer'); ?>