<?php $this->load->view('caseView/caseInfoHeader');?>
<div class="maincontent">
<div class="main_nav">
<hr>
现在位置：PBCLS >> 案例讨论
</div>
<div class="discusspace"> 
	<div class="bbs">
	<div class="subMain">
	    <table width="100%" align="center" border="1" cellpadding="0" cellspacing="0">
	      <tr class="title">
	        <td height="auto"><a href="#" id="<?php echo $caseid?>"><?php echo $casename?></a></td>
	      </tr>
	    </table>
	    <br/>
	    <a href="<?php echo site_url("bbs/addSubject/$caseid")?>"><b>[发表话题]</b></a>
	    <table width="100%" align="center" border="1" cellpadding="0" cellspacing="0">
	        <tbody>
	            <tr>
	              <th width="15%"></th>
	              <th width="40%">主题</th>
	              <th width="15%">作者</th>
	              <th width="10%">回复/人气</th>
	              <th width="20%">最后更新|回复人</th>
	            </tr>
	        </tbody>
			<tbody id="subList"></tbody>
			<?php 
				foreach ($records as $row)
				{
					$subjectid = $row['subjectid'];
					$author = $this->usermodel->getUsername($row['authorid']);
					if (!$row['lastauthorid'])
					{
						$lastauthor = $author;
						$row['lastreplytime'] = $row['submittime'];
					}
					else $lastauthor = $this->usermodel->getUsername($row['lastauthorid']);		
			?>
			<tr>
				<td><a class='deleteSub' href='#' name='<?php echo $row['subjectid'];?>'>删除</a></td>
				<td><a class='subTitle' href='#' name='<?php echo $row['subjectid'];?>'><?php echo $row['title'];?></a></td>
				<td align='center'><?php echo $author;?></td>
				<td align='center'><?php echo $row['replys'];?>/<?php echo $row['clicks'];?></td>
				<td><?php echo $row['lastreplytime'];?>|<?php echo $lastauthor;?></td>
			</tr>
			<?php }?>
		</table>
	</div>
	</div>
	<div class="ajaxSubject">
	</div>
</div>
</div>
<?php $this->load->view('caseView/caseInfoBottom');?>
