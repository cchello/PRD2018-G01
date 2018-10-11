<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- display a task's doc -->
<table border="0" cellspacing="0" cellpadding="5" class="docTable"></table>
<tr>
	<td width="100"><span>任务名称：</span></td>
	<td width="100"><span><?php echo $taskName;?></span><span class="taskId" style="display:none"><?php echo $taskId?></span></td>
	<td><?php if($isMyTask){?><input type="button" name="<?php echo $taskId;?>" class="uploadTaskFile" value="上传文档" /><?php }?></td>
</tr>
<hr />
<?php $this->load->view('project/tasks/taskSubFiles_view'); ?>
<hr />
<?php $this->load->view('project/tasks/taskStdFiles_view'); ?>
<?php $this->load->view('project/docView/docDenyReason_view');?>
<?php $this->load->view('project/docView/docShowDenyRea_view')?>