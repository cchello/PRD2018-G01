<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的案例</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>system/application/views/admin/main.css" />
<script type="text/javascript" src="main.js">
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js">
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.form.js">
</script>
</head>

<body>
<?php
$msg = $this->session->userdata('msg');
if($msg)
{
	echo "<script language=\"JavaScript\">alert(\"$msg\");</script>"; 
	$this->session->set_userdata('msg',''); 	
}
?> 
<div class="container">
    <div class="header">
      <div class="logo">
      <div class="per_info" align="center">
        	<p><?php echo $this->session->userdata('user_name').",欢迎回来！"?></p>
            <a href="http://10.214.29.18/pbclsweb/">关于我们</a>
            <a href="<?php echo site_url("home/quit/")?>">退出</a>        </div>
      </div>
      <ul class="nav">
        <li><a href="<?php echo site_url("admin/homeadmin")?>"><strong>后台首页</strong></a></li>
        <li><a href="<?php echo site_url("admin/caseadmin")?>"><strong>案例管理</strong></a></li>
        <li><a href="<?php echo site_url("admin/useradmin")?>"><strong>用户管理</strong></a></li>
        <li><a href="<?php echo site_url("admin/sysadmin")?>"><strong>系统管理</strong></a></li>
      </ul>
    </div> 
<div class="maincontent">
        <div class="sidebar">
          <div class="sidebox">
            <p1><strong>案例管理</strong></p1>
            <hr />
               <table align="left" height="" width="100">
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/casesearch")?>"><p>查找案例</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin")?>"><p>案例列表</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/instanceadmin")?>"><p>实例列表</p></a></td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/inactivecase")?>"><p>冻结的案例</p></a>            </td></tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/uploadcase")?>"><p>案例上传</p></a>           </td>
            </tr>
            <tr>
            <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/prunecase")?>"><p>裁剪案例</p></a>            </td>
            </tr>
            </table>           
          </div>  
          <div class="sidebox">
          <p1><strong>实例管理</strong></p1>
            <hr />
           <table align="left" height="" width="100">
            
              <tr>
              <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/instanceSearch")?>"><p>查找实例</p>
              </a></td>
              </tr>
              <tr>
              <td height="20" width="100" align="left"><a href="<?php echo site_url("admin/caseadmin/instanceadmin")?>"><p>实例列表</p>
              </a></td>
              </tr>
           </table> 
          </div>
            
        </div>

       <div class="mainbody">
            <br />
         <div class="uploadDiv">
         <h3>案例上传</h3>
        <p>在这里您可以选择合适的案例上传，注意：上传的案例必须是ZIP或WAR格式的。</p>
           <table height="60" border="0">
             <tr height="30">
                
                <td width="350">
	                <form id="myForm" action="<?php echo site_url('admin/caseadmin/do_upload')?>" method="post" 
enctype="multipart/form-data">				
					<input type="file" name="myfile" />	
					<input type="submit" value="上传案例" />			
					</form>          
		        </td>
            </tr>
            </table>
         <div class="loadingMessage">
         	<img src="<?php echo base_url();?>img/loading.gif" class="loading">案例正在上传...
         </div>
            </div>
            <div>
            <textarea  id="errorMessage">
            </textarea>
            </div>
         </div>    
  </div>    
    </div>
<?php $this->load->view('admin/footer'); ?>
<script language="javascript">
$(document).ready(function(){	
		$(".loadingMessage").hide();
		$("#errorMessage").html('').hide();
		var options = {
			target: "#errorMessage",
			type:	"post",
			dataType: "xml",
			beforeSubmit: function(){
				$(".loadingMessage").show();
				$("#errorMessage").html('').hide();
			},
			success: function(xml){
				$(".loadingMessage").hide();
					var flag = $(xml).find("flag").text();
					var message = $(xml).find("message").text();
					switch(flag){
						case '-1':
						alert(message);
						break;
						case '0':
						alert(message);
						$("#errorMessage").show();
						$(xml).find("error").each(function(i){
								$("#errorMessage").append("<p>Error "+ i +":</p>");
								var message = $(this).children("errorMessage");
								$("#errorMessage").append("<p>错误信息："+message.text()+"</p>");
								var line = $(this).children("line");
								$("#errorMessage").append("<p>行数："+line.text()+"</p>");
								var column = $(this).children("column");
								$("#errorMessage").append("<p>列数："+column.text()+"</p>");
								var file = $(this).children("file");
								if(file != '')
									$("#errorMessage").append("<p>错误文件："+file.text()+"</p>");
														   });
						break;
						case '1':
						alert(message);
						window.location.replace('<?php echo site_url("admin/caseadmin")?>');
						break;
						default:
						alert("未知错误");
						break;
					};
			}
		};
	
		$('#myForm').submit(function() { 
					$(this).ajaxSubmit(options);
					return false; 
				});
		
						   });

</script>