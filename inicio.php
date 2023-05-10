<?php
session_start();
//var_dump($_SESSION);
//echo "<br>Usuario: " . $_SESSION['Usuario'] . "<br>";
//echo "Estado de sesión: " . $_SESSION['status'] . "<br>";
if (!isset($_SESSION['Usuario'])) {
    header('Location: Index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="inicio.css">
    <title>INICIO</title>
</head>
<body>
    <center>
        <h1>INICIO</h1>
    </center>

<div class="container py-4">
    <h3>Bienvenido, <?php echo $_SESSION['Nombre']; ?></h3>
    <div class="row text-center col-sm-12 col-nd-12 col-lg-12 py-4" id="barra-navegacion">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="Ausencias.php" class="nav-link active">Ausencias</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link active">Observaciones</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link active">Cambiar contraseña</a>
            </li>
            <li class="nav-item">
            <a href="CerrarSesion.php" class="nav-link active">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
</div>



</body>

</html>