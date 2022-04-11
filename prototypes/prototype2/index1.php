<?php
include 'productsManager.php';
$product = new product();
$productManager = new productManager();
$data = $productManager->getAllProducts();
$product = new product();

include 'productsManager.php';
$data = getAllProducts();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <title>Home</title>
</head>
<body>
    <header>
        <nav>
            <h1 class="text-center bg-dark text-light">E-Store</h1>
        </nav>
    </header>
     <main>
 
    <?php foreach($data as $product) { ?>
    <section class="container">

        <div class="text-center mt-2 class="w-25" ">
            
            <form method="GET">

                <img src="./images/laptop.jpeg" class="w-25">
                <p><?php echo $product->getProductName()?></p>
                <p><?php echo $product->getDetails()?><p>
                <p><?php echo $product->getPrice() ?> Dh<br>
                <p>Quantity: <?php echo $product->getQuantity()?></p><br>
                <a class="btn btn-primary" href="productDetails.php?id=<?php  echo $product->getId() ?>">Details</a>

            </form>

        </div>

    </section>
   
   
         
   
    <?php } ?>
    </main>
</body>
</html>