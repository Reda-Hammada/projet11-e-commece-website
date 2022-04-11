<?php
include "produit.php";




class CartManager {

    public $name ;


    private function getConnection(){
                     
        $Connection = null;

            if($Connection == null){

                $Connection = mysqli_connect('localhost','Reda','123456','ecommercemakeup');
            }

            else {

                $message = "database error";

                throw new exception($message);
            }
           
         
       
        
        return $Connection;
    }


  
    
    
    
    // pour ajouter session
    public function set($key,$value){
        $_SESSION["paniers"]["produits"][$key] = $value ;

    }

      // afficher session

      public function getPanier(){
        if(isset($_SESSION["paniers"]["produits"])){
            return $_SESSION["paniers"]["produits"];
            return array();
        }

      }

          //supprimer session
    public function delete($id){
        if(isset($_SESSION["paniers"]["produits"][$id])){
            unset($_SESSION["paniers"]["produits"][$id]);
        }
    }

    
    // pour afficher  session 
    public function getProduit($id){
        if(isset($_SESSION["paniers"]["produits"][$id])){
            return $_SESSION["paniers"]["produits"][$id];
            return null ; 
        }
    }

  

// afficher  les produits : page index
    public function afficher(){
        $SelctRow = 'SELECT *  FROM products';
        $query = mysqli_query($this->getConnection(),$SelctRow);
        $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $TableData = array();
        foreach ($produits_data as $value_Data) {
            $produit = new Produit();
            $produit->setId($value_Data['id']);
            $produit->setNom($value_Data['productName']);
            $produit->setPrix($value_Data['price']);
           
            array_push($TableData, $produit);
        }
          return $TableData;
 
        }
  
 
        
// afficher  les produits : page panier

        public function afficherProduit($id){
            $SelctRow = "SELECT * FROM products WHERE id =$id";
            $query = mysqli_query($this->getConnection() ,$SelctRow);
            $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
            $TableData = array();
            foreach ($produits_data as $value) {
                $produit = new Produit();
                $produit->setId($value['id']);
                $produit->setNom($value['productName']);
                $produit->setPrix($value['price']);
               
                array_push($TableData, $produit);
            }
              return $TableData;
        }
      
 


        function compteur(){ 
        if(isset($_SESSION["paniers"]) != null){
                $compteur = count($_SESSION["paniers"]["produits"]) ;
            
            }else {
                $compteur = 0;
            
            }
            return $compteur;
        }

        function addCartCookie($cookie){
            $sql = "INSERT INTO carts(userReference) VALUES('$cookie')";
            mysqli_query($this->getConnection(), $sql);
        }
    }
