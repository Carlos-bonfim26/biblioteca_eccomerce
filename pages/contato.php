<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Carlos Bonfim">
    <title>Contatos</title>
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
                            <a class="nav-link" href="perfil.php">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="contato.php">Fale Conosco</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <main class="main-contatos">
        <div class="container-dev">

            <h2>Desenvolvedor</h2>

            <div class="image-dev">
                <img src="../img/profile.jpg" alt="Desenvolvedor Carlos Bonfim">
            </div>
            <span>Olá!!, prazer me chamo Carlos</span>
            <p>por favor me siga nas minhas redes sociais</p>
            <div class="container-icons">
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
        <div class="container-forms-dev">

            <form action="../src/email-outlook.php" method="post">
                <h3>Entre em Contato</h3>

                <input type="text" name="Nome" placeholder="Nome:">
                <input type="email" placeholder="Email:" name="email">

                <textarea name="mensagem" placeholder="Sua mensagem:" rows="7"></textarea>
                <input type="submit" value="Enviar">
            </form>
            <?php
            if (isset($_GET['emailEnviado'])) {
                if ($_GET['emailEnviado'] == 1) {
                    echo "<p>Email enviado com sucesso!</p>";
                } else {
                    echo "<p>Erro ao enviar email!</p>";
                }
            }
            ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>