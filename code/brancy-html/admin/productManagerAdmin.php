<?php

require 'config.php';


class productManagerAdmin {

    public function insertProducts($productClass){
        
    $configDataBase  = new dataBase();
     $configDataBase->connectDataBase();

    $productName = $productClass->getProductName();
    $price = $productClass->getPrice();
    $category = $productClass->getCategory();
    $details = $productClass->getDetails();
    $quantity = $productClass->getQuantityStock();
    $date = $productClass->getExpirationDate();

    $insert = "INSERT INTO products (productName,price,details,stockQuantity,expirationDate,categoryProduct)
               VALUES('$productName','$price','$details','$quantity','$date','$category')";


    $query = mysqli_query($configDataBase->connectDataBase()
    ,$insert);




    }

}



?>