<?php
	session_start();
	include_once('db.php');
	$usr=$_SESSION['usr'];
?>
<html>
<head>
<title>
Demo
</title>
		<style>
			.div1{
				border:2px solid black;
				width:78%;
				height:70%;
				margin-left:0.1%;
				margin-top:0.5%;
				padding-top:20px;
				padding-left:1%;
				padding-bottom:20px;
				padding-right:10px;
				padding:10px;
				background-color:lightblue;
				}
		</style>
</head>
<body>
<center>
<div class="div1">
<?php
	if(isset($_POST['savemsg']))
	{
		$msg=$_POST['txt_msg'];
		$res_msg=mysqli_query($con,"insert into message (msg,uid) values ('$msg','$usr')");
		echo "Message posted successfully.";
	}
?>
<h3>Post a message</h3>
<form method="POST" action="inputmsg.php">
<textarea name="txt_msg" rows="5" cols="50" maxlength="250" placeholder="Type your message here ..." required></textarea>
<br><br>
<input type="submit" name="savemsg" value="Save" />
</form><br><br>
<a href="userhome.php">Back</a>
</div>
</center>
</body>
</html>