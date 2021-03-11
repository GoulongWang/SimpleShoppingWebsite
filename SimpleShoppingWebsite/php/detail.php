<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>玩具商城</title>
	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" type="text/css" href="../css/homePage_css.css">
	<style>
		a{
			color: #454545;
		}
		a:hover{
			color: #000;
			text-decoration: underline; 
		}
	</style>
</head>
<body>
	<!-- 主選單區 -->
	<div id="NAV">
		<ul>
			<li><a href="../homePage.php">首頁</a>
			<li><a href="../homePage.php">金屬模型</a>
			<li><a href="../homePage.php">益智玩具</a>
			<li><a href="../homePage.php">遙控玩具</a>
			<li><a href="../homePage.php">玩偶</a>
			<li><a href="history.php">購買紀錄</a>
			<li><a href="../login.html">登入</a>
	</div>

	<!-- 內容區 -->
	<div id="CONTENT">
	<center>
		<?php
		include("mysql.php");
		echo '<form method="POST" action="cartInsert.php">';
		$result = mysqli_query($conn, "SELECT * FROM toynet.toy WHERE toyId = ".$_REQUEST['id']);
		while($row = mysqli_fetch_array($result)){
			echo "<h1 style='font-size: 35px'>".$row['toyName']."</h1><br><br>";
			echo "<img src='../img/".$row['toyImage']."'><br><br>";
			echo "<span style='font-size: 20px'>價格 : NT$ ".$row['toyPrice']."</span>";	
			echo "<br><br>";
			echo '<span style="font-size: 20px">數量 : <select name="count">';
			for($i = 1; $i <= 10; $i++) echo "<option value='$i'>$i</option>";
			echo '</select></span><br><br>';
			echo '<input type="hidden" name="toyIdFromDetail" value="'.$row['toyId'].'">';
			echo '<input type="hidden" name="toyName" value="'.$row['toyName'].'">';
			echo '<input type="hidden" name="toyPrice" value="'.$row['toyPrice'].'">';
			echo '<button type="submit">放入購物車</button><br><br>';
			//echo '<a href="favoriteInsert.php?id="'.$row['toyId'].'">加入願望清單</a>';
		}
		?>
		</form>
	</center>
<?php require 'footer.php';
?>