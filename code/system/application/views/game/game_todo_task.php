<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/game.css" />
<title>项目开始</title>
</head>
<script src="/js/quitgame.js">
</script>
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
			<?php $this->load->view('game/game_pronews');?>
            <?php $this->load->view('game/game_im');?>
            <?php $this->load->view("game/game_quitFunc"); ?>
        </div>
        <div class="mainbody">
        	<ul class="category">
            	<li><a><strong>我的任务</strong></a></li>
                <li><a href="<?php echo site_url('project/mygant/');?>">我的甘特图表</a></li>
            </ul>
            <div class="main">
            <table border="0" cellspacing="0" cellpadding="5" width="540">
            <tr>
				<th width="168">
                	<p>任务名称</p>
                </th>
                <th width="54">
                	<p>进度</p>
                </th>
                <th width="65">
                	<p>开始时间</p>
                </th>
                <th width="72">
                	<p>已用时间</p>
                </th>
                <th width="66">
                	<p>完成时间</p>
                </th>
                <th width="55">
                	<p>状态</p>
                </th>
            </tr>
            <?php 
				foreach($mytask as $row)
				{
			?>
            	<tr>
                	<td>
                    	<p><?php if($roleid == '2'){
							echo anchor($row['task_add'],$row['taskname']);
						}else{
							if($roleid == '1'){
								if($row['status'] >= '1'){
									echo anchor($row['task_add'],$row['taskname']);
								}else{
									echo $row['taskname'];
								}
							}else{
								if($row['status'] > '1')
											echo anchor($row['task_add'],$row['taskname']);
										else
											echo $row['taskname'];
							}
						}
						?></p>
                    </td>
                    <td>
                    	<p><?php echo $row['progress'];?></p>
                    </td>
                    <td>
                    	<p><?php echo $row['starttime'];?></p>
                    </td>
                    <td>
                    	<p><?php echo $row['duration'];?></p>
                    </td>
                    <td>
                    	<p><?php echo $row['finishtime'];?></p>
                    </td>
                    <td>
                    	<p><?php 
							switch($row['status']){
								case '0':
									echo "不能开始";
									break;
								case '1':
									echo "可以开始";
									break;
								case '2':
									echo "已经开始";
									break;
								case '3':
									echo "已经结束";
									break;
								default:
									echo "错误！";
									break;
							};
						?></p>
                    </td>
                </tr>
            <?php
				}
			?>
            </table>
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