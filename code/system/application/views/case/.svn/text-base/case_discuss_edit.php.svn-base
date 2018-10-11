<?php $this->load->view('case/case_header');?>

<!--        	-->
<div class="bbs">
  <p></p>
<form action="<?php echo site_url("bbs/do_editReply")?>" method="post" >
<input type="hidden" name="authorid" value="<?php echo $this->session->userdata('user_id')?>"/>
<input type="hidden" name="subjectid" value="<?php echo $subjectid?>"/>
<input type="hidden" name="replyid" value="<?php echo $replyid?>"/>
<table class="replylist" width="100%"  align="center" border="1" cellpadding="0" cellspacing="0" >
  <tr class="title">
    <td height="30" colspan="2"><b>修改回复</b></td>
  </tr>
 
  <tr class="content">
    <td width="10%" height="30" align="left"><b>内容</b></td>
    <td><textarea name="content" cols="80" rows="8"><?php if(isset($record['content'])) echo $record['content']?></textarea></td>
  </tr>
  <tr>
    <td height="30" colspan="2">
      <div align="center">
        <input type="submit" name="editreply" value="OK!确认修改"/>    
      </div></td>
  </tr>
</table>
</form>
</div>


<!--            -->
        </div>
    
    </div>
    <div class="footer">
       <hr />
       <p align="center">Copyright 2009 PBCLS Team. All Rights Reserved.</p>
    </div>
</div>
</body>
</html>
