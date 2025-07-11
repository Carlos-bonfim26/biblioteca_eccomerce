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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

                <a href="../admin/loginAdm.php" id="linkADM">administrador entre por aqui </a>
                <a href="trocarsenha.php">Esqueci Senha<i class="fa-solid fa-key"></i></a>
                <?php 
                
                # mostra o erro no login
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