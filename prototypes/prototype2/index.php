<?php

include 'productsManager.php';
$productManager = new productManager();
$data = $productManager->getAllProducts();


foreach($data as $value) {





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo $value['id'] ?></p>
    <p><?php echo $value['productName'] ?></p>
    <p><?php echo $value['details'] ?></p>
    <p><?php echo $value['price']  ?></p>
 
    <?php } ?>
</body>
</html>