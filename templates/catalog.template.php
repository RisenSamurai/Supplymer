
<?php
$connection = new mysqli(DB_HOSTNAME, DB_LOGIN,DB_PASSWORD, DB_NAME);


if(isset($_GET['filter'])) {

    if(isset($_GET['pages'])) {
        $pages = $_GET['pages'];
    }
    else {
        $pages = 1;
    }

    $filter =  htmlspecialchars($_GET['filter']);
    $sql = "SELECT id, title, body, price, img_path, category, discount FROM products WHERE category LIKE '{$filter}'";
    $result = $connection->query($sql);


}

else {
    if(isset($_GET['pages'])) {
        $pages = $_GET['pages'];
    }
    else {
        $pages = 1;
    }

    $records_per_page = 9;
    $offset = ($pages-1) * $records_per_page;
    $sql = "SELECT COUNT(*) FROM products";
    $result = $connection->query($sql);
    $row = $result->fetch_array()[0];
    $total_pages = ceil($row / $records_per_page);

    $sql = "SELECT id, title, body, price, img_path, category, discount FROM products LIMIT {$offset}, {$records_per_page}";
    $result = $connection->query($sql);

}





$connection->close();

$product_total = 0;
$product_discount = 0;

if(!$result) die ($connection->errno);





?>

<section class="sections goods-list-section">
    <h1 class="catalog-header top-header">Каталог Товаров</h1>
            <div class="catalog-sort-block">

                <button class="category-button">Категории Товаров</button>
                <div class="category-urls-container">
                    
                </div>
                <div class="catalog-sort-block-top hidden">
                    <button class="filters-button">Фильтры</button>
                </div>


                <div class="modal-filters-catalog hidden">

                    <div class="filter-catalog-top">
                        <h2 class="modal-filters-header">Фильтры</h2>
                        <div class="catalog-modal-cross-top"></div>
                    </div>


                    <form class="catalog-filters-form" action="" method="get">
                        <fieldset class="catalog-filters-fieldset">
                            <legend class="catalog-filters-legend legend-brand">Бренд</legend>
                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="Coral">Coral</label>
                                <input class="catalog-filters-input" type="checkbox" name="brand" value="Coral" id="Coral">
                            </div>

                        </fieldset>

                        <fieldset class="catalog-filters-fieldset">
                            <legend class="catalog-filters-legend">Назначение</legend>
                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="detox">Детокс и очищение</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Детокс и очищение" id="detox">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="hair">Кожа, волосы и ногти</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Кожа, волосы и ногти" id="hair">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="immune">Иммунитет</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose" value="Иммунитет" id="immune">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="bones">Кости и суставы</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Кости и суставы" id="bones">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="anti-stress">Антистресс</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Антистресс" id="anti-stress">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="for-men">Мужское здоровье</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Мужское здоровье" id="for-men">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="for-women">Женское здоровье</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Женское здоровье" id="for-women">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="stomach">Пищеварение</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Пищеварение" id="stomach">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="weight">Контроль веса</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Контроль веса" id="weight">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="smartfood">Смарт фуд</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Смарт фуд" id="smartfood">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="heart">Сердце и сосуды</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Сердце и сосуды" id="heart">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="liposomal">Липосомальные формулы</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Липосомальные формулы" id="liposomal">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="energy">Энергия</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Энергия" id="energy">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="vision">Зрение</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Зрение" id="vision">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="children-health">Детское здоровье</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Детское здоровье" id="children-health">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="hydration">Гидратация</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Гидратация" id="hydration">
                            </div>

                            <div class="catalog-filters-inputs-wrappers">
                                <label class="catalog-filters-label" for="complex">Комплексное оздоровление</label>
                                <input class="catalog-filters-input" type="checkbox" name="purpose"
                                       value="Комплексное оздоровление" id="complex">
                            </div>

                        </fieldset>

                        <input class="catalog-filters-submit" type="submit" value="Показать">
                    </form>

                </div>



            </div>
    <div class="product-purposes">
        <div class="product-purposes-wrapper">
            <a class="product-purposes-item" href="?page=catalog&filter=Очищениеидетокс">Очищение и детокс</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Кожа,волосыиногти">Кожа, волосы и ногти</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Иммунитет">Иммунитет</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Костиисуставы">Кости и суставы</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Антистресс">Антистресс</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Мужскоездоровье">Мужское здоровье</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Женскоездоровье">Женское здоровье</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Пищеварение">Пищеварение</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Контрольвеса">Контроль веса</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Смартфуд">Смарт фуд</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Сердцеисосуды">Сердце и сосуды</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Липосомальные формулы">Липосомальные формулы</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Энергия">Энергия</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Зрение">Зрение</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Детское здоровье">Детское здоровье</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Гидратация">Гидратация</a>
            <a class="product-purposes-item" href="?page=catalog&filter=Комплексноеоздоровление">Комплексное оздоровление</a>
        </div>
    </div>

            <div class="main-page-short-catalog">
                <ul class="breadcrumbs-container">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item"><a href="?page=catalog">Каталог</a></li>
                </ul>
                <ul class="main-page-catalog-list">

                    <? if($result -> num_rows > 0)
                    while ($row = $result->fetch_assoc()) { ?>




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



                    <? } ?>


                </ul>

                <? if($total_pages > 1 ) {?>

                <div class="catalog-paging-container">
                    <a class="paging-item" href="<?php if($pages <= 1){ echo '#'; } else { echo "?page=catalog&pages=".($pages - 1); } ?>">&laquo;</a>

                    <?for($i = 1; $i < $total_pages + 1; $i++){ ?>

                        <a class="paging-item <?php if($pages == $i){ echo 'active'; } ?>" href="<?php echo "?page=catalog&pages=". $i  ?>"><?=$i?></a>


                    <?}?>


                    <a class="paging-item" href="<?php if($pages >= $total_pages){ echo '#'; } else { echo "?page=catalog&pages=".($pages + 1); } ?>">&raquo;</a>
                </div>

                <? }?>

            </div>
        </section>