<?php

include 'products.php';

class productManager {

    private function  connectDB(){

        $connect = null; 
        
        if($connect == null){

          $connect =  mysqli_connect('localhost','Reda','123456','ecommercemakeup');

        }

        else {

                $message = 'database connection error';

                throw new Exception($message);
        }

            return $connect;
    }




   public function getAllProducts(){


       $products = new product();
       $selectedProduct = "SELECT * FROM products";
       $query = mysqli_query($this->connectDB(), $selectedProduct);
       $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

       $products->getProductName($result['productName']);
       $products->getDetails($result['details']);
       $products->getPrice($result['price']);


       return $products;
       

  
  }

}

?>