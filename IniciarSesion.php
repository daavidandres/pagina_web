<?php

    inlcude('conexion.php');

if (isset($_POST["Usuario"]) && isset($_POST["Contraseña"])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data
    }

    $Usuario = validate($_POST["Usuario"]);
    $Contraseña = validate($_POST["Contraseña"]);

    if (empty($Usuario)){
        header("Location: index.php?error=El usuario es requerido");
        exit();
    }elseif (empty($Contraseña)){
        header("Location: index.php?error=La contraseña es requerida");
        exit();
    }else{
        /* Encriptación de la contraseña */
        $Clave = md5($Contraseña)
        $SQL = "SELECT * FROM usuarios WHERE Usuario = '$Usuario' AND Contraseña = '$Contraseña'";
        $result = mysqli_query($conexion, $SQL);

        if (mysqli_num_rows($result) === 1){
            $row =  mysqli_fetch_assoc($result);
            if ($row['Usuario'] === $Usuario && $row['Contraseña'] === $Contraseña){
                $_SESSION['Usuario'] =  $row['Usuario'];
                $_SESSION['Id'] = $row['Id']
                header("Location: Inicio.php");
                exit();
            }else{
                header("Location: index.php?error=El usuario o la clave son incorrectas")
                exit();
            }
        }
    }
}else{
    header("Location: index.php?error=El usuario o la clave son incorrectas")
                exit();
}