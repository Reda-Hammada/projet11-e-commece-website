<?php

session_start();
 require '../manager/productManager.php';

$manager = new productManager ();

$cart = $manager->getCart();

// echo "<pre>";
// print_r($cart);
// echo "</pre";



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>cart</title>
</head>
<body>
<header>
        <nav class='container-fluid bg-dark text-white d-flex flex-row justify-content-evenly'>
            <h1>e-commerce</h1>
            <a href="cart.php"><h2>cart</h2></a>      
        </nav>
    </header>
    <main>
        <table class="table">
            <tr>
                <th>product</th>
                <th>price</th>
                <th>quantity</th>
                <th>total</th>
            </tr>
            <?php if(is_array($cart)): 
                
                foreach($cart as $product){
                
                
                ?>
                
            <tr>
                <td><?php echo $product['name'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['quantity'] ?></td>
                <td> <?php echo $product['price'] * $product['quantity'] ?></td>
            </tr>


            <?php  }
        endif;  ?>

        <a href="index.php">Return</a>
        <table>
    </main>
</body>
</html>