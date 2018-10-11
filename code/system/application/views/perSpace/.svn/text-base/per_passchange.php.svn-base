<?php $this->load->view('main/header');?>
<link rel="stylesheet" type="text/css" href="/css/main.css" />
  <div class="maincontent">
       <div class="main_nav">
            现在位置：PBCLS >> 个人信息 >> 更换密码
        </div>
   	  <div class="sidebar">
        	<?php echo img('/img/u25.jpg');?>
            <ul class="sidebar_nav">
                <li><a href=<?php echo site_url("per/index")?>>主要信息</a></li>
                <li><a href=<?php echo site_url("per/portrait")?>>更换头像</a></li>
                <li><a href=<?php echo site_url("per/ins")?>>我的实例</a></li>
                <li><a href=#><strong>更换密码</strong></a></li>
                <li><a href=<?php echo site_url("per/mail")?>>站内信</a></li>
            </ul>
   	</div>
        <div class="mainbody">
			<div class="pass_change">
            	<?php echo form_open('');
						echo form_fieldset('更换密码');
							echo form_label('帐户名称：','account');
							echo $this->session->userdata('user_name');
							echo "<br>";
							echo form_label('旧密码：','old_pass');
							echo form_password('old_pass','old_pass');
							echo "<br>";
							echo form_label('新密码:','new_pass');
							echo form_password('new_pass','new_pass');
							echo "<br>";
							echo form_label('确认密码：','pass_confirm');
							echo form_password('pass_confirm','pass_confirm');
						echo form_fieldset_close();
					echo form_close();
				?>
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