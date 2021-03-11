<?php
require 'headerPurchase.php';
session_start();
if (isset($_SESSION['customer'])) {
	include 'mysql.php';
	$result = mysqli_query($conn, "SELECT * FROM purchase WHERE mId = ".$_SESSION['customer']['mId']." ORDER BY purchase_id DESC");
	while ($each_purchase = mysqli_fetch_array($result)) {
		$sql = "SELECT * FROM purchase_detail, toy WHERE purchase_detail.purchase_id = ".$each_purchase['purchase_id']." AND purchase_detail.toyId = toy.toyId";
		$sql_detail = mysqli_query($conn, $sql);
		echo '<table><tr><th>商品編號<th>商品名稱<th>價格<th>數量<th>小計';
		$total = 0;
		/*有bug有bug有bug有bug有bug有bug有bug有bug有bug有bug*/
		while ($row_detail = mysqli_fetch_array($sql_detail)) {
			echo '<tr><td>'.$row_detail['toyId'];
			echo '<td><a href="detail.php?id='.$row_detail['toyId'].'">'.$row_detail['toyName'].'</a>';
			echo '<td>'.$row_detail['toyPrice'];
			echo '<td>'.$row_detail['count'];
			$subtotal = $row_detail['toyPrice'] * $row_detail['count'];
			$total += $subtotal;
			echo '<td>'.$subtotal;
		}
		echo '<tr><td>合計<td><td><td><td>'.$total;
		echo '</table><hr>';
	}
} else echo "<script>alert(\"請先登入，才能查詢購買記錄。\");</script>";
echo "</div>";
require 'footer.php'; 
?>