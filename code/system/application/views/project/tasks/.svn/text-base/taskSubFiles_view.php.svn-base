<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- display a task's submitted docs -->
<table border="0" cellpadding="5" cellspacing="0" class="docTable">
	<caption>本任务已上传文档</caption>
	<tr>
		<th width="90"><span>文件名</span></th>
		<th width="58"><span>文件类型</span></th>
		<th width="72"><span>上传者</span></th>
		<th width="77"><span>上传时间</span></th>
		<th width="50"><span>状态</span></th>
		<th width="74"><span>操作</span></th>
	</tr>

	<?php if(!empty($subFiles)){
		foreach($subFiles as $row){
			?>
	<tr>
		<td><span><a href="#" class="docDown" type="sub" name="<?php echo $row['fileId'];?>"><?php echo $row['fileName'];?></a></span></td>
		<td><span class="fileType"><?php echo $row['fileExt'];?></span></td>
		<td><span><?php echo $row['uploader'];?></span></td>
		<td><span><?php echo $row['uploadTime'];?></span></td>
		<td><span><?php echo $row['status'];if($row['docStatusId'] == DOC_STATUS_DENIED)echo "<br /><a href='#' name=\"".$row['fileId']."\" class='showDenyReason'>查看原因</a>"?></span></td>
		<?php if($role == '1' && $row['docStatusId'] == '0'){
		?>
		<td align="center">
			<table width="64" border="0">
			<tr>
				<td width="32"><input type="button" name="<?php echo $row['fileId'];?>" class="docPass" value="通过" /></td>
				<td width="32"><input type="button" name="<?php echo $row['fileId'];?>" class="docDeny" value="拒绝" /></td>
			</tr>
			</table>
		</td>
		<?php
		}else{
			?>
			<td><span>您不是PM或者<br>文档不可操作.</span></td>
			<?php 
		}
		?>
	</tr>
	<?php
		}
	}
	?>
</table>
<?php $this->load->view('project/docView/docDenyReason_view');?>
<?php $this->load->view('project/docView/docShowDenyRea_view');?>