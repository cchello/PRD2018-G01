<?php $this->load->view('main/header');?>
<link rel="stylesheet" type="text/css" href="/css/main.css" />
  <div class="maincontent">
      <div class="main_nav">
            现在位置：PBCLS >> 个人信息 >> 更改头像
      </div>
   	  <div class="sidebar">
        	<?php echo img('/img/u25.jpg');?>
            <ul class="sidebar_nav">
                <li><a href=<?php echo site_url("per/index")?>>主要信息</a></li>
                <li><a href=<?php echo site_url("per/portrait")?>><strong>更换头像</strong></a></li>
                <li><a href=<?php echo site_url("per/ins")?>>我的实例</a></li>
                <li><a href=<?php echo site_url("per/changpass")?>>更换密码</a></li>
                <li><a href=<?php echo site_url("per/mail")?>>站内信</a></li>
            </ul>
   	</div>
        <div class="mainbody">
			<div class="portrait_upload">
            	<b>上传头像</b>
                <hr />
                <p>上传的图片文件必须是gif或者jpg格式，大小请控制在1M以内</p>
                <?php echo form_open('');?>
                	<?php echo form_upload();?>
                    <?php echo form_reset('reset','取消选择');?>
                    <?php echo form_submit('submit','上传');?>
                <?php echo form_close();?>
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