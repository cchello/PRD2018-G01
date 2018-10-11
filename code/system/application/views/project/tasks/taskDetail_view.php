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
		<td width="115" style="text-align: right;"><span>任务名称：</span><span
			id="taskId" style="display: none"><?php echo $taskId?></span></td>
		<td width="150" style="text-align: left;"><span><?php echo $task['taskName'];?></span></td>
		<td width="115" style="text-align: right;"><span>任务负责人:</span></td>
		<td width="150" style="text-align: left;"><span><?php echo $playerName['roleName'];?></span></td>
	</tr>
	<tr>
		<td style="text-align: right;"><span>任务描述：</span></td>
		<td><span></span></td>
		<td><span></span></td>
		<td><span></span></td>
	</tr>
	<tr>
		<td colspan="4" align="center">
		<div class="taskDescri"><?php echo $task['description'];?></div>
		</td>
	</tr>
	<tr>
		<td style="text-align: right;"><span>任务分解结构：</span></td>
		<td style="text-align: left;"><span><?php echo $task['WBS'];?></span></td>
		<td style="text-align: right;"><span>任务状态：</span></td>
		<td style="text-align: left;"><span><?php echo $task['status']?></span></td>
	</tr>
	<tr>
		<td style="text-align: right;"><span>预计时间：</span></td>
		<td style="text-align: left;"><span><?php echo $task['duration']?>天</span></td>
		<td style="text-align: right;"><span>任务所需文档：</span></td>
		<td style="text-align: left;"><span><?php if(count($task['inputs']) == '0')
		echo "无";
		else{
			foreach($task['inputs'] as $row){
				echo $row['input'];
				echo "<br>";
			}
		}
		?></span></td>
	</tr>
	<tr>
		<td style="text-align: right;"><span>任务前驱：</span></td>
		<td>
		<div
			style="text-align: left; overflow: auto; width: 140px; height: 30px; font-size: 12px; border: 1px solid #E7E7E7;"><?php if(count($task['taskPre']) == '0')
			echo "无前驱任务";
			else{
				foreach($task['taskPre'] as $row){
					echo "任务：".$row['taskname'];
					echo "<br>";
				}
			}
			?></div>
		</td>
		<td style="text-align: right;"><span>任务后继：</span></td>
		<td>
		<div
			style="text-align: left; overflow: auto; width: 140px; height: 30px; font-size: 12px; border: 1px solid #E7E7E7;"><?php if(count($task['taskNext']) =='0')
			echo "无后继任务";
			else{
				foreach($task['taskNext'] as $row){
					echo "任务：".$row['taskname'];
					echo "<br>";
				}
			}?></div>
		</td>
	</tr>
	<tr>
		<td style="text-align: right;"><span>指导者建议:</span></td>
		<td></td>
		<td style="text-align: right;"><span>参考：</span></td>
		<td style="text-align: left;"><span id="refText"><?php echo $task['reference'];?></span></td>
	</tr>
	<tr>
		<td colspan="4" align="left">
		<div id="sugText"><?php echo $task['suggestions'];?></div>
		</td>
	</tr>
	<tr>
		<td><span><?php if($isInstructor)echo "指导者操作：";?></span></td>
		<td><span><?php if($isInstructor)echo "<input type=\"button\" id=\"doRefSug\" value=\"修改指导者建议\" />";?></span></td>
		<td style="text-align: right;"><span>操作：</span></td>
		<td><span><?php 
		$displayNum = count($taskStatus);
		for($i = 0; $i < $displayNum; $i++){
			switch($taskStatus[$i]['displayType']){
				case 'button':
					echo "<input type=\"button\" class=\"".$taskStatus[$i]['opType']."\" name=\"".$taskId."\" value=\"".$taskStatus[$i]['displayName']."\" /><br />";
					break;
				case 'text':
					echo $taskStatus[$i]['displayName']."<br />";
					break;
				default:
					echo "error!";
					break;
			}
		}

		?></span></td>
	</tr>
</table>
<div id="suggestionBar"><b>指导者页面</b>
	<p>参考资料:</p>
	<span>（您可以在这里输入该任务可用参考资料的名称）</span><br />
	<input type="text" id="doRef" value="" tabindex="1" /><br />
	<p>指导者建议：</p>
	<span>（您可以在这里输入您觉得该任务应该注意的地方）</span><br />
	<textarea id="doSug" tabindex="2"></textarea> <br />
	<input type="button" id="refSugSubmit" value="提  交" tabindex="3" />
</div>
<?php if($evaInfo != '-1'){?>
	<div id="evaBar">
<?php $this->load->view('project/eva/participate/evaPmTask_view');?>
	</div>
<?php }?>
