<?php 
require_once "src/conexao.php";

session_start();

if(!isset($_SESSION['Usuario'])){
    header('Location: pages/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Carlos Bonfim">
    <title>Compiloteca</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logoIcon.png" type="image/x-icon">
</head>
<body>
    
<h1>Olá mundo</h1>
   
</body>
</html>