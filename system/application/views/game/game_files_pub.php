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
                <li><a><strong>>>文  件</strong></a></li>
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
            	<li><a><strong>公共文件</strong></a></li>
                <li><a href="<?php echo site_url('project/files/'.'1');?>">已提交</a></li>
            </ul>
            <div class="main">
            <table border="0" cellspacing="0" cellpadding="5" width="540">
            <tr>
				<th width="155">
                	<p>文件名</p>
                </th>
                <th width="140">
                	<p>简介</p>
                </th>
                <th width="80">
                	<p>文件类型</p>
                </th>
                <th width="80">
                	<p>任务名称</p>
                </th>
                <th width="80">
                	<p>文件大小</p>
                </th>
                <?php if(isset($pub_files)){
						foreach($pub_files as $row)
					{
				?>
                <tr>
                	<td>
                    	<p><?php 
							if($role == '0')
								echo anchor($row['file_add'],$row['file_name']);
							else if($role == '1'){
								if($row['file_task_status'] =='3')
									echo anchor($row['file_add'],$row['file_name']);
								else echo $row['file_name'];
							} else if($role == '2'){
								echo anchor($row['file_add'],$row['file_name']);
							}
						?></p>
                    </td>
                    <td>
                    	<p><?php echo $row['description'];?></p>
                    </td>
                    <td>
                    	<p><?php echo $row['file_type'];?></p>
                    </td>
                    <td>
                    	<p><?php echo $row['taskname'];?></p>
                    </td>
                    <td>
                    	<p><?php echo $row['file_size'];?></p>
                    </td>
                </tr>
            </tr>
				<?php 
					}
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