<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<div class="evaResultBar">
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<caption><strong>指导者的评价</strong></caption>
	<tr align="center">
		<th width="200"><span>评价项目</span></th>
		<th width="70"><span>权重%</span></th>
		<th width="250"><span>等级</span></th>
	</tr>
	<tr align="center">
		<td><span>学习状态</span></td>
		<td><span>20</span></td>
		<td><span><?php if($result['instructor_attitude'] == null) echo "未评价";
		else echo $result['instructor_attitude']; ?></span></td>
	</tr>
	<tr align="center">
		<td><span>资源上传下载数量</span></td>
		<td><span>20</span></td>
		<td><span><?php if($result['instructor_updownquantity'] == null) echo "未评价";
		else echo $result['instructor_updownquantity']; ?></span></td>
	</tr>
	<tr align="center">
		<td><span>资源上传下载质量</span></td>
		<td><span>20</span></td>
		<td><span><?php if($result['instructor_updownquality'] == null) echo "未评价";
		else echo $result['instructor_updownquality']; ?></span></td>
	</tr>
	<tr align="center">
		<td><span>BBS问答次数</span></td>
		<td><span>20</span></td>
		<td><span><?php if($result['instructor_bbsquantity'] == null) echo "未评价";
		else echo $result['instructor_bbsquantity']; ?></span></td>
	</tr>
	<tr align="center">
		<td><span>BBS问答质量</span></td>
		<td><span>20</span></td>
		<td><span><?php if($result['instructor_bbsquality'] == null) echo "未评价";
		else echo $result['instructor_bbsquality']; ?></span></td>
	</tr>
	<tr align="center">
		<td><span>综合评价</span></td>
		<td><span><?php if($result['instructor_score'] == null) echo "未评价";
		else echo $result['instructor_score']; ?></span></td>
		<td><span><?php if($result['instructor_mark'] == null) echo "未评价";
		else echo $result['instructor_mark']; ?></span></td>
	</tr>
</table>
</div>
	<?php $this->load->view("project/eva/result/evaResultSelect");?>
