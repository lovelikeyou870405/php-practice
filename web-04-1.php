<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>單一檔案上傳</title>
</head>

<?php
    //設定用來存放檔案的資料夾及檔名:
    $upload_dir = "./uploadFiles/";
    $upload_file = $upload_dir.iconv("UTF-8", "Big5", $_FILES["myfile"]["name"]);

    //將上傳的檔案由站存資料夾移至指定資料夾
    if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_file))
    {
        echo "<h3>檔案上傳成功</h3><hr>";

        //顯示檔案資訊:
        echo "檔案名稱:".$_FILES["myfile"]["name"]."<br>";
        echo "暫存檔名:".$_FILES["myfile"]["tmp_name"]."<br>";
        echo "檔案大小:".$_FILES["myfile"]["size"]."<br>";
        echo "檔案類型:".$_FILES["myfile"]["type"]."<br>";

        //顯示回上頁:
        echo "<a href='javascript:history.back()'>回上頁</a>";
    }
    else
    {
        echo "<h3>檔案上傳失敗</h3>";
        echo "<a href='javascript:history.back()'>重新上傳</a>";
    }
?>

<body>
    
</body>
</html>