<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form method="post" action="<?php echo site_url('admin/login/authen')?>">
<table>
  <tr>
    <th>用户名</th>
    <th><input id="username" name="username" type="text"></input></th>
  </tr>
  <tr>
    <td>密码</td>
    <td><input id="password" name="password" type="password"></input></td>
  </tr>
  <tr>
  <input id="submit" type="submit" value="确定"></input>
  </tr>
  <tr>
  <?php if(isset($error)) echo $error?>
  </tr>
</table>
</form>
</body>
</html>
