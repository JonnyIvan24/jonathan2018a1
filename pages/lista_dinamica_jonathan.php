<?php
// Insertamos el código PHP donde nos conectamos a la base de datos *******************************
require_once "conexion_libros.php";
$result = "";
// Escribimos la consulta para recuperar los autores de la tabla autor **************
$sql = 'SELECT * FROM autor';
// Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
$stmt = $conn->query($sql);
// Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
$rows = $stmt->fetchAll();
// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
if (empty($rows)) {
    $result = "No se encontraron resultados !!";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista Dinamica</title>
    <script language="JavaScript" type="text/javascript">
        /* Se define la función que se usará para instanciar objetos XMLHttpRequest */
        function crear_objeto_XMLHttpRequest() {
            try {
                objeto = new XMLHttpRequest();
            } catch(err1) {
                try {
                    objeto = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (err2) {
                    try {
                        objeto = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (err3) {
                        objeto = false;
                    }
                }
            }
            return objeto;
        }
        /* Aquí acaba la definición de la función que se usará para instaciar objetos XMLHttpRequest */
        var objeto_AJAX = crear_objeto_XMLHttpRequest();

        /* La siguiente función se ejecuta cuando es invocada por un cambio en el control de la lista de autores. */
        function pedirlibros(){
            var URL = "obtener_libros.php";
            objeto_AJAX.open("POST", URL, true);
            objeto_AJAX.onreadystatechange = muestraResultado;
            objeto_AJAX.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            objeto_AJAX.send("autor_seleccionado="+document.getElementById("Comboautor").value);
        }

        /* La siguiente función se ejecuta cuando se recibe una respuesta del servidor. */
        function muestraResultado(){
            if (objeto_AJAX.readyState == 4 && objeto_AJAX.status == 200) //200 con este numero significa que todo salio bien
            {
                document.getElementById("ComboLibros").innerHTML = objeto_AJAX.responseText;
            }
        }
    </script>
</head>
<body>
<div>
    <p><?php echo $result;?></p>
    <fieldset style="width: 90%">
        <legend>Autores</legend><br>
        <form action="detalle_libro1.php" method="post" id="formulario2">
            <div>
                <p>
                    <label for="Comboautor">Nombre del autor: </label>
                    <select name="Comboautor" id="Comboautor" onChange="javascript:pedirlibros();">
                        <option value="0">-- Selecciona un autor --</option>
                        <?php //ponemos los registros de los autores con la ayuda de un foreach
                        foreach ($rows as $row)
                        {
                            echo '<option value="'.$row['id_autor'].'">'.$row['nombre'].' '.$row['paterno'].'</option>';
                        }
                        ?>
                    </select>
                </p>
                <p>

                    <label for="ComboLibros">Libros del autor seleccionado:</label>
                    <select name="ComboLibros" id="ComboLibros">
                        <option value='0'>Seleccione un autor</option>
                    </select>
                </p>
                <p>
                    <input type="submit" name="buscarLibros" value="  Buscar datos de los Libros " />
                </p>
            </div>
        </form>
    </fieldset>
</div>
<?php
//Cerramos la conexion a la base de datos **********************************************
$conn = null;
?>
</body>
</html>