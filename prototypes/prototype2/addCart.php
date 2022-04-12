<?php
session_start();

require 'productsManager.php';


    $id = $_GET['id'];

    $quantity = $_GET['quantity'];

    $cart = new productManager();

    $cart->getProductForCart($id,$quantity);

$productDetails  = $cart->getProductForCart($id,$quantity);

foreach($productDetails as $productCart);

    $arrCart = array(
    
        'productName' => $productCart->getNameProduct(),
        'details' => $productCart->getDetails(),
        'quantity' => $productCart->getQuantity($quantity),
        'price' => $productCart->getPrice() . " " .'DH'
        
    
    );


$cart = new productManager();
$cart->startSession($arrCart);
header('location:cart.php');









?>
