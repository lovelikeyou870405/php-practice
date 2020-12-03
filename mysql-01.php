<?php
    $link = mysqli_connect("localhost","root","rootroot") or die("無法建立資料連接"."<br>錯誤代碼為:".mysqli_connect_errno()."<br>錯誤訊息為".mysqli_connect_error());
    echo "成功建立資料連接"."<br>";
    echo "MySQL用戶版本:".mysqli_get_client_info()."<br>";
    echo '$link連線主機為'.mysqli_get_host_info($link).'<br>';
    echo '$link的協定版本為'.mysqli_get_proto_info($link).'<br>';
    echo '$link的資料庫版本為'.mysqli_get_server_info($link)."<br>";
    mysqli_close($link);
?>