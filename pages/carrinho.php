<?php

include_once('../src/conexao.php');

$carrinho = isset($_COOKIE['carrinho']) ? json_decode($_COOKIE['carrinho'], true) : [];

$total = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>

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
                            <a class="nav-link active" href="carrinho.php">Carrinho</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil.php">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="contato.php">Fale Conosco</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <main class="container-carrinho">
        <section id="produtos">

            <button class="clean"><a href="../src/limpar.php">Limpar <i class="fa-solid fa-broom"></i></a></button>
            <?php if (isset($_GET['email'])) { ?>
                <div class="alert-email">
                    <p>Email enviado com sucesso <i class="fa-solid fa-circle-check"></i></p>
                </div>
            <?php
            }
            ?>
            <div class="lista-compras">
                <?php
                # verifica se tem algo no carrinho
                if (empty($carrinho)) {
                    echo "<h3>Carrinho vazio </h3>";
                } else {
                    # com o foreach pega tudo que está dentro do array
                    foreach ($carrinho as $id => $qtd) {
                        $sql = "SELECT * FROM books WHERE Id_Book = $id";

                        $result = $conexao->query($sql);

                        if ($row = $result->fetch_assoc()) {
                            $preco = $row['Value_Book'];
                            $subtotal = $preco * $qtd;
                            $total += $subtotal;
                ?>
                            <div class="card-Produtos">
                                <img src="../admin/uploads/<?= $row['image_book'] ?>" alt="">
                                <div class="info-produtos">
                                    <h3><?= $row['Tittle_book'] ?></h3>
                                    <p><?= $row['Author_book'] ?></p>
                                    <div class="config-qtd">
                                        <p>Quantidade: <?= $qtd ?></p>
                                        <a href="../src/adicionar.php?id=<?= $row['Id_Book'] ?>"> <button>+</button></a>
                                        <a href="../src/remover.php?id=<?= $id ?>&qtd=<?= $qtd ?>"> <button>-</button></a>
                                    </div>
                                    <p class="preco">Total: R$ <?= $subtotal ?></p>
                                    <div class="btn-produtos"><button onclick="return confirm('Você confirma a compra do livro <?= $row['Tittle_book'] ?> por <?= $subtotal ?>')"><a href="../src/comprar.php?id=<?= $row['Id_Book'] ?>&quantidade=<?= $qtd ?>">Comprar</a></button>
                                        <a href="../src/remover.php?id=<?= $id ?>&trash=1"><button class="apagar"><i class="fa-solid fa-trash-can"></i></button></a>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                }
                ?>
            </div>
        </section>
        <section id="pagamento">
            <div class="card-produtos">
                <h2>Todos os produtos do carrinho</h2>
                <ul>
                    <?php
                    # verifica se tem algo no carrinho
                    if (empty($carrinho)) {
                        echo "<li>Nenhum produto aqui </li>";
                    } else {
                        # com o foreach pega tudo que está dentro do array
                        foreach ($carrinho as $id => $qtd) {
                            $sql = "SELECT * FROM books WHERE Id_Book = $id";
                            $result = $conexao->query($sql);
                            if ($row = $result->fetch_assoc()) {
                    ?>
                                <li><?= $row['Tittle_book'] ?> <?= $qtd ?>x</li>
                    <?php
                            }
                        }
                    }
                    ?>
                </ul>
                <h3>Total: R$ <?= $total ?></h3>
                <a href="../src/comprar.php" onclick="return confirm('Você confirma a compra dos livros por <?= $total ?>')"><button>Comprar Produtos</button></a>
            </div>
        </section>

    </main>

    <script src="../src/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>