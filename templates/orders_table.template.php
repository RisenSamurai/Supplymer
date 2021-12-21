<?php



$connection = new mysqli(DB_HOSTNAME, DB_LOGIN,DB_PASSWORD, DB_NAME);
$sql = "SELECT * FROM order_table";
$result = $connection->query($sql);

?>


<section class="sections">

    <table class="orders-table" style="width: 100%">
        <thead>
        <tr>
            <th>Имя</th>
        </tr>
        <tr>
            <th>Отчество</th>
        </tr>
        <tr>
            <th>Фамилия</th>
        </tr>

        <tr>
            <th>Телефон</th>
        </tr>
        <tr>
            <th>Email</th>
        </tr>
        <tr>
            <th>Город</th>
        </tr>
        <tr>
            <th>Почтовое отделение</th>
        </tr>
        <tr>
            <th>Способ оплаты</th>
        </tr>
        <tr>
            <th>Общая сумма заказа</th>
        </tr>
        <tr>
            <th>Время заказа</th>
        </tr>
        <tr>
            <th>Товар</th>
        </tr>
        <tr>
            <th>Количество товара</th>
        </tr>
        </thead>
        <tbody>
        <? while($row = $result->fetch_assoc()) { ?>
                <?php
            $sql = "SELECT productID, qty FROM orders_link WHERE orderID = '{$row['id']}'";
            $result2 = $connection->query($sql);

            ?>
                <tr>
                    <td><?= $row['name'];?></td>
                    <td><?= $row['surname'];?></td>
                    <td><?= $row['second_name'];?></td>
                    <td><?= $row['phone'];?></td>
                    <td><?= $row['email'];?></td>
                    <td><?= $row['city'];?></td>
                    <td><?= $row['post'];?></td>
                    <td><?= $row['payment'];?></td>
                    <td><?= $row['total'];?></td>
                    <td><?= $row['ordered_at'];?></td>
                    <? while ($row2= $result2->fetch_assoc()){?>
                    <td><?= $row2['productID']; echo ",";?></td>
                    <td><?= $row2['qty'];?></td>
                    <?} ?>
                </tr>


        <? }?>
        </tbody>


    </table>
</section>
