<?php

require('config.php');

$uname = $_GET['uname'];
$new = $_POST['new'];

$sql = "UPDATE users SET name='$new' WHERE username='$uname'";

if($conn->query($sql) === true){
    echo"<script>history.go(-1)</script>";
} else {
    echo"مشکلی پیش آمده!";
}

$sql1 = "UPDATE posts SET name='$new' WHERE username='$uname'";

if($conn->query($sql1) === true){
    echo"";
} else {
    echo"مشکلی پیش آمده!";
}

?>