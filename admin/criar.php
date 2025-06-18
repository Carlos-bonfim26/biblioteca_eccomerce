<?php
require_once('../src/conexao.php');

$array_erros = array(
    UPLOAD_ERR_OK => 'Upload realizado com sucesso',
    UPLOAD_ERR_INI_SIZE => 'O arquivo enviado excede o tamanho máximo permitido pelo servidor',
    UPLOAD_ERR_FORM_SIZE => 'O arquivo enviado excede o tamanho máximo permitido pelo formulário',
    UPLOAD_ERR_PARTIAL => 'O arquivo enviado foi apenas parcialmente enviado',
    UPLOAD_ERR_NO_FILE => 'Nenhum arquivo foi enviado',
    UPLOAD_ERR_NO_TMP_DIR => 'Falta a pasta temporária',
    UPLOAD_ERR_CANT_WRITE => 'Falha ao escrever o arquivo no disco',
    UPLOAD_ERR_EXTENSION => 'Uma extensão do PHP interrompeu o upload do arquivo'
);

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$valor = $_POST['valor'];
$unidade = $_POST['uni'];


if (isset($_POST['adicionar'])) {


    if ($_FILES['imagem']['error'] == 0) {



        $pasta_temporaria = $_FILES['imagem']['tmp_name'];

        $arquivo = $_FILES['imagem']['name'];

        $pasta = 'uploads/';
        $tipo = $_FILES['imagem']['type'];

        $extensao = strrchr($arquivo, '.');

        if ($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/webp' || $tipo == 'image/png') {
            move_uploaded_file($pasta_temporaria, $pasta . $arquivo);
            if (file_exists($pasta . $arquivo)) {
                echo 'arquivo enviado com sucesso';
                $sql = "INSERT INTO books(Tittle_book, Author_book, Value_Book, Unit_book, image_book) VALUES ('$titulo','$autor', '$valor', '$unidade', '$arquivo' )";
                $resultado = $conexao->query($sql);

                header('Location: ../admin/livros.php');
            } else {
                
                header('Location: ../admin/formulario-criar.php?error2');
            }
        } else {
             
            header('Location: ../admin/formulario-criar.php?error1');
        }
    } else {
        $_GET['error3'] =  $array_erros[$_FILES['imagem']['error']];
        header('Location: ../admin/formulario-criar.php?error3');
    }
}
