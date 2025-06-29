<?php

// https:/gi/thub.com/sendmail/sendmail
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
if ($_POST) {
    $nome = $_POST['Nome'];
    $email = $_POST['email'];
    $msg = $_POST['mensagem'];

    $msg = "Nome: $nome <br/> Email: $email <br/> Mensagem: $msg";
}
try {
    // Configurações do servidor SMTP do Outlook
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'email@outlook.com'; // seu e-mail Outlook/Hotmail
    $mail->Password   = '1234';         // sua senha da conta
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Remetente e destinatário
    $mail->setFrom('seuEmail@email.com', 'seu nome');
    $mail->addAddress('seuEmail@email.com', 'Destinatário');

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Mensagem de usuário';
    $mail->Body    = $msg;
    $mail->AltBody = $msg;

    $mail->send();
  header('Location: ../pages/contato.php?emailEnviado=1');
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    header('Location: ../pages/contato.php?emailEnviado=0');
}
