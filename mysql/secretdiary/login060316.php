<?php

  session_start();

  include("connection.php");

  if ($_POST["submit"]=="Sign Up") {

    if (!$_POST["email"]) $error.="<br />Please enter your email";

    else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) $error.="<br />Please enter a valid email";

    if (!$_POST["password"]) $error.="<br />Please enter your password";

    else {

      if (strlen($_POST["password"])<8) $error.="<br />Password needs to be at least 8 characters long";

      if(!preg_match('/[A-Z]/', $_POST['password'])) $error.= "<br />Please include min 1 capital letter";

    }

  if ($error) echo "<br />There were error(s) in your sign up details".$error;

  else {


  $query = "SELECT * FROM `users` WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";

  $result=mysqli_query($link, $query);

  $results = mysqli_num_rows($result);


 if ($results) echo "That email address is already registered. Do you want to log in?";

      else {

        $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."')";

        mysqli_query($link, $query);

        echo "You've been signed up";

          $_SESSION["id"]=mysqli_insert_id($link);

          print_r($_SESSION);

          //Redirect to log in page

          }

        }

      }


 ?>
