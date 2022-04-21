<?php
include "product.php";
include "cart.php";
include "cartLine.php";


class CartManager {

    public $name ;

    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'Reda', '123456', 'ecommercemakeup');
           
         
       
        
        return $this->Connection;
    }


  public function initCode() {
    if(!isset($_COOKIE['cartCookie']))
    {
        $expire=time() + (86400 * 30);//however long you want
        $cookieId = uniqid();
        setcookie('cartCookie', $cookieId, $expire);
        $_SESSION["product"] = array();
        $_SESSION["quantity"] = 0;
        $_SESSION["product"] = array();
        $this->addCartCookie($cookieId);
    }

 }
    
    // Add product to cart
    public function addProduct($cart, $product, $quantity){
        $cartId = $cart->getId();
        $productId = $product->getId();
        $sql = "INSERT INTO cartLine(idProduct,idCart,productQuantity) VALUES('$productId', '$cartId', '$quantity')";
        $result = mysqli_query($this->getConnection(), $sql);
        if($result){
            $this->getConnection()->close();
        }

    }

    public function getCartLine($id){
        $sql = "SELECT * FROM cartLine INNER JOIN products on products.id = cartLine.idProduct WHERE idCart='$id'";
        $query = mysqli_query($this->getConnection(), $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        
       
        $cartLineList = array();
        foreach($result as $value){
            $product = new Product();
            $cartLine = new CartLine();
            $cartLine->setIdCartLine($value['idCartLine']);
            $cartLine->setIdCart($value['idCart']);
            $cartLine->setIdProduct($value['idProduct']);
            $cartLine->setProductCartQuantity($value['productQuantity']);
            $product->setId($value['id']);
            $product->setName($value['ProductName']);
            $product->setPrice($value['price']);
            $product->setDescription($value['details']);
            $product->setDateOfExpiration($value["expirationDate"]);
            $product->setQuantity($value['stockQuantity']);
            $product->setCategory($value['categoryProduct']);
            $cartLine->setProduct($product);
            array_push($cartLineList, $cartLine);
        }
        return $cartLineList;
    }
    
    // pour ajouter session
    public function set($cart, $product, $quantity){
        session_start();
        $_SESSION["cart"] = $cart;
        array_push($_SESSION["product"], $product);
        if(!isset($_SESSION["quantity"])){
            $_SESSION["quantity"] = 0;
        }
        $_SESSION["quantity"] += $quantity; 

    }

      // afficher session

      public function getCartProducts($cartId){

        $sql = "SELECT * FROM cartLine INNER JOIN products on cartLine.idCartLine = products.id WHERE idCart = $cartId";
        $query = mysqli_query($this->getConnection(), $sql);
        $result =  mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
        $product = new Product();
        $productsList = array();
        foreach ($result as $value_Data) {
            $product->setId($value_Data['id']);
            $product->setName($value_Data['productName']);
            $product->setPrice($value_Data['price']);
            $product->setDescription($value_Data['details']);
            $product->setDateOfExpiration($value_Data["expirationDate"]);
            $product->setQuantity($value_Data['stockQuantity']);
            $product->setCategory($value_Data['categoryProduct']);
            array_push($productsList, $product);
        }
          return $productsList;
        // if(isset($_SESSION["product"])){
        //     return $_SESSION["product"];
        // }

      }

      public function getCartQuantity(){
          if(isset($_SESSION["quantity"])){
              return $_SESSION["quantity"];
          }
      }

          //supprimer session
    public function delete($id){
        if(isset($_SESSION["paniers"]["products"][$id])){
            unset($_SESSION["paniers"]["products"][$id]);
        }
    }

    
    // pour afficher  session 
    public function getProductCart($idCartLine){
        $sql = "SELECT * FROM cartLine INNER JOIN products on cartline.idProduct = products.id WHERE idCartLine = $idCartLine";
        $query = mysqli_query($this->getConnection(),$sql);
        $result = mysqli_fetch_assoc($query);

        $cartLine = new CartLine();
        $cartLine->setIdCartLine($result['idCartLine']);
        $cartLine->setIdCart($result['idCart']);
        $cartLine->setIdProduct($result['idProduct']);
        $cartLine->setProductCartQuantity($result['productQuantity']);
        
        $product = new Product();
        $product->setId($result['id']);
        $product->setName($result['productName']);
        $product->setPrice($result['price']);
        $product->setDescription($result['details']);
        $product->setDateOfExpiration($result["expirationDate"]);
        $product->setQuantity($result['stockQuantity']);
        $product->setCategory($result['categoryProduct']);

        $cartLine->setProduct($product);

        return $cartLine;
    }

    // Edit  cart line
    public function editCartLine($idCartLine, $quantity){
        $sql = "UPDATE cartLine SET productQuantity = '$quantity' WHERE idCartLine=$idCartLine";
        mysqli_query($this->getConnection(), $sql);
        
    }

  

// afficher  les produits : page index
    public function afficher(){
        $SelctRow = 'SELECT *  FROM products';
        $query = mysqli_query($this->getConnection() ,$SelctRow);
        $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $TableData = array();
        foreach ($produits_data as $value_Data) {
            $product = new Product();
            $product->setId($value_Data['id']);
            $product->setName($value_Data['productName']);
            $product->setPrice($value_Data['price']);
            $product->setDescription($value_Data['details']);
            $product->setDateOfExpiration($value_Data["expirationDate"]);
            $product->setQuantity($value_Data['stockQuantity']);
            array_push($TableData, $product);
        }
          return $TableData;
 
        }
  
 
        
// afficher  les produits : page panier

        public function afficherProduit($id){

            $SelctRow = "SELECT * FROM products WHERE id = $id";
            $query = mysqli_query($this->getConnection() ,$SelctRow);
            $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC); 
            $product = new Product();

            
            foreach ($produits_data as $value) {
            $product->setId($value['id']);
            $product->setName($value['productName']);
            $product->setPrice($value['price']);
            $product->setDescription($value['details']);
            $product->setDateOfExpiration($value["expirationDate"]);
               
            }
              return $product;
        }
      
 

        function compteur(){ 
        if(isset($_SESSION["paniers"]) != null){
                $compteur = count($_SESSION["paniers"]["products"]) ;
            
            }else {
                $compteur = 0;
            
            }
            return $compteur;
        }

        function addCartCookie($cookie){
            $sql = "INSERT INTO cart (userReference) VALUES('$cookie')";
            mysqli_query($this->getConnection(), $sql);
        }

        function getCart($userRefe){
            
            $sql = "SELECT * from cart WHERE userReference	 = '$userRefe'";
            $query = mysqli_query($this->getConnection(), $sql);
            $result = mysqli_fetch_assoc($query);

            
            $cart = new Cart();
            $cart->setId($result['id']);
            $cart->setUserReference($result["userReference"]);

            $cartLine = $this->getCartLine($cart->getId());
            $cart->setCartLineList($cartLine);
            return $cart;
        }
    }
