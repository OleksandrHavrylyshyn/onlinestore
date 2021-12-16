<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);

}

    $item_id = $_GET['item_id'] ?? 1;
    foreach ($product->getData() as $item):
        if ($item['item_id'] == $item_id) :

?>

<section id="product" class="py-3">
    <div class="container">
        <div class="row py-3">
            <!-- Картинка -->
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'] ?>" alt="" class="img-fluid">
                <div class="form-row py-3 font-size-16 font-roboto">
                    <div class="col-12">
<!--                        <form method="post">-->
<!--                            <input type="hidden" name="item_id" value="--><?php //echo $item['item_id']; ?><!--">-->
<!--                            <input type="hidden" name="user_id" value="--><?php //echo 1; ?><!--">-->
<!--                            <button type="product-submit" class="btn btn-success w-100">Додати в кошик</button>-->
<!--                        </form>-->
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <!-- Назва та Категорія -->
                <h5 class="font-roboto font-size-20"> <?php echo $item['item_name'] ?? 'Невідомо'; ?></h5>
                <small><?php echo $item['item_brand'] ?? 'Невідомо'; ?></small>
                <hr class="m-o">
                <p class="font-roboto font-size-14">Ціна: <span class="font-roboto font-size-16"><?php echo $item['item_price'] ?? '0'; ?>
                            &#8372</span></p>
                <hr class="m-o">
                <p>Способи доставки :</p>
                <ul id="policy">
                    <li>Доставка Новою Поштою</li>
                    <li>Доставка кур'єром</li>
                    <li>Самовивіз</li>
                </ul>
                <hr class="m-o">
                <!-- Кількість товару -->
<!--                <div class="d-flex qty">-->
<!--                    <h6 class="font-roboto">Кількість :</h6>-->
<!--                    <div class="px-4 d-flex font-open-sans">-->
<!--                        <button class="qty_down border" data-id="prod1"><i-->
<!--                                class="fas fa-angle-left"></i></button>-->
<!--                        <input type="text" data-id="prod1"-->
<!--                               class="qty_input border text-center px-2 w-50 disabled" value="1" placeholder="1">-->
<!--                        <button class="qty_up border" data-id="prod1"><i-->
<!--                                class="fas fa-angle-right"></i></button>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- !Кількість товару -->

            </div>
        </div>
        <!-- Опис -->
        <div class="col-12">
            <h6 class="font-roboto">Опис Товару</h6>
            <hr>
            <p class="font-roboto font-size-14"><?php echo $item['item_desc']??'Невідомо'; ?>
            </p>
        </div>

    </div>
</section>

<?php
    endif;
    endforeach;
    ?>