<?php $this->load->view('main/header');?>
现在位置：PBCLS >> 个人信息 >> 站内信 >> 写邮件
     <br></br>
<link rel="stylesheet" type="text/css" href="/css/main.css" />
    <?php $this->load->view('main/sidebar')?>
    <div class="messagebox">
    <p align="left"><strong>我的信箱</strong></p>
    <div class="mail_top" >
      <table width ="100%" height="49" border="0" rules="none">

        <tr>
          <th width="20%" height="43"><a href="">收件箱</a></th>
          <th width="20%" height="43"><a href="<?php echo site_url('message/sents')?>">发件箱</a></th>
          <td width="" height="43" align="right"><div style="margin-right:15px"><a href="<?php echo site_url('message/writeMessage')?>"><strong>写邮件</strong></a></div></td>
        </tr>
      </table>
      </div>
      <div class="messagebody">
    	  <form name="showmessage" action="<?php echo site_url('message/sendMessage')?>" method="post">

            <table width="" height="235" border="1" rules="rows" id="table12" style="margin-left:10">
              <tr>
                <td width="20%" height="30px"><b>收件人:</b></td>
                <td><input name="to" size="40"></input></td>
              </tr>
              <tr>
                <td width="20%" height="30px"><b>标题:</b></td>
                <td><input name="title" size="40"></input></td>
              </tr>
              <tr>
                <td colspan="2"><textarea name="body" cols="85%" rows="8"></textarea></td>
              </tr>
              <tr>
                <td align="right" colspan="2">
            	    <div><input name="send" type="submit" value="写好了" /></div>
                </td>
              </tr>
            </table>
          </form>
      </div>
      
      </div>
    <?php $this->load->view('main/footer')?>