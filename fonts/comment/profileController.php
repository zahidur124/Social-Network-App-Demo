<?php
	function getFeed($conn){
		
		if ($conn->connect_error) {
	    	die("Connection failed: " . $conn->connect_error);
	    	header('Content-type: application/json');
	    	array_push($error, "connection_error");
   			echo json_encode($error);
	    }
	    
	    $loop = mysqli_query($conn,"SELECT * FROM comments ORDER BY postId DESC") or die (mysqli_error());
		while ($row = mysqli_fetch_array($loop)){
			echo "<br> id: ". $row["commentId"]. " - Name: ". $row["uid"]. " " . $row["message"] . "<br>";


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