<form class="writeform" id="writeform" method="post" action="<?php echo site_url('personal/mailBox/write');?>">
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

<style type="text/css">
.writeform{
	width:750px;
	background-color:#A9A9A9;
}
</style>
 