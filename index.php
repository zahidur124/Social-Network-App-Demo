<?php session_start();


if (!isset($_SESSION['uid'])) {
	header('Location: http://spat.liveapp.ca/login');
		 }


/*
		 if (isset($_COOKIE['user']['id'])) {
		 	header('Location: http://spat.liveapp.ca/login');
		 		 }
				 */


?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="fa/css/font-awesome.css">
	<link rel="stylesheet" href="assets/css/index.css">
  	<link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="lightcase.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fonts/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="profile.css">

</head>

<body>


<div class="overlay container"><!--Start Overlay-->

	</div><!--End Overlay-->

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
  						<button class="btn" type="button" id="addcontent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></button>
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
								<li class="active"><a href="#">Login</a></li>
								<li class="active"><a href="#">Logout</a></li>
								<li class="active"><a href="#">Signup</a></li>
        			</ul>
        		</div><!--Menu Items End-->

		</div><!--Fluid Container End-->

	</nav><!--Navbar End-->


	<div id="add-post-overlay" class="add-post-overlay container"><!--Add-post-overlay-->

		<div class="row">
			<button type="button" id="addpost" class="btn btn-lg add-post-btn">
				Add Post
			</button>

		</div>

		<div class="row">
			<button type="button" id="addchannel" class="btn btn-lg add-channel-btn">Add Channel</button>
		</div>

	</div><!--Add-post-overlay-->


		<div class="container uploadpost" id="uploadpost"><!--UploadPost-->

			<div class='upload-option row'>
						<button id ='photo_show' class='btn btn-default' type='button' name='button'>PHOTO</button>
						<button id ='video_show' class='btn btn-default' type='button' name='button'>VIDEO</button>
						<button id ='audio_show' class='btn btn-default' type='button' name='button'>AUDIO</button>
						<button id ='text_show' class='btn btn-default' type='button' name='button'>TEXT</button>
				</div>

			<?php
				$user = $_SESSION['uid'];
				include "record_post.php";
			?>

		</div><!--UploadPost-->



		 <div class="container uploadchannel" id="uploadchannel"><!--UploadChannel-->

			 <form id = "uploadChann" action = "uploadchannel.php" method="post" enctype="multipart/form-data"><!--Form Start-->

			 <div class="add-caption row">
					 <div class="caption-row col-xs-12 col-sm-6 col-md-8">

						 <fieldset class="form-group">
								<label for="channel_name">Channel Name</label>
								<input type="text" name='channelname' class="form-control" id="channel_name" placeholder="Enter Channel Name">
						 </fieldset>

					 </div><!--Caption-row-->


			 </div><!--Add-caption-->

			 <div class="add-comment row">
					 <div class="comment-row col-xs-12 col-sm-6 col-md-8">

						 <fieldset class="form-group">
							 <label for="permission_select">Choose Permission</label>
							 <select name ='permission' class="form-control" id="permission_select">
								 <option>public</option>
								 <option>private</option>
							 </select>
						 </fieldset>


					 </div><!--Comment-row-->

			 </div><!--add-comment-->


			 <div class="Continue row"><!--Continue Row-->

					 <div class="continue-column col-xs-12 col-sm-6 col-md-8"><!--Continue column-->
						 <input type="submit" class="btn btn-md btn-primary" value="Continue">
					 </div><!--Continue column-->

			 </div><!--Continue Row-->

		 </form><!--Form End-->

	 </div><!--Uploadchannel-->



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
  			<li><a href="http://spat.liveapp.ca/" id="homeicon"><img src="images/home.png"/><p>Home</p></a></li>
  			<li><a href="#" id="profileicon"><img src="images/profile.png"/><p>Profile</p></a></li>
  			<li><a href="#"><img src="images/alert.png"/><p>Alerts</p></a></li>
  			<li><a href="#"><img src="images/search.png"/><p>Search</p></a></li>
		</ul>
	</footer><!--End Footer-->
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="login.js"></script>
<script src="js/like-dislike.js"></script>
<script type="text/javascript" src="js/lightcase.js"></script>
<script type="text/javascript" src="js/jquery.events.touch.js"></script>
<script src="js/RecordRTC.js"></script>
<script src="js/isMobile.js"></script>
<script src="js/p5.js"></script>
<script src="js/app.js"></script>
<script src="images.js"></script>
<script src="jscolor.js"></script>
<script>
function getData(postid) {
	$.get('getComment.php?postid=' + postid, function(data) {
    $(".overlay").html(data);
		$(".overlay").show();
	});
   //$(".overlay").show();
}

		$(document).ready(function(){
		    $(".comment").click(function(e){
				getData($(this).data('postid'));
		    });
		    $("#close").click(function(){
		        $(".overlay").hide();
		    });
		});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#addcontent").click(function(){
			$(".body-container").hide();
			$("#uploadpost").show();
			$("#photo_show").show();
			$("#video_show").show();
			$("#audio_show").show();
			$("#text_show").show();
			$("#uploadImage").hide();
			$("#uploadVideo").hide();
			$("#uploadAudio").hide();
			$("#uploadText").hide();
		});

	});

</script>


<script type="text/javascript">
$(document).ready(function(){

		$(".like-btn").click(function(e){
			e.preventDefault();
			e.stopPropagation();
			var _this = $(this);
			var unique_id = _this.attr("id");
			var userID = '<?php echo $_SESSION["uid"] ?>'
			post_data = {'unique_id':unique_id, 'type':'upvote', 'uid':userID};

			$.post('rating.php',post_data, function(data){
					data = JSON.parse(data);
					_this.parent().find('.likes').text(data.likes);
					_this.parent().find('.dislikes').text(data.dislikes);
				});
		});


		$(".dislike-btn").click(function(e){
			e.preventDefault();
			e.stopPropagation();
			var _this = $(this);
			var unique_id = _this.attr("id");
			var userID = '<?php echo $_SESSION["uid"] ?>'
			post_data = {'unique_id':unique_id, 'type':'downvote', 'uid':userID};

			$.post('rating.php',post_data, function(data){
					data = JSON.parse(data);
					_this.parent().find('.likes').text(data.likes);
					_this.parent().find('.dislikes').text(data.dislikes);
				});
		});

	});

</script>


<script type="text/javascript">
$(document).ready(function(){


	$(".channel-btn").click(function(e){
		e.preventDefault();
		e.stopPropagation();
		var _this = $(this);
		var channel_id = _this.attr("id");
		var userID = '<?php echo $_SESSION["uid"] ?>'
		post_data = {'userid':userID, 'channel_id': channel_id};

		$.post('filter.php',post_data, function(data){
				$("#feed_container").html(data);
			});
	});

});


</script>


<script type="text/javascript">

$(document).ready(function() {
		$("#myfeed").click(function(e){
			var userID = '<?php echo $_SESSION["uid"] ?>'
			post_data = {'userid':userID};

			$.post('userfilter.php',post_data, function(data){
					$("#feed_container").html(data);
				});
		});
});

</script>


<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('a[data-rel^=lightcase]').lightcase();
	});
</script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('a[data-rel^=lightcase]').lightcase({
	swipe: true
})
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#photo_show").click(function(){
		$("#uploadImage").show();
		$("#photo_show").hide();
		$("#video_show").hide();
		$("#audio_show").hide();
		$("#text_show").hide();
	});

	$("#video_show").click(function(){
		$("#uploadVideo").show();
		$("#photo_show").hide();
		$("#video_show").hide();
		$("#audio_show").hide();
		$("#text_show").hide();
	});

	$("#audio_show").click(function(){
		$("#uploadAudio").show();
		$("#photo_show").hide();
		$("#video_show").hide();
		$("#audio_show").hide();
		$("#text_show").hide();
	});

	$("#text_show").click(function(){
		$("#uploadText").show();
		$("#photo_show").hide();
		$("#video_show").hide();
		$("#audio_show").hide();
		$("#text_show").hide();
	});

});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#addpost").click(function(){
		$(".body-container").hide();
		$(".add-post-overlay").hide();
		$("#uploadchannel").hide();
		$("#uploadpost").show();
});

	$("#addchannel").click(function(){
		$("#uploadpost").hide();
		$(".body-container").hide();
		$(".add-post-overlay").hide();
		$("#uploadchannel").show();

	});

});

</script>


<script type="text/javascript">

$(document).ready(function() {
		$("#myfeed").click(function(e){
			var userID = '<?php echo $_SESSION["uid"] ?>'
			post_data = {'userid':userID};

			$.post('userfilter.php',post_data, function(data){
					$("#feed_container").html(data);
				});
		});
});

</script>

<script type="text/javascript">

$(document).ready(function() {
		$("#profileicon").click(function(e){
			e.preventDefault();
			e.stopPropagation();
			$(".add-post-overlay").hide();
			$("#uploadpost").hide();
			$("#uploadchannel").hide();
			$(".body-container").show();
			var userID = '<?php echo $_SESSION["uid"] ?>'
			post_data = {'userid':userID};

			$.post('userfilter.php',post_data, function(data){
					$("#feed_container").html(data);
				});
		});
});

</script>


<!--<script type="text/javascript">

$(document).ready(function() {
		$("#homeicon").click(function(e){
			e.preventDefault();
			e.stopPropagation();
			$(".add-post-overlay").hide();
			$(".upload-post").hide();
			$(".upload-channel").hide();
			$(".profile-page").show();


			var userID = '<?php echo $_SESSION["uid"] ?>'
			post_data = {'userid':userID};

			$.post('mainfeed.php',post_data, function(data){
					$("#feed_container").html(data);
				});
		});
});

</script>-->

  </body>

</html>
