<?php 


class product {

    private $id;
    private $productName;
    private $price;
    private $details;


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
}









?>