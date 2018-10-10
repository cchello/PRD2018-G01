<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- display project roles informations -->
<caption><span>当前角色状况：</span></caption>
<tr>
	<th width='100' align="center"><span>角色名称</span></th>
	<th width='80' align="center"><span>角色职能</span></th>
	<th width='80' align="center"><span>角色状态</span></th>
	<th width='80' align="center"><span>角色扮演者</span></th>
	<th width='80' align="center"><span>申请者列表</span></th>
</tr>
<?php if($roles != '-1')foreach($roles as $role){?>

<tr>
		<td align="center"><span><?php echo $role['roleName'];?></span></td>
		<td align="center"><span title="<?php echo $role['roleDescription']?>"><?php echo $role['roleResponsbility']?></span></td>
		<td align="center"><span id="roleStatus"><?php echo $role['roleStatus'];?></span></td>
		<td align="center"><span><?php if($role['actorId'] != '-1')echo  $role['actorName']; else echo "无（computer）";?></span></td>
		<td align="center">
			<select name="applyerList" style="width:80px">
				<?php if(empty($role['applyingList'])){?>
					<option value="0">无</option>
				<?php }else{ 
					foreach($role['applyingList'] as $applyer){?>
					<option value="<?php echo $applyer['userId'];?>"><?php echo $applyer['userName'];?></option>
				<?php }
				}?>
			</select>
		</td>
</tr>
<?php }?>