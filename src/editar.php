<?php 
include_once('conexao.php');
session_start();
$id = $_SESSION['ID_USER'];
$nome = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['telefone'];
$cep = $_POST['cep'];
$num = $_POST['nCasa'];

$sql = "UPDATE clients SET Name_Client = '$nome', Email_Client = '$email', Phone_client = '$tel', Cep_Client = '$cep', Home_Client = '$num'  WHERE Id_client = $id";

$conexao-> query($sql);

header("location:../pages/perfil.php");
?>