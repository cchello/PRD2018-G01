<?php $this->load->view('main/header');?>
    <div class="maincontent">
    	<div class="main_nav">
        	现在位置：PBCLS >> 案例讨论
        </div>
    	<div class="sidebar">
        	<div class="side_nav">
              <b>Case Details</b>
              <hr />
              <p><a href=<?php echo site_url("/cc/ccshow/".$caseid);?>>Case Information</a></p>
              <p><a href=<?php echo site_url("/cc/ccins/".$caseid);?>>Case Instances</a></p>
              <p><strong>>>Case Discussion</strong></p>
            </div>
            <div class="ins_cre">
            	<b>Create Instance</b>
                <hr />
                <?php echo form_open('');?>
                <?php echo form_fieldset('新建实例');?>
                	<?php echo form_label('实例名称:');?>
                    <?php echo form_input('ins_name',set_value('instance_name'));?>
                    <div align="right"><?php echo form_submit('cre_ins','新建');?></div>
                <?php echo form_fieldset_close();?>
                <?php echo form_close('');?>
            </div>
        </div>
        <div class="case_info">
        	<p>Case Discussions</p>
            <b>这里是小型论坛，找源代码来帖.</b>
            
<div class="bbs">
<table width="100%"  align="center" border="1" cellpadding="0" cellspacing="0">
  <tr class="title">
    <td height="30"><a href="<?php echo site_url('bbs')?>">讨论区首页</a> →<a href="">案例1</a></td>
  </tr>
</table>
<br/>
<a href="<?php echo site_url("bbs/addSubject")?>"><b>[发表话题]</b></a>
<table width="100%" align="center" border="1" cellpadding="0" cellspacing="0">
	<tbody>
        <tr>
          <th></th>
          <th width="60%">主题</th>
          <th width="10%">作者</th>
          <th width="10%">回复/人气</th>
          <th width="20%">最后更新|回复人</th>
        </tr>
<?php foreach ($records as $row)
{
	$subjectid = $row['subjectid'];
	$author = $this->usermodel->getUsername($row['authorid']);
	if(!$row['lastauthorid'])
	{
		$lastauthor = $author;
		$row['lastreplytime'] = $row['submittime'];
	}
	else 
		$lastauthor = $this->usermodel->getUsername($row['lastauthorid']);
?>
         <tr>
        	<td width="5%">
        	<a href="<?php echo site_url("bbs/deleteSubject/$subjectid")?>" onclick="return del()">删除</a>
        	</td>
            <td width="50%"><a href="<?php echo site_url("bbs/subject/$subjectid")?>"><?php echo $row['title']?></a></td>
            <td width="7%" align="center"><?php echo $author?></td>
            <td width="8%" align="center"><?php echo $row['replys']?>/<?php echo $row['clicks']?></td>
            <td width="25%"><?php echo $row['lastreplytime']?>|<?php echo $lastauthor?></td>
        </tr>
<?php 
}
?>   
    </tbody>
</table>

</div>

</div>
</body>
</html>