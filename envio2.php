<!DOCTYPE html>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['enviar'])) {
    //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
        $mail->CharSet = 'UTF-8';
    //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'leonardodlima615@hotmail.com';                     //SMTP username
        $mail->Password   = '';                               //SMTP password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        //$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587; 

    //Recipients
        $mail->setFrom('leonardodlima615@hotmail.com', 'Portifólio Leonardo'); // quem está enviando o email
        $mail->addAddress('leonardodlima615@hotmail.com', 'Leonardo');     //quem vai receber o email
        $mail->addReplyTo($_POST['email'], 'Portifólio Leonardo'); //responder ao email
        //$mail->addReplyTo('leonardodlima615@hotmail.com', 'Information');

    //Anexos de email
    //    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Mensagem do meu portifólio';

        $body = "Mensagem enviada através do site, segue informações abaixo:<br>
        Nome:".$_POST['nome']."<br>
        E-mail:".$_POST['email']."<br>
        Mensagem:<br>".$_POST['mensagem'];
        


        $mail->Body    = $body;
        // email limpo $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        header("location: index.php#contato");
    } catch (Exception $e) {
        echo "E-mail não enviada.Mailer Error: {$mail->ErrorInfo}";
    } 
}
else{
    echo "Erro ao enviar o email, acesso não foi via formulário";
} 