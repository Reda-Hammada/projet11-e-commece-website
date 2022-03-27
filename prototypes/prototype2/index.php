<?php
include 'productsManager.php';
$productManager = new productManager();
$data = $productManager->getAllProducts();
$product = new product();

foreach($data as $product) {





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <h1>E-Store</h1>
        </nav>
    </header>
     <main>
 
    
    <section class="ultimateProductsContainer">

        <div class="productContainer ">

            <p><?php echo $product->getProductName()?></p>
            <p><?php echo $product->getDetails()?><p>
            <p><?php echo $product->getQuantity() ?><p>
            <p><?php echo $product->getPrice() ?><br>
            <button >add Cart</button>


        </div>

    </section>
   
   
         
   
    <?php } ?>
    </main>
</body>
</html>