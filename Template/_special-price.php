<?php

// request method post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // call add to cart for special price button
  if (isset($_POST['special-price-submit'])) {
    $cart->addToCart($_POST['user_id'], $_POST['item_id']);
  }
}

// product_suffle variable is already included from top sale
$brand = array_map(function ($pro) {
  return $pro['item_brand'];
}, $product_shuffle);
$unique_brand = array_unique($brand);
sort($unique_brand);

?>

<!-- Special Price -->
<section id="special-price">
  <div class="container">
    <h4 class="font-rubik font-size-20">Special Price</h4>
    <div id="filters" class="button-group text-right font-baloo font-size-16">
      <button class="btn is-checked" data-filter="*">All Brand</button>
      <?php array_map(function ($brand) {
        printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
      }, $unique_brand) ?>
    </div>

    <div class="grid">

      <?php
      shuffle($product_shuffle);
      array_map(function ($item) use ($cart, $product) { ?>
        <div class="grid-item <?php echo $item['item_brand'] ?? 'Brand'; ?> border">
          <div class="item py-2" style="width: 200px">
            <div class="product font-rale">
              <a href=<?php printf("%s?item_id=%s", 'product.php', $item['item_id']) ?>><img src="<?php echo $item['item_image'] ?? './images/products/13.png' ?>" alt="product1" class="img-fluid" /></a>
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
                    echo '<button type="submit" name="special-price-submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                  } ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php }, $product_shuffle) ?>

    </div>
  </div>
</section>
<!-- !Special Price -->