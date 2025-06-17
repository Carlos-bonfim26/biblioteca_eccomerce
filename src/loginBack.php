<?php 

include_once('conexao.php');

$emailUsuario = $_POST['email'];
$senha = $_POST['password'];

$sql = "SELECT * FROM clients WHERE Email_Client = '$emailUsuario'";

$login = mysqli_query($conexao, $sql);

if(mysqli_num_rows($login) > 0){
    $row = $login -> fetch_assoc();
    $senhaDB = $row['Password_Client'];

    $salt = md5($senha . $emailUsuario);
    $custo = "06";
    $senhaCriptografada = crypt($senha, "$2b$" . $custo . "$" .  $salt . "$");

    if($senhaDB === $senhaCriptografada){
        session_start();
        $_SESSION['Usuario'] = $row['Name_Client'];
        $_SESSION['Email_Usuario'] = $row['Email_Client'];
        $_SESSION['ID_USER'] = $row['Id_client'];
        header("Location: ../index.php");
    }else{
        header("Location: ../pages/login.php?error2");
    }
}else{
     header("Location: ../pages/login.php?error1");
}
?>