<?php
    include('config.php');
    
    $uname = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password1 = $_POST['psw1'];
    $password2 = $_POST['psw2'];

    
         if($password1 != $password2) {
           header('Location: error1.html');
         } else {
            $sql = ("SELECT * FROM `users` WHERE `username`='$uname'");
            $result1 = $conn->query($sql);
            
            if ($result1->num_rows > 0)  {
                header('Location: error2.html');
            } else {
                $sql = ("SELECT * FROM `users` WHERE `email`='$email'");
  $result1 = $conn->query($sql);
  
  if ($result1->num_rows > 0) {
    header('Location: error3.html');
                    } else {
    $date = date("Y-m-d");
                        $sql = "INSERT INTO users (username, name, email, psw, date, profile, bio, cover, follower, followed)
VALUES ('$uname', '$name', '$email', '$password1', '$date', 'profile.jpg', 'بیوگرافی وجود ندارد', 'cover.png', '0', '0');";

if ($conn->multi_query($sql) === TRUE) {
header('Location: succesful.html');
} else {
  header('Location: error4.html');
}
  
        
    } 
                }
         }
            
            

        
        
?>