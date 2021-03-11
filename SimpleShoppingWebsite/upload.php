<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>玩具商城-後台管理</title>
	<link rel="stylesheet" type="text/css" href="css/homePage_css.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/upload.css">
</head>
<body>
	<!-- 主選單區 -->
	<div id="NAV">
		<ul>
			<li><a href="homePage.php">首頁</a>
			<li><a href="backstage.php">商品清單</a>
			<li><a href="upload.php">新增商品</a>
			<li><a href="">遙控玩具</a>
			<li><a href="">玩偶</a>
			<li><a href="">排行榜</a>
			<!-- <li><a href="">搜尋功能</a> 還不確定要放哪-->
			<li><a href="login.html">登入</a>
	</div>

	<!-- 內容區 -->
	<div id="CONTENT">
		<script type="text/javascript" src="js/upload.js"></script>
		<Form class="login" Action="php/insert.php" Method="POST" Enctype="multipart/form-data" onsubmit="return check();">
			<h1>商品資料新增</h1>
			<img src="img/goods.png">
			<h2>商品名稱</h2>
			<input type="text" maxlength="20" required name="toyName">
			<h2>商品價格</h2>
			<!-- 商品價格一定大於 0 -->
			<input type="text" maxlength="7" required onkeyup="this.value=this.value.replace(/\D|^0/g,'')" onafterpaste="this.value=this.value.replace(/\D|^0/g,'')" name="toyPrice">
			<h2>商品類別</h2>
			<!-- 如果沒有選擇類別，要跳出提示(沒做JS) -->
			<!-- 如果沒有選擇類別，要跳出提示(沒做JS) -->
			<!-- 如果沒有選擇類別，要跳出提示(沒做JS) -->
			<!-- 如果沒有選擇類別，要跳出提示(沒做JS) -->
			<!-- 如果沒有選擇類別，要跳出提示(沒做JS) -->
			<!-- 如果沒有選擇類別，要跳出提示(沒做JS) -->
			<script type="text/javascript">
				//if(document.)
			</script>
			<select name="toyClass">
				<option value="" selected>請選擇</option>
				<?php
				include("php/mysql.php");
				// 商品類別的結果
				$list = mysqli_query($conn, "SELECT * FROM toynet.toyclass");
				while ($result = mysqli_fetch_assoc($list))
					echo "<option value=".$result['classID'].">{$result['className']}</option>";
				?>
			</select>

			<h2>商品圖片</h2>
			<Input Type="File" name="toyImg" id="toyImg" accept="image/*" onchange="checkfile(this);">
			<h2>商品描述</h2>
			<textarea title="最多輸入 200 個字元" placeholder="最多輸入 200 個字元" maxlength="200" onkeyup="return isMaxLen(this)" cols="30" rows="10" name="toyDescribe" required></textarea><br>
			<button type="Submit" id="btnLoad">新增</button>
			<!-- 有 bug，如果沒有選擇檔案還是會跳到 insert.php -->
			<!-- 有 bug，如果沒有選擇檔案還是會跳到 insert.php -->
			<!-- 有 bug，如果沒有選擇檔案還是會跳到 insert.php -->
			<!-- 有 bug，如果沒有選擇檔案還是會跳到 insert.php -->
			<!-- 有 bug，如果沒有選擇檔案還是會跳到 insert.php -->
			<!-- 有 bug，如果沒有選擇檔案還是會跳到 insert.php -->
			<script type="text/javascript">
				document.getElementById("btnLoad").addEventListener("click", function(event) {
  					var fileinput = document.getElementById("toyImg");
  					if (!fileinput.files[0]) {
  						alert("請選擇檔案 !!!");
  						return false;	
  					}
				}, false);
			</script>
		</Form>
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