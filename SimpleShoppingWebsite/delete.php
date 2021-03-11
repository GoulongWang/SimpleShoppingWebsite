<?php
header('Content-Type:text/html;charset=utf-8');
include("php/mysql.php");
if (!empty($_GET['del'])){
	mysqli_query($conn, "DELETE FROM toynet.toy WHERE toyId = '{$_GET['del']}'");
	$rowUpdated = mysqli_affected_rows($conn);
	if ($rowUpdated > 0) echo "<script>alert(\"刪除成功 !\");</script>";
	else echo "<script>alert(\"刪除失敗 !\");</script>";
}
echo "<script type='text/javascript'>window.location.href='backstage.php'</script>";
?>