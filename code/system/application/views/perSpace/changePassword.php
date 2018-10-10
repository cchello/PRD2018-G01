       <div class="mainBody">
			<div class="pass_change">
            	<?php echo form_open('personal/chaPassword/change');
						echo form_fieldset();
							echo form_label('帐户名称：','account');
							echo $this->session->userdata('user_name');
							echo "<br>";
							echo "<br>";
							echo form_label('旧密码：','old_pass');
							echo "<br>";
							echo form_password('old_pass','');
							echo "<br>";
							echo form_label('新密码:','new_pass');
							echo "<br>";
							echo form_password('new_pass','');
							echo "<br>";
							echo form_label('确认密码：','pass_confirm');
							echo "<br>";
							echo form_password('pass_confirm','');
							echo "<br>";
							echo form_submit('submit','提交');
							echo form_reset('reset','重置');
						echo form_fieldset_close();
					echo form_close();
				?>
            </div>
        </div>