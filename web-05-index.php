<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP練習-留言板</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="./js/web-05.js"></script>
</head>
<body>
    <p><h3>留言板</h3></p>
    <?php
        require_once("./php/dbtool.inc.php");
        
        //設定每頁顯示幾筆紀錄:
        $records_per_page = 5;

        //取得要顯示第幾頁的紀錄，預設為第一頁:
        if(isset($_GET["page"]))
            $page = $_GET["page"];
        else
            $page = 1;
        
        //建立資料連結:
        $link = create_connection();

        //執行SQL查詢:
        $sql = "SELECT * FROM message ORDER BY date DESC";
        $result = exe_sql($link, "guestbook", $sql);

        //取得記錄筆數:
        $total_records = mysqli_num_rows($result);

        //計算總頁數:
        $total_pages = ceil($total_records/$records_per_page);

        //計算本頁第一筆紀錄的序號:
        $start_record = $records_per_page*($page-1);

        //將紀錄移至本頁第一筆的序號:
        mysqli_data_seek($result, $start_record);

        //表格:
        echo "<table width='800' align='center' cellspacing='3'>";
        //使用陣列儲存背景顏色:
        $bg[0]="#D9D9FF";
        $bg[1]="#ffcaee";
        $bg[2]="#ffffcc";
        $bg[3]="#b9eeb9";
        $bg[4]="#b9e9ff";
        //顯示紀錄:
        $j=1;
        while($row = mysqli_fetch_assoc($result) and $j<=$records_per_page)
        {
            echo "<tr bgcolor=".$bg[$j-1]."><td>作者:".$row["author"]."<br>";
            echo "主題:".$row["subject"]."<br>";
            echo "時間:".$row["date"]."<hr>";
            echo $row["content"]."</td></tr>";
            $j++;
        }
        echo "</table>";

        //導覽列:
        echo "<p align='center'>";
        if($page>1)
            echo "<a href='./web-05-index.php?page=".($page-1)."'>上一頁</a>";
        for($i=1;$i<=$total_pages;$i++)
        {
            if($i==$page)
                echo "$i";
            else
                echo "<a href='./web-05-index.php?page=$i'>$i</a>";
        }
        if($page<$total_pages)
            echo "<a href='./web-05-index.php?page=".($page+1)."'>下一頁</a>";
        echo "</p>";

        //釋放記憶體:
        mysqli_free_result($result);
        mysqli_close($link);
    ?>
    <form name="myform" method="post" action="./web-05-post.php">
        <table border="0" width="800" align="center" cellspacing="0">
            <tr bgcolor="#0084CA" align="center">
                <td colspan="2">
                    <font color="#FFFFFF">請輸入新的留言</font>
                </td>
            </tr>
            <tr bgcolor="#D9F2FF">
                <td width="15%">作者</td>
                <td width="85%">
                    <input name="author" type="text" size="50">
                </td>
            </tr>
            <tr bgcolor="#84d7ff">
                <td width="15%">主題</td>
                <td width="85%">
                    <input name="subject" type="text" size="50">
                </td>
            </tr>
            <tr bgcolor="#D9F2FF">
                <td width="15%">內容</td>
                <td width="85%">
                    <textarea name="content" cols="50" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="button" value="張貼留言" onClick="check_data()">
                    <input type="reset" value="重新輸入">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>