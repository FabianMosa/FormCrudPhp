<?php

session_start();

if (isset($_SESSION['user_id'])) {
    //header('Location: /');
}
require_once 'conexionBD.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['nombre']) && !empty($_POST['password']))
        $cnx = "";
    $cnx = new Conexion();
    $records = $cnx->getConexion()->prepare('SELECT  id FROM login WHERE nombre = :nombre AND password = :password');
    $records->bindParam(':nombre', $_POST['nombre']);
    $records->bindParam(':password', $_POST['password']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if ($results == TRUE) {
        echo "<script> window.location='registrar.html'; </script>";
    } else {
        echo "<script> window.location='login.php'; </script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login de usuario</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="views/css/style.css">
</head>

<body>
    <div class="container" id="fondo">

        <div class="p-5" id="welcome">
            <h1>Bienvenido </h1>
            <br>
            <h1> Login de usuario </h1>
        </div>

        <div class="p-3 bg-gradient" id="login">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="was-validated">
                <div class=" col mb-3 mt-3">
                    <label for="nombre" class="form-label">
                        <h2>Nombre:</h2>
                    </label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre" required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">
                        <h2>Contraseña:</h2>
                    </label>
                    <input class="form-control" type="password" name="password" placeholder="Ingrese su contraseña"
                        required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="d-grid mt-3">
                    <input class="btn btn-block" type="submit" value="Ingresar" id="btn"/>
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