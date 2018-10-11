<div class="ins_out">
	<form id="quitFrm" name="quitFrm" method="post">
		操作：<select id="quitType" name="quitType">
				<option value="1" selected="selected">退出至用户首页</option>
				<option value="2">退出项目组</option>
				<option value="3">退出至登录页面</option>
				</select>
				<input type="submit" value="提交" onclick="quitFunc()" />
	</form>
</div>

<script language="javascript">
	function quitFunc() {
		var quitType = document.getElementById("quitType");
		var frm = document.getElementById("quitFrm");
		var path = 0;
		switch(quitType.selectedIndex){
				case 0:
					if(confirm("确实退出游戏吗？") == true){
						path = "<?php echo site_url('project/exitToIndex');?>";
						
					}
				break;
				case 1:
				break;
				case 2:
					if(confirm("确实退出系统吗？") == true){
						path = "<?php echo site_url('home/quit');?>";
					}
				break;
				default:
				break;
			}
			
			if(path != 0){
				frm.action = path;
				frm.submit();				
			}
		}
</script>

