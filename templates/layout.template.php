<?php

include 'scripts/lib.inc.php';
include "scripts/db_connect.inc.php";
header("Cache-Control: no-cache, must-revalidate");
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta  name="description" content="Интернет магазин Supplymer - качественные БАДы и товары для красоты и здоровья">
    <meta name="keywords" content="БАДы, Биодобавки, Детокс, Здоровье, Антистресс, Спортивное питание, Оздоровление, Доставка по Украине, Омолаживание">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/glide.core.min.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto&display=swap" rel="stylesheet">



    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#000000">



    <title><?= switch_title($_GET['page']) ?></title>
</head>
<body>




<header class="main-page-header">
    <nav class="main-page-nav">

        <a href="/" class="main-page-nav-logo " id="applets-logo">
            <img src="img/logos/supplymer.svg" alt="HealthyHerb4you" class="main-page-logo-img">

        </a>

        <ul class="main-page-nav-list">



            <li class="nav-list-item"><a href="/" class="nav-list-item-url <? if($_SERVER['REQUEST_URI'] == '/') {echo 'active-item';}?>" id="main-page-url">Главная</a></li>
            <li class="nav-list-item"><a href="?page=catalog" class="nav-list-item-url <? if($_GET['page'] == 'catalog') {echo 'active-item';}?>">
                    Каталог Товаров</a></li>
            <li class="nav-list-item" id="pc-logo-i"> <a href="/" class="main-page-nav-logo" id="pc-logo">
                <img src="img/logos/supplymer.svg" alt="supplymer" class="main-page-logo-img">

                </a></li>
            <li class="nav-list-item"><a href="#contacts" class="nav-list-item-url">Контакты</a></li>
            <li class="nav-list-item"><a href="?page=articles" class="nav-list-item-url <? if($_GET['page'] == 'articles') {echo 'active-item';}?>">Полезная информация</a></li>
            <li>
           <? if($_COOKIE['user'] == 'guest') {
                echo "<button    class='nav-list-item-url sign-in-button'
                                                 name='sign-in-button'>Вход</button>";
                }
                else if($_COOKIE['user'] == 'customer') {
                    echo "<a href='scripts/logout.script.php' class='nav-list-item-url sign-in-button'>Выйти</a>";
                    echo "<a href='scripts/logout.script.php' class='nav-list-item-url sign-in-button'>Личный кабинет</a>";
                }
                else {
                    echo "<button    class='nav-list-item-url sign-in-button'
                                                 name='sign-in-button'>Выйти</button>";
                                    }?>
                </li>





        </ul>

        <div class="burger-menu-container">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <!-- -----------------login modal form----------------- -->
        <div class="login-modal-window-container">
            <div class="login-modal-cross"></div>
            <h3 class="modal-header">Войти</h3>
            <form class="modal-login-form" action="scripts/sign_in.script.php" method="POST">
                <label class="modal-login-form-label" for="modal-email">Email</label>
                <div class="modal-email-input-container">
                    <input class="modal-email-input" type="email" name="modal_email"
                           placeholder="Email" id="modal-email">
                    <div class="modal-email-icon"></div>
                </div>

                <label class="modal-pass-label" for="modal-pass">Пароль</label>

                <div class="modal-pass-input-container">
                    <input class="modal-pass-input" type="password" name="modal_pass" placeholder="Password"
                           id="modal-pass">
                    <div class="modal-pass-icon"></div>
                </div>

                <label class="hidden" for="modal-repass">Повторите пароль</label>
                <input class="modal-repass-input hidden" type="password" name="modal-repassword" placeholder=""
                       id="modal-repass">
                <div class="modal-remember-container">
                    <label for="modal-remember" class="remember-label">Запомнить
                        <input class="modal-forgot-input" type="checkbox" name="forgot-pass" id="modal-remember"></label>

                    <input class="modal-send-input" type="submit" value="Отправить">
                </div>

            </form>

            <h3 class="modal-header">Или</h3>

            <div class="modal-login-socnetworks-container">
                <span class="social-network-login-item google"></span>
                <span class="social-network-login-item facebook"></span>
                <a class="social-network-login-item register" href="?page=register"></a>
            </div>
        </div>
        <!-- -----------------login modal form----------------- -->



    </nav>


</header>

<main class="main-page-content">

    <div class="basket-status-bar">
        <?php





        ?>
        <span class="basket-status-text">Статус:</span>
        <span class="basket-status-price"><?echo $_SESSION['status']; unset($_SESSION['status'])?></span>
        <a href="?page=cart" class="cart-button" name="cart-button">s</a>
    </div>

    <div class="search-bar">
        <form class="search-form" action="#" method="post">
            <label for="search-form"></label>
            <input class="search-form-item search-form-item-input" type="search" name="search-item"
                   placeholder="Найти товар..." id="search-form">

            <button type="submit" class="search-form-item search-form-item-button" name="search-button"></button>
        </form>
    </div>



    <?php page_switch($_GET['page']); ?>




</main>

<?php include 'footer.template.php';?>

<script src="js/scripts.js"></script>
<script src="js/glide.min.js"></script>
<script>
    new Glide('.glide').mount()
</script>
<script>

</script>


</body>
</html>
