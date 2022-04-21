




<?php
include 'cartManager.php';
session_start();

$cartManager = new CartManager();

$cartManager->initCode();
$quantity = $cartManager->getCartQuantity();

$id = $_GET["id"];
$cartLine = $cartManager->getProductCart($_GET["id"]);
if(isset($_POST["quantity"])){

    $cartManager->editCartLine($_POST["id"], $_POST["quantity"]);
    header("location: panier.php");
}

?>
<!-- CSS only -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page" href="#!">Acueile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Promotion</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Magasin</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>  
                    </ul>
                    <form action="panier.php"method="POST" class="d-flex">
                        <button   class="btn btn-outline-dark" type="submit">
                         <i class="bi-cart-fill me-1" ></i>
                           Panier
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                            <?php echo $quantity ?></span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Product section-->
   
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
                    <div  class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?=$cartLine->getProduct()->getName();?></h1>
                        <div class="fs-5 mb-5">
                           
                            <span><?=$cartLine->getProduct()->getPrice();?> DH</span>
                            <?php 
                            
                         ?>
                        </div>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                        <div class="d-flex">
                        <form  class="" method="POST">
                          <p>
                          <label for="btn btn-outline-dark flex-shrink-0"> Quantite</label>
                          <input type="number" name="quantity" value="<?=$cartLine->getProductCartQuantity();?>" >
                           </p>
                        <p>
                           <input type="hidden" name="id" value="<?=$cartLine->getIdCartLine();?>">
                           <button class="btn btn-outline-dark flex-shrink-0" type="submit" >
                                <i class="bi-cart-fill me-1"></i> Edit  </button>
                           
                            </p>
                        </form>                     
                        </div>
                    </div>
                </div>
            </div>

</html>



