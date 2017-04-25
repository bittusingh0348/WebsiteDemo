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
<h3>Delete Message</h3>
<table cellpadding="21">
<tr>
	<td><U>User</U></td>
	<td><U>Date</U></td>
	<td><U>Message</U></td>
	<td><U>Action</U></td>
</tr>
<?php
		if(isset($_POST['del']))
		{
		$res=mysqli_query($con,"delete from message where msgid='$_POST[msgid]'");
		echo "Deleted Successfully.";
		}
		$res=mysqli_query($con,"select * from message where uid != '$usr'");
		while($row=mysqli_fetch_assoc($res))
		{
			$res1=mysqli_query($con,"select name from user where uid='$row[uid]'");
			$row1=mysqli_fetch_assoc($res1);
?>
<form method="POST" action="delmsg.php">
<tr>
	<td><?php echo $row1['name'];?><input type="hidden" name="msgid" value="<?php echo $row['msgid'];?>"></td>
	<td><?php echo $row['date'];?></td>
	<td><?php echo $row['msg'];?></td>
	<td><input type="submit" name="del" value="Delete"></td>
</tr>
</form>
<?php
		}
?>
</table>
<a href="adminhome.php">Back</a>

</div>
</center>
</body>
</html>