<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<tr>
	<td style="text-align:right;"><span>您当前的角色：</span></td>
	<td style="text-align:left;"><span><?php if($myRole != '-1') echo $myRole['roleName'];else echo "无";?></span></td>
</tr>
<tr>
	<td style="text-align:right;"><span>目标角色：</span></td>
	<td style="text-align:left;"><select id="rolesOpRole" style="width:125px">
		<option value='-1'>角色选择</option>
		<?php foreach($roles as $role){ ?>
			<option value="<?php echo $role['roleId'];?>"><?php echo $role['roleName'];?></option>
		<?php }?>
		</select>
	</td>
	<td>
		<input type="button" value="关闭角色" style="display:none" id="closeRole" />
		<input type="button" value="开启角色" style="display:none" id="openRole" />
	</td>
	<td><input type="button" value="担任" style="display:none" id="acMyself" /></td>
</tr>
<tr>
	<td style="text-align:right;"><span>目标用户：</span></td>
	<td style="text-align:left;">
		<select id="rolesOpUsers" style="width:125px" disabled=disabled >
		</select>
	</td>
	<td colspan='2'><input type="button" value="同意" style="display:none" id="acRolePlayer" />
		<input type="button" value="拒绝" style="display:none" id="denyRolePlayer" />
	</td>
	<td><input type="button" value="踢出" style="display:none" id="banRolePlayer" />
	</td>
</tr>