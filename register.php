<!DOCTYPE html>
	<html>
		<head>
		<title>Register</title>
		</head>

		<body>

			<h1 style="text-align:center;"> REGISTER </h1>

			<hr/>

			<br/><br/>

			<form style="text-align:center;" method="POST"; action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


				<br/><br/>

				Username:
				<input type="text" name="username"><br/><br/>
				Password:
				<input type="password" name="password"><br/><br/>
				Confirm Password:
				<input type="password" name="confirmPass"><br/><br/>
				Email:
				<input type="text" name="email"><br/><br/>
				Phone:
				<input type="text" name="phone"><br/><br/>
				Full Name:
				<input type="text" name="fullName"><br/><br/>


				<br/><br/>
				<button type="reset">Reset</button>
				<button type="submit">Submit</button>


			</form>
      <?php

        session_start();
        session_unset();

        $errorlist =array("nameErr" => "Name is required.<br/>", "nameFormatErr" => "Name should only Contain characterts.<br/>","emailErr" => "Email is required","emailformatErr" => "Invalid email format.<br/>","passwordErr" => "Password required.<br/>","confPasswordErr" => "Input the password again.<br/>","passwordMatchErr" => "Password doesn't match.<br/>","phoneErr" => "Phone Number is required.<br/>","invalidPhn" => "Invalid format of phone number.<br/>","fullNameErr" => "Input Your Full name.<br/>");

        $success=0;
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {

            if (empty($_POST["username"]))
            {
              echo $errorlist["nameErr"];
            }
            else
            {
              if(!preg_match("/^[a-zA-Z ]*$/",$_POST["username"]))
              {
              echo $errorlist["nameFormatErr"];
              }
              else
              {
                $_SESSION["username"] = dataFilter($_POST["username"]);
                $success++;
              }
            }


            if (empty($_POST["password"]))
            {
              echo $errorlist["passwordErr"];
            }
            else
            {
              $_SESSION["password"] = dataFilter($_POST["password"]);
              $success++;
            }

            if (empty($_POST["confirmPass"]))
            {
              echo $errorlist["confPasswordErr"];
            }
            else
            {
              if($_POST["confirmPass"]==$_POST["password"])
              {
                $_SESSION["confirmPass"] = dataFilter($_POST["confirmPass"]);
                $success++;
              }

              else
              {
                echo $errorlist["passwordMatchErr"];
              }

            }

            if (empty($_POST["email"]))
            {
              echo $errorlist["emailErr"];
            }
            else
            {
              if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
              {
              echo $errorlist["emailformatErr"];
            }
            else
            {
              $_SESSION["email"] = dataFilter($_POST["email"]);
              $success++;
            }

            }

            if (empty($_POST["phone"]))
            {
              echo $errorlist["phoneErr"];
            }
            else
            {
              $phoneNum=$_POST["phone"];
            if(strlen($phoneNum)==11 || strlen($phoneNum)==12)
            {
                if(!preg_match("/^([0-9]{1,5})[-\. ]?([0-9]{6})$/",$phoneNum))
                {
                  echo $errorlist["invalidPhn"];
                }

                else
                {
                $_SESSION["phone"] = dataFilter($_POST["phone"]);
                $success++;
                }
            }


            else
            {
                echo $errorlist["phoneErr"];
            }


            }

            if (empty($_POST["fullName"]))
            {
              echo $errorlist["fullNameErr"];

            }
            else
            {
              if(!preg_match("/^[a-zA-Z ]*$/",$_POST["fullName"]))
              {
              echo $errorlist["nameFormatErr"];
              }
              else
              {
                $_SESSION["fullName"] = dataFilter($_POST["fullName"]);
                $success++;
              }
            }
            print_r($_SESSION);

            if($success==6)
            {
              header("location:index.php");
            }
            else
              $success=0;

        }

        function dataFilter($data)
        {
          $data = trim($data);
          $data = stripcslashes($data);
          $data = htmlspecialchars($data);

          return $data;
        }

      ?>

    </body>

</html>
