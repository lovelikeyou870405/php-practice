<?php
    //產生隨機5位數:
    $pass_id = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    $email = $_POST["email"];
    $account = $_POST["account"];
    echo $pass_id.$email.$account;

    //檢查帳號是否存在:
    require_once('./php/dbtool.inc.php');
    $link = create_connection();
    $sql = "SELECT * from user WHERE account='$account'";
    $result = exe_sql($link, "member_practice", $sql);
    $row = mysqli_fetch_object($result);
    
    if(mysqli_num_rows($result)<1)
    {
        echo "<script>alert('輸入的帳號不存在'); history.back();</script>";
    }
    else
    {
        //設定主旨:
        $subject = "密碼驗證信";
        //將編碼方式設為utf-8，並進行base64編碼，避免郵件標題亂碼:
        $subject = "=?utf-8?B?".base64_encode($subject)."?=";

        //設定郵件內容:
        $message = "親愛的用戶，您好\n\n 您的密碼驗證碼為: ".$pass_id;

        //傳送郵件:
        //mail($email, $subject, $message);

        echo "您的密碼 : ".$row->password;
        echo "<a href='./web-06-index.html'>回登入</a>";
    }
?>