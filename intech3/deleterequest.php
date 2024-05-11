<?php

require('config.php');

$follower = $_GET['follower'];
$followed = $_GET['followed'];

$sql = "DELETE FROM requests WHERE follower='$follower' AND followed='$followed'";

if ($conn->query($sql) === TRUE) {
  echo"<script>history.go(-1)</script>";
} else {
  echo "مشکلی پیش آمده!";
}

?>