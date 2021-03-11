<?php
include("mysql.php");
if (!empty($_SESSION['Myproduct'])) {
	$total = 0;
	foreach ($_SESSION['Myproduct'] as $key=>$value) {// $key 為$_SESSION['product']陣列中每個商品 id
		echo '<tr><td>'.$key;
		echo '<td><a href="detail.php?id='.$key.'">'.$value['name'].'</a>';
		echo '<td>'.intval($value['price']);
		echo '<td>'.intval($value['count']);
		$subtotal = intval($value['price']) * intval($value['count']);
		$total += $subtotal;
		echo '<td>'.$subtotal;
		echo '<td><a href="cart-delete.php?id='.$key.'">刪除</a>';
	}
	echo '<tr><td>合計<td><td><td><td>'.$total.'<td></table>';
}
?>