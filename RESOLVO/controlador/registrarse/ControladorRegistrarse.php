<?php
include_once("./../../modelo/modeloCliente.php");


//comporbamos que se haya pasado por le metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //creo un objeto usuario
    $cliente = new Cliente();

    //decimos que si se ha pasado por el input que tenemos escondido venimos de registrar 
    if (isset($_POST["registrar"])) {

        //reocgemos y liempiamos todos los valores 
        $nombre = limpiaString($_POST["nombre"]);
        $apellido = limpiaString($_POST["apellido"]);
        $direccion = limpiaString($_POST["direccion"]);
        $codigo = limpiaString($_POST["codigo"]);
        $ciudad = limpiaString($_POST["ciudad"]);
        $provincia = limpiaString($_POST["provincia"]);
        $telefono = limpiaString($_POST["telefono"]);
        $dni = limpiaString($_POST["dni"]);
        $email = limpiaString($_POST["email"]);
        $password = limpiaString($_POST["password"]);
        $password2 = limpiaString($_POST["password2"]);


        $comprobarCorreo = $cliente->comprobarCorreo($email);

        if ($comprobarCorreo) {
            $miArrayRespuesta = array(
                'resultado' => "email",
                'message' => 'Ese correo ya esta registrado'
            );
            $respuestaFakeJson = json_encode($miArrayRespuesta);
            echo $respuestaFakeJson;
        } else {
            //con el objeto usuario llamo la funcion insertarCliente y lo meto en respuesta 
            $respuesta = $cliente->insertarCliente($nombre, $apellido, $direccion, $codigo, $ciudad, $provincia, $telefono, $dni, $email, $password);
            if ($respuesta) {
                $miArrayRespuesta = array(
                    'resultado' => "correcto",
                    'message' => 'Cliente insertado correctamente'
                );
                $respuestaFakeJson = json_encode($miArrayRespuesta);
                echo $respuestaFakeJson;
            } else {
                $miArrayRespuesta = array(
                    'resultado' => "fallo",
                    'message' => 'El Cliente no se ha podido insertar en la bbdd'
                );
                $respuestaFakeJson = json_encode($miArrayRespuesta);
                echo $respuestaFakeJson;
            }
        }




        //hacemos lo mismo pero cuando venimos de iniciar sesion 
    } else if (isset($_POST["iniciarSesion"])) {

        $email = limpiaString($_POST["email"]);
        $password = limpiaString($_POST["password"]);
        // echo "Este es mi email: ".$email;
        // echo "Este es mi password: ".$password;

        //ESTO HAY QUE DARLE UNA VUELTA
        $respuesta = $cliente->iniciarSesion($email, $password);

        // echo "la respuesta de sesion es: " . $respuesta;
        switch ($respuesta) {
            case 0:
                $miArrayRespuesta = array(
                    'resultado' => "0",
                    'message' => 'Es la primera vez que inicia sesion'
                );
                break;
            case 1:
                $miArrayRespuesta = array(
                    'resultado' => "1",
                    'message' => 'Operación existosa acabas de iniciar sesion'
                );
                break;
            case 2:
                $miArrayRespuesta = array(
                    'resultado' => "2",
                    'message' => 'Contraseña incorrecta'
                );
                break;

            case 3:
                $miArrayRespuesta = array(
                    'resultado' => "3",
                    'message' => 'Usuario no econtrado'
                );
                break;
            case 4:
                $miArrayRespuesta = array(
                    'resultado' => "4",
                    'message' => 'Error en la consulta'
                );
                break;
        }
        $respuestaFakeJson = json_encode($miArrayRespuesta);

        echo $respuestaFakeJson;
    } else if (isset($_POST["cambiarPassword"])) {
        
        $password = limpiaString($_POST["password"]);
        $email = limpiaString($_POST["to"]);
        // echo "Este es mi email: ".$email;
        // echo "Este es mi password: ".$password;

        //ESTO HAY QUE DARLE UNA VUELTA
        $respuesta = $cliente->cambiarPasswordCliente($password, $email);
        // echo "la respuesta de sesion es: " . $respuesta;

        if ($respuesta) {
            $miArrayRespuesta = array(
                'resultado' => "0",
                'message' => 'Has cambiado la contraseña correctamente '
            );
        } else {
            $miArrayRespuesta = array(
                'resultado' => "1",
                'message' => 'No se cambio la contraseña'
            );
        }


        $respuestaFakeJson = json_encode($miArrayRespuesta);

        echo $respuestaFakeJson;
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
