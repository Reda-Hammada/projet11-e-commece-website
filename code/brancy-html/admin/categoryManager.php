<?php

require 'config.php';
require 'categoryClass.php';

class categoryManager {

// insert categories into database 

    public function addCategory($categoryAdd){ 
    
    $configDatabase = new dataBase();
    $configDatabase->connectDataBase();
  
    $category = $categoryAdd->getCategoryName();
    
    $insertCategory = "INSERT INTO category (categoryName) VALUES ('$category')";
    $query = mysqli_query($configDatabase->connectDataBase(), $insertCategory);

    }

    // fetch categories to display them on the admin dashboard

    public function displayCategory(){

        $configDatabase = new dataBase();
        $configDatabase->connectDataBase();
        $fetchCategories = "SELECT id,categoryName FROM category";
        $query = mysqli_query($configDatabase->connectDataBase(), $fetchCategories);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $categoryFetch =  new category();

        $categoriesArray = array();

        foreach($result  as $categories){

            $categoryFetch->setId($categories['id']);
            $categoryFetch->setCategoryName($categories['categoryName']);


        }

        array_push($categoriesArray, $categoryFetch);

        return $categoriesArray;


    }


    


}
?>