<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP練習2</title>
</head>
<?php
    require_once("./php/dbtool.inc.php");
    $link = create_contection();
    $sql = "SELECT * FROM friend_club";
    $result = exe_sql($link, "friend", $sql);

    //--------------------分頁顯示--------------------
    //一頁5筆:
    $records_per_page = 5;

    //取得要顯示第幾頁:
    if(isset($_GET["page"]))
        $page = $_GET["page"];
    else
        $page = 1;

    //取得欄位數目:
    $total_fields = mysqli_num_fields($result);

    //取得紀錄筆數:
    $total_records = mysqli_num_rows($result);

    //計算總頁數:
    $total_pages = ceil($total_records/$records_per_page);

    //計算第一筆紀錄的序號:
    $start_record = $records_per_page*($page-1);

    //移動紀錄指標:
    mysqli_data_seek($result,$start_record);

    //顯示欄位名稱:
    echo "<table border='1' width='800' align='center'>";
    echo "<tr align='center'>";
    for($i=0;$i<$total_fields;$i++)
        echo "<td>".mysqli_fetch_field_direct($result,$i)->name."</td>";
    echo "</tr>";

    //顯示紀錄:
    $j=1;
    while($row = mysqli_fetch_row($result) and $j <= $records_per_page)
    {
        echo "<tr>";
        for($i = 0; $i < $total_fields; $i++)
            echo "<td>$row[$i]</td>";
        $j++;
        echo "</tr>";
    }
    echo "</table>";

    //顯示導覽列:
    echo "<p align='center'>";
    if($page>1)
        echo "<a href='./mysql-02.php?page=".($page-1)."'>上一頁</a>";
        echo ".....";
    for($i=1;$i<=$total_pages;$i++)
    {
        if($i==$page)
            echo "$i.";
        else
            echo "<a href='./mysql-02.php?page=$i'>$i.</a>";
    }
    if($page < $total_pages)
        echo "....<a href='./mysql-02.php?page=".($page+1)."'>下一頁</a>";
    echo "</p>";

    //--------------------未分頁顯示--------------------
    mysqli_data_seek($result,0);
    echo "<p align='center'>一共".mysqli_num_rows($result)."筆</p>";
    echo "<table border='1' align='center'><tr align='center'>";
    for($i=0;$i<mysqli_num_fields($result);$i++)
        echo "<td>".mysqli_fetch_field_direct($result,$i)->name."</td>";
    echo "</tr>";
    while($row = mysqli_fetch_row($result))
    {
        echo "<tr>";
        for($i=0;$i<mysqli_num_fields($result);$i++)
            echo "<td>$row[$i]</td>";
        echo "</tr>";
    }
    echo "</table>";

    //釋放記憶體:
    mysqli_free_result($result);
    mysqli_close($link);
?>
<body>
    
</body>
</html>