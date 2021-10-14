<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "Phpmailer/Exception.php";
require "Phpmailer/PHPMailer.php";
require "Phpmailer/SMTP.php";
$mail = new PHPMailer(true);

try {
  
    $mail->SMTPDebug = 0;                     
    $mail->isSMTP();                                           
    $mail->Host = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'gragusconsulta@gmail.com';                    
    $mail->Password   = 'gragus123';                              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                 

    $mail->setFrom('cliente@gmail.com', $nombre);
    $mail->addAddress('gragusconsulta@gmail.com');    

    $mail->isHTML(true);                               
    $mail->Subject = 'Problema de Computadora';
    $mail->Body    = $body;
    $mail->CharSet = "UTF-8";
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
);
    $mail->send();
    echo '<script>
    alert("el mensaje se envio correctamente");
    window.history.go(-1);
    </script>';

} catch (Exception $e) {
    echo "Hubo un error: {$mail->ErrorInfo}";
}