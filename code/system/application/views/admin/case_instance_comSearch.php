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
            <div class="mainbar">
            <form name="typeform" method="post" action="<?php echo site_url('admin/caseadmin/instanceComplexSearch')?>">
            <table width="100" height="30" >
              <tr>             
                <td width="100" height="" align="center">
                <select name="searchtype" size="1" onChange="changetype()">
                  <option value="simple">简单查找</option>
                  <option value="multiple" selected="selected">复杂查找</option>
                </select>
                </td>
              </tr>
            </table>
            </form>
            </div>
         <h3>查找实例</h3>
         <p>用这个表单查找特定的实例。您不必填写所有的表格。匹配部分字符可以使用 * 作为通配符。当输入日期时请使用格式YYYY-MM-DD H:I:S，e.g. 2009-11-12 00:00:00。使用多选框选择一个或多个用户名（是否接受多个用户名取决于表单本身）并点击选择选中的按钮回到原先的表单。</p>
         <p>&nbsp;</p>
         <div class="mainbox">
         <br/>
             <form name="searchcase" method="post" action="<?php echo site_url('admin/caseadmin/instanceComsearchResult') ?>">
             <table width="680" align="center" style="font-size:12px">
             <tr>
             <th>实例名称：</th>
             <td><input name="instancename" type="text" value="" /></td>
             <th>案例名称：</th>
             <td><input name="casename" type="text" value="" /></td>
             </tr>                                    
             <tr>
             <th>创建者：</th>
             <td><input name="username" type="text" value="" /></td>
             <th>创建时间：</th>
             <td>
             <select name="createtimecomp" size="1">
             <option value="less">早于</option>
             <option value="=">等于</option>
             <option value=">">晚于</option>
             </select>
             <input name="creationtime" type="text" value="" />
             </td>
             </tr>  
               
             <tr>
             <th>实例状态：</th>
             <td>
             <select name="status" size="1">
             <option value="3">开始</option>
             <option value="6">结束</option>
             </select>
             </td>
             <th>排序：</th>
             <td>
                  <select name="sortkey">
                  <option value="instancename">实例名称</option>
                  <option value="casename">案例名称</option>
                  <option value="username">创建者</option>
                  <option value="creationtime">创建时间</option>
                  <option value="status">实例状态</option>                 
                  </select>
                  <select name="sort">
                  <option value="asc">升序</option>
                  <option value="des">降序</option>
                  </select>
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