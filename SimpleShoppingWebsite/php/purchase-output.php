<?php
include("mysql.php"); 
session_start();
$purchase_id = 1;
$result = mysqli_query($conn, "SELECT MAX(purchase_id) FROM toynet.purchase");
while ($row = mysqli_fetch_array($result)) $purchase_id = $row['MAX(purchase_id)'] + 1;	
//echo mysqli_error($conn);
//echo '$purchase_id = '.$purchase_id."<br>";
//echo '$_SESSION[\'customer\'][\'mId\'] = '.$_SESSION['customer']['mId']."<br>";
$sql = "INSERT INTO toynet.purchase VALUES (".$purchase_id.", ".$_SESSION['customer']['mId'].")";
//echo $sql."<br>";
if (mysqli_query($conn, $sql)) {
	foreach ($_SESSION['Myproduct'] as $toyId => $toy)
		mysqli_query($conn, "INSERT INTO toynet.purchase_detail VALUES(".$purchase_id.", ".$toyId.", ".$toy['count'].")");
	unset($_SESSION['Myproduct']);
	echo "<script>alert(\"已完成訂購，謝謝您的惠顧。\");</script>";	
} else echo "<script>alert(\"很抱歉，結帳過程發生錯誤，無法完成訂購。\");</script>";
echo '<meta http-equiv="refresh" content="0; url=../homePage.php">';
?>