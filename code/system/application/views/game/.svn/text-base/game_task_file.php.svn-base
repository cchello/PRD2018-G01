<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/game.css" />
<title>项目开始</title>
</head>
<script src="/js/quitgame.js">
</script>
<script language="javascript">
	function fileAc(insid,taskid,fileid){
		if(confirm("确实要通过改该文件吗？")){
			var fullpath = "<?php echo site_url("project/fileop/")?>" + "/" + taskid + "/" + fileid + "/" +"0";
			window.location.href = fullpath;
		}else{
		}
	}

	function fileDeny(insid,taskid,fileid){
		if(confirm("确实要拒绝该文件吗？") == true){
			var fullpath = "<?php echo site_url("project/fileop/")?>" + "/" + taskid + "/" + fileid + "/" +"1";
			window.location.href = fullpath;
		}
		else{
		}
	}
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
            	PBCLS >> 任务详情 >> 查看文件
            </div>
            <div class="main">
            <table border="0" cellspacing="0" cellpadding="5" width="533">
            <caption>公用可供下载文件</caption>
            <tr>
            	<th width="119">
                	<p>文件名</p>
                </th>
                <th width="137">
                	<p>文件类型</p>
                </th>
                <th width="247">
                	<p>文件描述</p>
                </th>
            </tr>
            <?php if(!empty($pub_files)){
			foreach($pub_files as $row)
				{
			?>
            <tr>
            	<td>
                	<p><?php 
						echo anchor($row['file_add'],$row['filename']);
					?></p>
                </td>
                <td>
                	<p><?php echo $row['filetype'];?></p>
                </td>
                <td>
                	<p><?php echo $row['description'];?></p>
                </td>
            </tr>
            <?php 
				}}
			?>
			</table>
            <hr/>
            <table width="540" border="0" cellpadding="5" cellspacing="0">
            <caption>已上传文件</caption>
            <tr>
            	<th width="90">
                	<p>文件名</p>
                </th>
                <th width="58">
                	<p>文件类型</p>
                </th>
                <th width="72">
                	<p>上传者</p>
                </th>
                <th width="77">
                	<p>上传时间</p>
                </th>
                <th width="37">
                	<p>状态</p>
                </th>
                <?php if(!empty($pub_files)){
				if($row == '0' && $row['status'] == '0'){
				?>
                <th width="74" align="center">
                	<p>操作</p>
                </th>
                <?php 
				}}
				?>
            <?php if(!empty($sub_files)){
			foreach($sub_files as $row)
			{
			?>
            <tr>
            	<td>
                	<p><?php
						echo $row['filename'];
					?></p>
                </td>
                <td>
                	<p><?php echo $row['filetype'];?></p>
                </td>
                <td>
                	<p><?php echo $row['uploader'];?></p>
              </td>
                <td>
                	<p><?php echo $row['uploadtime'];?></p>
                </td>
                <td>
                	<p><?php 
						if($row['status'] == '1')
							echo 'Passed';
						else if($row['status'] == '2')
							echo 'Denied';
						else if($row['status'] == '0') 
							echo "等待处理中...";
						?></p>
                </td>
                <?php if($role == '0' && $row['status'] == '0')
				{
				?>
                <td align="center">
                <table width="64" border="0">
                <tr>
                	<td width="32">
                     <form>
                     <input type='button' value="通过" onclick="fileAc(<?php echo $ins_id?>,<?php echo $row['taskid']?>,<?php echo $row['fileid']?>)" />
                    </form>
                    </td>
                    <td width="32">
                    <form>
                    <input type='button' value="拒绝" onclick="fileDeny(<?php echo $ins_id?>,<?php echo $row['taskid']?>,<?php echo $row['fileid']?>)" />
                    </form>
                     </td>
               	</tr>
                </table>
                </td>
				<?php
				}
				?>
            </tr>
            <?php 
			}
			}
			?>
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