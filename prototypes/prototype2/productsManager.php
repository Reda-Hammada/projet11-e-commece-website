<?php

include 'products.php';
include 'cartClass.php';


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


       $selectedProducts = "SELECT * FROM products";

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
   
  public function  getProductForDetails($id){
  
    $selectProduct = "SELECT * FROM products WHERE id = '$id' ";
    $queryDetails = mysqli_query($this->connectDB(),$selectProduct);
    $resultDetails = mysqli_fetch_all($queryDetails,MYSQLI_ASSOC);
    $detailsArray = array();
     
    


    foreach($resultDetails  as $details){

      $productDetails = new product();

      $productDetails->setId($details['id']);
      $productDetails->setProductName($details['productName']);
      $productDetails->setDetails($details['details']);
      $productDetails->setPrice($details['price']);

    }

    array_push($detailsArray, $productDetails);

  


    return $detailsArray;

    
  }

  public function  startSession($id,$arraySession){
    
    session_start();

    $cartClass = new cart();
    $_SESSION['cart'] =  $arraySession;
    $data = $arraySession;
  
    print_r($data);
   
  }
    
 
}

?>