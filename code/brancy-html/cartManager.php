<?php
class cartManager {


    

    public function initCode() {

            if(!isset($_COOKIE['cartCookie']))
            {
                $expire=time() + (86400 * 30);//however long you want
                $cookieId = uniqid();
                setcookie('cartCookie', $cookieId, $expire);
                $_SESSION["product"] = array();
                $_SESSION["quantity"] = 0;
                $_SESSION["product"] = array();
                $this->addCartCookie($cookieId);
            
          }

     
       
      
    }


    function addCartCookie($cookie){
        $sql = "INSERT INTO carts(userReference) VALUES('$cookie')";
        mysqli_query($this->getConnection(), $sql);
    }



}












?>