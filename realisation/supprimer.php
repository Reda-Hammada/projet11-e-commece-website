<?php
session_start();
include 'cartManager.php';
$cartManager = new CartManager();




$cartManager->delete($_GET["id"]);
header('location:panier.php');