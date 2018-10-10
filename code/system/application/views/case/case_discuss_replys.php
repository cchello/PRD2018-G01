<?php $this->load->view('case/case_header');?>

<!--        	-->
<div class="bbs">
<table width="100%"  align="center" border="1" cellpadding="0" cellspacing="0" >
  <tr class="title">
    <td height="30"><a href="#">讨论区首页</a> →<a href="<?php echo site_url("cc/ccdis/$caseid")?>"><?php echo $casename?></a></td>
  </tr>
</table>
<br/>
<a href="<?php echo site_url("bbs/addSubject/$caseid")?>"><b>[发表话题]</b></a>
<table width="100%"  align="center" border="1" cellpadding="0" cellspacing="0" >
  <tr class="title">
    <td height="30"><b>帖子主题：<?php echo $subject['title']?></b></td>
  </tr>
  <tr class="content">
    <td height="30">该贴由<?php echo $subject['author']?>发表于<?php echo $subject['submittime']?>&nbsp;&nbsp;<a href="<?php $subjectid = $subject['subjectid']; echo site_url("bbs/editSubject/$subjectid")?>">[编辑]</a>&nbsp;&nbsp;<a href="<?php echo site_url("bbs/deleteSubject/$subjectid")?>" onclick="return del()">[删除]</a></td>
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
<input type="hidden" name="authorid" value="<?php echo $this->session->userdata('user_id')?>" />
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
<div align="center">
	    <a href="?page=1&action=">首页</a>
	    <a href="?page=<?php echo $page>1?$page-1:$page?>&action="">上一页</a>
	    <a href="#"><?php echo $page?></a>
	    <a href="?page=<?php echo $page<$pages?$page+1:$pages?>&action=">下一页</a>
	    <a href="?page=<?php echo $pages?>&action="">尾页 </a>
	   </div>
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
