<?php 

require('config.php');

$uname = $_GET['uname'];
$file = $_FILES["fileToUpload"]["name"];
$category = $_POST['category'];
$text = $_POST['text'];
$date = date("Y-m-d");

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "mp4" && $imageFileType != "m4v" && $imageFileType != "mp3" && $imageFileType != "m4a") {
    echo "فقط فرمت های .mp4, .mv4, .mp3, .m4a, .png, .jpg, .jpeg, .gif مجاز هستند.";
    $uploadOk = 0;
  }
  
  if ($uploadOk == 0) {
    echo "فایل آپلود نشد!";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $sql1 = "SELECT * FROM users WHERE username='$uname'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0) {
  
          while($row = $result1->fetch_assoc()) {
            
            $sql = "INSERT INTO posts (username, name, text, date, profile, category, file, format, numlike)
  VALUES ('$uname', '".$row['name']."', '$text', '$date', '".$row['profile']."', '$category', '$file', '$imageFileType', '0')";
  
  if ($conn->multi_query($sql) === TRUE) {
  echo"پست جدید با موفقیت ثبت شد!";
  } else {
    echo "مشکلی پیش آمده،دوباره امتحان کنید‌.";
  }
            
          }
      }
     

    } else {
      echo "هنگام آپلود فایل مشکلی پیش آمد!";
    }
  }
?>