<?php $this->load->view('main/header');?>
<link rel="stylesheet" type="text/css" href="/css/main.css" />
  <div class="maincontent">
      <div class="main_nav">
            现在位置：PBCLS >> 个人信息 >> 站内信
      </div>
   	  <div class="sidebar">
        	<?php echo img('/img/u25.jpg');?>
            <ul class="sidebar_nav">
                <li><a href=<?php echo site_url("per/index")?>>主要信息</a></li>
                <li><a href=<?php echo site_url("per/portrait")?>>更换头像</a></li>
                <li><a href=<?php echo site_url("per/ins")?>>我的实例</a></li>
                <li><a href=<?php echo site_url("per/changpass")?>>更换密码</a></li>
                <li><a href=#><strong>站内信</strong></a></li>
            </ul>
   	</div>
        <div class="mainbody">
			<div class="mail_charge">
				12331232
            </div>
            
        </div>
  </div>
<?php $this->load->view('main/footer')?> 