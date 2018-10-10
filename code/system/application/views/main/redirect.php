<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>您尚未登录</title>
<script src="<?php echo base_url()?>js/jquery.min.js" type="text/javascript"> 
</script>
<!--added base_url by wmc 2010/06/10  -->
<style type="text/css">
.loading{
	max-width:20px; 
	width:20px; 
	width:expression(document.body.clientWidth>20?"20px":"auto"); 
	overflow:hidden; 
}
</style>
</head>
<body>
<p><img src="<?php echo base_url()?>img/loading.gif" class="loading"/><?php echo $errorMessage;?></p>
<!--added base_url by wmc 2010/06/10  -->
</body>
</html>
<script language="javascript">
$(document).ready(function(){
						   alert('<?php echo $errorMessage;?>');
						   window.setTimeout("window.location.replace('<?php echo $redirection;?>')",2000);	
						   });
</script>