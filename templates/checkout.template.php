


<?php
$connection = new mysqli(DB_HOSTNAME, DB_LOGIN,DB_PASSWORD, DB_NAME);
$sql = "SELECT id, title, body, price, img_path, category FROM products";
$result = $connection->query($sql);


if(!$result) die ($connection->error);

if(count($_SESSION['cart']) > 0) {
    header("Location: ?page=catalog");
}




?>




<section class="sections checkout-section">
    <h1 class="checkout-header">оформление заказа</h1>


    <div class="checkout-forms-wrapper">

        <?php

        $total = 0;
        $p_amount = count($_SESSION['cart']);
        foreach ($_SESSION['cart'] as $key => $value){

        $sql = "SELECT id, title, body, price, img_path, category, discount FROM products where id = '{$key}'";

        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

            $sub_total = ($row['price'] / 100) * $row['discount'];
            $grand_total = $row['price'] - $sub_total;

            $total += $grand_total * $value;



         $_SESSION['global_total'] = $total;




        ?><form class="checkout-form" action="scripts/addToCart.script.php" method="POST">
            <ul class="cart-modal-goods-list checkout-order-page">




                <li class="cart-modal-goods-item">
                    <div class="cart-modal-img-container">
                        <img class="cart-modal-product-img" src="<?= $row['img_path']?>" alt="<?= $row['title']?>">
                    </div>

                    <input type="hidden" name="product_id" value="<?= $row['id']?>">
                    <input type="hidden" name="product_price" value="<?= $grand_total?>">
                    <input type="hidden" name="product_img" value="<?= $row['img_path']?>">
                    <input type="hidden" name="product_title" value="<?= $row['title']?>">
                    <a class="cart-modal-product-name" href="<?= $row['id']?>"><?= $row['title']?></a>
                    <div class="add-wrapper">
                        <input class="cart-modal-input" type="number" name="product_qty" value="<?= $value?>" min="1">
                        <input class="checkout-send-button" type="submit" name="checkout-submit" value="Добавить">
                    </div>

                    <span class="cart-modal-price"><?= (int)$grand_total?>₴</span>


                </li>


            </ul>

        </form>

    </form>
    <? }  ?>
    </div>


    <form class="checkout-form" method="post" action="scripts/checkout.script.php">
        <fieldset class="checkout-field-contacts">
            <legend class="checkout-legend-contacts">Ваши контактные данные</legend>

            <div class="checkout-inputs-container">
                <div class="checkout-inputs-surname">
                    <label class="checkout-surname-label" for="checkout-user-surname">Фамилия</label>
                    <input class="checkout-input checkout-input-surname" type="text" name="surname"
                           id="checkout-user-surname" placeholder="Фамилия" required>
                </div>

                <div class="checkout-inputs-surname">
                    <label class="checkout-name-label" for="checkout-user-name">Имя</label>
                    <input class="checkout-input checkout-input-name" type="text" name="name"
                           id="checkout-user-name" placeholder="Имя" required>
                </div>

                <div class="checkout-inputs-secondname">
                    <label class="checkout-secondname-label" for="checkout-user-secondname">Отчество</label>
                    <input class="checkout-input checkout-input-name" type="text" name="secondname"
                           id="checkout-user-secondname" placeholder="Отчество" required>
                </div>

                <div class="checkout-inputs-phone">
                    <label class="checkout-phone-label" for="checkout-user-phone">Номер телефона</label>
                    <input class="checkout-input checkout-input-name" type="tel" name="phone"
                           id="checkout-user-phone" placeholder="380" required
                           pattern="[0-9]{3}[0-9]{2}[0-9]{3}[0-9]{2}[0-9]{2}" autocomplete="on">
                </div>

                <?
                if($_COOKIE['user'] == 'guest') {
                    echo '
                    <div class="checkout-inputs-secondname">
                    <label class="checkout-secondname-label" for="checkout-user-email">Email</label>
                    <input class="checkout-input checkout-input-name" type="email" name="email"
                           id="checkout-user-email" placeholder="Email" required>
                </div>
                    ';
                }
                ?>


            </div>
        </fieldset>






        <fieldset class="checkout-shipping">
            <legend class="checkout-legend-shipping">Доставка</legend>
            <div class="checkout-inputs-shipping">
                <label class="checkout-shipping-label" for="checkout-city">Город</label>
                <input class="checkout-input checkout-input-city" type="text" name="city"
                       placeholder="Город" id="city" required>
            </div>

            <div class="checkout-inputs-shipping">
                <label class="checkout-post-label">Отделение "Новой Почты"</label>
                <input class="checkout-input checkout-input-post" type="text" name="postNum"
                       id="checkout-post" placeholder="Отделение №..."  required>
            </div>


        </fieldset>

        <fieldset class="checkout-payment">
            <legend class="checkout-legend-payment">Оплата</legend>

            <div class="checkout-inputs-payment">
                <label class="checkout-payment-label" for="payment-cash">Оплата наличными</label>
                <input class="checkout-inputs checkout-input-payment" type="radio" name="payment"
                       value="Cash" id="payment-cash" required>
            </div>

            <div class="checkout-inputs-payment">
                <label class="checkout-payment-label" for="payment-privat">На карту ПриватБанка</label>
                <input class="checkout-inputs checkout-input-payment" type="radio" name="payment"
                       value="Privat" id="payment-privat" required>
            </div>

        </fieldset>
        <span class="checkout-total-span">Итого: <?= $p_amount?> товар(ов) на сумму <?= (int)$total ?>₴</span>

        <input type="hidden" name="total" value="<?=$total ?>">






        <input class="checkout-send-button" type="submit" name="checkout-submit" value="Оплатить">



    </form>

    <? $connection->close();?>

</section>