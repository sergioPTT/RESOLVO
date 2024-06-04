<?php
class Cliente
{
    private $conexion;
    private $cliente;
    private $trabajador;
    public function __construct()
    {
        //mejor require que include ya que con este no se repite codigo
        require_once ('./../../modelo/modeloConexion.php');
        $this->conexion = Conexion::__connect();
    }


    //SACAR TODOS LOS DATOS DE LOS CLIENTES
    function sacarLosClientes($email)
    {
        $query = ("SELECT * from cliente");
        $consultaPreparada = $this->conexion->prepare($query);
        $respuestaQuery = $consultaPreparada->execute();
        if ($respuestaQuery) {
            $arrayProductos = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
            return $arrayProductos;
        } else {
            return false;
        }
    }
    //GUARDAR LOS DATOS DE PERFIL DEL CLIENTE 
    function guardarDatosCliente($nombre, $apellidos, $calle, $codPostal, $ciudad, $provincia, $telefono, $dni, $email)
    {
        try {
            // Iniciar transacción
            $this->conexion->beginTransaction();
    
            // Consulta para actualizar en la tabla `clientes`
            $query = "UPDATE cliente 
                SET 
                    nombre = :nombre,
                    apellidos = :apellidos,
                    calle = :calle,
                    codPostal = :codPostal,
                    ciudad = :ciudad,
                    provincia = :provincia,
                    telefono = :telefono,
                    dni = :dni
                WHERE 
                    email = :email";
            $consultaPreparada = $this->conexion->prepare($query);
    
            // Vincular los parámetros
            $consultaPreparada->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':calle', $calle, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':codPostal', $codPostal, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':provincia', $provincia, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':dni', $dni, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':email', $email, PDO::PARAM_STR);
    
            $respuestaQuery = $consultaPreparada->execute();
    
            if ($respuestaQuery) {
                // Confirmar la transacción si la consulta se ejecutó correctamente
                $this->conexion->commit();
                return true;
            } else {
                // Realizar un rollBack si la consulta falla
                $this->conexion->rollBack();
                return false;
            }
        } catch (PDOException $e) {
            // Realizar un rollBack si se produce una excepción durante la ejecución de la consulta
            $this->conexion->rollBack();
            // Puedes registrar o manejar el error de alguna manera, por ejemplo:
            error_log("Error al cambiar los datos: " . $e->getMessage());
            return false;
        }
    }
    

    function sacarClienteApellido($apellido)
    {
        // Consulta con marcador de posición
        $query = "SELECT * FROM cliente WHERE apellidos = :apellido";

        // Preparar la consulta
        $consultaPreparada = $this->conexion->prepare($query);

        // Ejecutar la consulta pasando el valor del marcador de posición
        $respuestaQuery = $consultaPreparada->execute(['apellido' => $apellido]);

        if ($respuestaQuery) {
            // Obtener todos los resultados
            $arrayClientes = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
            return $arrayClientes;
        } else {
            return false;
        }
    }


    function sacarClienteCiudad($ciudad)
    {
        // Consulta con marcador de posición
        $query = "SELECT * FROM cliente WHERE ciudad = :ciudad";

        // Preparar la consulta
        $consultaPreparada = $this->conexion->prepare($query);

        // Ejecutar la consulta pasando el valor del marcador de posición
        $respuestaQuery = $consultaPreparada->execute(['ciudad' => $ciudad]);

        if ($respuestaQuery) {
            // Obtener todos los resultados
            $arrayClientes = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
            // echo "El array tien: ".$arrayClientes;
            return $arrayClientes;
        } else {
            return false;
        }
    }


    // function sacarDatosCliente($email)
    // {
    //     // Consulta con marcador de posición
    //     $query = "SELECT * FROM cliente WHERE email = :email";

    //     // Preparar la consulta
    //     $consultaPreparada = $this->conexion->prepare($query);

    //     // Ejecutar la consulta pasando el valor del marcador de posición
    //     $respuestaQuery = $consultaPreparada->execute(['email' => $email]);
    //     // echo "Esto que tiene ?: ".$respuestaQuery;
    //     if ($respuestaQuery) {
    //         // Obtener todos los resultados
    //         $arrayClientes = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    //         // echo "Esto que tiene ?: ".$arrayClientes;
    //         return $arrayClientes;
    //     } else {
    //         return false;
    //     }
    // }
    function sacarDatosCliente($email)
    {
        try {
            // Consulta con marcador de posición
            $query = "SELECT * FROM cliente WHERE email = :email";

            // Preparar la consulta
            $consultaPreparada = $this->conexion->prepare($query);

            // Ejecutar la consulta pasando el valor del marcador de posición
            $respuestaQuery = $consultaPreparada->execute(['email' => $email]);

            if ($respuestaQuery) {
                // Obtener todos los resultados
                $arrayClientes = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);

                // Depuración: mostrar resultados
                // echo "Resultados: " . print_r($arrayClientes, true);

                return $arrayClientes;
            } else {
                // Depuración: mostrar mensaje de error
                // echo "Error al ejecutar la consulta.";
                return false;
            }
        } catch (PDOException $e) {
            // Depuración: mostrar excepción
            // echo "Error de base de datos: " . $e->getMessage();
            return false;
        }
    }

    function sacarDatosTrabajador($email)
    {
        try {
            // Consulta con marcador de posición
            $query = "SELECT * FROM trabajador WHERE email = :email";

            // Preparar la consulta
            $consultaPreparada = $this->conexion->prepare($query);

            // Ejecutar la consulta pasando el valor del marcador de posición
            $respuestaQuery = $consultaPreparada->execute(['email' => $email]);

            if ($respuestaQuery) {
                // Obtener todos los resultados
                $arrayClientes = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);

                // Depuración: mostrar resultados
                // echo "Resultados: " . print_r($arrayClientes, true);

                return $arrayClientes;
            } else {
                // Depuración: mostrar mensaje de error
                // echo "Error al ejecutar la consulta.";
                return false;
            }
        } catch (PDOException $e) {
            // Depuración: mostrar excepción
            // echo "Error de base de datos: " . $e->getMessage();
            return false;
        }
    }





    function sacarClienteContrato($contrato)
    {
        // Consulta con marcador de posición
        $query = "SELECT * FROM cliente WHERE contrato = :contrato";

        // Preparar la consulta
        $consultaPreparada = $this->conexion->prepare($query);

        // Ejecutar la consulta pasando el valor del marcador de posición
        $respuestaQuery = $consultaPreparada->execute(['contrato' => $contrato]);

        if ($respuestaQuery) {
            // Obtener todos los resultados
            $arrayClientes = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
            return $arrayClientes;
        } else {
            return false;
        }
    }


    //SACAR DATOS DE CLIENTES E INCIDENCIAS 
    function sacarCliente()
    {
        session_start();

        $idDelCurrela = $_SESSION["miIdTrabajador"];


        //Tengo que sacar al cliente que le tenga asociado como trabajador 
        $query = ("SELECT 
        cliente.idCliente,
        cliente.nombre,
        cliente.apellidos,
        cliente.calle,
        cliente.codPostal,
        cliente.ciudad,
        cliente.provincia,
        cliente.telefono,
        cliente.dni,
        cliente.email,
        cliente.contrato,
        cliente.numIncidencias,
        incidencia.idIncidencia,
        incidencia.dispositivo,
        incidencia.marca,
        incidencia.modelo,
        incidencia.motivo,
        incidencia.fechaAltaIncidencia,
        incidencia.estado
        FROM 
        cliente
        JOIN 
        incidencia ON cliente.idCliente = incidencia.idCliente
        WHERE 
        incidencia.idTrabajador = $idDelCurrela");
        $consultaPreparada = $this->conexion->prepare($query);
        $respuestaQuery = $consultaPreparada->execute();
        if ($respuestaQuery) {
            $arrayProductos = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
            return $arrayProductos;
        } else {
            return false;
        }
    }

    function filtrarNombreCliente($nombre)
    {
        $query = "SELECT 
        cliente.idCliente,
        cliente.nombre,
        cliente.apellidos,
        cliente.calle,
        cliente.codPostal,
        cliente.ciudad,
        cliente.provincia,
        cliente.telefono,
        cliente.dni,
        cliente.email,
        cliente.contrato,
        cliente.numIncidencias,
        incidencia.idIncidencia,
        incidencia.dispositivo,
        incidencia.marca,
        incidencia.modelo,
        incidencia.motivo,
        incidencia.fechaAltaIncidencia,
        incidencia.estado
        FROM 
        cliente
        JOIN 
        incidencia ON cliente.idCliente = incidencia.idCliente
        WHERE 
        cliente.nombre = :nombre;
        ";
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


    function filtrarProvinciaCliente($provincia)
    {
        $query = "SELECT 
        cliente.idCliente,
        cliente.nombre,
        cliente.apellidos,
        cliente.calle,
        cliente.codPostal,
        cliente.ciudad,
        cliente.provincia,
        cliente.telefono,
        cliente.dni,
        cliente.email,
        cliente.contrato,
        cliente.numIncidencias,
        incidencia.idIncidencia,
        incidencia.dispositivo,
        incidencia.marca,
        incidencia.modelo,
        incidencia.motivo,
        incidencia.fechaAltaIncidencia,
        incidencia.estado
        FROM 
        cliente
        JOIN 
        incidencia ON cliente.idCliente = incidencia.idCliente
        WHERE 
        cliente.provincia = :provincia;
        ";
        $consultaPreparada = $this->conexion->prepare($query);
        $consultaPreparada->bindParam(':provincia', $provincia, PDO::PARAM_STR);
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
    function filtrarMarcaCliente($marca)
    {
        $query = "SELECT 
        cliente.idCliente,
        cliente.nombre,
        cliente.apellidos,
        cliente.calle,
        cliente.codPostal,
        cliente.ciudad,
        cliente.provincia,
        cliente.telefono,
        cliente.dni,
        cliente.email,
        cliente.contrato,
        cliente.numIncidencias,
        incidencia.idIncidencia,
        incidencia.dispositivo,
        incidencia.marca,
        incidencia.modelo,
        incidencia.motivo,
        incidencia.fechaAltaIncidencia,
        incidencia.estado
        FROM 
        cliente
        JOIN 
        incidencia ON cliente.idCliente = incidencia.idCliente
        WHERE 
        incidencia.marca = :marca;
        ";
        $consultaPreparada = $this->conexion->prepare($query);
        $consultaPreparada->bindParam(':marca', $marca, PDO::PARAM_STR);
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






    function comprobarCorreo($email)
    {
        $query = ("select email from cliente where email= :aliasGmail");
        $consultaPreparada = $this->conexion->prepare($query);
        $consultaPreparada->bindParam(':aliasGmail', $email, PDO::PARAM_STR);
        $respuestaQuery = $consultaPreparada->execute();
        $numFilas = $consultaPreparada->rowCount();
        if ($numFilas > 0) {
            return true;
        } else {
            return false;
        }
    }


    function insertarCliente($nombre, $apellido, $direccion, $codigo, $ciudad, $provincia, $telefono, $dni, $email, $password)
    {
        try {
            $queryCliente = "INSERT INTO cliente (nombre, apellidos, calle, codPostal, ciudad, provincia, telefono, dni, email) 
            VALUES (:nombre, :apellidos, :calle, :codigoPostal, :ciudad, :provincia, :telefono, :dni, :email)";
            $consultaPreparadaCliente = $this->conexion->prepare($queryCliente);

            $consultaPreparadaCliente->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $consultaPreparadaCliente->bindParam(':apellidos', $apellido, PDO::PARAM_STR);
            $consultaPreparadaCliente->bindParam(':calle', $direccion, PDO::PARAM_STR);
            $consultaPreparadaCliente->bindParam(':codigoPostal', $codigo, PDO::PARAM_STR);
            $consultaPreparadaCliente->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
            $consultaPreparadaCliente->bindParam(':provincia', $provincia, PDO::PARAM_STR);
            $consultaPreparadaCliente->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $consultaPreparadaCliente->bindParam(':dni', $dni, PDO::PARAM_STR);
            $consultaPreparadaCliente->bindParam(':email', $email, PDO::PARAM_STR);

            $consultaPreparadaCliente->execute();

            $idCliente = $this->conexion->lastInsertId();

            // $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $passwordHash = hash('sha256', $password);
            $queryUsuarioExterno = "INSERT INTO usuarioexterno (idCliente, email, material) VALUES (:idCliente, :email, :material)";
            $consultaPreparadaUsuarioExterno = $this->conexion->prepare($queryUsuarioExterno);

            $consultaPreparadaUsuarioExterno->bindParam(':idCliente', $idCliente, PDO::PARAM_STR);
            $consultaPreparadaUsuarioExterno->bindParam(':email', $email, PDO::PARAM_STR);
            $consultaPreparadaUsuarioExterno->bindParam(':material', $passwordHash, PDO::PARAM_STR);

            $consultaPreparadaUsuarioExterno->execute();

            return true;
        } catch (PDOException $e) {
            //lo que hace es un array con dos codigos de fallo y el mensaje de fallo
            $errorInfo = $consultaPreparadaCliente->errorInfo();
            //este es el que dice el codifo del fallo y su info
            $mensajeFallo = "Error por el codigo: " . $errorInfo[1] . " y La informacion del error es: " . $errorInfo[2] . "<br>";
            //metemos en una variable el info del error  
            //$mensajeFallo=$errorInfo[2];

            //metemos en una variable el codigo del error
            // $mensajeFallo = $errorInfo[1];

            //Retornamos la info del error
            //return $mensajeFallo;

            //retornamos el codigo del error
            // echo $mensajeFallo;
            return $mensajeFallo;
        }
    }




    //FUNCION INICIAR SESION COMO CLINTE O COMO ADMINISTRADOR
    function iniciarSesion($email, $password)
    {
        //Se compruba si esta iniciando sesion un cliente
        $consultaUsuarioExterno = $this->conexion->prepare("SELECT * FROM usuarioexterno WHERE email = :email");
        $consultaUsuarioExterno->bindParam(':email', $email);
        if ($consultaUsuarioExterno->execute()) {
            if ($consultaUsuarioExterno->rowCount() > 0) {
                $resultado = $consultaUsuarioExterno->fetch(PDO::FETCH_ASSOC);
                //cogemos la contraseña de base de datos
                $passwordBd = $resultado["material"];

                // echo "La contraseña de bbdd es: ".$passwordBd;
                
                $passworInputHash = hash('sha256', $password);
                // echo "La contraseña que pone el usuario es: ".$passworInputHash;
                //  if (password_verify($password, $passwordBd)) {
                if ($passworInputHash == $passwordBd) {
                    session_start();
                    $_SESSION["acceso"] = "1";
                    $_SESSION["miId"] = $resultado['idCliente'];

                    //sacamos el tipo de contrato que tiene el usuario que ha iniciado sesion
                    $consultaCliente = $this->conexion->prepare("SELECT * FROM cliente WHERE email = :email");
                    $consultaCliente->bindParam(':email', $email);
                    $consultaCliente->execute();
                    $arrayDatosCliente = $consultaCliente->fetch(PDO::FETCH_ASSOC);
                    //Sacamos todos los datos del cliente 
                    $_SESSION["nombreCliente"] = $arrayDatosCliente['nombre'];
                    $_SESSION["apellidoCliente"] = $arrayDatosCliente['apellidos'];
                    $_SESSION["calleCliente"] = $arrayDatosCliente['calle'];
                    $_SESSION["codPostalCliente"] = $arrayDatosCliente['codPostal'];
                    $_SESSION["ciudadCliente"] = $arrayDatosCliente['ciudad'];
                    $_SESSION["provinciaCliente"] = $arrayDatosCliente['provincia'];
                    $_SESSION["TelefonoCliente"] = $arrayDatosCliente['telefono'];
                    $_SESSION["dniCliente"] = $arrayDatosCliente['dni'];
                    $_SESSION["emailCliente"] = $arrayDatosCliente['email'];
                    $_SESSION["contratoCliente"] = $arrayDatosCliente['contrato'];
                    $_SESSION["numIncidenciasCliente"] = $arrayDatosCliente['numIncidencias'];
                    return 1;
                } else {
                    return 2; // Contraseña incorrecta
                }
            } else {
                //si cuando un cliente inicia sesion y no se encuntra pasara a buscar si es un trabjador
                $consultaUsuarioInterno = $this->conexion->prepare("SELECT * FROM usuariointerno WHERE email = :email");
                $consultaUsuarioInterno->bindParam(':email', $email);
                if ($consultaUsuarioInterno->execute()) {
                    if ($consultaUsuarioInterno->rowCount() > 0) {
                        $resultadoTrabajador = $consultaUsuarioInterno->fetch(PDO::FETCH_ASSOC);
                        $passBd = $resultadoTrabajador["material"];
                        // if (password_verify($password, $passBd)) {
                        if ($password == $passBd) {
                            if ($resultadoTrabajador["primeraVez"] == 1) {
                                $_SESSION["emailDelTrabajador"] = $resultadoTrabajador['email'];
                                return 0;
                            } else {
                                session_start();
                                $_SESSION["accesoTrabajador"] = "2";
                                $_SESSION["miIdTrabajador"] = $resultadoTrabajador['idTrabajador'];

                                //sacamos los datos del trabajador que ha iniciado sesion
                                $consultaTrabajador = $this->conexion->prepare("SELECT * FROM trabajador WHERE email = :email");
                                $consultaTrabajador->bindParam(':email', $email);
                                $consultaTrabajador->execute();
                                $arrayDatosCliente = $consultaTrabajador->fetch(PDO::FETCH_ASSOC);


                                $_SESSION["nombreTrabajador"] = $arrayDatosCliente['nombre'];
                                $_SESSION["apellidoTrabajador"] = $arrayDatosCliente['apellidos'];
                                $_SESSION["calleTrabajador"] = $arrayDatosCliente['calle'];
                                $_SESSION["codPostalTrabajador"] = $arrayDatosCliente['codPostal'];
                                $_SESSION["ciudadTrabajador"] = $arrayDatosCliente['ciudad'];
                                $_SESSION["provinciaTrabajador"] = $arrayDatosCliente['provincia'];
                                $_SESSION["TelefonoTrabajador"] = $arrayDatosCliente['telefono'];
                                $_SESSION["dniTrabajador"] = $arrayDatosCliente['dni'];
                                $_SESSION["emailTrabajador"] = $arrayDatosCliente['email'];
                                $_SESSION["fechaNacimientoTrabajador"] = $arrayDatosCliente['fechaNacimiento'];
                                $_SESSION["cargoTrabajador"] = $arrayDatosCliente['cargo'];
                                $_SESSION["especializacionTrabajador"] = $arrayDatosCliente['especializacion'];
                                return 1;
                            }
                        } else {
                            return 2; // Contraseña incorrecta
                        }
                    } else {
                        return 3; // No se encontró el usuario
                    }
                } else {
                    return 4; // Error en la ejecución de la consulta
                }
            }
        }
    }
    function cambiarPassword($password, $email)
    {
        try {
            // Iniciar una transacción
            $this->conexion->beginTransaction();

            // Hashear la nueva contraseña
            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Actualizar la contraseña y establecer primeraVez a 0
            $query = "UPDATE `usuariointerno` SET `material` = :password, `primeraVez` = 0 WHERE `email` = :email";
            $consultaPreparada = $this->conexion->prepare($query);

            // Vincular los parámetros
            $consultaPreparada->bindParam(':password', $password, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':email', $email, PDO::PARAM_STR);

            // Ejecutar la consulta
            $respuestaQuery = $consultaPreparada->execute();

            if ($respuestaQuery) {
                // Confirmar la transacción si la consulta se ejecutó correctamente
                $this->conexion->commit();
                return true;
            } else {
                // Realizar un rollBack si la consulta falla
                $this->conexion->rollBack();
                return false;
            }
        } catch (PDOException $e) {
            // Realizar un rollBack si se produce una excepción durante la ejecución de la consulta
            $this->conexion->rollBack();
            // Puedes registrar o manejar el error de alguna manera, por ejemplo:
            error_log("Error al cambiar la contraseña: " . $e->getMessage());
            return false;
        }
    }

    function cambiarPasswordCliente($password, $email)
    {
        try {
            // Iniciar una transacción
            $this->conexion->beginTransaction();

            // Hashear la nueva contraseña
            $passwordHash = hash('sha256', $password);
            
            // Actualizar la contraseña y establecer primeraVez a 0
            $query = "UPDATE `usuarioexterno` SET `material` = :password WHERE `email` = :email";
            $consultaPreparada = $this->conexion->prepare($query);

            // Vincular los parámetros
            $consultaPreparada->bindParam(':password', $passwordHash, PDO::PARAM_STR);
            $consultaPreparada->bindParam(':email', $email, PDO::PARAM_STR);

            // Ejecutar la consulta
            $respuestaQuery = $consultaPreparada->execute();

            if ($respuestaQuery) {
                // Confirmar la transacción si la consulta se ejecutó correctamente
                $this->conexion->commit();
                return true;
            } else {
                // Realizar un rollBack si la consulta falla
                $this->conexion->rollBack();
                return false;
            }
        } catch (PDOException $e) {
            // Realizar un rollBack si se produce una excepción durante la ejecución de la consulta
            $this->conexion->rollBack();
            // Puedes registrar o manejar el error de alguna manera, por ejemplo:
            error_log("Error al cambiar la contraseña: " . $e->getMessage());
            return false;
        }
    }







    function darDeBajaCliente($emailCliente)
    {
        $this->conexion->beginTransaction();
        //Esto es cuando tenga el on delere cascade
        //DELETE FROM cliente WHERE email = :idProducto
        // $consulta1 = $this->conexion->prepare("DELETE FROM usuarioexterno WHERE email = :idProducto");
        // //  var_dump("consulta1: ", $consulta1);
        // $consulta1->bindParam(':idProducto', $emailCliente);
        // $consulta1->execute();
        $consulta2 = $this->conexion->prepare("DELETE FROM cliente WHERE email = :idProducto");
        $consulta2->bindParam(':idProducto', $emailCliente);
        //  var_dump("consulta2: ", $consulta2);
        $consulta2->execute();
        // $consulta3 = $this->conexion->prepare("DELETE FROM incidencia WHERE email = :idProducto");
        // $consulta3->bindParam(':idProducto', $emailCliente);
        // //  var_dump("consulta2: ", $consulta2);
        // $consulta3->execute();
        $this->conexion->commit();
        return true;
    }
}
