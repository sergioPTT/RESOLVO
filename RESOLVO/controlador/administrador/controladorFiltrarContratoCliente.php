<?php
include_once("./../../modelo/modeloCliente.php");
    $cliente = new Cliente();
    $contrato = $_POST['contrato'];
    $respuestaQuery=$cliente->sacarClienteContrato($contrato);
    $arrayIncidencia = Json_encode($respuestaQuery);
    echo $arrayIncidencia;
    

    