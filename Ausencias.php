<?php
session_start();
if (!isset($_SESSION['Usuario'])) {
    header('Location: Index.php');
    exit();
}
// your database connection code here
include_once 'conexion.php';
// check if the form has been submitted
if(isset($_POST['submit'])){
  
  // get the form data
  $Id_Alumno = $_POST['Id_Alumno'];
  //echo $Id_Alumno;
  
  // prepare the SQL query to insert a new record
  $sql = "INSERT INTO Ausencias (Id_Alumno) VALUES ($Id_Alumno);";
  

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="ausencias.css">
  <title>Registro de ausencias</title>
</head>
<body>
<center>
        <h1>AUSENCIAS</h1>
    </center>

<div class="container py-4">
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
<center>
    <h2>Registrar ausencia de alumno</h2>

  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for = "alumno">Alumno</label>
    <input type="number" name="Id_Alumno">
    <input type="submit" name = "submit" value="Registrar ausencia">
  </form>
  <?php
  if(isset($_POST['submit'])){
    if (odbc_exec($conexion, $sql)) {
        echo "Nuevo registro creado correctamente.<br>";
      } else {
        echo "Error: " . odbc_errormsg($conexion);
      }
  $Sql = "SELECT COUNT(*) as count_rows FROM Ausencias WHERE Id_Alumno = $Id_Alumno";
  $result = odbc_exec($conexion, $Sql);
  $result = odbc_fetch_object($result);
  $Nombre = odbc_exec($conexion, "SELECT Nombre FROM Alumno WHERE Id = $Id_Alumno");
  $Nombre = odbc_fetch_object($Nombre);
  echo utf8_encode($Nombre->Nombre) . " ha faltado " . $result->count_rows . " veces.";
  }
  ?>
</center>
  
</body>
</html>