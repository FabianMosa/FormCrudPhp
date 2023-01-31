<?php
if (!isset($_GET["id"]))
    exit();

$id = $_GET["id"];
include_once "conexionBD.php";

$cnx = new Conexion();
$sentencia = $cnx->getConexion()->prepare("SELECT * FROM personas WHERE id = ?;");
$sentencia->execute([$id]);
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
/*$personas = array();
$persona = new Persona();
array_push($personas, $resultado);*/

if ($resultado === FALSE) {
    echo "No, existe alguna persona con ese Id!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="views/css/style.css">
    <title>Actualizar</title>
</head>

<body>
    <div class="container" id="fondo">
        <div class="container p-5 my-5 text-black" id="login">
            <div class="col-6">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            <h2>Salir</h2>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar.php">
                            <h2>Listar</h2>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="welcome">
                <h2>Actualizar</h2>
            </div>
            <div>
                <form action="guardarDatosEditados.php" method="post">
                    <div class="mb-3 mt-3">
                        <input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
                        <label class="form-label"for="nombre">Nombre</label>
                        <input class="form-control"required type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre"
                            value="<?php echo $resultado->nombre; ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label"for="apellidos">Apellidos</label>
                        <input class="form-control" required type="text" id="apellidos" name="apellidos" placeholder="Escribe tus apellidos"
                            value="<?php echo $resultado->apellidos; ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label"for="sexo">Género</label>
                        <select class="form-control" required name="sexo" name="sexo" id="sexo">
                            <option value="">--Seleccione--</option>
                            <option <?php echo $resultado->sexo === 'M' ? "selected='selected'" : "" ?> value="M">
                                Masculino
                            </option>
                            <option <?php echo $resultado->sexo === 'F' ? "selected='selected'" : "" ?> value="F">Femenino
                            </option>
                        </select>
                    </div>
                    <div class="d-grid mt-3">
                        <input class="btn mb-3 mt-3 btn-block" id="btn" type="submit" value="Guardar cambios">
                    </div>
                </form>
            </div>
        </div>

        <!--JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
</body>

</html>