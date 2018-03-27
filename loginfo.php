<!DOCTYPE html>
<html>
	<head>
		<title>Login Info</title>
	</head>
	<body>
		<form>
			<h1 style="text-align:center;"> Login Info </h1>

			<hr/>

			<br/><br/>

			<br/><button type="submit" formaction="index.php">Logout</button>
			<br/><button type="submit" formaction="index.php">Home</button>

			<br/><br/>

			<?php
				session_start();
				if(empty($_SESSION["username"]))
					header("location:index.php");
			?>

			<table cellpadding="10px" border="2px">
				<tr>
				    <th>User Name</th>
				    <th>password</th>
			 	</tr>
			  	<tr>
				    <td><?php echo $_SESSION["username"]?></td>
				    <td><?php echo $_SESSION["password"]?></td>
			  	</tr>
			</table>
		</form>
	</body>
</html>
