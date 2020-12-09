<?php
    require_once("./php/dbtool.inc.php");

    $author = $_POST["author"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];
    $current_time = date("Y-m-d H:i:s");

    //建立資料連結:
    $link = create_connection();

    //執行SQL:
    $sql = "INSERT INTO message(author,subject,content,date) VALUES('$author','$subject','$content','$current_time')";
    $result = exe_sql($link, "guestbook", $sql);

    //關閉資料連結:
    mysqli_close($link);

    //重新導向到web-05-index.php:
    header("location:./web-05-index.php");
    exit();
?>