<?php $this->load->view('main/ins_header');?>
  <div class="maincontent">
  <div class="main_nav">
  	现在位置：PBCLS >> 实例控制
  </div>
<div class="sidebar">
        	<div class="ins_info">
				<table width="250" border="0" align="center" cellpadding="5" cellspacing="0">
                    <tr><td bgcolor="#E7E7E7" colspan="2">实例信息</td></tr>
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
                        <select id="changInsSta">
                        	<option value="0">Open</option>
                            <option value="1">Close</option>
                        </select>
                        <input type="button" id="changInsStaSub" value="提交"/>

                        </td>
                    </tr>
                </table>
          </div>
            <div class="ins_case_info">
  <table width="250" border="0" align="center" cellpadding="5" cellspacing="0">
                <tr><td bgcolor="#E7E7E7" colspan="2">案例信息</td></tr>
                 <tr>
                 	<td width="89">
                    	<p>From Case:</p>
                   	</td>
                    <td width="137">
                    	<p><?php echo $ins_info['ins_from'];?></p>
                    </td>
                 </tr>
                 <tr>
                 	<td>
                    	<p>案例描述：</p>
                    </td>
                    <td>
                    </td>
                 </tr>
                 <tr>
                 	<td colspan="2">
                    	<textarea cols="25" rows="6" readonly="readonly"><?php echo $ins_info['case_descri'];?></textarea>
                    </td>
                 </tr>
                 <tr>
                 	<td>
                    	<p>最大玩家数：</p>
                    </td>
                    <td>
                    	<p><?php echo $ins_info['max_player'];?></p>
                    </td>
                 </tr>
                </table>
			</div>
            <div class="ins_ope">
            <table width="250" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
            	<td width="80" align="left">案例操作：</td>
                <td width="150" align="right"><?php
					if($ins_info['is_started']=='0'){
					?>
                        <select id="strorcan" name="strorcan">
                            <option>==项目操作==</option>
                            <option>开始项目学习</option>
                            <option>取消项目</option>
                        </select>
					<?php
					}
					?>
            	</td>
            </tr>
            <tr>
            	<td colspan="2" align="right"><?php
					if($ins_info['is_started']=='0'){
					?>
                    <input type="button" value="提交" id="insOp"/>
                    <?php 
					}else{
					?>
					<input type="button" value="继续学习" id="insConti" />
                    <?php 
					}
					?>
                </td>
            </tr>
            </table>
            </div>
    </div>
        <div class="role_dynamics">
        	<table width="700" cellpadding="5" cellspacing="0" border="0">
            <tr><td bgcolor="#E7E7E7" colspan="2"><strong>角色信息：</strong></td></tr>
            <tr>
            	<td width="133">
                	<p>您所担任的职务：</p>
                </td>
                <td width="547">
                	<p id="myRole"></p>
                    <p id="myRoleId"></p>
                    
                </td>
            </tr>
            <tr>
            	<td>
                	<p>您可以转换的角色：</p>
                </td>
                <td>
                	<select id="myRoleSelect" name="myRoleSelect">
                                	<option value='0'>===可以转换的角色===</option>
                    </select>
                    <input type="button" value="更改" id="changeMyRole" />
                </td>
            </tr>
            <tr>
            	<td colspan="2"><b>指导者角色信息：</b>
            </td>
            </tr>
            
            <tr>
            	<td><p>指导者：</p></td>
                <td><p id="indicators"></p>
                </td>
            </tr>
            <tr>
            	<td><p>申请者列表：</p></td>
                <td>
                 <table width="255">
                          <tr>
                          	<td width="100">
                            	<select id="indicatorApply" class="apply_charge_role">
                              	</select>
                          	</td>
                            <td width="143">
                           		<input id="indicatorAc" type="button" value="通过" />
                                <input id="indicatorDeny" type="button" value="拒绝" />
                            </td>
                          </tr>
                  </table>
                </td>
            </tr>
            
            <tr>
            <td colspan="2"><b>其他角色信息:</b>
            </td>
            </tr>
            </table>
            <?php 
				foreach($roles as $row){
			?>
                <div class= "role_op">
                	<table width="687" border="0" align="center" cellpadding="5" cellspacing="0">
                    <tr>
                    	<td width="125" align="left" valign="top">
                        	<p>角色名：</p>
                        </td>
                        <td align="left" valign="top" colspan="2">
                       	  <p id="roleId<?php echo $row['roleid'];?>"></p>
                        </td>
                      </tr>
                    <tr>
                    	<td align="left" valign="top">
                        	<p>扮演者：</p>
                        </td>
                        <td width="81" align="left" valign="top">
                       	  <p id="actorId<?php echo $row['roleid'];?>"></p>
                        </td>
                        <td width="451">
                          <input id="banRole<?php echo $row['roleid'];?>" class="banRole" type="button" value="剔除" disabled="disabled" />
                        </td>
                      </tr>
                    <tr>
                    	<td align="left" valign="top">
                        	<p>角色状态：</p>
                        </td>
						<td align="left" valign="top" colspan="2">
                          <table width="255">
                          <tr>
                          	<td width="100">
                            	<select id="role<?php echo $row['roleid'];?>Status" class="apply_charge_role">
                                	<option selected="selected" value="1">Open</option>
                                    <option value="0">Closed</option>
                              	</select>
                          	</td>
                            <td width="143">
                           		<input id="role<?php echo $row['roleid'];?>StatusChange" type="button" value="提交" class="roStaCha"/>
                            </td>
                          </tr>
                          </table>
                        </td>
                    </tr>
                    <tr>
                    	<td align="left" valign="top">
                        	<p>申请者列表：</p>
                        </td>
                        <td align="left" valign="top" colspan="2">
                      <table width="255">
                      <tr>
                      	<td width="100">
                           	<select id="applyerList<?php echo $row['roleid'];?>" class="apply_charge_role">
                            </select>
                        </td>
                        <td width="143">
                        	<input id="applyerList<?php echo $row['roleid'];?>Submit" type="button" value="提交" class="applyerAc" />
                        </td>
                      </tr>
                      </table>
                        </td>
                    </tr>
                    </table>
  </div>
            <?php 
				}
			?>
    </div>
  </div>
<div class="footer">
       <hr />
       <p align="center">Copyright 2009 PBCLS Team. All Rights Reserved.</p>
    </div>
</div>
</body>
</html>
<script src="/js/jquery.min.js" type="text/javascript">
</script>
<script language="javascript">
	$(document).ready(function(){
						<?php foreach($indicators as $indicator){
				?>
					$("#indicators").append("<span>"+"<?php echo $indicator['username'];?>"+"</span>;&nbsp;&nbsp;");
				<?php
					}
					foreach($indicatorApplyers as $applyer){
				?>
					$("#indicatorApply").append("<option value="+"<?php echo $applyer['userid'];?>"+">"+"<?php echo $applyer['username'];?>"+"</option>");
					
				<?php
					}
				if($ins_info['is_started']=='0'){
				?>
					$("#insOp").attr("disabled",true);
				<?php 
				}
				?>
				$("#myRoleId").hide();
				$("#changeMyRole").attr("disabled",true);
				<?php foreach($roles as $row){
					if($row['actorid'] == $this->session->userdata('user_id')){
				?>
					$("#myRole").html("<?php echo $row['rolename'];?>");
					$("#myRoleId").html("<?php echo $row['roleid']; ?>");
				<?php 
					}
				?>
				//角色名和扮演者动态生成
				$("#roleId<?php echo $row['roleid'];?>").html("<?php echo $row['rolename'];?>");
				$("#actorId<?php echo $row['roleid'];?>").html("<?php echo $row['actorname'];?>");
				var actorId = "<?php echo $row['actorid'];?>";
				if(actorId != 0){
					$("#banRole<?php echo $row['roleid'];?>").attr("disabled",false);
				}
				else{
				//创建者角色动态生成
				$("#myRoleSelect").append("<option value="+"<?php echo $row['roleid'];?>"+">"+"<?php echo $row['rolename'];?>"+"</option>");
				}
				//角色状态的动态生成
				<?php if($row['rolestatus'] =='0'){
				?>
					$("#role<?php echo $row['roleid'];?>Status").get(0).selectedIndex = '0';
				<?php
					}else if($row['rolestatus'] == '1'){
				?>
					$("#role<?php echo $row['roleid'];?>Status").get(0).selectedIndex = '1';
				<?php
				}
				?>
				
				<?php 
				$count = 0;
				foreach($row['applyingList'] as $playername){
					$count++;
				?>
					$("#applyerList<?php echo $row['roleid'];?>").append("<option value="+"<?php echo  $playername['userid'];?>"+">"+"<?php echo $playername['username'];?>"+"</option>");
				<?php
					}
					if($count == 0){
				?>
					$("#applyerList<?php echo $row['roleid'];?>Submit").attr("disabled",true);
				<?php
					}
				}
				?>						  
	});//end function

//剔除该角色上的用户
	$(".banRole").click(function(){
				if(confirm("确实要剔除用户吗？")){
				var string = $(this).attr("id");
				var roleId = string.substring(7);
				$.ajax({
					type: "post",
					data: "roleId=" + roleId +"&insId=<?php echo $ins_id;?>",
					url: "<?php echo site_url();?>/insAjax/banUser",
					dataType: "xml",
					success: function(xml){
						var retVal = $(xml).find("flag").text();
						if(retVal == '1'){
							$("#actorId"+roleId).html('');
							alert('剔除成功');
						}else if(retVal == '0'){
							alert('剔除失败');
						}
						else alert('后台服务器错误');
					},
					error: function(){
						alert('ajax error.');
					}
				 });//end ajax				
				}//end if
	 });
	
	$(".applyerAc").click(function(){
							var thisId = $(this).attr("id");
							string = thisId.substring(11);
							var roleId = string.substr(0,string.length-6);
							var userId = $("#applyerList" + roleId).val();
							if(userId != null){
								$.ajax({
								    type: "post",
									data: "roleId=" + roleId +"&insId=<?php echo $ins_id;?>"+"&userId="+userId,
									url: "<?php echo site_url();?>/insAjax/changeRolePlayer",
									dataType: "xml",
								   success: function(xml){
									   $("#actorId"+roleId).html($(xml).find("userName").text());
									   $("#applyerList"+roleId).empty();
									   if($(xml).find("applyer").length > 0){
									   	$(xml).find("applyer").each(function(){
											var applyerId = $(this).children("applyerId");
											var applyerName = $(this).children("applyerName");
											$("#applyerList"+roleId).append("<option value="+applyerId.text()+">"+applyerName.text()+"</option>");
																			 });
									   }
									   else{
										   $("#"+thisId).attr("disabled",true);
									   }
									   $("#banRole"+roleId).attr("disabled",false);
									   alert("修改角色成功");
								   },
								   error: function(){
									   alert("ajax error");
								   }
								});
							}
							else{
							}
								   });
	
	$(".roStaCha").click(function(){
							var string = $(this).attr("id");
							//4代表"role"单词长度,12代表"StatusChange"长度
							string = string.substring(4);
							var roleId = string.substr(0,string.length-12);
							
							var selectObject =$("#role" + roleId + "Status option:selected");
							var selected = selectObject.get(0).value;
							$.ajax({
								   type: "post",
									data: "roleId=" + roleId +"&insId=<?php echo $ins_id;?>" + "&flag=" + selected,
									url: "<?php echo site_url();?>/insAjax/changeRoleStatus",
									dataType: "xml",
								   success: function(xml){
									  var flag = $(xml).find("flag").text();
									   if(flag == '-1'){
									   	alert('更改角色状态失败');
									   }
									   else{
									   	alert('更改角色状态成功');
										if(flag == '0'){
											$("#role" + roleId + "Status options[0]").get(0).selectedIndex = '0';
										}else if(flag == '1'){
											$("#role" + roleId + "Status options[0]").get(0).selectedIndex = '1';
										}
									   }
									  
								   },
										 error: function(){
											 alert("ajax error.");
										 }
								   });
								  });
	
	$("#myRoleSelect").change(function(){
				var roleId = $("#myRoleSelect").get(0).selectedIndex;
				if(roleId != '0'){
					$("#changeMyRole").attr("disabled",false);
				}else{
					$("#changeMyRole").attr("disabled",true);
				}
									   });
	
	$("#changeMyRole").click(function(){
				var roleId = $("#myRoleSelect option:selected").get(0).value;
				if(roleId != '0' && confirm("真的要转换角色吗？")){
					$.ajax({
					   type: "post",
						data: "roleId=" + roleId +"&insId=<?php echo $ins_id;?>",
						url: "<?php echo site_url();?>/insAjax/changeMyRole",
						dataType: "xml",
						success: function(xml){
							var retVal = $(xml).find("flag").text();
							var retMessage = $(xml).find("message").text();
							if(retVal == '1'){
								lastRole = $("#myRole").text();
								lastRoleId = $("#myRoleId").text();
								if(lastRole != '' && lastRoleId != ''){
									$.disableRole(lastRoleId);
									$("#myRoleSelect").append("<option value="+lastRoleId+">"+lastRole+"</option>");
								}
								$("#myRole").html($(xml).find("roleName").text());
								$("#myRoleId").html(roleId);
								$("#myRoleSelect option:selected").remove();
								$("#myRoleSelect").get(0).selectedIndex = '0';
								$.enableRole(roleId,$(xml).find("playerName").text());
							}
							alert(retMessage);
						},
						error: function(){
							alert('ajax error!');
						}
						   });
				}//end if
									  });
	
	$.extend({
                     enableRole: function(roleId,userName){
						 $("#actorId"+roleId).html(userName);
						 $("#banRole"+roleId).attr("disabled",false);
						 },
                     disableRole: function(roleId){
						 $("#actorId"+roleId).html('');
						 $("#banRole"+roleId).attr("disabled",true);
						 } 
                  }); //扩展enableRole,disableRole

	$("#strorcan").change(function(){
			var selectIndex = $(this).get(0).selectedIndex;
			if(selectIndex == '0')
				$("#insOp").attr("disabled",true);
			else $("#insOp").attr("disabled",false);
								   });
		
	$("#insOp").click(function(){
			var selectedIndex = $("#strorcan").get(0).selectedIndex;
			if(selectedIndex == '1'){
				if($("#roleId1").text() == ''){
					alert("您还未选择PM（项目经理），项目不能开始");
				}else{
					if(confirm("确实要开始项目么？")){
						var path = "<?php echo site_url('ins/InsOp');?>" + "/" + "<?php echo $ins_id;?>" + "/" + "1";
						window.location.href = path;
					}
				}
			}else if(selectedIndex == '2'){
				if(confirm("确实要取消项目么？")){
					var path = "<?php echo site_url('ins/InsOp');?>" + "/" + "<?php echo $ins_id;?>" + "/" + "2";
					window.location.href = path;
				}
			}
						});
	
	$("#indicatorAc").click(function(){
						var userId = $("#indicatorApply option:selected").get(0).value;
						$.ajax({
							type: "post",
							data: "userId=" + userId +"&insId=<?php echo $ins_id;?>",
							url: "<?php echo site_url();?>/insAjax/acApplyIndicator",
							dataType: "xml",
							success: function(xml){
								var retVal = $(xml).find("flag").text();
								var message = $(xml).find("message").text();
								var userName = $(xml).find("userName").text();
								if(retVal == '1'){
									$("#indicators").append("<span>"+userName+"</span>;&nbsp;&nbsp;");
									//$("$banIndicatorList").append("<option value="+userId+">"+userName+"</option>");
									$("#indicatorApply").empty();
									if($(xml).find("applyer").length > 0){
									 $(xml).find("applyer").each(function(){
										 var applyerId = $(this).children("applyerId");
										 var applyerName = $(this).children("applyerName");
									 	$("#indicatorApply").append("<option value="+applyerId.text()+">"+applyerName.text()+"</option>");
									   });
									}//end if
									else{
										   $("#indicatorAc").attr("disabled",true);
										   $("#indicatorDeny").attr("disabled",true);
									   }
								}
								alert(message);
							},
							error: function(){
								alert('ajax error!');
							}
						 });//end ajax	
									 });
	$("#insConti").click(function(){
					if(confirm("继续项目学习吗？")){
						window.location.href= "<?php echo site_url("project/index/".$ins_id); ?>";
					}
								  });

	$("#indicatorDeny").click(function(){
						var userId = $("#indicatorApply option:selected").get(0).value;
						$.ajax({
							type: "post",
							data: "userId=" + userId +"&insId=<?php echo $ins_id;?>",
							url: "<?php echo site_url();?>/insAjax/denyApplyIndicator",
							dataType: "xml",
							success: function(xml){
								var retVal = $(xml).find("flag").text();
								var message = $(xml).find("message").text();
								if(retVal == '1'){
									$("#indicatorApply option:selected").remove();
									$("#myRoleSelect").get(0).selectedIndex = '0';
									
								}
								alert(message);
							},
							error: function(){
								alert("ajax error!");
							}
							   });//end ajax
									   });
</script>