<?php
    $passed = $_COOKIE["passed"];
    $id = $_COOKIE["id"];

    //判斷是否登入成功:
    if($passed != "TRUE")
    {
        header("location:./web-06-index.html");
        exit();
    }
    else
    {
        require_once('./php/dbtool.inc.php');
        $link = create_connection();
        $sql = "SELECT * FROM user WHERE id='$id'";
        $result = exe_sql($link, "member_practice", $sql);
        $row = mysqli_fetch_object($result);
        mysqli_free_result($result);
        mysqli_close($link);
        include('./web-06-main.html');
    }
?>