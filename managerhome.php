<!DOCTYPE html>
<html>
	<head>
		<title>Demo</title>
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
		<center><div class="div1">
			<h3>Manager Work..</h3>
			<table>
				<tr>
					<td><form action="profinfo.php" method="POST"><input type="submit" value="Profile Information" name="info"></input></form></td>
				</tr>
				
				
				<tr>
					<td><form action="allprof.php" method="POST"><input type="submit" value="View all User" name="view"></input></form></td>
				</tr>
				<tr>
					<td><form action="logout.php" method="POST"><input type="submit" value="Logout"></input></form></td>
				</tr>				
			</table>
		</div></center>
		</body>
</html>		
