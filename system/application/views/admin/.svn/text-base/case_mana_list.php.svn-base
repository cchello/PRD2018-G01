<?php $this->load->view('admin/admin_header'); ?>
    <div class="maincontent">
    	<div class="operations">
        	<p><input type="button"" id="upload" value="上传案例"></p>
        </div>

        <div class="mainbody-2">
        	<b>案例列表</b>       
            <table width="984" border="1" align="center">
              <tr>
                <td width="">&nbsp;</td>
                <td width="">案例名称</td>
                <td width="">案例作者</td>
                <td width="">上传时间</td>
                <td width="">类型</td>
                <td width="">状态</td>
                <td width="">操作</td>
              </tr>
              <?php foreach($cases as $row) {?>
               <tr>
                <td width=""><form id="form1" name="form1" method="post" action="">
                  <label>
                    <input type="checkbox" name="checkbox" id="checkbox" />
                  </label>
                </form>                </td>
                <td width=""><?php echo $row['casename']?></td>
                <td width=""><?php echo $row['author']?></td>
                <td width=""><?php echo $row['uploadtime']?></td>
                <td width=""><a href="<?php $data = array('admin','cm','ls','ct',$row['uid']);echo site_url($data)?>"><?php if($row['casetype'] == 0) echo '自学';else echo '教学'?><a></td>
                <td width=""><a href="<?php $data = array('admin','cm','ls','cs',$row['uid']);echo site_url($data)?>"><?php if($row['status'] == 0) echo '激活';else echo '未激活'?><a></td>
                <td width=""><a href="<?php $data = array('admin','cm','ls','del',$row['uid']);echo site_url($data)?>">删除<a></td>

              <?php	
              }?>
            </table>
        </div>
    </div>
    <div class="footer">
       <hr />
       <p align="center">Copyright 2009 PBCLS Team. All Rights Reserved.</p>
    </div>
</div>
</body>
</html>