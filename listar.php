<?php
require "conexionBD.php";
require_once "persona.php";

$cnx = new Conexion();
$sentencia = $cnx->getConexion()->prepare("SELECT * FROM personas;");
$sentencia->execute();
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);

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
    <title>Listar personas</title>    
</head>

<body>
    <div class="container" id="fondo">

        <div id="login">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><h2>Salir</h2></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registrar.html"><h2>Registrar</h2></a>
                </li>
            </ul>
        </div>

        <div id="welcome">
            <h1>listado</h1>
        </div>

        <div id="tabla">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>APELLIDOS</th>
                        <th>GÉNERO</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($personas as $persona) { ?>
                        <tr>
                            <td>
                                <?php echo $persona->id ?>
                            </td>
                            <td>
                                <?php echo $persona->nombre ?>
                            </td>
                            <td>
                                <?php echo $persona->apellidos ?>
                            </td>
                            <td>
                                <?php echo $persona->sexo ?>
                            </td>
                            <td>
                                <a class="btn btn-success" href="<?php echo "actualizar.php?id=" . $persona->id ?>">Editar</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $persona->id ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>