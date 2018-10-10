<?php $this->load->view('main/header');?>
现在位置：PBCLS >> 个人信息 >> 站内信 >> 阅读邮件
     <br></br>
<link rel="stylesheet" type="text/css" href="/css/main.css" />
    <?php $this->load->view('main/sidebar')?>
    <div class="messagebox">
   
    <p align="left"><strong>我的信箱</strong></p>
    <div class="mail_top" >
      <table width ="100%" height="49" border="0" rules="none">

        <tr>
          <th width="20%" height="43"><a href="<?php echo site_url('message')?>">收件箱</a></th>
          <th width="20%" height="43"><a href="<?php echo site_url('message/sents')?>">发件箱</a></th>
          <td width="" height="43" align="right"><div style="margin-right:15px"><a href="<?php echo site_url('message/writeMessage')?>"><strong>写邮件</strong></a></div></td>
        </tr>
      </table>
      </div>
      <div class="messagebody" width="">
    	  <form name="showmessage" action="<?php echo site_url('message/sendMessage')?>" method="post">
           
            <input type="hidden" name="to" value="<?php echo $from?>" />
            <table width="" height="235" border="1" rules="rows" id="table12" style="margin-left:10">
              <tr>
                <td width="50%">发件人:
                  <?php $from = $this->usermodel->getUsername($from); echo $from?></td>
                <td width="" align="right">发送时间：<?php echo $sendtime?></td>
              </tr>
              <tr>
                <td colspan="2" align="center" height="30px"><b>标题：<?php echo $title?></b></td>
              </tr>
              <tr>
                <td colspan="2"><textarea name="textarea" cols="85%" rows="5" wrap="physical"><?php echo $body?></textarea></td>
              </tr>
              <tr>
                <td colspan="2"><textarea name="body" cols="85%" rows="5"></textarea></td>
              </tr>
              <tr>
              	<td><input name="title" value="<?php echo "回复：$title"?>" size="50" /></td>
                <td align="right"><input name="send" type="submit" value="快速回复" /></td>
              </tr>
            </table>
          </form>
      </div>
      
      </div>
    <?php $this->load->view('main/footer')?>