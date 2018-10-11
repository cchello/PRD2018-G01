<?php
/*
* 
* @copyright (c) 2009 The PBCLS Team 
* @author cendy <cendymail@163.com>
* @version 0.1
* 
*/  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='<?php echo base_url();?>css/rank.css' rel='stylesheet' type='text/css' />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-ui-1.7.2.custom.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery.form.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery.livequery.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/ui.draggable.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/rank.js'></script>
<title>排行榜</title>
</head>

<body>
<div id="loadingMessage"><img src="<?php echo base_url();?>img/loading.gif">正在加载，请稍后...
</div>
<?php $this->load->view('main/header');?>
<div id="rank_container"> 
