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
	if(isset($_POST['update']))
	{
		$res=mysqli_query($con,"Update user set name='$_POST[name]',mob='$_POST[mob]',email='$_POST[email]' where uid='$_POST[uid]'");
		echo "Updated Successfully.";
	}
	if(isset($_POST['upd']))
	{
		$u=$_POST['uid'];
		$res1=mysqli_query($con,"select * from user where uid='$u'");
		$row=mysqli_fetch_assoc($res1);
	}
	else{
		$res1=mysqli_query($con,"select * from user where uid='$usr'");
		$row=mysqli_fetch_assoc($res1);
	}

?>
<form method="POST" action="profinfo.php">

<h3>Profile Information</h3>
<table>
<tr>
	<td>User Id: </td>
	<td><?php echo $row['uid'];?><input type="hidden" name="uid" value="<?php echo $row['uid'];?>"></td>
</tr>
<tr>
	<td>Name: </td>
	<td><input type="text" name="name" value="<?php echo $row['name'];?>" required></td>
</tr>
<tr>
	<td>Mobile No.: </td>
	<td><input type="text" name="mob" value="<?php echo $row['mob'];?>" required></td>
</tr>
<tr>
	<td>Email: </td>
	<td><input type="text" name="email" value="<?php echo $row['email'];?>" required></td>
</tr>
<tr>
	<td>Role: </td>
	<td><?php echo $row['role'];?></td>
</tr>
</table><br>
<input type="submit" name="update" value="Update" />
</form>
<br><br>
<?php
if($_SESSION['role']=='admin')
{
	echo "<a href='adminhome.php'>Home</a>";
}
elseif($_SESSION['role']=='manager')
{
	echo "<a href='managerhome.php'>Home</a>";
}
else
{
	echo "<a href='userhome.php'>Home</a>";
}
?>
</div>
</center>
</body>
</html>