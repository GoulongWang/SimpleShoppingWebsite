<?php
session_start();
if (isset($_SESSION['customer'])) {
	unset($_SESSION['customer']);
	echo "<script>alert(\"登出成功。\");</script>";
} else echo "<script>alert(\"您原本就已登出。\");</script>";
echo '<meta http-equiv="refresh" content="0;url=../homePage.php">';
?>