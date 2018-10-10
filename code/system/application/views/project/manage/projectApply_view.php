<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- apply project -->
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
<?php $this->load->view('project/manage/projectRolesInfo_view');?>
<tr>
	<td colspan='5'><hr /></td>
</tr>
<tr>
	<td><span>您当前：</span></td>
</tr>
<tr>
	<td><span style="font-weight:bold;"><?php echo $myRole['name'];?></span></td>
	<td><span><?php if($myRole['status'] != '-1')echo $myRole['roleName'];?></span></td>
	<td><?php if($myRole['status'] == '1'){ ?>
			<input type="button" id="cancelApply" style="width:80px;" name="<?php echo $myRole['roleId'];?>" value="取消申请" />
		<?php }else if($myRole['status'] == '2'){?>
			<input type="button" id="quitRole" style="width:80px;" name="<?php echo $myRole['roleId'];?>" value="退出角色" />
		<?php }?>
	</td>
	<td></td>
</tr>
<?php if($myRole['status'] == '-1'){?>
<tr>
	<td><span>角色申请列表：</span></td>
	<td><select id="roleApplyChoose" style="width:125px">
		<option value='-1'>角色选择</option>
		<?php foreach($roles as $role){ ?>
			<option value="<?php echo $role['roleId'];?>"><?php echo $role['roleName'];?></option>
		<?php }?>
		</select>
	</td>
	<td><input type="button" value="申请" id="roleApply" style="display:none" /></td>
</tr>
<?php }?>
</table>