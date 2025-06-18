<?php 

include_once('../src/conexao.php');

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$valor = $_POST['valor'];
$uni = $_POST['uni'];
$id = $_POST['id'];

$sql = "UPDATE books SET Tittle_book = '$titulo', Author_book = '$autor', Value_Book = '$valor', Unit_book = '$uni' WHERE Id_Book = $id ";

$conexao->query($sql);

header("Location: ../admin/livros.php");

?>