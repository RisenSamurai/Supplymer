<?php
include 'config.inc.php';
include 'lib.inc.php';
$connection = new mysqli(DB_HOSTNAME, DB_LOGIN,DB_PASSWORD, DB_NAME);
unset($_COOKIE['user']);

if(!$connection) die ($connection->error);





if( isset($_POST['modal_email']) &&
    isset($_POST['modal_pass'])) {

    $email = sanitize_string($_POST['modal_email']);
    $pass  = sanitize_string($_POST['pass']);

    $sql = "SELECT email, password, id FROM customer WHERE email = '{$email}'";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $connection->close();




    $hash = password_hash($pass, PASSWORD_BCRYPT);
    $db_pass = $row['password'];
    $db_email = $row['email'];
    $user_id = $row['id'];





    if(password_verify($pass,$hash) && $db_email == $email) {
        setcookie('user_id', $user_id );
        setcookie('user', 'customer', time() +(60*60*24*30), '/');
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user'] = 'customer';
        header('Location: ../');
    }

    else {
        session_start();
        $_SESSION['message'] = "<p class='alert'>Неправильный логин или пароль!</p>";
        header('Location: ../');
    }


}

else {
    session_start();
    $_SESSION['message'] = "<p class='alert'>PIZDA BRAT!</p>";
    header('Location: ../');
}
