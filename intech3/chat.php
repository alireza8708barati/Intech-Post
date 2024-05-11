<?php

require('config.php');

$sender = $_GET['sender'];
$receiver = $_GET['receiver'];
$chat = $_POST['chat'];

$sql = "INSERT INTO chats (sender, receiver, text)
VALUES ('$sender', '$receiver', '$chat')";

if ($conn->multi_query($sql) === TRUE) {
    echo"<script>history.go(-1)</script>";
} else {
    echo"مشکلی پیش آمده";
}

?>