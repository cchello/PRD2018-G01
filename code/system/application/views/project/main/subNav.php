<?php
/*
 *
 * @copyright (c) 2009 The PBCLS Team
 * @author cendy <cendymail@163.com>
 * @version 0.1
 *
 */
?>
<!-- project sub navigation -->
<ul id="subNavigation">
<?php for($i = 0; $i < $length; $i++){?>
	<li><a href="#" class="subNavLi" name="<?php echo $i+1;?>"><?php echo $subNav[$i];?></a></li>
<?php }?>
</ul>
