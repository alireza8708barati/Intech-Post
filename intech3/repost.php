<?php

require('config.php');
$uname = $_GET['username'];
$postid = $_GET['id'];
$date = date("Y-m-d");

$sql = "SELECT * FROM users WHERE username='$uname'";
        $result = $conn->query($sql);

        if ($result->num_rows>0){
            
        while($row = $result->fetch_assoc()) {

$sql = "INSERT INTO posts (username, name, text, date, profile, category, file, numlike, postid, repost) VALUES ('$uname', '".$row['name']."', null, '$date', null, null, null, null, '$postid', '1')";

if ($conn->multi_query($sql) === TRUE) {
    echo"<script>history.go(-1)</script>";
    } else {
      echo'مشکلی پیش آمده';
    }

}
        }

?>