<?php

$id = $_GET['id'];
$qtd = $_GET['qtd'];
if ($id && isset($_COOKIE['carrinho'])) {
    $carrinho = json_decode($_COOKIE['carrinho'], true);
    if (isset($_GET['trash'])) {
        unset($carrinho[$id]);
        setcookie('carrinho', json_encode($carrinho), time() + (86400 * 7), '/');

        header('location: ../pages/carrinho.php');
        exit;
    }
    # descodifica o sjon e depois no unset dropa o produto do carrinho

    if (isset($carrinho[$id])) {
        $novaQtd = $qtd - 1;
        if ($novaQtd > 0) {
            $carrinho[$id] = $novaQtd;
        } else {
            unset($carrinho[$id]);
        }
        # renova o cookie de carrinho 
        setcookie('carrinho', json_encode($carrinho), time() + (86400 * 7), '/');

        header('location: ../pages/carrinho.php');
        exit;
    }
}
