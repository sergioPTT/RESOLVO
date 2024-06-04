<?php
class Trabajador
{
    private $trabajador;
    private $conexion;

    public function __construct()
    {
        //mejor require que include ya que con este no se repite codigo
        require_once('./../../modelo/modeloConexion.php');
        $this->conexion = Conexion::__connect();
    }


    function sacarLosTrabajadores()
    {
        $query=("SELECT * from trabajador");
        $consultaPreparada = $this->conexion->prepare($query);
        $respuestaQuery=$consultaPreparada->execute();
        if ($respuestaQuery) {
            $arrayProductos = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
            return $arrayProductos;
        }else{
            return false;
        }
    }

    function sacarTrabajadoresCodPostal($codPostal){
        $query=("SELECT * from trabajador where codPostal=$codPostal");
        $consultaPreparada = $this->conexion->prepare($query);
        $respuestaQuery=$consultaPreparada->execute();
        if ($respuestaQuery) {
            $arrayProductos = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
            return $arrayProductos;
        }else{
            return false;
        }
    }

    function sacarTrabajadoresCargo($cargo){
        // Consulta con marcador de posición
        $query = "SELECT * FROM trabajador WHERE cargo = :cargo";
    
        // Preparar la consulta
        $consultaPreparada = $this->conexion->prepare($query);
    
        // Ejecutar la consulta pasando el valor del marcador de posición
        $respuestaQuery = $consultaPreparada->execute(['cargo' => $cargo]);
    
        if ($respuestaQuery) {
            // Obtener todos los resultados
            $arrayTrabajadores = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
            return $arrayTrabajadores;
        } else {
            return false;
        }
    }
   
    function  sacarTrabajadoresEspecializacion($especializacion){
        // Consulta con marcador de posición
        $query = "SELECT * FROM trabajador WHERE especializacion = :especializacion";
    
        // Preparar la consulta
        $consultaPreparada = $this->conexion->prepare($query);
    
        // Ejecutar la consulta pasando el valor del marcador de posición
        $respuestaQuery = $consultaPreparada->execute(['especializacion' => $especializacion]);
    
        if ($respuestaQuery) {
            // Obtener todos los resultados
            $arrayTrabajadores = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
            return $arrayTrabajadores;
        } else {
            return false;
        }
    }

    function   insertarTrabajador($nombre, $apellido, $calle, $codPostal, $ciudad, $provincia, $telefono, $dni,$fechaNacimiento, $cargo , $especializacion){
       
        $query = "INSERT INTO trabajador (nombre, apellidos, calle, codPostal,ciudad,provincia, telefono,dni,fechaNacimiento, cargo , especializacion ) 
        VALUES (:nombre, :apellido, :calle, :codPostal, :ciudad,:provincia, :telefono,
        :dni,:fechaNacimiento, :cargo , :especializacion )";
        $consultaPreparada = $this->conexion->prepare($query);
        //hace falta poner htmlentities y addslashes
        
        $nombre= htmlentities (addslashes($_POST['nombre']));
        $apellido= htmlentities (addslashes($_POST['apellido']));
        $calle= htmlentities (addslashes($_POST['calle']));
        $codPostal= htmlentities (addslashes($_POST['codPostal']));
        $telefono= htmlentities (addslashes($_POST['telefono']));
        $ciudad= htmlentities (addslashes($_POST['ciudad']));
        $provincia= htmlentities (addslashes($_POST['provincia']));
        $dni= htmlentities (addslashes($_POST['dni']));
        $fechaNacimiento= htmlentities (addslashes($_POST['fechaNacimiento']));
        $cargo= htmlentities (addslashes($_POST['cargo']));
        $especializacion= htmlentities (addslashes($_POST['especializacion']));

        
        $consultaPreparada->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $consultaPreparada->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $consultaPreparada->bindParam(':calle', $calle, PDO::PARAM_STR);
        $consultaPreparada->bindParam(':codPostal', $codPostal, PDO::PARAM_STR);
        $consultaPreparada->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $consultaPreparada->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
        $consultaPreparada->bindParam(':provincia', $provincia, PDO::PARAM_STR);
        $consultaPreparada->bindParam(':dni', $dni, PDO::PARAM_STR);
        $consultaPreparada->bindParam(':fechaNacimiento', $fechaNacimiento, PDO::PARAM_STR);
        $consultaPreparada->bindParam(':cargo', $cargo, PDO::PARAM_STR);
        $consultaPreparada->bindParam(':especializacion', $especializacion, PDO::PARAM_STR);
        
        
        try {
            if ($consultaPreparada->execute()){
                return true;
            }
        } catch (PDOException $e) {
          
            $errorInfo = $consultaPreparada->errorInfo();
          
          $mensajeFallo=$errorInfo[1];

            return $mensajeFallo;
          
        }
        
        
    }    
    }






