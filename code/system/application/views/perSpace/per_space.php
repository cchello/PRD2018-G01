<?php $this->load->view('main/header');?>
<link rel="stylesheet" type="text/css" href="/css/main.css" />
  <div class="maincontent">
  	<div class="main_nav">
    现在位置：PBCLS >>个人中心
    </div>
	<div class="sidebar">
    	<?php echo img('/img/u25.jpg');?>
        <ul class="sidebar_nav">
        	<li><a href=#><strong>主要信息</strong></a></li>
            <li><a href=<?php echo site_url("per/portrait")?>>更换头像</a></li>
            <li><a href=<?php echo site_url("per/ins")?>>我的实例</a></li>
            <li><a href=<?php echo site_url("per/changpass")?>>更换密码</a></li>
            <li><a href=<?php echo site_url("per/mail")?>>站内信</a></li>
        </ul>
    </div>
    <div class="mainbody">
    	<b><strong>帐户名：<?php echo $this->session->userdata('user_name');?></strong></b>

        <hr />
        <div class="self_info">
                <table border="0" align="center" cellpadding="5" cellspacing="0">
                      <caption>
                        基本信息
                      </caption>
                      <tr>
                        <td width="96"><p>性别：</p></td>
                        <td width="581"><p><?php echo $self_info['sex'];?></p></td>
                      </tr>
                      <tr>
                        <td><p>注册时间：</p></td>
                        <td><p><?php echo $self_info['reg_time'];?></p></td>
                      </tr>
                      <tr>
                        <td><p>登录次数：</p></td>
                        <td><p><?php echo $self_info['login_times'];?></p></td>
                      </tr>
                      <tr>
                        <td><p>兴趣爱好：</p></td>
                        <td><p><?php echo $self_info['hobbies'];?></p></td>
                      </tr>
                      <tr>
                        <td><p>个人签名：</p></td>
                        <td><p><?php echo $self_info['signature'];?></p></td>
                      </tr>
                    </table>
                    <hr/>
          <table border="0" align="center" cellpadding="5" cellspacing="0">
        	<caption>联系方式</caption>
            <tr>
            	<td width="68">
                	<p>QQ:</p>
                </td>
                <td width="609">
                	<p><?php echo $contact_info['qq'];?></p>
                </td>
            </tr>
            <tr>
            	<td>
                	<p>MSN:</p>
                </td>
                <td>
                	<p><?php echo $contact_info['msn'];?></p>
                </td>
            </tr>
            <tr>
            	<td>
                	<p>E-mail:</p>
                </td>
                <td>
                	<p><?php echo $contact_info['email'];?></p>
                </td>
            </tr>
            <tr>
            	<td>
                	<p>Home-Page:</p>
                </td>
                <td>
                	<p><?php echo $contact_info['home_page'];?></p>
                </td>
            </tr>
        </table>
      </div>
        <div class="per_dynamic">
        	<b>个人动态:</b>
            <br />
            <?php 
			?>
        </div>
        <div class="self_message">
        	<b>留言板</b>
            <br />
            <?php 
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