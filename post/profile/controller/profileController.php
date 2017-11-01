<?php
	function getFeed($conn){
		
		if ($conn->connect_error) {
	    	die("Connection failed: " . $conn->connect_error);
	    	header('Content-type: application/json');
	    	array_push($error, "connection_error");
   			echo json_encode($error);
	    }
	    
	    $loop = mysqli_query($conn,"SELECT * FROM posts ORDER BY postId DESC") or die (mysqli_error());
		while ($row = mysqli_fetch_array($loop)){
				$id = $row["postId"];
				$cid = $row["cid"];
				$date = $row["today"];
				$src = $row["src"];
				$background = $row["background_color"];
				$font = $row["font_color"];
				$likes = $row["total_likes"];
				$dislikes = $row["total_dislikes"];
				$type = $row["type"];
				$caption = $row["caption"];
				echo "<div class = 'feed' id = '$id'>
						<div class = 'media-container'>";

					if($type == "image"){
						echo "<img src='$src'>
						</div>";
					} else if($type == "video"){
						echo "<video style = 'width:100%; height:300px' controls autoplay> 
								<source src = '$src' type = 'video/mp4'>
							 </video>
						</div>";
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
				echo '<div class = "comment-block">
						<div id = "left">
							<i class = "fa fa-3x fa-user"></i><br>
							<span>
							 	Username
							</span>
				</div><!--Comment Block End-->
						
						<div id = "right">
							<span>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							</span>
						</div><!--Right End-->
				
				<div id="demo">
    				<button class="btn like"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span><span class="likes">0</span></button>
   					<button class="btn dislike"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span><span class="dislikes">0</span></button>
   					<button class="comment"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><span class = "comment">0</span></button>
  				</div><!--End Demo-->
  			</div>
  		</div>';
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