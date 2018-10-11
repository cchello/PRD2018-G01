<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=urf-8">
<title>测试于数据库的链接</title>
</head>

<body>
    <h1>显示用户组的相关信息</h1>
    <table border="1" width="800" cellpadding="0" cellspacing="0">
    <tr>
        <td>User ID</td>
        <td>Group ID</td>
        <td>User Name</td>
        <td>Password</td>
        <td>User Type</td>    
    </tr>
   <?php
       foreach($query as $row)
       {
    	?>
    	<tr>
    	    <td style="border: solid #00000 1px;"><?php echo $row['uid']; ?></td>
    	    <td style="border: solid #00000 1px;"><?php echo $row['groupid'];?></td>
    	    <td style="border: solid #00000 1px;"><?php echo $row['username'];?></td>
    	    <td style="border: solid #00000 1px;"><?php echo $row['password'];?></td>
    	    <td style="border: solid #00000 1px;"><?php echo $row['usertype'];?></td>
    	</tr>
    	<?php 
       }
    	?>
 

    </table>
</body>

</html>
