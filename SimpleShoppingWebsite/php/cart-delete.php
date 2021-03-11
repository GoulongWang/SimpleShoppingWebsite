<?php
require 'headerCart.php';
session_start();
unset($_SESSION['Myproduct'][$_REQUEST['id']]);
echo "<script>alert(\"所選商品已移除購物車。\");</script>";
require 'cart.php';
echo "</table><br></div></div>";
require 'footer.php';
?>