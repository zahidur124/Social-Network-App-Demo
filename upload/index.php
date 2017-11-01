<?php session_start()


?>
<!DOCType html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="fonts/css/font-awesome.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse ">
                <!--Navbar Start-->
                <div class="container-fluid">
                    <div class="navbar-header">
                        <!--Logo&&Button-->
                        <div class="button-group">
                            <!--Button Container-->
                            <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!--Button Container End-->
                        <div class="add_container">
                            <div class="add-content">
                                <button onclick="window.location.href='https://spat.liveapp.ca/post/'" class="btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></button>
                            </div>
                            <!--End Dropdown container-->
                        </div>
                        <!--End add_container Container-->
                        <div class="Logo-container">
                            <!--Logo Container-->
                            <p class="navbar-text">Channel Name</p>
                        </div>
                        <!--Logo Container End-->
                    </div>
                    <!--Logo&&Button End-->
                    <div class="collapse navbar-collapse" id="mainNavBar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active">
                                <a href="#">My Profile</a>
                            </li>
                            <li class="active">
                                <a href="#">Settings</a>
                            </li>
                        </ul>
                    </div>
                    <!--Menu Items End-->
                </div>
                <!--Fluid Container End-->
            </nav>
            <!--Navbar End-->


		<div class="container main-feed">

			<div class='upload-option row'>
						<button id ='photo_show' class='btn btn-default' type='button' name='button'>PHOTO</button>
						<button id ='video_show' class='btn btn-default' type='button' name='button'>VIDEO</button>
						<button id ='audio_show' class='btn btn-default' type='button' name='button'>AUDIO</button>
				</div>

			<?php
				$user = $_SESSION['uid'];
				include "record_post.php";
			?>

		</div>
		<footer class="footer">
                <!--footer -->
                <ul class="nav nav-pills">
                    <li>
                        <a href="#">
                    <img src="images/home.png">
                    <p>Home</p>
                </a>
                    </li>
                    <li>
                        <a href="#">
                    <img src="images/profile.png">
                    <p>Profile</p>
                </a>
                    </li>
                    <li>
                        <a href="#">
                    <img src="images/alert.png">
                    <p>Alerts</p>
                </a>
                    </li>
                    <li>
                        <a href="#">
                    <img src="images/search.png">
                    <p>Search</p>
                </a>
                    </li>
                </ul>
      </footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src="js/RecordRTC.js"></script>
		<script src="js/isMobile.js"></script>
		<script src="js/p5.js"></script>
		<script src="js/app.js"></script>
		<script src="images.js"></script>
		<script src="jscolor.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$("#photo_show").click(function(){
				$("#uploadImage").show();
				$("#photo_show").hide();
				$("#video_show").hide();
				$("#audio_show").hide();
			});

			$("#video_show").click(function(){
				$("#uploadVideo").show();
				$("#photo_show").hide();
				$("#video_show").hide();
				$("#audio_show").hide();
			});

			$("#audio_show").click(function(){
				$("#uploadAudio").show();
				$("#photo_show").hide();
				$("#video_show").hide();
				$("#audio_show").hide();
			});

		});
		</script>
	</body>
</html>
