<?php

require('config.php');

$uname = $_GET['uname'];
$profile = $_FILES["fileToUpload"]["name"];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


  
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "";
      $uploadOk = 1;
    } else {
      echo "فایل آپلود شده عکس نمی باشد!";
      $uploadOk = 0;
    }
  }
  
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "فقط فرمت های jpg و png و jpeg مجاز است.";
    $uploadOk = 0;
  }
  
  if ($uploadOk == 0) {
    echo "تصویر نمایه آپلود نشد!";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
     echo"تصویر نمایه با موفقیت آپلود شد!";
     $sql = "UPDATE users SET profile='$profile' WHERE username='$uname'";

if ($conn->query($sql) === TRUE) {
} else {
  echo "اتصال با سرور برقرار نشد!";
}
$sql1 = "UPDATE posts SET profile='$profile' WHERE username='$uname'";
if ($conn->query($sql1) === TRUE) {
} else {
  echo "اتصال با سرور برقرار نشد!";
}
    } else {
      echo "هنگام آپلود نمایه مشکلی پیش آمد!";
    }
  }



?>