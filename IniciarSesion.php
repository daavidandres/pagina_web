<?php
session_start();
if (isset($_SESSION['Usuario'])) {
    header('Location: Inicio.php');
    exit();
}
include('Conexion.php');
if (isset($_POST['Usuario']) && isset($_POST['Contraseña'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validate($_POST['Usuario']);
    $Contraseña = validate($_POST['Contraseña']);

    if (empty($Usuario)) {
        header("Location: Index.php?error=El Usuario Es Requerido");
        exit();
    } elseif (empty($Contraseña)) {
        header("Location: Index.php?error=La Contraseña Es Requerida");
        exit();
    } else {

        $Sql = "SELECT * FROM Usuario WHERE Usuario = '$Usuario' AND Contrasena = '$Contraseña'";
        $consulta = odbc_exec($conexion, $Sql);
        $datos = odbc_fetch_object($consulta);

        $Sql = "SELECT COUNT(*) as count_rows FROM Usuario WHERE Usuario = '$Usuario' AND Contrasena = '$Contraseña'";
        $cuenta = odbc_exec($conexion, $Sql);
        $cuenta = odbc_fetch_object($cuenta);

        if ($cuenta->count_rows === '1') {
            $_SESSION['Usuario'] = $datos->Usuario;
            $_SESSION['Id'] = $datos->Id;
            $_SESSION['Id_Cargo'] = $datos->Id_Cargo;
            $_SESSION['status'] = "Logueado";
            $_SESSION['Nombre'] = $datos->Nombre;
            header("Location: Inicio.php");
            exit();
        } else {
            header("Location: Index.php?error=El usuario o la Contraseña son incorrectas");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
