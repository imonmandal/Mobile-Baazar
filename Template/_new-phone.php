<?php

// request method post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // call add to cart for special price button
  if (isset($_POST['new-phone-submit'])) {
    $cart->addToCart($_POST['user_id'], $_POST['item_id']);
  }
}

?>

<!-- New Phones -->
<section id="new-phones" class="top-margin">
  <div class="container">
    <h4 class="font-rubik font-size-20">New Phones</h4>
    <hr />

    <!-- owl carousel -->
    <div class="owl-carousel owl-theme">

      <?php

      shuffle($product_shuffle);
      foreach ($product_shuffle as $item) { ?>

        <div class="item py-2 bg-light">
          <div class="product font-rale">
            <!-- ?? null colision or default value -->
            <a href=<?php printf("%s?item_id=%s", 'product.php', $item['item_id']) ?>><img src="<?php echo $item['item_image'] ?? './images/products/1.png'; ?>" alt="product1" class="img-fluid" /></a>
            <div class="text-center">
              <h6><?php echo $item['item_name'] ?? 'Unknown'; ?></h6>
              <div class="rating text-warning font-size-12">
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="far fa-star"></i></span>
              </div>
              <div class="price py-2">
                <span>$<?php echo $item['item_price'] ?? '0'; ?></span>
              </div>
              <form method="post">
                <input type="hidden" name='item_id' value=<?php echo $item['item_id'] ?>>
                <input type="hidden" name='user_id' value=<?php echo 1 ?>>
                <?php
                if (in_array($item['item_id'], $cart->getCartId($product->getData('cart')) ?? [])) {
                  echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                } else {
                  echo '<button type="submit" name="new-phone-submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                }
                ?>
              </form>
            </div>
          </div>
        </div>

      <?php } ?>
      <!-- end of foreach -->

    </div>
    <!-- !owl carousel -->
  </div>
</section>
<!-- !New Phones -->