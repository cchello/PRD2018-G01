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
<table border="0" cellspacing="0" cellpadding="1" class="docTable">
	<tr align="center">
        <?php if(!$isPm) {?>
        <td width="60"><span>评价来源</span></td>
		<td width="60"><span>学习态度</span></td>
		<td width="60"><span>专业能力</span></td>
		<td width="60"><span>沟通能力</span></td>
		<td width="60"><span>协作能力</span></td>
        <td width="60"><span>帮助他人</span></td>
		<td width="60"><span>综合得分</span></td>
		<td><span>综合评价</span></td>
        <?php } ?>
		
		<?php if($isPm){?>
        <td width="50"><span>评价来源</span></td>
		<td width="50"><span>学习态度</span></td>
		<td width="50"><span>专业能力</span></td>
		<td width="50"><span>沟通能力</span></td>
		<td width="50"><span>协作能力</span></td>
		<td width="50"><span>组织能力</span></td>
		<td width="50"><span>决策能力</span></td>
        <td width="50"><span>帮助他人</span></td>
		<td width="50"><span>综合得分</span></td>
        <td><span>综合评价</span></td>
		<?php }?>
		
	</tr>
	<?php if(isset($allinfo) && !empty($allinfo))foreach($allinfo as $row) { ?>
	<tr align="center">
		<td><span><?php echo $row['username']; ?></span></td>
		<td><span><?php switch ($row['attitude'])
		{
			case 100: echo "A";break;
			case 80:  echo "B";break;
			case 60:  echo "C";break;
			case 40:  echo "D";break;
		}
		?></span></td>
		<td><span><?php switch ($row['technique'])
		{
			case 100: echo "A";break;
			case 80:  echo "B";break;
			case 60:  echo "C";break;
			case 40:  echo "D";break;
		}
		?></span></td>
		<td><span><?php switch ($row['communication'])
		{
			case 100: echo "A";break;
			case 80:  echo "B";break;
			case 60:  echo "C";break;
			case 40:  echo "D";break;
		}
		?></span></td>
		<td><span><?php switch ($row['cooperation'])
		{
			case 100: echo "A";break;
			case 80:  echo "B";break;
			case 60:  echo "C";break;
			case 40:  echo "D";break;
		}
		?></span></td>
		<?php if($isPm){?>
		<td><span><?php switch ($row['organization'])
		{
			case 100: echo "A";break;
			case 80:  echo "B";break;
			case 60:  echo "C";break;
			case 40:  echo "D";break;
		}
		?></span></td>
		<td><span><?php switch ($row['decision'])
		{
			case 100: echo "A";break;
			case 80:  echo "B";break;
			case 60:  echo "C";break;
			case 40:  echo "D";break;
		}
		?></span></td>
		<?php }?>
		<td><span><?php switch ($row['helpme'])
		{
			case 100: echo "A";break;
			case 80:  echo "B";break;
			case 60:  echo "C";break;
			case 40:  echo "D";break;
		}
		?></span></td>
		<td><span><?php $score = $row['score'];
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
		?></span></td>
		<td><span><?php echo $row['mark']; ?></span></td>
	</tr>
	<?php } ?>
    <?php if(empty($result)) { ?>
    <tr><td colspan="10"><span><strong><?php echo "<br />"; echo "无任何评价记录"; ?></strong></span></td></tr>
    <?php } ?>
</table>
</div>
<?php $this->load->view("project/eva/result/evaResultSelect");?>