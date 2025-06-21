<?php
require_once "src/conexao.php";

session_start();

if (!isset($_SESSION['Usuario'])) {
    header('Location: pages/login.php');
    exit;
}

$sql = "SELECT * FROM books";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Carlos Bonfim">
    <title>Compiloteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">

    <link rel="shortcut icon" href="img/logoIcon.png" type="image/x-icon">
</head>

<body>
    <div class="index">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid ">

                    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                        <ul class="nav ">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#storebooks">Livros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pages/carrinho.php">Carrinho</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="pages/perfil.php">Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="pages/contato.php">Fale Conosco</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <section class="home">
            <img src="img/logoLight.png" alt="">
            <h2>Feita por devs, para devs</h2>

        </section>
    </div>
    <section id="storebooks">
        <h2>Livros Disponíveis</h2>
        <div class="shelve">
            <?php

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

            ?>
            <div class="book">
                <img src="admin/uploads/<?=$row['image_book']?>" alt="capa do livro <?=$row['Tittle_book']?>">
                <div class="info-book">
                    <h3><?= $row['Tittle_book']?></h3>
                    <span>R$ <?php echo number_format($row['Value_Book'], 2, ',', '.');?></span>

                    <button><a href="src/adicionar.php?id=<?=$row['Id_Book']?>">Add carrinho</a> </button>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <footer><p>&copy; Os direitos autorais desse projeto pertencem a Carlos Oliveira Bonfim</p></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>