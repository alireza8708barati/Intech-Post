<?php

require('config.php');

$uname = $_GET['uname'];
$new = $_POST['new'];

$sql = "UPDATE users SET bio='$new' WHERE username='$uname'";

if($conn->query($sql) === true){
    echo"<script>history.go(-1)</script>";
} else {
    echo"مشکلی پیش آمده!";
}

?>