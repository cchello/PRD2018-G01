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
<table border="0" cellspacing="0" cellpadding="2" class="docTable">
	<tr align="center">
		<td width="30"><span>TaskID</span></td>
		<td width="30"><span>学习态度</span></td>
		<td width="30"><span>专业能力</span></td>
		<td width="30"><span>沟通能力</span></td>
		<td width="30"><span>协作能力</span></td>
		<td width="40"><span>文档通过情况</span></td>
		<td width="40"><span>文档完成时间</span></td>
		<td width="30"><span>文档风格</span></td>
		<td width="40"><span>文档创新情况</span></td>
		<td width="40"><span>文档正确情况</span></td>
		<td width="30"><span>综合得分</span></td>
		<td><span>综合评价</span></td>
	</tr>
    
	<?php if(!empty($result))foreach($result as $row)
	{ ?>
	<tr align="center">
		<td><span><?php echo $row['taskid']; ?></span></td>
		<td><span><?php 
		if($row['manager_attitude'] ==0) echo "D";
		else{
			switch ($row['manager_attitude'])
			{
				case 100: echo "A";break;
				case 80:  echo "B";break;
				case 60:  echo "C";break;
				case 40:  echo "D";break;
			}
		}
		?></span></td>
		<td><span><?php 
		if($row['manager_technique'] == 0) echo "D";
		else{
			switch ($row['manager_technique'])
			{
				case 100: echo "A";break;
				case 80:  echo "B";break;
				case 60:  echo "C";break;
				case 40:  echo "D";break;
			}
		}
		?></span></td>
		<td><span><?php
		if($row['manager_communication'] == 0) echo "D";
		else{
			switch ($row['manager_communication'])
			{
				case 100: echo "A";break;
				case 80:  echo "B";break;
				case 60:  echo "C";break;
				case 40:  echo "D";break;
			}
		}
		?></span></td>
		<td><span><?php
		if($row['manager_cooperation'] == 0) echo "D";
		else{
			switch ($row['manager_cooperation'])
			{
				case 100: echo "A";break;
				case 80:  echo "B";break;
				case 60:  echo "C";break;
				case 40:  echo "D";break;
			}
		}
		?></span></td>
		<td><span><?php
		if($row['manager_docpassrate'] == 0) echo "D";
		else{
			switch ($row['manager_docpassrate'])
			{
				case 100: echo "A";break;
				case 80:  echo "B";break;
				case 60:  echo "C";break;
				case 40:  echo "D";break;
			}
		}
		?></span></td>
		<td><span><?php
		if($row['manager_docpasstime'] == 0) echo "D";
		else{
			switch ($row['manager_docpasstime'])
			{
				case 100: echo "A";break;
				case 80:  echo "B";break;
				case 60:  echo "C";break;
				case 40:  echo "D";break;
			}
		}
		?></span></td>
		<td><span><?php 
		if($row['manager_docstyle'] == 0) echo "D";
		else{
			switch ($row['manager_docstyle'])
			{
				case 100: echo "A";break;
				case 80:  echo "B";break;
				case 60:  echo "C";break;
				case 40:  echo "D";break;
			}
		}
		?></span></td>
		<td><span><?php 
		if($row['manager_docinnovation'] == 0) echo "D";
		else{
			switch ($row['manager_docinnovation'])
			{
				case 100: echo "A";break;
				case 80:  echo "B";break;
				case 60:  echo "C";break;
				case 40:  echo "D";break;
			}
		}
		?></span></td>
		<td><span><?php
		if($row['manager_doccorrectness'] == 0) echo "D";
		else{
			switch ($row['manager_doccorrectness'])
			{
				case 100: echo "A";break;
				case 80:  echo "B";break;
				case 60:  echo "C";break;
				case 40:  echo "D";break;
			}
		}
		?></span></td>
		<td><span><?php		
		if($row['manager_score'] == 0.0) echo "D";
		else{
			$score = $row['manager_score'];
			if($score >80.0 && $score <=100.0){
				echo "A";
			}
			elseif ($score >60.0 && $score <=80.0){
				echo "B";
			}
			elseif ($score >40.0 && $score <=60.0){
				echo "C";
			}
			elseif ($score <=40.0){
				echo "D";
			}
		}
		?></span></td>
		<td><span><?php 
		if($row['manager_mark'] == null) echo "未评价";
		else echo $row['manager_mark']; ?></span></td>
	</tr>
	<?php } ?>
    <?php if(empty($result)) { ?>
    <tr><td colspan="12"><span><strong><?php echo "<br />";echo "无任何评价记录"; ?></strong></span></td></tr>
    <?php } ?>
</table>
</div>
<?php $this->load->view("project/eva/result/evaResultSelect");?>
	

