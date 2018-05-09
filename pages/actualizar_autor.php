<?php
//Insertamos el codigo PHP donde nos conectamos a la base de datos
require_once "conexion_libros.php";
$result = "";
//Recuperramos los valores de las cajas de texto y de los demas objetos del formulario
$id = (int)$_GET['id'];
$nombres = $_POST["txtnombres"];
$apellidop = $_POST["txtapellidop"];
$apellidom = $_POST["txtapellidom"];
$direccion = $_POST["txtdireccion"];
$pais = $_POST["txtpais"];

//escribimos la consulta para insertar los datos en la tabla empleados usando PDO
$sqlupdate = "UPDATE autor SET nombre='$nombres', paterno='$apellidop', materno='$apellidom', direccion='$direccion',
 pais='$pais'  WHERE id_autor=".$id;
//Ejecutamos la sentencia INSERT de SQL apartir de la conexion PDO
$conn->exec($sqlupdate);
$sql ="SELECT * FROM autor WHERE id_autor=".$id;
$autores = $conn->query($sql);
foreach ($autores as $autor) {}
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
        <legend>Autor actualizado correctamente</legend>
        <div>
            <br>
            <b>id_autor: </b><?php echo ($id)?><br><br>
            <br>
            <br>
            <b>Nickname: </b><?php echo ($autor['nickname'])?><br><br>
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
        <a href="reporte_autores_para_editar_jonathan.php">Regresar..</a>
    </div>
</div>
<?php
//Cerramos la conexion a la base de datos **********************************************
$conn = null;
?>
</body>
</html>