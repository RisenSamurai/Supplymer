<?php

include 'lib.inc.php';
include 'db_connect.inc.php';


if( isset($_POST['admin_email'])) {


    $admin_email = sanitize_string($_POST['admin_email']);
    $admin_pass = sanitize_string($_POST['admin_pass']);


    $token = '$2y$10$o6Xe3vHzRw2/556Q3Mb1T.yTtKEb0RXODxv1qyRFG8w6jqVmAkC5O';

    if ($admin_email == 'email' && $admin_pass == 'password') {
        session_start();
        $_SESSION['user'] = 'admin';
        $_SESSION['message'] = 'Welcome home samurai!';

        header('Location: ../?page=admin_menu');

    } else {
        header('Location: ../?page=catalog');
    }

}


