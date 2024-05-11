<?php

require('config.php');
$uname = $_GET['username'];
$id = $_GET['id'];
$text = $_POST['text'];
$date = date('Y-m-d');

$sql = "SELECT * FROM users WHERE username='$uname'";
$result = $conn->query($sql);

if ($result->num_rows>0){
    
while($row = $result->fetch_assoc()) {
    $profile = $row['profile'];
    $sql = "INSERT INTO comment (username, postid, text, date, reply)
VALUES ('$uname', '$id', '$text', '$date', '1')";

if ($conn->multi_query($sql) === TRUE) {
  echo"<script>history.go(-1)</script>";
} else {
  echo"مشکلی پیش آمده!";
}
}
}
?>