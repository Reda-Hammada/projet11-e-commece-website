<?php

include 'productsManager.php';

if(isset($_GET['id'])){
    

    $id =  $_GET['id'];

    $productManager = new productManager();
    $productManager->getProductForCart($id);
}
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p></p>
  
</body>
</html>