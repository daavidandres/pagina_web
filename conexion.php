<?php
    $conexion = odbc_connect("base", "", "") or die("No se conectó");
    
    //    Insertar UN REGISTRO.
    //    INSERT INTO "Tabla" (campo1, campo2, campo3...)
    /*
    $sql ="
        INSERT INTO Profesores
        (CI, Nombre, Email)
        VALUES (666, 'liliana', 'kopo@outlook.es')
    ";
    */

    //IMPRIMIR LOS DATOS DE UN REGISTRO

    // $sql = "
    //    SELECT Nombre, Email, CI FROM Profesores WHERE CI = '1234324'
    //";
    //$consulta = odbc_exec($conexion, $sql);
    //$datos = odbc_fetch_object($consulta);

    //echo "CI: ", $datos->CI, '<br />',"Nombre: ", $datos->Nombre, '<br />', "Email: ", $datos->Email;


    //ACTUALIZAR UN CAMPO DE UN REGISTRO
    /*$sql = "
        UPDATE Profesores SET Nombre= 'Alex' WHERE Nombre='jose'
    ";
    odbc_exec($conexion, $sql);
    */

    //ELIMINAR UN REGISTRO
    
    /*
    $sql = "
        DELETE FROM Profesores WHERE CI = '666'
    ";
    odbc_exec($conexion, $sql);
    */
    /*
    $Usuario = '123';
    $Contraseña = '123';
    $Sql = "SELECT COUNT(*) as count_rows FROM Usuario WHERE Usuario = '$Usuario' AND Contrasena='$Contraseña'";
    $cuenta = odbc_exec($conexion, $Sql);
    $cuenta = odbc_fetch_object($cuenta);
    echo ($cuenta->count_rows);
    */