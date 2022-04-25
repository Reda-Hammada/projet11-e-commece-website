<?php

require '../config/config.php';
require '../entities/product.php';

class productManager {

    public function getAllProducts(){

        $configDB = new dataBase();
        $dataBase = $configDB->connectDB();
            
        $products = 'SELECT * FROM products';
        $query = mysqli_query($dataBase, $products);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $productArray = array();

        foreach($result as $product){

            $allProducts = new product();
            $allProducts->setId($product['id']);
            $allProducts->setProductName($product['productName']);
            $allProducts->setPrice($product['price']);
            $allProducts->setDetails($product['description']);

            array_push($productArray, $allProducts);
        }
        return $productArray;
    }

    public function getProductById($id){

        $configDB = new dataBase();
        $dataBase = $configDB->connectDB();
        $selectedProduct = "SELECT * FROM products WHERE id = '$id'";
        $query = mysqli_query($dataBase , $selectedProduct);
        $result = mysqli_fetch_all($query , MYSQLI_ASSOC);

        $productById = array();

        foreach($result as $product){

            $fetchedProduct = new product();
            $fetchedProduct->setId($product['id']);
            $fetchedProduct->setProductName($product['productName']);
            $fetchedProduct->setDetails($product['description']);
            $fetchedProduct->setPrice($product['price']);


            array_push($productById,  $fetchedProduct);
            

        }

        return $productById;


    }
}


?>