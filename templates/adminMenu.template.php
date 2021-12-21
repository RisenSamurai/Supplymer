
<?php if($_SESSION['user'] == 'admin') { ?>

<section class="sections">
    <a href="?page=orders_table">Заказы</a>
    <a href="?page=orders_table">Добавить товар</a>
</section>


<?php } else {
    header('Location: ../page=catalog');
} ?>


