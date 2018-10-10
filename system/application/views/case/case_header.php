<?php $this->load->view('main/header');?>
    <div class="maincontent">
    	<div class="main_nav">
        	现在位置：PBCLS >> 案例讨论
        </div>
    	<div class="sidebar">
        	<div class="side_nav">
              <b>案例的详细描述</b>
              <hr />
              <p><a href=<?php echo site_url("/cc/ccshow/".$caseid);?>>详细信息</a></p>
              <p><a href=<?php echo site_url("/cc/ccins/".$caseid);?>>已有的实例</a></p>
              <p><strong>>>案例讨论区</strong></p>
            </div>
            <div class="ins_cre">
            	<b>创建实例</b>
                <hr />
                <?php echo form_open('');?>
                <?php echo form_fieldset('新建实例');?>
                	<?php echo form_label('实例名称:');?>
                    <?php echo form_input('ins_name',set_value('instance_name'));?>
                    <div align="right"><?php echo form_submit('cre_ins','新建');?></div>
                <?php echo form_fieldset_close();?>
                <?php echo form_close('');?>
            </div>
        </div>
          <div class="case_info"> 
        	<p>案例讨论</p>