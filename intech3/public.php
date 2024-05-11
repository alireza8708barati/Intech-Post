<?php

require('config.php');

$uname = $_GET['username'];

$sql = "UPDATE users SET privateaccount='0' WHERE username='$uname'";

if($conn->query($sql) === true){
    echo"<script>history.go(-1)</script>";
} else {
    echo"مشکلی پیش آمده!";
}

?>