<?php
include 'mysql.php';
session_start();
$searchID = "SELECT * FROM toynet.member WHERE account = '".$_REQUEST['account']."'";
$result = mysqli_query($conn, $searchID);
if (!mysqli_fetch_array($result)) {
	$sql = "INSERT INTO toynet.member(account, password, phone, email, name) VALUES('".$_REQUEST['account']."', '".$_REQUEST['password']."', '".$_REQUEST['phone']."', '".$_REQUEST['email']."', '".$_REQUEST['name']."')";
	mysqli_query($conn, $sql);
	echo "<script>alert(\"會員註冊成功。\");</script>";
	echo '<meta http-equiv="refresh" content="0; url=../login.html">';
} else {
	echo "<script>alert(\"此 ID 已被使用，請重新設定。\");</script>";	
	echo '<meta http-equiv="refresh" content="0; url=../register.php">';
}
?>