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

    public function fetchCategoryById($id) {

        $configDatabase = new dataBase();
        $database = $configDatabase->connectDataBase();
        $fetch = "SELECT categoryName FROM category WHERE id ='$id'";
        $query = mysqli_query($database, $fetch);
        $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

        $fetchArray = array();

        foreach($result as $categoryById){

            $fetchByIdObject = new category();
            $fetchByIdObject->setCategoryName($categoryById);
            array_push($fetchArray, $fetchByIdObject);

        }

        return $fetchArray;


    }

    // edit category 

    public function editCategory($id,$editedCategory){
        
        $newCategoryName = $editedCategory->getCategoryName();
        $configDatabase =  new dataBase();
        $database = $configDatabase->connectDataBase();
        $query = "UPDATE category SET categoryName = '$newCategoryName' WHERE id = '$id'";
        mysqli_query($database, $query);



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