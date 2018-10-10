$(document).ready(function(){     
	$("#loadingMessage")
		.ajaxStart(function(){$(this).show();})
        .ajaxStop(function(){$(this).hide();})
        .ajaxError(function(request, settings){
            });
//leftBar request            
	$("#selfPortrait").load("perSpace/selfPortrait");
	$("#nav").load("perSpace/nav");


//mainContent request
	$("#subNav").load("perSpace/subNav",{navigationId:"1"});
	loadMainView('1','1');


//navigation click bind
	$(".navLi").livequery("click",function(){
		$(".navLi").attr("selected","false");
		var navigation = $(this).attr("name");
		$("#subNav").load("perSpace/subNav",{navigationId: navigation});
		$(this).attr("selected","true");
		loadMainView(navigation,'1');
	});
	
//sub navigation click bind
	$(".subNavLi").livequery("click",function(){
		var subNavigation = $(this).attr("name");
		var navigation = $(".navLi[selected=true]").attr("name");
		var oper;
		loadMainView(navigation,subNavigation);
	});
	
}); // end ready

function loadMainView(nav,subNav){
		switch(nav){
			case '1':	//SELFINFORMATION
				oper = "personal/perInfo";
			break;
			case '2':	//MYTASKS
				oper = "personal/insInfo";
				break;
			case '3':	//PROVIEW
				oper = "personal/chaPassword";
			break;
			case '4':	//DOCVIEW
				oper = "personal/chaPortrait";
			break;
			case '5':	//MYEVA
				oper = "personal/mailBox";
			break;
			case '6':	//MYEVA
				oper = "personal/historyEva";
			break;
			case '7':	//MYEVA
				oper = "personal/loginList";
			break;
			default:
				oper = '0';
				alert('error');
			break;
		}
		if(oper == '0'){
			alert('error!');
		}
		else{
			$("#mainContent").load(oper,{subNav:subNav});
			$(".draggable").livequery(function(){
				$(this).draggable();
				});
		}
}