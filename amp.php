
<!doctype html>

<html>
<head>
     <title>amp php</title>



</head>
<style>
</style>
     <body>
       <?php
         session_start();
         if(!empty($_SESSION["username"]))
         {
           echo 'Hello '. $_SESSION["username"];
         }
         else
         {
           header("location:index.php");
         }

       ?>

       <br/><button type="submit" formaction="index.php">Logout</button>

       <hr/>
       <a href="user_info.php"><u><b>User Info</b></u></a>
       <br/> <br/>
       <a href="loginfo.php"><u><b>Login Info</b></u></a>


	 </form>

	 </body>



<?php


function dataFilter($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


</html>
