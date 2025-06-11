<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Carlos Bonfim">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/forms.css">
    <link rel="shortcut icon" href="../img/logoIcon.png" type="image/x-icon">
</head>

<body>

    <main class="container-signUp">
        <div class="container-form">
            <h1>Cadastre-se</h1>
            <p>Já tem uma conta? <a href="login.php">entre por aqui</a></p>

            <form action="../src/cadastroBack.php" method="post">
                <input name="name" id="name" placeholder="Nome Completo:" type="text">
                <input name="email" id="email" placeholder="Email:" type="email">
                <input name="telefone" id="telefone" placeholder="Telefone:" type="tel">
                <div class="form-house">
                    <input name="cep" id="cep" placeholder="Cep:" type="text">
                    <input name="nCasa" id="nCasa" placeholder="Número Casa" type="text">
                </div>
                <input name="password" id="password" placeholder="Senha" type="password">
                
                <input type="submit" value="Cadastrar">
            </form>
        </div>
        <div class="image-form">
            <img src="../img/signUpImg.svg" alt="">
        </div>
    </main>

</body>

</html>