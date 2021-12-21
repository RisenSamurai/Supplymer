<?php
$connection = new mysqli(DB_HOSTNAME, DB_LOGIN,DB_PASSWORD, DB_NAME);
$productId = sanitize_string($_GET['id']);
$sql = "SELECT id, title, body, price, img_path, category FROM products WHERE id = {$productId}";
$result = $connection->query($sql);


if(!$result) die ($connection->error);

$row = $result->fetch_assoc();

$sub_total = ($row['price'] / 100) * $row['discount'];
$grand_total = $row['price'] - $sub_total;

header("Cache-Control: no-cache, must-revalidate");


?>

<ul class="breadcrumbs-container">
    <li class="breadcrumb-item"><a href="#">Главная</a></li>
    <li class="breadcrumb-item"><a href="?page=catalog">Каталог</a></li>
    <li class="breadcrumb-item"><a href="?page=catalog&id=<?= $row['id'] ?>"><?= $row['title'] ?></a></li>
</ul>
<section class="sections goods-section">


    <div class="product-page-top">
        <figure class="main-page-promo-goods product-page-figure">
            <a class="promo-goods-img-url" href="#">
                <img src="<?= $row['img_path'] ?>" alt="<?= $row['title'] ?>" class="main-page-promo-img">
            </a>
            <h2 class="product-title"><?= $row['title'] ?></h2>
            <div class="goods-price"><span><?= (int)$grand_total ?>₴</span></div>
            <form class="product-buy-form" action="scripts/addToCart.script.php" method="POST">
                <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
                <button type="submit" class="buy-button" name="buy-button">В корзину</button>
            </form>


        </figure>

        <div class="product-page-info">
            <ul class="product-page-info-list">
                <li class="info-list-item">
                    Доставка товара занимает в среднем 2-4 дня.
                </li>
                <li class="info-list-item">
                    Заказы на сумму свыше 400₴ отправляются после 100% предоплаты.
                </li>
                <li class="info-list-item">
                    Стоимость доставки: По тарифам "Новой Почты".
                </li>
            </ul>
        </div>

        <div class="description-tab description-tab-closed">
            <span>Описание</span>

        </div>
        <div class="description-tab-description ">

                <?= $row['body'] ?>



        </div>

        <?

        $sql = "
        SELECT using_info, country,against_info,use_before,keep_info,form FROM products_info  LEFT JOIN products ON products_info.id = products_info.productID WHERE products_info.productID = '{$productId}';
        ";
        $result = $connection->query($sql);

        $row = $result->fetch_assoc();


        ?>

        <div class="goods-info-decor-tab">Характеристики</div>
        <div class="goods-info-tab">

            <div class="goods-info-tab-info">
                <table class="goods-info-table">
                    <tbody>
                    <tr>
                        <td>
                            Страна производитель товара

                        </td>
                        <td>
                            <?= $row['country']?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Способ применения
                        </td>
                        <td>
                            <?= $row['using_info']?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Противопоказания
                        </td>
                        <td>
                            <?= $row['against_info']?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Срок годности
                        </td>
                        <td>
                            <?= $row['use_before']?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Способ хранения
                        </td>
                        <td>
                            <?= $row['keep_info']?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Форма выпуска
                        </td>
                        <td>
                            <?= $row['form']?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="goods-cert-wrapper">
                <p class="goods-cert-text">
                    Площадки, на которых производятся продукция, сертифицированы по стандартам GMP, ISO, HACCP.
                    В процессе производства каждый продукт проходит жесткое многоступенчатое тестирование.

                </p>
                <p class="goods-cert-text">
                    Продукция  производятся в США, Японии, Германии, Канаде, Франции, России, Нидерландах, Армении, Норвегии, Южной Корее и на Тайване.
                </p>

            </div>
            <div class="certs-wrapper">
                <span class="cert-item gmp"></span>
                <span class="cert-item haccp"></span>
                <span class="cert-item cso"></span>
            </div>
        </div>
        </div>

    <span class="supple-warning">*БАДы не являются лекарственным средством, перед применением проконсультируйтесь с врачом.</span>


    <div class="product-page-bottom">
        <div class="reviews-tab">
            <span>Отзывы о товаре</span>

        </div>

        <div class="reviews-tab-inside">

            <div class="review-container">
                <div class="review-user-name-container">
                    <span class="review-user-name">Иван Иванов</span>
                    <span class="review-user-date">1/5/2021</span>
                </div>

                <p class="review-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                    ut aliquip ex ea commodo consequat.</p>
            </div>

            <div class="review-container">
                <div class="review-user-name-container">
                    <span class="review-user-name">Роман Сметанов</span>
                    <span class="review-user-date">1/3/2021</span>
                </div>

                <p class="review-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                    ut aliquip ex ea commodo consequat.</p>
            </div>

            <h3 class="headers review-header">Оставить Свой</h3>

            <form class="review-form" action="#" method="post">

                <label for="review-text"></label>
                <textarea class="review-textarea" name="user-review" cols="30" rows="5" id="review-text" maxlength="250">

                   </textarea>

                <input class="review-submit-button" type="submit" name="submit-review" value="Отправить">


            </form>

        </div>
    </div>




</section>