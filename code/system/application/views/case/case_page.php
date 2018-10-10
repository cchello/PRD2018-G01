<?php $this->load->view('main/header');?>

<div class="maincontent">
	<div class="main_nav">
    	现在位置：PBCLS >> 案例库
    </div>
    <div class="sidebar">
            <div class="case_list">
            	<form id="frm" name="frm" method="post" action="">
                	<select size="10" id="caseList" class="case_ins_list" >
                		<?php 
							$count = 0;
							foreach($case_list as $row)
							{
								$count++;
							?>
							<option value="<?php echo  $row['uid'];?>"><?php echo $count.'.'.$row['casename'];?></option>
						<?php
							}
						?>
                    </select>
                </form>
            </div>	
			
                <form id="insCreateForm" style="width:240px" name="cre" method="post">
                <fieldset>
				<legend>新建实例</legend>
                <table border='0' class="insCreTable">
                	<tr>
                		<td width="50px" align='right'><span>实例名：</span></td>
                		<td width="160px" align="left"><input type="text" id="ins_name" name="ins_name" value="" style="width:150px;" /></td>
                	</tr>
                	<tr>
                		<td colspan='2' align="left"><span style="color:red;">实例名由6--30个字母、数字或者下划线组成，由字母开头</span></td>
                	</tr>
                	<tr><td colspan='2' style="text-align:right"><input type="button" id="insCreBtn" name="ins_cre" value="新建" disabled="disabled" /></td></tr>
                </table>
                </fieldset>

                </form>
    </div>
    <div class="case_info">
    	<table width="600" border="0" cellpadding="5" cellspacing="0" align="center">
        <caption>案例详情</caption>
        <tr>
        	<td style="width:140px;text-align:right"><span>案例名称：</span></td>
        	<td style="width:410px;text-align:left"><span id="caseName"></span></td>
        </tr>
        <tr>
        	<td style="text-align:right"><span>上传时间：</span></td>
        	<td style="text-align:left"><span id="uploadTime"></span></td>
        </tr>
        <tr>
        	<td valign="bottom" style="text-align:right;"><span>案例描述：</span></td>
        	<td style="text-align:left"><div style="width:400px;height:80px;overflow:auto;"><span id="description"></span></div></td>
        </tr>
        <tr>
        	<td style="text-align:right"><span>玩家上限：</span></td>
        	<td style="text-align:left"><span id="maxPlayer"></span></td>
        </tr>
        <tr>
        	<td style="text-align:right"><span>已完成：</span></td>
        	<td style="text-align:left"><span id="caseUsed"></span></td>
        </tr>
        <tr>
        	<td style="text-align:right"><span>案例类型：</span></td>
        	<td style="text-align:left"><span id="caseType"></span></td>
        </tr>
        <tr>
        	<td style="text-align:right"><span>状态：</span></td>
        	<td style="text-align:left"><span id="caseStatus"></span></td>
        </tr> 
        <tr>
        	<td></td>
        	<td align="right"><div id="caseUrl"></div></td>
        </tr>
        </table>
    </div>
</div>
    <div class="footer">
      <hr />
        <p align="center">Copyright 2009 PBCLS Team. All Rights Reserved.</p>
    </div>
</body>
</html>
<script src='<?php echo base_url();?>js/jquery.min.js' type="text/javascript">
</script>
<script language="javascript">
$(document).ready(function(){
$("#insCreBtn").attr("disabled",true);

$("#caseList").click(function(){
	var selectObject =$("#caseList option:selected");
	var selected = selectObject.get(0).value;
	$.ajax({
		type: "post",
		data: "caseId=" + selected,
		url:"<?php echo site_url();?>/cc/getCcInfor",
		dataType: 'xml',
		success: function(result){
			$("#caseUrl").html('');
			$("#caseName").fadeTo("slow", 0.85).fadeIn("normal").html($(result).find("caseName").text());
			$("#uploadTime").html($(result).find("uploadTime").text());
			$("#description").html($(result).find("description").text());
			$("#maxPlayer").html($(result).find("maxPlayer").text());
			$("#caseUsed").html($(result).find("caseUsed").text());
			$("#caseType").html($(result).find("caseType").text());
			$("#caseStatus").html($(result).find("caseStatus").text());
			var Url = "<a href=" + $(result).find("caseUrl").text() + ">详细信息</a>";
			$("#caseUrl").append(Url);
			$("#insCreBtn").attr("disabled",false);
		},              
		error: function(){
			alert("ajax error");
		}
	});	//end ajax
});		//end function

	  
	$("#insCreBtn").click(function(){
		var insname = $("#ins_name").val();
		if(insname == "" || insname.length < 6 || insname.length > 30){
			alert("实例名非法，请重新输入");
			$("#ins_name").val('');
			$("#ins_name").focus();
		}		
		else{
			var	reg=/^[a-zA-Z]\w{5,29}$/;     
			if(!reg.test(insname)){          
				alert("实例名非法，请重新输入");
				$("#ins_name").val('');
				$("#ins_name").focus();   
			}
			   else{
					var caseId = $("#caseList option:selected").val();
					var insName = $("#ins_name").val();
					$.ajax({
						   type:"post",
						   data:"caseId=" + caseId +"&insName=" + insName,
						   url:	"<?php echo site_url();?>/cc/createIns",
						   dataType: 'xml',
						   success: function(result){
						   		var flag = $(result).find('flag').text();
								var message = $(result).find('message').text();
								if(flag == '0')alert(message);
								else{
									alert("新建成功！准备跳转到项目页面！");
									window.location.href='<?php echo site_url();?>/ins/insEntry/'+message;
								}
							},
							error: function(){
			                              alert("ajax error");
							}
					});	//end ajax

					$("#insCreateForm").submit(function(){
						return false;
						});
				}
		}
	});	// end function
});	//end ready
</script>  