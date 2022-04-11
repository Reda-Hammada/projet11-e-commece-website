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
        $products->setDetails($data['description']);
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

      $productDetails = new cart();

      $productDetails->setId($details['id']);
      $productDetails->setProductName($details['productName']);
      $productDetails->setDetails($details['description']);
      $productDetails->setPrice($details['price']);

    }

    array_push($detailsArray, $productDetails);

  


    return $detailsArray;

    
  }

  public function  startSession($arrCart){
    
      session_start();
      $_SESSION['cart'] = $$arrCart;

    }






    public function getProductForCart($id){
              
      $product = "SELECT * FROM products WHERE id = '$id' ";
      $query = mysqli_query($this->connectDB(), $product);
      $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
      $detailsForCart = array();

      $productCart = new product();

      $productCart->setId($result['id']);
      $productCart->setProductName($result['productName']);
      $productCart->setDetails($result['description']);
      $productCart->setPrice($result['price']);

      array_push($detailsForCart, $product);

      return $detailsForCart;
    }

  
    
 
}

?>