<?php


require 'productsManager.php';

if($_GET['id']){

    $id = $_GET['id'];

    $cart = new productManager();

    $cart->getProductForCart($id);

    
}

$cart =  new productManager();

$productDetails  = $cart->getProductForCart($id);

foreach($cartDetails as $productCart){

    $arrCart = array(
    
        'productName' => $productCart->getNameProduct(),
        'details' => $productCart->getDetails()
    
    );

}



$convert = implode("",$arrCart);

$cart = new productManager();
$cart->startSession($arrCart);









?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />


    <title>Cart</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                           <a href="cart.php"> <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                            </a
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <p> <?php echo print_r($convert) ?> </p>
</body>
</html>