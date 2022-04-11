<?php


require 'productsManager.php';

if($_GET['id']){

    $id = $_GET['id'];

    $cart = new productManager();

    $cart->getProductForCart($id);

    
}

$productCart = new cart();
$arrCart = array(
    
    'productName' => $product->getProductName(),
    'details' => $product->getDetails()

);


$dataCArt = $cart->startSession($arrCart);


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
       <?php foreach($dataCArt as $detailsCart){ ?>
        
        
        <p><?php echo $detailsCart['productName']?></p>
        <?php } ?>
     </tbale>
</body>
</html>