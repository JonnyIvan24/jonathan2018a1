<?php
require_once "conexion_libros.php";
$result = "";
//consulta para saber los libros que tenemos en nuestra base de datos
$sql = 'SELECT L.titulo, A.nombre,
A.paterno, A.materno, A.id_autor, A.pais, A.nickname
FROM libros L INNER JOIN autor A ON L.id_autor=A.id_autor ORDER BY A.nombre';
//ejecutamos la consulta y guardamos
$result = $conn->query($sql);
$autores = $result->fetchAll();
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
    <h2 align="center">Reporte de detalles de Autores para Editar</h2>
    <div align="center">
        <table border="1" width="90%"><!-- Tabla para mostrar los datos -->
            <thead><!-- encabezado de la tabla -->
            <tr>
                <th>Nombre</th>
                <th>Nickname</th>
                <th>País</th>
                <th>Libro</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //ciclo for each para mostrar los datos de la consulta
            //guardados en la variable libros
            foreach ($autores as $autor) {
                ?>
                <tr>
                    <td><?php echo $autor['nombre']." ".$autor['paterno']." ".$autor['materno'];?></td>
                    <td><?php echo $autor['nickname']; ?></td>
                    <td><?php echo $autor['pais']; ?></td>
                    <td><?php echo $autor['titulo']; ?></td>
                    <td>
                        <a href="#"
                        ><input type="button" value="Eliminar" onclick="return confirm_libro('<?php echo $autor['nombre']?>');"></a>
                        <a href="editar_autores.php?id=<?php echo $autor['id_autor']?>"
                        ><input type="button" value="Editar"></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table><br><br>
        <a href="alta_autores_jonathan.php"><input type="button" value="Agregar autor"></a>
    </div>
    </body>
    </html>
<?php $conn = null; ?>