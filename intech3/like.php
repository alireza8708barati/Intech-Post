<?php

require('config.php');

$id = $_GET['id'];
$uname = $_GET['username'];

$sql = "SELECT `numlike` FROM posts WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows>0){
            
        while($row = $result->fetch_assoc()) {
            $new = $row['numlike'] + 1;
        }
    }
    $sql = "UPDATE posts SET `numlike`='$new' WHERE id='$id'";

if($conn->query($sql) === true){
    $sql = "INSERT INTO `num-like` (username, postid)
VALUES ('$uname', '$id');";

if ($conn->multi_query($sql) === TRUE) {
    echo"<script>history.go(-1)</script>";
} else {
  echo"<br>مشکلی پیش آمده!</br>";
}
} else {
    echo"مشکلی پیش آمده!";
}

?>