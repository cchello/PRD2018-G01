<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- my news view -->
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
<tr>
	<th width="100"><span>消息类型</span></th>
	<th><span>消息内容</span></th>
</tr>
<?php if(isset($news)&& !empty($news)) foreach($news as $newsMessage){?>
<tr>
	<td align="right"><span><?php echo "任务->".$newsMessage['taskName'];?>:</span></td>
	<td align="left"><span><?php echo $newsMessage['newsContent'];?></span></td>
</tr>
<?php }?>
</table>