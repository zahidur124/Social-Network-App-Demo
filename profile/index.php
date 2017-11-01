<?php session_start();

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
	<link rel="stylesheet" type="text/css" href="lightcase.css">
	<link rel="stylesheet" type="text/css" href="profile.css">
</head>

<body>

<div class="profile-page" id = "profile-page">

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
        			</ul>
        		</div><!--Menu Items End-->

		</div><!--Fluid Container End-->

	</nav><!--Navbar End-->


	<div id="add-post-overlay" class="add-post-overlay container"><!--Add-post-overlay-->

		<div class="row">
			<button type="button" onclick="window.location.href='https://spat.liveapp.ca/post/'" class="btn btn-lg">
				Add Post
			</button>

		</div>

		<div class="row">
			<button type="button" class="btn btn-lg">Add Channel</button>

		</div>

	</div><!--Add-post-overlay-->

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

</div><!--End Profile Page-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/like-dislike.js"></script>
<script type="text/javascript" src="js/lightcase.js"></script>
<script type="text/javascript" src="js/jquery.events.touch.js"></script>
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
			$("#add-post-overlay").show();
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

$(document).ready(function() {
		$("#channel_select").submit(function(e){
			e.preventDefault();
			var form = $(this);
			//var form_data = form.serialize();
			var selected = $('select[name="channel_name_select"]').val();
			//var userID = '<?php echo $_SESSION["uid"] ?>'
			post_data = {'channel_id':selected};

			$.post('filter.php',post_data, function(data){
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

  </body>

</html>
