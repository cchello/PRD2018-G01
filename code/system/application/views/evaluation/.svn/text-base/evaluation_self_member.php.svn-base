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
            	PBCLS >> <?php echo $this->session->userdata('instancename'); ?> >> 评价 >> 自我评价
          </div>
            
           
           
          <div class="main" align="center">
          <h5>在这里您可以对您前一阶段的学习情况进行评价。</h5>
           <p><strong>里程碑：<?php echo "可行性分析完成";?></strong></p>
            <!--
            <table border="0" cellspacing="0" cellpadding="5" width="300">
            <tr>
            	<td><p>任务名称：</p></td>
                <td></td>
            </tr>
            <tr>	
            	<td><p>任务需求：</p></td>
                <td><p></p></td>
            </tr>
            <tr>	
            	<td><p>提交的文档：</p>
                </td><td><p></p></td>
            </tr>
            </table>
            -->
            
            <form name="selfevaluation" method="post" action="<?php echo site_url('evaluation/selfEvaluationAction') ?>">
            <table style="font-size:12px" border="1" width="400">
            <tr><th colspan="3" align="center">自我评价</th></tr>
            <tr align="center"><th width="120">评价项目</th><th width="40">权重%</th><th width="240">等级</th></tr>
            <tr align="center">
            <td>学习态度</td><td>20</td><td>
              <input type="radio" name="status" value="100" />A<input type="radio" name="status" value="80" checked="checked" />B
              <input type="radio" name="status" value="60" />C<input type="radio" name="status" value="40" />D
            </td></tr>
            <tr align="center"><td>专业能力</td>
               <td>20</td><td>
              <input type="radio" name="technique" value="100" />A<input type="radio" name="technique" value="80" checked="checked" />B
              <input type="radio" name="technique" value="60" />C<input type="radio" name="technique" 
              value="40" />D
              </td></tr>
              <tr align="center"><td>沟通能力</td>
              <td>20</td>
              <td>
              <input type="radio" name="communication" value="100" />A<input type="radio" name="communication" value="80"
               checked="checked" />B
              <input type="radio" name="communication" value="60" />C<input type="radio" name="communication"
               value="40" />D
              </td></tr>
              <tr align="center"><td>协作能力</td>
              <td>20</td>
              <td>
              <input type="radio" name="cooperation" value="100" />A<input type="radio" name="cooperation" value="80"
               checked="checked" />B
              <input type="radio" name="cooperation" value="60" />C<input type="radio" name="cooperation" 
              value="40" />D
              </td></tr>   
            <tr align="center"><td>学习成果</td><td>20</td>
            <td>
              <input type="radio" name="achievement" value="100" />A<input type="radio" name="achievement" value="80"
               checked="checked" />B
              <input type="radio" name="achievement" value="60" />C<input type="radio" name="achievement" 
              value="40" />D
            </td></tr>
            <tr align="center"><td>综合评价</td><td colspan="2"><input name="evaluation" type="text" size="40" value="请对您的学习情况进行综合评价" /></td></tr>
            <tr align="center"><td>学习展望</td><td colspan="2"><input name="expectation" type="text" size="40" value="请您对您下一阶段的学习进行展望" /></td></tr>
            <tr align="center"><td colspan="3"><input type="submit" name="submit" value="提交" /></td></tr>
            </table>   
            <input type="hidden" name="organization" value="0"  /> 
            <input type="hidden" name="decision" value="0"  /> 
            <input type="hidden" name="userid" value="<?php echo $result['userid']; ?>"  />   
            <input type="hidden" name="taskid" value="<?php echo $result['taskid']; ?>"  />
             <input type="hidden" name="roleid" value="<?php echo $result['roleid']; ?>"  />
            <input type="hidden" name="instanceid" value="<?php echo $result['instanceid']; ?>" />
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