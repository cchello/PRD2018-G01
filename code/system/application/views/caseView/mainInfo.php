<div class="case_info">
	<p>已有实例：</p>
	<b>从下表中您可以看到从本案例创立的实例.</b>
	<?php 
	if($caseIns != ''){
		foreach($caseIns as $row)
		{
		?>
			<div class="case_infor_table">
				<table width="689" border="0" align="center" cellpadding="5" cellspacing="0">
					<tr>
						<td>
							<p>实例名称：</p>
						</td>
						<td>
							<p>
								<?php echo $row['instancename'];?>
							</p>
						</td>
					</tr>
					<tr>
						<td>
							<p>实例状态：</p>
						</td>
						<td>
							<p>
								<?php 
									switch($row['status']){
										case 0:
											$status = "未准备";
											break;
										case 1:
											$status = "已准备";
											break;
										case 3:
											$status = "已开始，正在进行";
											break;
										case 6:
											$status = "已结束";
											break;
										default:
											$status = "出错";
											break;
									}
									echo $status;
								?>
							</p>
						</td>
					</tr>
					<tr>
						<td>
							<p>创建者：</p>
						</td>
						<td>
							<p>
								<?php echo $row['creator'];?>
							</p>
						</td>
					</tr>
					<tr>
						<td>
							<p>创建时间：</p>
						</td>
						<td>
							<p>
								<?php echo $row['creationtime'];?>
							</p>
						</td>
					</tr>
				</table>
			</div>
			<?php
		}
	}
	?>
</div>