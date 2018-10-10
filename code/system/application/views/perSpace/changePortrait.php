<div class="portrait_upload">
	<?php echo form_fieldset();
	?>
         <p>上传的图片文件必须是gif或者jpg格式，大小请控制在350KB以内</p>
         <form enctype="multipart/form-data" method="post" action="<?php echo site_url("personal/chaPortrait/change");?>">
            <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
            <input type="file" name="uploadFile" />
            <input type="submit" value="上传" />
         </form>
</div>