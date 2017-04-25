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
	if(isset($_POST['add']))
	{
		$res=mysqli_query($con,"insert into user values('$_POST[uid]','$_POST[name]','$_POST[mob]','$_POST[email]','$_POST[password]','$_POST[role]','0')");
		echo "New user added successfully.";
	}
?>
<form method="POST" action="newprof.php">

<h3>Add a new user</h3>
<table>
<tr>
	<td>User Id: </td>
	<td><input type="text" name="uid" required/></td>
</tr>
<tr>
	<td>Name: </td>
	<td><input type="text" name="name" required/></td>
</tr>
<tr>
	<td>Mobile No.: </td>
	<td><input type="text" name="mob" required/></td>
</tr>
<tr>
	<td>Email: </td>
	<td><input type="text" name="email" required/></td>
</tr>
<tr>
	<td>Password: </td>
	<td><input type="text" name="password" required/></td>
</tr>
<tr>
	<td>Role: </td>
	<td><select name="role"><option value="admin">Admin</option><option value="manager">Manager</option><option value="user">User</option></select></td>
</tr>
</table>
<input type="submit" name="add" value="Save" />

</form>
<center><br>
<a href="adminhome.php">
Back
</a>

</div>
</center>
</body>
</html>