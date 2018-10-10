<html>
<head>
<title><?php echo $msg;?></title>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script type="text/javascript"> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
        	var options = { 
        		target:        '#fileinfo'   // target element(s) to be updated with server response         
        	};
 
        	$('#myForm').submit(function() { 
        		$(this).ajaxSubmit(options);
        		return false; 
        	});
 
        }); 
</script>
</head>
 
<body>
<h2>Upload File</h2>
<form id="myForm" action="<?php echo site_url('admin/caseadmin/do_upload')?>" method="post"
	enctype="multipart/form-data">
	<input name="myfile" type="file" />
	<input type="submit" value="Submit Comment" />
</form>
<div id="fileinfo"></div>
</body>
</html>