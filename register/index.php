<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="register.css">
  <title>Register</title>

</head>

<body>
	<div class="page-wrapper">
		<div class="container">

			<header class="header">
			<div class="logo_container">
				<img class = "Spat" src="images/Spat Logo.png">
			</div>
			</header>

			<form class = "form-contain" action="register.php" method="POST" id="register-form">

        <div id="firstsection"><!--First Section-->
				<div class = "overlay" style="rgba(0, 0, 0, 0.5);"><h5 class = "message" id="message"></h5></div>
				<div class="form-group">
					<label for="name" class="control">Your Name</label>
					<div class="input-container">
						<input class = "form-control" type="text" name="name" id="name" placeholder="Enter Your Name"/>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control">Your Email</label>
					<div class="input-container">
						<input class = "form-control" type="text" name="email" id="email" placeholder="Enter Your Email"/>
					</div>
				</div>

				<div class="form-group">
					<label for="username" class="control">Your Username</label>
					<div class="input-container">
						<input class = "form-control" type="text" name="username" id="username" placeholder="Enter Your Username"/>
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="control">Your Password</label>
					<div class="input-container">
						<input class = "form-control" type="password" name="password" id="password" placeholder="Enter Your Password"/>
					</div>
				</div>

				<div class="form-group">
					<label for="confirm" class="control">Confirm Password</label>
					<div class="input-container">
						<input class = "form-control" type="password" name="confirm" id="confirm" placeholder="Confirm your Password"/>
					</div>
				</div>

        <button type="button" class="btn btn-primary btn-lg" name="button" id="opensecond">Next</button>

      </div><!--End First Section-->

      <div id="sportsection">
        <div class="form-group">
          <label for="sportselect">Favorite Sport</label>
             <select multiple class="form-control" id="sportselect" name = "sportselect">
               <?php


                include "fetchsport.php";


                ?>
             </select>
        </div>

        <button type="button" class="btn btn-primary btn-lg" name="button" id="openthird">Next</button>

      </div><!--End Second Section-->

        <div id ="teamsection">


        <div class="form-group">
          <label for="teamselect">Favorite Team</label>
             <select multiple class="form-control" id="teamselect" name = "teamselect">



             </select>
        </div>



				<div class="form-group">
					<button class="btn btn-primary btn-lg btn-block login-button" type="submit">Register</button>
				</div>

        </div><!--End Third Section-->

			</form>

		</div>

	</div>
	<!--Javascript imports -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script src="register.js"></script>
  <script type="text/javascript">
        // Return an array of the selected opion values
      // select is an HTML select element
        function getSelectValues(select) {
        var result = [];
        var options = select && select.options;
        var opt;

        for (var i=0, iLen=options.length; i<iLen; i++) {
          opt = options[i];

          if (opt.selected) {
            result.push(opt.value || opt.text);
          }
        }
        return result;
        }
  </script>
  <script type="text/javascript">
        $(document).ready(function(){

        $("#opensecond").click(function(){
          $("#firstsection").hide();
          $("#sportsection").show();
        });

        $("#openthird").click(function(e){
          $("#sportsection").hide();
           $("#teamsection").show();
          var sport = $('#sportselect').val();
          var temp = JSON.stringify(sport);
          sportdata = {'sport' : temp};

          $.post('fetchteam.php',sportdata, function(data){
            $("#teamselect").html(data);
				});
      });

    });
  </script>
</body>

</html>
