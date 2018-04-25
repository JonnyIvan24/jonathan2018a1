<?php
require_once "conexion_libros.php";
$result = "";
$id = $_GET["id"];
$id = (int)$id;
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
$sqlactualizar = "UPDATE libros SET titulo='$titulo', npaginas=$npaginas, 
aniopublicacion='$anio', precioactual=$precio, stock=$stock,
 id_materia=$materia, id_editorial=$editorial, id_autor=$autor WHERE id_libros=".$id;
$conn->exec($sqlactualizar);

$sqllibros = 'SELECT L.id_libros, L.id_libros, L.titulo,  L.stock, L.precioactual, L.aniopublicacion, L.npaginas, M.materia, E.editorial, A.nombre,
A.paterno, A.materno
FROM libros L INNER JOIN materia M ON L.id_materia = M.id_materia INNER JOIN editorial E 
ON E.id_editorial = L.id_editorial INNER JOIN autor A ON L.id_autor=A.id_autor';
$result = $conn->query($sqllibros);
$libros = $result->fetchAll();
foreach ($libros as $libro){

}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Libro actualizado</title>
</head>
<body>
<h2 align="center">Libro actualizado</h2>
<div>
    <fieldset>
        <legend>Libro actualizado correctamente</legend>
        <form action="reporte_libros_para_editar_jonathan.php" method="post" id="form_libros">
            <label for="txtid">ID </label>
            <input type="text" name="txttid" id="txttid" value="<?php echo $libro['id_libros']; ?>" disabled><br><br>
            <label for="txttitulo">Titulo del libro </label>
            <input type="text" name="txttitulo" id="txttitulo" value="<?php echo $libro['titulo']; ?>" disabled><br><br>
            <label for="txtnumeropaginas">Número de páginas </label>
            <input type="text" name="txtnumeropaginas" id="txtnumeropaginas" value="<?php echo $libro['npaginas']; ?>" disabled><br><br>
            <label for="txtaniopublicacion">Año de publicación </label>
            <input type="text" name="txtaniopublicacion" id="txtaniopublicacion" value="<?php echo $libro['aniopublicacion']; ?>" disabled><br><br>
            <label for="txtprecio">Precio </label>
            <input type="text" name="txtprecio" id="txtprecio" value="<?php echo $libro['precioactual']; ?>" disabled><br><br>
            <label for="txtstock">Stock </label>
            <input type="text" name="txtstock" id="txtstock" value="<?php echo $libro['stock']; ?>" disabled><br><br>
            <label for="txt_materia">Materia </label>
            <input type="text" name="txtstock" id="txtstock" value="<?php echo $libro['materia']; ?>" disabled><br><br>
            <label for="txt_editorial">Editorial </label>
            <input type="text" name="txtstock" id="txtstock" value="<?php echo $libro['editorial']; ?>" disabled><br><br>
            <label for="txt_editorial">Autor </label>
            <input type="text" name="txtstock" id="txtstock" value="<?php echo $libro['nombre'] . ' ' . $libro['paterno'] . ' ' . $libro['materno']; ?>" disabled><br><br>
            <input type="submit" name="otro_libro" value="Editar otro libro">
        </form>
    </fieldset>
</div>
<?php
//Cerramos la conexion a la base de datos **********************************************
$conn = null;
?>
</body>
</html>