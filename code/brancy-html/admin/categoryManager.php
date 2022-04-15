<?php

require 'config.php';
require 'categoryClass.php';

class categoryManager {


    public function addCategory($category){

            
    $configDatabase = new dataBase();
    $configDatabase->connectDataBase();
    $insertCategory = "INSERT INTO category (categoryName) VALUES ('$category')";
    mysqli_query($configDatabase->connectDataBase(), $insertCategory);

    }


    


}
?>