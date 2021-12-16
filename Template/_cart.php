<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-cart-submit'])) {
        $deletedrecord = $Cart->deleteCart($_POST['item_id']);
    }
}
?>


<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-roboto font-size-20">Кошик</h5>


        <!-- Cart -->
        <div class="row">

            <div class="col-sm-12">
                <?php

                foreach ($product->getData('cart') as $item):
                    $cart = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item) {
                        ?>
                        <!-- Cart Item -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-3">
                                <img src="<?php echo $item['item_image'] ?>" alt="cart1" class="img-fluid">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="font-roboto font-size-20"><?php echo $item['item_name'] ?></h5>
                                <small><?php echo $item['item_brand'] ?></small>
                                <!-- Quantity -->
                                <div class="qty d-flex pt-2">
                                    <div class="d-flex font-roboto w-50">
                                        <button class="qty_down border" data-id="<?php echo $item['item_id'] ?? '0' ?>">
                                            <i class="fas fa-angle-left"></i>
                                        </button>
                                        <input type="text"
                                               class="qty_input border text-center font-size-14 px-2 w-50"
                                               value="1" placeholder="1" disabled
                                               data-id="<?php echo $item['item_id'] ?? '0' ?>">
                                        <button class="qty_up border" data-id="<?php echo $item['item_id'] ?? '0' ?>">
                                            <i class="fas fa-angle-right"></i>
                                        </button>
                                    </div>

                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0 ?>" name="item_id">
                                        <button type="submit"
                                                class="btn font-roboto font-size-12 text-danger border-right"
                                                name="delete-cart-submit">Видалити
                                        </button>
                                    </form>

                                </div>
                                <!-- !Quantity -->
                            </div>

                            <div class="col-sm-2 text-right">
                                <div class="font-size-16  font-roboto">
                                    <span>Ціна : &#8372; </span><span class="product_price"
                                                                      data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? '0' ?></span>
                                </div>
                            </div>

                        </div>
                        <!-- !Cart Item -->
                        <?php
                        return $item['item_price'];
                    }, $cart);
                endforeach;
                ?>
                <hr>

            </div>
        </div>
        <!-- !Cart -->


        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['checkout-submit'])) {
                $Cart->checkoutCart();
                $Cart->emptyCart();
            }
        }
        ?>


        <!-- Total -->
        <div class="row">
            <div class="col-sm-12">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Ваше
                        замовлення сформовано.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-roboto font-size-20">Загальна вартість :&nbsp; <span
                                    class="text-success">&#8372 </span><span class="text-success"
                                                                             id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span>
                        </h5>
                        <form method="post">
                            <button type="submit" class="btn btn-success mt-3" name="checkout-submit">Здійснити
                                покупку
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- !Total -->

    </div>
</section>