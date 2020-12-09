<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>多個檔案上傳</title>
</head>
<?php
    //設定存放檔案的資料夾名稱:
    $upload_dir = "./uploadFiles/";

    for($i=0; $i<=3; $i++)
    {
        //若檔案名稱不是空字串，表示上傳成功，將暫存檔案移至指定資料夾:
        if($_FILES["myfile"]["name"][$i]!="")
        {
            //搬移檔案:
            $upload_file = $upload_dir.iconv("UTF-8", "Big5", $_FILES["myfile"]["name"][$i]);
            move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $upload_file);
            //顯示檔案資訊:
            echo "檔案名稱:".$_FILES["myfile"]["name"][$i]."<br>";
            echo "暫存檔名:".$_FILES["myfile"]["tmp_name"][$i]."<br>";
            echo "檔案大小:".$_FILES["myfile"]["size"][$i]."<br>";
            echo "檔案類型:".$_FILES["myfile"]["type"][$i]."<br>";
            echo "<hr>";
        }
    }
    echo "<a href='javascript:history.back()'>回上頁</a>";
?>
<body>
    
</body>
</html>