<?php
    class Cart {
        private $id;
        private $userReference;
        private $cartLineList = array();


        function setId($id){
            $this->id = $id;
        }

        function getId(){
            return $this->id;
        }

        function setUserReference($userRef){
            $this->userReference = $userRef;
        }

        function getUserReference(){
            return $this->userReference;
        }

        function setCartLineList($cartLineList){
            array_push($this->cartLineList, $cartLineList);
        }

        function getCartLineList(){
            return $this->cartLineList;
        }
    }
?>