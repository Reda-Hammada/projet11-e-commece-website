<?php

include 'productsManager.php';

if(isset($_GET['id'])){
    

    $id =  $_GET['id'];

    $productManager = new productManager();
     $productManager->getProductForDetails($id);
    
    }

    $data =  $productManager->getProductForDetails($id);
    $details = new product();

  
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
        <section class="w-100 d-flex ">

            <div class="w-75 mt-5">
                <img class="w-25" src="./images/laptop.jpeg">
            </div>
            
                 <p><?php  print_r($details);
                                 

                                  ?></p>
                <?php } ?>

           
        </section>
    </main>
  
</body>
</html>