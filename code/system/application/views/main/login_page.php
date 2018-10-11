<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>登录页面</title>
<!-- modified by wmc 2010/06/19  -->
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<style type="text/css">
<!--
body {font:12px Tahoma;margin:0px;text-align:center;background:#FFF;font-family:Tahoma,Verdana,STHeiTi,simsun,sans-serif;}
a:link,a:visited {font-size:12px;text-decoration: none;}
a:hover{}

#container {
	width: 980px;
	height: 600px;
	background: #FFFFFF;
	margin: 0 auto; /* 自动边距（与宽度一起）会将页面居中 */
	text-align: center; /* 这将覆盖 body 元素上的“text-align: center”。 */
}

#header {
	width: 980px;
	height: 100px;
	background: url('<?php echo base_url();?>img/pbcls.jpg') 0 0px no-repeat; //added base_url() by wmc 2010/06/09
	overflow:hidden;
	background-position:top left;
}

#pagebody {
	width:980px;
	margin:0 auto;
	clear:left;
	height:300px;
}
#sidebar {
	margin-top:40px;
	width:180px;
	text-align:left;
	float:left;
	clear:left;
	overflow:hidden;
	height:200px;
	padding:0;
}
#sidebar p{
	padding: 0px 0px;
	font-size:12px;
}
#sidebar h3 {
	padding: 0 10px;
	font-size:12px;
}
#mainbody {
	margin-top:40px;
	width:780px;
	text-algin:left;
	float:right;
	clear:right;
	overflow:hidden;
}

#mainbody span {
	align:left;
	padding:0 10px;
}

#mainbody p {
	padding:0 10px;
	text-align:left;
}

#footer {
	
}
-->
</style>
</head>

<body>
<div id="container">
    <div id="header">
    </div>
    <div id="pagebody">
        <div id="sidebar">
				<?php echo form_open('welcome/index/');?>
                <?php echo form_fieldset('Login_form'); ?>
                    <div class='textfield'>
                    <?php echo form_label('username','user_name');    
                            echo form_input('user_name',set_value('user_name'));
					?>
                    <br /><?php echo form_error('user_name'); ?>
                    </div>
                    <div class='textfield'>
                    <?php echo form_label('password','user_pass');
                            echo form_password('user_pass');
                    ?>
                    <br /><?php echo form_error('user_pass');?>
                    </div>
                    <div class='button'>
                    <?php echo form_submit('login','Login')?>
                    </div>
                     <?php if($this->session->flashdata('message')) : ?>
            			<p><?php echo $this->session->flashdata('message');?> </p>
            		<?php endif;?>                 	
                <?php echo form_fieldset_close();?>
                <?php echo form_close();?>
                <div id="register"><a href=<?php echo site_url()?>/register/register>Register Now!</a></div>
            
      	</div>
        <div id="mainbody">
        <h4><span>What is PBCLS?</span></h4>
        <p>PBLS is Project Based Case Learning System. This system is developed for teaching and learning in course of Software College. It is a learning system for transferring, tracking, direction and management of case learning content and process rate.  This system imitate a virtual world, you can take any roles you want to act. These roles may be anyone in a practical project. Enjoy your learning like playing a game!</p>

        <h4><span>Project Background</span></h4>
        <p>Nowadays all kinds of online education systems arise like bamboo shoots after a rain. But all of them look like in one appearance. So we want to do something differs. And we do. This project is called PBLS. This project is established by Computer Science and Software College of Zhejiang University. Cheng Yang, a professor of this college, is our team leader. All of the team members are students from Computer Science and Software College, Zhejiang University. </p>
      </div>
    </div>
    <div id="footer">
    <hr />
    <p>Copyright 2009, PBCLS group. All Rights Reserved.</p>
    </div>
</div>
</body>
</html>
