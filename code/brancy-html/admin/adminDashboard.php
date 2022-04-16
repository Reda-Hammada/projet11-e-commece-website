<?php
require 'categoryManager.php';


session_start();

$username = $_SESSION['username'];
$password = $_SESSION['password'];

if($username && $password){

  $username;

}

else {

    header('location:login.php');
}


if(!empty($_POST)){
    
  
    $categoryAdd = new category();
    $categoryAdd->setCategoryName($_POST['category']);
    $categoryManager = new categoryManager();
    $categoryManager->addCategory($categoryAdd);


}


$fetchCategory = new categoryManager();

$data = $fetchCategory-> displayCategory();

print_r($data);


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
                                <div id="loged"  class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Categories
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
                              

                                <form class=" row g-3" id="formSubmit">
                                    <h2>Insert Category</h2>
                                    <div class="col-md-6">
                                        <form method="post" >
                                            <label for="titre" class="form-label">Category name</label>
                                            <input name="category"  type="text" class="form-control" id="inputTitle" >
                                            <input type="submit"  class="btn btn-success mt-2" value ="Add Category">
                                        </form>
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
                                <i class="fas fa-book me-1"></i>
                                Categories
                            </div>
                            <div class="card-body">
                                <table class="table" id="worksTable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data as $categoryFetch){ ?>
                                        <tr>
                                               <td> <?php echo $categoryFetch->getId(); ?></td>
                                                <td> <?php echo $categoryFetch->getCategoryName() ?></td>
                                                <td> <a class="btn btn-success mt-2" href ="editCategory.php?id=<?php echo $categoryFetch->getId() ?>">Edit</a></td>
                                                <td> <a href="deleteCategory.php?id= <?php echo $categoryFetch->getId() ?>" class="btn btn-danger mt-2">Delete</a>
                                        </tr>

                                        <?php } ?>
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