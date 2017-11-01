<?php

include "connector.php";

//$sport = $_POST['sport'];

$sport = json_decode(stripslashes($_POST['sport']));


foreach ($sport as $s) {
  $fetch_team_sql = mysqli_query($conn, "SELECT * FROM channels WHERE sport = '$s' ") or die(mysql_error($conn));


  while ($fetch_team_array=mysqli_fetch_array($fetch_team_sql)) {
    $team = $fetch_team_array['cname'];

    echo "<option>$team</option>";


    }
}







 ?>
