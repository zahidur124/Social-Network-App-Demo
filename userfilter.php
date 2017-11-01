<?php

include "connector.php";

				$userid = $_POST['userid'];


				echo "<div class = 'feed-container' id= 'feed_container'><!-- Feed Conatiner-->";


				$loop = mysqli_query($conn,"SELECT p.*, sum(ld.liked) as likes, sum(ld.disliked) as dislikes FROM posts p LEFT JOIN likes_dislikes ld ON p.postId = ld.pId WHERE p.uid = '$userid' GROUP BY p.postid ORDER BY postId DESC") or die (mysqli_error($conn));
		  while ($row = mysqli_fetch_array($loop)){
				$id = $row["postId"];
				$cid = $row["cid"];
				$date = $row["today"];
				$src = $row["src"];
				$likes = $row["likes"];//$row["total_likes"];
				$dislikes = $row["dislikes"];//$row["total_dislikes"];
				$type = $row["type"];
				$comment = $row["comment"];
				$post_admin = $row["uid"];
				$username = $_SESSION['username'];

				/*Comment_count_fetch*/
				$comment_count_sql = mysqli_query($conn, "SELECT COUNT(*) c FROM comments WHERE pid = " . $id . " ");
				$count_fetch = mysqli_fetch_array($comment_count_sql);
				$count = $count_fetch[0];
				/*Comment_count_fetch*/

				/*Post_Admin_Name_Fetch*/
				$post_name_sql = mysqli_query($conn,"SELECT * FROM users WHERE userId = " . $post_admin . " ") or die (mysqli_error());
				$post_name_fetch = mysqli_fetch_array($post_name_sql);
				$user = $post_name_fetch["username"];
				/*Post_Admin_Name_Fetch*/

				echo "<div class = 'feed'>
						<div class = 'media-container'>";

					if($type == "image"){
						echo "<a href='$src' data-rel='lightcase:myCollection:slideshow' >";
						echo "<img src='$src'>";
						echo "</a>";
						echo "</div";
					} else if($type == "video"){
						echo "<a href='$src' data-rel='lightcase:myCollection:slideshow' >";
						echo "<video style = 'width:100%; height:300px' controls autoplay>
								<source src = '$src' type = 'video/mp4'>
							 </video>";
						echo "</a>";
						echo "</div";

					}



				echo "<div class = 'tag-block'>";
				$new_query = mysqli_query($conn,"SELECT * FROM channels WHERE channelId = $cid ") or die (mysqli_error());
				$new_row = mysqli_fetch_array($new_query);
				$count_channels = count($new_row);

				for($i = 0; $i < 1; $i++){
					$channel_name = $new_row["cname"];
					echo "<span><a href='#''><i>$channel_name</i></a></span>";
				}


				echo "</div>";
				echo "<div class = 'comment-block' id='$id'>
						<div id = 'left'>
							<i class = 'fa fa-3x fa-user'></i><br>
							<span>
							 	$user
							</span>
				</div><!--Comment Block End-->

						<div id = 'right'>
							<span>
								$comment
							</span>
						</div><!--Right End-->

				<div id='demo'>
					<button class='btn like like-btn' id='$id'><span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'></span><span class='likes'>$likes</span></button>
					<button class='btn dislike dislike-btn' id='$id'><span class='glyphicon glyphicon-thumbs-down' aria-hidden='true'></span><span class='dislikes'>$dislikes</span></button>
   				<button class='btn comment' id='comment' data-postid='$id'><span class='glyphicon glyphicon-comment' aria-hidden='true'></span><span class='comment-counter'>$count</span></button>
  			</div><!--End Demo-->
  			</div>
  		</div>";
		}

		echo "<script src='feed.js'></script>";






?>
