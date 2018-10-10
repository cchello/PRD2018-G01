	function exitToIndex(){
		if(confirm("确实退出游戏吗？") == true){
			var path = "/pbcls/index.php/project/exitToIndex";
			window.location.href = path;
		}
	}
	
	function exitToLogin(){
		if(confirm("确实退出系统吗？") == true){
			var path = "/pbcls/index.php/home/quit";
			window.location.href = path;
		}
	}
	
	function exitGame(){
	}