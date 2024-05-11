<?php

require('config.php');

$uname = $_GET['username'];

$sql = "DELETE FROM users WHERE username='$uname'";

if ($conn->query($sql) === TRUE) {
    $sql = "DELETE FROM posts WHERE username='$uname'";

    if ($conn->query($sql) === TRUE) {
        $sql = "DELETE FROM comment WHERE username='$uname'";

        if ($conn->query($sql) === TRUE) {
            $sql = "DELETE FROM reply WHERE username='$uname'";

            if ($conn->query($sql) === TRUE) {
              echo"<script>history.go(-1)</script>";
            } else {
              echo "مشکلی پیش آمده!";
            }
        } else {
          echo "مشکلی پیش آمده!";
        }
    } else {
      echo "<br>مشکلی پیش آمده!</br>";
    }
} else {
  echo "مشکلی پیش آمده!";
}

?>