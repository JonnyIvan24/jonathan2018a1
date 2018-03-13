<!DOCTYPE html>
<html lang="es">
<head>
    <?php
    require_once "conexion_libros.php";
    $result;
    $id = $_GET["id"];
    $id = (int)$id;

    $sql = 'SELECT L.id_libros, L.titulo, L.npaginas, L.aniopublicacion, L.precioactual, L.stock, M.materia, E.editorial, E.ciudad, A.nombre,
A.paterno, A.materno, A.direccion, A.pais, A.nickname
FROM libros L INNER JOIN materia M ON L.id_materia = M.id_materia INNER JOIN editorial E 
ON E.id_editorial = L.id_editorial INNER JOIN autor A ON L.id_autor=A.id_autor WHERE L.id_libros = '.$id;
    $result = $conn->query($sql);
    $rows = $result->fetchAll();
    ?>
    <meta charset="UTF-8">
    <title>Detalle libro</title>
</head>
<body>
<h2 align="center">Reporte de detalles del libro</h2>
<div align="center">
    <table border="1" width="90%">
        <thead>
        <tr>
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
        foreach ($rows as $row) {
            //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
            ?>
            <tr>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['npaginas']; ?></td>
                <td><?php echo $row['aniopublicacion']; ?></td>
                <td><?php echo $row['precioactual']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><?php echo $row['materia']; ?></td>
                <td><?php echo $row['editorial']; ?></td>
                <td><?php echo $row['ciudad']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['paterno']; ?></td>
                <td><?php echo $row['materno']; ?></td>
                <td><?php echo $row['direccion']; ?></td>
                <td><?php echo $row['pais']; ?></td>
                <td><?php echo $row['nickname']; ?></td>
            </tr>
        <?php } ?>

        </tbody>
    </table><br>
    <a href="reporte_libros_jonathan.php">Regresar...</a>
</div>
</body>
</html>