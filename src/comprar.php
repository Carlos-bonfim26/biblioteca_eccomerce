<?php
include_once('conexao.php');
session_start();
$id_User = $_SESSION['ID_USER'];
$email = $_SESSION['Email_Usuario'];
$setDataAtual = dataAtual();
efetuarVenda($id_User, $setDataAtual, $conexao);
$sqlVenda = "SELECT * FROM sale where ClientID = $id_User AND Date_Sale = '$setDataAtual'";
$resultadoVenda = $conexao->query($sqlVenda);
$linhaVenda = $resultadoVenda->fetch_assoc();
$idVenda = $linhaVenda['Id_Sale'];
if (isset($_GET['id'])) {
    $idProduto = $_GET['id'];
    $quantidade = $_GET['quantidade'];

    itemsVenda($idProduto, $idVenda, $quantidade, $conexao);
    header("Location: ../pages/carrinho.php");
} else {
    $carrinho = isset($_COOKIE['carrinho']) ? json_decode($_COOKIE['carrinho'], true) : [];

    foreach ($carrinho as $idProduto => $quantidade) {
        itemsVenda($idProduto, $idVenda, $quantidade, $conexao);
    }
    setcookie('carrinho', '', time() - 3600, '/');
    header("Location: ../pages/carrinho.php");
}
function efetuarVenda($userID, $data, $conexao)
{
    $sql = "INSERT INTO sale (Date_Sale, ClientID ) VALUES ('$data', $userID)";

    return $result = $conexao->query($sql);
}
function itemsVenda($produtoID, $vendaID, $quantidade, $conexao)
{

    $sqlProduto = "SELECT * FROM books WHERE Id_Book = $produtoID";
    $resultadoProduto = $conexao->query($sqlProduto);
    $linhaProduto = $resultadoProduto->fetch_assoc();
    $valor = $linhaProduto['Value_Book'] * $quantidade;

    $sqlItens = "INSERT INTO item_order(SaleID, BookID, Quantity, Value_sale) VALUES ($vendaID, $produtoID, $quantidade, $valor)";

    return $result = $conexao->query($sqlItens);
}
function enviarEmail() {}
function dataAtual()
{
    $dataHora = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
    return $dataHora->format('Y-m-d H:i:s');
}
