<?php
if (!isset($_GET["id"]))
    exit();

$id = $_GET["id"];
include_once "conexionBD.php";

$cnx = new Conexion();
$sentencia = $cnx->getConexion()->prepare("DELETE FROM personas WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
#$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);

if ($resultado === TRUE) {
    echo "Eliminado correctament";
}else{
    echo "Algo salió mal";
}
?>