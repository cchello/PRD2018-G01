<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<div>
	<span style="font-size: 13px;">任务名称：<?php echo $task['taskName'];?></span>
	<br />
	<span style="font-size: 13px;">要求时间：<?php echo $task['duration'];?>天</span>
	<br />
	<hr />
    <table border="0" cellspacing="0" cellpadding="5" class="docTable">
		<tr align="center">
			<th colspan="2"><span><?php echo $evaInfo['targetUserName']; ?>的相关情况</span></th>
		</tr>
		<tr align="center">
			<td width="260"><span>任务实际完成时间</span></td>
			<td><span id="actualTime"><?php echo $evaInfo['actualTime'];?>天</span></td>
		</tr>
		<tr align="center">
			<td><span>文档通过的情况</span></td>
			<td><span><?php echo $evaInfo['acceptno'];?>次通过</span></td>
		</tr>
	</table>
	
	<form name="evaluationformumber" id="evaluationformumberForm" method="post" action="projectEva/managerToMemberEvaluationAction">
	<table border="0" cellspacing="0" cellpadding="5" class="docTable">
		<tr>
			<th colspan="4" align="center"><span>相互评价</span></th>
		</tr>
		<tr align="center">
			<th width="100"><span>评价对象</span></th>
			<th width="120"><span>评价项目</span></th>
			<th width="70"><span>权重%</span></th>
			<th width="220"><span>等级</span></th>
		</tr>
		<tr align="center">
			<td rowspan="10"><span>组员<?php echo $evaInfo['targetUserName']; ?></span></td>
			<td><span>学习态度</span></td>
			<td><span>10</span></td>
			<td><span>
				<label><input type="radio" name="status" value="100" />A</label>
				<label><input type="radio" name="status" value="80" checked="checked" />B</label>
				<label><input type="radio" name="status" value="60" />C</label>
				<label><input type="radio" name="status" value="40" />D</label>
			</span></td>
		</tr>
		<tr align="center">
			<td><span>专业能力</span></td>
			<td><span>10</span></td>
			<td><span>
				<label><input type="radio" name="technique" value="100" />A</label>
				<label><input type="radio" name="technique" value="80" checked="checked" />B</label>
				<label><input type="radio" name="technique" value="60" />C</label>
				<label><input type="radio" name="technique" value="40" />D</label>
			</span></td>
		</tr>
		<tr align="center">
			<td><span>沟通能力</span></td>
			<td><span>10</span></td>
			<td><span>
				<label><input type="radio" name="communication" value="100" />A</label>
				<label><input type="radio" name="communication" value="80" checked="checked" />B</label>
				<label><input type="radio" name="communication" value="60" />C</label>
				<label><input type="radio" name="communication" value="40" />D</label>
			</span></td>
		</tr>
		<tr align="center">
			<td><span>协作能力</span></td>
			<td><span>10</span></td>
			<td><span>
				<label><input type="radio" name="cooperation" value="100" />A</label>
				<label><input type="radio" name="cooperation" value="80" checked="checked" />B</label>
				<label><input type="radio" name="cooperation" value="60" />C</label>
				<label><input type="radio" name="cooperation" value="40" />D</label>
			</span></td>
		</tr>
		<tr align="center">
			<td><span>文档通过次数</span></td>
			<td><span>5</span></td>
			<td><span>
				<label><input type="radio" name="docpassrate" value="100" />A</label>
				<label><input type="radio" name="docpassrate" value="80" checked="checked" />B</label>
				<label><input type="radio" name="docpassrate" value="60" />C</label>
				<label><input type="radio" name="docpassrate" value="40" />D</label>
			</span></td>
		</tr>
		<tr align="center">
			<td><span>文档完成时间</span></td>
			<td><span>5</span></td>
			<td><span>
				<label><input type="radio" name="docpasstime" value="100" />A</label>
				<label><input type="radio" name="docpasstime" value="80" checked="checked" />B</label>
				<label><input type="radio" name="docpasstime" value="60" />C</label>
				<label><input type="radio" name="docpasstime" value="40" />D</label>
                </span></td>
		</tr>
		<tr align="center">
			<td><span>文档风格</span></td>
			<td><span>10</span></td>
			<td><span>
				<label><input type="radio" name="docstyle" value="100" />A</label>
				<label><input type="radio" name="docstyle" value="80" checked="checked" />B</label>
				<label><input type="radio" name="docstyle" value="60" />C</label>
				<label><input type="radio" name="docstyle" value="40" />D</label>
			</span></td>
		</tr>
		<tr align="center">
			<td><span>文档创新情况</span></td>
			<td><span>10</span></td>
			<td><span>
				<label><input type="radio" name="docinnovation" value="100" />A</label>
				<label><input type="radio" name="docinnovation" value="80" checked="checked" />B</label>
				<label><input type="radio" name="docinnovation" value="60" />C</label>
				<label><input type="radio" name="docinnovation" value="40" />D</label>
                </span></td>
		</tr>
		<tr align="center">
			<td><span>文档正确情况</span></td>
			<td><span>30</span></td>
			<td><span>
				<label><input type="radio" name="doccorrectness" value="100" />A</label>
				<label><input type="radio" name="doccorrectness" value="80" checked="checked" />B</label>
				<label><input type="radio" name="doccorrectness" value="60" />C</label>
				<label><input type="radio" name="doccorrectness" value="40" />D</label>
			</span></td>
		</tr>
		<tr align="center">
			<td><span>综合评价</span></td>
			<td colspan="2"><span><input type="text" size="35" name="mark" id="evaMark" value="请对您的组员进行综合评价" /></span></td>
		</tr>
		<tr align="center">
		    <td><input type="hidden" name="taskId" value="<?php echo $taskId?>" /></td>
			<td><input type="hidden" name="targetEvaUserId" value="<?php echo $evaInfo['targetUserId'];?>" /></td>
			<td colspan="3" style="text-align:right"><input type="submit" name="submit" id="evaTaskSub" value="提交" /></td>
		</tr>
	</table>
	</form>
	<br />
</div>