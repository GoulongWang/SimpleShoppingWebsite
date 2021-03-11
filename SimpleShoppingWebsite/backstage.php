<?php
include("php/mysql.php");
// 根據 $_GET['order'] 參數值決定排序方式
if(empty($_GET['order']) || !is_numeric($_GET['order']) || $_GET['order'] < 1 || $_GET['order'] > 3) {
	$field ='toyId';
	$order = 0; // 建立頁次連結時使用的參數
} else if($_GET['order'] == 1) {
	$field = 'toyName';
	$order = 1;
} else if($_GET['order'] == 2) {
	$field = 'toyPrice';
	$order = 2;
} else if($_GET['order'] == 3) {
	$field = 'classID';
	$order = 3;
}

/*
根據 $_GET['page'] 參數值決定從第幾頁開始顯示
以下 if 判斷四種狀況，成立時頁次的變數 $page 由 1 起算
*/
$strSrh = "";
if(isset($_POST["actSrh"]))
	if (!empty($_POST['nameSrh'])) 
		$strSrh = "WHERE toyName Like '%".$_POST['nameSrh']."%'";

$result = mysqli_query($conn, "SELECT toyId, toyName, classID, toyPrice FROM toynet.toy ".$strSrh." ORDER BY $field");
$totalrow = mysqli_num_rows($result);
$perpage = 10;
$totalpage = ceil($totalrow / $perpage);
if(empty($_GET['page']) || !is_numeric($_GET['page']) || $_GET['page'] < 1 || $_GET['page'] > $totalpage) 
	$page = 1;
else $page = $_GET['page'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/homePage_css.css">
	<link rel="stylesheet" type="text/css" href="css/backstage.css">
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
			<li><a href="homePage.php">首頁</a>
			<li><a href="backstage.php">商品清單</a>
			<li><a href="upload.php">新增商品</a>
			<li><a href="">遙控玩具</a>
			<li><a href="">玩偶</a>
			<li><a href="">排行榜</a>
			<li><a href="php/logout.php">登出</a>
	</div>

	<!-- 內容區 -->
	<div id="CONTENT">
		<div id="TEST">
			<h1>商品清單</h1><br>
			<form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
				<input type="text" name="nameSrh">
				<button name="actSrh" type="submit">搜尋</button>	
			</form>
			<p>總資料筆數：<?php echo $totalrow;?></p><br>
			<table>
				<tr>
				<th><a href="<?php $_SERVER['PHP_SELF']?>?order=0">商品編號</a>
				<th><a href="<?php $_SERVER['PHP_SELF']?>?order=1">商品名稱</a>
				<th><a href="<?php $_SERVER['PHP_SELF']?>?order=2">商品價格</a>
				<th><a href="<?php $_SERVER['PHP_SELF']?>?order=3">商品類別</a>
				<th colspan="2">編輯資料
				<?php
				While ($arr = mysqli_fetch_array($result)) $data[] = $arr;
				if (mysqli_num_rows($result) >0)
					for($i = 0; $i < $perpage; $i++){
						$index = ($page - 1) * $perpage + $i;
						if($index >= count($data)) break;
 						echo "<tr><td id=\"toyId\">{$data[$index]['toyId']}
						  	  <td id=\"toyName\">{$data[$index]['toyName']}
						  	  <td id=\"toyPrice\">{$data[$index]['toyPrice']}
						  	  <td id=\"classID\">{$data[$index]['classID']}
						  	  <td><a href=update.php?edit={$data[$index]['toyId']}>更新</a>
						  	  <td><a href=delete.php?del={$data[$index]['toyId']}>刪除</a>";  
					}
				?>

			</table><br>
			<p>
				<?php
				// 頁數選擇
				for($i = 1; $i <= $totalpage; $i++){
 					if($i != 1) echo "&nbsp;";
 					if($i == $page) echo "<span style=\"color: #000\">$i</span>";
 					else echo sprintf("<a href='%s?page=%d&order=%d'>%d</a>", $_SERVER['PHP_SELF'], $i , $order, $i);
				}
				?>
			</p>
		</div>
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