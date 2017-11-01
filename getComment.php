<?php
include "controller/connector.php";
include "controller/commentController.php";

$comments = getFeed($conn, $_GET['postid']);
$val = $_GET['postid'];
?>

		<button type="button" id= "close" class="btn btn-default">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		</button>


	<div id="body">
		<div class="row"><!--Row Start-->

<?php
				foreach($comments as $comment) {
					?><div class='clearfix col-sm-8'><!--Comment Start-->

					<div class='user'>

					<div class='image-container'>
				  		<img src='images/profile-pic.jpg'>
				  	</div>

				  		<div class='text-container'>
							<a href='#''><b><?php echo $comment['username']; ?></b></a>

				  			<p><?php echo $comment['comment']; ?></p>
								<?php $id = $comment['id']; ?>

				  			<div class='post-controls'>
									<button class='btn like cmnt-like-btn' id='<?php echo $id; ?>'><span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'></span><span class='cmnt-likes'><?php echo $comment['likes']; ?></span></button>
									<button class='btn dislike cmnt-dislike-btn' id='<?php echo $id; ?>'><span class='glyphicon glyphicon-thumbs-down' aria-hidden='true'></span><span class='cmnt-dislikes'><?php echo $comment['dislikes']; ?></span></button>
				  			</div>

				  		</div><!--End Text Container-->
				  	</div><!--End User Container-->
					</div><!--End clearfix col-sm-8--><!--End Comment--><?php
				}
			?>

		</div><!--Row End-->
	</div><!--Body End-->

	<div id ="footer">
		<form id="create-comment-form" action="createComment.php" method="post">
			<input type="text" class ="form-control" id= "comment" name="comment" placeholder="Post your thoughts">
			<input type="hidden" name="postid" id= "postid" value= <?php echo $val; ?> >
		</form>

	</div>

<script>
$('#create-comment-form').on('submit',function(e) {
	e.preventDefault();
	e.stopPropagation();
	$.post('createComment.php', {comment: $('#comment').val(), postid: $('#postid').val()}, function(response) {
		getData($('#postid').val());
	});
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		    $("#close").click(function(){
		        $(".overlay").hide();
		    });
		});
</script>

<script type="text/javascript">
$(document).ready(function(){

		$(".cmnt-like-btn").click(function(e){
			e.preventDefault();
			e.stopPropagation();
			var _this = $(this);
			var unique_id = _this.attr("id");
			var userID = '<?php echo $_SESSION["uid"] ?>'
			post_data = {'cid':unique_id, 'type':'upvote', 'uid':userID};

			$.post('comment_rating.php',post_data, function(data){
					data = JSON.parse(data);
					_this.parent().find('.cmnt-likes').text(data.likes);
					_this.parent().find('.cmnt-dislikes').text(data.dislikes);
				});
		});


		$(".cmnt-dislike-btn").click(function(e){
			e.preventDefault();
			e.stopPropagation();
			var _this = $(this);
			var unique_id = _this.attr("id");
			var userID = '<?php echo $_SESSION["uid"] ?>'
			post_data = {'cid':unique_id, 'type':'downvote', 'uid':userID};

			$.post('comment_rating.php',post_data, function(data){
					data = JSON.parse(data);
					_this.parent().find('.cmnt-likes').text(data.likes);
					_this.parent().find('.cmnt-dislikes').text(data.dislikes);
				});
		});

	});

</script>
