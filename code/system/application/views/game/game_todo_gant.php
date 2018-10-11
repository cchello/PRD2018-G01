<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/game.css" />
<title>项目开始</title>
<link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" media="screen" />
<script src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox-1.2.1.pack.js"></script>
<script src="/js/jquery-ui-1.7.2.custom.min.js"></script>
<script src="/js/ui.draggable.js"></script>
<script src="/js/quitgame.js"></script>

<style>
a {
			outline: none;	
		}
		
		div#wrap {
			width: 500px;
			margin: 50px auto;	
		}

		img {
			border: 1px solid #CCC;
			padding: 2px;	
			margin: 10px 5px 10px 0;
		}
</style>
<script language="javascript">
	function quitFunc() {
		var quitType = document.getElementById("quitType");
			switch(quitType.selectedIndex){
				case 0:
					exitToIndex();
				break;
				case 1:
				break;
				case 2:
					exitToLogin();
				break;
				default:
				break;
			}
		}

</script>
</head>
<body>
<div class="container">
	<div class="header">
    </div>
    <div class="maincontent">
    	<div class="navbar">
        	<div class="self_info">
            <?php echo img('/img/u25.jpg');?>
            <p>Role:<?php echo $rolename;?></p>
            </div>
            <ul class="nav">
				<li><a href="<?php echo site_url('project/proTasks/');?>">工  程</a></li>
                <li><a><strong>>>任  务</strong></a></li>
                <li><a href="<?php echo site_url('project/files/');?>">文  件</a></li>
       	  </ul>
            <div class="team">
            </div>
        </div>
        <div class="newsbar">
        	<div class="pro_news">
            <table width="190" cellpadding="5" cellspacing="0">
            <tr>
           	  <td align="center" bgcolor="#E7E7E7">项目最新消息
       		  </td>
            </tr>
            <tr>
                <td>
                	正在建设中！
                </td>
            </tr>
            </table>
          </div>
            <div class="iscreenm_news">
              <table width="190" cellpadding="5" cellspacing="0">
                <tr>
                  <td align="center" bgcolor="#E7E7E7">即时通讯模块 </td>
                </tr>
                <tr>
                  <td> 正在建设中！ </td>
                </tr>
              </table>
          </div>
            <?php $this->load->view("game/game_quitFunc"); ?>
        </div>
        <div class="mainbody">
        	<ul class="category">
            	<li><a href="<?php echo site_url('project/mytask/');?>">任务列表</a></li>
                <li><a><strong>甘特图表</strong></a></li>
            </ul>
            <div class="screen"><img src="<?php echo site_url('gantt')?>" id="draggable"/>
            </div>
            
    	</div>

</div>
    <div class="footer">
    	<hr />
        <p align="center">Copyright 2009 PBCLS Team. All Rights Reserved.</p>
    </div>
</body>
</html>
<script language="javascript">
$(document).ready(function(){
	$("#draggable").draggable();
						   });
</script>