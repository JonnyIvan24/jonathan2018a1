<?php
//Insertamos el codigo PHP donde nos conectamos a la base de datos
require_once "conexion_libros.php";
$result = "";
//Recuperramos los valores de las cajas de texto y de los demas objetos del formulario
$nick = $_POST["txt_nick"];
$nombres = $_POST["txtnombres"];
$apellidop = $_POST["txtapellidop"];
$apellidom = $_POST["txtapellidom"];
$direccion = $_POST["txtdireccion"];
$pais = $_POST["txtpais"];

//escribimos la consulta para insertar los datos en la tabla empleados usando PDO
$sqlINSERT1 = "INSERT INTO autor(nombre, paterno, materno, direccion, pais,nickname) 
VALUE ('$nombres', '$apellidop', '$apellidom', '$direccion', '$pais', '$nick')";
//Ejecutamos la sentencia INSERT de SQL apartir de la conexion PDO
$conn->exec($sqlINSERT1);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro del autor</title>
</head>
<body>
<div align="center">
    <fieldset style="text-align: left; width: 80%">
        <legend>Autor registrado correctamente</legend>
        <div>
            <br>
            <b>Nickname: </b><?php echo ($nick)?><br><br>
            <br>
            <b>Nombre: </b><?php echo ($nombres)?><br><br>
            <br>
            <b>Apellido Paterno: </b><?php echo ($apellidop)?><br><br>
            <br>
            <b>Apellido Materno: </b><?php echo ($apellidom)?><br><br>
            <br>
            <b>Dirección: </b><?php echo ($direccion)?><br><br>
            <br>
            <b>País: </b><?php echo ($pais)?><br><br>
        </div>
    </fieldset>
    <div align="center">
        <a href="alta_autores_jonathan.php">Registrar otro autor..</a>
    </div>
</div>
<?php
//Cerramos la conexion a la base de datos **********************************************
$conn = null;
?>
</body>
</html>
