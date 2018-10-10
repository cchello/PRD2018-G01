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
<?php if($isInstructor) {?>
<h5>项目学习中，指导者对学员的评价十分重要，恰当的评价能充分促进学员的学习，请根据实际情况评价您指导的学员。</h5>
<?php }?>

<?php if(!$isInstructor) {?>
<h5>项目学习中，组员之间的互评十分重要，恰当的评价能充分促进学员之间的学习，请根据实际情况评价您的组员。</h5>
<?php }?>

<p><strong></strong>请您在开始评价之前仔细阅读评价标准。</p>
<br />
<table border="0" align="left" class="docTable" >
<caption><span>组员列表</span></caption>
<tr>
	<th width='160' align="center"><span>角色名称</span></th>
	<th width='70' align="center"><span>角色职能</span></th>
	<th width='150' align="center"><span>角色扮演者</span></th>
</tr>
<?php foreach( $result as $row) { ?>
<tr align="center">
	<td><span><?php echo $row['rolename'];?></span></td>
	<td><span><?php echo $row['role'];?></span></td>
	<td><span><?php echo $row['username'];?></span></td>
</tr>
<?php } ?>
<tr>
	<td colspan='3'><hr /></td>
</tr>
<tr>
	<td><span>请选择您要评价的用户:</span></td>
	<td><select id="evaRolesSelect" style="width:125px">
		<option value='-1'>角色选择</option>
		<?php foreach($result as $row){ ?>
			<?php if($row['uid'] != $this->session->userdata('user_id') && $row['roleid'] != '0'){?>
			<option value="<?php echo $row['uid'];?>"><?php echo $row['username'];?></option>
			<?php }?>
		<?php }?>
		</select>
	</td>
	<td><input type="button" value="确认" style="display:none" id="evaChoose" /></td>
</tr>
</table>
<br />
</div>