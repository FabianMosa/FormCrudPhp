<?php
/*
$server = 'localhost';
$username = 'id20090372_root';
$password = 'BDiplacex2023+';
$database = 'id20090372_db4';
*/
//Local

class Conexion
{
  public $conexion;

  function __construct()
  {
    try {
      $this->conexion = new PDO('mysql:host=localhost;dbname=pruebas','root', '');
      if ($this->conexion === TRUE)
        echo "Insertado Correctamente";      
    } catch (PDOException $e) {
      die('Fallo conexión a base de datos: ' . $e->getMessage());
    }
  }

  function getConexion()
  {
    return $this->conexion;
    
  }

}


?>