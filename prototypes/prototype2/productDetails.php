<?php

include 'productsManager.php';

if(isset($_GET['id'])){
    

    $id =  $_GET['id'];

    $productManager = new productManager();
     $productManager->getProductForDetails($id);
    
    }

    $data =  $productManager->getProductForDetails($id);
    $details = new product();


  

        session_start();
        $session = new product();
        $sessionArray = array();
        $_SESSION['productName'] = $details->getProductName();
        $_SESSION['details'] = $details->getDetails();
        $_SESSION['quantity'] = $_GET['quantity'];
        $_SESSION['price'] = $details->getPrice();
        array_push($sessionArray,$_SESSION['productName'] );
        $_SESSION['sessionArray'] = $sessionArray;
       


            

        


    

  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
</head>
<body>
    <header>
        <nav>

        </nav>
    </header>

    <main>
    <?php foreach($data as $details){ ?>
        <section class="w-75 d-flex justify-content-evenly">

            <div class="w-50 mt-5">
                <img class="w-50" src="./images/laptop.jpeg">
            </div>
            <div class="w-25 mt-5">
                <form method="quantity">
                    <p><?php  echo $details->getProductName();?></p>
                    <p><?php  echo $details->getDetails();?></p>
                    <p><?php echo $details->getPrice() ?></p>
                    <input type="number" value="1" name="quantity">
                    <input class="btn btn-primary mt-2"  type="submit" value="Add to Cart" name="cart">
                    <input class="btn btn-primary mt-2" type="submit" value="Buy">
 
                </form>
                

                <?php } ?>

            </div>
        </section>
    </main>
  
</body>
</html>