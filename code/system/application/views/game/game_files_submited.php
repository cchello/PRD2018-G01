<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/game.css" />
<title>项目开始</title>
<script src="/js/quitgame.js">
</script>
<script language="javascript">
	function fileAc(insid,taskid,fileid){
		if(confirm("确实要通过改该文件吗？")){
			var fullpath = "<?=site_url("project/fileop/")?>" + "/" + taskid + "/" + fileid + "/" +"0";
			alert(fullpath);
			window.location.href = fullpath;
		}else{
		}
	}

	function fileDeny(insid,taskid,fileid){
		if(confirm("确实要拒绝该文件吗？") == true){
			var fullpath = "<?=site_url("project/fileop/")?>" + "/" + taskid + "/" + fileid + "/" +"1";
			window.location.href = fullpath;
		}
		else{
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
            <?php echo img('/img//u25.jpg');?>
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
            	<li><a href="<?php echo site_url('project/files/');?>">公共文件</a></li>
                <li><a><strong>已提交</strong></a></li>
            </ul>
            <div class="main">
            <table border="0" cellspacing="0" cellpadding="5" width="530">
            <tr>
				<th width="160" align="center">
                	<p>文件名</p>
                </th>
                <th width="103" align="center">
                	<p>任务名称</p>
                </th>
                <th width="72" align="center">
                	<p>上传者</p>
                </th>
                <th width="63" align="center">
                	<p>上传日期</p>
                </th>
                <th width="82" align="center">
                	<p>操作</p>
                </th>
            </tr>
            <?php if(isset($sub_files)){
			foreach($sub_files as $row)
			{
			?>
            <tr>
            	<td align="center">
                	<a href = <?php echo $row['file_path'];?>><?php echo $row['file_name'];?></a>
                </td>
                <td align="center">
                	<p><?php echo $row['taskname'];?>
                </td>
                <td align="center">
                	<p><?php echo $row['uploader'];?>
                </td>
                <td align="center">
                	<p><?php echo $row['upload_time'];?>
                </td>
                <td align="center">
                	<p><?php 
						if($row['status'] == '1')
							echo 'Passed';
						else if($row['status'] == '2')
							echo 'Denied';
						else{
							if($role != '0')
								echo "等待处理中...";
							else{
						?>
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
                        <?php	
							}
						}
						?>
						</p>
                </td>
            </tr>
            <?php 
			}
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