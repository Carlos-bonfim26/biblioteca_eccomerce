<?php
include_once('conexao.php');
session_start();
$id_User = $_SESSION['ID_USER'];
$email = $_SESSION['Email_Usuario'];
#set de data
$setDataAtual = dataAtual();
efetuarVenda($id_User, $setDataAtual, $conexao);
$sqlVenda = "SELECT * FROM sale where ClientID = $id_User AND Date_Sale = '$setDataAtual'";
$resultadoVenda = $conexao->query($sqlVenda);
$linhaVenda = $resultadoVenda->fetch_assoc();
$idVenda = $linhaVenda['Id_Sale'];
#verifica se é a compra de 1 produto ou vários
if (isset($_GET['id'])) {
    $idProduto = $_GET['id'];
    $quantidade = $_GET['quantidade'];

    itemsVenda($idProduto, $idVenda, $quantidade, $conexao);
    header("Location: emailCompra.php?id=$idProduto");
} else {
    $carrinho = isset($_COOKIE['carrinho']) ? json_decode($_COOKIE['carrinho'], true) : [];
    #ciclo de repetição para adicionar item 
    foreach ($carrinho as $idProduto => $quantidade) {
        itemsVenda($idProduto, $idVenda, $quantidade, $conexao);
    }
    #encerra o cookie
    setcookie('carrinho', '', time() - 3600, '/');
    header("Location: emailCompra.php");
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
    #transforma em um fetch assoc para ser mais fácil colocar o valor no inset
    $linhaProduto = $resultadoProduto->fetch_assoc();
    $valor = $linhaProduto['Value_Book'] * $quantidade;
    $SETestoqueBooks = $linhaProduto['Unit_book'] - $quantidade;

    $sqlItens = "INSERT INTO item_order(SaleID, BookID, Quantity, Value_sale) VALUES ($vendaID, $produtoID, $quantidade, $valor)";
    # atualiza a quantidade de livros no estoque
    $sqlEstoque = "UPDATE books SET Unit_book =  $SETestoqueBooks WHERE Id_Book = $produtoID";
    $conexao->query($sqlEstoque);
    return $result = $conexao->query($sqlItens);
}
function dataAtual()
{
    #pega a data e horário atual de São Paulo
    $dataHora = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
    #coloca no formato para se adaptar ao banco de dados
    return $dataHora->format('Y-m-d H:i:s');
}
