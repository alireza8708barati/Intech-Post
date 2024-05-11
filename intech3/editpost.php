<?php

require('config.php');

$id = $_GET['id'];
$new = $_POST['new'];

$sql = "UPDATE posts SET text='$new' WHERE id='$id'";

if($conn->query($sql) === true){
    echo"<script>history.go(-2)</script>";
} else {
    echo"مشکلی پیش آمده!";
}

?>