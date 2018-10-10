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
          <h3>案例列表</h3>
          <p>这里列出了所有系统中所有的案例，你可以删除长期没有使用的案例.</p>
          <p><strong>注意：案例一旦删除将不能恢复，请审慎操作！</strong></p>

             <form id="user_form" name="user_form" action="<?php echo site_url('admin/caseadmin/action')?>" 

method="post" onSubmit="return checker(user_form)">	 

               
            <table width="" border="1" align="center">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200" align="center"><b>案例名</b></td>
                <td width="90" align="center"><b>创建者</b></td>
                <td width="180" align="center"><b>上传时间</b></td>
                <td width="70" align="center"><b>案例类型</b></td>
                <td width="70" align="center"><b>状态</b></td>
                <td width="70" align="center"><b>操作</b></td>
              </tr>
              <?php foreach($records as $row) { ?>
               <tr>
                <td align="center">
                  <input type="checkbox" name="checkbox" value="<?php echo $row['uid']?>" />
                </td>
                <td align="center"><p><a href="caseadmin/caseinfo/<?php echo $row['uid'] ?>"><?php echo $row['casename']?></a></p></td>
                <td align="center"><p><?php echo $row['author']?></p></td>
                <td align="center"><p><?php echo $row['uploadtime']?></p></td>
                <td align="center"><p><a href="caseadmin/action?do=changecasetype&id=<?php echo $row
['uid']?>"><?php if($row['casetype'] == 0) echo '自学案例';else echo '教学案例'?></a></p></td>

                <td align="center"><p><a href="caseadmin/action?do=changestatus&id=<?php echo $row
['uid']?>"><?php if($row['status'] == 0) echo '已启用';else echo '未启用'?></a></p></td>
                <td align="center"><p><a href="caseadmin/action?do=delete&id=<?php echo $row['uid']?>">
删除<a></p></td>
              <?php	
              }?>
            </table>
            
            
                 
            <table width="700" border="0" height="50">
              <tr>
                <td width="120"> 
                <p><input type="checkbox" name="all" onClick="check_all(this,'checkbox')" />全选/全不选</p>
                </td>
                <td width="90" align="center">
                <select name="operation" size="1" onChange="select_submit()">
                  <option value="">操作</option>
                  <option value="active">启用</option>
                  <option value="deactive">不启用</option>
                  <option value="delete">删除</option>
                </select></td>
                <td width="90" align="center">
                <select name="sort" size="1" onChange="changesort()">
                <option value="">排序</option>
                <option value="casename">案例名</option>
                <option value="author">创建者</option>
                <option value="uploadtime">上传时间</option>
                <option value="casetype">案例类型</option>
                <option value="status">案例状态</option>
                </select>
                </td>
              </tr>
            </table>
            <div style="width:800px;">
            <div style=" margin-left:400px;">
              
            </div>
            </div>   
            <input type="hidden" name="checkboxs" value="" />
            </form>
        </div>
    </div>
        
    
    
<?php $this->load->view('admin/footer'); ?>