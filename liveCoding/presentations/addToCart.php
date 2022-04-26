<?php

require '../manager/productManager.php';

    $id = $_GET['id'];
    $manager = new productManager();
    $data = $manager->getProductById($id);



    foreach($data as $product){

        $carts = array();

        if(is_array($carts)):

            $carts = array( 

                'name' =>  $product->getProductName(),
                'price' => $product->getPrice(),
                'quantity' => $_GET['quantity'],
                'id' => $id
            );



            $manager->setCart($id,$carts);
        endif;

        header('location:cart.php');
    }
   


 



?>