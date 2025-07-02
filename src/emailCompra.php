<?php
session_start();
$nomeDoCliente =  $_SESSION['Usuario'];
$emailDoCliente = $_SESSION['Email_Usuario'];
$id = $_GET['id']??NULL;

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
    $mail->Username   = 'carlos.obonfim@senacsp.edu.br';
    $mail->Password   = 'ftm3h17##';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Remetente
    $mail->setFrom('carlos.obonfim@senacsp.edu.br', 'Compiloteca');

    // Destinatário
    $mail->addAddress($emailDoCliente, $nomeDoCliente); // Pegue esses dados da sua plataforma

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Confirmação de Compra';
    $mail->Body    = "Olá $nomeDoCliente, sua compra foi confirmada com sucesso!<br><br>Obrigado por comprar conosco.";
    $mail->AltBody = "Olá $nomeDoCliente, sua compra foi confirmada com sucesso!\n\nObrigado por comprar conosco.";

    $mail->send();
    if ($id != null) {
        header("Location: remover.php?id=$id&trash=1&email=1");
        exit;
    }
    header("location: ../pages/carrinho.php?email=1");
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
}
