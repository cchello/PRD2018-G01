<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- display a task's standard docs -->
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<caption>本任务标准文档</caption>
	<tr>
		<th width="119"><span>文件名</span></th>
		<th width="137"><span>文件类型</span></th>
		<th width="247"><span>文件大小</span></th>
	</tr>
	<?php if(isset($stdFiles) && !empty($stdFiles)){
		foreach($stdFiles as $row)
		{
			?>
	<tr>
		<td>
		<span><a href="#" class="docDown" type="std" name="<?php echo $row['standardFileId'];?>"><?php echo $row['fileName'];?></a>
</span>
		</td>
		<td>
		<span class="fileType"><?php echo $row['fileType'];?></span>
		</td>
		<td>
		<span><?php echo $row['fileSize'];?></span>
		</td>
	</tr>
	<?php
		}}
		?>
</table>