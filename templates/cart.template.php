
<?php

$connection = new mysqli(DB_HOSTNAME, DB_LOGIN,DB_PASSWORD, DB_NAME);


?>
<section class="sections cart-section">
    <div class="cart-modal-window-container">
        <div class="cart-modal-window-top">
            <h3 class="cart-modal-header">Корзина</h3>
            <a class="cart-back-button" href="<?echo $_SERVER['HTTP_REFERER'];?>">Назад</a>
        </div>




            <?php

            if(count($_SESSION['cart']) > 0) {


            $total = 0;

            foreach ($_SESSION['cart'] as $key => $value) {

                $sql = "SELECT id, title, body, price, img_path, category, discount FROM products where id = '{$key}'";
                $result = $connection->query($sql);
                $row = $result->fetch_assoc();

                $sub_total = ($row['price'] / 100) * $row['discount'];
                $grand_total = $row['price'] - $sub_total;

                $total += $grand_total * $value;
                $_SESSION['global_total'] = $total;


                ?>
                <ul class="cart-modal-goods-list">
                    <li class="cart-modal-goods-item">
                        <form class="cart-modal-goods-item" name="cart_form" method="POST" action="scripts/delete.cart.script.php?action=remove&id=<?= $row['id']?>">
                        <div class="cart-modal-img-container">
                            <img class="cart-modal-product-img" src="<?= $row['img_path']?>" alt="<?= $row['title']?>">
                        </div>

                        <a class="cart-modal-product-name" href="?page=product&id=<?= $row['id']?>"><?= $row['title']?></a>
                        <input class="cart-modal-input" type="text" name="goods-amount" value="<?= $value?>" min="1" disabled>

                        <span class="cart-modal-price"><?= (int)$grand_total?>₴</span>
                        <button type="submit" name="remove" class="cart-modal-delete-cross"></button>
                        </form>
                    </li>
        </ul>

            <? } ?>
        <ul class="main-page-catalog-list">
            <?} else {
                echo "<h2 class='cart-header'>Ваша корзина пуста... Но никогда не поздно, что-нибудь приобрести.</h2>";
                $total = 0;

                echo "<h2 class='cart-header recommend'>Рекомендуемые товары в зимне-весенний период</h2>";

                $sql = "SELECT id, title, body, price, img_path, category FROM products where category like 'Иммунитет' LIMIT 6";
                $result = $connection->query($sql);

                echo '<ul class="main-page-catalog-list">';


            while ($row = $result->fetch_assoc()) {



            ?>




                    <li class="main-page-catalog-list-item">
                        <form name="catalog_product" action="scripts/addToCart.script.php" method="POST">
                            <input type="hidden" name="product_id" value="<?= $row['id']?>">
                        <a class="urls catalog-list-item-url" href="?page=product&id=<?= $row['id']?>" alt="<?= $row['title']?>">
                            <img class="catalog-list-item-img"
                                 src="<?= $row['img_path']?>" alt="<?= $row['title']?>"></a>
                        <a class="urls catalog-list-item-name" href="?product<?= $row['id']?>">
                            <span><?= $row['title']?></span>
                        </a>
                        <span class="span-price"><?= $row['price']?>₴</span>
                        <input type="submit" value="Купить" class="urls catalog-list-item-buy">
                        </form>
                    </li>



<? }}?>
        </ul>


        <span class="cart-modal-total">Итого: <?echo  $total?>₴</span>
        <? if(count($_SESSION['cart']) > 0) {  ?>
        <a class="cart-modal-check-url" href="?page=checkout">Оформить заказ</a>

        <? }?>

    </div>

    <? $connection->close();?>
</section>