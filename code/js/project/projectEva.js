$(document).ready(function(){     
	$("#evaStd").livequery("click",function(){
		$("#mainContent").load("projectEva/evaStd");
	});
	
	$("#evaTypeSub").livequery("click",function(){
		var evaType = $("#evaTypeSelect").val();
		var oper = 'projectEva/viewEvaType';
		$("#mainContent").load(oper,{evaType:evaType});
	});
	
	$("#evaTeamSub").livequery("click",function(){
		var param = $("#evaTeamForm").serialize();
		
		$.ajax({
			type : "post",
			data : param,
			url : 'projectEva/evaActionInstructorToTeam',
			dataType : 'xml',
			success:function(ret){
				var flag = $(ret).find("flag").text();
				var message = $(ret).find("message").text();
				alert(message);
				if(flag == '1'){
					$("#mainContent").load('projectEva/handler',{subNav:'2'});
				}
			},
			error:function(){
				alert('ajax error!');
			}
		}); //end ajax
		
		$("#evaTeamForm").submit(function(){
			return false;
		});
	});
	
	$("#evaRolesSelect").livequery("change",function(){
		var userId = $(this).val();
		if(userId != '-1'){
			$("#evaChoose").show();
		}else{
			$("#evaChoose").hide();
		}
	});
	
	$("#evaChoose").livequery("click",function(){
		var userId = $("#evaRolesSelect").val();
		$("#mainContent").load("projectEva/viewEvaUser",{targetUserId:userId});
	});
	
	$("#evaTeamatesInstructorSub").livequery("click",function(){
		var param = $("#evaTeamatesInstructorForm").serialize();
		evaSubmit(param);
		$("#evaTeamatesInstructorForm").submit(function(){
			return false;
		});
	});
	
	$("#evaTeamatesMemSub").livequery("click",function(){
		var param = $("#evaTeamatesMemForm").serialize();
		evaSubmit(param);
		$("#evaTeamatesMemForm").submit(function(){
			return false;
		});
	});
	
/*------------------eva task -------------------------------------------*/
	$("#evaTaskSub").livequery("click",function(){
		var textval = $("#evaluationformumberForm").serialize();
		$.ajax({
			type : "post",
			data : textval,
			url : "projectEva/managerToMemberEvaluationAction",
			dataType : 'xml',
			success:function(ret){
				var flag = $(ret).find("flag").text();
				var message = $(ret).find("message").text();
				alert(message);
				if(flag == '1'){
					stopTaskEva();
					$("#mainContent").load("projectNews/handler",{subNav:'1'});
				}
			},
			error:function(){
				alert('ajax error!');
			}
		}); //end ajax

		$("#evaluationformumberForm").submit(function() {
			return false;
		});
	});
	
/* --------------selfEva------added by wmc 2010/06/21-------- */
	
	$("#evaSelfSub").livequery("click",function(){
		var textval = $("#selfEvaForm").serialize();
		$.ajax({
			type : "post",
			data : textval,
			url : "projectEva/selfEvaAction",
			dataType : 'xml',
			success:function(ret){
				var flag = $(ret).find("flag").text();
				var message = $(ret).find("message").text();
				alert(message);
				if(flag == '1'){
					stopTaskEva();
					$("#mainContent").load("projectNews/handler",{subNav:'1'});
				}
			},
			error:function(){
				alert('here error!');
			}
		}); //end ajax

		$("#selfEvaForm").submit(function() {
			return false;
		});
	});
	
	
	$("#evaMark").livequery("focus",function(){
		$(this).val('');
	});
	
	$("#evaMark").livequery("blur",function(){
		if($(this).val() == ''){
			$(this).val('请对您的组员进行综合评价');
		}
	});
	
	$("#evaMarkExpectation").livequery("focus",function(){
		$(this).val('');
	});
	
	$("#evaMarkExpectation").livequery("blur",function(){
		if($(this).val() == ''){
			$(this).val('请对您下一阶段的学习情况做一个展望');
		}
	});
	
	
/*------------------end eva task -------------------------------------------*/	
	
//evaluation target choose
	$("#evaTargetChoose").livequery("change",function(){
		var actorId = $(this).val();
		if(actorId != '-1'){
			$("#evaTargetChooseButton").show();
		}
		else {
			$("#evaTargetChooseButton").hide();
		}
	}); //end function
	
	$("#evaTargetChooseButton").livequery("click",function(){
		var actorId = $("#evaTargetChoose").val();
		var myRoleId = $("#roleId").text();
		if(myRoleId < '0')alert("您尚未参与项目!");
		else{
			if(actorId != '-1'){
				$("#mainContent").load("projectNews/evaGoingHandler",{actorId:actorId});
			}
			
		}
	}); //end function
/*	
	$("#evaResultSub").livequery("click",function(){
		var resultType = $("#evaResultSelect").val();
		$("#mainContent").load('projectEva/viewEvaResultType',{resultType:resultType});
	});*/
	
	$("#evaResultSelect").livequery("change",function(){
		var resultType = $(this).val();
		$("#mainContent").load('projectEva/viewEvaResultType',{resultType:resultType});
	});
	
	
}); //end ready

function evaSubmit(param){
		$.ajax({
			type : "post",
			data : param,
			url : 'projectEva/evaAction',
			dataType : 'xml',
			success:function(ret){
				var flag = $(ret).find("flag").text();
				var message = $(ret).find("message").text();
				alert(message);
				if(flag == '1'){
					$("#mainContent").load('projectEva/handler',{subNav:'2'});
				}
			},
			error:function(){
				alert('ajax error!');
			}
		}); //end ajax
}



function stopTaskEva(){
	$("#evaBar").hide();
}