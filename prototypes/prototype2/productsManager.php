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


       $selectedProducts = "SELECT * 
                          FROM products";
       $query = mysqli_query($this->connectDB(), $selectedProducts);
       $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

       $productsArray = array();

       foreach($result as $data){

        $products = new product();

        $products->setId($data['id']);
        $products->setProductName($data['productName']);
        $products->setDetails($data['details']);
        $products->setQuantity($data['quantity']);
        $products->setPrice($data['price']);

        array_push($productsArray, $products);

        

       }

       return $productsArray;
      
  }
   
  public function  getProductForCart($id){
  
    $selectProduct = "SELECT * FROM products WHERE id = '$id' ";
    $queryCart = mysqli_query($this->connectDB(),$selectProduct);
    $resultCart = mysqli_fetch_all($queryCart,MYSQLI_ASSOC);
    $cartArray = array();
    
    foreach($resultCart  as $cart){

      $cartProduct = new product();

      $cartProduct->setId($cart['id']);
      $cartProduct->setProductName($cart['productName']);
      $cartProduct->setDetails($cart['details']);
      $cartProduct->setPrice($cart['price']);
      array_push($cartArray, $cartProduct);

    }
  


    return $cartArray;

    
  }
}

?>