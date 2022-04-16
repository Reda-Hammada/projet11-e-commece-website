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
        $fetchCategories = "SELECT * FROM category";
        $query = mysqli_query($configDatabase->connectDataBase(), $fetchCategories);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $categoriesArray = array();

        foreach($result  as $categories){

            $categoryFetch =  new category();
            $categoryFetch->setId($categories['id']);
            $categoryFetch->setCategoryName($categories['categoryName']);
            array_push($categoriesArray, $categoryFetch);



        }


        return $categoriesArray;


    }


    // edit category 

    public function editCategory(){


    }


    // Delete category 

    public function deleteCategory($id){


        $configDatabase = new dataBase();
        $database = $configDatabase->connectDataBase();
        $query = " DELETE from category WHERE id = '$id'";
        mysqli_query($database, $query);



    }


    


}
?>