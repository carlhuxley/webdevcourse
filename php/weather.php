
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Local Weather Forecaster</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>
  <style>
    html, body {
      height: 100%;
    }

    .container {
      background-image: url("background.jpg");
      background-size: cover;
      background-position: center;
      height: 100%;
      width: 100%;
      padding-top: 100px;
    }

    .center {
      text-align: center;
    }

    .white {
      color: white;
    }

    p {
      padding-top: 15px;
      padding-bottom: 15px;
    }

    button {
      margin-top: 20px;

    }

    .alert {
        margin-top: 20px;
        display: none;
    }
  </style>
  <body>
    <div class="container">

      <div class="row">

        <div class="col-md-6 col-md-offset-3 center">

          <h1 class="center white">Local Weather Forecaster</h1>
          <p class="lead center white">Enter your city to find out your local weather</p>

            <form>
              <div class="form-group">
                <input class="form-control" type="text" name="city" id="city" placeholder="eg London, Paris, New York"/>
              </div>
              <div class="form-group">
                <button id="findMyWeather" class="btn btn-success btn-lg">Find My Weather</button>
              </div>
          </form>
          <div id="success" class="alert alert-success">Success!</div>
          <div id="fail" class="alert alert-danger">Could not find weather data for that city. Please try again</div>
          <div id="noCity" class="alert alert-danger">Please enter the name of a city</div>
        </div>

      </div>
    </div>

      <!-- Latest compiled and minified JavaScript -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script>
   $("#findMyWeather").click( function(event) {
     event.preventDefault();
     $(".alert").hide();
     if ($("#city").val() !="") {
     $.get("scraper.php?city="+$("#city").val(), function(data) {


       if (data==""){
        $("#fail").fadeIn();

      } else {
        $("#success").html(data).fadeIn();

      }
     });

   } else {
     $("#noCity").fadeIn();
   }
   });

  </script>
  </body>
</html>
