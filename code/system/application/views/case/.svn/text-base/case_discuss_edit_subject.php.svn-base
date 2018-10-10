<?php $this->load->view('case/case_header');?>

<!--        	-->
<div class="bbs">
  <p></p>
<form action="<?php echo site_url("bbs/do_editSubject")?>" method="post" >
<input type="hidden" name="authorid" value="<?php echo $this->session->userdata('user_id')?>"/>
<input type="hidden" name="caseid" value="<?php echo $caseid?>"/>
<input type="hidden" name="subjectid" value="<?php echo $subjectid?>"/>
<table class="replylist" width="100%"  align="center" border="1" cellpadding="0" cellspacing="0" >
  <tr class="title">
    <td height="30" colspan="2"><b>修改话题</b></td>
  </tr>
  <tr>
    <td width="10" height="30" align="left"><b>标题</b></td>
    <td><input name="title" size="50" value="<?php if(isset($record['title'])) echo $record['title']?>">*不得超过 25 个汉字或50个英文字符 </td>
  </tr>
  <tr class="content">
    <td width="10%" height="30" align="left"><b>内容</b></td>
    <td><textarea name="content" cols="80" rows="8"><?php if(isset($record['content'])) echo $record['content']?></textarea></td>
  </tr>
  <tr>
    <td height="30" colspan="2">
      <div align="center">
        <input type="submit" name="editsubject" value="OK!确认修改"/>    
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
