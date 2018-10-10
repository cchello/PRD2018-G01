$(document).ready(function(){     
	$("#loadingMessage")
	.ajaxStart(function(){$(this).show();})
    .ajaxStop(function(){$(this).hide();})
    .ajaxError(function(request, settings){
        });
	
	$("#rank_main").load("rankList/userRank");
	
	$(".rankNavLi").livequery("click",function(){		
		$(".rankNavLi").attr("selected","true");
		var navigation = $(this).attr("name");
		loadMainView(navigation,'1');
	});
	
	$("#myrank").livequery("click",function(){
            var username=$(this).attr("name");
            $("#rank_main").load("rankList/myRank",{username:username});           
            $("#myrank").livequery(function(){
                $("#mytr").removeClass('rankgray');
                $("#mytr").addClass('myrank');		
            });
	});	
	
	$(".paged").livequery("click",function(){	
		var page = $(this).attr("name");
		$("#rank_main").load("rankList/userRank",{page:page});
	});
	
	$(".casepaged").livequery("click",function(){	
		var page = $(this).attr("name");
		$("#rank_main").load("rankList/caseRank",{page:page});
	});
	
	function loadMainView(nav,subNav){
		switch(nav){
			case '1':	//SELFINFORMATION
				oper = "rankList/userRank";
			break;
			case '2':	//MYTASKS
				oper = "rankList/caseRank";
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
			$("#rank_main").load(oper,{subNav:subNav});
		}
	};
	
})