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
			<div class="game_nav">
            	PBCLS >> 任务详情 >> 上传文件
            </div>
            <div class="main" align="center">
            <table border="0" cellspacing="0" cellpadding="5" width="270">
            <tr>
            	<td>
                	<p>任务名称：</p>
                </td>
                <td>
                	<p><?php echo $task['taskname'];?>
                </td>
            </tr>
            <tr>	
            	<td>
                	<p>任务需求：</p>
                </td>
                <td>
                	<p><?php echo $task['require'];?></p>
                </td>
            </tr>
            <tr>
            	<td colspan="2" align="right">
                <form enctype="multipart/form-data" method="post" action="<?=site_url("project/uploadop/".$task['taskid']);?>">
                	<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                    <input type="file" name="uploadFile" />
                    <input type="submit" value="上传" />
                </form>
                </td>
            </tr>
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