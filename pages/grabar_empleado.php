<?php
//Insertamos el codigo PHP donde nos conectamos a la base de datos
require_once "conexion.php";
$result="";

//Recuperramos los valores de las cajas de texto y de los demas objetos del formulario
$numero = $_POST["txtnumero"];
$numero = (int)$numero;
$nombre = strtoupper(trim($_POST["txtnombre"]));
$salario = $_POST["txtsalario"];
$categoria = $_POST["txtcategoria"];
$sexo = $_POST["combo_sexo"];
$departamento = $_POST["combo_departamento"];

//escribimos la consulta para insertar los datos en la tabla empleados usando PDO
$sqlINSERT1 = "INSERT INTO empleados(numero, nombre,salario,categoria,sexo,departamento)";
$sqlINSERT2 = $sqlINSERT1."VALUE ($numero, '$nombre', $salario, '$categoria', '$sexo', 
'$departamento')";
//Ejecutamos la sentencia INSERT de SQL apartir de la conexion PDO
$conn->exec($sqlINSERT2);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de empleados desde PHP</title>
</head>
<body>
<fieldset style="width: 90%">
    <legend>Empleado Registrado correctamente: </legend>
    <div>
        <br>
        <b>Departamento: </b><?php echo ($departamento)?>
        <br><br>
        <br>
        <b>Nombre: </b><?php echo ($nombre)?>
        <br><br>
        <br>
        <b>Salario: </b><?php echo ($salario)?>
        <br><br>
        <br>
        <b>Categoria: </b><?php echo ($categoria)?>
        <br><br>
        <br>
        <b>Sexo: </b><?php echo ($sexo)?>
        <br><br>
    </div>
</fieldset>
<div align="center">
    <a href="alta_empleados.php">Registrar otro usuario..</a>
</div>
</body>
</html>
