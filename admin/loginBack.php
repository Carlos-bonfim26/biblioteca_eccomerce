<?php 

include_once('../src/conexao.php');

$emailUsuario = $_POST['email'];
$senha = $_POST['password'];

$sql = "SELECT * FROM admin WHERE Email_Admin = '$emailUsuario'";

$login = mysqli_query($conexao, $sql);

if(mysqli_num_rows($login) > 0){
    $row = $login -> fetch_assoc();
    $senhaDB = $row['Password_admin'];

    $salt = md5($senha . $emailUsuario);
    $custo = "06";
    $senhaCriptografada = crypt($senha, "$2b$" . $custo . "$" .  $salt . "$");

    if($senhaDB === $senhaCriptografada){
        session_start();

        $_SESSION['Email_Admin'] = $row['Email_Admin'];

        header("Location: livros.php");
    }else{
        header("Location: loginAdm.php?error2");
    }
}else{
     header("Location: loginAdm.php?error1");
}
?>