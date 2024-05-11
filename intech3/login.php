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
require('config.php');

$sql1 = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {

        while($row = $result1->fetch_assoc()) {

            echo'<!DOCTYPE html>
            <html>
                <head>
                    <title>حساب  کاربری</title>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta charset="utf-8">
                    <script src="https://kit.fontawesome.com/88f241136c.js" crossorigin="anonymous"></script>
                    <link rel="stylesheet" href="css/style.css">
                    <link rel="icon" type="image/x-icon" href="favicon.jpg">

                    <style>
                    
                    .modalDialogaddstory {
                        position: fixed;
                        font-family: Arial, Helvetica, sans-serif;
                        top: 0;
                        right: 0;
                        bottom: 0;
                        left: 0;
                        background: rgba(0,0,0,0.8);
                        z-index: 99999;
                        opacity:0;
                        -webkit-transition: opacity 400ms ease-in;
                        -moz-transition: opacity 400ms ease-in;
                        transition: opacity 400ms ease-in;
                        pointer-events: none;
                    }
                    .modalDialogaddstory:target {
                        opacity:1;
                        pointer-events: auto;
                    }
                    .modalDialogaddstory > div {
                        overflow: scroll;
                        font-family: vazir;
                        width: 100%;
                        height: 100%;
                        position: relative;
                        background: #fff;
                        background: white
                    }
                    .closeaddstory {
                        background: white;
                        color: #2f2f2f;
                        line-height: 25px;
                        position: absolute;
                        right: 0%;
                        text-align: center;
                        top: 0%;
                        width: 24px;
                        text-decoration: none;
                        font-weight: bold;
                        -webkit-border-radius: 12px;
                        -moz-border-radius: 12px;
                        border-radius: 12px;
                        -moz-box-shadow: 1px 1px 3px #000;
                        -webkit-box-shadow: 1px 1px 3px #000;
                        box-shadow: 1px 1px 3px #000;
                    }
                    .closeaddstory:hover { 
                        background: #d1d1d1; 
                    }
                    
                    </style>

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
                    <div class="div">';
                    include('config.php');
                    $sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
                    $result = $conn->query($sql);
            
                    if ($result->num_rows>0){
                        
                    while($row = $result->fetch_assoc()) {
                      echo '
                      <img src="uploads/'.$row['cover'].'" class="cover"><a href="#openModal"><i style="color:gray" class="fa fa-pencil" aria-hidden="true"></i></a>
<div id="openModal" class="modalDialog">
    <div>
        <a href="#close" title="Close" class="close">×</a>
        <center>
        <form action="upload1.php?uname='.$row['username'].'" method="post" enctype="multipart/form-data">
                      <h2>تغییر کاور</h2>
                      <br>
                      <input class="btn" type="file" name="fileToUpload" id="fileToUpload" required>
                      <br><br>
                      <input class="btn" type="submit" name="submit" value="آپلود کاور جدید">
                      <p style="color:gray">ابعاد کاور:2100×400</p>
                      <br>
                      </form>
                      </center>
    </div>
</div>
                      <br>
                      <a href="#openModal9"><i style="color: #5b00bd; font-size: 2rem" class="fa fa-bell" aria-hidden="true"></i></a>
                      <div id="openModal9" class="modalDialog9">
    <div>
        <a href="#close9" title="Close9" class="close9">×</a>
        <h3>درخواست های دنبال کردن:</h3>
        <hr>';
        $sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
                    $result = $conn->query($sql);
            
                    if ($result->num_rows>0){
                        
                    while($row = $result->fetch_assoc()) {
                        if ($row['privateaccount']==0) {
                            echo'حساب کاربری شما عمومی است.';
                        } else {
                            $sql2 = "SELECT * FROM requests WHERE followed='".$_SESSION['username']."'";
                    $result2 = $conn->query($sql2);
            
                    if ($result2->num_rows>0){
                        
                    while($row = $result2->fetch_assoc()) {
                        $follower = $row['follower'];
                        $sql3 = "SELECT * FROM users WHERE username='$follower'";
                    $result3 = $conn->query($sql3);
            
                    if ($result3->num_rows>0){
                        
                    while($row = $result3->fetch_assoc()) {
                        echo'
                        <p>'.$row['name'].'</p>
                        <a href="profile.php?username='.$row['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff;float:left">@'.$row['username'].'</a>
                        <p>
                        <form action="agreerequest.php?follower='.$follower.'&followed='.$_SESSION['username'].'" method="post"><button style="color:#5b00bd;border:none;background:none;" type="submit">تایید</button></form>
                        <form action="deleterequest.php?follower='.$follower.'&followed='.$_SESSION['username'].'" method="post"><button style="color:red;border:none;background:none;" type="submit">رد درخواست</button></form>
                        </p>
                        <hr>
                        ';       
                    }
                }
                    }
                }
                        }
                    }
                }

                $sql1 = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                    while($row = $result1->fetch_assoc()) {

    echo'</div>
</div>
                      <br><br>
                      <center>
                      
                      <img class="profile" src="uploads/'.$row['profile'].'"><a href="#openModal2"><i style="color:gray" class="fa fa-pencil" aria-hidden="true"></i></a>
                      <div id="openModal2" class="modalDialog2">
                          <div>
                              <a href="#close2" title="Close2" class="close2">×</a>
                              <center>
                              <form action="upload.php?uname='.$row['username'].'" method="post" enctype="multipart/form-data">
                        <h2>تغییر نمایه</h2>
                        <br>
                        <input class="btn" type="file" name="fileToUpload" id="fileToUpload" required>
                        <br><br>
                        <input class="btn" type="submit" name="submit" value="آپلود نمایه جدید">
                        <p style="color:gray">ابعاد نمایه:1800×1800</p>
                        <br>
                        </form>
                        </center>
                          </div>
                      </div>
                        <br>
                        <h3>'.$row['name'].'<a href="#openModal3"><i style="color:gray" class="fa fa-pencil" aria-hidden="true"></i></a>
                        <div id="openModal3" class="modalDialog3">
                            <div>
                                <a href="#close3" title="Close3" class="close3">×</a>
                                <center>
                                <form method="post" action="name.php?uname='.$row['username'].'&name='.$row['name'].'">
                        <h3>تغییر نام</h3>
                        <br>
                        <input type="text" class="input" name="new" placeholder="نام جدید" required>
                        <br><br>
                        <button class="btn" type="submit">تغییر</button>
                        <br><br> 
                        </form>
                          </center>
                            </div>
                        </div></h3>
                        <h3 style="color: #0095ff;" dir="ltr">@'.$row['username'].'<a href="#openModal4"><i style="color:gray" class="fa fa-pencil" aria-hidden="true"></i></a>
                        <div id="openModal4" class="modalDialog4">
                            <div>
                                <a href="#close4" title="Close4" class="close4">×</a>
                                <center>
                                <form method="post" action="uname.php?uname='.$row['username'].'"> 
                        <h3 class="uname-h">تغییر نام کاربری</h3>
                        <br>
                        <input style="direction:rtl" type="text" class="input" name="new" placeholder="نام کاربری جدید" required>
                        <br><br>
                        <button class="btn" type="submit">تغییر</button> 
                        <br><br>
                        </form>
                          </center>
                            </div>
                        </div></h3>
                        <p class="bio">
                        '.$row['bio'].'
                        <a href="#openModal5"><i style="color:gray" class="fa fa-pencil" aria-hidden="true"></i></a>
                        <div id="openModal5" class="modalDialog5">
                            <div>
                                <a href="#close5" title="Close5" class="close5">×</a>
                                <center>
                                <form method="post" action="bio.php?uname='.$row['username'].'">
                        <h3>تغییر بیوگرافی</h3>
                        <br><br>
                        <textarea type="text" class="input" name="new" placeholder="بیوگرافی جدید" style="height:200px" required>'.$row['bio'].'</textarea>
                        <p style="color:gray">بیوگرافی تا ۲۵۰ کارکتر مجاز است</p>
                        <br><br>
                        <button class="btn" type="submit">تغییر</button> 
                        <br><br>
                        </form>
                          </center>
                            </div>
                        </div></p><a href="#openModal7">دنبال کننده:'.$row['follower'].'</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#openModal8">دنبال شونده:'.$row['followed'].'</a>
                        <div id="openModal7" class="modalDialog7">
                            <div>
                                <a href="#close7" title="Close7" class="close7">×</a>
                                <h1>دنبال کنندگان:</h1>';
                                $sql3 = "SELECT * FROM follower WHERE followed='".$_SESSION['username']."'";
                    $result3 = $conn->query($sql3);
            
                    if ($result3->num_rows>0){
                        
                    while($row = $result3->fetch_assoc()) {
                                echo'<br><a href="profile.php?username='.$row['follower'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff;float:left">@'.$row['follower'].'</a><br>';
                }
                }
                
                            echo'</div>
                            </div>
                            <div id="openModal8" class="modalDialog8">
                            <div>
                                <a href="#close8" title="Close8" class="close8">×</a>
                                <h1>دنبال شوندگان:</h1>';
                                $sql4 = "SELECT * FROM follower WHERE follower='".$_SESSION['username']."'";
                                $result4 = $conn->query($sql4);
                        
                                if ($result4->num_rows>0){
                                    
                                while($row = $result4->fetch_assoc()) 
                                            echo'<a href="profile.php?username='.$row['followed'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff;float:left">@'.$row['followed'].'</a>';
                            }
                            }
                            echo'</div>
                            </div>
                            <br>
                            <a href="#openModaladdstory">+اضافه کردن استوری</a>
                            <div id="openModaladdstory" class="modalDialogaddstory">
                          <div>
                              <a href="#closeaddstory" title="Closeaddstory" class="closeaddstory">×</a>
                              <center>
                              <form action="uploadstory.php?uname='.$row['username'].'" method="post" enctype="multipart/form-data">
                      <h2>اضافه کردن استوری</h2>
                      <br>
                      <input class="btn" type="file" name="fileToUpload" id="fileToUpload" required>
                      <br><br>
                      <input class="btn" type="submit" name="submit" value="آپلود فایل استوری">
                      <p style="color:gray">فقط فرمت های jpg, png. jpeg, mp4, mv4 مجاز هستند.</p>
                      <br>
                      </form>
                        </center>
                          </div>
                      </div>
                            ';
                            $sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
                    $result = $conn->query($sql);
            
                    if ($result->num_rows>0){
                        
                    while($row = $result->fetch_assoc()) {
                        if ($row['privateaccount'] == 0) {
                            echo"<center><form action='private.php?username=".$_SESSION['username']."' method='post'><button class='private' name='submit' type='submit'>فعال کردن پروفایل خصوصی</button></form></center>";
                        } elseif ($row['privateaccount'] == 1) {
                            echo"<center><form action='public.php?username=".$_SESSION['username']."' method='post'><button class='private' name='submit' type='submit'>غیر فعال کردن پروفایل خصوصی</button></form></center>";
                        }
                        echo'<p style="color: gray">تاریخ عضویت:'.$row['date'].'</p>';
                    }
                }
                        echo'
                    </center>
                    <center><form action="deleteaccount.php?username='.$_SESSION['username'].'" method="post"><button type="submit" style="background:none;border:none;color:red;font-family: vazir">حذف حساب کاربری<i style="color:red; font-size: 1.5rem" class="fa fa-trash" aria-hidden="true"></i></button></form></center>
                    </div>';
            }
        }
                    }
                    }
                    echo '
                    <br>
                    <div class="div">
                    <br>
                    <a href="#openModal6"><i style="color: gray;font-size:2rem;text-align: right" class="fa fa-plus" aria-hidden="true"></i></a>
                        <div id="openModal6" class="modalDialog6">
                            <div>
                                <a href="#close6" title="Close6" class="close6">×</a>
                                <center>
                                <form method="post" action="text.php?uname='.$_SESSION['username'].'" enctype="multipart/form-data">
                      <h1>پست جدید</h1>
                      <br>
                      <hr>
                      <br>
                      <h3>آپلود فایل برای پست</h3>
                      <br>
                      <input class="btn" type="file" name="fileToUpload" id="fileToUpload" required>
                        <br>
                        <p style="color:gray">فقط فرمت های .mp4, .mv4, .mp3, .m4a, .png, .jpg, .jpeg, .gif مجاز هستند.</p>
                        <br>
                    <select class="select" name="category">
                    <option>فناوری</option>
                    <option>اقتصادی</option>
                    <option>اخبار</option>
                    <option>سلامتی</option>
                    <option>هنر</option>
                    <option>ورزشی</option>
                    <option>گیم</option>
                    <option>متفرقه</option>
                    </select>        
                    <br>
                    <textarea maxlength="1000" class="text" name="text" placeholder="متن پست" required></textarea>
                    <p style="color:gray">پست تا ۱۰۰۰ کاراکتر مجاز است.</p>
                    <br>
                    <button class="btn" type="submit" name="submit">پست</button>
                    <br><br>
                    </form>
                          </center>
                            </div>
                        </div>
                      <br>
                    <h1>پست ها</h1>
                    <br>
                    <hr>';
                    require("config.php");
                }

        $sql = "SELECT * FROM posts WHERE username='".$_SESSION['username']."' ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows>0){
            
        while($row = $result->fetch_assoc()) {
            if ($row['format'] == 'jpg' or $row['format'] == 'png' or $row['format'] == 'jpeg' or $row['format'] == 'gif') 
            {
                echo '<br>
       <div class="post" dir="ltr" style="text-align: left">
            <img src="uploads/'.$row['profile'].'" class="profile">';
                echo'
            <p>'.$row['name'].'</p>
            <a href="profile.php?username='.$row['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff">@'.$row['username'].'</a><p dir="rtl" style="text-align: right">'.$row['text'].'</p>
            <br>
            <center><img src="uploads/'.$row['file'].'" class="file"></center>
            <p style="color:#7c7c7c">'.$row['category'].'</p>
            <p style="color:#7c7c7c">'.$row['date'].'</p>';
            $postid = $row['id'];
            $like = $row['numlike'];
            $sql2 = "SELECT * FROM `num-like` WHERE username='".$_SESSION['username']."' && postid='$postid'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows>0) {
            echo'<div style="float:left"><form action="dislike.php?username='.$_SESSION['username'].'&id='.$postid.'" method="post"><p style="color:blue">'.$like.'&nbsp;&nbsp;<button type="submit" class="edit-btn"><i style="color:blue;font-size:2rem" class="fa fa-thumbs-up" aria-hidden="true"></i></button></form></div>';
        } else {
            echo'<div style="float:left"><form action="like.php?username='.$_SESSION['username'].'&id='.$postid.'" method="post"><p style="color:gray">'.$like.'&nbsp;&nbsp;<button type="submit" class="edit-btn"><i style="color:gray;font-size:2rem" class="fa fa-thumbs-up" aria-hidden="true"></i></button></form></div>';
    }
    echo'
    <div style="float:left"><a href="#open" onclick="document.getElementById(`'.$row['id'].'`).style.display=`block`">&nbsp;&nbsp;&nbsp;<i style="color: gray;font-size:2rem" class="far fa-comment"></i></a></div>
    <br>
    <div style="display:none" id="'.$row['id'].'"> 
    <a style="color:gray;font-size:2rem;text-decoration:none" href="#close" onclick="document.getElementById(`'.$row['id'].'`).style.display=`none`">×</a>
    <center>
    <form action="comment.php?username='.$_SESSION['username'].'&id='.$postid.'" method="post" class="comment-form"><input placeholder="نظر بگذارید..." class="comment-input" maxlength="100" name="text"><button type="submit" class="comment-btn"><i style="color:#5b00bd" class="fa fa-paper-plane" aria-hidden="true"></i></button></form>';
    $sql5 = "SELECT * FROM comment WHERE postid='$postid' ORDER BY id DESC";
    $result5 = $conn->query($sql5);

    if ($result5->num_rows>0){
        
    while($row = $result5->fetch_assoc()) {
        echo'<br><br><div class="comment">
        <div class="comment2">
        <a href="profile.php?username='.$row['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff;float:left">@'.$row['username'].'</a>            
        <br>
        <p style="text-align:right">'.$row['text'].'</p>
        <p dir="ltr" style="color:gray;text-align:left">'.$row['date'].'</p></div>
        <a href="#open" onclick="document.getElementById(`'.$row['id'].'`).style.display=`block`" style="text-decoration:none">پاسخ</a>';
        if($row['username'] === $_SESSION['username']) {
            echo'<form method="post" action="deletecomment.php?id='.$row['id'].'" style="float:left"><button class="edit-btn" type="submit"><i style="color:gray; font-size: 1.5rem" class="fa fa-trash" aria-hidden="true"></i></button></form>';
        }
        echo'<br><div class="reply" style="display:none" id="'.$row['id'].'"> 
    <a style="color:gray;font-size:2rem;text-decoration:none;float:right" href="#close" onclick="document.getElementById(`'.$row['id'].'`).style.display=`none`">×</a>
    <center>';
    $commentid = $row['id'];
    echo'<form action="reply.php?username='.$_SESSION['username'].'&id='.$commentid.'" method="post" class="comment-form"><input placeholder="پاسخ بگذارید ..." class="comment-input" maxlength="100" name="text"><button type="submit" class="comment-btn"><i style="color:#5b00bd" class="fa fa-paper-plane" aria-hidden="true"></i></button></form><br>';
    if ($row['reply'] == 0) {
    $commentid = $row['id'];
    $sql5 = "SELECT * FROM reply WHERE commentid='$commentid' ORDER BY id DESC";
    $result5 = $conn->query($sql5);

    if ($result5->num_rows>0){
        
    while($row = $result5->fetch_assoc()) {
        echo'<br><div class="comment">
        <div class="comment2">
        <a href="profile.php?username='.$row['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff;float:left">@'.$row['username'].'</a>            
        <br>
        <p style="text-align:right">'.$row['text'].'</p>
        <p dir="ltr" style="color:gray;text-align:left">'.$row['date'].'</p>';
        if($row['username'] === $_SESSION['username']) {
            echo'<form method="post" action="deletereply.php?id='.$row['id'].'"><button class="edit-btn" typr="submit"><i style="color:gray; font-size: 1.5rem" class="fa fa-trash" aria-hidden="true"></i></button></form>';
        }
        echo'</div>
        </div>
        <br>';
        }
    }
}
        
        echo'</center>
    </div>
        </div>';
        }
    }
    
    echo'</center>
</div>
</div>
<form action="delete.php?id='.$postid.'" method="post"><button type="submit" style="background:none;border:none;color:red"><i style="color:gray; font-size: 1.5rem" class="fa fa-trash" aria-hidden="true"></i></button></form>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit.php?id='.$postid.'"><i style="color:gray" class="fa fa-pencil" aria-hidden="true"></i></a>
        <br><hr>
        ';
            } elseif  ($row['format'] == 'mp3' or $row['format'] == 'm4a'){
                
                    echo '<br>
       <div class="post" dir="ltr" style="text-align: left">
            <img src="uploads/'.$row['profile'].'" class="profile">';
                echo'<p>'.$row['name'].'</p>
                <a href="profile.php?username='.$row['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff">@'.$row['username'].'</a><p dir="rtl" style="text-align: right">'.$row['text'].'</p>
            <br>
            <center><audio class="audio" controls autoplay muted>
            <source src="uploads/'.$row['file'].'" type="audio/mpeg">
          </audio></center>
            
            <p style="color:#7c7c7c">'.$row['category'].'</p>
            <p style="color:#7c7c7c">'.$row['date'].'</p>';
            $postid = $row['id'];
            $like = $row['numlike'];
            $sql2 = "SELECT * FROM `num-like` WHERE username='".$_SESSION['username']."' && postid='$postid'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows>0) {
            echo'<div style="float:left"><form action="dislike.php?username='.$_SESSION['username'].'&id='.$postid.'" method="post"><p style="color:blue">'.$like.'&nbsp;&nbsp;<button type="submit" class="edit-btn"><i style="color:blue;font-size:2rem" class="fa fa-thumbs-up" aria-hidden="true"></i></button></form></div>';
        } else {
            echo'<div style="float:left"><form action="like.php?username='.$_SESSION['username'].'&id='.$postid.'" method="post"><p style="color:gray">'.$like.'&nbsp;&nbsp;<button type="submit" class="edit-btn"><i style="color:gray;font-size:2rem" class="fa fa-thumbs-up" aria-hidden="true"></i></button></form></div>';
    }
    echo'
    <div style="float:left"><a href="#open" onclick="document.getElementById(`'.$row['id'].'`).style.display=`block`">&nbsp;&nbsp;&nbsp;<i style="color: gray;font-size:2rem" class="far fa-comment"></i></a></div>
    <br>
    <div style="display:none" id="'.$row['id'].'"> 
    <a style="color:gray;font-size:2rem;text-decoration:none" href="#close" onclick="document.getElementById(`'.$row['id'].'`).style.display=`none`">×</a>
    <center>
    <form action="comment.php?username='.$_SESSION['username'].'&id='.$postid.'" method="post" class="comment-form"><input placeholder="نظر بگذارید..." class="comment-input" maxlength="100" name="text"><button type="submit" class="comment-btn"><i style="color:#5b00bd" class="fa fa-paper-plane" aria-hidden="true"></i></button></form>';
    $sql5 = "SELECT * FROM comment WHERE postid='$postid' ORDER BY id DESC";
    $result5 = $conn->query($sql5);

    if ($result5->num_rows>0){
        
    while($row = $result5->fetch_assoc()) {
        echo'<br><br><div class="comment">
        <div class="comment2">
        <a href="profile.php?username='.$row['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff;float:left">@'.$row['username'].'</a>            
        <br>
        <p style="text-align:right">'.$row['text'].'</p>
        <p dir="ltr" style="color:gray;text-align:left">'.$row['date'].'</p></div>
        <a href="#open" onclick="document.getElementById(`'.$row['id'].'`).style.display=`block`" style="text-decoration:none">پاسخ</a>';
        if($row['username'] === $_SESSION['username']) {
            echo'<form method="post" action="deletecomment.php?id='.$row['id'].'" style="float:left"><button class="edit-btn" type="submit"><i style="color:gray; font-size: 1.5rem" class="fa fa-trash" aria-hidden="true"></i></button></form>';
        }
        echo'<br><div class="reply" style="display:none" id="'.$row['id'].'"> 
    <a style="color:gray;font-size:2rem;text-decoration:none;float:right" href="#close" onclick="document.getElementById(`'.$row['id'].'`).style.display=`none`">×</a>
    <center>';
    $commentid = $row['id'];
    echo'<form action="reply.php?username='.$_SESSION['username'].'&id='.$commentid.'" method="post" class="comment-form"><input placeholder="پاسخ بگذارید ..." class="comment-input" maxlength="100" name="text"><button type="submit" class="comment-btn"><i style="color:#5b00bd" class="fa fa-paper-plane" aria-hidden="true"></i></button></form><br>';
    if ($row['reply'] == 0) {
    $commentid = $row['id'];
    $sql5 = "SELECT * FROM reply WHERE commentid='$commentid' ORDER BY id DESC";
    $result5 = $conn->query($sql5);

    if ($result5->num_rows>0){
        
    while($row = $result5->fetch_assoc()) {
        echo'<br><div class="comment">
        <div class="comment2">
        <a href="profile.php?username='.$row['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff;float:left">@'.$row['username'].'</a>            
        <br>
        <p style="text-align:right">'.$row['text'].'</p>
        <p dir="ltr" style="color:gray;text-align:left">'.$row['date'].'</p></div>';
        if($row['username'] === $_SESSION['username']) {
            echo'<form method="post" action="deletereply.php?id='.$row['id'].'"><button class="edit-btn" typr="submit"><i style="color:gray; font-size: 1.5rem" class="fa fa-trash" aria-hidden="true"></i></button></form>';
        }
        echo'</div>
        <br>';
        }
    }
}
        
        echo'</center>
    </div>
        </div>
        
';
        
        }
        }
    
        echo'</center>
    </div></div>
    <form action="delete.php?id='.$postid.'" method="post"><button type="submit" style="background:none;border:none;color:red"><i style="color:gray; font-size: 1.5rem" class="fa fa-trash" aria-hidden="true"></i></button></form>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit.php?id='.$postid.'"><i style="color:gray" class="fa fa-pencil" aria-hidden="true"></i></a>
        <br><hr>
    ';
                } elseif ($row['format'] == "mp4" or $row['format'] == "m4v") {
                    
                        echo '<br>
       <div class="post" dir="ltr" style="text-align: left">
            <img src="uploads/'.$row['profile'].'" class="profile">';
                echo'
            <p>'.$row['name'].'</p>
            <a href="profile.php?username='.$row['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff">@'.$row['username'].'</a><p dir="rtl" style="text-align: right">'.$row['text'].'</p>
            <br>
            <center><video width="80%" height="auto" controls>
            <source src="uploads/'.$row['file'].'" type="video/mp4">
          </video></center>
            
            <p style="color:#7c7c7c">'.$row['category'].'</p>
            <p style="color:#7c7c7c">'.$row['date'].'</p>';
            $postid = $row['id'];
            $like = $row['numlike'];
            $sql2 = "SELECT * FROM `num-like` WHERE username='".$_SESSION['username']."' && postid='$postid'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows>0) {
            echo'<div style="float:left"><form action="dislike.php?username='.$_SESSION['username'].'&id='.$postid.'" method="post"><p style="color:blue">'.$like.'&nbsp;&nbsp;<button type="submit" class="edit-btn"><i style="color:blue;font-size:2rem" class="fa fa-thumbs-up" aria-hidden="true"></i></button></form></div>';
        } else {
            echo'<div style="float:left"><form action="like.php?username='.$_SESSION['username'].'&id='.$postid.'" method="post"><p style="color:gray">'.$like.'&nbsp;&nbsp;<button type="submit" class="edit-btn"><i style="color:gray;font-size:2rem" class="fa fa-thumbs-up" aria-hidden="true"></i></button></form></div>';
    }
    echo'
    <div style="float:left"><a href="#open" onclick="document.getElementById(`'.$row['id'].'`).style.display=`block`">&nbsp;&nbsp;&nbsp;<i style="color: gray;font-size:2rem" class="far fa-comment"></i></a></div>
    <br>
    <div style="display:none" id="'.$row['id'].'"> 
    <a style="color:gray;font-size:2rem;text-decoration:none" href="#close" onclick="document.getElementById(`'.$row['id'].'`).style.display=`none`">×</a>
    <center>
    <form action="comment.php?username='.$_SESSION['username'].'&id='.$postid.'" method="post" class="comment-form"><input placeholder="نظر بگذارید..." class="comment-input" maxlength="100" name="text"><button type="submit" class="comment-btn"><i style="color:#5b00bd" class="fa fa-paper-plane" aria-hidden="true"></i></button></form>';
    $sql5 = "SELECT * FROM comment WHERE postid='$postid' ORDER BY id DESC";
    $result5 = $conn->query($sql5);

    if ($result5->num_rows>0){
        
    while($row = $result5->fetch_assoc()) {
        echo'<br><br><div class="comment">
        <div class="comment2">
        <a href="profile.php?username='.$row['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff;float:left">@'.$row['username'].'</a>            
        <br>
        <p style="text-align:right">'.$row['text'].'</p>
        <p dir="ltr" style="color:gray;text-align:left">'.$row['date'].'</p></div>
        <a href="#open" onclick="document.getElementById(`'.$row['id'].'`).style.display=`block`" style="text-decoration:none">پاسخ</a>';
        if($row['username'] === $_SESSION['username']) {
            echo'<form method="post" action="deletecomment.php?id='.$row['id'].'" style="float:left"><button class="edit-btn" type="submit"><i style="color:gray; font-size: 1.5rem" class="fa fa-trash" aria-hidden="true"></i></button></form>';
        }
        echo'<br><div class="reply" style="display:none" id="'.$row['id'].'"> 
    <a style="color:gray;font-size:2rem;text-decoration:none;float:right" href="#close" onclick="document.getElementById(`'.$row['id'].'`).style.display=`none`">×</a>
    <center>';
    $commentid = $row['id'];
    echo'<form action="reply.php?username='.$_SESSION['username'].'&id='.$commentid.'" method="post" class="comment-form"><input placeholder="پاسخ بگذارید ..." class="comment-input" maxlength="100" name="text"><button type="submit" class="comment-btn"><i style="color:#5b00bd" class="fa fa-paper-plane" aria-hidden="true"></i></button></form><br>';
    if ($row['reply'] == 0) {
    $commentid = $row['id'];
    $sql5 = "SELECT * FROM reply WHERE commentid='$commentid' ORDER BY id DESC";
    $result5 = $conn->query($sql5);

    if ($result5->num_rows>0){
        
    while($row = $result5->fetch_assoc()) {
        echo'<br><div class="comment">
        <div class="comment2">
        <a href="profile.php?username='.$row['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff;float:left">@'.$row['username'].'</a>            
        <br>
        <p style="text-align:right">'.$row['text'].'</p>
        <p dir="ltr" style="color:gray;text-align:left">'.$row['date'].'</p></div>';
            echo '<form method="post" action="deletereply.php?id='.$row['id'].'"><button class="edit-btn" typr="submit"><i style="color:gray; font-size: 1.5rem" class="fa fa-trash" aria-hidden="true"></i></button></form>';
        
        echo'</div>
        <br>';
        }
    }
}
        
        echo'</center>
    </div>
        </div>
        
';
        }
        
        }
    
        echo'</center>
    </div></div>
    <form action="delete.php?id='.$postid.'" method="post"><button type="submit" style="background:none;border:none;color:red"><i style="color:gray; font-size: 1.5rem" class="fa fa-trash" aria-hidden="true"></i></button></form>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit.php?id='.$postid.'"><i style="color:gray" class="fa fa-pencil" aria-hidden="true"></i></a>
        <br><hr>
        ';
    }
                    }
                }
        
    
                   
                  echo '</div> 
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
            </html>';
                        ?>