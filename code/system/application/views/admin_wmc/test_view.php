<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<title>login</title>
</head>
    <body>
<h1>What's PBCLS:</h1>

<p>What is PBCLS?PBLS is Project Based Case Learning System. 
This system is developed for teaching and learning in course of Software College.  
It is a learning system for transferring, tracking, 
direction and management of case learning content and process rate. 
This system imitate a virtual world, you can take any roles you want to act.
These roles may be anyone in a practical project. 
Enjoy your learning like playing a game!
</p>
<h1>Poject Background:</h1>
<code>
Nowadays all kinds of online education systems arise like bamboo shoots after a rain.
But all of them look like in one appearance. So we want to do something differs.
And we do. This project is called PBLS.
This project is established by Computer Science and Software College of Zhejiang University.
Cheng Yang, a professor of this college, is our team leader.
All of the team members are students from Computer Science and Software College,Zhejiang University. 
</code>
<h2>Role Tables</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
    <td>UID</td>
    <td>ID</td>
    <td>Role(角色）</td>
    <td>Role Name（角色名称）</td>
    <td>Caseid</td>
    </tr>
    <?php echo "<br/>"?>

    <?php
       foreach($query as $row)
       {
    	?>
    	<tr>
    	    <td style="border: solid #00000 1px;"><?php echo $row['uid']; ?></td>
    	    <td style="border: solid #00000 1px;"><?php echo $row['id'];?></td>
    	    <td style="border: solid #00000 1px;"><?php echo $row['role'];?></td>
    	    <td style="border: solid #00000 1px;"><?php echo $row['rolename'];?></td>
    	    <td style="border: solid #00000 1px;"><?php echo $row['caseid'];?></td>
    	</tr>
    	<?php 
       }
    	?>   
<?php echo $this->pagination->create_links()?>
</table>
<table>
    <tr>
        <td><img src="system/images/site_logo.PNG"></img></td> 
        <td><?php echo img('system/images/site_logo.PNG')?></td>     
    </tr>
</table>

    </body>
</html>