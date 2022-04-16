<?php

require 'config.php';
require 'categoryClass.php';

class categoryManager {


    public function addCategory($categoryAdd){ 
    
    $configDatabase = new dataBase();
    $configDatabase->connectDataBase();
  
    $category = $categoryAdd->getCategoryName();
    
    $insertCategory = "INSERT INTO category (categoryName) VALUES ('$category')";
    $query = mysqli_query($configDatabase->connectDataBase(), $insertCategory);

    }


    


}
?>