<?php 

session_start();

require 'config.php';

$database = new dataBase();

$connect = $database->connectDatabase();

// bring admin credentials

    $admin = "SELECT * FROM user";
    $query = mysqli_query($connect, $admin);
    $result = mysqli_fetch_assoc($query);

    $username = $result['username'];
    $password = $result['password'];

   
    if($_POST['username'] == $username && $_POST['password'] == $password){
        
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        
        header('location:adminDashboard.php');

    }

    













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
    <form method="post">
        <input type="text" name="username">
        <input type ="password" name="password">
        <input type="submit" name ="login" value="login">
</form>
</body>
</html>