<?php
require('config.php');

$follower = $_GET['follower'];
$followed = $_GET['followed'];

$sql = "SELECT * FROM users where username='$followed'";
        $result = $conn->query($sql);

        if ($result->num_rows>0){
            
        while($row = $result->fetch_assoc()) {
            if($row['privateaccount'] == 0) {
                $sql = "SELECT * FROM users where username='$followed'";
                $result = $conn->query($sql);
        
                if ($result->num_rows>0){
                    
                while($row = $result->fetch_assoc()) {
                    $new = $row['follower'] + 1;
                }
            }
            $sql = "SELECT * FROM users where username='$follower'";
            $result = $conn->query($sql);
        
            if ($result->num_rows>0){
                
            while($row = $result->fetch_assoc()) {
                $new2 = $row['followed'] + 1;
            }
        }
        $sql = "UPDATE users SET follower='$new' WHERE username='$followed'";
        
        if($conn->query($sql) === true){
            $sql = "UPDATE users SET followed='$new2' WHERE username='$follower'";
        
        if($conn->query($sql) === true){
            $sql = "INSERT INTO follower (follower, followed)
        VALUES ('$follower', '$followed');";
        
        if ($conn->multi_query($sql) === TRUE) {
            echo"<script>history.go(-1)</script>";
        } else {
          echo"<br>مشکلی پیش آمده!</br>";
        }
        } else {
            echo"<br>مشکلی پیش آمده!</br>";
        }
        } else {
            echo"مشکلی پیش آمده!";
        }
            } elseif($row['privateaccount'] == 1) {
                $sql = "INSERT INTO requests (follower, followed)
  VALUES ('$follower', '$followed')";
  
  if ($conn->multi_query($sql) === TRUE) {
    echo"<script>history.go(-1)</script>";
  } else {
    echo "مشکلی پیش آمده،دوباره امتحان کنید‌.";
  }
            }
        } 
    }


?>