<?php
    require_once("./php/dbtool.inc.php");

    //取得表單資料:
    $account = $_POST["account"];
    $password = $_POST["password"];

    //建立資料連結:
    $link = create_connection();

    //帳號和密碼與資料庫做比對:
    $sql = "SELECT * FROM user WHERE account='$account' AND password='$password'";
    $result = exe_sql($link, "member_practice", $sql);
    
    //若帳號與密碼錯誤:
    if(mysqli_num_rows($result)==0)
    {
        //釋放記憶體空間:
        mysqli_free_result($result);
        mysqli_close($link);
        echo "<script type='text/javascript'>alert('帳號密碼錯誤'); history.back();</script>";
    }
    else
    {
        //取得id欄位:
        $id = mysqli_fetch_object($result)->id;

        //釋放記憶體空間:
        mysqli_free_result($result);
        mysqli_close($link);

        //將資料寫入cookie:
        setcookie("id",$id);
        setcookie("passed","TRUE");
        header("location:./web-06-main.php");
    }
?>