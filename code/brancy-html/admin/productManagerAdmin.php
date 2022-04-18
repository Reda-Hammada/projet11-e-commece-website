<?php

require 'config.php';


class productManagerAdmin {

    public function insertProducts($productClass){
        
    $configDataBase  = new dataBase();
     $dataBase = $configDataBase->connectDataBase();

    $productName = $productClass->getProductName();
    $price = $productClass->getPrice();
    $category = $productClass->getCategory();
    $details = $productClass->getDetails();
    $quantity = $productClass->getQuantityStock();
    $date = $productClass->getExpirationDate();
    $image = $productClass->getImage();

    $insert = "INSERT INTO `products`( `img`,`productName`, `price`, `details`, `stockQuantity`, `expirationDate`, `categoryProduct`) 
    VALUES ('$image','$productName','$price','$details','$quantity','$date','$category')";


    mysqli_query($dataBase,$insert);
    



    }


    public function uploadImage($filename, $tempname){


        $folder = "../admin/asset/images/" . $filename;
        move_uploaded_file($tempname,$folder);

    }

}



?>