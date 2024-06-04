<?php
include_once("./../../modelo/modeloCliente.php");
    $cliente = new Cliente();
    $apellido = $_POST['apellido'];
    $respuestaQuery=$cliente->sacarClienteApellido($apellido);
    $arrayIncidencia = Json_encode($respuestaQuery);
    echo $arrayIncidencia;
    

    