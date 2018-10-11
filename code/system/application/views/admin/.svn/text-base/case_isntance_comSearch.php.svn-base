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
         <p>用这个表单查找特定的实例。您不必填写所有的表格。匹配部分字符可以使用 * 作为通配符。当输入日期时请使用格式YYYY-MM-DD，e.g. 2009-11-12。使用多选框选择一个或多个用户名（是否接受多个用户名取决于表单本身）并点击选择选中的按钮回到原先的表单。</p>
         <p>&nbsp;</p>
         <div class="mainbox">
         <br/>
             <form name="searchcase" method="post" action="<?php echo site_url('admin/caseadmin/comsearchresult') ?>">
             <table width="680" align="center" style="font-size:12px">
             <tr>
             <th>案例名称：</th>
             <td><input name="casename" type="text" value="" /></td>
             <th>案例类型：</th>
             <td>
             <select name="casetype" size="1" >
             <option value="0">自学案例</option>
             <option value="1">教学案例</option>
             </select>
             </td>
             </tr>  
                                   
             <tr>
             <th>上传者：</th>
             <td><input name="uploader" type="text" value="" /></td>
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
               
             <tr>
             <th>案例作者：</th>
             <td>
             <input name="author" type="text" value="" />
             </td>
             <th>使用次数：</th>
             <td>
             <select name="usenocomp" size="1">
             <option value=">">大于</option>
             <option value="=">等于</option>
             <option value="less" >小于</option>
             </select>
             <input name="useno" type="text" value="" />
             </td>
             </tr> 
               
             <tr>
             <th>案例状态：</th>
             <td>
             <select name="status" size="1">
             <option value="0">已启用</option>
             <option value="1">未启用</option>
             </select>
             </td>
             <th>排序：</th>
             <td>
                  <select name="sortkey">
                  <option value="casename">名称</option>
                  <option value="uploader">上传者</option>
                  <option value="author">作者</option>
                  <option value="status">案例状态</option>
                  <option value="casetype">案例类型</option>
                  <option value="uploadtime">上传时间</option>
                  <option value="useno">使用次数</option>
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