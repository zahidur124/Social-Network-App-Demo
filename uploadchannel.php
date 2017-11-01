<?php
session_start();
include "connector.php";

$channelname = $_POST['channelname'];
$permission = $_POST['permission'];
$uid = $_SESSION['uid'];
//$uid = 3;



mysqli_query($conn,"INSERT INTO channels (userID,cname,permission) VALUES ('$uid', '$channelname', '$permission')") or die (mysqli_error($conn));
echo "<script language='javascript'>\n";
				 echo "window.location.href='https://spat.liveapp.ca/';";
			 echo "</script>\n";

$conn->close();

?>
