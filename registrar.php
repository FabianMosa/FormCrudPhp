<?php

require_once "conexionBD.php";
require_once "persona.php";

function registrar($persona)
{
    #Salir si alguno de los datos no está presente
    if (!isset($_POST["nombre"]) || !isset($_POST["apellidos"]) || !isset($_POST["sexo"]))
        exit();
    #Si va todo bien, se ejecuta esta parte del código...
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $sexo = $_POST["sexo"];

    $cnx = new Conexion();
    $sentencia = $cnx->getConexion()->prepare("INSERT INTO personas( nombre, apellidos, sexo) VALUES(?, ?, ?);");
    $sentencia->bindParam(1, $nombre);
    $sentencia->bindParam(2, $apellidos);
    $sentencia->bindParam(3, $sexo);
    $resultado = $sentencia->execute(); #Pasar en el mismo orde los ?
#execute regresa un booleano. True en caso que vaya bien, False en caso contrario.
    if ($resultado === TRUE)
        echo "Insertado Correctamente";
    else
        echo "Algo salío mal. Por favor verifica que la tabla exista";
}


#Salir si alguno de los datos no está presente
if (!isset($_POST["nombre"]) || !isset($_POST["apellidos"]) || !isset($_POST["sexo"]))
    exit();
#Si va todo bien, se ejecuta esta parte del código...
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$sexo = $_POST["sexo"];

$cnx = new Conexion();
$sentencia = $cnx->getConexion()->prepare("INSERT INTO personas( nombre, apellidos, sexo) VALUES(?, ?, ?);");
$sentencia->bindParam(1, $nombre);
$sentencia->bindParam(2, $apellidos);
$sentencia->bindParam(3, $sexo);
$resultado = $sentencia->execute(); #Pasar en el mismo orde los ?
#execute regresa un booleano. True en caso que vaya bien, False en caso contrario.
if ($resultado === TRUE)
    echo "Insertado Correctamente";
else
    echo "Algo salío mal. Por favor verifica que la tabla exista";
?>