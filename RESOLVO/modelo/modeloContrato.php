<?php
class Contrato
{
    private $contrato;
    private $conexion;
    
    public function __construct()
    {
        //mejor require que include ya que con este no se repite codigo
        require_once('./../../modelo/modeloConexion.php');
        $this->conexion = Conexion::__connect();
    }
    
    //comprobamos si el correo que nos mete el cliente esta en la base de datos:
    function comprobarCorreo($emailCliente){
        $query = ("select email from cliente where email= :aliasGmail");
        $consultaPreparada = $this->conexion->prepare($query);
        $consultaPreparada->bindParam(':aliasGmail', $emailCliente, PDO::PARAM_STR);
        $respuestaQuery = $consultaPreparada->execute();
        $numFilas = $consultaPreparada->rowCount();
        if ($numFilas > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    
    function comprarContratoLimitado($idCliente)
    {
        $contratoLimitado = "UPDATE cliente SET contrato = 'limitado', numIncidencias = 2 WHERE idCliente = :idCliente";
        $consulta = $this->conexion->prepare($contratoLimitado);
        $consulta->bindParam(':idCliente', $idCliente, PDO::PARAM_INT);
        try {
            if ($consulta->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
    
    
    function  comprarContratoIlimitado($idCliente)
    {
        $contratoLimitado = "UPDATE cliente SET contrato = 'ilimitado', numIncidencias = 1000000 WHERE idCliente = :idCliente";
        $consulta = $this->conexion->prepare($contratoLimitado);
        $consulta->bindParam(':idCliente', $idCliente, PDO::PARAM_INT);
        try {
            if ($consulta->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
    
    function comprarSinContrato($idCliente)
    {
        $contratoLimitado = "UPDATE cliente SET contrato = 'noTiene', numIncidencias = 0 WHERE idCliente = :idCliente";
        $consulta = $this->conexion->prepare($contratoLimitado);
        $consulta->bindParam(':idCliente', $idCliente, PDO::PARAM_INT);
        try {
            if ($consulta->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
    
    
    
    
    
    
    
    function insertarIncidencia($especializacion, $idCliente, $dispositivo, $marca, $modelo, $motivo, $resultadoImagen)
    {
        // echo "El valor de mi imagen es: " . $resultadoImagen;
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
        //Aqui esto esta comentado para que no salga fallo si no se ecuntra un trabajador con esa especializacion
        // $resultadoIdTrabajador = $consultaIdTrabajador->fetch(PDO::FETCH_ASSOC);
        // if ($resultadoIdTrabajador) {
            //     $idTrabajador = $resultadoIdTrabajador['idTrabajador'];
            // } else {
                //     return 3; // Error: No se encontró ningún trabajador con la especialización especificada
                // }
                
                // Insertar la incidencia en la tabla incidencia
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
                    // Ejecutar la inserción de la incidencia
                    if ($consultaInsertarIncidencia->execute()) {
                        // Verificar si se proporcionó una imagen
                        //if (strlen($imagen) == 0) {
                            //if (isset($miVariable) && empty($miVariable)) {
                                if ($resultadoImagen != "sinImagen") {
                                    // Obtener el ID de la última inserción
                                    $idincidencia = $this->conexion->lastInsertId();
                                    
                                    // Insertar la imagen en la tabla 'media'
                                    $queryInsertarMedia = "INSERT INTO media (idIncidencia, data) VALUES (:idIncidencia, :imagen)";
                                    $consultaInsertaMedia = $this->conexion->prepare($queryInsertarMedia);
                                    $consultaInsertaMedia->bindParam(':idIncidencia', $idincidencia, PDO::PARAM_INT);
                                    $consultaInsertaMedia->bindParam(':imagen', $resultadoImagen, PDO::PARAM_LOB);
                                    
                                    // Ejecutar la inserción de la imagen
                                    if ($consultaInsertaMedia->execute()) {
                                        // Actualizar el número de incidencias
                                        $restaIncidencia = "UPDATE cliente SET numIncidencias = numIncidencias - 1 WHERE idCliente = :idCliente";
                                        $consulta = $this->conexion->prepare($restaIncidencia);
                                        $consulta->bindParam(':idCliente', $idCliente, PDO::PARAM_INT);
                                        if ($consulta->execute()) {
                                            return 0; // Inserción exitosa
                                        } else {
                                            return 1; // Error al actualizar el número de incidencias
                                        }
                                    } else {
                                        return 2; // Error al insertar la imagen
                                    }
                                } else {
                                    // Actualizar el número de incidencias
                                    $restaIncidencia = "UPDATE cliente SET numIncidencias = numIncidencias - 1 WHERE idCliente = :idCliente";
                                    $consulta = $this->conexion->prepare($restaIncidencia);
                                    $consulta->bindParam(':idCliente', $idCliente, PDO::PARAM_INT);
                                    if ($consulta->execute()) {
                                        return 0;  // Inserción exitosa
                                    } else {
                                        return 1; // Error al actualizar el número de incidencias
                                    }
                                }
                            } else {
                                return 4; // Error al insertar la incidencia
                            }
                        } catch (PDOException $e) {
                            return 5; // Error número de incidencias (no tengo)
                        }
                    }
                }
                