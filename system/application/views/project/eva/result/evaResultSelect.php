<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<div class="evaResultSelectBar">
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
<tr>
	<td colspan='3'><hr /></td>
</tr>
<tr>
	<td><span>其他评价：</span></td>
	<td colspan='2' style="text-align:left">
		<span id="evaResultType" style="display:none;"><?php echo $evaResultType;?></span>
		<select id="evaResultSelect">
			<option value='-1'>请选择评价类型：</option>
		<?php for($i = 0; $i < 5; ++$i){
			switch($i){
				case '0':
					if($i != $evaResultType)echo "<option value='0'>指导者对小组的评价</option>";
				break;
				case '1':
					if($i != $evaResultType)echo "<option value='1'>指导者给我的评价</option>";
				break;
				case '2':
					if($i != $evaResultType)echo "<option value='2'>项目经理给我的评价</option>";
				break;
				case '3':
					if($i != $evaResultType)echo "<option value='3'>其他组员给我的评价</option>";
				break;
				case '4':
					if($i != $evaResultType)echo "<option value='4'>我的最终评价</option>";
				break;
			}
		}?>
		</select>
	</td>
</tr>
</table>
</div>