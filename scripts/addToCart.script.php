<?php

session_start();

include 'lib.inc.php';
include 'db_connect.inc.php';

$productId = $_POST['product_id'];
sanitize_string($productId);
$qty = 1;
$product_qty = $qty;


$product_qty = sanitize_string($_POST['product_qty']);
if($product_qty == 0) {
    $product_qty = $qty;
}

$p_page = $_SERVER['HTTP_REFERER'];



if(isset($_SESSION['cart'][$productId])) {
    $_SESSION['cart'][$productId] = $product_qty;

} else {

    $_SESSION['cart'][$productId] = $qty;
    $_SESSION['status'] = "Товар добавлен в корзину!";
}


header("Location: {$p_page}");