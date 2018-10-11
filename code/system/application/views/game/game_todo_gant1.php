<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/game.css" />

<script src="/js/move.js"></script>
<script src="/js/quitgame.js"></script>
<title>项目开始</title>
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
            <div class="im_news">
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
            <div class="gant">
	            <div style="width:520px; height:280px; overflow:hidden; border:2px #000000 solid;" id="div1">
				<div style="cursor:hand; position:relative;">
				<img src="<?php echo site_url('gantt')?>" alt="" onmousedown="startDrag(this)" onmouseup="stopDrag(this)" onmousemove="drag(this)" ondblclick="biggant('<?=site_url('gantt')?>')" id="bigpic"/>
				</div>
            </div>
        </div>
    </div>
    <class class="footer">
    	<hr />
        <p align="center">Copyright 2009 PBCLS Team. All Rights Reserved.</p>
    </div>
</div>
</body>
</html>