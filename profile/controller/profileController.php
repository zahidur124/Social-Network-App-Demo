<?php
	function getFeed($conn){

		if ($conn->connect_error) {
	    	die("Connection failed: " . $conn->connect_error);
	    	header('Content-type: application/json');
	    	array_push($error, "connection_error");
   			echo json_encode($error);
	    }

		$username_main = $_SESSION['username'];

			echo "



				<div class='container body-container'>

				<div class='jumbotron jumbotron-fluid'>
							<div class='container'>


									<div class='image-container'>
									<img src='images/profile-pic.jpg'>
									<figcaption>$username_main</figcaption>
									</div>

									<div class='text-container'>
										<p> Hockey coach, player, and all round sports fan. My dog is named Wrigley... BUT GO JAYS!</p>

										<a href='#'>Maple Leafs</a>
										<a href='#'>Blue Jays</a>

										<p>London, ON</p>
									</div><!--End Text Container-->

								</div><!--Container End-->
					</div><!--End Jumbotron-->

					<div class='btn-group btn-group-justified' role='group' aria-label='...'>
							<div class='btn-group' role='group'>
								<button type='button' class='btn'>My Feed</button>
							</div>
							<div class='btn-group' role='group'>
								<button type='button' class='btn'>Activity</button>
							</div>
							<div class='btn-group' role='group'>
								<button type='button' class='btn'>Channels</button>
							</div>
							<div class='btn-group' role='group'>
								<button type='button' class='btn'>Trophies</button>
							</div>
					</div><!--End Button Group-->";

					echo "<form id= 'channel_select'>
								<div class='form-group channel_selection'>
									<label for='channel_name_select'>Choose Channel</label>
										<select class='form-control' name='channel_name_select'>";

					$channel_sql = mysqli_query($conn, "SELECT * FROM channels") or die(mysqli_error($conn));
					while ($channel = mysqli_fetch_array($channel_sql)) {
						$cname = $channel['cname'];

						echo "<option>$cname</option>";



					}

					echo "</select>
					</div>
					 <button type='submit' class='btn btn-primary'>Filter</button>
					 </form>";

				echo "<div class = 'feed-container' id= 'feed_container'><!-- Feed Conatiner-->";


//	    $loop = mysqli_query($conn,"SELECT * FROM posts ORDER BY postId DESC") or die (mysqli_error());
			$loop = mysqli_query($conn,"SELECT p.*, sum(ld.liked) as likes, sum(ld.disliked) as dislikes FROM posts p LEFT JOIN likes_dislikes ld ON p.postId = ld.pId GROUP BY p.postid ORDER BY postId DESC") or die (mysqli_error());
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


				/*Post_Admin_Name_Fetch*/
				$post_name_sql = mysqli_query($conn,"SELECT * FROM users WHERE userId = " . $post_admin . " ") or die (mysqli_error());
				$post_name_fetch = mysqli_fetch_array($post_name_sql);
				$user = $post_name_fetch["username"];
				/*Post_Admin_Name_Fetch*/


				/*Comment_count_fetch*/
				$comment_count_sql = mysqli_query($conn, "SELECT COUNT(*) c FROM comments WHERE pid = " . $id . " ");
				$count_fetch = mysqli_fetch_array($comment_count_sql);
				$count = $count_fetch[0];
				/*Comment_count_fetch*/

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




	}
	function create(){

	}
	function update($id){

	}
	function destroy($id){

	}
	function show($id){

	}



?>
