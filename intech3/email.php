<?php

$uname = $_GET['username'];
$name = $_GET['name'];
$email = $_GET['email'];
$psw = $_GET['psw'];

$rand = rand(100000, 999999);

ini_set( 'port', 587 );
error_reporting( E_ALL );
$from = "alz.brt08@gmail.com";
$to = $email;
$subject = "کد تایید ایمیل";
$message = "کد تایید ایمیل شما برای ثبت نام در اینتک:".$rand."";
mail($to,$subject,$message);

    echo '
    
    <!DOCTYPE html>
<html>
    <head>
        <title>اینتک پست-ثبت نام</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
      <script src="https://kit.fontawesome.com/88f241136c.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/x-icon" href="favicon.jpg">
    </head>
    <body dir="rtl">
        <header class="header">
            <nav class="navbar">
                <a href="index.php" class="nav-logo"><img src="logo.png" class="logo"></a>
                <ul class="nav-menu">
                    <button class="darkmodebtn" onclick="myFunction()"><img class="darkmode" src="darkmode.png"></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">حساب کاربری</a>
                    </li>
                    <li class="nav-item">
                        <a href="category.php" class="nav-link">دسته بندی</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.html" class="nav-link">درباره اینتک</a>
                    </li>
                    <li class="nav-item">
                        <a href="ads.html" class="nav-link">تبلیغات</a>
                    </li>
                </ul>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
        </header>

        <br>
        <center>
        <form action="signup2.php?username='.$uname.'&name='.$name.'&email='.$email.'&psw='.$psw.'&rand='.$rand.'" method="post">
        <input name="randomnumber" class="input" type="text" placeholder="کد تایید را وارد کنید...">
        <br>
        <button class="btn" name="submit" type="submit">ارسال</button>
        </form>
        </center>
        <br>

        <script>

const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}
const navLink = document.querySelectorAll(".nav-link");

navLink.forEach(n => n.addEventListener("click", closeMenu));

function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}
function myFunction() {
    var element = document.body;
    element.classList.toggle("dark-mode");
 }

        </script>

        </body>
        </html>

    ';

?>