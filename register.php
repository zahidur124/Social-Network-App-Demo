<?php

	include "connector.php";

	function generateSalt(){
		$alpha = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";
		$length = strlen($alpha);
		$salt = "";
		for($i = 0; $i < 32; $i++){
			$rand = rand(0, $length);
			$salt .= $alpha[$rand];

		}
		return $salt;
	}
	function isMatch($first, $second){

		if($first === $second){
			return true;
		}
		return false;
	}
	function isEmail($email){

		//$validate = test_input($email);
		if (empty($email)){
			return false;
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		 	return false;
		}
		return true;

	}
	function all_input_filled($username, $email, $password, $name, $confirm){

		if(empty($username) && empty($email) && empty($password) && empty($name) && empty($confirm)){

			return false;
		}
		return true;
	}

	$error = array();
	$success = array();
	$username = $_POST['username'];           //$_POST['username'];
	$email = $_POST['email'] ;  //$_POST['email'];
	$password = $_POST['password'];        //$_POST['password'];
	$name = $_POST['name'];            //$_POST['name'];
	$salt = generateSalt();
	$confirm = $_POST['confirm'];         //$_POST['confirm'];
	$favteam = $_POST['teamselect'];
	$favsport = $_POST['sportselect'];
	$point = 0;
	$encrypted_password = hash("sha256", $password . $salt);
	if(!all_input_filled($username, $email, $password, $name, $confirm)){
		array_push($error,"empty_error" );
	}
	if(!isMatch($password, $confirm)){
		array_push($error, "password_error");
	}
	if (!isEmail($email)){
		array_push($error, "email_error");
	}

	//Check if there were any errors during the process if not then connect to database
	if(count($error) > 0){
		header('Content-type: application/json');
		echo json_encode($error);
		exit();
	}else{
		//check if connection is established
		if ($conn->connect_error) {
	    	die("Connection failed: " . $conn->connect_error);
	    	header('Content-type: application/json');
	    	array_push($error, "connection_error");
   			echo json_encode($error);
	    }

	    else{
	    	//check if the user name is connected if connection established
	    	$loop = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'")or die (mysqli_error());
			$row = mysqli_fetch_array($loop);
			//if the username exists then send an error
			if(!empty($row)){
				header('Content-type: application/json');
	    		array_push($error, "username_exists_error");
	    		echo json_encode($error);
	    		exit();
	    	//otherwise insert the new data into the mysql table, users
			}

			else{
				$sql = "INSERT INTO users (username, email, password, salt, name, points,favteam,favsport) VALUES ('$username', '$email', '$encrypted_password', '$salt', '$name', $point, '$favteam','$favsport')";

					if ($conn->query($sql) === TRUE) {
						header('Content-type: application/json');
						array_push($error, "success");
						echo json_encode($error);
						exit();
					} else {
						header('Content-type: application/json');
	    				array_push($error, 'connection_error');
	    				echo json_encode($error);
	    				exit();
					}


				}

			}
	    }

	$conn->close();
?>
