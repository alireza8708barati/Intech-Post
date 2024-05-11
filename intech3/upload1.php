<?php

require('config.php');

$uname = $_GET['uname'];
$cover = $_FILES["fileToUpload"]["name"];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "" ;
      $uploadOk = 1;
    } else {
      echo "فایل آپلود شده عکس نمی باشد!<br>";
      $uploadOk = 0;
    }
  }
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "فقط فرمت های jpg و png و jpeg مجاز است.";
    $uploadOk = 0;
  }
  
  if ($uploadOk == 0) {
    echo "تصویر کاور آپلود نشد!<br>";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
     echo"تصویر کاور با موفقیت آپلود شد!";
     $sql = "UPDATE users SET cover='$cover' WHERE username='$uname'";

if ($conn->query($sql) === TRUE) {
} else {
  echo "اتصال با سرور برقرار نشد!<br>";
}
    } else {
      echo "هنگام آپلود کاور مشکلی پیش آمد!<br>";
    }
  }
?>