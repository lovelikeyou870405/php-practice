<?php
    session_start();
    echo "session id :".session_id()."<br>";
    if(!isset($_SESSION['count']))
        $_SESSION['count']=1;
    else
        $_SESSION['count']++;
    echo "這是您在本瀏覽器第{$_SESSION['count']}次載入本網頁";
?>