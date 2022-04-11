<?php
session_start();
include 'cartManager.php';
$cartManager = new CartManager();






$id=$_POST['id'];


$data = $cartManager->afficherProduit($id);

foreach($data as $value);


$valeurs = array(
    "nom" => $value->getNom(),
    'prix' => $value->getPrix(),
    'quantite' => $_POST["quantite"] ,
    'id' => $value->getId(),
);
$cartManager->set($_POST["id"], $valeurs);


header("location: panier.php");


