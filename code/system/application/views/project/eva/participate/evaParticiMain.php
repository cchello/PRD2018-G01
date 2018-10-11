<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 * 判断条件增加了status分别为1,2,3时的情况 wmc2010/06/09
 */
?>
<?php if($evaStatus == '0')  {?>
<p style="margin-left:15px;font-size:14px;">评价系统尚未开启，请稍后重试！</p>
<?php //}else{?>
<!-- 如果$evaStatus == '2'表明项目已经结束，所有人都可以进行项目级评价了 -->
<?php }elseif($evaStatus == '3') {?>
<p style="margin-left:15px;font-size:14px;">项目已结束，不能再进行评价！</p>

<?php }elseif($evaStatus == '1' && $myRole['roleId']!= '1') {?>
<p style="margin-left:15px;font-size:14px;">项目尚未结束，请在项目结束后评价！</p>
<?php }else {?>
<table border="0" cellspacing="0" cellpadding="5" class="docTable" style="margni-top:20px;">
	<tr>
		<td width="140" style="text-align:right;"><span>您当前的角色是：</span></td>
		<td style="text-align:left;"><span><?php echo $myRole['roleName'];?></span></td>
	</tr>
	<tr>
		<td style="text-align:right;"><span>您能够评价的对象：</span></td>
		<td style="text-align:left;">
			<select id="evaTypeSelect" style="width:100px;">
				<?php if(!$isInstructor && $evaStatus == '2'){?>
				<option value="1">自我评价</option>
				<?php }?>
				<?php if($evaStatus == '2'){?>
				<option value="2">小组成员</option>
				<?php }?>
				<?php if($isInstructor){?>
				<option value="3">小组总评</option>
				<?php }?>
				<?php if(($myRole['roleId'] == EVA_ROLE_PM) && ($evaStatus == '1' || $evaStatus == '3')){?>
				<option value="4">任务评价</option>
				<?php }?>
			</select>
			<input type="button" id="evaTypeSub" value="确认" />
		</td>
	</tr>
</table>
<?php }?>
