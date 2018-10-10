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
	<tr align="center">
		<th colspan="2">个人成绩部分</th>
	</tr>
	<tr align="center">
		<td width="200"><span>自评</span></td>
		<td><span><?php if(!isset($selfEvaluationResult)){ echo "未评价";}
		else echo $selfEvaluationResult; ?></span></td>
		<tr align="center">
			<td><span>组员评价</span></td>
			<td><span><?php if(!isset($memberEvaluation)){ echo "未评价";}
			else echo $memberEvaluation; ?></span></td>
			<tr align="center">
				<td><span>经理评价</span></td>
				<td><span><?php if(!isset($managerEvaluationResult)){ echo "未评价";}
				else echo $managerEvaluationResult; ?></span></td>
				<tr align="center">
					<td><span>指导者评价</span></td>
					<td><span><?php if(!isset($instrutorEvaluationResult)){ echo "未评价";}
					else echo $instrutorEvaluationResult; ?></span></td>
					<tr align="center">
						<th colspan="2">小组成绩部分</th>
					</tr>
					<tr align="center">
						<td><span>小组成绩</span></td>
						<td><span><?php if(!isset($teamEvaluationResult)){ echo "未评价";}
						else echo $teamEvaluationResult; ?></span></td>
						<tr align="center">
							<th colspan="2">最终成绩部分</th>
						</tr>
						<tr align="center">
							<td><span>最终成绩</span></td>
							<td><span><?php 
							if($finalEvaluationResult > 85.0 && $finalEvaluationResult <= 100.0)
							{
								echo "A";
							}
							elseif($finalEvaluationResult > 70.0 && $finalEvaluationResult <= 85.0)
							{
								echo "B";
							}
							elseif($finalEvaluationResult > 55.0 && $finalEvaluationResult <= 70.0)
							{
								echo "C";
							}
							elseif($finalEvaluationResult > 0.0 && $finalEvaluationResult <= 55.0)
							{
								echo "D";
							}
							elseif($finalEvaluationResult == 0.0)
							{
								echo "未评价";
							}
		                    ?></span></td>
</table>
</div>
<?php $this->load->view("project/eva/result/evaResultSelect");?>