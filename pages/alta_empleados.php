<?php
require_once "conexion.php";
$result = "";

$sql = 'SELECT departamento, descripcion FROM departamentos';
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll();
if (empty($rows)) {
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
    <title>Alta de empleados</title>
</head>
<body>
<div>
    <form action="grabar_empleado.php" method="post" id="form_empleado">
        <p>
            <label for="txtnumero">Numero: </label>
            <input type="textnumero" name="txtnumero" id="txtnumero"><br>
        </p>
        <p>
            <label for="txtnombre">Nombre: </label>
            <input type="textnombre" name="txtnombre" id="txtnombre"><br>
        </p>
        <p>
            <label for="txtsalario">Salario: </label>
            <input type="text" name="txtsalario" id="txtsalario"><br>
        </p>
        <p>
            <label for="txtcategoria">Categoria: </label>
            <input type="text" name="txtcategoria" id="txtcategoria"><br>
        </p>
        <p>
            <label for="txtsexo">Sexo: </label>
            <select name="combo_sexo" id="combo_sexo">
                <option value="">-- Selecciona el sexo --</option>
                <option value="m">Masculino</option>
                <option value="f">Femenino</option>
            </select>
        </p>
        <p>
        <p>
            <label for="combo_departamento">Departamento:</label>
            <select name="combo_departamento" id="combo_departamento">
                <option value="0">-- Selecciona un departamento --</option>
                <?php
                foreach ($rows as $row)
                {
                    echo '<option value="'.$row['departamento'].'">'.$row['descripcion'].'</option>';
                }
                ?>
            </select>
        </p>
        <p>
            <input type="submit" name="registrar_empleados" value="Guardar empleados">
        </p>
    </form>
</div>
</body>
</html>