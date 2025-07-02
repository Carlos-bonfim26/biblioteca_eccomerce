<?php 
include_once '../src/conexao.php';
$id = $_GET['id'];
#transforma o status do pagamento em true
$sql = "UPDATE sale SET statusPayment = 1 WHERE Id_Sale = $id";

$conexao->query($sql);

header("location: vendas.php");
?>