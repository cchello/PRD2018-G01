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
<table width="100%"  align="center" border="1" cellpadding="0" cellspacing="0" >
  <tr class="title">
    <td height="30"><a href="<?php echo site_url('bbs')?>">讨论区首页</a> →<a href="">案例1</a></td>
  </tr>
</table>
<br/>
<a href="<?php echo site_url("bbs/addSubject")?>"><b>[发表话题]</b></a>
<table width="100%"  align="center" border="1" cellpadding="0" cellspacing="0" >
  <tr class="title">
    <td height="30"><b>帖子主题：<?php echo $subject['title']?></b></td>
  </tr>
  <tr class="content">
    <td height="30">该贴由<?php echo $subject['author']?>发表于<?php echo $subject['submittime']?>&nbsp;&nbsp;<a href="<?php $subjectid = $subject['subjectid']; echo site_url("bbs/editReply/$subjectid")?>">[编辑]</a>&nbsp;&nbsp;<a href="<?php echo site_url("bbs/deleteReply/$subjectid")?>" onclick="return del()">[删除]</a></td>
  </tr>
  <tr>
    <td height="30""><?php echo $subject['content']?></td>
  </tr>
<?php 
	$index = 1;
	foreach ($replys as $row)
	{
		
		$replyid = $row['replyid']; 
?>
  <tr class="content">
    <td height="30">第<?php echo $index; $index++?>楼&nbsp;&nbsp;该贴由<?php echo $row['author']?>发表于<?php echo $row['submittime']?>&nbsp;&nbsp;<a href="<?php echo site_url("bbs/editReply/$replyid")?>">[编辑]</a>&nbsp;&nbsp;<a href="<?php echo site_url("bbs/deleteReply/$replyid")?>" onclick="return del()">[删除]</a></td>
  </tr>
  <tr>
    <td height="30""><?php echo $row['content']?></td>
  </tr>

<?php 
	}
?>
</table>
<p></p>
<form action="<?php echo site_url("bbs/addReply")?>" method="post">

<input type="hidden" name="subjectid" value="<?php $subjectid = $subject['subjectid']; echo $subjectid?>" />
<input type="hidden" name="authorid" value="<?php $authorid = $this->session->userdata['user_id']; echo $authorid?>" />
<table class="replylist" width="100%"  align="center" border="1" cellpadding="0" cellspacing="0">
  <tr class="title">
    <td height="30" colspan="2"><b>快速回复</b></td>
  </tr>
  <tr class="content">
    <td width="10%" height="30" align="left"><b>内容</b></td>
    <td><textarea name="content" cols="80" rows="8"></textarea></td>
  </tr>
  <tr>
    <td height="30" colspan="2">
      <div align="center">
        <input name="addreply" type="submit" value="OK!发表我的回帖"/>    
      </div></td>
  </tr>
</table>
</form>
</div>

</body>
</html>