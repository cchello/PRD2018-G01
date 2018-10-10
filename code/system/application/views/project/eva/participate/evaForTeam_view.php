<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<div align="center">

<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<tr align="center">
		<th colspan="2"><span>项目小组的基本情况</span></th>
	</tr>
    <tr align="center">
		<td width="260"><span>项目要求时间</span></td>
		<td><span><?php echo $caseduration;?>天</span></td>
	</tr>
	<tr align="center">
		<td><span>小组完成此项目所用的时间</span></td>
		<td><span><?php 
		if(isset($instanceduration) && !empty($instanceduration)) echo $instanceduration."天";
		else echo "未完成";?></span></td>
	</tr>
	<tr align="center">
		<td><span>小组在资源区上传下载的次数</span></td>
		<td><span><?php echo $updownno;?>次</span></td>
	</tr>
	<tr align="center">
		<td><span>小组上传资源被下载超10次的个数</span></td>
		<td><span><?php echo $validdocno;?>个</span></td>
	</tr>
	<tr align="center">
		<td><span>小组在讨论区主题回复超10的个数</span></td>
		<td><span><?php echo $bbsno;?>个</span></td>
	</tr>
</table>

<form id="evaTeamForm">
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<tr>
		<th colspan="3" align="center"><span>指导老师对小组的评价</span></th>
	</tr>
	<tr align="center">
		<th width="200"><span>评价项目</span></th>
		<th width="70"><span>权重%</span></th>
		<th width="250"><span>等级</span></th>
	</tr>
	<tr align="center">
		<td><span>资源上传下载数量</span></td>
		<td><span>10</span></td>
		<td><span><input type="radio" name="updownquantity" value="100" />A<input
			type="radio" name="updownquantity" value="80" checked="checked" />B <input
			type="radio" name="updownquantity" value="60" />C<input type="radio"
			name="updownquantity" value="40" />D</span></td>
	</tr>
	<tr align="center">
		<td><span>资源上传下载质量</span></td>
		<td><span>10</span></td>
		<td><span><input type="radio" name="updownquality" value="100" />A<input
			type="radio" name="updownquality" value="80" checked="checked" />B <input
			type="radio" name="updownquality" value="60" />C<input type="radio"
			name="updownquality" value="40" />D</span></td>
	</tr>
	<tr align="center">
		<td><span>BBS问答次数</span></td>
		<td><span>10</span></td>
		<td><span><input type="radio" name="bbsquantity" value="100" />A<input
			type="radio" name="bbsquantity" value="80" checked="checked" />B <input
			type="radio" name="bbsquantity" value="60" />C<input type="radio"
			name="bbsquantity" value="40" />D</span></td>
	</tr>
	<tr align="center">
		<td><span>BBS问答质量</span></td>
		<td><span>10</span></td>
		<td><span><input type="radio" name="bbsquality" value="100" />A<input
			type="radio" name="bbsquality" value="80" checked="checked" />B <input
			type="radio" name="bbsquality" value="60" />C<input type="radio"
			name="bbsquality" value="40" />D</span></td>
	</tr>
	<tr align="center">
		<td><span>文档完成时间</span></td>
		<td><span>10</span></td>
		<td><span><input type="radio" name="docpasstime" value="100" />A<input
			type="radio" name="docpasstime" value="80" checked="checked" />B <input
			type="radio" name="docpasstime" value="60" />C<input type="radio"
			name="docpasstime" value="40" />D</span></td>
	</tr>
	<tr align="center">
		<td><span>文档创新情况</span></td>
		<td><span>10</span></td>
		<td><span><input type="radio" name="docinnovation" value="100" />A<input
			type="radio" name="docinnovation" value="80" checked="checked" />B <input
			type="radio" name="docinnovation" value="60" />C<input type="radio"
			name="docinnovation" value="40" />D</span></td>
	</tr>
	<tr align="center">
		<td><span>文档正确程度</span></td>
		<td><span>30</span></td>
		<td><span><input type="radio" name="doccorrectness" value="100" />A<input
			type="radio" name="doccorrectness" value="80" checked="checked" />B <input
			type="radio" name="doccorrectness" value="60" />C<input type="radio"
			name="doccorrectness" value="40" />D</span></td>
	</tr>
	<tr align="center">
		<td><span>文档风格</span></td>
		<td><span>10</span></td>
		<td><span><input type="radio" name="docstyle" value="100" />A<input
			type="radio" name="docstyle" value="80" checked="checked" />B <input
			type="radio" name="docstyle" value="60" />C<input type="radio"
			name="docstyle" value="40" />D</span></td>
	</tr>
	<tr align="center">
		<td><span>综合评价</span></td>
		<td colspan="2"><span><input name="mark" id="evaMark" type="text" size="40"
			value="请对小组作出整体性评价" /></span></td>
	</tr>
	<tr align="center">
		<td><input type="hidden" name="taskid" value="<?php echo $taskid ?>" /></td>
		<td><input type="hidden" name="instanceid" value="<?php echo $instanceid ?>" /></td>
		<td colspan="3"><input type="submit" name="submit" value="提交" id="evaTeamSub" /></td>
	</tr>
</table>
</form>

<br />
</div>