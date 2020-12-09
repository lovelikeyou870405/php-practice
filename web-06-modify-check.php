<?php
    $id = $_COOKIE["id"];
    $password = $_POST["password"];
    $newpassword = $_POST["newpassword"];
    $chpassword = $_POST["chpassword"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $cellphone = $_POST["cellphone"];
    $address = $_POST["address"];

    if($password=="")
    {
        //判斷有沒有輸入密碼:
        echo "<script>alert('請輸入密碼'); history.back();</script>";
    }
    else
    {
        if($newpassword!="")
        {
            //判斷有無更改密碼:
            if($newpassword!=$chpassword)
            {
                //判斷兩組密碼是否相同:
                echo "<script>alert('兩次新密碼不相同'); history.back();</script>";
            }
        }
        else
        {
            //沒有更改密碼的話，就讓新密碼等於舊的密碼:
            $newpassword = $password;
        }

        if($name=="")
        {
            //若未輸入暱稱:
            echo "<script>alert('暱稱不可為空'); history.back();</script>";
        }

        if($email=="")
        {
            //若未輸入電子信箱:
            echo "<script>alert('電子信箱不可為空'); history.back();</script>";
        }

        require_once("./php/dbtool.inc.php");

        //資料庫連結:
        $link = create_connection();
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = exe_sql($link, "member_practice", $sql);
        $row = mysqli_fetch_object($result);
        $account = $row->account;

        //判斷密碼是否正確:
        if($password != $row->password)
        {
            //釋放記憶體:
            mysqli_free_result($result);
            mysqli_close($link);
            echo "<script>alert('密碼輸入錯誤'); history.back();</script>";
        }
        else
        {
            //密碼正確:
            mysqli_free_result($result);
            $sql = "UPDATE user SET password='$newpassword', name='$name', email='$email', telephone='$telephone', cellphone='$cellphone', address='$address' WHERE id='$id'";
            $result = exe_sql($link, "member_practice", $sql);
            //釋放記憶體:
            mysqli_close($link);
            //判斷是否有值:
            if($telephone=="")
                $telephone="未填寫";
            if($cellphone=="")
                $cellphone="未填寫";
            if($address=="")
                $address="未填寫";
            include('./web-06-modify-check.html');
        }
    }
    

?>