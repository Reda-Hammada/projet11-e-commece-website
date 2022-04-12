<?php

include 'products.php';
include 'cartClass.php';

// connect DataBase
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



    // get all products from database to display on main page
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
   
  // get one particular product to display on product details page 
  
  public function  getProductForDetails($id){
  
    $selectProduct = "SELECT * FROM products WHERE id = '$id' ";
    $queryDetails = mysqli_query($this->connectDB(),$selectProduct);
    $resultDetails = mysqli_fetch_all($queryDetails,MYSQLI_ASSOC);
    $detailsArray = array();
     
    


    foreach($resultDetails  as $details){

      $productDetails = new product();

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
       $convertIntoString = implode("",$arrCart);
      $_SESSION['cart'] = $convertIntoString;
    }






    public function getProductForCart($id){
              
      $product = "SELECT * FROM products WHERE id = '$id'";
      $query = mysqli_query($this->connectDB(), $product);
      $cartDetails = mysqli_fetch_all($query, MYSQLI_ASSOC);
      $detailsForCart = array();


      foreach($cartDetails as $cart){

        $productCart = new cart();

        $productCart->setIdCart($cart['id']);
        $productCart->setNameProduct($cart['productName']);
        $productCart->setDetails($cart['description']);
        $productCart->setPrice($cart['price']);


    }

      
     
      array_push($detailsForCart, $productCart);

      return $detailsForCart;
    }

  
    
 
}

?>