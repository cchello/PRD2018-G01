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
         PBCLS >> <?php echo $this->session->userdata('instancename'); ?>  >> 评价
         </div>
          <div class="main" align="center">
          <h5>项目学习中，指导者对学员的评价十分重要，切当的评价能充分促进学员的学习，请根据实际情况评价您指导的学员。</h5>          
           <table width="400" border="1" align="left" style="font-size:12px">
              <tr align="center"><th colspan="2">组员列表</th></tr>
              <tr align="center">
                <th width="200">角色</th>
                <th width="200"><b>组员名称</b></th>
              </tr>
              <?php foreach( $result as $row) { ?>
              <tr align="center"><td><?php echo $row['role']; ?></td>
              <td><a href="evaluatewhom/<?php echo $row['uid']; ?>/<?php echo $row['role']; ?>" >
			  <?php echo $row['username']; ?></a></td></tr>
              <?php } ?>
             
            </table>
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

