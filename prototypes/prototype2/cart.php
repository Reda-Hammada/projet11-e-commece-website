<?php

include 'productsManager.php';
$cart = new productManager();
session_start();
$details = $cart->displayCart();

print_r($_SESSION['cart']);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <table>
        <thead>
       </thead>
    


        <p><?php ?></p>

    </tbale>
</body>
</html>