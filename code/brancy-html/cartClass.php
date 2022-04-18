<?php 
 
 class  cart {

  private $id;
  private $userReference;
  private $cartLineList  = array();


  public function setId($id){

    $this->id = $id;

  }

  public function getId(){

    return $this->id;

  }

  public function setUserReference($userReference){

    $this->UserReference = $userReference;

  }

  public function getUserReference(){

    return $this->UserReference;
  }

  public function setCarLineList($cartLineList){

    array_push($this->cartLineList, $cartLineList);

  }

  public function getCartLineList() {

    return $this->cartLineList; 
  }

 }

 






?>