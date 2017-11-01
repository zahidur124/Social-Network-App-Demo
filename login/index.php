<?php

session_start();
?>
<!doctype html>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/index.css">
  <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class = "page-wrapper">

		<div class = "container">
			<header class="header">
			<div class="logo_container">
				<img class = "Spat" src="assets/images/Spat Logo.png">
			</div>

			</header>
			<form action="login.php" method = "post" id="login_form">
				<h5 class = "message" id="message"></h5>
			    <input class="input-user" placeholder="Username" type="text" name="username"><br>
			    <input class="input-pass" placeholder="Password" type="password" name="password"><br>
			    <input class="btn-primary" value="submit" type="submit">
			</form>
		</div>

        <div class="link-wrapper">
		<li class="link"><a href="www.google.com">Forgot your password?</a></li>
		<li class="link"><a href="https://spat.liveapp.ca/register">Create Account</a></li>
		</div>

		<div class="icon_wrapper">
			<a href="www.g"><img class="image" src="assets/images/Facebook-icon.png"></a>
            <a href="www.f"><img class="image" src="assets/images/twitter.png"></a>
        </div>


	</div>
  <!--Javascript imports -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script src="login.js"></script>
</body>
</html>
