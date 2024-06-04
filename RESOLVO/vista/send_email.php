<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Asegúrate de que Composer haya cargado automáticamente las clases necesarias
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->isSMTP();                                            // Enviar usando SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Servidor SMTP
        $mail->SMTPAuth   = true;                                   // Habilitar autenticación SMTP
        $mail->Username   = 'sergio.paredes.itaca@gmail.com';               // Usuario SMTP
        $mail->Password   = 'ekrphdnrbbktdrwc';                  // Contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Habilitar encriptación TLS
        $mail->Port       = 587;                                    // Puerto TCP para conexión SMTP

        // Recipientes
        $mail->setFrom('sergio.paredes.itaca@gmail.com', 'Mailer');
        $mail->addAddress($to);                                     // Añadir un destinatario

        // Contenido del correo
        $mail->isHTML(true);                                        // Establecer formato del correo a HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = strip_tags($message);                      // Mensaje alternativo en texto plano

        $mail->send();
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
    }
}
?>
