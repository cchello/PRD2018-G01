<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<?php if($evaStatus == '0'){?>
<p style="margin-left: 15px; font-size: 14px;">评价系统尚未开启，请稍后重试！</p>
<?php }else{?>
<div class="evaResultBar">
<table border="0" cellspacing="0" cellpadding="5" class="docTable">
	<tr>
		<th colspan="3" align="center">指导老师对小组的评价</th>
	</tr>
	<tr align="center">
		<th width="200"><span>评价项目</span></th>
		<th width="70"><span>权重%</span></th>
		<th width="250"><span>等级</span></th>
	</tr>
	<tr align="center">
		<td><span>资源上传下载数量</span></td>
		<td><span>10</span></td>
		<td><span>
			<?php if($teamresult['updownquantity'] == null){
				echo "未评价";
			}else{
				echo $teamresult['updownquantity'];
			}?>
			</span>
		</td>
	</tr>
	<tr align="center">
		<td><span>资源上传下载质量</span></td>
		<td><span>10</span></td>
		<td><span><?php 
		if($teamresult['updownquality'] == null) echo "未评价";
		else echo $teamresult['updownquality']; ?>
		</span>
		</td>
	</tr>
	<tr align="center">
		<td><span>BBS问答次数</span></td>
		<td><span>10</span></td>
		<td>
			<span>
			<?php if($teamresult['bbsquantity'] == null){
				echo "未评价";
			}else{
				echo $teamresult['bbsquantity']; 
			}?>
			</span>
		</td>
	</tr>
	<tr align="center">
		<td><span>BBS问答质量</span></td>
		<td><span>10</span></td>
		<td>
			<span>
				<?php if($teamresult['bbsquality'] == null) echo "未评价";
					echo $teamresult['bbsquality']; ?>
			</span>
		</td>
	</tr>
	<tr align="center">
		<td><span>文档完成时间</span></td>
		<td><span>10</span></td>
		<td>
			<span>
				<?php if($teamresult['docpasstime'] == null) echo "未评价";
				echo $teamresult['docpasstime']; ?>
			</span>
		</td>
	</tr>
	<tr align="center">
		<td><span>文档创新情况</span></td>
		<td><span>10</span></td>
		<td>
			<span>
				<?php if($teamresult['docinnovation'] == null) echo "未评价";
					echo $teamresult['docinnovation']; ?>
			</span>
		</td>
	</tr>
	<tr align="center">
		<td><span>文档正确程度</span></td>
		<td><span>30</span></td>
		<td>
			<span>
				<?php if($teamresult['doccorrectness'] == null) echo "未评价";
					echo $teamresult['doccorrectness']; ?>
			</span>
		</td>
	</tr>
	<tr align="center">
		<td><span>文档风格</span></td>
		<td><span>10</span></td>
		<td>
			<span>
				<?php if($teamresult['docstyle'] == null) echo "未评价";
					echo $teamresult['docstyle']; ?>
			</span>
		</td>
	</tr>
	<tr align="center">
		<td><span>综合评价</span></td>
		<td>
			<span>
				<?php if($teamresult['score'] == null) echo "未评价";
				echo $teamresult['score'];?>
			</span>
		</td>
		<td>
			<span>
				<?php if($teamresult['mark'] == null) echo "未评价";
					echo $teamresult['mark']; ?>
			</span>
		</td>
	</tr>
	</table>
</div>
<?php 
if($myRole['roleId'] != '0')$this->load->view("project/eva/result/evaResultSelect");?>
<?php }?>


