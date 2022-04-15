<?php

 class category{

    public $id;
    public $categoryName;


    public function setId($id){

        $this->id = $id;

    }

    public function getId(){

        return $this->id;
    }

    public function setCategoryName($categoryName){

        $this->cetgoryName = $categoryName;

    }

    public function getCategoryName(){

        return $this->categoryName;
    }
 }


?>