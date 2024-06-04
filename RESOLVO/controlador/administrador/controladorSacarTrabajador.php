<?php
include_once("./../../modelo/modeloTrabajador.php");

    $trabajador = new Trabajador();
  
    $respuestaQuery=$trabajador->sacarLosTrabajadores();
    $arrayIncidencia = Json_encode($respuestaQuery);
    echo $arrayIncidencia;
    

    