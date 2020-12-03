<?php
    function create_contection()
    {
        $link = mysqli_connect("localhost", "root", "rootroot") or die("無法建立資料連結<br>錯誤代碼:".mysqli_connect_errno."<br>錯誤訊息為:".mysqli_connect_error());
        mysqli_query($link, "SET NAMES utf8");
        echo "成功建立資料連接"."<br>";
        echo "MySQL用戶版本:".mysqli_get_client_info()."<br>";
        echo '$link連線主機為'.mysqli_get_host_info($link).'<br>';
        echo '$link的協定版本為'.mysqli_get_proto_info($link).'<br>';
        echo '$link的資料庫版本為'.mysqli_get_server_info($link)."<br>";
        return $link;
    }

    function exe_sql($link, $db, $sql)
    {
        mysqli_select_db($link, $db) or die("開啟資料庫失敗<br>錯誤訊息為:".mysqli_error($link));
        $result = mysqli_query($link, $sql);
        return $result;
    }
?>