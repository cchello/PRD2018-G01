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
			<?php $this->load->view('game/game_pronews');?>
            <?php $this->load->view('game/game_im');?>
            <?php $this->load->view("game/game_quitFunc"); ?>
        </div>
        <div class="mainbody">
			<div class="game_nav">
            	PBCLS >> 任务详情 
            </div>
            <div class="main">
            <table border="0" cellspacing="0" cellpadding="5" width="540">
            <tr>
            	<td width="64">
                	<p>任务名称：</p>
                </td>
                <td width="119">
                	<p><?php echo $task['taskname'];?></p>
                </td>
                <td width="63">
                	<p>任务前驱：</p>
                </td>
                <td width="254">
                	<p><?php if(count($task['taskpre'] == '0'))
								echo "无前驱任务";
							else{
								foreach($task['taskpre'] as $row){
										echo $row['taskname'];
										echo "<br>";
									}
							}
					?></p>
                </td>
            </tr>
            <tr>
            	<td colspan="4">
                	<p>任务描述：</p>
                </td>
            </tr>
            <tr>
            	<td colspan="4">
                	<textarea cols="60" rows="10" disabled="disabled" readonly="readonly">
                    	<?php echo $task['description'];?>
                    </textarea>
              </td>
            </tr>
            <tr>
            	<td>
                	<p>任务后继：</p>
                </td>
                <td>
                	<p><?php if(count($task['tasknext'] =='0'))
								echo "无后继任务";
							else{
								foreach($task['tasknext'] as $row){
										echo $row['taskname'];
										echo "<br>";
									}
							}?></p>
                </td>
                <td>
                	<p>参考：</p>
                </td>
                <td>
                <table border="0" cellspacing="0" cellpadding="5" width="200">
                <tr>
                	<td valign="middle"><span id="refText"><?php echo $task['reference'];?></span><input type="text" id="refSubText" size="26" />
                    </td> 
                    <td><?php if($isIndicator){?>
                    <input id="refButton" value="更改" type="button"/>
                    <?php }?>
                  </td>          
                  </tr>
                  <tr>
                  <td align="right" colspan="2">
                    <input id="refSub" value="提交" type="button" />
                    <input id="refCancel" value="取消" type="button" />
                  </td>
                  </tr>
                 </table>
                </td>
            </tr>
            <tr>
            	<td>
               	<p>指导者</p>
               	<p>建议：</p></td>
                <td>
                <?php if($isIndicator == TRUE){ ?>
                <input id="sugButton" value="更改" type="button" />
                <input id="sugSub" value="提交" type="button" />
                <input id="sugCancel" value="取消" type="button" />
                <?php } ?>
                </td>
              <td>
                	<p>任务</p>
                	<p>负责人：</p>
                </td>
                <td>
                	<p><?php  
						foreach($playername as $player){
							echo $player['rolename']."; ";
						}
					?></p>
                </td>
            </tr>
            <tr>
            	<td colspan="4">
                <textarea id="sugText" cols="60" rows="6" disabled="disabled" readonly="readonly"><?php echo $task['suggestions'];?></textarea>
                <textarea id="sugSubText" cols="60" rows="6"></textarea>
                </td>
            </tr>
            <tr>
            	<td>
                	<p>状态：</p>
                </td>
                <td>
                	<p>
                    <?php 
					switch($task['status'])
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
						default:
							break;
					}
					?>
                    </p>
                </td>
            	<td>
                	<p>操作：</p>
                </td>
                <td>
                	<p><?php if($role == '0')
							{
								if($task['status'] == '1')
								{
									echo anchor("project/taskop/".$task_id."/"."1","开始任务");
								}
								else 
								{
									if($task['status'] >1)
									{
										echo anchor($task['taskfile_add'],'查看该任务文件');
										if($task['is_in_task'] == true){
											echo "<br />";
											echo anchor($task['taskfile_upload'],'上传任务文件');
										}
									}
									else 
									{
										echo "该任务初始条件不满足，不能开始";
									}
								}
							}
							else{
								if($task['status'] > 1){
									if($task['is_in_task'] == true){
										echo anchor($task['taskfile_add'],'查看该任务文件');
										echo "<br/>";
										echo anchor($task['taskfile_upload'],'上传任务文件');
									}else{
										echo anchor($task['taskfile_add'],'查看该任务文件');
									}
								}
								else
								{
									echo "该任务尚未开始，无法查看文件列表";
								}
							}
						?></p>
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
<script src="/js/jquery.min.js">
</script>
<script language="javascript">
	$(document).ready(function(){
//		$("#refButton").hide();
		$("#refSub").hide();
		$("#refCancel").hide();
		$("#refSubText").hide();
		
		$("#sugSubText").hide();
//		$("#sugButton").hide();
		$("#sugSub").hide();
		$("#sugCancel").hide();
		
							   });
	$("#refButton").click(function(){
		$("#refText").hide();
		$("#refButton").hide();
		$("#refSub").show();
		$("#refCancel").show();
		$("#refSubText").html('').show().focus();
								  });
	
	$("#refSub").click(function(){
		var refText = $("#refSubText").attr("value");
		if(refText == ""){
			alert("请填写参考资料信息");
			$("#refSubText").focus();
		}else{
			 $.ajax({
				type: "post",
				data: "insId=<?php echo $ins_id;?>&taskId=<?php echo $task_id;?>" + "&ref=" + refText,
				url: "<?php echo site_url();?>/project/subRefAndSug",
				dataType: "xml",
				success: function(xml){
					var retFlag = $(xml).find('flag').text();
					var retMessage = $(xml).find('message').text();
					if(retFlag == '1'){
						$("#refText").html(refText).show();
						$("#refSubText").hide();
						$("#refButton").show();
						$("#refSub").hide();
						$("#refCancel").hide();		
					}
					alert(retMessage);
				},
				error: function(){
					alert("ajax error!");
				}
			  });//end ajax
		}
								
								});
	
	$("#refCancel").click(function(){
		$("#refText").show();
		$("#refSubText").hide();
		$("#refButton").show();
		$("#refSub").hide();
		$("#refCancel").hide();							  
									  });
	
	$("#sugButton").click(function(){
		$("#sugButton").hide();
		$("#sugSub").show();
		$("#sugCancel").show();
		$("#sugText").hide();
		$("#sugSubText").html('').show().focus();
								   });
	
	$("#sugSub").click(function(){
		var sugText = $("#sugSubText").attr("value");
		if(sugText == ""){
			alert("请填写建议信息");
			$("#sugSubText").focus();
		}else{
			 $.ajax({
				type: "post",
				data: "insId=<?php echo $ins_id;?>&taskId=<?php echo $task_id;?>" + "&suggestions=" + sugText,
				url: "<?php echo site_url();?>/project/subRefAndSug",
				dataType: "xml",
				success: function(xml){
					var retFlag = $(xml).find('flag').text();
					var retMessage = $(xml).find('message').text();
					if(retFlag == '1'){
						$("#sugText").html(sugText).show();
						$("#sugSubText").hide();
						$("#sugButton").show();
						$("#sugSub").hide();
						$("#sugCancel").hide();		
					}
					alert(retMessage);
				},
				error: function(){
					alert("ajax error!");
				}
			  });//end ajax
		}					
								});
	
	$("#sugCancel").click(function(){
		$("#sugText").show();
		$("#sugSubText").hide();
		$("#sugButton").show();
		$("#sugSub").hide();
		$("#sugCancel").hide();							   
								   });

</script>