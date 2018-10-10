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

<?php if($myRole['roleId'] == EVA_ROLE_PM){?>
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<tr align="center">
		<th colspan="2"><span><?php echo $username  ; ?>的相关情况</span></th>
	</tr>
    <tr align="center">
		<td width="260"><span>该同学在项目中的任务总数</span></td>
		<td><span><?php echo $totaltask;?>个</span></td>
	</tr>
	<tr align="center">
		<td><span>任务在规定时间完成的个数</span></td>
		<td><span><?php echo $ontimefinishedno;?>个</span></td>
	</tr>
	<tr align="center">
		<td><span>任务在规定时间完成的比率</span></td>
		<td><span><?php echo $timerate;?>%</span></td>
	</tr>
	<tr align="center">
		<td><span>任务文档一次通过的个数</span></td>
		<td><span><?php echo $oncefinishedno;?>个</span></td>
	</tr>
	<tr align="center">
		<td><span>任务文档一次通过的比率</span></td>
		<td><span><?php echo $oncerate;?>%</span></td>
	</tr>
</table>
<?php }?>

<form id="evaTeamatesMemForm">
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<tr>
		<th colspan="4" align="center"><span>相互评价</span></th>
	</tr>
	<tr align="center">
		<th width="80"><span>评价对象</span></th>
		<th width="150"><span>评价项目</span></th>
		<th width="70"><span>权重%</span></th>
		<th width="220"><span>等级</span></th>
	</tr>
	<tr align="center">
		<td rowspan="10"><span>项目成员<?php echo $username; ?></span></td>
		<td><span>学习态度</span></td>
		<td><span>20</span></td>
		<td><span>
			<label><input type="radio" name="status" value="100" />A</label>
			<label><input type="radio" name="status" value="80" checked="checked" />B</label>
			<label><input type="radio" name="status" value="60" />C</label>
			<label><input type="radio" name="status" value="40" />D</label>
		</span></td>
	</tr>
	<tr align="center">
		<td><span>专业能力</span></td>
		<td><span>20</span></td>
		<td><span>
			<label><input type="radio" name="technique" value="100" />A</label>
			<label><input type="radio" name="technique" value="80" checked="checked" />B</label>
			<label><input type="radio" name="technique" value="60" />C</label>
			<label><input type="radio" name="technique" value="40" />D</label>
		</span></td>
	</tr>
	<tr align="center">
		<td><span>沟通能力</span></td>
		<td><span>20</span></td>
		<td><span>
			<label><input type="radio" name="communication" value="100" />A</label>
			<label><input type="radio" name="communication" value="80" checked="checked" />B</label>
			<label><input type="radio" name="communication" value="60" />C</label>
			<label><input type="radio" name="communication" value="40" />D</label>
		</span></td>
	</tr>
	<tr align="center">
		<td><span>协作能力</span></td>
		<td><span>20</span></td>
		<td><span>
			<label><input type="radio" name="cooperation" value="100" />A</label>
			<label><input type="radio" name="cooperation" value="80" checked="checked" />B</label>
			<label><input type="radio" name="cooperation" value="60" />C</label>
			<label><input type="radio" name="cooperation" value="40" />D</label>
		</span></td>
	</tr>
	<?php if($targetUserRole['roleId'] == EVA_ROLE_PM){?>
	<tr align="center">
		<td><span>组织能力</span></td>
		<td><span>16</span></td>
		<td><span>
			<label><input type="radio" name="organization" value="100" />A</label>
			<label><input type="radio" name="organization" value="80" checked="checked" />B</label>
			<label><input type="radio" name="organization" value="60" />C</label>
			<label><input type="radio" name="organization" value="40" />D</label>
		</span></td>
	</tr>
	<tr align="center">
		<td><span>决策能力</span></td>
		<td><span>16</span></td>
		<td><span>
			<label><input type="radio" name="decision" value="100" />A</label>
			<label><input type="radio" name="decision" value="80" checked="checked" />B</label>
			<label><input type="radio" name="decision" value="60" />C</label>
			<label><input type="radio" name="decision" value="40" />D</label>
		</span></td>
	</tr>
	<?php }else{?>

    <input type="hidden" name="organization" value="0" />
	<input type="hidden" name="decision" value="0" />

	<?php }?>
	<?php if($myRole['roleId'] != EVA_ROLE_PM){?>
	<tr align="center">
		<td><span>对自己的帮助</span></td>
		<td><span>20</span></td>
		<td><span>
			<label><input type="radio" name="helpme" value="100" />A</label>
			<label><input type="radio" name="helpme" value="80" checked="checked" />B</label>
			<label><input type="radio" name="helpme" value="60" />C</label>
			<label><input type="radio" name="helpme" value="40" />D</label>
		</span></td>
	</tr>
	<?php }?>
	<?php if($myRole['roleId'] == EVA_ROLE_PM){?>
	<tr align="center">
		<td><span>文档通过率</span></td>
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
	<?php }?>
	<tr align="center">
		<td><span>综合评价</span></td>
		<td colspan="2"><span><input type="text" size="40" name="mark" id="evaMark" value="请对你的合作伙伴做出综合评价" /></span></td>
	</tr>
	<tr align="center">
		<td><input type="hidden" name="touserid" value="<?php echo $touserid ?>" /></td>
		<td><input type="hidden" name="roleid" value="<?php echo $roleid ?>" /></td>
		<td colspan="2"><input type="submit" name="submit" id="evaTeamatesMemSub" value="提交" /></td>
	</tr>
</table>
</form>
<br />
</div>
