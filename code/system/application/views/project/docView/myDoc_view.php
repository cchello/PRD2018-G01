<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- documentations which was submitted by myself -->
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<tr>
		<th width="160" align="center">
		<span>文件名</span>
		</th>
		<th width="103" align="center">
		<span>任务名称</span>
		</th>
		<th width="63" align="center">
		<span>上传日期</span>
		</th>
		<th width="82" align="center">
		<span>操作</span>
		</th>
	</tr>
	<?php if(isset($subFiles)){
		foreach($subFiles as $row)
		{
			?>
	<tr>
		<td align="center"><span><a href="#" class="docDown" name="<?php echo $row['fileId'];?>"><?php echo $row['fileName'];?></a></span></td>
		<td align="center"><span><?php echo $row['taskName'];?></span><span class="taskId" style="display:none"><?php echo $taskId?></span></td>
		<td align="center"><span><?php echo $row['uploadTime'];?></span></td>
		<td align="center"><span><?php echo $row['status'];?></span></td>
		<td>
		<?php if($role == '1' && $row['docStatusId'] == '0'){?>
			<table width="64" border="0">
				<tr>
					<td width="32"><input type="button" name="<?php echo $row['fileId'];?>" class="docPass" value="通过" /></td>
					<td width="32"><input type="button" name="<?php echo $row['fileId'];?>" class="docDeny" value="拒绝" /></td> 
				</tr>
			</table>
		<?php }?>
		</td>
		<?php
			}
		}
		?>
	</tr>
</table>
<?php $this->load->view('project/docView/docDenyReason_view');?>
