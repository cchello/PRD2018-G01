<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/main.css" />
<title>用户注册</title>
</head>
<body>
<div class="container">
     <div class="header">
      <div class="logo">
        <div class="per_info">
        	<p>Good morning!</p>
        	<p>
            <a href="http://10.214.29.18/pbclsweb/">关于我们</a>
            <a href=<?php echo site_url('');?>>退出</a>
            </p>
        </div>
      </div>
      <ul class="nav">
      </ul>
    </div>
    <div id="maincontent">
    <hr></hr>
    <div class="main_nav">您现在的位置：学习系统 >> 新用户注册</div>
    <div id="pagebody">
    	<h3>学习系统服务条款</h3>
        <div id="step">
		<form class="cmxform" id="commentform" method="post" action="<?php echo site_url();?>/register/userRegister">
			<fieldset>
				<legend>新用户注册</legend>
				<p>
					<label for="cusername">用户名</label><em>*</em> 
					<input id="cusername" name="username" size="25" />
				</p>
				<p>
					<label for="cpassword">密码</label><em>*</em> 
					<input id="cpassword" name="password" type="password" size="25" />
				</p>
				<p>
					<label for="cconfirm">确认密码：</label><em>*</em> 
					<input id="cconfirm" name="confirm" type="password" size="25" />
				</p>
				<p>
					<label for="cemail">电子邮箱：</label><em>*</em> 
					<input id="cemail" name="email" size="25" />
				</p>
				<p>
					<input id="submit" type="submit" value="注册" /> &nbsp; 
					<input id="cancel" type="reset" value="重填" />
				</p>
				<div id="output""></div>
			</fieldset>
		</form>
        </div>
    </div>
    </div>
</div>
<div id="footer">
    <hr />
    <p align="center">Copyright 2009, PBCLS group. All Rights Reserved.</p>
</div>
</body>
</html>
 
 
<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/jquery.validate.js" type="text/javascript"></script>
<script src="/js/jquery.form.js" type="text/javascript"></script>
<script src="/js/jquery.validate.messages_cn.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){	
	$("#commentform").validate({
		rules: {
			username: {
				required: true
			},
			password: {
				required: true,
				minlength: 6
			},
			confirm:{
				required: true
			},
			email:{
				required: true
			}
		}
	});
});
$(function(){
	var password;
	$('form :input').blur(function(){
		var $parent = $(this).parent();
		$parent.find(".formtips").remove();
		if($(this).is('#cusername')){
			if (this.value=="" || this.value.length < 2){
				var errorMsg = '至少2个字符！';
				$parent.append('<span class="formtips onError">'+errorMsg+'</span>');
			}
			else{
				$.post("<?php echo site_url();?>/register/isNameUnique",{
					username:this.value
				},function (data,textStauts){
					if(!data){
						var errorMsg = '此用户名已被注册，请另选一个用户名！';
						$parent.append('<span class="formtips onError">'+errorMsg+'</span>');
					}
					else{
						var succMsg = '此用户名唯一，可使用！';
						$parent.append('<span class="formtips onError">'+succMsg+'</span>');
					}
//					$parent.append('<span class="formtips onError">'+data+'</span>');					
				});

			}
		}
		if($(this).is('#cpassword')){
			password = this.value;
		}
		if($(this).is('#cconfirm')){
			var confirm = this.value;
			if(confirm != password){
				var errorMsg = '两次密码输入不一致！';
				$parent.append('<span class="formtips onError">'+errorMsg+'</span>');
			}
		}
		if($(this).is('#cemail')){
			if(this.value=="" || (this.value!="" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(this.value))){
				var errorMsg = '此邮箱地址不合法！';
				$parent.append('<span class="formtips onError">'+errorMsg+'</span>');
			}
			else
			{
				$.post("<?php echo site_url();?>/register/isMailUnique",{
					email:this.value
				},function (data,textStauts){
					if(!data){
						var errorMsg = '此邮箱地址已被注册，请另选一个！';
						$parent.append('<span class="formtips onError">'+errorMsg+'</span>');
					}
					else{
						var succMsg = '此邮箱地址唯一，可使用！';
						$parent.append('<span class="formtips onError">'+succMsg+'</span>');
					}
				});
			}
		}
	}).keyup(function(){
		$(this).triggerHandler("blur");
	}).focus(function(){
		$(this).triggerHandler("blur");
	});
});

</script>