<?php
//Insertamos el codigo PHP donde nos conectamos a la base de datos
require_once "conexion_libros.php";
$result="";

//Recuperramos los valores de las cajas de texto y de los demas objetos del formulario
$materia = $_POST["combo_materia"];
$materia = (int)$materia;
$editorial = $_POST["combo_editorial"];
$editorial = (int)$editorial;
$autor = $_POST["combo_autor"];
$autor = (int)$autor;
$titulo = strtoupper(trim($_POST["txttitulo"]));
$npaginas = $_POST["txtnumeropaginas"];
$npaginas = (int)$npaginas;
$anio = $_POST["txtaniopublicacion"];
$anio = (int)$anio;
$precio = $_POST["txtprecio"];
$precio = (int)$precio;
$stock = $_POST["txtstock"];
$stock = (int)$stock;

//escribimos la consulta para insertar los datos en la tabla empleados usando PDO
$sqlINSERT1 = "INSERT INTO libros(titulo, npaginas, aniopublicacion, precioactual,stock, id_materia, id_editorial, id_autor)";
$sqlINSERT2 = $sqlINSERT1."VALUE ('$titulo', $npaginas, $anio, $precio, $stock, 
$materia, $editorial, $autor)";
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
    <title>Registro de libros desde PHP</title>
</head>
<body>
<fieldset style="width: 90%">
    <legend>Libro Registrado correctamente: </legend>
    <div>
        <br>
        <b>Materia: </b><?php echo ($materia)?>
        <br><br>
        <br>
        <b>Editorial: </b><?php echo ($editorial)?>
        <br><br>
        <br>
        <b>Autor: </b><?php echo ($autor)?>
        <br><br>
        <br>
        <b>Titulo: </b><?php echo ($titulo)?>
        <br><br>
        <br>
        <b>Numero de paginas: </b><?php echo ($npaginas)?>
        <br><br>
        <b>año de publicación: </b><?php echo ($anio)?>
        <br><br>
        <b>Precio: </b><?php echo ($precio)?>
        <br><br>
        <b>Stock: </b><?php echo ($stock)?>
        <br><br>
    </div>
</fieldset>
<div align="center">
    <a href="alta_libros.php">Registrar otro libro..</a>
</div>
</body>
</html>