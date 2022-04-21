<?php
include 'cartManager.php';
session_start();

$cartManager = new CartManager();

$cartManager->initCode();

if(isset($_POST['id'])){

    $id=$_POST['id'];
    $cartLine = new CartLine();
    $cart = new Cart();
    $quantity =  $_POST["quantite"];
    $cart = $cartManager->getCart($_COOKIE['cartCookie']);
    $product = $cartManager->afficherProduit($id);
    $cartLine->setIdCart($cart->getId());
    $cartManager->addProduct($cart, $product, $quantity);
    $product->setQuantity($quantity);
    $cartManager->set($cart, $product, $quantity);
    header("location: panier.php");

}
