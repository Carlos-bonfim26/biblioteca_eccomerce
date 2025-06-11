<?php 

include_once("conexao.php");

$nome = $_POST['name'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$casa = $_POST['nCasa'];
$senha = $_POST['password'];

$salt = md5($senha . $email);
$custo = "06";
$senhaCripto = crypt($senha, "$2b$" . $custo . "$" . $salt . "$");

$sql = "INSERT INTO clients(Name_Client, Email_Client,Phone_client, Cep_Client, Home_Client, Password_Client) VALUES ('$nome', '$email', '$telefone', '$cep', '$casa', '$senhaCripto')";

$conexao ->query($sql);

header("Location: ../pages/login.php");

?>