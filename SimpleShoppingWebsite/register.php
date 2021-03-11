<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/homePage_css.css">
	<title>玩具商城-加入會員</title>
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
			<li><a href="login.html">登入</a>
	</div>

	<!-- 內容區 -->
	<div id="CONTENT">
		<form class="login" name="myForm" method="POST" action="php/memberRegister.php">
			<h1>加入會員</h1>
			<img src="img/user.png">
			<h2>會員帳號</h2>
			<!-- 只能輸入英文和數字 -->
			<input name="account" maxlength="20" type="text" onkeyup="value=value.replace(/[\W]/g,'')" required>
			<script>
				// 判斷密碼是否一樣
        		function check(){
					with(document.all)
						if(passwd1.value != passwd2.value){
							alert("兩次密碼輸入不一致");
							passwd1.value = "";
							passwd2.value = "";
						}
				}
			</script>
			<h2>會員密碼</h2>
			<input maxlength="20" type="password" id="passwd1" name="password" onkeyup="value=value.replace(/[\W]/g,'')" required>
			<h2>密碼確認</h2>
			<input maxlength="20" type="password" id="passwd2" onblur="check()" onkeyup="value=value.replace(/[\W]/g,'')" required>
			<h2>姓名</h2>
			<input type="text" maxlength="20" required name="name">
			<h2>電子郵件</h2>
			<script type="text/javascript" language="JavaScript">
				// 簡易版判斷信箱格式
				function checkEmail(remail) {
					if (remail.search(/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/) == -1){
						alert("Email 資料錯誤？請重新輸入！");
						email.value = "";
					}
				}
			</script>
			<input maxlength="25" id="email" name="email" type="text" required>
			<h2>手機</h2>
			<input maxlength="10" onkeyup="value=value.replace(/[^\d]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"required type="text" name="phone">
			<script>
				// 更新驗證碼的圖示
        		function refresh_code(){ 
            		document.getElementById("imgcode").src="php/captcha.php"; 
        		}
    		</script>
			<!--<h2>驗證碼</h2>
			<img id="imgcode" src="php/captcha.php" onclick="refresh_code()"/><br>
			<input type="text" name="checkword" size="10" maxlength="10" placeholder="點擊圖片可更新驗證碼" onkeyup="value=value.replace(/[\W]/g,'')" required/> -->

			<button type="submit"　name="Submit" onClick="checkEmail(document.myForm.email.value);">註冊</button>
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