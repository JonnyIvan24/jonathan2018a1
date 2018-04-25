<?php
require_once "conexion_libros.php";
$result = "";
$id = $_GET["id"];
$id = (int)$id;
$sqllibros = 'SELECT * FROM libros WHERE id_libros = '.$id;
$result = $conn->query($sqllibros);
$libros = $result->fetchAll();
foreach ($libros as $libro1){
    $libro = $libro1;
}

$sql = 'SELECT * FROM materia';
$stmt = $conn->query($sql);
$materias = $stmt->fetchAll();
if (empty($materias)) {
    $result = "No se encontraron resultados !!";
}
$sql2 = 'SELECT * FROM editorial';
$stmt2 = $conn->query($sql2);
$editoriales = $stmt2->fetchAll();
if (empty($editoriales)) {
    $result = "No se encontraron resultados !!";
}
$sql3 = 'SELECT * FROM autor';
$stmt3 = $conn->query($sql3);
$autores = $stmt3->fetchAll();
if (empty($autores)) {
    $result = "No se encontraron resultados !!";
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alta de libros</title>
    <script type="text/javascript">
        function validar_libro() {
            var materia = document.getElementById('combo_materia').selectedIndex;
            var editorial = document.getElementById('combo_editorial').selectedIndex;
            var autor = document.getElementById('combo_autor').selectedIndex;
            var titulo = document.getElementById('txttitulo').value;
            var npaginas = parseInt(document.getElementById('txtnumeropaginas').value);
            var anio = parseInt(document.getElementById('txtaniopublicacion').value);
            var precio= parseInt(document.getElementById('txtprecio').value);
            var stock = parseInt(document.getElementById('txtstock').value);

            if(confirm("¿Los datos son correctos?")==false){
                return false;
            }else if (materia == 0 || materia == null){
                alert("por favor selecione la meteria del libro");
                document.getElementById("combo_materia").focus();
                return false;
            }else if (editorial == 0 || editorial == null){
                alert("porfavor seleccione la editorial del libro");
                document.getElementById("combo_editorial").focus();
                return false;
            }else if (autor == 0 || autor == null){
                alert("por favor seleccione el autor del libro");
                document.getElementById("combo_autor").focus();
                return false;
            }else if (titulo.length == 0 || titulo == null || /^\s+$/.test(titulo)) {
                alert("Favor de escribir el titulo del libro");
                document.getElementById("txttitulo").focus();
                return false;
            }else if( isNaN(npaginas) || npaginas == null) {
                alert("Favor de escribir el numero de paginas");
                document.getElementById("txtnumeropaginas").focus();
                return false;
            }else if (isNaN(anio) || anio == null){
                alert("Favor de escribir el año de publicación del libro");
                document.getElementById("txtaniopublicacion").focus();
                return false;
            }else if(isNaN(precio) || precio == null){
                alert("Favor de escribir el precio del libro");
                document.getElementById("txtprecio").focus();
                return false;
            }else if (isNaN(stock) || stock == null){
                alert("Favor de escribir el stock del libro");
                document.getElementById("txtstock").focus();
                return false;
            }else{
                return true;
            }
        }
    </script>
</head>
<body>
<h2 align="center">Editar el libro</h2>
<div>
    <fieldset>
        <legend>Formulario</legend>
        <form action="actualizar_libro.php?id=<?php echo $libro['id_libros']?>" method="post" id="form_libros" onsubmit="return validar_libro();">
            <label for="txtid">ID </label>
            <input type="text" name="txtid" id="txtid" value="<?php echo $libro['id_libros']; ?>" disabled><br><br>
            <label for="txttitulo">Titulo del libro </label>
            <input type="text" name="txttitulo" id="txttitulo" value="<?php echo $libro['titulo']; ?>"><br><br>
            <label for="txtnumeropaginas">Número de páginas </label>
            <input type="text" name="txtnumeropaginas" id="txtnumeropaginas" value="<?php echo $libro['npaginas']; ?>"><br><br>
            <label for="txtaniopublicacion">Año de publicación </label>
            <input type="text" name="txtaniopublicacion" id="txtaniopublicacion" value="<?php echo $libro['aniopublicacion']; ?>"><br><br>
            <label for="txtprecio">Precio </label>
            <input type="text" name="txtprecio" id="txtprecio" value="<?php echo $libro['precioactual']; ?>"><br><br>
            <label for="txtstock">Stock </label>
            <input type="text" name="txtstock" id="txtstock" value="<?php echo $libro['stock']; ?>"><br><br>
            <label for="combo_materia">Materia </label>
            <select name="combo_materia" id="combo_materia">
                <option value="0">Selecciona una materia...</option>
                <?php
                foreach ($materias as $materia) {
                    echo('<option value="' . $materia['id_materia'] . '"');
                    if ($materia['id_materia'] == $libro['id_materia']) {
                        echo('selected');
                    }
                    echo('>' . $materia['materia'] . '</option>');
                    }
                ?>
            </select><br><br>
            <label for="combo_editorial">Editorial </label>
            <select name="combo_editorial" id="combo_editorial">
                <option value="0">Selecciona una editorial...</option>
                <?php
                foreach ($editoriales as $editorial) {
                    echo ('<option value="' . $editorial['id_editorial'] . '"');
                    if ($editorial['id_editorial'] == $libro['id_editorial']) {
                        echo('selected');
                    }
                    echo('>' . $editorial['editorial'] . '</option>');
                }
                ?>
            </select><br><br>
            <label for="combo_autor">Autor </label>
            <select name="combo_autor" id="combo_autor">
                <option value="0">Selecciona un autor...</option>
                <?php
                foreach ($autores as $autor) {
                    echo ('<option value="' . $autor['id_autor'] . '"');
                    if ($autor['id_autor'] == $libro['id_autor']) {
                        echo('selected');
                    }
                    echo ('>' . $autor['nombre'] . ' ' . $autor['paterno'] . ' ' . $autor['materno'] . '</option>');
                }
                ?>
            </select><br><br>
            <input type="submit" name="actualizar_libros" value="Actualizar libro">
            <a href="reporte_libros_para_editar_jonathan.php"><input type="button" name="regresar" value="Regresar a reportes de libros"></a>
        </form>
    </fieldset>
</div>
<?php
//Cerramos la conexion a la base de datos **********************************************
$conn = null;
?>
</body>
</html>