<?php

// require MySQL Connection
require('Database/DBController.php');

// require product class
require('Database/product.php');

// require cart class
require('Database/cart.php');

// DBController Object
$db = new DBController();

// Product object
$product = new product($db);
$product_shuffle = $product->getData();

// Cart object
$cart = new cart($db);
