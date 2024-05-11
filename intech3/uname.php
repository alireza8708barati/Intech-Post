<?php

require('config.php');

$uname = $_GET['uname'];
$new = $_POST['new'];

$sql1 = "SELECT * FROM users WHERE username='$new'";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    echo "نام کاربری تکراری است";
} else {

$sql = "UPDATE users SET username='$new' WHERE username='$uname'";

if($conn->query($sql) === true){
    $sql2 = "UPDATE posts SET username='$new' WHERE username='$uname'";

if($conn->query($sql2) === true){
    $sql2 = "UPDATE comment SET username='$new' WHERE username='$uname'";

if($conn->query($sql2) === true){
    $sql2 = "UPDATE reply SET username='$new' WHERE username='$uname'";

if($conn->query($sql2) === true){
    $sql2 = "UPDATE follower SET follower='$new' WHERE follower='$uname'";

if($conn->query($sql2) === true){
    $sql2 = "UPDATE `num-like` SET username='$new' WHERE username='$uname'";

if($conn->query($sql2) === true){
    $sql2 = "UPDATE follower SET followed='$new' WHERE followed='$uname'";

if($conn->query($sql2) === true){
    $sql2 = "UPDATE requests SET follower='$new' WHERE follower='$uname'";

if($conn->query($sql2) === true){
    $sql2 = "UPDATE requests SET followed='$new' WHERE followed='$uname'";

if($conn->query($sql2) === true){
    echo"<script>history.go(-1)</script>";
} else {
    echo "<br>مشکلی پیش آمده!<br>";
}
} else {
    echo "<br>مشکلی پیش آمده!<br>";
}
} else {
    echo "<br>مشکلی پیش آمده!<br>";
}
} else {
    echo "<br>مشکلی پیش آمده!<br>";
}
} else {
    echo "<br>مشکلی پیش آمده!<br>";
}
} else {
    echo "<br>مشکلی پیش آمده!<br>";
}
} else {
    echo "<br>مشکلی پیش آمده!<br>";
}
    
} else {
    echo "<br>مشکلی پیش آمده!<br>";
}
    
} else {
    echo "<br>مشکلی پیش آمده!<br>";
}
}

?>