<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- display task detail informations -->
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<tr>
		<td width="105"><span>任务名称：</span></td>
		<td width="160"><span><?php echo $task['taskName'];?></span></td>
		<td width="95"><span>任务前驱：</span></td>
		<td width="170">
			<span><?php if(count($task['taskPre']) == '0')
				echo "无前驱任务";
				else{
					foreach($task['taskPre'] as $row){
						echo $row['taskname'];
						echo "<br>";
					}
				}
			?></span>
		</td>
	</tr>
	<tr>
		<td width="105"><span>任务描述：</span></td>
		<td width="160"><span></span></td>
		<td width="95"><span></span></td>
		<td width="170"><span></span></td>
	</tr>
	<tr>
		<td colspan="4" align="center">
			<div class="taskDescri">
				<?php echo $task['description'];?>
			</div>
		</td>
	</tr>
	<tr>
		<td width="105"><span>任务后继：</span></td>
		<td width="160">
			<span><?php if(count($task['taskNext']) =='0')
			echo "无后继任务";
			else{
				foreach($task['taskNext'] as $row){
					echo $row['taskname'];
					echo "<br>";
				}
			}?></span>
		</td>
		<td width="95"><span>参考：</span></td>
		<td width="170"><span id="refText"><?php echo $task['reference'];?></span></td>
	</tr>
	<tr>
		<td width="105"><span>指导者建议:</span></td>
		<td width="160"></td>
		<td width="95"><span>任务负责人:</span></td>
		<td width="170"><span><?php foreach($playerName as $player){ echo $player['roleName']."; ";}?></span></td>
	</tr>
	<tr>
		<td colspan="4" align="left">
			<div id="sugText">
				<?php echo $task['suggestions'];?>
			</div>
		</td>
	</tr>
	<tr>
		<td width="105"><span>状态：</span></td>
		<td width="160"><span><?php echo $task['status']?></span></td>
		<td width="95"><span>操作：</span></td>
		<td width="170">
			<span><?php 
			$displayNum = count($taskStatus);
			for($i = 0; $i < $displayNum; $i++){
				switch($taskStatus[$i]['displayType']){
					case 'button':
						echo "<input type=\"button\" class=\"".$taskStatus[$i]['opType']."\" name=\"".$taskId."\" value=\"".$taskStatus[$i]['displayName']."\" />";
					break;
					case 'text':
						echo $taskStatus[$i]['displayName'];
					break;
					default:
						echo "error!";
					break;
				}
			}

/*				if($role == '0'){
					if($task['status'] == '1'){
						echo "<input type=\"button\" class=\"startTaske\" name=\"".$taskId."\" value=\"开始任务\" />";
//						echo anchor("project/taskop/".$taskId."/"."1","开始任务");
					}
					else{
						if($task['status'] >1){
							echo "<input type=\"button\" class=\"displayTaskFile\" name=\"".$taskId."\" value=\"查看该任务文件\" />";
//							echo anchor($task['taskFileAdd'],'查看该任务文件');
							if($task['isInTask'] == true){
								echo "<br />";
								echo "<input type=\"button\" class=\"uploadTaskFile\" name=\"".$taskId."\" value=\"上传任务文件\" />";
//								echo anchor($task['taskFileUpload'],'上传任务文件');
							}
						}else{
							echo "该任务初始条件不满足，不能开始";
						}
					}
				}else{
					if($task['status'] > 1){
						if($task['isInTask'] == true){
							echo "<input type=\"button\" class=\"displayTaskFile\" name=\"".$taskId."\" value=\"查看该任务文件\" />";
//							echo anchor($task['taskFileAdd'],'查看该任务文件');
							echo "<br/>";
							echo "<input type=\"button\" class=\"uploadTaskFile\" name=\"".$taskId."\" value=\"上传任务文件\" />";
//							echo anchor($task['taskFileUpload'],'上传任务文件');
						}else{
							echo "<input type=\"button\" class=\"displayTaskFile\" name=\"".$taskId."\" value=\"查看该任务文件\" />";
//							echo anchor($task['taskFileAdd'],'查看该任务文件');
						}
					}else{
						echo "该任务尚未开始，无法查看文件列表";
					}
				}*/
			?></span>
		</td>
	</tr>
</table>
