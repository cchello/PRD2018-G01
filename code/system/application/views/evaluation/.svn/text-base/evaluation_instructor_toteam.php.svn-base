<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" type="text/css" href="/css/game.css" />
<link rel="stylesheet" type="text/css" href="/css/main.css" />
<link rel="stylesheet" type="text/css" href="/css/message.css" />
<link rel="stylesheet" type="text/css" href="/css/bbs.css" />

<script type="text/javascript" src="/system/application/views/admin/main.js">
</script>

</head>

<body>

<?php 

	$msg = $this->session->flashdata('msg');
	if($msg)
		echo "<script language=\"JavaScript\">alert(\"$msg\");</script>"; 

?>
<div class="container">
    <div class="header">
      <div class="logo">
      <div class="per_info" align="center">
        	<p><?php echo $this->session->userdata('user_name')	;?>，欢迎回来！</p>
            <p>积分：<?php echo $this->session->userdata('score');  ?>分 | 等级：<?php               
			switch($this->session->userdata('grade'))			
            {
				case 1: echo "新手上路";break;
				case 2: echo "初学乍练";break;
				case 3: echo "略有小成";break;
				case 4: echo "渐入佳境";break;
				case 5: echo "炉火纯青";break;
				case 6: echo "登峰造极";break;
			}
			?>    |   
            在线时间：<?php echo $this->session->userdata('onlinetime');?>
            </p>
            <a href="http://10.214.29.18/pbcls/">关于我们</a>
            <a href=<?php echo site_url('home/quit/')?>>退出</a>
        </div>
      </div>
      <ul class="nav">
        <li><a href=<?php echo site_url("home/index")?>><strong>首 页</strong></a></li>
        <li><a href=<?php echo site_url("cc/index")?>><strong>案 例</strong></a></li>
        <li><a href=<?php echo site_url("ins/index")?>><strong>实 例</strong></a></li>
        <li><a href=<?php echo site_url("per/index")?>><strong>个人空间</strong></a></li>
      </ul>
    </div>
    <div class="maincontent">
   		<div class="sidebar">
        	<?php echo img('system/image/u25.jpg');?>
            <ul class="sidebar_nav">
                <li><a href=#><strong>我的评价</strong></a></li>
                <li><a href=<?php echo site_url("evaluation/instructormain") ?>>对组员评价</a></li>
                <li><a href=<?php echo site_url("evaluation/instructortoteam") ?>>对小组评价</a></li>
                <li><a href=<?php echo site_url("evaluation/downloadevaluationdoc") ?>>评价标准</a></li>
            </ul>
   	</div>
        <div class="mainbody">
			<div class="game_nav">
            	PBCLS >> <?php echo $this->session->userdata('instancename'); ?> >> 评价 
            </div>
            
          <div class="main" align="center">
            <p>在这里您可以对您项目小组前一阶段的情况进行评价。</p>
            <br />
            <p><strong>里&nbsp;程&nbsp;碑&nbsp;&nbsp;：<?php echo "测试任务完成";?></strong></p>
            <p><strong>任务时间：<?php echo $query['duetime'];?>天</strong></p>
            <br />
            <table border="1" style="font-size:12px" width="400">
            <tr align="center"><th colspan="2">项目小组的基本情况</th></tr>
            <tr align="center"><td width="200">小组完成此任务超期的时间</td><td><?php echo $query['overduetime'];?>天</td></tr>
            <tr align="center"><td>小组在资源区上传下载的次数</td><td><?php echo $query['updownno'];?>次</td></tr>
            <tr align="center"><td>小组上传的资源被下载的次数</td><td><?php echo $query['downno'];?>次</td></tr>
            <tr align="center"><td>小组在讨论区主题回复超10的个数</td><td><?php echo $query['bbsno'];?>个</td></tr>
            </table>
                       
            <form name="evaluationforteam" method="post" action="<?php echo site_url('evaluation/instructorToTeamAction') ?>">
            <table style="font-size:12px" border="1" width="400">
            <tr><th colspan="3" align="center">指导老师对小组的评价</th></tr>
            <tr align="center"><th width="120">评价项目</th><th width="40">权重%</th><th width="240">等级</th></tr>
            <tr align="center">
            <td>资源上传下载数量</td>
                <td>10</td>
                <td>
              <input type="radio" name="updownquantity" value="100" />A<input type="radio" name="updownquantity" value="80"
              checked="checked" />B
              <input type="radio" name="updownquantity" value="60" />C<input type="radio" name="updownquantity" value="40" />D
              </td>
            </tr>
            <tr align="center"><td>资源上传下载质量</td>
            <td>10</td>
            <td>
            <input type="radio" name="updownquality" value="100" />A<input type="radio" name="updownquality" value="80"
            checked="checked" />B
              <input type="radio" name="updownquality" value="60" />C<input type="radio" name="updownquality" value="40" />D
            </td></tr>
            <tr align="center"><td>BBS问答次数</td>
            <td>10</td>
            <td>
             <input type="radio" name="bbsquantity" value="100" />A<input type="radio" name="bbsquantity" value="80"
             checked="checked" />B
              <input type="radio" name="bbsquantity" value="60" />C<input type="radio" name="bbsquantity" value="40" />D
            </td></tr>
            <tr align="center"><td>BBS问答质量</td>
            <td>10</td>
             <td>
              <input type="radio" name="bbsquality" value="100" />A<input type="radio" name="bbsquality" value="80"
              checked="checked" />B
              <input type="radio" name="bbsquality" value="60" />C<input type="radio" name="bbsquality" value="40" />D
              </td>
            </tr>
            <tr align="center"><td>文档完成时间</td>
            <td>10</td>
            <td>
              <input type="radio" name="docpasstime" value="100" />A<input type="radio" name="docpasstime" value="80"
              checked="checked" />B
              <input type="radio" name="docpasstime" value="60" />C<input type="radio" name="docpasstime" value="40" />D
              </td>
            </tr>
            <tr align="center"><td>文档创新情况</td>
            <td>10</td>
            <td>
              <input type="radio" name="docinnovation" value="100" />A<input type="radio" name="docinnovation" value="80"
              checked="checked" />B
              <input type="radio" name="docinnovation" value="60" />C<input type="radio" name="docinnovation" value="40" />D
              </td>
            </tr>
            <tr align="center"><td>文档正确程度</td>
            <td>30</td>
            <td>
              <input type="radio" name="doccorrectness" value="100" />A<input type="radio" name="doccorrectness" value="80"
              checked="checked" />B
              <input type="radio" name="doccorrectness" value="60" />C<input type="radio" name="doccorrectness" value="40" />D
              </td>
            </tr>
            <tr align="center"><td>文档风格</td>
            <td>10</td>
            <td>
              <input type="radio" name="docstyle" value="100" />A<input type="radio" name="docstyle" value="80"
              checked="checked" />B
              <input type="radio" name="docstyle" value="60" />C<input type="radio" name="docstyle" value="40" />D
              </td>
            </tr>
            <tr align="center"><td>综合评价</td>
              <td colspan="2"><input name="mark" type="text" size="40" value="请对小组作出整体性评价" /></td></tr>
             <tr align="center"><td colspan="3"><input type="submit" name="submit" value="提交" /></td></tr>
              <input type="hidden" name="taskid" value="<?php echo $taskid ?>"  />
              <input type="hidden" name="instanceid" value="<?php echo $instanceid ?>" />
            </table>
            </form>
            
            <br />
           
           
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
