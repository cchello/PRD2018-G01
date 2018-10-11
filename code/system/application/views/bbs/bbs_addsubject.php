<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="/css/bbs.css" />
<script type="text/javascript" src="/js/main.js"></script>
</head>


<body>

<div class="bbs">
  <p></p>
<form action="<?php echo site_url("bbs/do_add")?>" method="post" >
<input type="hidden" name="authorid" value="<?php echo $this->session->userdata('user_id')?>"/>
<input type="hidden" name="caseid" value="<?php echo $caseid?>"/>
<table class="replylist" width="100%"  align="center" border="1" cellpadding="0" cellspacing="0" >
  <tr class="title">
    <td height="30" colspan="2"><b>发表新话题</b></td>
  </tr>
  <tr>
    <td width="10" height="30" align="left"><b>标题</b></td>
    <td><input name="title" size="50" value="<?php if(isset($record['title'])) echo $record['title']?>"> </input> *不得超过 25 个汉字或50个英文字符 </td>
  </tr>
  <tr class="content">
    <td width="10%" height="30" align="left"><b>内容</b></td>
    <td><textarea name="content" cols="80" rows="8"><?php if(isset($record['content'])) echo $record['content']?></textarea></td>
  </tr>
  <tr>
    <td height="30" colspan="2">
      <div align="center">
        <input type="submit" name="addsubject" value="OK!发表我的回帖"/>    
      </div></td>
  </tr>
</table>
</form>
</div>

</body>
</html>