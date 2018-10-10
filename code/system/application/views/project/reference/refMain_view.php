<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- reference which was uploaded by users -->
<?php if(isset($refList)&& !empty($refList)){?>
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<tr>
		<th width="160" align="center">
		<span>文档名称</span>
		</th>
		<th width="103" align="center">
		<span>贡献者</span>
		</th>
		<th width="63" align="center">
		<span>上传时间</span>
		</th>
		<th width="82" align="center">
		<span>下载次数</span>
		</th>
	</tr>
	<?php foreach($refList as $ref){?>
	<tr>
		<td><a style="font-size:12px" href='#' class="refDetail" name="<?php echo $ref['fileId'];?>"><?php echo $ref['fileName']?></a></td>
		<td><span><?php echo $ref['uploader'];?></span></td>
		<td><span><?php echo $ref['uploadTime'];?></span></td>
		<td><span><?php echo $ref['downloadedTimes']?></span></td>
	</tr>
	<?php }?>
</table>
<?php }else echo "暂无可参考资料";?>