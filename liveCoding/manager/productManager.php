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
}


?>