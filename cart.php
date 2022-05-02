<?php
include('header.php');
?>

<?php

// Include if not empty
count($product->getData('cart')) ? include('Template/_cart.php') : include('Template/notFound/_cart_notFound.php');

count($product->getData('wishlist')) ? include('Template/_wishlist.php') : include('Template/notFound/_wishlist_notFound.php');

include('Template/_new-phone.php');

?>

<?php
include('footer.php');
?>
