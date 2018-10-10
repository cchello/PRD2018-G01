<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<div class="evaSelf" align="center">

<form name="selfevaluation" method="post" id="selfEvaForm">

<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<tr>
		<th colspan="3" align="center"><span>自我评价</span></th>
	</tr>
	<tr align="center">
		<th width="200"><span>评价项目</span></th>
		<th width="70"><span>权重%</span></th>
		<th width="250"><span>等级</span></th>
	</tr>
	<tr align="center">
		<td><span>学习态度</span></td>
		<td><span><?php if($isPm)echo "14";else echo "20";?></span></td>
		<td><span><input type="radio" name="status" value="100" />A<input
			type="radio" name="status" value="80" checked="checked" />B <input
			type="radio" name="status" value="60" />C<input type="radio"
			name="status" value="40" />D
        </span></td>
	</tr>
	<tr align="center">
		<td><span>专业能力</span></td>
		<td><span><?php if($isPm)echo "14";else echo "20";?></span></td>
		<td><span><input type="radio" name="technique" value="100" />A<input
			type="radio" name="technique" value="80" checked="checked" />B <input
			type="radio" name="technique" value="60" />C<input type="radio"
			name="technique" value="40" />D
        </span></td>
	</tr>
	<tr align="center">
		<td><span>沟通能力</span></td>
		<td><span><?php if($isPm)echo "14";else echo "20";?></span></td>
		<td><span><input type="radio" name="communication" value="100" />A<input
			type="radio" name="communication" value="80" checked="checked" />B <input
			type="radio" name="communication" value="60" />C<input type="radio"
			name="communication" value="40" />D
        </span></td>
	</tr>
	<tr align="center">
		<td><span>协作能力</span></td>
		<td><span><?php if($isPm)echo "14";else echo "20";?></span></td>
		<td><span><input type="radio" name="cooperation" value="100" />A<input
			type="radio" name="cooperation" value="80" checked="checked" />B <input
			type="radio" name="cooperation" value="60" />C<input type="radio"
			name="cooperation" value="40" />D
        </span></td>
	</tr>
	<?php if($isPm){?>
	<tr align="center">
		<td><span>组织能力</span></td>
		<td><span>14</span></td>
		<td><span><input type="radio" name="organization" value="100" />A<input
			type="radio" name="organization" value="80" checked="checked" />B <input
			type="radio" name="organization" value="60" />C<input type="radio"
			name="organization" value="40" />D
        </span></td>
	</tr>
	<tr align="center">
		<td><span>决策能力</span></td>
		<td><span>14</span></td>
		<td><span><input type="radio" name="decision" value="100" />A<input
			type="radio" name="decision" value="80" checked="checked" />B <input
			type="radio" name="decision" value="60" />C<input type="radio"
			name="decision" value="40" />D
        </span></td>
	</tr>
	<?php }?>
	<tr align="center">
		<td><span>学习成果</span></td>
		<td><span><?php if($isPm)echo "16";else echo "20";?></span></td>
		<td><span><input type="radio" name="achievement" value="100" />A<input
			type="radio" name="achievement" value="80" checked="checked" />B <input
			type="radio" name="achievement" value="60" />C<input type="radio"
			name="achievement" value="40" />D
        </span></td>
	</tr>
	<tr align="center">
		<td><span>综合评价</span></td>
		<td colspan="2"><span><input name="evaluation" id="evaMark" type="text" size="45"
			value="请对您的学习情况进行综合评价" /></span></td>
	</tr>
	<tr align="center">
		<td><span>学习展望</span></td>
		<td colspan="2"><span><input name="expectation" id="evaMarkExpectation" type="text" size="45"
			value="请对您下一阶段的学习情况做一个展望" /></span></td>
	</tr>
	<tr align="center">
		<td>
        <input type="hidden" name="taskid" value="<?php echo $evaData['taskid'] ?>" />
			<input type="hidden" name="roleid" value="<?php echo $evaData['roleid'] ?>" />
		</td>
		<td>
			<input type="hidden" name="userid" value="<?php echo $evaData['userid'] ?>" />
			<input type="hidden" name="instanceid" value="<?php echo $evaData['instanceid'] ?>" />
		</td>
		<td><input type="submit" name="submit" value="提交" id="evaSelfSub" /></td>
	</tr>
</table>
<?php if(!$isPm) { ?>
<input type="hidden" name="organization" value="0"  /> 
<input type="hidden" name="decision" value="0"  /> 
<?php } ?>
</form>
<br />

</div>

