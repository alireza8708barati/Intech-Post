<?php

require('config.php');

$uname = $_GET['uname'];
$psw = $_POST['psw'];
$new = $_POST['new'];

$sql1 = "SELECT * FROM users WHERE username='$uname'";
$result = $conn->query($sql1);
if ($result->num_rows>0) {
    while($row = $result->fetch_assoc()) {

        if($psw == $row['psw']) {

$sql = "UPDATE users SET psw='$new' WHERE username='$uname'";

if($conn->query($sql) === true){
    echo"<script>history.go(-1)</script>";
} else {
    echo"مشکلی پیش آمده!";
}
} else {
    echo"رمز عبور اشتباه است";
}
}
}
?>