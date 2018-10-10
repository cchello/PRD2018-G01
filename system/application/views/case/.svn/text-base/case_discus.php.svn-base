<?php $this->load->view('main/header');?>
    <div class="maincontent">
    	<div class="main_nav">
        	现在位置：PBCLS >> 案例讨论
        </div>
    	<div class="sidebar">
        	<div class="side_nav">
              <b>案例的详细描述</b>
              <hr />
              <p><a href=<?php echo site_url("/cc/ccshow/".$caseid);?>>详细信息</a></p>
              <p><a href=<?php echo site_url("/cc/ccins/".$caseid);?>>已有的实例</a></p>
              <p><strong>>>案例讨论区</strong></p>
            </div>
            <div class="ins_cre">
            	<b>创建实例</b>
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
        	<p>案例讨论</p>
<!---->
<div class="bbs">
    <table width="680" align="center" border="1" cellpadding="0" cellspacing="0">
      <tr class="title">
        <td height="30"><a href="#">讨论区首页</a> →<a href="<?php echo site_url("cc/ccdis/$caseid")?>"><?php echo $casename?></a></td>
      </tr>
    </table>
    <br/>
    <a href="<?php echo site_url("bbs/addSubject/$caseid")?>"><b>[发表话题]</b></a>
    <table width="100%" align="center" border="1" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
              <th width="10%"></th>
              <th width="40%">主题</th>
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
                        <td>
                        <a href="<?php echo site_url("bbs/deleteSubject/$subjectid")?>" onclick="return del()">删除</a>
                        </td>
                        <td><a href="<?php echo site_url("bbs/subject/$subjectid")?>"><?php echo $row['title']?></a></td>
                        <td align="center"><?php echo $author?></td>
                        <td align="center"><?php echo $row['replys']?>/<?php echo $row['clicks']?></td>
                        <td><?php echo $row['lastreplytime']?>|<?php echo $lastauthor?></td>
                    </tr>
            <?php 
            }
            ?>   
        </tbody>
	</table>
	<div align="center">
	    <a href="?page=1&action=">首页</a>
	    <a href="?page=<?php echo $page>1?$page-1:$page?>&action="">上一页</a>
	    <a href="#"><?php echo $page?></a>
	    <a href="?page=<?php echo $page<$pages?$page+1:$pages?>&action=">下一页</a>
	    <a href="?page=<?php echo $pages?>&action="">尾页 </a>
	</div>
</div>
            
</div>
    </div>
    <div class="footer">
       <hr />
       <p align="center">Copyright 2009 PBCLS Team. All Rights Reserved.</p>
    </div>
</div>
</body>
</html>