<?php

class productAdmin {


    private $id;
    private $productName;
    private $price;
    private $details;
    private $quantityStock;
    private $expirationDate;
    private $image;


    public function setId($id){

        $this->id = $id;

    }

    public function getId(){

        return $this->id;
    }

    public function setProductName($productName){

        $this->productName = $productName;

    }

    public function getProductName(){

        return $this->productName;

        
    }

    public function setPrice($price){

        $this->price = $price;

    }

    public function getPrice(){

        return $this->price;


    }

    public function setDetails($details){

        $this->details = $details;
    }


    public function getDetails(){

        return $this->details;
    }


    public function setQuantityStock($quantityStock){

        $this->quantityStock = $quantityStock;
    }

    public function getQuantityStock(){

        return $this->quantityStock;

    }

    public function setExpirationDate($expirationDate){

        $this->ExpirationDate = $expirationDate;

    }

    public function getExpirationDate(){

        return $this->expirationDate;
    }

    public function setImage($image){

        $this->image = $image;
    }

    public function getImage(){

        return $this->image;
    }



}














?>