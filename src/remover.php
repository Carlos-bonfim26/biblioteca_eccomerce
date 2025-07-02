<?php

$id = $_GET['id'];
$qtd = $_GET['qtd'];
if ($id || $_GET['trash'] && isset($_COOKIE['carrinho'])) {
    # descodifica o sjon e depois no unset dropa o produto do carrinho
    $carrinho = json_decode($_COOKIE['carrinho'], true);
    # se o usuário tiver apertado no botão de lixeira ele já remove logo o produto da página
    if (isset($_GET['trash'])) {
        unset($carrinho[$id]);
        setcookie('carrinho', json_encode($carrinho), time() + (86400 * 7), '/');
        if (isset($_GET['email'])) {
            header("location: ../pages/carrinho.php?email=1");
            exit;
        }
        header('location: ../pages/carrinho.php');
        exit;
    }


    if (isset($carrinho[$id])) {
        #diminui a quantidade de item no carrinho
        $novaQtd = $qtd - 1;
        if ($novaQtd > 0) {
            $carrinho[$id] = $novaQtd;
        } else {
            # se tiver menos de um item no carrinho ele já remove o produto
            unset($carrinho[$id]);
        }
        # renova o cookie de carrinho 
        setcookie('carrinho', json_encode($carrinho), time() + (86400 * 7), '/');

        header('location: ../pages/carrinho.php');
        exit;
    }
}
