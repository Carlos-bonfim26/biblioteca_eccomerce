<?php 
include_once '../src/conexao.php';
$id = $_GET['id'];

$sql = "UPDATE sale SET statusPayment = 1 WHERE Id_Sale = $id";

$conexao->query($sql);

header("location: vendas.php");
?>