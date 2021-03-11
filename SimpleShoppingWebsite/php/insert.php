<?php
include("mysql.php");
$imgIsOK = 0;
$url = "../upload.php";
if (empty($_POST['toyClass'])) {
	echo "<script>alert(\"請選擇類別\");</script>";
	echo "<script type='text/javascript'>window.location.href='$url'</script>";
} 

if (empty($_FILES["toyImg"]["tmp_name"])) {
	// 有 bug，如果沒有選擇檔案還是會跳到 insert.php
	// 有 bug，如果沒有選擇檔案還是會跳到 insert.php
	// 有 bug，如果沒有選擇檔案還是會跳到 insert.php
	// 有 bug，如果沒有選擇檔案還是會跳到 insert.php
	// 有 bug，如果沒有選擇檔案還是會跳到 insert.php
	//echo "<script>alert(\"請選擇檔案 !\");</script>";	
	echo "<script type='text/javascript'>window.location.href='$url'</script>"; 
}else{
	move_uploaded_file($_FILES["toyImg"]["tmp_name"], "C:\\wamp64\\www\\myproject\\img\\".$_FILES["toyImg"]["name"]);
    $imgIsOK = 1;
}

if (!empty($_POST['toyName']) && !empty($_POST['toyPrice']) && !empty($_POST['toyClass']) && $imgIsOK && !empty($_POST['toyDescribe'])) {
	$toyName = strip_tags(addslashes(trim($_POST['toyName'])));
	$toyDescribe = str_replace(' ', '&nbsp;&nbsp;', nl2br(htmlspecialchars(trim($_POST['toyDescribe']))));
	$sql = "INSERT toy(toyName, description, classID, toyPrice, toyImage) 
			VALUES('{$toyName}', '{$toyDescribe}', {$_POST['toyClass']}, 
					{$_POST['toyPrice']}, '{$_FILES["toyImg"]["name"]}')";
	mysqli_query($conn, $sql);
	echo "<script>alert(\"新增資料成功 !\");</script>";
}
echo "<script type='text/javascript'>window.location.href='$url'</script>"; 
?>