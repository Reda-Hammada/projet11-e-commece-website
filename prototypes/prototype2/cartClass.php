<?php
 
 class cart{

  
    private $id;
    private $userReference;
    private $cartLineList = array();

    public function getIdCart(){

      return $this->id;

    }

  public function setIdCart($value){

      $this->id = $value;

    }

    public function setUserReference($userReference){

      $this->userReference =  $userReference;

    }

    public function getUserReference(){

      return $this->userReference;
    }

    public function setCartLineList($cartLineList){
      
      array_push($this->cartLineList, $cartLineList);
  }

  public function getCartLineList(){

      return $this->cartLineList;
  }

  }