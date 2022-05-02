<?php

// require MySQL Connection
require('../Database/DBController.php');

// require Product Class
require('../Database/product.php');

// DBController object
$db = new DBController();

// Product object
$Product = new product($db);

if (isset($_POST['itemid'])) {
    $result = $Product->getProduct($_POST['itemid']);
    echo json_encode($result);
}
