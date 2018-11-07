<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/game.css" />
<title>项目开始</title>
</head>
<body>
<div class="container">
	<div class="header">
    </div>
    <div class="maincontent">
    	<div class="navbar">
        	<div class="self_info">
            <?php echo img("/img/u25.jpg");?>
            <p>Role:<?php echo $rolename;?></p>
            </div>
            <ul class="nav">
				<li><a><strong>>>工  程</strong></a></li>
                <li><a href="<?php echo site_url('project/mytask/');?>">任  务</a></li>
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
            	<li><a><strong>任务列表</strong></a></li>
                <li><a href="<?php echo site_url('project/gant');?>">甘特图表</a></li>
            </ul>
            <div class="main">
            <table border="0" cellspacing="0" cellpadding="5" width="540">
            <tr>
				<th width="141">
                	<p>任务名称</p>
                </th>
                <th width="100">
                	<p>开始时间</p>
                </th>
                <th width="93">
                	<p>已用时间</p>
                </th>
                <th width="97">
                	<p>完成时间</p>
                </th>
                <th width="59">
                	<p>状态</p>
                </th>
            </tr>
                <?php foreach($tasks as $row)
				{
				?>
                <tr>
                	<td>
                    	<p><?php
							if($role == '0' || $row['taskstatus'] > '1')
							{
								echo anchor($row['task_add'],$row['taskname']);
							}
							else echo $row['taskname'];
							?>
                       	</p>
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
						switch($row['taskstatus'])
						{
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
							
						}
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
    <div class="footer">
    	<hr />
        <p align="center">Copyright 2009 PBCLS Team. All Rights Reserved.</p>
    </div>
</div>
</body>
</html>