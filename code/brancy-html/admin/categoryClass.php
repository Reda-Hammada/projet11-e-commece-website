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

    public function setCategoryName($value){

        $this->categoryName = $value;

    }

    public function getCategoryName(){

        return $this->categoryName;
    }
 }


?>