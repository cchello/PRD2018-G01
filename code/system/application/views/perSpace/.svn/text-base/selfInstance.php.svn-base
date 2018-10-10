    <div class="mainBody">
            <?php
//            	echo "hi";
//            	die();
				if(empty($per_ins))
					echo "您尚未参与学习";
				else{
				foreach($per_ins as $row)
				{
//					print_r($row);
//					echo "<br>";
//				}
//				die();
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
                  <td><p align="left"><?php
                  switch ($row['ins_status']){
                  	case '0': 
                  		$stat = "未准备";
                  		break;
                  	case '1': 
                  		$stat = "已准备";
                  		break;
                  	case '3': 
                  		$stat = "已开始，正在进行";
                  		break;
                  	case '6': 
                  		$stat = "已结束";
                  		break;
                  	default:
                  		$stat = "出错";
                  		break;
                  }
                  echo $stat;?></p></td>
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
           </table>
           <?php
			}
			}
			?>
        </div>
     </div>