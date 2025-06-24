<?php 
include_once('conexao.php');

session_start();
# destroi todas as sessões de usuário
session_destroy();

header('location:../pages/login.php');
?>