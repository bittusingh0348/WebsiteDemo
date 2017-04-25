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

<h3>Block User</h3>
<table celpadding="21">
<tr>
	<td><U>User Id </U></td>
	<td><U>Name </U></td>
	<td><U>Mobile No. </U></td>
	<td><U>Email </U></td>
	<td><U>Role </U></td>
	<td><U>Blocked</U></td>
	<td><U>Action</U></td>
</tr>
<?php
		if(isset($_POST['block']))
		{
		$res=mysqli_query($con,"Update user set block='1' where uid='$_POST[uid]'");
		echo "Blocked Successfully.";
		}
		$res=mysqli_query($con,"select * from user where uid != '$usr'");
		while($row=mysqli_fetch_assoc($res))
		{
?>
<form method="POST" action="blockprof.php">
<tr>
	<td><?php echo $row['uid'];?><input type="hidden" name="uid" value="<?php echo $row['uid'];?>"></td>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['mob'];?></td>
	<td><?php echo $row['email'];?></td>
	<td><?php echo $row['role'];?></td>
	<td><?php if($row['block']==1) echo "Yes"; else echo"No";?></td>
	<td><input type="submit" name="block" value="Block"></td>
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