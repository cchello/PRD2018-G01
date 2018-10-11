<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/main.css" />

<style type="text/css">
.mail_top{
	width:700px;
	background-color:#8FBC8F;
}
.messagelist{
	height:300px;
	overflow:auto;
	width:700px;
	background-color:#A9A9A9;
}
.mesContent{
	margin:5px;
	height:150px;
	overflow:auto;
	width:700px;
	background-color:#FFFFE0;
}

</style>

<div class="messagebox">
	<div class="mail_top">
		<p>共收到信件<?php echo $receiveNum?>封 (未读 <strong><?php echo $newNum?></strong>封)</p>
    </div>
    <div class="messagelist">
    	<table id='box' width='100%' border='1' rules='rows'>
    		<tr>
    			<th width='15%' height='35'>类型</th>
    			<th width='30%'>标题</th>
    			<th width='20%'>发件人</th>
    			<th width='35%'>发送时间</th>
    		</tr>
    		<?php foreach ($messages as $array){
				?>
			<tr>
				<th width='15%' height='35'><?php if(!$array['isreaded']) echo "未读"; else echo "已读";?></th>
				<th width='30%'><a href='#' class='mesTitle' id='<?php echo $array['uid'];?>'><?php echo $array['title'];?></a></th>
				<th width='20%'><?php echo $this->usermodel->getUsername($array['from']);?></th>
				<th width='35%'><?php echo $array['sendtime'];?></th>
			</tr>
			<?php }?>
    	</table>
	</div>	
<!-- 	<div id="forward">-->
<!-- 	<a id="firstpage">首页    </a><a id="uppage">上一页    </a><a id="downpage">下一页    </a><a id="lastpage">尾页</a>-->
<!--  	</div>-->
	<hr></hr>
	<div class="mesContent">
	</div>
</div>

<script type="text/javascript" src="<?php echo site_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo site_url();?>js/jquery.livequery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".mesTitle").livequery("click",function(){
		var mesid = $(this).attr("id");
		<?php 
		foreach ($messages as $array){
		?>	
			if(	mesid == <?php echo $array['uid'];?>){
				<?php $mesid = $array['uid'];?>
				var mesbody = "<table><tr><th>发件人：</th><th align='left'><?php echo $this->usermodel->getUsername($array['from']);?></th></tr>";
					mesbody += "<tr><th>发送时间：</th><th align='left'><?php echo $array['sendtime'];?></th></tr>";
					mesbody += "<tr><th>信件内容：</th><th align='left'><TEXTAREA><?php echo $array['body'];?></TEXTAREA></th></tr></table>";
				var delbut = "<p><input id='<?php echo $array['uid'];?>' type='button' value='删除邮件'></input></p>";
				$(".mesContent").empty();
				$(".mesContent").append(mesbody);
				$(".mesContent").append(delbut);
				<?php $this->messagemodel->changeMessageStatus($mesid);?>
				$("input[id='<?php echo $mesid;?>']").livequery("click",function(){
					$.post("<?php echo site_url('personal/mailBox/deleteMessage')?>",
							{messageId : <?php echo $mesid;?>},
							function (data, textStatus){
					});
				});
			}
		<?php }?>
	});
});
</script>