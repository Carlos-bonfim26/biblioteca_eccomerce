<?php 
include_once('../src/conexao.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
$email = $_POST['email'];
$senha = $_POST['password'];

    # modo de criptografia de senha
    $salt = md5($senha . $email);
    $custo = "06";
    $senhaCriptografada = crypt($senha, "$2b$" . $custo . "$" .  $salt . "$");

    $sql = "UPDATE clients SET Password_Client = '$senhaCriptografada' WHERE Email_Client = '$email'";

    $conexao->query($sql);
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Carlos Bonfim">
    <title>Trocar senha</title>
    <link rel="stylesheet" href="../css/forms.css">
    <link rel="shortcut icon" href="../img/logoIcon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main class="container-signUp">
        <div class="container-form">
            <h1>Trocar senha</h1>

            <form  method="post">
                <input name="email" id="email" placeholder="Email:" type="email">


                <input name="password" id="password" placeholder="Nova senha:" type="password">

                <input type="submit" value="Trocar senha">
            </form>
        </div>
        <div class="image-form">
            <img src="../img/password.svg" alt="">
        </div>
    </main>

</body>

</html>