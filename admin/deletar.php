<?php 
include_once('../src/conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM books WHERE Id_Book = $id";

$conexao -> query($sql);

header('Location: ../admin/livros.php');
exit;

?>