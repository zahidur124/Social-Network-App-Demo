<?php


include "connector.php";

$fetch_team_sql = mysqli_query($conn, "SELECT * FROM channels WHERE type = 'sport' ") or die(mysqli_error($conn));
while($fetch_team_array = mysqli_fetch_array($fetch_team_sql)) {
$name = $fetch_team_array['cname'];

    echo "<option value='$name'>$name</option>";





}



 ?>
