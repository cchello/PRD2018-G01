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
                <li><a href=<?php echo site_url("evaluation") ?>><strong>我要进行的评价</strong></a></li>
                <li><a href=<?php echo site_url("evaluation/selfevaluation") ?>>自评</a></li>
                <li><a href=<?php echo site_url("evaluation/mutualmain")?>>互评</a></li>
                <li><a href=<?php echo site_url("evaluation/downloadevaluationdoc") ?>>评价标准</a></li>
                <li><a href=<?php echo site_url("evaluation") ?>><strong>我当前的评价</strong></a></li>
                <li><a href=<?php echo site_url("evaluation/from_instructor")?>>老师的评价</a></li>
                <li><a href=<?php echo site_url("evaluation/from_manager")?>>经理的评价</a></li>
                <li><a href=<?php echo site_url("evaluation/from_member")?>>组员的评价</a></li>
                 <li><a href=<?php echo site_url("evaluation/historyevaluation") ?>><strong>我的历史评价</strong></a></li>
                
            </ul>
   	</div>

        <div class="mainbody">
		<div class="game_nav">
         PBCLS >> <?php echo $this->session->userdata('instancename'); ?> >> 历史评价 
         </div>
          <div class="main" align="center"><br />
          <p>历史评价为整个项目过程中您得到的所有评价信息，请选择相应的项目阶段查看您得到的评价。</p>
          <br />
          
          <table align="left" border="1" width="350" style="font-size:12px">
          <tr align="center">
            <th colspan="2">项目里程碑事件</th></tr>
          <tr align="center"><th width="50">序号</th>
          <th>里程碑事件</th></tr>
          <?php $no=1; foreach($result as $row) { ?>
          <tr align="center">
          <td><?php echo $no++ ; ?></td>
          <td>
          <a href="historyMilestone/<?php echo $row['taskid'] ?>/<?php echo $row['taskname'] ;?> ">
		  <?php echo $row['taskname'] ?></a>
          </td>
          </tr>
          <?php } ?>
          </table>
         <br />
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
