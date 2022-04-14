<?php
class cartManager {


    public function initCookies(){


        $idCookies = uniqid();
        $expire = time()  +  (2592000 * 30);
        $name ="reda";
        $cookie = setcookie($idCookies,$name,$expire, "/"); 

     
       
      
    }



}












?>