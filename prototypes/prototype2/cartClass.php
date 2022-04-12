<?php
 
 class cart{

  
    private $id;
    private $nameProduct;
    private $details;
    private $quantity;
    private $price;
    private $total;

    public function getIdCart(){

      return $this->id;

    }

  public function setIdCart($value){

      $this->id = $value;

    }

    public function getNameProduct(){

        return $this->nameProduct;

      }

    public function setNameProduct($value){

        $this->nameProduct = $value;

      }

 

 public function  getDetails(){

    return $this->details;

   }

 public function  setDetails($value){

    $this->details = $value;

   }

 public function  getQuantity(){

    return $this->quantity;

   }

 public function  setQuantity($value){

    $this->quantity = $value;

   }

 public function  getPrice(){

    return $this->price;

   }

 public function  setPrice($value){

    $this->price = $value;

   }

 public function  getTotal(){

    return $this->total;

   }

 public function  setTotal($value){

    $this->total = $value;
    
   }


 


}

?>