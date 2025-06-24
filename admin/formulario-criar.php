<!DOCTYPE html>
<html lang="p-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar novos livros</title>
    <link rel="shortcut icon" href="../img/logoIcon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/adm.css">
</head>

<body>
    <header>
        <a href="../index.php"><img src="../img/logo.png" alt=""></a>
    </header>
    <main>
        <div class="container-form">
            <form action="criar.php" method="post" enctype="multipart/form-data">
                <h2>Adicionar novo livro</h2>
                <input required name="titulo" placeholder="Título:" type="text">
                <input required name="autor" placeholder="Autor:" type="text">
                <div class="form-numbers">
                    <input required name="valor" placeholder="Valor:" step="any" type="number">
                    <input required name="uni" placeholder="Unidade:" type="number">
                </div>


                <input required name="imagem" type="file" accept=".jpg, .png, .webp, .jpeg">

                <input value="Adicionar" type="submit" name="adicionar">
                

                <?php
                # mostra o erro no login
                if (isset($_GET['error1'])) {
                    echo "<span>Erro: tipo de arquivo não é permitido!</span>";
                } else if (isset($_GET['error2'])) {
                    echo "<span>Erro ao enviar arquivo!</span>";
                }else if(isset($_GET['error3'])){
                     echo "<span>".$_GET['error3']."</span>";
                }

                ?>
            </form>
        </div>
        <a href="livros.php" class="btn-back">Voltar</a>
    </main>

</body>

</html>