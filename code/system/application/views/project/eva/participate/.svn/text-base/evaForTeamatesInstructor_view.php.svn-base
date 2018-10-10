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
		<th colspan="2"><span><?php echo $username  ; ?>的基本情况</span></th>
	</tr>
    <tr align="center">
		<td width="260"><span>项目所用时间</span></td>
		<td><span><?php 
		if($instanceduration == null) echo "未完成";
		else echo $instanceduration."天";?></span></td>
	</tr>
	<tr align="center">
		<td><span>连续在线30分钟以上天数</span></td>
		<td><span><?php 
		if($query['workday'] == null){echo "0";}
		else echo $query['workday'];?>天</span></td>
	</tr>
	<tr align="center">
		<td><span>在资源区上传下载的次数</span></td>
		<td><span><?php 
		if($updownno == null) echo "0";
		else echo $updownno;?>次</span></td>
	</tr>
	<tr align="center">
		<td><span>上传资源被下载的次数</span></td>
		<td><span><?php 
		if($downloadno == null) echo "0";
		else echo $downloadno;?>次</span></td>
	</tr>
	<tr align="center">
		<td><span>讨论区参与主题个数</span></td>
		<td><span><?php 
		if($bbsno == null) echo "0";
		else echo $bbsno;?>个</span></td>
	</tr>
</table>


<form id="evaTeamatesInstructorForm">
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<tr>
		<th colspan="4" align="center"><span>对个人的评价</span></th>
	</tr>
	<tr align="center">
		<th width="80"><span>评价对象</span></th>
		<th width="150"><span>评价项目</span></th>
		<th width="70"><span>权重%</span></th>
		<th width="220"><span>等级</span></th>
	</tr>
	<tr align="center">
		<td rowspan="6"><span><?php echo $username  ; ?></span></td>
		<td><span>学习态度</td>
		<td><span>20</td>
		<td><span><input type="radio" name="status" value="100" />A<input
			type="radio" name="status" value="80" checked="checked" />B <input
			type="radio" name="status" value="60" />C<input type="radio"
			name="status" value="40" />D</span></td>
	</tr>
	<tr align="center">
		<td><span>资源上传下载数量</span></td>
		<td><span>20</span></td>
		<td><span><input type="radio" name="updownquantity" value="100" />A<input
			type="radio" name="updownquantity" value="80" checked="checked" />B <input
			type="radio" name="updownquantity" value="60" />C<input type="radio"
			name="updownquantity" value="40" />D</span></td>
	</tr>
	<tr align="center">
		<td><span>资源上传下载质量</span></td>
		<td><span>20</span></td>
		<td><span><input type="radio" name="updownquality" value="100" />A<input
			type="radio" name="updownquality" value="80" checked="checked" />B <input
			type="radio" name="updownquality" value="60" />C<input type="radio"
			name="updownquality" value="40" />D</span></td>
	</tr>
	<tr align="center">
		<td><span>BBS问答数量</span></td>
		<td><span>20</span></td>
		<td><input type="radio" name="bbsquantity" value="100" />A<input
			type="radio" name="bbsquantity" value="80" checked="checked" />B <input
			type="radio" name="bbsquantity" value="60" />C<input type="radio"
			name="bbsquantity" value="40" />D</span></td>
	</tr>
	<tr align="center">
		<td><span>BBS问答质量</span></td>
		<td><span>20</span></td>
		<td><input type="radio" name="bbsquality" value="100" />A<input
			type="radio" name="bbsquality" value="80" checked="checked" />B <input
			type="radio" name="bbsquality" value="60" />C<input type="radio"
			name="bbsquality" value="40" />D</span></td>
	</tr>
	<tr align="center">
		<td><span>综合评价</span></td>
		<td colspan="2"><span><input type="text" size="35" name="mark" id="evaMark"
			value="请对学员进行综合性评价" /></span></td>
	</tr>
	<tr align="center">
		<td>
			<input type="hidden" name="organization" value="0" />
			<input type="hidden" name="decision" value="0" />
		</td>
		<td><input type="hidden" name="userid" value="<?php echo $touserid ?>" /></td>
		<td><input type="hidden" name="roleid" value="<?php echo $roleid ?>" /></td>
		<td colspan="4"><input type="submit" name="submit" id="evaTeamatesInstructorSub" value="提交" /></td>
	</tr>
</table>
</form>
<br />
</div>
