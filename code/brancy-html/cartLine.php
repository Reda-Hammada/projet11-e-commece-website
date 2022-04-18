<?php
class cartLine {

    private $idCartLine; 
    private $idProduct;
    private $idCart;
    private $productCartQuantity;

    public function setIdCartLine($idCartLine){

        $this->idCartLine = $idCartLine;

    }

    public function getIdCartLine(){

        return $this->idCartLine;
    }

    public function setIdProduct($idProduct){

        $this->idProduct = $idProduct;

    }

    public function getIdProduct(){

        return $this->idProduct;
    }

    public function setIdCart($idCart){

        $this->idCart =  $idCart;
    }

    public function getIdCart(){

        return $this->idCart;
    }

    public function setProductCartQuantity($productCartQuantity){

        $this->productCartQuantity = $productCartQuantity;

    }

    public function getProductCartQuantity(){

        return $this->productCartQuantity;
    }

}









?>