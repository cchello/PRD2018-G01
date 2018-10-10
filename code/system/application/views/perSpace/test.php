<form class="writeform" id="writeform" method="post" action="#">
	<fieldset>
		<legend></legend>
		<p>
			<label for="to">收件人</label><em>*</em>
			<input id="to" name="to" size="25" />
		</p>
		<p>
			<label for="title">标题    </label><em>*</em>
			<input id="title" name="title" size="25" />
		</p>
		<p>
			<label for="content">邮件正文</label><em>*</em>
		</p>
		<p>
			<textarea id="content" name="content" cols="70" rows="20"></textarea>
		</p>
		<p>
			<input class="submit" type="submit" value="写好了" />
		</p>
	</fieldset>
</form>
<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/jquery.validate.js" type="text/javascript"></script>
<script src="/js/jquery.form.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){	
	$("#writeform").validate({
		rules: {
			to: {
				required: true
			},
			title:{
				required: true
			},
			content:{
				required: true
			}
		}
	});
});
$(document).ready(function(){
	$('form :input').blur(function(){
		var $parent = $(this).parent();
		$parent.find(".formtips").remove();
		if($(this).is('#to')){
			if (this.value=="" || this.value.length < 2){
				var errorMsg = 'Username has at least two characters length!';
				$parent.append('<span class="formtips onError">'+errorMsg+'</span>');
			}
			else{
				$.post("<?php echo site_url();?>/register/isNameUnique",{
					username:this.value
				},function (data,textStauts){
					if(data){
						var errorMsg = 'This user does not exist';
						$parent.append('<span class="formtips onError">'+errorMsg+'</span>');
					}
				});

			}
		}
	});
});
</script>

<style type="text/css">
.writeform{
	width:750px;
	background-color:#A9A9A9;
}
</style>
 