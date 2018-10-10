<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- reference upload view -->
<form id="uploadReferenceForm" enctype="multipart/form-data" method="post" action="">
	<fieldset id="uploadfield">
        <p><label style="font-size:14px;font-weight:bolder;">您的身份：</label><span><?php echo $userName;?></span></p>
        <p><label style="font-size:14px;font-weight:bolder;">文档名称：</label><input id="refName" name="refName" tabindex="1" value="" type="text" maxlength="250"><br/>
        <span style="font-size:12px;text-align:right">需要大于10个字符 </span>
        </p>
        <p><label style="font-size:14px;font-weight:bolder;">文档描述：</label><textarea name="refDescription" id="refDescription" tabindex="2" cols="" rows="4"></textarea><br/>
        	<span style="font-size:12px;text-align:right">需要大于10个字符,不支持HTML标签。</span>
        </p>
 		<p><label style="font-size:14px;font-weight:bolder;">文件：</label>
            <input name="uploadFile" id="uploadFile" tabindex="3" size="43" type="file"><br/>
            <span style="font-size:12px;text-align:right">您可以上传小于<font color="red">3000000</font>的文件</span>
        </p>  
        <p style="text-align:right">
            <input name="uploadRefSubmit" value=" 提  交 " id="uploadRefSubmit" type="submit" tabindex="4">
        </p>
    </fieldset>
</form>