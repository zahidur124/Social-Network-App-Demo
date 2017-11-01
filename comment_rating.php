<?php

session_start();
/*Connect to Database*/

$servername = "mysql.liveapp.ca";
$username = "spatlive";
$password = "Spat56&*";
$dbname = "spat";
$conn = new mysqli($servername, $username, $password, $dbname);

$cid = $_POST['cid'];
$type = $_POST['type'];
$uid = $_SESSION['uid'];


##################################Comment Points######################################
$points = 0;

if($type == 'upvote') {
  $points = 1;
} else {
  $points = 0;
}

$points_sql = <<<EOT
    INSERT INTO comments_points (uid,cid,points)
    VALUES ($uid,$cid,$points)
    ON DUPLICATE KEY UPDATE points = $points
EOT;
mysqli_query($conn,$points_sql)or die (mysqli_error($conn));
##################################Comment Points######################################

##################################Comment Point Fetch###################################
$comment_point_fetch_sql = mysqli_query($conn, "SELECT * FROM comments_points WHERE uid =".$uid." AND cid =".$cid."   ") or die (mysqli_error($conn));
$comment_point_fetch_array = mysqli_fetch_array($comment_point_fetch_sql);
$comment_point = $comment_point_fetch_array['point'];
##################################Comment Point Fetch###################################

################################Previous Point Fetch####################################
$user_point_fetch_sql = mysqli_query($conn, "SELECT * FROM users WHERE userId =".$uid." ") or die (mysqli_error($conn));
$user_point_fetch_array = mysqli_fetch_array($user_point_fetch_sql);
$prev_user_point = $user_point_fetch_array['points'];
################################Previous Point Fetch####################################


##################################User Point Update###################################
$total = $prev_user_point + $points;
mysqli_query($conn, "UPDATE users SET points = $total WHERE userId =".$uid." ") or die (mysqli_error($conn));
##################################User Point Update###################################



##################################Like/Dislike#########################################
$up = 0;
$down = 0;

if($type == 'upvote') {
  $up = 1;
} else {
  $down = 1;
}

$sql = <<<EOT
  INSERT INTO comments_likes (uid, cid, liked, disliked)
  VALUES ($uid, $cid, $up, $down)
  ON DUPLICATE KEY UPDATE liked=$up, disliked=$down
EOT;
mysqli_query($conn, $sql);
##################################Like/Dislike#########################################

$counts_sql = mysqli_query($conn,"SELECT sum(ld.liked) as likes, sum(ld.disliked) as dislikes FROM comments c LEFT JOIN comments_likes ld ON c.commentId = ld.cid WHERE c.commentId = $cid GROUP BY c.commentId") or die (mysqli_error($conn));
$counts = mysqli_fetch_array($counts_sql);
echo json_encode($counts);

?>
