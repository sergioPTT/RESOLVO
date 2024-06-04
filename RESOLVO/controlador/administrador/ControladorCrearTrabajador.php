<?php
include_once("./../../modelo/modeloTrabajador.php");


//comporbamos que se haya pasado por le metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //creo un objeto usuario
    $trabajador = new Trabajador();

    //decimos que si se ha pasado por el input que tenemos escondido venimos de registrar 
    

        //recogemos y limpiamos todos los valores 
        $nombre = limpiaString($_POST["nombre"]);
        $apellido = limpiaString($_POST["apellido"]);
        $calle = limpiaString($_POST["calle"]);
        $codPostal = limpiaString($_POST["codPostal"]);
        $ciudad = limpiaString($_POST["ciudad"]);
        $provincia = limpiaString($_POST["provincia"]);
        $telefono = limpiaString($_POST["telefono"]);
        $dni = limpiaString($_POST["dni"]);
        // $email = limpiaString($_POST["email"]);
        $fechaNacimiento = $_POST["fechaNacimento"];
        $cargo = limpiaString($_POST["cargo"]);
        $especializacion = limpiaString($_POST["especializacion"]);


        //Este sera para comprobar si hay un correo igual que el del trabajador que se va a insertar
        // $comprobarCorreo = $trabajador->comprobarCorreo($email);

        // if ($comprobarCorreo) {
        //     $miArrayRespuesta = array(
        //         'resultado' => "email",
        //         'message' => 'Ese correo ya esta registrado'
        //     );
        //     $respuestaFakeJson = json_encode($miArrayRespuesta);
        //     echo $respuestaFakeJson;
        // } 
       
            //con el objeto usuario llamo la funcion insertarCliente y lo meto en respuesta 
            $respuesta = $trabajador->insertarTrabajador($nombre, $apellido, $calle, $codPostal, $ciudad, $provincia, $telefono, $dni,$fechaNacimiento, $cargo , $especializacion);
            if ($respuesta) {
                $miArrayRespuesta = array(
                    'resultado' => "correcto",
                    'message' => 'trabajador insertado correctamente'
                );
                $respuestaFakeJson = json_encode($miArrayRespuesta);
                echo $respuestaFakeJson;
            } else {
                $miArrayRespuesta = array(
                    'resultado' => "fallo",
                    'message' => 'El trabajador no se ha podido insertar en la bbdd'
                );
                $respuestaFakeJson = json_encode($miArrayRespuesta);
                echo $respuestaFakeJson;
            }   
    }



        //hacemos lo mismo pero cuando venimos de iniciar sesion 

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
