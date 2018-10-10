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
		<td width="95"><span>任务负责人:</span></td>
		<td width="170"><span><?php foreach($playerName as $player){ echo $player['roleName']."; ";}?></span></td>		
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
		<td width="105"><span>任务分解：</span></td>
		<td width="160"><span><?php echo $task['WBS'];?></span></td>
		<td width="95"><span></span></td>
		<td width="170"><span></span></td>		
	</tr>
	<tr>
		<td width="95"><span>任务状态：</span></td>
		<td width="170"><span><?php echo $task['status']?></span></td>
		<td width="95"><span>预计时间：</span></td>
		<td width="170"><span><?php echo $task['duration']?>天</span></td>		
	</tr>
	<tr>
		<td width="95"><span>任务输入：</span></td>
		<td width="170"><span><?php if(count($task['inputs']) == '0')
				echo "无输入";
				else{
					foreach($task['inputs'] as $row){
						echo $row['input'];
						echo "<br>";
					}
				}
			?></span></td>
		<td width="95"><span>任务输出：</span></td>
		<td width="170"><span><?php if(count($task['outputs']) == '0')
				echo "无输出";
				else{
					foreach($task['outputs'] as $row){
						echo $row['output'];
						echo "<br>";
					}
				}
			?></span></span></td>		
	</tr>
			
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
		<td width="95"><span></span></td>
		<td width="170"><span></span></td>
	</tr>
	<tr>
		<td colspan="4" align="left">
			<div id="sugText">
				<?php echo $task['suggestions'];?>
			</div>
		</td>
	</tr>
	<tr>
		<td width="105"><span></span></td>
		<td width="160"><span></span></td>
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

			?></span>
		</td>
	</tr>
</table>
