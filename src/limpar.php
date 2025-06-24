<?php 
# limpar o carrinho forçando o final do cookie
setcookie('carrinho', '', time() - 3600, '/');


    header('location: ../pages/carrinho.php');
    exit;

?>