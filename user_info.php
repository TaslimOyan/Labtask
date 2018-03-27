<!DOCTYPE html>
	<html>
		<head>
		<title>user Info</title>
		</head>


		<body>
			<form>

				<h1 style="text-align:center;"> USER INFO </h1>

				<hr>

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
					    <th>Full User Name</th>
					    <th>Phone</th>
					    <th>Email</th>
				 	</tr>
				  	<tr>
				  		<td><?php echo $_SESSION["fullName"] ?></td>
					    <td><?php echo $_SESSION["phone"]?></td>
					    <td><?php echo $_SESSION["email"]?></td>
				  	</tr>

				</table>


			</form>

		</body>

</html>
