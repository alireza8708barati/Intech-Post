<?php

require('config.php');

$id = $_GET['id'];

$sql = "DELETE FROM comment WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  $sql = "DELETE FROM reply WHERE commentid='$id'";

if ($conn->query($sql) === TRUE) {
  echo"<script>history.go(-1)</script>";
} else {
  echo "مشکلی پیش آمده!";
}
} else {
  echo "مشکلی پیش آمده!";
}

?>