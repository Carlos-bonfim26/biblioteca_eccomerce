<?php 
include_once('conexao.php');

session_start();

session_destroy();

header('location:../pages/login.php');
?>