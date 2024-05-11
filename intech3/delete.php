<?php

require('config.php');

$id = $_GET['id'];

$sql = "DELETE FROM posts WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo"<script>history.go(-1)</script>";
} else {
  echo "مشکلی پیش آمده!";
}

?>