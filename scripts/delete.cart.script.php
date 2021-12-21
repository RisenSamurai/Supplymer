<?php
session_start();



$p_page = $_SERVER['HTTP_REFERER'];

if(isset($_POST['remove'])) {
    $id = htmlspecialchars($_GET['id']);
    if($_GET['action'] == 'remove') {
       unset($_SESSION['cart'][$id]);
        header("Location: {$p_page}");

    }
}

