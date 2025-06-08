<?php 

$host = "localhost";
$user ="root";
$password = "";
$database = "system_library";

$conexao = new mysqli($host, $user, $password, $database);

if($conexao -> connect_error){
    die("Erro na conexão: ". $conexao -> connect_error);
}

?>