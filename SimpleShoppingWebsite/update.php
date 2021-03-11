<?php
include("php/mysql.php");
if (!empty($_GET['edit'])){
	$result = mysqli_query($conn, "SELECT * FROM toynet.toy WHERE toyId = '{$_GET['edit']}'");
	$row = mysqli_fetch_array($result);
}else header("Location:backstage.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/homePage_css.css">
	<title>玩具商城-會員登入</title>
</head>
<body>
	<!-- 主選單區 -->
	<div id="NAV">
		<ul>
			<li><a href="homePage.php">首頁</a>
			<li><a href="">金屬模型</a>
			<li><a href="">益智玩具</a>
			<li><a href="">遙控玩具</a>
			<li><a href="">玩偶</a>
			<li><a href="php/history.php">購買紀錄</a>
			<li><a href="php/logout.php">登出</a>
	</div>

	<!-- 內容區 -->
	<div id="CONTENT">
		<form class="login" method="POST" action="php/updateData.php">
			<h1>更新資料</h1><br>
			<h2>商品名稱 : <?php echo $row['toyName'];?></h2><br>
			<h2>商品價格</h2><br>
			<input value="<?php echo $row['toyPrice'];?>" type="text" maxlength="7" required onkeyup="this.value=this.value.replace(/\D|^0/g,'')" onafterpaste="this.value=this.value.replace(/\D|^0/g,'')" name="toyPrice">
			<input name="id" type="hidden" value="<?php echo $row['toyId'];?>">
			<button type="submit"　name="Submit">送出</button>
    	</form>
	</div>	

    <!-- 頁尾區 -->
	<div id="FOOTER">
		<h2>
		<p>
		訂閱玩具商城電子報，好康消息第一手知道<br>
		<!-- 可能會加個輸入電子郵件的東西在這 -->
		客服時間 : 週一 ~ 週六 9:00 ~ 21:00；週日 9:00 ~ 18:00<br>
		客服電話: (04) 1234-5678，服務信箱 :TEST@gmail.com<br>
		</p>
		<ul>
			<li><a href="">關於我們</a>
			<li><a href="">聯絡我們</a>
			<li><a href="">常見問題</a>
			<li><a href="">隱私權聲明</a>
			<li><a href="">免責聲明</a>	
		</h2>
	</div>
</body>
</html>