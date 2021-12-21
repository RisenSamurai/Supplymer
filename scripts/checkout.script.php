<?php
session_start();

include 'config.inc.php';
include 'lib.inc.php';
$connection = new mysqli(DB_HOSTNAME, DB_LOGIN,DB_PASSWORD, DB_NAME);
if(!$connection) die ($connection->error);

if($_COOKIE['user'] == 'guest') {

    if (isset($_POST['surname']) &&
        isset($_POST['name']) &&
        isset($_POST['secondname']) &&
        isset($_POST['phone']) &&
        isset($_POST['city']) &&
        isset($_POST['postNum']) &&
        isset($_POST['payment'])) {


        $surname = sanitize_string($_POST['surname']);
        $name = sanitize_string($_POST['name']);
        $secondName = sanitize_string($_POST['secondname']);
        $phone = sanitize_string($_POST['phone']);

        $city = sanitize_string($_POST['city']);
        $postNum = sanitize_string($_POST['postNum']);
        $payment = sanitize_string($_POST['payment']);
        $orderID = $_COOKIE['orderID'];
        $email = sanitize_string($_POST['email']);
        $orderTime = date("Y-m-d H:i:s");

        $total = $_SESSION['global_total'];


        $sql = "INSERT INTO order_table (order_number, surname, name, second_name, phone, email, city, post, payment, total,ordered_at) 
                VALUES ('{$orderID}', '{$surname}', '{$name}', '{$secondName}', '{$phone}', '{$email}', '{$city}','{$postNum}','{$payment}','{$total}','{$orderTime}')";

        $connection->query($sql);


        $id = mysqli_insert_id($connection);

        session_start();

        foreach ($_SESSION['cart'] as $key => $value) {
            $sql = "INSERT INTO orders_link (orderID,productID,qty) VALUES ('{$id}', '{$key}', '{$value}')";
            $connection->query($sql);
            if (!$connection) die($connection->error);
        }

        $_SESSION['message'] = "<p>Ваш заказ отправлен в обработку,
                            наш менеджер свяжется с вами как можно быстрее для подтверждения вашего заказа.</p>";

        $connection->close();

        header("Location: ../?page=actions");
    }
}


        header("Location: ../?page=actions");















