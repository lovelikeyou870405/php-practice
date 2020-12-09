<?php
    require_once("./php/dbtool.inc.php");
    
    //取得表單資料:
    $account = $_POST["account"];   //帳號
    $password = $_POST["password"]; //密碼
    $name = $_POST["name"]; //暱稱
    $email = $_POST["email"];   //電子信箱
    $sex = $_POST["sex"];   //性別:男 女
    $bd = $_POST["bd"]; //生日:yyyy-mm-dd
    $address = $_POST["address"];   //通訊地址
    $bdarr = explode("-",$bd);  //生日陣列:[0]yyyy [1]mm [2]dd
    if(isset($_POST["telephone1"])&&isset($_POST["telephone2"]))
    {
        $telephone = $_POST["telephone1"].$_POST["telephone2"];
    }
    else
    {
        $telephone = "";
    }
    if(isset($_POST["cellphone1"])&&isset($_POST["cellphone2"]))
    {
        $cellphone = $_POST["cellphone1"].$_POST["cellphone2"];
    }
    else
    {
        $cellphone = "";
    }

    //建立資料連結:
    $link = create_connection();

    //檢查帳號:
    $sql = "SELECT * FROM user WHERE account='$account'";
    $result = exe_sql($link, "member_practice", $sql);
    if(mysqli_num_rows($result)!=0)
    {
        //該帳號有人使用:
        //釋放記憶體:
        mysqli_free_result($result);
        echo "<script>alert('這個帳號已存在，請使用其他帳號'); history.back();</script>";
    }
    else
    {
        //帳號沒有重複:
        //釋放記憶體:
        mysqli_free_result($result);

        //將會員資料寫入資料庫:
        $sql = "INSERT INTO user(account, password, name, sex, year, month, day, telephone, cellphone, address, email) VALUES('$account', '$password', '$name', '$sex', '($bdarr[0]-1911)', '$bdarr[1]', '$bdarr[2]', '$telephone', '$cellphone', '$address', '$email')";
        $result = exe_sql($link, "member_practice", $sql);
    }

    //關閉資料連結:
    mysqli_close($link);
    include('./web-06-join-success.html')
?>