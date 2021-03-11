<?php
session_start();
if (!isset($_SESSION['customer'])) {
	echo "<script>alert(\"請先登入再進行結帳。\");</script>";
	echo '<meta http-equiv="refresh" content="0; url=../login.html">';	
}else if (empty($_SESSION['Myproduct'])) {
	echo "<script>alert(\"購物車內無商品。\");</script>";	
	require 'headerPurchase.php';
	echo "<h1>購物車</h1><br><table><tr>
	<th><font color='#fff'>商品編號</font>
	<th><font color='#fff'>商品名稱</font>
	<th><font color='#fff'>商品價格</font>
	<th><font color='#fff'>商品數量</font>
	<th><font color='#fff'>小計</font>
	<th colspan='2'><font color='#fff'>變更明細</font></table><br>";
	echo "</div></div>";
	require 'footer.php';
}else {
	require 'headerPurchase.php';
	echo '購買人：'.$_SESSION['customer']['name']."<br><br>";
	echo '電話：'.$_SESSION['customer']['phone']."<br><br>";
	echo '電子信箱：'.$_SESSION['customer']['email']."<br><br><hr>";
	echo "<br><table><tr><th>商品編號<th>商品名稱<th>商品價格<th>商品數量<th>小計<th colspan='2'>變更明細";
	require 'cart.php';
	echo "</table><br><hr>";
	echo '<br>請確認內容無誤後，再按下確定購買開始結帳。<br><br>';
	echo '<a href="purchase-output.php">確定購買</a>';
	echo "</div></div>";
	require 'footer.php';
}
?>