<!DOCTYPE html>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Carrega variáveis do .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_POST['enviar'])) {
    $mail = new PHPMailer(true);

    try {
        $mail->CharSet = 'UTF-8';

        // Configuração SMTP
        $mail->isSMTP();
        $mail->Host       = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['MAIL_USERNAME'];
        $mail->Password   = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // ou PHPMailer::ENCRYPTION_SMTPS para SSL
        $mail->Port       = $_ENV['MAIL_PORT'];

        // Remetente e destinatário
        $mail->setFrom($_ENV['MAIL_FROM'], $_ENV['MAIL_NAME']);
        $mail->addAddress($_ENV['MAIL_FROM'], 'Leonardo');
        $mail->addReplyTo($_POST['email'], 'Visitante do site');

        // Corpo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Mensagem do meu portfólio';

        $body = "Mensagem enviada através do site, segue informações abaixo:<br>
                 <strong>Nome:</strong> {$_POST['nome']}<br>
                 <strong>E-mail:</strong> {$_POST['email']}<br>
                 <strong>Mensagem:</strong><br>" . nl2br($_POST['mensagem']);

        $mail->Body = $body;

        $mail->send();
        header("Location: index.php#contato");
    } catch (Exception $e) {
        echo "E-mail não enviado. Erro: {$mail->ErrorInfo}";
    }
} else {
    echo "Erro ao enviar o email, acesso não foi via formulário";
}
