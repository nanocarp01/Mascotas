<?php
namespace App\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class MailController extends BaseController{


    public function enviarMail($data){
    
        $email = $data['email'];
        $asunto = $data['asunto'];
        $cuerpo = $data['cuerpo'];
        
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->CharSet = 'UTF-8';
        $mail->Username ='mailpruebaenvio557@gmail.com'; //Email para enviar
        $mail->Password = 'ioqtowvtcvvpoofm'; //Su password
        //Agregar destinatario
        $mail->setFrom('patitasacasa@mail.com', 'Patitas a casa');
        $mail->AddAddress($email);//A quien mandar email
        $mail->isHTML(true); 
        $mail->Subject = $asunto;
        $mail->Body = $cuerpo;
        if(!$mail->send()) {
        echo 'Error al enviar email';
        echo 'Mailer error: ' . $mail->ErrorInfo;
        } else {
            return 'ok';
        }

    }
}