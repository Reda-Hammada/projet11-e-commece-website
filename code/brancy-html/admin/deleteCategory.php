<?php

require 'categoryManager.php';


if($_GET['id']){

   $id = $_GET['id'];
   $categoryDelete = new categoryManager();
   $categoryDelete->deleteCategory($id);
   header('location:adminDashboard.php');
}

?>