<!DOCTYPE html>
<html>
	<head>
		<title>Login page</title>
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
		<?php
			include_once("db.php");
		?>
					<?php
					if(isset($_POST['submit']))
					{	
					$u=$_POST['userid'];
					$p=$_POST['password'];
					$r=$_POST['user'];
					$query="select uid,password,role,block from user where uid='$u' and password='$p' and role='$r'";
					$result=mysqli_query($con,$query);
					$res=mysqli_fetch_assoc($result);
					$row=mysqli_num_rows($result);
					if($res['block']!=1)
					{
						if($row!=0)
					{
						session_start();
						$_SESSION['usr']=$u;
						$_SESSION['role']=$r;
						if($r=='admin')
						{
							header('location:adminhome.php');
						}	
						elseif($r=='manager')
						{
							header('location:managerhome.php');
						}
						else
						{
							header('location:userhome.php');
						}	
					}	 
					else
				 {
					 echo "login unsuccessfull";
					
				 }
					}
					else
					{
						echo "You are blocked. Contact Admin.";
					
					}
					}
					
			?>
		<center>
		<div class="div1">
		
			<form action="login.php"  method="POST">
			<h3>Login</h3><br>
			<table>
			<tr>
				<td><input type="radio" name="user"  value="admin" checked>Admin</td>
			</tr>
			<tr>
				<td><input type="radio" name="user" value="manager">Manager</td>
			</tr>
			<tr>
				<td><input type="radio" name="user"  value="user" >User</td>
			</tr>
			<tr>	
				<td>User_Id:</td>
				<td><input type="text" name="userid"></input></td>
			</tr>
			<tr>
				<td>Password:</td>
			
				<td><input type="password" name="password"></input></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Login" name="submit"></input></td>
			</tr>

			</table>
			</form>
		</div>
		</center>
		</body>
</html>