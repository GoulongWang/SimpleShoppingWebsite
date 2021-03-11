<?php
include("mysql.php");
// 判斷 session 是否已啟動
if(!isset($_SESSION)) session_start();
unset($_SESSION['customer']);
$sql = "SELECT * FROM toynet.member WHERE account = '{$_REQUEST['loginID']}' AND password = '{$_REQUEST['passwd']}'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))
	$_SESSION['customer'] = ['mId' => $row['mId'], 
							 'password' => $row['password'], 
							 'name' => $row['name'], 
							 'account' => $row['account'], 
							 'phone' => $row['phone'], 
							 'email' => $row['email']];

if (isset($_SESSION['customer'])) {
	if(!empty($_SESSION['check_word']) && !empty($_POST['checkword'])){  // 判斷此兩個變數是否為空
    	if($_SESSION['check_word'] == $_POST['checkword']){
        	$_SESSION['check_word'] = ''; // 比對正確後，清空將 check_word 值
          	header('content-Type: text/html; charset=utf-8');
          	if ($_REQUEST['loginID'] == 'root' && $_REQUEST['passwd'] == '1111')
          		echo '<meta http-equiv="refresh" content="0; url=../backstage.php">';
          	else {
          		require 'headerLogin.php';	
          		echo "<center>親愛的 ".$_SESSION['customer']['name']." 歡迎光臨</center>";
          		require 'footer.php';
          	}
     	}else {
     		echo "<script>alert(\"驗證碼輸入錯誤 !\");</script>";
     		echo '<meta http-equiv="refresh" content="0; url=../login.html">';
     	}
	}
}else {
	echo "<script>alert(\"登入帳號或密碼有誤 !\");</script>";
	echo '<meta http-equiv="refresh" content="0; url=../login.html">';
}
?>