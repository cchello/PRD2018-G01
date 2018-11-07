$(document).ready(function(){
	/*---------------doc operations bind, like pass and deny --------------*/
	$(".docPass").livequery("click",function(){
		var fileId = $(this).attr("name");
		docsOp(fileId,"pass");
	}); //end function
	
	$(".docDeny").livequery("click",function(){
		var fileId = $(this).attr("name");
		$("#docDenyResn").show();
		$("#denyFileId").val(fileId);
		$("#denyReason").focus();
//		docsOp(fileId,"deny");
	}); //end function
/*-------------------------doc operations end ------------------------*/
	//doc download click bind
	$(".docDown").livequery("click",function(){
		var oper = "projectDoc/docDownload/";
		var type = $(this).attr("type");
		var fileId = $(this).attr("name");
		$(this).attr('href',oper+fileId+'/'+type);
	});
	
	$("#confirmDenyInfo").livequery("click",function(){
		$("#docShowDenyResn").hide();
	});
	
	$(".showDenyReason").livequery("click",function(){
		var fileId = $(this).attr("name");
		$.ajax({
				type : "post",
				data : "fileId=" + fileId,
				url : 'projectDoc/getDenyReasons',
				dataType : 'xml',
				success : function(result){
					var flag = $(result).find('flag').text();
					var message = $(result).find('message').text();
					if(flag == '1'){
						var denyReason = $(result).find('denyReason').text();
						var denySug = $(result).find('denySug').text();
						$("#showDenyReason").text(denyReason);
						$("#showDenySug").text(denySug);
						$("#docShowDenyResn").show();
						
					}else{
						alert(message);
					}
				},	//end ajax success
				error : function() {
					alert("ajax error");
				}
			}); //end ajax
	});
	
	
// data is modified by wmc 2010/06/11	
	$("#denyTableSubmit").livequery("click",function(){
		if(validateDeny()){
			var denyReason = $("#denyReason").val();
			var denySug = $("#denySug").val();
			var denyFileId = $("#denyFileId").val();
			$.ajax({
				type : "post",
//				data : "denyReason=" + denyReason +"&denySug=" + denySug +"&denyFileId=" + denyFileId,
				data : {"denyReason":denyReason,"denySug":denySug,"denyFileId":denyFileId},
				url : 'projectDoc/denyReasonSubmit',
				dataType : 'xml',
				success : function(result){
					var flag = $(result).find('flag').text();
					var message = $(result).find('message').text();
					alert(message);
					if(flag == '1'){
						$("#mainContent").load("projectDoc/handler",{subNav:1});
					}else{					
					}
				},	//end ajax success
				error : function() {
					alert("ajax error");
				}
			}); //end ajax
			
/*			$.ajax({
				type : "post",
				data : "denyReason=" + fileId +"&denySug=" + denySug+"&denyFileId="+denyFileId,
				url : "projectDoc/denyReasonSubmit",
				dataType : 'xml',
				success : function(result){
					var flag = $(result).find('flag').text();
					var message = $(result).find('message').text();
					alert(message);
					if(flag == '1'){
						$("#mainContent").load("projectDoc/handler",{subNav:1});
					}else{
						alert('不行，错了');
					}
				},
				error: function(){
					alert("ajax error!");
				}
			});	//end ajax
*/			
		}
	}); // end function
});	//end ready

function validateDeny(){
	var denyReason = $("#denyReason").val();
	var denySug = $("#denySug").val();
	if(denyReason == ''){
		alert("请您输入拒绝原因！");
		$("#denyReason").focus();
		return false;
	}
	if(denySug == ''){
		alert("请您给我们说几句建议吧...");
		$("#denySug").focus();
		return false;
	}
	return true;
}


function docsOp(fileId,opType){
	$.ajax({
		type : "post",
		data : "fileId=" + fileId +"&opType=" + opType,
		url : "projectDoc/docOpHandler",
		dataType : 'xml',
		success : function(result){
			var flag = $(result).find('flag').text();
			var message = $(result).find('message').text();
			alert(message);
/*			if(flag == '1'){
				switch(opType){
					case "pass":
						checkDocs(fileId);
					break;
					case "deny":
						$("#docDenyResn").show();
						$("#denyFileId").val(fileId);
					break;
					default:
						$("#mainContent").load("projectDoc/handler",{subNav:1});
					break;
				}
			}*/
			if(flag == '1' && opType == "pass"){
				checkDocs(fileId);
			}else{
				$("#mainContent").load("projectDoc/handler",{subNav:1});
			}
		},	//end ajax success
		error : function() {
			alert("ajax error");
		}
	}); //end ajax
}

function checkDocs(fileId){
	$.ajax({
		type : "post",
		data : "fileId=" + fileId,
		url : "projectDoc/checkDocs",
		dataType : 'xml',
		success : function(result){
			var flag = $(result).find('flag').text();
			var message = $(result).find('message').text();
			if(flag == '1'){
				taskOp(message,"readyFinishTask");
			}else{
				$("#mainContent").load("projectDoc/handler",{subNav:1});
			}
		},	//end ajax success
		error : function() {
			alert("checkDocs ajax error");
		}
	}); //end ajax
}