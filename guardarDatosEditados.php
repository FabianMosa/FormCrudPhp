<?php
if(
    !isset($_POST["nombre"])||
    !isset($_POST["apellidos"])||
    !isset($_POST["sexo"])||
    !isset($_POST["id"])
)exit();

include_once "conexionBD.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$sexo = $_POST["sexo"];

$cnx = new Conexion();
$sentencia = $cnx->getConexion()->prepare("UPDATE personas SET nombre = ?, apellidos = ?, sexo = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre,$apellidos,$sexo,$id]);
#$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

if ($resultado === TRUE) {
    echo "Cambios guardados";    
}else{
    "Algo salio mal.Por favor verificar que la tabla exista, asi como el ID del usuario";
}
?>
