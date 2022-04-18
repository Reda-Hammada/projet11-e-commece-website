<?php

session_start();


require 'productAdmin.php';
require 'productManagerAdmin.php';

if($_SESSION['username']):

   $username = $_SESSION['username'];


endif;


if(isset($_POST['submit'])):

    $adminProduct = new productManagerAdmin();
    $productClass = new productAdmin();
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $productClass->setProductName($_POST['product']);
    $productClass->setPrice($_POST['price']);
    $productClass->setDetails($_POST['details']);
    $productClass->setCategory($_POST['category']);
    $productClass->setQuantityStock($_POST['stockQuantity']);
    $productClass->setExpirationDate($_POST['date']);
    $productClass->setImage($filename);
    $adminProduct->uploadImage($filename,$tempname);
    $adminProduct->insertProducts($productClass);
    
endif;


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Interface de gestion des ouvrages" />
        <meta name="author" content="Reda Hammada"/>
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="asset/style/style.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="/prototype0/startbootstrap-sb-admin-gh-pages/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav id="navbar2" class="sb-topnav navbar navbar-expand navbar-dark" >
            <!-- Navbar Brand-->
            <a  class="navbar-brand ps-3" href="adminDashboard.php">Admin Dashboard</a>
            <!-- Sidebar Toggle-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav id ="navbar1" class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           
                           
                           
                            <a id="loged" class="nav-link" href="adminDashboard.php">
                                Categories
                            </a>
                            <a id="loged" class="nav-link" href="adminDashboard.php">
                                Products
                            </a>
                        </div>
                    </div>
                    <div id ="navbar1" class="sb-sidenav-footer ">
                            <a href="logout.php" class="btn  bg-light">Log out
                        </a>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-5"><?php echo "Welcome" . " " . $username ?> </h1>
                       
                        <div class="card mb-4" id="form-container">
                            <div class="card-header" >
                                <i class="fas fa-table me-1"></i>
                              

                                <form class=" row g-3" id="formSubmit" method="POST" enctype="multipart/form-data">
                                    <h2>Add Product</h2>
                                    <div class="col-6">
                            
                                            <label for="titre" class="form-label">Product Name</label>
                                            <input name="product"  type="text" class="form-control" id="inputTitle" >
                                            <label for="auteur" class="form-label">Details</label>
                                      <input type="text" class="form-control" id="inputAuthor" name="details" >
                                    </div>
                
                                    <div class="col-6">
                                      <label for="price" class="form-label">price</label>
                                      <input type="number" class="form-control" id="inputPrix" name ="price" >
                                      <label for="date" class="form-label">Expiration date</label>
                                      <input type="date" class="form-control" id="inputDate" name="date">

                                    </div>
                                    <div class="col-6">
                                        
                                        <label for="price" class="form-label">Image</label>
                                      <input type="file" class="form-control" id="inputPrix" name ="image" >
                                      </div>
                                    <div class="col-6">
                                      
                                      <label for="date" class="form-label">Stock Quantity</label>
                                      <input type="number" class="form-control" id="inputDate" name="stockQuantity">
                                      
                                      
                                    </div>
                                    <div class="col-12">
                                    <label for="list" class="form-label">Category :</label>
                                        <select id="inputLanguage" name="category">
                                            <option></option>
                                            <option value="Soin du cheveux">Soin du cheveux</option>
                                            <option value="soins de la peau">soins de la peau</option>
                                            <option value="Rouge a levres">Rouge a levres</option>
                                            <option value="soins du visage">soins du visage</option>
                                            <option value ="Fard a joues">Fard a joues</option>
                                        </select>
                                    <div>
                                    <div class="col-12">
                                       
                                            <input type="submit"  class="btn btn-success mt-2" value ="Add Product" name="submit">
                                            
                                    </div>
                                    <div class="col-12">
                                      
                                    </div>
                                  </form>
                            </div>
                            <div class="card-body">
                               
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                             
                                Products
                            </div>
                            <div class="card-body">
                                <table class="table" id="worksTable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Id</th>
                                            <th>Product name</th>
                                            <th>Details</th>
                                            <th>Price</th>
                                            <th>Stock quantity</th>
                                            <th>Expiration Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                               
                                        </tr>

                                    </tbody>
                                        
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>