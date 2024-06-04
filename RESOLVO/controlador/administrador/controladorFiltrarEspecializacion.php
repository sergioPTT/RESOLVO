<?php
include_once("./../../modelo/modeloTrabajador.php");

    $trabajador = new Trabajador();
  
    $especializacion=$_POST['especializacion'];
    $respuestaQuery=$trabajador->sacarTrabajadoresEspecializacion($especializacion);
    $arrayIncidencia = Json_encode($respuestaQuery);
    echo $arrayIncidencia;
    

    