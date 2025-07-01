<?php
require_once('../src/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros cadastrados</title>
    <link rel="shortcut icon" href="../img/logoIcon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/adm.css">
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
                            <a class="nav-link active" aria-current="page" href="livros.php">Livros registrados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="vendas.php">Vendas feitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../src/logout.php">Sair</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="header-adm">
            <h2>Livros disponíveis</h2>
            <a href="formulario-criar.php" class="btn btn-success">Adicionar</a>
        </div>
        <table>

            <?php
            $sql = "SELECT * FROM books";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {

            ?>
                <thead>
                    <tr class="livros">

                        <th>ID</th>
                        <th>Imagem</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Valor</th>
                        <th>Uni</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($linha = $resultado->fetch_assoc()) {
                        echo " <tr class='livros'>
                    <td>" . $linha['Id_Book'] . "</td>
                      <td><img class='book_image' src='uploads/" . $linha['image_book'] . "'> </td>
                    <td>" . $linha['Tittle_book'] . "</td>
                    <td>" . $linha['Author_book'] . "</td>
                    <td>R$" . number_format($linha['Value_Book'], 2, ',', '.') . "</td>
                    <td>" . $linha['Unit_book'] . "</td>" ?>
                        <td class="actions">

                            <a href='formulario-editar.php?id= <?= $linha['Id_Book'];  ?>' class="btn btn-warning">Editar</a>

                            <a href='deletar.php? id= <?= $linha['Id_Book']; ?> ' onclick="return confirm('tem certeza que deseja deletar?')" class="btn btn-danger">Excluir</a>
                        </td>
                        </tr>
                    <?php  }
                } else { ?>
                </tbody>
        </table>

        <div class="alert alert-warning">
            <p>Não há livros cadastrados</p>
        </div>
    <?php

                }

    ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>