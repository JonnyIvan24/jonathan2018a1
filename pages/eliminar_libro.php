<?php
require_once "conexion_libros.php";
$result;
//tomar los atos por get
$id = $_GET["id"];
//parsear los datos del get a tipo int
$id = (int)$id;
//consulta para mostrar los datos del libro por medio del id
$sql = 'SELECT L.id_libros, L.titulo, L.npaginas, L.aniopublicacion, L.precioactual, L.stock, M.materia, E.editorial, E.ciudad, A.nombre,
A.paterno, A.materno, A.direccion, A.pais, A.nickname
FROM libros L INNER JOIN materia M ON L.id_materia = M.id_materia INNER JOIN editorial E 
ON E.id_editorial = L.id_editorial INNER JOIN autor A ON L.id_autor=A.id_autor WHERE L.id_libros = '.$id;
//ejecutar y guardar los datos de la consulta
$result = $conn->query($sql);
$libros = $result->fetchAll();
//consulta para eliminar el libro
$sql1 = "DELETE FROM libros WHERE libros.id_libros =".$id;
//ejecutar la sentencia para eliminar el libro
$conn->exec($sql1);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Libro eliminado</title>
</head>
<body>
<h2 align="center">Libro eliminado</h2>
<div align="center">
    <table border="1" width="90%"><!-- agregar una tabla para mostrar los datos del libro -->
        <thead>
        <tr><!--encabezado de la tabla -->
            <th>Titulo</th>
            <th>Paginas</th>
            <th>Año Publicación</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Materia</th>
            <th>Editorial</th>
            <th>Ciudad</th>
            <th>Autor</th>
            <th>Paterno</th>
            <th>Materno</th>
            <th>Direccion</th>
            <th>Pais</th>
            <th>Nickname</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($libros as $libro) {
            //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
            ?>
            <tr>
                <td><?php echo $libro['titulo']; ?></td>
                <td><?php echo $libro['npaginas']; ?></td>
                <td><?php echo $libro['aniopublicacion']; ?></td>
                <td><?php echo $libro['precioactual']; ?></td>
                <td><?php echo $libro['stock']; ?></td>
                <td><?php echo $libro['materia']; ?></td>
                <td><?php echo $libro['editorial']; ?></td>
                <td><?php echo $libro['ciudad']; ?></td>
                <td><?php echo $libro['nombre']; ?></td>
                <td><?php echo $libro['paterno']; ?></td>
                <td><?php echo $libro['materno']; ?></td>
                <td><?php echo $libro['direccion']; ?></td>
                <td><?php echo $libro['pais']; ?></td>
                <td><?php echo $libro['nickname']; ?></td>
            </tr>
        <?php } ?>

        </tbody>
    </table><br><!-- rutas para regresar o navegar a otra seccion del sitio -->
    <a href="reporte_libros_para_editar_jonathan.php">Regresar para borrar mas libros...</a><br>
    <a href="alta_libros.php">Agregar libros...</a>
</body>
<?php $conn = null;//borrar la conexion ?>
</html>