$(document).ready(function(){
	//rolesOpRole selection bind
	$("#rolesOpRole").livequery("change",function(){
		hideRoleOp();
		var opValue = $(this).val();
		if(opValue != '-1'){
			$.ajax({
				type : "post",
				data : "roleId=" + opValue,
				url : "projectManage/getRoleUsers",
				dataType : 'xml',
				success : function(result){
					var flag = $(result).find('flag').text();
					var isRoleOpened = $(result).find('roleStatus').text();
					if(isRoleOpened == true){
						$("#closeRole").show();
					}else{
						$("#openRole").show();
					}
					if(flag == '0'){
						$("#rolesOpUsers").append("<option value=-1:-1>无可操作用户</option>");
						$("#acMyself").show();
					}
					else{
						$("#rolesOpUsers").append("<option value=-1:-1>用户选择</option>");
						
						switch(flag){
							case '1':
								$(result).find('player').each(function(){
									var playerId = $(this).children('playerId').text();
									var playerName = $(this).children('playerName').text();
									$("#rolesOpUsers").append("<option value="+playerId+":1>"+playerName+"</option>");
								});
							break;
							case '2':
								$(result).find('applyer').each(function(){
									var applyerId = $(this).children('userId').text();
									var applyerName = $(this).children('userName').text();
									$("#rolesOpUsers").append("<option value="+applyerId+":0>"+applyerName+"</option>");
								});
							break;
							case '3':
								$(result).find('player').each(function(){
									var playerId = $(this).children('playerId').text();
									var playerName = $(this).children('playerName').text();
									$("#rolesOpUsers").append("<option value="+playerId+":1>"+playerName+"</option>");
								});
								$(result).find('applyer').each(function(){
									var applyerId = $(this).children('applyerId').text();
									var applyerName = $(this).children('applyerName').text();
									$("#rolesOpUsers").append("<option value="+applyerId+":0>"+applyerName+"</option>");
								});
							break;
							default:
							break;
						} //end switch
						$("#rolesOpUsers").attr("disabled",false);
					} //end else	
				},	//end ajax success
				error : function() {
					alert("ajax error");
				}
			}); //end ajax
		}
	}); //end function 
	
	//rolesOpUsers function bind
	$("#rolesOpUsers").livequery("change",function(){
		$("#acRolePlayer").hide();
		$("#denyRolePlayer").hide();
		$("#banRolePlayer").hide();
		var opValue = $(this).val();
		var opValues = opValue.split(":");
		if(opValues[1] == '-1'){
			return;
		}
		if(opValues[1] == '1'){
			$("#banRolePlayer").show();
		}else if(opValues[1] == '0'){
			$("#acRolePlayer").show();
			$("#denyRolePlayer").show();
		}
	}); //end function
	
	$("#banRolePlayer").livequery("click",function(){
		var roleId = $("#rolesOpRole").val();
		var tmp = $("#rolesOpUsers").val();
		var opValues = tmp.split(":");
		var userId = opValues[0];
		roleOperations(roleId,userId,"OP_BAN");
	}); //end function
	$("#acRolePlayer").livequery("click",function(){
		var roleId = $("#rolesOpRole").val();
		var tmp = $("#rolesOpUsers").val();
		var opValues = tmp.split(":");
		var userId = opValues[0];
		roleOperations(roleId,userId,"OP_AC");
	}); //end acRolePlayer
	$("#denyRolePlayer").livequery("click",function(){
		var roleId = $("#rolesOpRole").val();
		var tmp = $("#rolesOpUsers").val();
		var opValues = tmp.split(":");
		var userId = opValues[0];
		roleOperations(roleId,userId,"OP_REFUSE");
	}); //end function
	
	$("#acMyself").livequery("click",function(){
		var roleId = $("#rolesOpRole").val();
		if(roleId != '-1')
			$.ajax({
				type : "post",
				data : "roleId=" + roleId,
				url : "projectManage/changeMyRole",
				dataType : 'xml',
				success:function(ret){
					var retMessage = $(ret).find('message').text();
					alert(retMessage);
					$("#mainContent").load("projectManage/handler",{subNav:'1'});
					$("#selfInfo").load("game/selfInfo");
				},
				error:function(){
					alert('ajax error!');
				}
			}); //end ajax
	});	//end function

	$("#roleApplyChoose").livequery("change",function(){
		$("#roleApply").hide();
		var roleId = $(this).val();
		if(roleId != '-1'){
			$("#roleApply").show();
		}
	}); //end roleApplyChoose
	
	$("#roleApply").livequery("click",function(){
		var roleId = $("#roleApplyChoose").val();
		roleOperations(roleId,'0',"OP_APPLY");
	}); //end roleApply
	
	$("#cancelApply").livequery("click",function(){
		var roleId = $(this).attr("name");
		roleOperations(roleId,'0',"OP_CANCEL");
	}); //end cancelApply
	
	$("#quitRole").livequery("click",function(){
		var roleId = $(this).attr("name");
		roleOperations(roleId,'0',"OP_QUIT");
	}); //end quitRole
	
	$("#refuseConfirm").livequery("click",function(){
		var roleId = $(this).attr("name");
		alert('hi');
		alert(roleId);
	});
	
	$("#openRole").livequery("click",function(){
		var roleId = $("#rolesOpRole").val();
		roleOperations(roleId,'0',"OP_OPEN");
	});
	
	$("#closeRole").livequery("click",function(){
		var roleId = $("#rolesOpRole").val();
		roleOperations(roleId,'0',"OP_CLOSE");
	});
	
	//project operations input confirm	
	$("#projectManaConfirm").livequery("click",function(){
		var opType = $("#projectMana").val();
		var evaType = $("#projectEvaType").val();
		if(opType == '2'){
			completeInstance();
		}
		if(opType == '1' && evaType != '-1'){
			startInstance(evaType);
		}else{
			if(opType == '-1')alert("请选择操作类型！");
			else if(evaType == '-1')alert("请选择评价类型！");
		}
	}); //end function
	
});

function hideRoleOp(){
		$("#rolesOpUsers option").remove();
		$("#rolesOpUsers").attr("disabled",true);
		$("#acRolePlayer").hide();
		$("#denyRolePlayer").hide();
		$("#banRolePlayer").hide();
		$("#acMyself").hide();
		$("#openRole").hide();
		$("#closeRole").hide();
}

// role op functions. if userId ='0', it means the operation target is current user
function roleOperations(roleId,userId,opType){
	var operType;
	//ref from role_model
	switch(opType){
			case 'OP_OPEN':
				operType = '0';
			break;
			case 'OP_CLOSE':
				operType = '1';
			break;
			case 'OP_AC':
				operType = '2';
			break;
			case 'OP_BAN':
				operType = '3';
			break;
			case 'OP_REFUSE':
				operType = '4';
			break;
			case 'OP_APPLY':
				operType = '5';
			break;
			case 'OP_CANCEL':
				operType = '6';
			break;
			case 'OP_QUIT':
				operType = '7';
			break;
			default:
				operType = '-1';
			break;
	}
	if(operType != '-1'){
		$.ajax({
			type : "post",
			data : "roleId=" + roleId +"&userId=" + userId + "&opType=" + operType,
			url : "projectManage/roleOperations",
			dataType : 'xml',
			success : function(result){
				var flag = $(result).find('flag').text();
				var message = $(result).find('message').text();
				alert(message);
				$("#mainContent").load("projectManage/handler",{subNav:'1'});
				$("#selfInfo").load("game/selfInfo");
				$("#nav").load("game/nav");
			},	//end ajax success
			error : function() {
				alert("ajax error");
			}
		}); //end ajax
	}
	else return;
}

function startInstance(evaType){
	$.ajax({
		type : "post",
		url : "projectManage/startInstance",
		data: "evaType="+evaType,
		dataType : 'xml',
		success : function(result){
			var flag = $(result).find('flag').text();
			var message = $(result).find('message').text();
			alert(message);
			if(flag == '1'){
				$(".navLi:first").livequery(function(){
					$(".navLi").attr("selected","false");
					$(".navLi").css("background","#FFFFFF");
					$(this).attr("selected","true");
					$(this).css("background","#E8E8E8");
				});
				$("#subNav").load("game/subNav",{navigationId:'1'});
				$(".subNavLi:first").livequery(function(){
					$(this).attr("selected","true");
					$(this).css("background","#E8E8E8");
				});
				$("#mainContent").load("projectNews/handler",{subNav:'1'});
			}
		},	//end ajax success
		error : function() {
			alert("ajax error");
		}
	}); //end ajax
}

function completeInstance(){
	$.ajax({
		type : "post",
		url : "projectManage/completeInstance",
		dataType : 'xml',
		success : function(result){
			var flag = $(result).find('flag').text();
			var message = $(result).find('message').text();
			alert(message);
			if(flag == '1'){
				$("#mainContent").load("projectNews/instanceFinished");
			}
		},	//end ajax success
		error : function() {
			alert("ajax error");
		}
	}); //end ajax
}