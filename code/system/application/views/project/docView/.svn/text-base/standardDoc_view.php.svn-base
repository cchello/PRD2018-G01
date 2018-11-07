<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- standard files in the case -->
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<tr>
		<th width="155">
		<span>文件名</span>
		</th>
		<th width="80">
		<span>文件类型</span>
		</th>
		<th width="80">
		<span>任务名称</span>
		</th>
		<th width="80">
		<span>文件大小</span>
		</th>
	</tr>
		<?php if(isset($stdFiles)){
			foreach($stdFiles as $row)
			{
				?>
			<tr>
				<td>
					<span>
						<a href="#" class="docDown" type="std" name="<?php echo $row['standardFileId']?>"><?php echo $row['fileName'];?></a>
					</span>
				</td>
				<td>
					<span><?php echo $row['fileType'];?></span>
				</td>
				<td>
					<span><?php echo $row['taskName'];?></span><span class="taskId" style="display:none"><?php echo $row['taskId'];?></span>
				</td>
				<td>
					<span><?php echo $row['fileSize'];?></span>
				</td>
			</tr>
	<?php
			}
		}
		?>
</table>
