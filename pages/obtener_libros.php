<?php
// Insertamos el código PHP donde nos conectamos a la base de datos *******************************
require_once "conexion_libros.php";
$result;
$resultado = "<option value='0'>Estos son los libros del autor</option>";
$resultado2 = "<option value='0'>Seleccione un autor</option>";

// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
$autor_elegido = $_POST["autor_seleccionado"];

// Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
$sql2 = "SELECT * FROM libros WHERE id_autor = $autor_elegido";

// Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
$result = $conn->query($sql2);

// Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
$rows = $result->fetchAll();
// El resultado se mostrará en la página, en el BODY ***************************************************

// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
if (empty($rows)) {
    echo $resultado2;
    die();
} else {
    echo $resultado;
    foreach ($rows as $row) {
        echo '<option value="'.$row['id_libros'].'">'.$row['titulo'].'</option>';
    }
}
?>