
  <div class="mainbody">
        <br />
        <h3>登陆记录</h3>
        <p>这里列出了您所有的登陆记录。</p>
        <br />
        <br />
        <table width="500" border="1">
            <tr style="font-size:12px">
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>登陆IP</strong></td>
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>登陆时间</strong></td>
                <td width="160" height="20" bgcolor="#DDDDDB" align="center"><strong>操作</strong></td>
                <td width="60"  height="20" bgcolor="#DDDDDB" align="center"><strong>标记</strong></td>
            </tr>
   <?php 
              if(is_array($array)){
	                  foreach($array as $ar){
		                  ?>
                 <tr style="font-size:12px">
                     <td height="20" align="center"><?php echo $ar['ip'];?></td>
                     <td height="20" align="center"><?php echo $ar['time'];?></td>
                     <td height="20" align="center">登录成功</td>
                     <td height="20" align="center">                          
                     <input type="checkbox" name="checkbox" value="" />
                     </td>                           
                  </tr> 		                  
		                  
		                  <?php 
	}	
}
?>                	  				   
        </table>
        <hr />
       
    </div> 
