<?php
include_once("./../../modelo/modeloIncidencia.php");

//comporbamos que se haya pasado por le metodo POST

    $incidencia = new Incidencia();
  
    $nombre = $_POST['trabajador'];
    // echo "este es el nombre del trabajador: ".$trabajador;
     
    $respuestaQuery=$incidencia->filtrarNombreTrabajador($nombre);
    // echo "respuestaQuery es: ".$respuestaQuery;
    $arrayIncidencia = Json_encode($respuestaQuery);
    echo $arrayIncidencia;
    

