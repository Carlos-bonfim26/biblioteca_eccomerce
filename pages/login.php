<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Carlos Bonfim">
    <title>Login</title>
     <link rel="stylesheet" href="../css/forms.css">
     <link rel="shortcut icon" href="../img/logoIcon.png" type="image/x-icon">
</head>
<body>
 <main class="container-signUp">
        <div class="container-form">
            <h1>Entre na sua Conta</h1>
            <p>Perá, você ainda não tem conta? <a href="cadastro.php">Cadastre-se por aqui</a></p>

            <form action="../src/loginBack.php" method="post">
               
                <input name="email" id="email" placeholder="Email:" type="email">
                
               
                <input name="password" id="password" placeholder="Senha" type="password">
                
                <input type="submit" value="Entrar">

                <?php 
                
                if(isset($_GET['error1'])){
                    echo "<span>Usuário ou Senha incorretos!</span>";
                }else if(isset($_GET['error2'])){
                    echo "<span>Senha incorreta!</span>";
                }
                
                ?>
            </form>
        </div>
        <div class="image-form">
            <img src="../img/loginIMG.svg" alt="">
        </div>
    </main>
   
</body>
</html>