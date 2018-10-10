var timeStamp = 0;
var interval;
$(document).ready(function(){     
	$("#loadingMessage")
		.ajaxStart(function(){$(this).show();})
        .ajaxStop(function(){$(this).hide();})
        .ajaxError(function(request, settings){
            });
            
 	$("#single_image").livequery(function(){
		$(this).fancybox({
			'frameWidth' :980,
			'frameHeigth' : 950
		});
	}); //end function

//leftBar request            
	$("#selfInfo").load("game/selfInfo");
	$("#nav").load("game/nav");
	$("#teamate").load("game/teamate");

//rightBar request
	$("#proNews").load("game/progressNews");
	$("#im").load("game/im");
	$("#quit").load("game/quit");
	
//mainContent request
	$("#subNav").load("game/subNav",{navigationId:'1'});
	$(".subNavLi:first").livequery(function(){
		$(this).css("background","#E8E8E8");
	});

	loadMainView('0','1');
	updateMsg();
	interval = window.setInterval(updateMsg,3000);
	
/*	$("#mainContent").load("projectNews/index"); */
	
//navigation click bind
	$(".navLi").livequery("click",function(){
		$(".navLi").attr("selected","false");
		$(".navLi").css("background","#FFFFFF");
		var navigation = $(this).attr("name");
		$("#subNav").load("game/subNav",{navigationId: navigation});
		$(this).attr("selected","true");
		$(this).css("background","#E8E8E8");
		loadMainView(navigation,'1');
	});
	
//sub navigation click bind
	$(".subNavLi").livequery("click",function(){
		var subNavigation = $(this).attr("name");
		$(".subNavLi").css("background","#FFFFFF");
		$(this).css("background","#E8E8E8");
		var navigation = $(".navLi[selected=true]").attr("name");
		loadMainView(navigation,subNavigation);
	});	
	
//opOut click bind
	$("#opOut").livequery("click",function(){
		var opType = $("#quitType").val();
		switch(opType){
			case '1':
			if(confirm("确认要返回吗?"))window.location.href="home";
			break;
			case '2':
			if(confirm("确认要退出吗？"))window.location.href="home/quit";
			break;
			default:
			alert('errores!');
			break;
		}
	});
/*-----------------im operations -----------------------*/
	$("#imMsgSender").livequery(function(){
		$("#chatForm").submit(function(){
//			window.clearInterval(interval);
			var msgs = $("#msg").val();
			if(msgs != ''){
				$.ajax({
					type : "post",
					url : "projectChat/setMessage",
					data:"time=" + timeStamp + "&msg=" +msgs,
					dataType : 'xml',
					success : function(ret){
						$("#msg").val("");
						$("#msg").focus();
//						addMessages(ret);
					},	//end ajax success
					error : function() {
						alert("ajax error imMsgSender");
					}
				}); //end ajax
			}
//			interval = window.setInterval(updateMsg, 3000);
			return false;
		});
	});
	
/*-----------------end im ------------------------------*/
}); // end ready

function loadMainView(nav,subNav){
	var taskView = '0';
	var oper;
		switch(nav){
			case '0':
				$(".navLi:first").livequery(function(){
					$(this).attr("selected","true");
					$(this).css("background","#E8E8E8");
				});
			case '1':	//NEWS
				oper = "projectNews/handler";
				// for the first selection
			break;
			case '2':	//MYTASKS
				taskView = '1';
				if(subNav == '3')oper = "projectGantt/handler";
				else oper = "projectTask/handler";
				break;
			case '3':	//PROVIEW
				taskView = '2';
				if(subNav == '0' || subNav == '1')oper = "projectTask/handler";
				else oper = "projectGantt/handler";
			break;
			case '4':	//DOCVIEW
				oper = "projectDoc/handler";
			break;
			case '5':	//REFVIEW
				oper = "projectRef/handler";
			break;
			case '6':	//MYEVA
				oper = "projectEva/handler";
			break;
			case '7':	//MANAGE
				oper= "projectManage/handler";
			break;
			default:
				oper = '0';
				alert('error');
			break;
		}
		if(oper == '0'){
			alert('oper error!');
		}
		else{
			$("#mainContent").load(oper,{subNav:subNav,taskView:taskView});
			$(".draggable").livequery(function(){
				$(this).draggable();
				});
		}
}

function updateMsg(){
	$.post("projectChat/getMessages",{time:timeStamp},function(ret){
		addMessages(ret);
		});
	$.post("projectNews/getSidebarNews",{time:timeStamp},function(ret){
		addNews(ret);
	});
//	interval = setTimeout('updateMsg()',4000);	
}

function addMessages(ret){
	var status = $(ret).find('status').text();
	timeStamp = $(ret).find('time').text();
//	alert(timeStamp);
	switch(status){
		case '1':
			$(ret).find('message').each(function(){
				var author = $(this).children('author').text();
				var msg = $(this).children('content').text();
				var htmlCode = "<strong>" + author + "</strong>:" + msg + "<br />";
				$("#imMsgWindow").prepend(htmlCode);
			});
			return;
		break;
		case '2':
			return;
		break;
		case '0':
			alert("操作错误，请稍后重试！");
			return;
		break;
		default:
			alert('未知错误！');
			return;
		break;
	}
} //end addMessages

function addNews(ret){
	var status = $(ret).find('status').text();
	switch(status){
		case '1':
			$(ret).find('news').each(function(){
				var newsType = $(this).children('newsType').text();
				var newsContent = $(this).children('content').text();
				var htmlCode = "<strong>" + newsType + "</strong>:<br />" + newsContent + "<br />";
				$("#proNewsWindow").prepend(htmlCode);
			});
			return;
		break;
		case '2':
			return;
		break;
		case '0':
			alert("操作错误，请稍后重试！");
			return;
		break;
		default:
			alert('addnews 未知错误！');
			return;
		break;
	}
} //end addNews