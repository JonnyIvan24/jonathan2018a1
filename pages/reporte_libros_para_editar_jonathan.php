<?php
require_once "conexion_libros.php";
$result = "";
//consulta para saber los libros que tenemos en nuestra base de datos
$sql = 'SELECT L.id_libros, L.titulo,  L.stock, M.materia, E.editorial, A.nombre,
A.paterno, A.materno
FROM libros L INNER JOIN materia M ON L.id_materia = M.id_materia INNER JOIN editorial E 
ON E.id_editorial = L.id_editorial INNER JOIN autor A ON L.id_autor=A.id_autor';
//ejecutamos la consulta y guardamos
$result = $conn->query($sql);
$libros = $result->fetchAll();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de libros para editar</title>
    <script language="JavaScript" type="text/javascript">
        //funcion para confirmar si queremos eliminar el libro
        function confirm_libro(titulo) {
            return confirm("¿Estas seguro de querer borrar el libro " + titulo + "?") == true;
        }
    </script>
</head>
<body>
<h2 align="center">Reporte de detalles de libros para borrar</h2>
<div align="center">
    <table border="1" width="90%"><!-- Tabla para mostrar los datos -->
        <thead><!-- encabezado de la tabla -->
        <tr>
            <th>Titulo</th>
            <th>Stock</th>
            <th>Materia</th>
            <th>Editorial</th>
            <th>Autor</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //ciclo for each para mostrar los datos de la consulta
        //guardados en la variable libros
        foreach ($libros as $libro) {
            ?>
            <tr>
                <td><?php echo $libro['titulo'];?></td>
                <td><?php echo $libro['stock']; ?></td>
                <td><?php echo $libro['materia']; ?></td>
                <td><?php echo $libro['editorial']; ?></td>
                <td><?php echo $libro['nombre']." ".$libro['paterno']." ".$libro['materno'];//concatenamos el nombre con los apellidos ?></td>
                <td>
                    <a href="eliminar_libro.php?id=<?php echo $libro['id_libros']?>"
                    ><input type="button" value="Eliminar" onclick="return confirm_libro('<?php echo $libro['titulo']?>');"></a>
                    <a href="editar_libro.php?id=<?php echo $libro['id_libros']?>"
                        ><input type="button" value="Editar"></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table><br><br>
    <a href="alta_libros.php"><input type="button" value="Agregar libro"></a>
</div>
</body>
</html>
<?php $conn = null; ?>