<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- upload task file view -->
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<tr>
		<td width="80" align="left"><span>任务名称：</span></td>
		<td width="160"><span><?php echo $task['taskName'];?></span></td>
		<td width="140"><span class="taskId" style="display:none;"><?php echo $task['taskId']?></span></td>
		<td></td>
	</tr>
	<tr>
		<td align="left"><span>任务需求：</span></td>
		<td><?php 
			foreach($requires as $require){
				echo $require['requireFileName']."<br>";
			}
		?>
		</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td><span>目标文件：</span></td>
		<td><select id="requireFileSelection">
			<?php 
				foreach($requires as $require){
					echo "<option value='".$require['requireFileId']."'>".$require['requireFileName']."</option>";
				}
			?>
		</select></td>
	</tr>
	<tr>
		<td colspan="3" align="left">
			<form id="uploadTaskFileForm" enctype="multipart/form-data" method="post" action="">
				<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
				<input type="hidden" name="docId" value="" />
				<input type="file" name="uploadFile" />
				<input type="submit" id="uploadTaskFileSubmit" value="上传" />
			</form>
		</td>
	</tr>
	
</table>
