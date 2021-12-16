<section id="catalog">
    <div class="container py-3">

        <?php

        $category = array_map(function ($pro) {
            return $pro['item_brand'];
        }, $product_shuffle);
        $unique = array_unique($category);
        sort($unique);


        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['catalog_submit'])) {
                // call method addToCart
                $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
            }
        }

        $in_cart = $Cart->getCartId($product->getData('cart'));
        ?>


        <h4 class="font-roboto font-size-20 pt-3">Каталог</h4>
        <div class="container">
            <div id="filters" class="button-group text-right">
                <button class="catalog-btn btn is-checked" data-filter="*">Всі Категорії</button>
                <?php
                array_map(function ($category) {
                    printf('<button class="catalog-btn btn" data-filter=".%s">%s</button>', $category, $category);
                }, $unique);
                ?>
            </div>

            <p class="font-roboto px-2">Пошук<input type="text" class="quicksearch mx-2" placeholder=""/></p>
        </div>


        <div class="grid">

            <?php array_map(function ($item) use($in_cart) { ?>
                <div class="grid-item border <?php echo $item['item_brand'] ?? 'Категорія'; ?>">
                    <div class="item py-2 px-2" style="width: 200px">
                        <div class="product font-roboto">
                            <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>"><img
                                        src="<?php echo $item['item_image'] ?>" alt="product1"
                                        class="product-img"></a>
                            <div class="text-center">
                                <h6><?php echo $item['item_name'] ?? 'Невідомо'; ?></h6>

                                <div class="price py-2">
                                    <span><?php echo $item['item_price'] ?? '0'; ?> &#8372</span>
                                </div>

                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php

                                    if (in_array($item['item_id'], $in_cart ?? [])) {
                                        echo '<button type="submit" disabled class="btn btn-success font-size-12">Вже в кошику</button>';
                                    } else {
                                        echo '<button type="submit" name="catalog_submit" class="btn btn-success font-size-12">Додати в кошик</button>';
                                    }

                                    ?>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }, $product_shuffle) ?>


        </div>
    </div>
</section>