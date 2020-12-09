<?php
    $passed = $_COOKIE["passed"];

    //判斷是否登入成功:
    if($passed != "TRUE")
    {
        header("location:./web-06-index.html");
        exit();
    }
    else
    {
        require_once("./php/dbtool.inc.php");
        $id = $_COOKIE["id"];

        //建立資料連結:
        $link = create_connection();
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = exe_sql($link, "member_practice", $sql);
        $row = mysqli_fetch_object($result);
        include('./web-06-modify.html');
    }
?>