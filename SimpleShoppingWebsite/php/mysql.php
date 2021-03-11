<?php
$conn = @mysqli_connect("localhost", "root", "", "toynet");
if (mysqli_connect_errno($conn)) die("無法連線資料庫伺服器");
mysqli_set_charset($conn, "utf8");
?>