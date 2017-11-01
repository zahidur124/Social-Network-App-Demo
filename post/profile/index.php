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

	<nav class="navbar navbar-inverse "><!--Navbar Start-->
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
        			<div class="add-content">
  						<button onclick="window.location.href='https://spat.liveapp.ca/post/'" class="btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></button>
				   	</div><!--End Dropdown container-->
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

<div class="jumbotron jumbotron-fluid">
  		<div class="container">
				
			
  				<div class="image-container">
		  		<img src="images/profile-pic.jpg">
		  		<figcaption>CoachSteve</figcaption>
		  		</div>

		  		<div class="text-container">
		  			<p> Hockey coach, player, and all round sports fan. My dog is named Wrigley... BUT GO JAYS!</p>

		  			<a href="#">Maple Leafs</a>
		  			<a href="#">Blue Jays</a>

		  			<p>London, ON</p>
		  		</div><!--End Text Container-->

		  	</div><!--Container End-->
	</div><!--End Jumbotron-->


	<div class="container body-container">

		<div class="btn-group btn-group-justified" role="group" aria-label="...">
			  <div class="btn-group" role="group">
			    <button type="button" class="btn ">My Feed</button>
			  </div>
			  <div class="btn-group" role="group">
			    <button type="button" class="btn ">Activity</button>
			  </div>
			  <div class="btn-group" role="group">
			    <button type="button" class="btn ">Channels</button>
			  </div>
			  <div class="btn-group" role="group">
			    <button type="button" class="btn ">Trophies</button>
			  </div>
		</div><!--End Button Group-->

		<div class = "feed-container"><!-- Feed Conatiner-->

			<?php 
				include "controller/connector.php";
				include "controller/profileController.php";
				
				getFeed($conn);
				

			?>
			
			




			</div><!--End Feed Container-->
			

	</div><!--End Body Container-->
	</div>

	<footer class="footer">
		<ul class="nav nav-pills">
  			<li><a href="#"><img src="images/home.png"/><p>Home</p></a></li>
  			<li><a href="#"><img src="images/profile.png"/><p>Profile</p></a></li>
  			<li><a href="#"><img src="images/alert.png"/><p>Alerts</p></a></li>
  			<li><a href="#"><img src="images/search.png"/><p>Search</p></a></li>
  			
		</ul>
	</footer><!--End Footer-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<script src="js/like-dislike.js"></script> 
<script>
$('#demo').likeDislike({
        click: function (btnType, likes, dislikes, event) {
            var likesElem = $(this).find('.likes');
            var dislikedsElem = $(this).find('.dislikes');
            likesElem.text(parseInt(likesElem.text()) + likes);
            dislikedsElem.text(parseInt(dislikedsElem.text()) + dislikes);
        }
    });
</script>

  </body>

</html>