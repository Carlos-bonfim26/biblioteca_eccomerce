<?php 

$id = $_GET['id'];

if($id && isset($_COOKIE['carrinho'])){
    $carrinho = json_decode($_COOKIE['carrinho'], true);
    unset($carrinho[$id]);

    setcookie('carrinho', json_encode($carrinho), time() + (86400 * 7), '/');

    header('location: ../pages/carrinho.php');
    exit;
}

?>