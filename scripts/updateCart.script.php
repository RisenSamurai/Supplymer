<?php

session_start();

if(isset($_POST['product_id'])) {

    $p_page = $_SERVER["HTTP_REFERER"];




    header("Location: {$p_page}");

}
