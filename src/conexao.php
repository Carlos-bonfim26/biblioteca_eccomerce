<?php 
# infos para entrar no banco
$host = "localhost";
$user ="root";
$password = "";
$database = "system_library";

$conexao = new mysqli($host, $user, $password, $database);

# caso de erro de conexão
if($conexao -> connect_error){
    die("Erro na conexão: ". $conexao -> connect_error);
}

?>