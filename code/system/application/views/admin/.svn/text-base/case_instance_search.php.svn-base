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
                  <option value="simple" selected="selected">简单查找</option>
                  <option value="multiple">复杂查找</option>
                </select>
                </td>
              </tr>
            </table>
            </form>
            </div>
         <h3>查找实例</h3>
         <p>这里你可以快速查找并管理实例.</p>
         
         
         
         <div class="mainbox">
         <br/>
             <form name="searchuser" method="post" action="<?php echo site_url('admin/caseadmin/instanceSimSearchResult') ?>">
             <div class="mainbox1">
             <table width="300" height="30">
                <tr>
                <td width="300" height="" align="center" ><b>请输入实例名称进行查找</b></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>
             </table>
             </div>
             <div class="mainbox3">
                 <table name="search" width="350" height="30">
                  <tr>
                  <th width="350" height=""><input type="text" name="instancename" value="" /></th>                 
                  </tr>
                  <tr><td align="center"><input type="submit" name="submit" value="提交" /></td></tr>
                 </table>       
             </div>
             </form>
         </div>

       
      </div>
    
    
    </div>
        
    
    
<?php $this->load->view('admin/footer'); ?>