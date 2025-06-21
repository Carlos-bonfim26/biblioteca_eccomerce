<?php 

setcookie('carrinho', '', time() - 3600, '/');


    header('location: ../pages/carrinho.php');
    exit;

?>