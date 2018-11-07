<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<tr>
		<th width="180"><span>任务名称</span></th>
		<th width="70"><span>开始时间</span></th>
		<th width="70"><span>预计所需时间</span></th>
		<th width="70"><span>完成时间</span></th>
		<th width="100"><span>状态</span></th>
	</tr>
	<?php foreach($tasks as $row)
	{
		?>
	<tr>
		<td>
		<span><?php
		if($roleId == '0' || $roleId == '1' || ($row['isMyTask'] == true && $row['statusId'] > TASK_STATUS_UNREADY)){
			echo "<a href=\"#\" class=\"taskDetail\" name=\"".$row['taskId']."\">".$row['taskName']."</a>";
		}else{
			if($row['statusId'] > '5')
			echo "<a href=\"#\" class=\"taskDetail\" name=\"".$row['taskId']."\">".$row['taskName']."</a>";
			else echo $row['taskName'];			
		}
		?></span>
		</td>
		<td><span><?php echo $row['startTime'];?></span></td>
		<td><span><?php echo $row['duration'];?></span></td>
		<td><span><?php echo $row['finishTime'];?></span></td>
		<td><span><?php echo $row['statusName'];?></span></td>
	</tr>
	<?php
	}
	?>
</table>
