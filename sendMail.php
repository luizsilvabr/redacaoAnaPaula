<?php
session_start();
require_once("phpMailer/PHPMailer.php");
require_once("phpMailer/SMTP.php");
require_once("phpMailer/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["enviarEmail"])) {
$mail = new PHPMailer();
$nome = $_POST["name"];
$email = $_POST["email"];
$comentario = $_POST["message"];

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Username = "luizsilva12br@gmail.com";
        $mail->Password = "quhkgbwsrdipfnyn";

        $mail->setFrom("luizsilva12br@gmail.com");   
        $mail->addAddress("luizsilva12br@gmail.com");   

        $mail->isHTML(true);
        $mail->Subject = "Teste PHPMailer";
        $mail->Body = "<b>Nome:</b> $nome. <br> <b>Email:</b> $email. <br> <div><p>$comentario</p></div>";
        if ($mail->send()) {
            header("Location: index");
        } else {
            header("Location: index");
        }
        $mail->smtpClose();
    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }
}
