<?php $this->load->view('main/header');?>
<link rel="stylesheet" type="text/css" href="/css/main.css" />
    <div class="maincontent">
        <div class="main_nav">
            现在位置：PBCLS >> 个人信息 >> 我的实例
        </div>
    	<div class="sidebar">
        	<?php echo img('/img/u25.jpg');?>
            <ul class="sidebar_nav">
                <li><a href=<?php echo site_url("per/index")?>>主要信息</a></li>
                <li><a href=<?php echo site_url("per/portrait")?>>更换头像</a></li>
                <li><a href=#><strong>我的实例</strong></a></li>
                <li><a href=<?php echo site_url("per/changpass")?>>更换密码</a></li>
                <li><a href=<?php echo site_url("per/mail")?>>站内信</a></li>
            </ul>
    	</div>
        <div class="mainbody">
        	<b>实例列表:</b>
            <?php
				if(empty($per_ins))
					echo "您尚未参与学习";
				else{
				foreach($per_ins as $row)
				{
			?>
            <div class="learning_ins">
              <table width="680" border="0" cellpadding="5" cellspacing="0" align="center">
                <tr>
                  <td width="109"><p align="right">实例名称：</p></td>
                  <td width="168"><p align="left"><?php echo $row['ins_name'];?></p></td>
                  <td width="116"><p align="right">父案例：</p></td>
                  <td width="267"><p align="left"><?php echo $row['from_case'];?></p></td>
                </tr>
                <tr>
                  <td><p align="right">案例状态：</p></td>
                  <td><p align="left"><?php echo $row['ins_status'];?></p></td>
                  <td><p align="right">正在申请人数：</p></td>
                  <td><p align="left"><?php echo $row['applying'];?></p></td>
                </tr>
                <tr>
                  <td><p align="right">现有玩家数：</p></td>
                  <td><p align="left"><?php echo $row['ins_players_now'];?></p></td>
                  <td><p align="right">实例进度：</p></td>
                  <td></td>
                </tr>
                <tr>
                  <td><p align="right">我的角色：</p></td>
                  <td><p align="left"><?php echo $row['ins_myrole'];?></p></td>
                </tr>
                <tr>
                  <td><p align="right">案例创建者：</p></td>
                  <td><p align="left"><?php echo $row['ins_creator'];?></p></td>
                </tr>
                <tr>
                  <td align="right"><?php if($row['is_creator'] == TRUE){
										if($row['isstarted'] == TRUE){
											
								?>
                    <p><a href='#'>管理</a> | 继续 </p>
                    <?php
										}
										else{
								?>
                    <p> 管理 | <a href='#'>继续</a></p>
                    <?php
										}
                  }
                  else {
                  	if($row['isstarted'] == TRUE){
								?>
                    <p><a href='#'>申请</a> | 继续</p>
                    <?php
										}
										else{
								?>
                    <p>申请 | <a href='#'>继续</a></p>
                    <?php
										}
								}
								?></td>
                </tr>
              </table>
              <?php
				}
				}
				?>
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