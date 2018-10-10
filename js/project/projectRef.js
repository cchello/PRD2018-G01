$(document).ready(function(){
	/*-------------------references---------------------------------*/
	$(".refDetail").livequery("click",function(){
		var fileId = $(this).attr('name');
		$("#mainContent").load("projectRef/getRefDetails",{fileId:fileId});
	});
	
	$("#uploadRefSubmit").livequery("click",function(){
		if(refValidate()){
			var opt = {
				type:	"post",
				dataType: "xml",
				url: 'projectRef/doUpload',
				success: function(ret){
					var flag = $(ret).find("flag").text();
					var message = $(ret).find("message").text();
					alert(message);
					if(flag == '1'){
						var navigation = $(".navLi[selected=true]").attr("name");
						loadMainView(navigation,'1');
						$(".subNavLi").livequery(function(){
							$(".subNavLi").css("background","#FFFFFF");
							$(".subNavLi:first").css("background","#E8E8E8");
						});
					}
				}
			}; //end options	
			$("#uploadReferenceForm").submit(function() {
				$(this).ajaxSubmit(opt);
				return false;
			});
		}else{ 
			return false;
		}	// end if
	}); //end uploadRefSubmit
	
	$(".refDown").livequery(function(){
		var refId = $(this).attr("name");
		var oper = "projectRef/refDownload/";

		$(this).attr('href',oper+refId);
	});
});

function refValidate(){
	if(jQuery.trim($("#refName").val())=='')
	{
		alert('请填写文档标题！');
		$("#refName").focus();
		return false;
	}
	if(jQuery.trim($("#refName").val()).length<10)
	{
		alert('标题需大于10！');
		$("#refName").focus();
		return false;
	}	
	if(jQuery.trim($("#refDescription").val())=='')
	{
		alert('请填写文档描述！');
		$("#refDescription").focus();
		return false;
	}
	if(jQuery.trim($("#refDescription").val()).length<10)
	{
		alert('文档描述可以把电子书的概述、源代码的说明、文档的片段填在这里，描述详细更容易被他人下载！描述大于10字不是问题吧！');
		$("#refDescription").focus();
		return false;
	}
	if(jQuery.trim($("#uploadFile").val())=='')
	{
		alert('请选择上传的文件！');
		$("#uploadFile").focus();
		return false;
	}	
	return true;
}	//end refValidate