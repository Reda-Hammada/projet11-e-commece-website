<?php


require 'productsManager.php';


    $id = $_GET['id'];

    $cart = new productManager();

    $cart->getProductForCart($id);

$productDetails  = $cart->getProductForCart($id);

foreach($productDetails as $productCart);

    $arrCart = array(
    
        'productName' => $productCart->getNameProduct(),
        'details' => $productCart->getDetails(),
        'price' => $productCart->getPrice()
    
    );

$convert = implode("",$arrCart);

$cart = new productManager();
$cart->startSession($convert);









?>
