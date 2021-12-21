<?php
session_start();
header("Clear-Site-Data: 'cache', 'cookies', 'storage', 'executionContexts'");


if(empty($_SESSION['user'])) {
    $_SESSION['user'] = 'guest';
}


if(empty($_COOKIE['user'])) {
    setcookie('user', 'guest', time() +3600);
    setcookie('orderID', uniqid());
}





include 'templates/layout.template.php';




