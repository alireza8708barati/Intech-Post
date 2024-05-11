<?php

$uname = $_GET['username'];
$name = $_GET['name'];
$email = $_GET['email'];
$psw = $_GET['psw'];
$random = $_POST['randomnumber'];
$rand = $_GET['rand'];

if($rand === $random) {
    require('config.php');

    $date = date("Y-m-d");
                        $sql = "INSERT INTO users (username, name, email, psw, date, profile, bio, cover, followed, follower, privateaccount)
VALUES ('$uname', '$name', '$email', '$psw', '$date', 'profile.jpg', 'بیوگرافی وجود ندارد', 'cover.png', '0', '0', '0');";

if ($conn->multi_query($sql) === TRUE) {
header('Location: succesful.html');
} else {
  header("Location: error4.html");
}

} else {
    echo'کد تایید اشتباه است!';
}

?>