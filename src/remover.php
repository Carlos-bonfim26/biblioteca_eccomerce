<?php 

$id = $_GET['id'];

if($id && isset($_COOKIE['carrinho'])){
    # descodifica o sjon e depois no unset dropa o produto do carrinho
    $carrinho = json_decode($_COOKIE['carrinho'], true);
    unset($carrinho[$id]);
    # renova o cookie de carrinho 
    setcookie('carrinho', json_encode($carrinho), time() + (86400 * 7), '/');

    header('location: ../pages/carrinho.php');
    exit;
}

?>