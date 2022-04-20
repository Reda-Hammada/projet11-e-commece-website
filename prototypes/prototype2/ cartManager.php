<?php
include 'products.php';
include 'cart.php';
include 'cartLine.php';

class CartManager {


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


    public function initCode() {

        if(!isset($_COOKIE['cartCookie'])){

            $expire=time() + (2592000 * 30);//however long you want
            $cookieId = uniqid();
            setcookie('cartCookie', $cookieId, $expire);
            $_SESSION["product"] = array();
            $_SESSION["quantity"] = 0;
            $_SESSION["product"] = array();
            $this->addCartCookie($cookieId);
        }


      
        function addCartCookie($cookie){
            
            $sql = "INSERT INTO cart(userReference) VALUES('$cookie')";
            mysqli_query($this->connectDB(), $sql);
        }
     }
        






}