<?php

require 'config.php';
require 'categoryClass.php';

class categoryManager {


    public function addCategory($Category){ 

    $category = $Category->getCategoryName();
    $configDatabase = new dataBase();
    $configDatabase->connectDataBase();
    
    $insertCategory = "INSERT INTO category (categoryName) VALUES ('$category')";
    mysqli_query($configDatabase->connectDataBase(), $insertCategory);

    }


    


}
?>