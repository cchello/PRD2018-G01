$(document).ready(function(){
	//task detail click bind
	$(".taskDetail").livequery("click",function(){
		var taskId = $(this).attr("name");
		$("#mainContent").load("projectTask/getTaskDetails",{taskId:taskId});
	});
	
//task file button click bind
	$(".displayTaskFile").livequery("click",function(){
		var taskId = $(this).attr("name");
		$("#mainContent").load("projectDoc/displayTaskFile",{taskId:taskId});
	});
	
	//task file button click bind
	$(".displayTaskFiles").livequery("click",function(){
		var taskId = $(this).attr("name");
		$("#mainContent").load("projectDoc/displayTaskFile",{taskId:taskId});
	});

//upload_task_file view click bind
	$(".uploadTaskFile").livequery("click",function(){
		var taskId = $(this).attr("name");
		$("#mainContent").load("projectDoc/viewUploadDoc",{taskId:taskId});
	});
	
//upload a task file bind
	$("#uploadTaskFileSubmit").livequery("click",function(){
		var fileId = $("#requireFileSelection").val();
		var taskId = $(".taskId").text();
		var opt = {
			type:	"post",
			url: "projectDoc/doUpload/" + taskId + '/' + fileId,
			dataType: "xml",
			success: function(ret){
				var flag = $(ret).find("flag").text();
				var message = $(ret).find("message").text();
				alert(message);
				if(flag == '1'){
					$("#mainContent").load("projectDoc/displayTaskFile",{taskId:taskId});
				}
			}
		}; //end options	
		$("#uploadTaskFileForm").submit(function() {
			$(this).ajaxSubmit(opt);
			return false;
		});
	});
	
/*------------------task operations-----------------*/	
	$(".beginTask").livequery("click",function(){
		var taskId = $(this).attr("name");
		taskOp(taskId,"beginTask");
	}); //end beginTask bind
	
	$(".confirmTask").livequery("click",function(){
		var taskId = $(this).attr("name");
		taskOp(taskId,"confirmTask");
	});
	
	$(".finishTask").livequery("click",function(){
		var taskId = $(this).attr("name");
		taskOp(taskId,"finishTask");
	});

/*-------------- end task operations-----------------*/
	


// task file entry button bind	
	$(".taskFileUpload").livequery("click",function(){
		var taskId = $(this).attr("name");
		$("#mainContent").load("projectDoc/viewUploadDoc",{taskId:taskId});
	});
	
/*-------------------instructor's suggestions-----------------------*/	
	//text
	$("#doRefSug").livequery("click",function(){
		startSuggestion();
		$("#doRef").focus();
	});
	
	$("#refSugSubmit").livequery("click",function(){
		var ref = $("#doRef").val();
		var sug = $("#doSug").val();
		var taskId = $("#taskId").text();
		$.ajax({
			type : "post",
			data : "ref=" + ref + "&sug=" + sug + "&taskId="+taskId,
			url : "projectTask/setTaskRefSug",
			dataType : 'xml',
			success:function(ret){
				var flag = $(ret).find("flag").text();
				var message = $(ret).find("message").text();
				alert(message);
				if(flag == '1'){
					$("#mainContent").load("projectTask/getTaskDetails",{taskId:taskId});
				}
/*				$("#mainContent").load("projectManage/handler",{subNav:'1'});
				$("#selfInfo").load("game/selfInfo");*/
			},
			error:function(){
				alert('ajax error!');
			}
		}); //end ajax
			
		stopSuggestion();
	});
	
/*-------------------end instructor's suggestions-----------------------*/		
});

function taskOp(taskId,opType){
	$.ajax({
		type : "post",
		data : "taskId=" + taskId +"&opType=" + opType,
		url : "projectTask/taskOpHandler",
		dataType : 'xml',
		success : function(result){
			var flag = $(result).find('flag').text();
			var message = $(result).find('message').text();
			switch(flag){
				case '1':
				case '3':
					alert(message);
					$("#mainContent").load("projectTask/getTaskDetails",{taskId:taskId});
					if(opType == "confirmTask"){
						taskOp(taskId,"checkConfirm");
					}
				break;
				case '2':
					alert("任务结束成功！请您进行评价！");
					$("#actualTime").text(message+"天");
					startTaskEva();
				break;
				case '4':
					alert("所有任务都已结束，评价系统开启。请您先对当前任务进行评价！");
					$("#actualTime").text(message+"天");
					startTaskEva();
				break;
			}
//				if(opType == "finishTask"){
					//evaluation start
//					startEvation();
//				}
			
		},	//end ajax success
		error : function() {
			alert("taskOp ajax error");
		}
	}); //end ajax
}

function startSuggestion(){
	$("#suggestionBar").show();
	$("#suggestionBar").fadeTo("slow",0.8);    
}

function stopSuggestion(){
	$("#suggestionBar").hide();
}


function startTaskEva(){
	$("#evaBar").show();
	$("#evaBar").fadeTo("slow",0.8); 
}