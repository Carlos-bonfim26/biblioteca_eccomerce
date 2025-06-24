<?php 
$id = $_GET['id'] ??null;

if($id){
    if(isset($_COOKIE['carrinho'])){
        $carrinho = json_decode($_COOKIE['carrinho'], true);
    }else{
        $carrinho = [];
    }

    if(isset($carrinho[$id])){
        $carrinho[$id]++;
    }else{
        $carrinho[$id] = 1;
    }
    # cria o cookie de carrinho, assim mantendo o produto salvo no carrinho por  7 dias
    setcookie('carrinho', json_encode($carrinho), time() + (86400 * 7), '/');
}

header('Location: ../pages/carrinho.php');
exit;
?>