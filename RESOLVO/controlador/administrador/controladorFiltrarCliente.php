<?php
include_once("./../../modelo/modeloIncidencia.php");

//comporbamos que se haya pasado por le metodo POST

    $incidencia = new Incidencia();
  
    $nombre = $_POST['cliente'];
     
    $respuestaQuery=$incidencia->filtrarNombreCliente($nombre);
    $arrayIncidencia = Json_encode($respuestaQuery);
    echo $arrayIncidencia;
    

