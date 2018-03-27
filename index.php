<!doctype html>

<html>
<head>
     <title>index php</title>



</head>
<style>
</style>
     <body>
	 <h2>Login</h2>
	 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	 Uname: <input type="text" name="username" <?echo $error['Emp']?><br/><br/>

	 pass : <input type="text" name="password" <?echo $error['Emp']?><br/><br/>

	 <input type ="submit" name="submit"><br/><br/>
	 <input type ="submit" value="Register" formaction="register.php"><br/>
	 </form>

	 </body>



	 <?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(!empty($_POST["username"]))
  {
    $name = dataFilter($_POST["username"]);
    $passWord = dataFilter($_POST["password"]);


    if(preg_match("/^[a-zA-Z ]*$/",$name))
    {
      if(isset($_SESSION["username"]) && isset($_SESSION["password"]))
      {
        if($name==$_SESSION["username"] && $passWord==$_SESSION["password"])
        {
          header("location:amp.php");
        }
        else
        {
          echo "use name or pass wrong";
        }
      }
      else
      {
        echo "use name or pass wrong";
      }
      }

      else
      {
        echo "user name should conltain only letters";
      }
  }

  if(empty($_POST["username"]))
  {
    echo "input user name first.<br/>";
  }

  if(empty($_POST["password"]))
  {
    echo "input password please";
  }

}

function dataFilter($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</html>
