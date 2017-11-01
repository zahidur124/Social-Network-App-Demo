
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



	$(document).ready(function(){
		$("#addcontent").click(function(){
			$("#add-post-overlay").show();
		});

	});






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



	$(document).ready(function() {
			$("#myfeed").click(function(e){
				var userID = '<?php echo $_SESSION["uid"] ?>'
				post_data = {'userid':userID};

				$.post('userfilter.php',post_data, function(data){
						$("#feed_container").html(data);
					});
			});
	});





	jQuery(document).ready(function($) {
		$('a[data-rel^=lightcase]').lightcase();
	});

	jQuery(document).ready(function($) {
		$('a[data-rel^=lightcase]').lightcase({
	swipe: true
});
});
