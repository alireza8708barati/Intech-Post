<?php

session_start();
if(isset($_GET['location'])) {
    $_SESSION = [];
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $uname = $_GET['username'];

    $_SESSION['username'] = $uname;
    $_SESSION['is_login'] = true;

} elseif(!isset($_SESSION['is_login']) && !isset($_SESSION['username'])) {
    header('Location: login.html');
}

echo'<!DOCTYPE html>
<html>
    <head>
        <title>دسته بندی ها</title>
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
                    <a href="#openModalsearch"><i style="color: white;font-size: 2rem" class="fa fa-search" aria-hidden="true"></i></a>
                        <div id="openModalsearch" class="modalDialogsearch">
                            <div>
                                <a href="#closesearch" title="Closesearch" class="closesearch">×</a>
                                <br>
                                <center>
                                <form class="search-form" method="post" action="search.php?username='.$_SESSION['username'].'">
                        <input type="text" class="search-input" name="search" placeholder="جستجوی نام کاربری..."><button class="search-btn" type="submit"><i style="color: #3e0081;font-size: 1.6rem" class="fa fa-search" aria-hidden="true"></i></button> 
                        </form>
                        </center>
                        <br>
                    </div>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="darkmodebtn" onclick="myFunction()"><img class="darkmode" src="darkmode.png"></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="?location=logout" style="text-align: right"><button class="logout"><i style="color: white;font-size:2.5rem;text-align: right" class="fa fa-sign-out" aria-hidden="true"></i></button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a href="login.php?username='.$_SESSION['username'].'" class="nav-link">حساب کاربری</a>
                    </li>
                    <li class="nav-item">
                        <a href="category.php?username='.$_SESSION['username'].'" class="nav-link">دسته بندی</a>
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
        <h1>دسته بندی ها</h1>
        <br>
        <div class="category"><a href="tech.php?username='.$_SESSION['username'].'">فناوری</a></div>
        <br>
        <div class="category"><a href="finance.php?username='.$_SESSION['username'].'">اقتصادی</a></div>
        <br>
        <div class="category"><a href="news.php?username='.$_SESSION['username'].'">اخبار</a></div>
        <br>
        <div class="category"><a href="health.php?username='.$_SESSION['username'].'">سلامتی</a></div>
        <br>
        <div class="category"><a href="art.php?username='.$_SESSION['username'].'">هنر</a></div>
        <br>
        <div class="category"><a href="sport.php?username='.$_SESSION['username'].'">ورزشی</a></div>
        <br>
        <div class="category"><a href="game.php?username='.$_SESSION['username'].'">گیم</a></div>
        <br>
        <div class="category"><a href="nocategory.php?username='.$_SESSION['username'].'">متفرقه</a></div>
        <br>
        </center>
        
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
</html>';
?>