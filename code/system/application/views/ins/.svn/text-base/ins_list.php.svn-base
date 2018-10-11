<?php $this->load->view('main/ins_header');?>
<div class="maincontent">
	<div class="main_nav">
    	现在位置：PBCLS >> 实例列表
    </div>
    <div class="sidebar">
    			<! function form_open should be change.	>
            <div class="case_list">
            	<form id="frm" name="frm" method="post" action="">
                	<select size="20" id="insList" class="case_ins_list">
                    </select>
                </form>
            </div>	
    </div>
    <div class="case_info">
    	<b>实例详情</b>
<table width="700" border="0" cellpadding="5" cellspacing="0" align="center">
        
            <tr>
				<td width="140" valign="top"><div align="left">实例创建者：</div></td>
              <td width="540"><div align="left" id="creator"></div></td>
          </tr>
            <tr>
            	<td valign="top"><div align="left">创建时间：</div></td>
              <td><div align="left" id="creatTime"></div></td>
          </tr>
            <tr>
				<td valign="top"><div align="left">现有玩家数：</div></td>
              <td><div align="left" id="playerNum"></div></td>
          </tr>
            <tr>
				<td valign="top"><div align="left">实例状态：</div></td>
              <td><div align="left" id="insStatus"></div></td>
          </tr>
            <tr>
				<td valign="top"><div align="left">父案例：</div></td>
              <td><div align="left" id="fromCase"></div></td>
          </tr>
          <tr>
          	<td>
            </td>
            <td>
            	<div align="right" id="insUrl"></div>
            </td>
          </tr>
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
<script src="<?php echo base_url();?>js/jquery.min.js" type="text/javascript"> /*wmc 2010/06/09增加了“<?php echo base_url();?>”作为src的地址路径 */
</script>
<script language="javascript">
	$(document).ready(function(){
		<?php 
		$count = 0;
		foreach($insList as $row)
		{
			$count++;
		?>
	$("#insList").append("<option value="+"<?php echo  $row['uid'];?>"+">"+"<?php echo $count.'.'.$row['instancename'];?>"+"</option>");
		<?php 
			}
		?>
				
							   });
	
		$("#insList").click(function(){
								 var selectObject = $("#insList option:selected");
								 var selected = selectObject.get(0).value;
								 $.ajax({
										type: "post",
										data: "insId=" + selected,
										url: "<?php echo site_url()?>/insAjax/getInsInfor",
										dataType: "xml",
										success: function(xml){
										   $("#insUrl").html('');
										   $("#creator").html($(xml).find("creator").text());
										   $("#creatTime").html($(xml).find("creatTime").text());
										   $("#playerNum").html($(xml).find("playerNum").text());
										   $("#insStatus").html($(xml).find("insStatus").text());
										   $("#fromCase").html($(xml).find("fromCase").text());
										   var Url = "<a href=" + $(xml).find("insUrl").text() + ">详细信息</a>"
										   $("#insUrl").append(Url);
										},
										 error: function(){
											 alert("ajax error.");
										 }
										 });
								 });

</script>