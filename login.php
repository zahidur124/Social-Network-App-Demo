<?php

	// Start the session
	session_start();

	include "connector.php";

	$array = array();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$salt = "";

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
    }
    $loop = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'") or die (mysqli_error());
	$row = mysqli_fetch_array($loop);
	$salt = $row['salt'];
	$decrypted_password = hash("sha256", $password.$salt);
	if($decrypted_password == $row['password']){

		header('Content-type: application/json');
		array_push($array, "success");
		echo json_encode($array);
		$_SESSION['username'] = $row['username'];
		$_SESSION['uid'] = $row['userId'];
		exit();

	}
	else{
		header('Content-type: application/json');
		array_push($array, "error");
		echo json_encode($array);
		exit();

	}

	$conn->close();
?>