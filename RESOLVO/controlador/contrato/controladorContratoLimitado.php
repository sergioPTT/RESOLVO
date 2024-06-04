<?php
include_once ("./../../modelo/modeloContrato.php");
include_once ("./../../modelo/modeloCliente.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

//comporbamos que se haya pasado por le metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    //creo un objeto usuario
    $contrato = new Contrato();
    
    //decimos que si se ha pasado por el input que tenemos escondido venimos de registrar 
    if (isset($_POST["contratoLimitado"])) {
        
        //reocgemos y liempiamos todos los valores 
        $dispositivo = limpiaString($_POST["dispositivo"]);
        $especializacion = limpiaString($_POST["dispositivo"]);
        $marca = limpiaString($_POST["marca"]);
        $modelo = limpiaString($_POST["modelo"]);
        $motivo = limpiaString($_POST["motivo"]);
        $imagen = limpiaString($_POST["imagenIncidencia"]);
        //echo "este es el valor de la imagen: ".$imagen;
        
        session_start();
        $idCliente = $_SESSION['miId'];
        
        $respuesta = $contrato->insertarIncidencia($especializacion, $idCliente, $dispositivo, $marca, $modelo, $motivo, $imagen);
        // echo "La respuesta de respuest es:".$respuesta;
        
        
        switch ($respuesta) {
            case 0:
                $miArrayRespuesta = array(
                    'resultado' => "0",
                    'message' => 'Operación existosa acabas de iniciar sesion'
                );
                break;
                case 5:
                    $miArrayRespuesta = array(
                        'resultado' => "5",
                        'message' => 'TE HAS QUEADO SIN NUM INCIDENCIAS'
                    );
                    break;
                    
                    case 2:
                        $miArrayRespuesta = array(
                            'resultado' => "2",
                            'message' => 'ERROR 2'
                        );
                        break;
                        case 3:
                            $miArrayRespuesta = array(
                                'resultado' => "3",
                                'message' => 'No tenemos nigun trabajador disponible'
                            );
                            break;
                            // case 4:
                                //     $miArrayRespuesta = array(
                                    //         'resultado' => "4",
                                    //         'message' => 'No te quedan mas incidencias contrata mas '
                                    //     );
                                    //     break;
                                }
                                $respuestaFakeJson = json_encode($miArrayRespuesta);
                                
                                echo $respuestaFakeJson;
                                
                                //hacemos lo mismo pero cuando venimos de iniciar sesion 
                            } else if (isset($_POST["pagoLimitado"])) {
                                
                                session_start();
                                $idCliente = $_SESSION['miId'];
                                //Comprobar antes de dejar al cliente que pague que si pone un correo que no existe en la bbdd no le deja
                                $emailCliente = $_SESSION['emailCliente'];
                                $resulCorreo = $contrato->comprobarCorreo($emailCliente);
                                
                                if (!$resulCorreo) {
                                    $miArrayRespuesta = array(
                                        'resultado' => "3",
                                        'message' => 'Ese correo no esta en la base de datos'
                                    );
                                    $respuestaFakeJson = json_encode($miArrayRespuesta);
                                    echo $respuestaFakeJson;
                                } else {
                                    //Aqui llamamos al metodo de base de datos donde compra el contrato
                                    $respuesta = $contrato->comprarContratoLimitado($idCliente);
                                    
                                    if ($respuesta) {
                                        $miArrayRespuesta = array(
                                            'resultado' => "0",
                                            'message' => 'Ahora tienes el contrato limitado, se te envio un correo con los datos de tu compra '
                                        );
                                        $respuestaFakeJson = json_encode($miArrayRespuesta);
                                        echo $respuestaFakeJson;
                                    } else {
                                        $miArrayRespuesta = array(
                                            'resultado' => "1",
                                            'message' => 'Hubo un problema al comprar el contrato'
                                        );
                                        $respuestaFakeJson = json_encode($miArrayRespuesta);
                                        echo $respuestaFakeJson;
                                    }
                                    $to = $_POST['emailCliente'];
                                    $subject = $_POST['asunto'];
                                    $message = $_POST['mensaje'];
                                    
                                    // $to="vepewe6230@jzexport.com";
                                    // $subject="contrato";
                                    // $message="acabas de comprar un contrato limitado";
                                    
                                    $mail = new PHPMailer(true);
                                    
                                    try {
                                        // Configuración del servidor
                                        $mail->isSMTP();                                            // Enviar usando SMTP
                                        $mail->Host = 'smtp.gmail.com';                     // Servidor SMTP
                                        $mail->SMTPAuth = true;                                   // Habilitar autenticación SMTP
                                        $mail->Username = 'resolvoservice@gmail.com';               // Usuario SMTP
                                        $mail->Password = 'akrhorajmpaelvtb';                  // Contraseña SMTP
                                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Habilitar encriptación TLS
                                        $mail->Port = 587;                                    // Puerto TCP para conexión SMTP
                                        
                                        // Recipientes
                                        $mail->setFrom('resolvoservice@gmail.com', 'Mailer');
                                        $mail->addAddress($to);                                     // Añadir un destinatario
                                        
                                        // Contenido del correo
                                        $mail->isHTML(true);                                        // Establecer formato del correo a HTML
                                        $mail->Subject = $subject;
                                        $mail->Body = $message;
                                        $mail->AltBody = strip_tags($message);                      // Mensaje alternativo en texto plano
                                        
                                        $mail->send();
                                        
                                        // $miArrayRespuesta = array(
                                            //     'resultado' => "1",
                                            //     'message' => 'Se envio el correo correctamente'
                                            // );
                                            // $respuestaFakeJson = json_encode($miArrayRespuesta);
                                            // echo $respuestaFakeJson;
                                            
                                        } catch (Exception $e) {
                                            // echo "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
                                            $miArrayRespuesta = array(
                                                'resultado' => "2",
                                                'message' => 'No Se envio el correo correctamente'
                                            );
                                            $respuestaFakeJson = json_encode($miArrayRespuesta);
                                            echo $respuestaFakeJson;
                                        }
                                    }
                                    
                                    
                                    
                                    
                                    
                                    
                                } else if (isset($_POST["pagoIlimitado"])) {
                                    session_start();
                                    $idCliente = $_SESSION['miId'];
                                    $respuesta = $contrato->comprarContratoIlimitado($idCliente);
                                    
                                    if ($respuesta) {
                                        $miArrayRespuesta = array(
                                            'resultado' => "0",
                                            'message' => 'Ahora tienes el contrato ilimitado , se te envio un correo con los datos de tu compra'
                                        );
                                        $respuestaFakeJson = json_encode($miArrayRespuesta);
                                        echo $respuestaFakeJson;
                                    } else {
                                        $miArrayRespuesta = array(
                                            'resultado' => "1",
                                            'message' => 'Hubo un problema al comprar el contrato'
                                        );
                                        $respuestaFakeJson = json_encode($miArrayRespuesta);
                                        echo $respuestaFakeJson;
                                    }
                                    
                                    
                                    $to = $_POST['emailCliente'];
                                    $subject = $_POST['asunto'];
                                    $message = $_POST['mensaje'];
                                    
                                    // $to="vepewe6230@jzexport.com";
                                    // $subject="contrato";
                                    // $message="acabas de comprar un contrato limitado";
                                    
                                    $mail = new PHPMailer(true);
                                    
                                    try {
                                        // Configuración del servidor
                                        $mail->isSMTP();                                            // Enviar usando SMTP
                                        $mail->Host = 'smtp.gmail.com';                     // Servidor SMTP
                                        $mail->SMTPAuth = true;                                   // Habilitar autenticación SMTP
                                        $mail->Username = 'resolvoservice@gmail.com';               // Usuario SMTP
                                        $mail->Password = 'akrhorajmpaelvtb';                  // Contraseña SMTP
                                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Habilitar encriptación TLS
                                        $mail->Port = 587;                                    // Puerto TCP para conexión SMTP
                                        
                                        // Recipientes
                                        $mail->setFrom('resolvoservice@gmail.com', 'Mailer');
                                        $mail->addAddress($to);                                     // Añadir un destinatario
                                        
                                        // Contenido del correo
                                        $mail->isHTML(true);                                        // Establecer formato del correo a HTML
                                        $mail->Subject = $subject;
                                        $mail->Body = $message;
                                        $mail->AltBody = strip_tags($message);                      // Mensaje alternativo en texto plano
                                        
                                        $mail->send();
                                        
                                        // $miArrayRespuesta = array(
                                            //     'resultado' => "1",
                                            //     'message' => 'Se envio el correo correctamente'
                                            // );
                                            // $respuestaFakeJson = json_encode($miArrayRespuesta);
                                            // echo $respuestaFakeJson;
                                            
                                        } catch (Exception $e) {
                                            // echo "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
                                            $miArrayRespuesta = array(
                                                'resultado' => "2",
                                                'message' => 'No Se envio el correo correctamente'
                                            );
                                            $respuestaFakeJson = json_encode($miArrayRespuesta);
                                            echo $respuestaFakeJson;
                                        }
                                        
                                        
                                    } else if (isset($_POST["pagoSinContrato"])) {
                                        session_start();
                                        $idCliente = $_SESSION['miId'];
                                        $respuesta = $contrato->comprarSinContrato($idCliente);
                                        
                                        if ($respuesta) {
                                            $miArrayRespuesta = array(
                                                'resultado' => "0",
                                                'message' => 'Ahora tienes el sin Contrato , se te envio un correo con los datos de tu compra '
                                            );
                                            $respuestaFakeJson = json_encode($miArrayRespuesta);
                                            echo $respuestaFakeJson;
                                        } else {
                                            $miArrayRespuesta = array(
                                                'resultado' => "1",
                                                'message' => 'Hubo un problema al comprar el sin contrato'
                                            );
                                            $respuestaFakeJson = json_encode($miArrayRespuesta);
                                            echo $respuestaFakeJson;
                                        }
                                        $to = $_POST['emailCliente'];
                                        $subject = $_POST['asunto'];
                                        $message = $_POST['mensaje'];
                                        
                                        // $to="vepewe6230@jzexport.com";
                                        // $subject="contrato";
                                        // $message="acabas de comprar un contrato limitado";
                                        
                                        $mail = new PHPMailer(true);
                                        
                                        try {
                                            // Configuración del servidor
                                            $mail->isSMTP();                                            // Enviar usando SMTP
                                            $mail->Host = 'smtp.gmail.com';                      // Servidor SMTP
                                            $mail->SMTPAuth = true;                                 // Habilitar autenticación SMTP
                                            $mail->Username = 'resolvoservice@gmail.com';          // Usuario SMTP
                                            $mail->Password = 'akrhorajmpaelvtb';                 // Contraseña SMTP
                                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    // Habilitar encriptación TLS
                                            $mail->Port = 587;                              // Puerto TCP para conexión SMTP
                                            
                                            // Recipientes
                                            $mail->setFrom('resolvoservice@gmail.com', 'Mailer');
                                            $mail->addAddress($to);                                     // Añadir un destinatario
                                            
                                            // Contenido del correo
                                            $mail->isHTML(true);                                        // Establecer formato del correo a HTML
                                            $mail->Subject = $subject;
                                            $mail->Body = $message;
                                            $mail->AltBody = strip_tags($message);                      // Mensaje alternativo en texto plano
                                            
                                            $mail->send();
                                            
                                            // $miArrayRespuesta = array(
                                                //     'resultado' => "1",
                                                //     'message' => 'Se envio el correo correctamente'
                                                // );
                                                // $respuestaFakeJson = json_encode($miArrayRespuesta);
                                                // echo $respuestaFakeJson;
                                                
                                            } catch (Exception $e) {
                                                // echo "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
                                                $miArrayRespuesta = array(
                                                    'resultado' => "2",
                                                    'message' => 'No Se envio el correo correctamente en Sin Contrato'
                                                );
                                                $respuestaFakeJson = json_encode($miArrayRespuesta);
                                                echo $respuestaFakeJson;
                                            }
                                        }
                                    }
                                    
                                    
                                    function limpiaString($cadena)
                                    {
                                        $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $cadena);
                                        $string = trim($string);
                                        $string = stripslashes($string);
                                        $string = str_ireplace("<script>", "", $string);
                                        $string = str_ireplace("</script>", "", $string);
                                        $string = str_ireplace("<script src>", "", $string);
                                        $string = str_ireplace("<script type =>", "", $string);
                                        $string = str_ireplace("SELECT * FROM", "", $string);
                                        $string = str_ireplace("DELETE FROM", "", $string);
                                        $string = str_ireplace("INSERT INTO", "", $string);
                                        $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
                                        $string = str_ireplace("DROP TABLE", "", $string);
                                        $string = str_ireplace("OR '1'='1", "", $string);
                                        $string = str_ireplace('OR "1"="1"', "", $string);
                                        $string = str_ireplace('OR ´1´=´1´', "", $string);
                                        $string = str_ireplace('is NULL; --', "", $string);
                                        $string = str_ireplace('LIKE "', "", $string);
                                        $string = str_ireplace("LIKE '", "", $string);
                                        $string = str_ireplace("LIKE ´", "", $string);
                                        $string = str_ireplace("OR 'a'='a", "", $string);
                                        $string = str_ireplace('OR "a"="a"', "", $string);
                                        $string = str_ireplace("OR ´a´=´a", "", $string);
                                        $string = str_ireplace("OR ´a´=´a´", "", $string);
                                        $string = str_ireplace("--", "", $string);
                                        $string = str_ireplace("^", "", $string);
                                        $string = str_ireplace("[", "", $string);
                                        $string = str_ireplace("]", "", $string);
                                        $string = str_ireplace("==", "", $string);
                                        return $string;
                                    }
                                    