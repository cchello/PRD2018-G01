<link rel="stylesheet" type="text/css" href="/css/main.css" />
    <div class="maincontent">
        <div class="main_nav">
           	<br> 现在位置：PBCLS >> 案例详细信息
        </div>
		<div class="sidebar">
            <div class="side_nav">
            <hr></hr>
            <b>案例详情</b>
              <div class="caseDet" id="caseDet"></div>
              <br>
              <a href="#" id="insDetail">详细信息</a><br>
              <a href="#" id="insList">已有的实例</a><br>
              <a href="<?php echo site_url('caseControl/showInsDisSpa')?>/<?php echo $caseId;?>" id="disSpace">案例讨论区</a>
              <div class="insCre">
              <hr><b>创建实例</b>
              <br>
              <?php echo form_open('');?>
              <?php echo form_fieldset('新建实例');?>
              <br>
               	<?php echo form_label('实例名称:');?>
                <?php echo form_input('ins_name',set_value('instance_name'));?>
                <div align="right"><?php echo form_submit('cre_ins','新建');?></div>
                <?php echo form_fieldset_close();?>
                <?php echo form_close('');?>
              </div>
        	</div>
		</div>
		<div class="mainInfo"></div>
	</div>
</div>	


<script src="<?php echo site_url()?>js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){	
	$(".mainInfo").empty();
	$(".mainInfo").load("<?php echo site_url('caseControl/showInsDetail').'/'.$caseId;?>");	
})

$("#insDetail").click(function(){
	$(".mainInfo").empty();
	$(".mainInfo").load("<?php echo site_url('caseControl/showInsDetail').'/'.$caseId;?>");
});

$("#insList").click(function(){
	$(".mainInfo").empty();
	$(".mainInfo").load("<?php echo site_url('caseControl/showMainInfo').'/'.$caseId;?>");
});
</script>