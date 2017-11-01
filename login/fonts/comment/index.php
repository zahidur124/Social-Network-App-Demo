<?php session_start(); ?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="fa/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="profile.css">
</head>

<body>

	<nav class="navbar navbar-inverse"><!--Navbar Start-->
		<div class="container-fluid">

				<div class="navbar-header"><!--Logo&&Button-->
				
					
					<div class="button-group"><!--Button Container-->
					<button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse">
          				<span class="icon-bar"></span>
          				<span class="icon-bar"></span>
          				<span class="icon-bar"></span>
        				</button>
        			</div><!--Button Container End-->

        			<div class ="add_container">
            			<img class = "icon" src="images/icon.png">
          			</div><!--End add_container Container-->


					<div class="Logo-container"><!--Logo Container-->
						<p class="navbar-text">Profile</p>
					</div><!--Logo Container End-->

				</div><!--Logo&&Button End-->

				<div class="collapse navbar-collapse" id="mainNavBar">
					<ul class="nav navbar-nav navbar-right">
          			<li class="active"><a href="#">My Profile</a></li>
          			<li class="active"><a href="#">Settings</a></li>
        			</ul>
        		</div><!--Menu Items End-->
						
		</div><!--Fluid Container End-->
		
	</nav><!--Navbar End-->

	<div class="container body-container">
		
		<div class="btn-group"><!--Toggles to swtich between pages-->
  			<button type="button" class="btn">My Feed</button>
  			<button type="button" class="btn">Activity</button>
  			<button type="button" class="btn">Channel</button>
  			<button type="button" class="btn">Trophies</button>
		</div><!--Toggles to swtich between pages-->
		
		<div class = "feed-container">
			<?php 
				include "connector.php";
				include "profileController.php";
				
				getFeed($conn);
				

			?>
				
			</div>

		</div>
	</div>

	<footer class="footer">
		
		<ul id="footerlist">
    	<li><a href="#"><img src="images/home.png"></img></a></li>
    	<li><a href="#"><img src="images/profile.png"></img></a></li>
    	<li><a href="#"><img src="images/alert.png"></img></a></li>
    	<li><a href="#"><img src="images/search.png"></img></a></li>
		</ul>

		</div><!--Toggles to swtich between pages-->

     
    </footer>




 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>