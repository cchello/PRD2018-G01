<?php $this->load->view('main/header');?>
<link
	rel="stylesheet" type="text/css" href="/css/main.css" />
<div class="maincontent">
<div class="main_nav">现在位置：PBCLS >> 案例的实例库</div>
<div class="sidebar">
<div class="side_nav"><b>Case Details</b>
<hr />
<p><a href=<?php echo site_url("/cc/ccshow/".$case_id);?>>详细信息</a></p>
<p><strong>>>已有的实例</strong></p>
<p><a href=<?php echo site_url("/cc/ccdis/".$case_id);?>>案例讨论区</a></p>
</div>
<div class="ins_cre"><b>Create Instance</b>
<hr />
<?php echo form_open('');?> <?php echo form_fieldset('新建实例');?> <?php echo form_label('实例名称:');?>
<?php echo form_input('ins_name',set_value('instance_name'));?>
<div align="right"><?php echo form_submit('cre_ins','新建');?></div>
<?php echo form_fieldset_close();?> <?php echo form_close('');?></div>
</div>
<div class="case_info">
<p>已有项目：</p>
<b>从下表中您可以看到从本案例创立的项目.</b> <?php 
if($case_ins != ''){
	foreach($case_ins as $row)
	{
		?>
	<table border="0" align="center" cellpadding="5" cellspacing="0" class="case_infor_table">
		<tr>
			<td><span>项目名称：</span></td>
			<td><span><a href="<?php echo site_url('ins/insEntry').'/'.$row['uid'];?>" ><?php echo $row['instancename'];?></a></span></td>
		</tr>
		<tr>
			<td><span>项目状态：</span></td>
			<td><span><?php echo $row['status'];?></span></td>
		</tr>
		<tr>
			<td><span>创建者：</span></td>
			<td><span><?php echo $row['creator'];?></span></td>
		</tr>
		<tr>
			<td><span>创建时间：</span></td>
			<td><span><?php echo $row['creationtime'];?></span></td>
		</tr>
		<tr>
			<td><span>项目进度：</span></td>
			<td><span><?php echo $row['progress'];?></span></td>
		</tr>
	</table>	
		<?php
		echo "<hr />";
	}
}
?></div>
</div>
<div class="footer">
<hr />
<p align="center">Copyright 2009 PBCLS Team. All Rights Reserved.</p>
</div>
</div>
</body>
</html>
