<?php
require_once("../src/conexao.php");
session_start();
if (!isset($_SESSION['Usuario'])) {
    header('Location: pages/login.php');
    exit;
}
$id = $_SESSION['ID_USER'];

$sql = "SELECT * FROM clients WHERE Id_client = $id";

$result = $conexao->query($sql);
$cliente = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Carlos Bonfim">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">

    <link rel="shortcut icon" href="../img/logoIcon.png" type="image/x-icon">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="../img/logo.png" alt="logo da compiloteca"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">

                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php#storebooks">Livros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="carrinho.php">Carrinho</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="perfil.php">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="contato.php">Fale Conosco</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <div class="header-perfil">
        <h1>Olá <?= $cliente['Name_Client'] ?>, bem vindo ao seu perfil</h1>

        <a href="../src/logout.php">Sair</a>
    </div>
    <main class="container-perfil">

        <div class="container-form">

            <form action="../src/editar.php" method="post">
                <input required value="<?= $cliente['Name_Client'] ?>" name="name" id="name" placeholder="Nome:" type="text">
                <input required value="<?= $cliente['Email_Client'] ?>" name="email" id="email" placeholder="Email:" type="email">
                <input required value="<?= $cliente['Phone_client'] ?>" name="telefone" id="telefone" placeholder="Telefone:" type="tel">
                <div class="form-house">
                    <input required value="<?= $cliente['Cep_Client'] ?>" name="cep" id="cep" placeholder="Cep:" type="text">
                    <input required value="<?= $cliente['Home_Client'] ?>" name="nCasa" id="nCasa" placeholder="Número Casa" type="text">
                </div>
                  <a href="../src/emailSenha.php" id="passwordKey">Trocar senha <i class="fa-solid fa-key"></i></a>
                <input type="submit" value="Salvar informações">
            </form>
        </div>
        <div class="image-form">
            <img src="../img/perfil.svg" alt="">
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>