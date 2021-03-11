<?php

header('Content-Type: text/html; charset=utf-8');
include("mysql.php");
if (!empty($_POST['id']) && !empty(['toyPrice'])){
	mysqli_query($conn, "UPDATE toynet.toy SET toyPrice = '{$_POST['toyPrice']}' WHERE toyId = '{$_POST['id']}'");
	$rowUpdated = mysqli_affected_rows($conn);
	if ($rowUpdated > 0) echo "<script>alert(\"資料更新成功 !\");</script>";
	else echo "<script>alert(\"資料更新失敗, 或者您輸入的資料與原本相同 !\");</script>";
}
echo "<script type='text/javascript'>window.location.href='../backstage.php'</script>";
?>