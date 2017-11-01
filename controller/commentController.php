<?php
	function getFeed($conn, $pid){

		if ($conn->connect_error) {
	    	die("Connection failed: " . $conn->connect_error);
	    	header('Content-type: application/json');
	    	array_push($error, "connection_error");
   			echo json_encode($error);
	    }

	    $ret = [];

			$sql = <<<EOT
				SELECT *, sum(ld.liked) as likes, sum(ld.disliked) as dislikes FROM comments c
			 	LEFT JOIN users u ON c.uId = u.userId
			 	LEFT JOIN comments_likes ld ON c.commentId = ld.cid
				WHERE c.pid = $pid
				GROUP BY c.commentId
				ORDER BY c.commentId ASC
EOT;
	    $loop = mysqli_query($conn, $sql) or die (mysqli_error($conn));
		while ($row = mysqli_fetch_array($loop)){
			$ret[] = ['id' => $row['commentId'], 'user' => $row['uid'], 'comment' => $row['message'], 'username' => $row['username'], 'likes' => $row['likes'], 'dislikes' => $row['dislikes']];
		}

		return $ret;


	}


	function create($conn,$postid,$comment,$uid){
		//$uid = 3;


	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
    	echo "<br>error";
	}

	else {

		$sql  = "INSERT INTO comments (uid,pid,message) VALUES ($uid, $postid, '$comment')";

		if ($conn->query($sql) === TRUE) {
			 echo mysqli_insert_id($conn);
			/*header( "refresh:3;url=/post.php" );*/
		}

		else {
			echo "<br>Error: " . $sql . "<br>" . $conn->error;
			exit();
		}
	}

}

	function update($id){

	}
	function destroy($id){

	}
	function show($id){

	}




?>
