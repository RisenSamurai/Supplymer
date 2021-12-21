<?php

include 'config.inc.php';
include 'lib.inc.php';
$connection = new mysqli(DB_HOSTNAME, DB_LOGIN,DB_PASSWORD, DB_NAME);
if(!$connection) die ($connection->error);





if( isset($_POST['register_email']) &&
    isset($_POST['register_pass']) &&
    isset($_POST['register_repass'])
) {
    $message = '';
    $email = sanitize_string($_POST['register_email']);
    $pass  = sanitize_string($_POST['register_pass']);
    $repass  = sanitize_string($_POST['register_repass']);

    $sql = "SELECT email FROM customer where email='{$email}'";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    $verify_email = $row['email'];





   if($verify_email == $email) {
       session_start();
       $_SESSION['message'] = '<p class="alert">Пользователь с таким почтовым адресом уже зарегистрирован!</p>';
       header("Location: ../?page=register&email={$email}");
   }



    if($pass != $repass) {
        session_start();
        $_SESSION['message'] = '<p>Пароли не совпадают!</p>';
        header("Location: ../?page=register&email='{$email}'");
    }

    if($pass == $repass && $verify_email !=$email) {

        $token = password_hash($pass, PASSWORD_BCRYPT);

        $stmt = $connection->prepare("INSERT INTO customer(email, password) VALUES (?,?)");
        $stmt->bind_param('ss',$email, $token);
        $stmt->execute();
        $id = mysqli_insert_id($connection);
        $stmt->close();
        $connection->close();

        session_start();
        setcookie('user', 'customer', time() + 10000, '/');
        setcookie('user_id', $id, time() + 10000, '/');
        $_COOKIE['user'] = 'customer';
        $_SESSION['user'] = 'customer';
        $_SESSION['user_id'] = $id;
        $_SESSION['message'] = "<p>Регистрация прошла успешно! Добро пожаловать в наш магазин!</p>";
        header("Location: ../");




    }


}



