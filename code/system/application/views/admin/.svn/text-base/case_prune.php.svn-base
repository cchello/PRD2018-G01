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
          <h3>裁减案例</h3>
        <p>这里您可以将系统中的案例删除（或者冻结）。 你可以有多种形式搜寻，然后删除。如：完成数量和最后一次使用的时间等等... 这些方式可以自由组合，如：你可以选用2009年11月15日之前使用量少于10的案例来删除。 你也可以选择批量删除，只需要将案例名单放进删除栏目中即可。此功能须小心使用！ 一旦案例被删除后将无法再恢复。</p>
          <br />
          <div class="mainbox">
         <br/>
             <form name="searchuser" method="post" action="<?php echo site_url('admin/caseadmin/prune') ?>">
             <table width="680" align="center" style="font-size:12px">
             <tr>
             <th>案例名称：</th>
             <td><input name="casename" type="text" value="" /></td>
             <th>案例状态：</th>
             <td>
             <select name="status" size="1">
             <option value="0">已启用</option>
             <option value="1">未启用</option>
             </select>
             </td>
             </tr>            
            
             <tr>
             <th>上传者：</th>
             <td><input name="uploader" type="text" value="" /></td>
             <th>案例类型：</th>
             <td>
             <select name="casetype" size="1" >
             <option value="0">自学案例</option>
             <option value="1">教学案例</option>
             </select>
             </td>
             </tr>  
                 
              <tr>
             <th>案例作者：</th>
             <td><input name="author" type="text" value="" /></td>
             <th>使用次数：</th>
             <td>
             <select name="usenocomp" size="1">
             <option value=">">大于</option>
             <option value="=">等于</option>
             <option value="less">小于</option>
             </select>
             <input name="useno" type="text" value="" />
             </td>
             </tr>  
             
              <tr>
             <th>冻结或删除：</th>
             <td><input type="radio" name="operation" value="deactive" />冻结<input type="radio" name="operation" value="delete" />删除</td>
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