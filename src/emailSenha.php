<?php
session_start();
$email = $_POST['email'] ?? $_SESSION['Email_Usuario'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclui os arquivos do PHPMailer (ajuste o caminho se necessário)
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Cria uma nova instância
$mail = new PHPMailer(true);

try {
    // Configurações do servidor
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'seuDominio@outlook.com';
    $mail->Password   = 'suaSenha';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Remetente
    $mail->setFrom('seuDominio@outlook.com', 'Compiloteca');

    // Destinatário
    $mail->addAddress($email, "Usuário"); // Pegue esses dados da sua plataforma

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Trocar Senha';
    $mail->Body    = "Olá cliente, clique nesse link para trocar sua senha:<a href='http://localhost/projectSenac/pages/senhaNova.php'> http://localhost/projectSenac/pages/senhaNova.php </a>" ;
    $mail->AltBody = "Olá cliente, cole esse link no seu navegador para poder trocar sua senha: http://localhost/projectSenac/pages/trocarsenha.php";

    $mail->send();
 
    header("location: ../pages/trocarSenha.php?aviso");
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
}
