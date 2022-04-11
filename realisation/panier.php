<?php
session_start();


include 'cartManager.php';
$cartManager = new CartManager();
$compteur = $cartManager->compteur();

?>
<!-- CSS only -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>prototype 2</title>
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
                    <form action="addTocart.php"method="POST" class="d-flex">
                        <button   class="btn btn-outline-dark" type="submit">
                         <i class="bi-cart-fill me-1" ></i>
                           Panier
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                                 <?php echo $compteur ?>
                        </span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

<div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>Panier</b></h4>
                      
            </div>
            
            
            <?php 

            
              $listProduits = $cartManager->getPanier();
              foreach($listProduits as $value){
                ?>
             <div class="row border-top border-bottom">
            
                <div class="row main align-items-center">
                    
              
                    <div class="col-2"><img class="img-fluid" src="../img/gallery-image-4-270x195.jpg"></div>
                    <div class="col">
                        <div class="row text-muted"><?= $value["nom"] ?></div>
                        
                        <div class="row">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                    <div class="col">Edit<a href="modifier.php?id=<?= $value["id"] ?>" class="border"><?= $value["quantite"] ?></a> </div>
                    <div class="col"><?= $value["prix"] ?> DH  <a class="close" href="supprimer.php?id=<?= $value["id"] ?>"> &#10005;</a></div>
                    
                </div>
                  
            </div>
            
            <?php } ?>
        </div>
        
     </div>
     
</div>
<div class="back-to-shop"><a href="index.php">&leftarrow;</a><span class="text-muted">Retourner</span></div>
       
 