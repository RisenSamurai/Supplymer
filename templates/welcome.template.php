
<?php

$connection = new mysqli(DB_HOSTNAME, DB_LOGIN,DB_PASSWORD, DB_NAME);
$sql = "SELECT id, title, body, price, img_path, category, discount FROM products ORDER BY price ASC LIMIT 6";
$result = $connection->query($sql);


if(!$result) die ($connection->error);

?>
<section class="main-page-promo-section">

    <div class="welcome-promo-pic">
        <h1 class="promo-header">SUPPLYMER <br> У нас только лучшее</h1>
    </div>
<div class="slider-wrapper">
    <h2 class="promo-header">Акции?! Акции!</h2>
            <div class="slide" id="slide-1"><p class="slide-p">При заказе товара с суммой от 1000₴ доставка бесплатная!</p></div>
            <div class="slide" id="slide-2"><p class="slide-p">У нас в первый раз?<br> Тогда у нас для тебя скидка 10% на любой товар!</p></div>
            <div class="slide" id="slide-3"><p class="slide-p">Скидки в честь открытия магазина до 15%! </p></div>

</div>

</section>





<section class="sections main-page-section">




    <h1 class="headers">Бестселлеры</h1>

    <figure class="main-page-promo-goods">

        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide"><a href="?page=product&id=1"><img src="img/product_images/coral/Phytoviron.webp" alt="#"></a> </li>
                    <li class="glide__slide"><a href="?page=product&id=4"><img src="img/product_images/coral/colo_wada.webp" alt="#"></a> </li>
                    <li class="glide__slide"><a href="?page=product&id=5"><img src="img/product_images/coral/black_walnut.webp" alt="#"></a> </li>
                </ul>
            </div>

            <div class="glide__bullets" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0">b</button>
                <button class="glide__bullet" data-glide-dir="=1">s</button>
                <button class="glide__bullet" data-glide-dir="=2">d</button>
            </div>
        </div>

    </figure>


    <h2 class="headers">Каталог Товаров</h2>

    <div class="main-page-short-catalog">
        <ul class="main-page-catalog-list">

            <? if($result -> num_rows > 0)
                while ($row = $result->fetch_assoc()) {

                ?>

                    <li class="main-page-catalog-list-item">
                        <form class="catalog-form" name="catalog_product" action="scripts/addToCart.script.php" method="POST">
                            <input type="hidden" name="product_id" value="<?= $row['id']?>">
                            <a class="urls catalog-list-item-url" href="?page=product&id=<?= $row['id']?>">
                                <img class="catalog-list-item-img"
                                     src="<?= $row['img_path']?>" alt="<?= $row['title']?>"></a>
                            <a class="urls catalog-list-item-name" href="?product<?= $row['id']?>">
                                <span><?= $row['title']?></span>
                            </a>
                            <? if($row['discount'] > 0) {?>
                                <strike class="span-price old-price"><?= $row['price']?> ₴</strike>

                                <span class="span-price"><? $product_total =  ($row['price'] / 100) * $row['discount'];
                                    $product_discount = $row['price'] - $product_total;
                                    echo (int)$product_discount?>₴</span>


                            <?}
                            else {


                                ?>
                                <span class="span-price"><?= $row['price']?>₴</span>
                            <?} ?>


                            <input type="submit" value="Купить" class="urls catalog-list-item-buy">
                        </form>
                    </li>



                <? } $connection->close();?>


        </ul>
        <a class="full-catalog-button" href="?page=catalog">Все товары</a>
    </div>



    <div class="about-us">
        <video playsinline autoplay loop muted class="welcome-video">
            <source src="img/product_images/Coral_main_hd_3mbit.mp4">
        </video>
        <p class="about-us-item">
           Мы продаём только натуральные и качественные биодобавки</p>
    </div>

</section>