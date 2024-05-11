<?php

require('config.php');

$uname = $_GET['uname'];
$story = $_FILES["fileToUpload"]["name"];

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
      echo "فایل آپلود شده عکس  یا فیلم نمی باشد!<br>";
      $uploadOk = 0;
    }
  }
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "mp4" && $imageFileType != "mv4") {
    echo "فقط فرمت های jpg و png و jpeg مجاز است.";
    $uploadOk = 0;
  }
  
  if ($uploadOk == 0) {
    echo "استوری آپلود نشد!<br>";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $date = date("Y-m-d");
     echo"استوری با موفقیت آپلود شد!";
     $sql = "INSERT INTO story (username, file, date) VALUES ('$uname', '$story' '$date')";

if ($conn->query($sql) === TRUE) {
} else {
  echo "اتصال با سرور برقرار نشد!<br>";
}
    } else {
      echo "هنگام آپلود استوری مشکلی پیش آمد!<br>";
    }
  }
?>