<?php
  if ($_POST["submit"]) {



    if (!$_POST["name"]) {
      $error="<br />Please enter your name";
    }

    if (!$_POST["email"]) {
      $error.="<br />Please enter your email address";
    }

    if (!$_POST["enquiry"]) {
      $error.="<br />Please enter your enquiry";
    }

    if ($_POST["email"]!="" AND !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $error.="<br />Please enter a valid email address";
}
    if ($error) {
      $result='<div class="alert alert-danger"><strong>There were error(s)in your form:</strong>'.$error."</div>";
    } else {
      if (mail("carl@specialistmetalworkskills.com", "New Enquiry!", "Name: ".$_POST['name']."
      Email: ".$_POST["email"]."
      Enquiry: ".$_POST["enquiry"])) {
      $result='<div class="alert alert-success"><strong>Thank you. I will be in touch</strong></div>';
    } else {
      $result='<div class="alert alert-danger"><strong>Sorry there was an error sending your message please try again later</strong></div>';
    }
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Email Sent By PHP</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>
  <style>
  .emailForm {
    border:1px solid grey;
    border-radius: 10px;
    margin-top:20px;
  }

  form {
    padding-bottom: 10px;
  }

  textarea {
    height:120px;
  }
  </style>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 emailForm">
      <h1>My First PHP Contact Form</h1>
      <?php echo $result; ?>
      <p class="lead">Please get in touch. I will reply as soon as possible.</p>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $_POST["name"]; ?>"/>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Your Email" value='<?php echo $_POST["email"]; ?>'/>
        </div>

        <div class="form-group">
          <label for="enquiry">How can we help you?</label>
          <textarea class="form-control" name="enquiry"><?php echo $_POST["enquiry"]; ?></textarea>
        </div>

        <input name="submit" type="submit" class="btn btn-success" value="Submit"/>

      </form>
    </div>
  </div>
    </div>

      <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  </body>
</html>
