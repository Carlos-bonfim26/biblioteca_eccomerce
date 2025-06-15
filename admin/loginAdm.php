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
            <h1>Bem vindo de volta adm</h1>
            <p>entrou errado? <a href="../pages/login.php">volte pro login</a></p>

            <form action="loginBack.php" method="post">
               
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
            <img src="../img/admin.svg" alt="">
        </div>
    </main>
   
</body>
</html>