<?php $this->load->view('main/ins_header');?>
<link rel="stylesheet" type="text/css" href="/css/main.css" />
  <div class="maincontent">
  	<div class="main_nav">
    现在位置：PBCLS >>申请加入实例
    </div>
    <div class="sidebar">
        	<div class="ins_info">
				<table width="246" border="0" align="center" cellpadding="5" cellspacing="0">
                	<caption>实例信息</caption>
                    <tr>
                    	<td width="75">
                        	<p>实例信息：</p>
                        </td>
                        <td width="151">
                        	<p><?php echo $ins_info['ins_name'];?></p>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<p>实例创建者:</p>
                        </td>
                        <td>
                        	<p><?php echo $ins_info['ins_creator'];?></p>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<p>实例状态：</p>
                        </td>
                        <td>
                        	<?php 
								echo "status";
							?>
                        </td>
                    </tr>
                </table>
          </div>
            <div class="ins_case_info">
              <table width="246" border="0" align="center" cellpadding="5" cellspacing="0">
                <caption>
                  案例信息
                </caption>
                <tr>
                  <td width="89"><p>From Case:</p></td>
                  <td width="137"><p><?php echo $ins_info['ins_from'];?></p></td>
                </tr>
                <tr>
                  <td><p>案例描述：</p></td>
                  <td></td>
                </tr>
                 <tr>
                 	<td colspan="2">
                    	<textarea cols="25" rows="6" readonly="readonly"><?php echo $ins_info['case_descri'];?></textarea>
                    </td>
                 </tr>
                <tr>
                  <td><p>最大玩家数：</p></td>
                  <td><p><?php echo $ins_info['max_player'];?></p></td>
                </tr>
              </table>
            </div> 

  	</div>
  <div class="role_dynamics">
      	<b>角色申请：</b>
        <p></p>
        
                    <div class="indicator">
            <table width="687" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
            	<td width="112"><p>指导者：</p></td>
                <td width="555"><p id="indicators"></p>
                </td>
            </tr>
            <tr>
            	<td><p>申请操作：</p></td>
                <td>
					<input id="applyIndicator" type="button" value="申请" />
                    <input id="cancelIndicator" type="button" value="取消申请" />
                    <input id="quitIndicator" type="button" value="取消角色" />
                </td>
            </tr>
            </table>
            </div>
         <?php 
				foreach($roles as $row){
			?>
                <div class= "role_op">
                	<table width="687" border="0" align="center" cellpadding="5" cellspacing="0">
                    <tr>
                    	<td width="112" align="left" valign="top">
                        	<p>角色名：</p>
                        </td>
                        <td align="left" valign="top">
                       	  <p id="roleName<?php echo $row['roleid'];?>"></p>
                        </td>
                      </tr>
                    <tr>
                    	<td align="left" valign="top">
                        	<p>扮演者：</p>
                        </td>
                        <td align="left" valign="top">
                       	  <p id="actorName<?php echo $row['roleid'];?>"></p>
                        </td>
                      </tr>
                    <tr>
                    	<td align="left" valign="top">
                        	<p>角色状态：</p>
                        </td>
						<td align="left" valign="top">
							<p id="roleStatus<?php echo $row['roleid'];?>"></p>
                        </td>
                    </tr>
                    <tr>
                    	<td align="left" valign="top">
                        	<p>申请操作：</p>
                        </td>
                        <td align="left" valign="top" id="applyOp<?php echo $row['roleid'];?>">
                        <input id="apply<?php echo $row['roleid'];?>" type="button" value="申请" class="applySub"/>
                        <input id="cancel<?php echo $row['roleid'];?>" type="button" value="取消申请" class="applyCancel" />
                        <input id="quit<?php echo $row['roleid'];?>" type="button" value="取消角色" class="applyQuit" />
                        </td>
                    </tr>
                    </table>
  				</div>
            <?php 
				}
			?>
            <hr />

  </div>
  <div class="footer">
         <hr />
       <p align="center">Copyright 2009 PBCLS Team. All Rights Reserved.</p>
  </div>
	</div>
</div>
</body>
</html>
<script src="/js/jquery.min.js" type="text/javascript">
</script>
<script language="javascript">
	$(document).ready(function(){
			<?php foreach($indicators as $indicator){?>$("#indicators").append("<span>"+"<?php echo $indicator['username'];?>"+"</span>;&nbsp;&nbsp;");<?php }?>
			$("#applyIndicator").hide();
			$("#cancelIndicator").hide();
			$("#quitIndicator").hide();
		<?php switch($myIndicatorStatus){
			case '0':?>
			$("#applyIndicator").show();
		<?php break;
			case '1':?>
			$("#cancelIndicator").show();
		<?php break;
			case '2':?>
			$("#quitIndicator").show();
		<?php break;
		}			?>
			<?php 
			 foreach($roles as $row){
			?>
			$("#cancel<?php echo $row['roleid'];?>").hide();
			$("#apply<?php echo $row['roleid'];?>").hide();
			$("#quit<?php echo $row['roleid'];?>").hide();
			$("#roleName<?php echo $row['roleid'];?>").html("<?php echo $row['rolename'];?>");
			$("#actorName<?php echo $row['roleid'];?>").html("<?php echo $row['actorname'];?>");
			$("#roleStatus<?php echo $row['roleid'];?>").html("<?php echo $row['rolestatus']=='0'?"Open":"Closed";?>");
			<?php
			if(empty($myrole) && $isApplying == '-1'){
				if($row['rolestatus']=='0'){
			?>
				$("#apply<?php echo $row['roleid'];?>").show();
			<?php 
				}
				else if($row['rolestatus']=='1'){
			?>
				$("#apply<?php echo $row['roleid'];?>").show().attr("disabled",true);
			<?php
					}
			}else
			{?>
				$("#applyIndicator").hide();
				$("#cancelIndicator").hide();
				$("#quitIndicator").hide();
			<?php 
				if($isApplying == $row['roleid']){
			?>
				$("#cancel<?php echo $row['roleid'];?>").show();
			<?php 
				}else if(!empty($myrole) && $myrole['roleid'] == $row['roleid']){
			?>
				$("#quit<?php echo $row['roleid'];?>").show();
				
			<?php
				}
			}
		}
		?>
							   });
	
	$(".applySub").click(function(){
			var roleId = $(this).attr("id");
			roleId = roleId.substring(5);
			$.ajaxfunc('0',roleId);
								  });
	
	$(".applyCancel").click(function(){
			var roleId = $(this).attr("id");
			roleId = roleId.substring(6);
			$.ajaxfunc('1',roleId);
									 });
	
	$(".applyQuit").click(function(){
			var roleId = $(this).attr("id");
			roleId = roleId.substring(4);
			$.ajaxfunc('2',roleId);
								   });

	
		$("#applyIndicator").click(function(){
				var userId = <?php echo $this->session->userdata('user_id');?>;
						$.ajax({
							type: "post",
							data: "userId=" + userId +"&insId=<?php echo $ins_id;?>",
							url: "<?php echo site_url();?>/insAjax/applyIndicator",
							dataType: "xml",
							success: function(xml){
								var retVal = $(xml).find("flag").text();
								var message = $(xml).find("message").text();
								if(retVal == '1'){
									$("#applyIndicator").hide();
									$(".applySub").hide();
									$("#cancelIndicator").show();
								}
								alert(message);
							},
							error: function(){
								alert("ajax error!");
							}
						});//end ajax
				});
	
	$("#cancelIndicator").click(function(){
						var userId = <?php echo $this->session->userdata('user_id');?>;
						$.ajax({
							type: "post",
							data: "userId=" + userId +"&insId=<?php echo $ins_id;?>",
							url: "<?php echo site_url();?>/insAjax/cancelApplyIndicator",
							dataType: "xml",
							success: function(xml){
								var retVal = $(xml).find("flag").text();
								var message = $(xml).find("message").text();
								if(retVal == '1'){
									$("#cancelIndicator").hide();
									$(".applySub").show();
									$("#applyIndicator").show();
								}
								alert(message);
							},
							error: function(){
								alert("ajax error!");
							}
							   });//end ajax
										 });
	$("#quitIndicator").click(function(){
						var userId = <?php echo $this->session->userdata('user_id');?>;
						$.ajax({
							type: "post",
							data: "userId=" + userId +"&insId=<?php echo $ins_id;?>",
							url: "<?php echo site_url();?>/insAjax/cancelIndicatorAct",
							dataType: "xml",
							success: function(xml){
								var retVal = $(xml).find("flag").text();
								var message = $(xml).find("message").text();
								if(retVal == '1'){
									$("#quitIndicator").hide();
									$("#applyIndicator").show();
								}
								alert(message);
							},
							error: function(){
								alert("ajax error!");
							}
							   });//end ajax
									   });
		$.extend({
			 ajaxfunc: function(flag,roleId){
				 $.ajax({
					type: "post",
					data: "roleId=" + roleId +"&insId=<?php echo $ins_id;?>"+"&flag="+flag,
					url: "<?php echo site_url();?>/insAjax/applyOp",
					dataType: "xml",
					success: function(xml){
						var retFlag = $(xml).find("flag").text();
						var retMess = $(xml).find("message").text();
						if(retFlag == '-1' || retFlag == '0'){
							alert(retMess);
						}else{
							$("#applyIndicator").hide();
							$("#cancelIndicator").hide();
							$("#quitIndicator").hide();
							alert(retMess);
						}
						window.location.reload();
					},
					error: function(){
						alert("ajax error");
					}
					   });//end ajax
			 }
			 });
	
</script>