<?php





function sanitize_string($string) {
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = htmlentities($string);
    $string = htmlspecialchars(trim($string));
    return $string;
}


//Debug mod switch

define("DEBUG_MODE_ON", 0);

if(DEBUG_MODE_ON) {
    error_reporting(E_ALL);
}
else {
    error_reporting(0);
}


//Page Switcher
function page_switch($page) {

    $page = sanitize_string($page);

    switch ($page) {
        case 'catalog':     include "templates/catalog.template.php";break;
        case 'product':     include "templates/product.template.php";break;
        case 'register':    include "templates/register.template.php";break;
        case 'cart':    include "templates/cart.template.php";break;
        case 'actions':    include "templates/actions.template.php";break;
        case 'checkout':    include "templates/checkout.template.php";break;
        case 'articles':    include "templates/articles.template.php";break;
        case 'admin':    include "templates/adminLogin.template.php";break;
        case 'admin_menu':    include "templates/adminMenu.template.php";break;
        case 'orders_table':    include "templates/orders_table.template.php";break;

        default:     include "templates/welcome.template.php";       break;
    }


}
//Page title switcher
//It changes product title from DB
function switch_title($title) {

    $connection = new mysqli(DB_HOSTNAME, DB_LOGIN,DB_PASSWORD, DB_NAME);
    if(!$connection) die($connection->error);
    $id = sanitize_string($_GET['id']);
    $sql = "SELECT title FROM products WHERE id = '{$id}'";
    $result = $connection->query($sql);
    if(!$result) die($connection->error);
    $row = $result->fetch_assoc();

    sanitize_string($title);

    switch ($title) {
        case 'catalog':  return $title = 'SUPPLYMER - Каталог Товаров'; break;
        case 'cart':     return $title = 'SUPPLYMER - Корзина'; break;
        case 'register': return $title = 'SUPPLYMER - Регистрация'; break;
        case 'checkout': return $title = 'SUPPLYMER - Оформление заказа'; break;
        case 'articles': return $title = 'SUPPLYMER - Интересные статьи'; break;
        case 'product':  return $title = 'SUPPLYMER - ' . $row['title']; break;

        default: return  $title = "Интернет магазин SUPPLYMER, качественные БАДы и товары для красоты и здоровья."; break;
    }
}


