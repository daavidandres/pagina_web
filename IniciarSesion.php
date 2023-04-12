<?php   
    session_start();
    include('Conexion.php');

    if (isset($_POST['Usuario']) && isset($_POST['Contraseña']) ) {

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
    }elseif (empty($Contraseña)) {
        header("Location: Index.php?error=La Contraseña Es Requerida");
        exit();
    }else{

        // $Contraseña = md5($Contraseña);

        $Sql = "SELECT * FROM Usuario WHERE Usuario = '$Usuario' AND Contrasena='$Contraseña'";
        $consulta = odbc_exec($conexion, $Sql);
        $datos = odbc_fetch_object($consulta);
        $Sql = "SELECT COUNT(*) as count_rows
                FROM Usuario WHERE Usuario = 'Usuario' AND Contrasena='$Contraseña'";
        $cuenta = odbc_exec($conexion, $Sql);

        if ($cuenta === 1) {
            $row = $datos;
            if ($row['Usuario'] === $Usuario && $row['Contraseña'] === $Contraseña) {
                $_SESSION['Usuario'] = $row['Usuario'];
                $_SESSION['Nombre_Completo'] = $row['Nombre_Completo'];
                $_SESSION['Id'] = $row['Id'];
                header("Location: Inicio.php");
                exit();
            }else {
                header("Location: Index.php?error=El usuario o la Contraseña son incorrectas");
                exit();
            }

        }else {
            header("Location: Index.php?error=El usuario o la Contraseña son incorrectas");
            exit();
        }
    }

} else {
    header("Location: index.php");
            exit();
}