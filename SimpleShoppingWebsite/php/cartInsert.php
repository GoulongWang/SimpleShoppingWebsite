<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" type="text/css" href="../css/homePage_css.css">
	<link rel="stylesheet" type="text/css" href="../css/backstage.css">
	<title>玩具商城-後台管理</title>
	<style>
		a{
			color: #454545;
		}

		table{
			width: 700px;
			line-height: 35px;
			letter-spacing: 3px;
		}
		input[type="text"]{
			width: 50%;
		}
		#TEST{
			width: 800px;/*50%*/
			margin: 0 auto;
			padding: 25px;
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
			<li><a href="history.php">購買紀錄</a>
			<li><a href="purchaseInput.php">結帳</a>
			<li><a href="../login.html">登入</a>
	</div>

	<!-- 內容區 -->
	<div id="CONTENT">
		<div id="TEST">
			<h1>購物車</h1><br>
			<table>
				<tr>
				<th>商品編號
				<th>商品名稱
				<th>商品價格
				<th>商品數量
				<th>小計
				<th colspan="2">變更明細
				<?php
				session_start();
				$toyId = $_REQUEST['toyIdFromDetail'];
				if (!isset($_SESSION['Myproduct'])) $_SESSION['Myproduct'] = [];
				$count = 0;
				if (isset($_SESSION['Myproduct'][$toyId])) $count = $_SESSION['Myproduct'][$toyId]['count'];
				$_SESSION['Myproduct'][$toyId]=['id' => $_REQUEST['toyIdFromDetail'],
												'name' => $_REQUEST['toyName'], 
												'price' => $_REQUEST['toyPrice'], 
												'count' => $count + $_REQUEST['count']];
				echo "<script>alert(\"商品已成功放入購物車。\");</script>";
				require 'cart.php';
				?>
			</table><br>
		</div>
	</div>
<?php require 'footer.php';?>