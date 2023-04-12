<?php/*
// recordar la variable de sesion
session_start();
include 'IniciarSesion.php';
// validar que se cree una variable de sesion al iniciar sesion

if(!isset($_POST[Usuario])){
    header("Location: index.php");
}*/
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
    <h3>Bienvenido al Sistema</h3>
    <div class="row text-center col-sm-12 col-nd-12 col-lg-12 py-4">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#" class="nav-link active">Ausencias</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link active">Observaciones</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link active">Cambiar contraseña</a>
            </li>
        </ul>
    </div>
</div>

<?php

$connStr = 
        'odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};' .
        'Dbq=C:\\Users\\sanma\\normal.accdb;';

$dbh = new PDO($connStr);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 
        "SELECT AgentName FROM Agents " .
        "WHERE ID <> ? AND AgentName <> ?";
$sth = $dbh->prepare($sql);

// query parameter value(s)
$params = array(
        7,
        'Homer'
        );

$sth->execute($params);
?>
<div class="row text-center col-sm-12 col-nd-12 col-lg-12 py-4">
    <ul class="nav nav-tabs">

    <?php
    while ($row = $sth->fetch()) {
    echo '"'. utf8_encode($row['AgentName']) . '"'. "\r\n";
    }
    ?>
    </ul>
</div>

<br>
<a href="CerrarSesion.php" class="btn btn-danger">Cerrar Sesión</a>


</body>

</html>