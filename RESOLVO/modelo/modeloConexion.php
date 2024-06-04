<?php
require_once('./../../modelo/modeloConfig.php');
class Conexion
{
  public static function __connect()
  { //al ser publico puedes acceder desde cualqueir archivo
    //static significa que puedes usar el metodo sin necesidad de crear un objeto 
    try {
      $objetoPDO = new PDO("mysql:host=" . SERVER . ";dbname=" . DBNAME, USERNAME, PASSWORD);
      //setAttribute saber el error y la infor en el modelo
      $objetoPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //Mete el charset en la bbdd
      //  $objetoPDO->exec("set character set ".CHARSET);
      return $objetoPDO;
    } catch (PDOException $e) {
      echo 'Error de conexión: ' . $e->getMessage();
    }
  }
}
