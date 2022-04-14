<?php 
class dataBase {


  

// connect DataBase

 public function connectDataBase(){
 
    $connect = null; 

    if($connect == null ) {

        $connect = mysqli_connect('localhost','Reda','123456','ecommercemakeup');
    }


    else {

        $message = "Database connection error";

        throw new exception($message);

    }    

    return $connect;
}

}
?>