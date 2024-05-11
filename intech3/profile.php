<?php

session_start();
if(isset($_GET['location'])) {
    $_SESSION = [];
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $uname2 = $_GET['username2'];
    $_SESSION['username'] = $uname2;
    $_SESSION['is_login'] = true;

} elseif(!isset($_SESSION['is_login']) && !isset($_SESSION['username'])) {
    header('Location: login.html');
}

$uname = $_GET['username'];

if ($_SESSION['username'] == $uname) {
    header('Location: login.php?username='.$_SESSION['username'].'');
} else {

require('config.php');

$sql1 = "SELECT * FROM users WHERE username='$uname'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {

        while($row = $result1->fetch_assoc()) {

            echo'<!DOCTYPE html>
            <html>
                <head>
                    <title>'.$row['name'].'</title>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta charset="utf-8">
                    <script src="https://kit.fontawesome.com/88f241136c.js" crossorigin="anonymous"></script>
                    <link rel="stylesheet" href="css/style.css">
                    <link rel="icon" type="image/x-icon" href="favicon.jpg">
                    <style>
                    .modalDialogchat {
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
                    .modalDialogchat:target {
                        opacity:1;
                        pointer-events: auto;
                    }
                    .modalDialogchat > div {
                        overflow: scroll;
                        font-family: vazir;
                        width: 100%;
                        height: 100%;
                        position: relative;
                        background: #fff;
                        background: white
                    }
                    .closechat {
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
                    .closechat:hover { 
                        background: #d1d1d1; 
                    }
                    .chat-form {
                        background-color: #ffffff;
                        width: 300px;
                        height: auto;
                        border: 2px solid #3e0081;
                        border-radius: 5px;
                        display:flex;
                        flex-direction:row;
                        align-items:center;
                      }
                    
                      .chat-input {
                        font-family: vazir;
                        all: unset;
                        font: 16px system-ui;
                        color: #000000;
                        height: auto;
                        width: 100%;
                        padding: 6px 10px;
                        text-align: right;
                      }
                    
                      ::placeholder {
                        font-family: vazir;
                        color: #3e0081;
                        opacity: 0.7; 
                      }
                    
                      .chat-btn {
                        font-family: vazir;
                        all: unset;
                        cursor: pointer;
                        width: 44px;
                        height: 44px;
                      }
                      .chat {
                        background-color: white;
                        width: 100%;
                        position: fixed;
                        bottom: 0%;
                        right: 0%;
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
                                    <a href="login.php" class="nav-link">حساب کاربری</a>
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
                    $sql = "SELECT * FROM users WHERE username='$uname'";
                    $result = $conn->query($sql);
            
                    if ($result->num_rows>0){
                        
                    while($row = $result->fetch_assoc()) {

                      echo '
                      <img src="uploads/'.$row['cover'].'" class="cover">
                      <br>
                      <br>
                      <center>
                      <img class="profile" src="uploads/'.$row['profile'].'">
                        <br>
                        <h3>'.$row['name'].'</h3>
                        <h3 style="color: #0095ff;" dir="ltr">@'.$row['username'].'</h3>
                        <p class="bio">
                        '.$row['bio'].'</p>
                        <p>دنبال کننده:'.$row['follower'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;دنبال شونده:'.$row['followed'].'</p>';
                        $private = $row['privateaccount'];
                        if ($_SESSION['username'] === $row['username']) {
                        } else {
                            $sql3 = "SELECT * FROM follower WHERE follower='".$_SESSION['username']."' && followed='".$row['username']."'";
                        $result3 = $conn->query($sql3);
                        if ($result3->num_rows>0) {

                            echo'

                            <a href="#openModalchat"><i style="color: #3e0081;font-size: 1.6rem" class="fa fa-comments-o" aria-hidden="true"></i></a>
        <div id="openModalchat" class="modalDialogchat">
            <div>
                <a href="#closechat" title="Closechat" class="closechat">×</a>
                <center>';
                
                $sql4 = "SELECT * FROM chats WHERE sender='$uname' AND receiver='".$_SESSION['username']."' OR sender='".$_SESSION['username']."' AND receiver='$uname' ORDER BY id DESC";
                            $result4 = $conn->query($sql4);
                    
                            if ($result4->num_rows>0){
                                
                            while($row4 = $result4->fetch_assoc()) {
        
                                if ($row4['sender'] == $_SESSION['username']) {
                                    echo'<br>&nbsp;&nbsp;&nbsp;&nbsp;<div style="float:right;background-color:#3e0081;color:white;border:none;border-radius:20px;border-top-right-radius:0">
                                    <p style="color:white">&nbsp;&nbsp;'.$row4['text'].'&nbsp;&nbsp;</p>
                                    </div><br>';
                                } else {
                                    echo'<br>&nbsp;&nbsp;&nbsp;&nbsp;<div style="float:left;background-color:white;color:black;border:2px solid black;border-radius:20px;border-top-left-radius:0">
                                    <p style="color:black">&nbsp;&nbsp;'.$row4['text'].'&nbsp;&nbsp;</p>
                                    </div><br>';
                                }
        
                            }
                        }
        
                echo'<br><br><br>
                <div class="chat">
                <hr>
                <br>
                <form class="chat-form" method="post" action="chat.php?sender='.$_SESSION['username'].'&receiver='.$uname.'">
                                <textarea maxlength="200" type="text" class="chat-input" name="chat" placeholder="پیام جدید..."></textarea><button class="chat-btn" type="submit"><i style="color: #3e0081;font-size: 1.6rem" class="fa fa-paper-plane" aria-hidden="true"></i></button> 
                                </form>
                                <p style="color:gray">پیام تا حداکثر ۲۰۰ کاراکتر مجاز است</p>
                                </div>
                </center>
            </div>
        </div>';

                            echo '<form action="unfollow.php?follower='.$_SESSION['username'].'&followed='.$row['username'].'" method="post"><button type="submit" class="unfollow"><p style="direction: rtl;color:blue">دنبال شده</p></button></form>';
                        } else {
                            if ($private == 0) {

                                echo'

                                <a href="#openModalchat"><i style="color: #3e0081;font-size: 1.6rem" class="fa fa-comments-o" aria-hidden="true"></i></a>
            <div id="openModalchat" class="modalDialogchat">
                <div>
                    <a href="#closechat" title="Closechat" class="closechat">×</a>
                    <center>';
                    
                    $sql4 = "SELECT * FROM chats WHERE sender='$uname' AND receiver='".$_SESSION['username']."' OR sender='".$_SESSION['username']."' AND receiver='$uname' ORDER BY id DESC";
                                $result4 = $conn->query($sql4);
                        
                                if ($result4->num_rows>0){
                                    
                                while($row4 = $result4->fetch_assoc()) {
            
                                    if ($row4['sender'] == $_SESSION['username']) {
                                        echo'<br>&nbsp;&nbsp;&nbsp;&nbsp;<div style="float:right;background-color:#3e0081;color:white;border:none;border-radius:20px;border-top-right-radius:0">
                                        <p style="color:white">&nbsp;&nbsp;'.$row4['text'].'&nbsp;&nbsp;</p>
                                        </div><br>';
                                    } else {
                                        echo'<br>&nbsp;&nbsp;&nbsp;&nbsp;<div style="float:left;background-color:white;color:black;border:2px solid black;border-radius:20px;border-top-left-radius:0">
                                        <p style="color:black">&nbsp;&nbsp;'.$row4['text'].'&nbsp;&nbsp;</p>
                                        </div><br>';
                                    }
            
                                }
                            }
            
                    echo'<br><br><br>
                    <div class="chat">
                    <hr>
                    <br>
                    <form class="chat-form" method="post" action="chat.php?sender='.$_SESSION['username'].'&receiver='.$uname.'">
                                    <textarea maxlength="200" type="text" class="chat-input" name="chat" placeholder="پیام جدید..."></textarea><button class="chat-btn" type="submit"><i style="color: #3e0081;font-size: 1.6rem" class="fa fa-paper-plane" aria-hidden="true"></i></button> 
                                    </form>
                                    <p style="color:gray">پیام تا حداکثر ۲۰۰ کاراکتر مجاز است</p>
                                    </div>
                    </center>
                </div>
            </div>';

                            echo '<form action="follow.php?follower='.$_SESSION['username'].'&followed='.$row['username'].'" method="post"><button type="submit" class="follow">دنبال کردن+</button></form>';
                        } elseif($private == 1) {
                            echo '<form action="follow.php?follower='.$_SESSION['username'].'&followed='.$row['username'].'" method="post"><button type="submit" class="follow">درخواست دنبال کردن+</button></form>';
                        }
                        }
                    }
                        echo'<p style="color: gray">تاریخ عضویت:'.$row['date'].'</p>
                    
                    </center>
                    </div>';
                    }
                    }
                    echo '
                    <br>
                    <div class="div">
                    <br>
                    <h1>پست ها</h1>
                    <br>
                    <hr>';

                    $sql = "SELECT * FROM users WHERE username='$uname'";
                    $result = $conn->query($sql);
            
                    if ($result->num_rows>0){
                        
                    while($row = $result->fetch_assoc()) {
                        if($row['privateaccount'] == 0) {

        $sql = "SELECT * FROM posts WHERE username='$uname' ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows>0){
            
        while($row = $result->fetch_assoc()) {
            if ($row['repost'] == 0) {
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
    <div style="float:left"><form action="repost.php?username='.$_SESSION['username'].'&id='.$postid.'" method="post">&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="edit-btn"><i style="color:gray;font-size:2rem" class="fa fa-retweet" aria-hidden="true"></i></button></form></div>
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
        <br><hr>
        ';
    }

} else {
    $postid2 = $row['postid'];
    $sql = "SELECT * FROM posts WHERE id='$postid2' ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows>0){
            
        while($row = $result->fetch_assoc()) {

            $sql6 = "SELECT * FROM users WHERE username='$uname'";
                    $result6 = $conn->query($sql6);
            
                    if ($result6->num_rows>0){
                        
                    while($row6 = $result6->fetch_assoc()) {
    if ($row['format'] == 'jpg' or $row['format'] == 'png' or $row['format'] == 'jpeg' or $row['format'] == 'gif') 
            {
                echo '<br>
                <div class="post" dir="ltr" style="text-align: left">
                <img src="uploads/'.$row6['profile'].'" class="profile"><br>';
                echo'
            <a href="profile.php?username='.$row6['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff">@'.$row['username'].'</a>
            <p dir="rtl" style="text-align: right">'.$row6['name'].' این پست را ریپست کرده است:</p>
            <br>
                <div style="border:2px solid black;border-radius:10px;padding:2% 2% 2% 2%">
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
    <div style="float:left"><form action="repost.php?username='.$_SESSION['username'].'&id='.$postid.'" method="post">&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="edit-btn"><i style="color:gray;font-size:2rem" class="fa fa-retweet" aria-hidden="true"></i></button></form></div>
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
</div>
        <br><hr>
        ';
            } elseif  ($row['format'] == 'mp3' or $row['format'] == 'm4a'){
                echo '<br>
                <div class="post" dir="ltr" style="text-align: left">
                <img src="uploads/'.$row6['profile'].'" class="profile"><br>';
                echo'
            <a href="profile.php?username='.$row6['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff">@'.$row['username'].'</a>
            <p dir="rtl" style="text-align: right">'.$row6['name'].' این پست را ریپست کرده است:</p>
            <br>
                <div style="border:2px solid black;border-radius:10px;padding:2% 2% 2% 2%">
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
        </div>
</div>
</div>
        <br><hr>
        ';



                    
                } elseif ($row['format'] == "mp4" or $row['format'] == "m4v") {
                    echo '<br>
                <div class="post" dir="ltr" style="text-align: left">
                <img src="uploads/'.$row6['profile'].'" class="profile"><br>';
                echo'
            <a href="profile.php?username='.$row6['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff">@'.$row['username'].'</a>
            <p dir="rtl" style="text-align: right">'.$row6['name'].' این پست را ریپست کرده است:</p>
            <br>
                <div style="border:2px solid black;border-radius:10px;padding:2% 2% 2% 2%">
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
        </div>
</div>
</div>
</div>
        <br><hr>
        ';
    }
}
                    }
                }
                    }
                }
            }
        }
                        } elseif ($row['privateaccount'] == 1) {
                            $uname3 = $_SESSION['username'];
                            $sql = "SELECT * FROM follower WHERE follower='$uname3' AND followed='$uname'";
                            $result = $conn->query($sql);
                            if ($result->num_rows>0) {

                                require("config.php");

                                $sql7 = "SELECT * FROM posts WHERE username='$uname' ORDER BY id DESC";
                                $result7 = $conn->query($sql7);
                        
                                if ($result7->num_rows>0){
                                    
                                while($row = $result7->fetch_assoc()) {
                                    if ($row['repost'] == 0) {
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
                            <div style="float:left"><form action="repost.php?username='.$_SESSION['username'].'&id='.$postid.'" method="post">&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="edit-btn"><i style="color:gray;font-size:2rem" class="fa fa-retweet" aria-hidden="true"></i></button></form></div>
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
                        </div>
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
                            </div></div></div>
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
                                <br><hr>
                                ';
                            }
                        
                        } elseif ($row['repost'] == 1) {
                            $postid2 = $row['postid'];
                            $sql = "SELECT * FROM posts WHERE id='$postid2' ORDER BY id DESC";
                                $result = $conn->query($sql);
                        
                                if ($result->num_rows>0){
                                    
                                while($row = $result->fetch_assoc()) {
                        
                                    $sql6 = "SELECT * FROM users WHERE username='$uname'";
                                            $result6 = $conn->query($sql6);
                                    
                                            if ($result6->num_rows>0){
                                                
                                            while($row6 = $result6->fetch_assoc()) {
                            if ($row['format'] == 'jpg' or $row['format'] == 'png' or $row['format'] == 'jpeg' or $row['format'] == 'gif') 
                                    {
                                        echo '<br>
                                        <div class="post" dir="ltr" style="text-align: left">
                                        <img src="uploads/'.$row6['profile'].'" class="profile"><br>';
                                        echo'
                                    <a href="profile.php?username='.$row6['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff">@'.$uname.'</a>
                                    <p dir="rtl" style="text-align: right">'.$row6['name'].' این پست را ریپست کرده است:</p>
                                    <br>
                                        <div style="border:2px solid black;border-radius:10px;padding:2% 2% 2% 2%">
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
                            <div style="float:left"><form action="repost.php?username='.$_SESSION['username'].'&id='.$postid.'" method="post">&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="edit-btn"><i style="color:gray;font-size:2rem" class="fa fa-retweet" aria-hidden="true"></i></button></form></div>
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
                        </div></div>
                                <br><hr>
                                ';
                                    } elseif  ($row['format'] == 'mp3' or $row['format'] == 'm4a'){
                                        echo '<br>
                                        <div class="post" dir="ltr" style="text-align: left">
                                        <img src="uploads/'.$row6['profile'].'" class="profile"><br>';
                                        echo'
                                    <a href="profile.php?username='.$row6['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff">@'.$row['username'].'</a>
                                    <p dir="rtl" style="text-align: right">'.$row6['name'].' این پست را ریپست کرده است:</p>
                                    <br>
                                        <div style="border:2px solid black;border-radius:10px;padding:2% 2% 2% 2%">
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
                                </div>
                        </div>
                        </div>
                        </div>
                                <br><hr>
                                ';
                        
                        
                        
                                            
                                        } elseif ($row['format'] == "mp4" or $row['format'] == "m4v") {
                                            echo '<br>
                                        <div class="post" dir="ltr" style="text-align: left">
                                        <img src="uploads/'.$row6['profile'].'" class="profile"><br>';
                                        echo'
                                    <a href="profile.php?username='.$row6['username'].'&username2='.$_SESSION['username'].'" style="text-decoration:none;color:#0088ff">@'.$row['username'].'</a>
                                    <p dir="rtl" style="text-align: right">'.$row6['name'].' این پست را ریپست کرده است:</p>
                                    <br>
                                        <div style="border:2px solid black;border-radius:10px;padding:2% 2% 2% 2%">
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
                                </div>
                        </div>
                        </div>
                        </div>
                                <br><hr>
                                ';
                            }
                        }
                                            }
                                        }
                                            }
                                        }
                                    }
                                }

                            } else {

                            
                            echo'
                            <center>
                            <br><br>
                            <i style="color:gray;font-size:5rem" class="fa fa-lock" aria-hidden="true"></i>
                            <br>
                            <p style="color:gray">پروفایل خصوصی است.برای مشاهده پست ها کاربر را دنبال کنید.<p>
                            <br><br>
                            </center>
                            ';
                            }
                            }
                        }
                        }
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