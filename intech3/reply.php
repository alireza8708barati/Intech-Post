<?php

require('config.php');
$uname = $_GET['username'];
$id = $_GET['id'];
$text = $_POST['text'];
$date = date('Y-m-d');

    $sql = "INSERT INTO reply (username, commentid, text, date)
VALUES ('$uname', '$id', '$text', '$date')";

if ($conn->multi_query($sql) === TRUE) {
    $sql = "UPDATE comment SET reply='0' WHERE id='$id'";

    if($conn->query($sql) === true){
        echo"<script>history.go(-1)</script>";
    } else {
        echo"<br>مشکلی پیش آمده!<br>";
    }
} else {
  echo"مشکلی پیش آمده!";
}


?>