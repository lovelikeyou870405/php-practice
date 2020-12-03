<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>恭喜註冊成功!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    $pw = $_POST["userpw"];
    $email = $_POST["useremail"];
    ?>
    <div class="alert alert-success" role="alert">
        恭喜您註冊成功!
    </div>
    <h5>您的電子信箱為:<?php echo $email; ?></h5><br>
    <h5>您的密碼為:<?php echo $pw; ?></h5>
    <h5>
        <a href="./web-01.html">回上頁</a>
    </h5>
</body>

</html>