
<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Postcode Finder</title>

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

    .whitebackground {
      background-color:white;
      padding: 20px;
      border-radius: 15px;
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

        <div class="col-md-6 col-md-offset-3 center whitebackground">

          <h1 class="center">Postcode Finder</h1>

          <p class="lead center">Enter address to find your postcode</p>

            <form>

              <div class="form-group">

                <input class="form-control" type="text" name="address" id="address" placeholder="No. Your Street, Your Town"/>

              </div>

              <div class="form-group">

                <button id="findMyPostcode" class="btn btn-success btn-lg">Find My Postcode</button>

              </div>

          </form>

          <div id="success" class="alert alert-success">Success!</div>

          <div id="fail" class="alert alert-danger">Could not find a postcode for that address. Please try again</div>

          <div id="fail2" class="alert alert-danger">Could not connect to server</div>

        </div>

      </div>

    </div>

      <!-- Latest compiled and minified JavaScript -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

  <script>
   $("#findMyPostcode").click( function(event) {
      var result =0;

      $(".alert").hide();

      event.preventDefault();

    $.ajax({

      type: "GET",

      url:
      "https://maps.googleapis.com/maps/api/geocode/xml?address="+encodeURIComponent($('#address').val())+"&sensor=false&key=AIzaSyBZhLy0sBWk1XTrlgxigExFYhFnv_3nb1Q",

      datatype: "xml",

      success: processXML,

      error: error

    });

    function error(){
      $("#fail2").fadeIn();
    }

    function processXML(xml){

    $(xml).find("address_component").each(function(){

        if($(this).find("type").text()=="postal_code"){

            $("#success").html("The postcode you need is "+$(this).find('long_name').text()).fadeIn();

            result=1;

        }

     });

      if (result==0) {
          $("#fail").fadeIn();
      }

   }

  });

  </script>
  </body>
</html>
