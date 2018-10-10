<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- manage project members-->
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
<tr>
	<th width='100' align="center"><span>项目状态：</span></th>
	<th width='125' align="center"><span><?php if(isset($insStatus)) echo $insStatus;?></span></th>
	<th width='150' align="center"><span></span></th>
	<th width='125' align="center"><span></span></th>
</tr>
<tr>
	<td style="text-align:right"><span>评价类型：</span></td>
	<?php if($insStatusId == INS_STATUS_STARTED){?>
	<td><span><?php 
		switch($evaType){
			case EVA_TYPE_EACHTASK:
				echo "任务级";
			break;
			case EVA_TYPE_ALLTASKFINISHED:    // modified by wmc 2010/06/21
				echo "项目级";
			break;
			default:
				echo "错误的评价类型";
			break;
		}
		?></span></td>
	<?php }else{?>
	<td>
		<select id="projectEvaType" style="width:100px">
			<option value='1'>任务级</option>
            <!--<option value="2">项目级</option> modified by wmc 2010/06/19 -->			
		</select>
	</td>
	<?php }?>
</tr>
<tr>
	<td style="text-align:right"><span>操作：</span></td>
	<td><select id="projectMana" style="width:100px">
		<option value='-1'>请选择：</option>
		<option value='1'>开始项目</option>
		<option value='2'>结束项目</option>
	</select>
	</td>
	<td><input type="button" id="projectManaConfirm" value="确认" /></td>
</tr>
</table>