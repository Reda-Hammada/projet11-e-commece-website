<?php
require 'categoryManager.php';

session_start();

if($_GET):


    $id = $_GET['id'];
    
    $categoryEdit = new categoryManager();
    $data = $categoryEdit->fetchCategoryById($id);
    
    
endif;


if($_SERVER["REQUEST_METHOD"] == "POST"):

     $editedCategory = new category();
     $post = $_POST['category'];

     $editedCategory->setCategoryName($post);
     $categoryEdit->editCategory($id,$editedCategory);

     header('location:adminDashboard.php');



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
                        <h1 class="mt-4 mb-5"><?php echo "Welcome" . " " . $_SESSION['username'] . " " . "to edit category"?> </h1>
                       
                        <div class="card mb-4" id="form-container">
                            <div class="card-header" >
                                <i class="fas fa-table me-1"></i>
                              
                                <?php foreach($data as $fetchByIdObject){ ?>


                                <form class=" row g-3" id="formSubmit" method="post">
                                    <h2>Edit Category</h2>
                                    <div class="col-md-6">

                                            <label for="titre" class="form-label">Category name</label>
                                            <input name="category"  type="text" class="form-control" id="inputTitle" value="<?php echo implode($fetchByIdObject->getCategoryName());?>" >
                                           
                                            <input type="submit"  class="btn btn-success mt-2" value ="Update Category">
                                        
                                      
                                    </div>
                                    <div class="col-12">
                                      
                                    </div>
                                  </form>

                                  <?php } ?>
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