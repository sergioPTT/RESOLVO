<?php
class SinContrato
{
    private $sinContrato;
    private $conexion;

    public function __construct()
    {
        //mejor require que include ya que con este no se repite codigo
        require_once('./../../modelo/modeloConexion.php');
        $this->conexion = Conexion::__connect();
    }


    function insertarIncidenciaSinContrato($especializacion, $idCliente, $dispositivo, $marca, $modelo, $motivo)
    {
        // Comprobamos el numero de incidencias que tiene el cliente disponibles
        $consultaUsuarioExterno = $this->conexion->prepare("SELECT * FROM cliente WHERE idCliente = :idCliente");
        $consultaUsuarioExterno->bindParam(':idCliente', $idCliente);
        $consultaUsuarioExterno->execute();
        $resultadoNumIncidencias = $consultaUsuarioExterno->fetch(PDO::FETCH_ASSOC);
        $_SESSION["intentosIncidencias"] = $resultadoNumIncidencias['numIncidencias'];
        // $_SESSION["tipoDeContrato"] = $resultadoNumIncidencias['contrato'];

        // Saca idTrabajador que meteremos en la incidencia
        $queryIdTrabajador = "SELECT idTrabajador FROM trabajador WHERE especializacion = :especializacion";
        $consultaIdTrabajador = $this->conexion->prepare($queryIdTrabajador);
        $consultaIdTrabajador->bindParam(':especializacion', $especializacion, PDO::PARAM_STR);
        $consultaIdTrabajador->execute();

        // Obtener el ID del trabajador correctamente
        $resultadoIdTrabajador = $consultaIdTrabajador->fetch(PDO::FETCH_ASSOC);
        if ($resultadoIdTrabajador) {
            $idTrabajador = $resultadoIdTrabajador['idTrabajador'];
        } else {
            return 3; // Error: No se encontró ningún trabajador con la especialización especificada
        }

        // Insertar la incidencia
        $queryInsertarIncidencia = "INSERT INTO incidencia(idCliente, idTrabajador, dispositivo, marca, modelo, motivo)
            VALUES (:idCliente, :idTrabajador, :dispositivo, :marca, :modelo, :motivo)";
        $consultaInsertarIncidencia = $this->conexion->prepare($queryInsertarIncidencia);
        $consultaInsertarIncidencia->bindParam(':idCliente', $idCliente, PDO::PARAM_STR);
        $consultaInsertarIncidencia->bindParam(':idTrabajador', $idTrabajador, PDO::PARAM_STR);
        $consultaInsertarIncidencia->bindParam(':dispositivo', $dispositivo, PDO::PARAM_STR);
        $consultaInsertarIncidencia->bindParam(':marca', $marca, PDO::PARAM_STR);
        $consultaInsertarIncidencia->bindParam(':modelo', $modelo, PDO::PARAM_STR);
        $consultaInsertarIncidencia->bindParam(':motivo', $motivo, PDO::PARAM_STR);

        try {
            if ($consultaInsertarIncidencia->execute()) {
                // Actualizar el número de incidencias
                $restaIncidencia = "UPDATE cliente SET numIncidencias = numIncidencias - 1 WHERE idCliente = :idCliente";
                $consulta = $this->conexion->prepare($restaIncidencia);
                $consulta->bindParam(':idCliente', $idCliente, PDO::PARAM_INT);
                try {
                    if ($consulta->execute()) {
                        return 0; // Inserción exitosa
                    }
                } catch (PDOException $e) {
                    return 0; // Error al actualizar el número de incidencias
                }
            }
        } catch (PDOException $e) {
            return 2; // Error al insertar la incidencia
        }
    }
}
