<?php $this->load->view('main/header');?>
     现在位置：PBCLS >> 个人信息 >> 站内信>> 收件箱
     <br></br>
<link rel="stylesheet" type="text/css" href="/css/main.css" />
<?php $this->load->view('main/sidebar')?>
<div class="messagebox">
   <p align="left"><strong>我的信箱</strong></p>
    <div class="mail_top">
	    <table width ="100%" height="49" border="0" rules="none">
	       <tr>
	          <th width="20%" height="43"><a href="">收件箱</a></th>
	          <th width="20%" height="43"><a href="<?php echo site_url('message/sents')?>">发件箱</a></th>
	          <td width="" height="43" align="right"><div style="margin-right:15px"><a href="<?php echo site_url('message/writeMessage')?>"><strong>写邮件</strong></a></div></td>
	       </tr>
	       <tr>
	       	   <td colspan="3">共收到信件<?php echo $totalmessages?>封 (未读 <strong><?php echo $newmessages?></strong>封)</td>
	       </tr>
	     </table>
      </div>
    
    <div class="messagelist">
    <table  width="100%" border="1"  rules="rows">
	  <tr>
	    <th width="15%" height="35">类型</th>
	    <th width="45%">标题</th>
	    <th width="20%">发件人</th>
	    <th width="20%">发送时间</th>
	  </tr>
  <form action="<?php echo site_url('message/deleteMessages')?>" method="post" >
  <?php 
  	foreach ($messages as $row)
  	{
  ?>
  
  <tr <?php if(!$row['isreaded']) echo 'class="unread"'?>>
  	<a href="<?php $id=$row['uid'];echo site_url("Message/readMessage/$id")?>">
  	<span>
	  <td width="15%"><input id="checkbox" name="checkbox" type="checkbox" value="<?php echo $row['uid']?>" />
	 	<?php if(!$row['isreaded']) echo "未读";else echo '已读'?>
	   </td>
	  <td width="45%"><?php $title=$row['title']; echo $title?></td>
	  <td width="20%"><?php $from=$this->usermodel->getUsername($row['from']);echo $from?></td>
	  <td width="20%"><?php $sendtime=$row['sendtime'];echo $sendtime?></td>
 	 </span>
 	 </a>
  </tr>
  <?php 	
  	}
  ?>
  
	  <tr>
	  	<td colspan="4" align="left">
	  	<div  style="margin-left: 15px">
	  		<input type="checkbox" onclick="check_all(this,'checkbox')"/>全选 <a onclick="do_delete()">删除</a>
	  	</div>
	  	</td>
	   </tr>
        <tr><td colspan="4"> <div align="center">
	    <a href="?page=1&action=">首页</a>
	    <a href="?page=<?php echo $page>1?$page-1:$page?>&action="">上一页</a>
	    <a href="#"><?php echo $page?></a>
	    <a href="?page=<?php echo $page<$pages?$page+1:$pages?>&action=">下一页</a>
	    <a href="?page=<?php echo $pages?>&action="">尾页 </a>
	   </div></td></tr>
	</table>
		<input type="hidden" name="checkboxs" value="" />
 	</form>
  	</div>
</div>
<?php $this->load->view('main/footer')?> 