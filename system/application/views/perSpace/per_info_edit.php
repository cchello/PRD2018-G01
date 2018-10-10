<?php $this->load->view('main/header');?>
<link rel="stylesheet" type="text/css" href="/css/main.css" />
  <div class="maincontent">
  	<div class="main_nav">
    现在位置：PBCLS >> 个人中心 >>修改个人信息
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
    	<div class="basic_info">
        <b>基本信息：</b>
      <table border="0" align="center" cellpadding="5" cellspacing="0">
        	<tr>
            	<td width="80" valign="top">
                	<p align="left">用户名：</p>
              </td>
                <td width="588">
                	<p><?php echo $user_info['user_name'];?></p>
                </td>
            </tr>
            <tr>
            	<td valign="top">
                	<p align="left">真实姓名：</p>
              </td>
                <td>
                	<p><?php ?></p>
                </td>
            </tr>
            <tr>
            	<td valign="top">
                	<p align="left">性别：</p>
                </td>
                <td>
               	  	<table width="200">
                	  <tr>
                	    <td><p><label>
                	      <input type="radio" name="sexRadio" value="male" id="sexRadio_0" />
                	      男</label></p></td>
                	    <td><p><label>
                	      <input type="radio" name="sexRadio" value="female" id="sexRadio_1" />
                	      女</label></p></td>
                          <td><p><label>
                	      <input type="radio" name="sexRadio" value="unknown" id="sexRadio_2" />
                	      保密</label></p></td>
           	    	  </tr>
       	    	  </table>
                </td>
            </tr>
            <tr>
            	<td valign="top">
                	<p align="left">生日：</p>
              </td>
                <td>
                	<p></p>
                </td>
            </tr>
            <tr>
            	<td valign="top">
                	<p align="left">注册时间：</p>
              </td>
                <td>
                	<p><?php echo $user_info['registertime'];?></p>
                </td>
            </tr>
            <tr>
            	<td valign="top">
                	<p align="left">兴趣爱好：</p>
              </td>
                <td>
                	<textarea cols="75" rows="6"><?php echo $user_info['interets'];?></textarea>
                </td>
            </tr>
            <tr>
            	<td valign="top">
                	<p align="left">个人签名：</p>
              </td>
                <td>
                	<textarea cols="75" rows="6"><?php echo $user_info['signature'];?></textarea>
                </td>
            </tr>
        </table>
        </div>
        <div class="contact_info">
        <b>联系信息：</b>
        <table border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
            	<td width="80">
                	<p align="left">QQ:</p>
                </td>
                <td width="588">
                	<p><?php echo $user_info['qq'];?></p>
                </td>
            </tr>
            <tr>
            	<td>
                	<p align="left">MSN:</p>
                </td>
                <td>
                	<p><?php echo $user_info['msn'];?></p>
                </td>
            </tr>
            <tr>
            	<td>
                	<p align="left">E-mail:</p>
                </td>
                <td>
                	<p><?php echo $user_info['email'];?></p>
                </td>
            </tr>
            <tr>
            	<td>
                	<p align="left">Home-Page:</p>
                </td>
                <td>
                	<p><?php echo $user_info['homepage'];?></p>
                </td>
            </tr>
        </table>
      </div>
      <div class="submit">
      
      </div>
    </div>
  </div>
</div>
</body>