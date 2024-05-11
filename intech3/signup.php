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
                      header('Location: email.php?username='.$uname.'&name='.$name.'&email='.$email.'&psw='.$password1.'');
    } 
                }
         }
            
            

        
        
?>