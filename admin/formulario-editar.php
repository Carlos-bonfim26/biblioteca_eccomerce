<?php 
require_once('../src/conexao.php');

$id = $_GET['id'];
$sql = "SELECT * FROM books WHERE Id_Book = $id";

$resultado = $conexao->query($sql);
$livro= $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar livros</title>
     <link rel="shortcut icon" href="../img/logoIcon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/adm.css">
</head>
<body>
     <header>
        <a href="../index.php"><img src="../img/logo.png" alt=""></a>
    </header>
    <main>
        <div class="container-form">
            <form action="editar.php" method="post" enctype="multipart/form-data">
                <h2>Editando <?=$livro['Tittle_book']?></h2>
                <img src="uploads/<?=$livro['image_book']?>" alt="">
                <input required name="titulo" placeholder="Título:" type="text" value="<?=$livro['Tittle_book']?>">
                <input required name="autor" placeholder="Autor:" type="text" value="<?=$livro['Author_book']?>">
                <input type="hidden" value="<?=$livro['Id_Book']?>" name="id">
                <div class="form-numbers">
                    <input required name="valor" placeholder="Valor:" step="any" type="number" value="<?=$livro['Value_Book']?>">
                    <input required name="uni" placeholder="Unidade:" type="number" value="<?=$livro['Unit_book']?>">
                </div>


             

                <input value="Adicionar" type="submit" name="adicionar">

                
            </form>
        </div>
        <a href="livros.php" class="btn-back">Voltar</a>
    </main>
</body>
</html>