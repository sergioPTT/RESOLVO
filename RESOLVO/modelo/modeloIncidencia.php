<?php
class Incidencia
{
    private $incidencia;
    private $conexion;

    public function __construct()
    {
        //mejor require que include ya que con este no se repite codigo
        require_once('./../../modelo/modeloConexion.php');
        $this->conexion = Conexion::__connect();
    }

    function sacarIncidencia(){     
        $query=("SELECT 
        incidencia.idIncidencia, 
        cliente.nombre AS nombreCliente, 
        trabajador.nombre AS nombreTrabajador, 
        incidencia.dispositivo, 
        incidencia.marca, 
        incidencia.modelo, 
        incidencia.motivo, 
        incidencia.fechaAltaIncidencia, 
        incidencia.estado, 
        incidencia.informeTecnico, 
        incidencia.fechaCierreIncidencia, 
        incidencia.firmaDigital
    FROM 
        incidencia
    JOIN 
        cliente ON incidencia.idCliente = cliente.idCliente
    JOIN 
        trabajador ON incidencia.idTrabajador = trabajador.idTrabajador;
    ");
        $consultaPreparada = $this->conexion->prepare($query);
        $respuestaQuery=$consultaPreparada->execute();
        if ($respuestaQuery) {
            $arrayProductos = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
            return $arrayProductos;
        }else{
            return false;
        }
    }


    function filtrarNombreCliente($nombre) {
        $query = ("SELECT 
        incidencia.idIncidencia, 
        cliente.nombre AS nombreCliente, 
        trabajador.nombre AS nombreTrabajador, 
        incidencia.dispositivo, 
        incidencia.marca, 
        incidencia.modelo, 
        incidencia.motivo, 
        incidencia.fechaAltaIncidencia, 
        incidencia.estado, 
        incidencia.informeTecnico, 
        incidencia.fechaCierreIncidencia, 
        incidencia.firmaDigital
    FROM 
        incidencia
    JOIN 
        cliente ON incidencia.idCliente = cliente.idCliente
    JOIN 
        trabajador ON incidencia.idTrabajador = trabajador.idTrabajador
    WHERE 
        cliente.nombre = :nombre;
    ");
        $consultaPreparada = $this->conexion->prepare($query);
        $consultaPreparada->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $respuestaQuery = $consultaPreparada->execute();
        
        if ($respuestaQuery) {
            // Contar cuántas filas se encontraron con el nombre dado
            $rowCount = $consultaPreparada->rowCount();
            
            if ($rowCount == 1) {
                // Si hay una sola fila, usar fetch
                $resultado = $consultaPreparada->fetch(PDO::FETCH_ASSOC);
            } elseif ($rowCount > 1) {
                // Si hay más de una fila, usar fetchAll
                $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
            } else {
                // No se encontraron filas
                $resultado = false;
            }
            return $resultado;
        } else {
            return false;
        }
    }
   
 
   function filtrarNombreTrabajador($nombre) {
    $query = ("SELECT 
    incidencia.idIncidencia, 
    cliente.nombre AS nombreCliente, 
    trabajador.nombre AS nombreTrabajador, 
    incidencia.dispositivo, 
    incidencia.marca, 
    incidencia.modelo, 
    incidencia.motivo, 
    incidencia.fechaAltaIncidencia, 
    incidencia.estado, 
    incidencia.informeTecnico, 
    incidencia.fechaCierreIncidencia, 
    incidencia.firmaDigital
FROM 
    incidencia
JOIN 
    cliente ON incidencia.idCliente = cliente.idCliente
JOIN 
    trabajador ON incidencia.idTrabajador = trabajador.idTrabajador
WHERE 
    trabajador.nombre = :nombre;
");
    $consultaPreparada = $this->conexion->prepare($query);
    $consultaPreparada->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $respuestaQuery = $consultaPreparada->execute();
    
    if ($respuestaQuery) {
        // Contar cuántas filas se encontraron con el nombre dado
        $rowCount = $consultaPreparada->rowCount();
        
        if ($rowCount == 1) {
            // Si hay una sola fila, usar fetch
            $resultado = $consultaPreparada->fetch(PDO::FETCH_ASSOC);
        } elseif ($rowCount > 1) {
            // Si hay más de una fila, usar fetchAll
            $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // No se encontraron filas
            $resultado = false;
        }
        return $resultado;
    } else {
        return false;
    }
}

function filtrarEstado($nombre) {
    $query = ("SELECT 
    incidencia.idIncidencia, 
    cliente.nombre AS nombreCliente, 
    trabajador.nombre AS nombreTrabajador, 
    incidencia.dispositivo, 
    incidencia.marca, 
    incidencia.modelo, 
    incidencia.motivo, 
    incidencia.fechaAltaIncidencia, 
    incidencia.estado, 
    incidencia.informeTecnico, 
    incidencia.fechaCierreIncidencia, 
    incidencia.firmaDigital
FROM 
    incidencia
JOIN 
    cliente ON incidencia.idCliente = cliente.idCliente
JOIN 
    trabajador ON incidencia.idTrabajador = trabajador.idTrabajador
WHERE 
    incidencia.estado = :nombre;
");
    $consultaPreparada = $this->conexion->prepare($query);
    $consultaPreparada->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $respuestaQuery = $consultaPreparada->execute();
    
    if ($respuestaQuery) {
        // Contar cuántas filas se encontraron con el nombre dado
        $rowCount = $consultaPreparada->rowCount();
        
        if ($rowCount == 1) {
            // Si hay una sola fila, usar fetch
            $resultado = $consultaPreparada->fetch(PDO::FETCH_ASSOC);
        } elseif ($rowCount > 1) {
            // Si hay más de una fila, usar fetchAll
            $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // No se encontraron filas
            $resultado = false;
        }
        return $resultado;
    } else {
        return false;
    }
}



function filtrarMarca($nombre) {
    $query = ("SELECT 
    incidencia.idIncidencia, 
    cliente.nombre AS nombreCliente, 
    trabajador.nombre AS nombreTrabajador, 
    incidencia.dispositivo, 
    incidencia.marca, 
    incidencia.modelo, 
    incidencia.motivo, 
    incidencia.fechaAltaIncidencia, 
    incidencia.estado, 
    incidencia.informeTecnico, 
    incidencia.fechaCierreIncidencia, 
    incidencia.firmaDigital
FROM 
    incidencia
JOIN 
    cliente ON incidencia.idCliente = cliente.idCliente
JOIN 
    trabajador ON incidencia.idTrabajador = trabajador.idTrabajador
WHERE 
    incidencia.marca = :nombre;
");
    $consultaPreparada = $this->conexion->prepare($query);
    $consultaPreparada->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $respuestaQuery = $consultaPreparada->execute();
    
    if ($respuestaQuery) {
        // Contar cuántas filas se encontraron con el nombre dado
        $rowCount = $consultaPreparada->rowCount();
        
        if ($rowCount == 1) {
            // Si hay una sola fila, usar fetch
            $resultado = $consultaPreparada->fetch(PDO::FETCH_ASSOC);
        } elseif ($rowCount > 1) {
            // Si hay más de una fila, usar fetchAll
            $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // No se encontraron filas
            $resultado = false;
        }
        return $resultado;
    } else {
        return false;
    }
}


}
