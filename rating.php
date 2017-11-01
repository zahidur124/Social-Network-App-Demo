<?php

session_start();
/*Connect to Database*/

$servername = "mysql.liveapp.ca";
$username = "spatlive";
$password = "Spat56&*";
$dbname = "spat";
$conn = new mysqli($servername, $username, $password, $dbname);

$pid = $_POST['unique_id'];
$type = $_POST['type'];
$uid = $_SESSION['uid'];

#######################Post Points#####################################

$points = 0;

if($type == 'upvote') {
  $points = 1;
} else {
  $points = 0;
}

$points_sql = <<<EOT
    INSERT INTO post_points (uid,pid,point)
    VALUES ($uid,$pid,$points)
    ON DUPLICATE KEY UPDATE point = $points
EOT;
mysqli_query($conn,$points_sql)or die (mysqli_error($conn));


#######################Post Points#####################################


##################################Post Point Fetch###################################
$post_point_fetch_sql = mysqli_query($conn, "SELECT * FROM post_points WHERE uid =".$uid." AND pid =".$pid."   ") or die (mysqli_error($conn));
$post_point_fetch_array = mysqli_fetch_array($post_point_fetch_sql);
$post_point = $post_point_fetch_array['point'];
##################################Post Point Fetch###################################

################################Previous Point Fetch####################################
$user_point_fetch_sql = mysqli_query($conn, "SELECT * FROM users WHERE userId =".$uid." ") or die (mysqli_error($conn));
$user_point_fetch_array = mysqli_fetch_array($user_point_fetch_sql);
$prev_user_point = $user_point_fetch_array['points'];
################################Previous Point Fetch####################################

##################################User Point Update###################################
$total = $prev_user_point + $points;
mysqli_query($conn, "UPDATE users SET points = $total WHERE userId =".$uid." ") or die (mysqli_error($conn));
##################################User Point Update###################################


#######################Like/Dislike#####################################
$up = 0;
$down = 0;
if($type == 'upvote') {
  $up = 1;
} else {
  $down = 1;
}

$sql = <<<EOT
  INSERT INTO likes_dislikes (pid, uid, liked, disliked)
  VALUES ($pid, $uid, $up, $down)
  ON DUPLICATE KEY UPDATE liked=$up, disliked=$down
EOT;
mysqli_query($conn, $sql);
#######################Like/Dislike#####################################

$counts_sql = mysqli_query($conn,"SELECT sum(ld.liked) as likes, sum(ld.disliked) as dislikes FROM posts p LEFT JOIN likes_dislikes ld ON p.postId = ld.pId WHERE p.postid = $pid GROUP BY p.postid") or die (mysqli_error($conn));
$counts = mysqli_fetch_array($counts_sql);
echo json_encode($counts);
