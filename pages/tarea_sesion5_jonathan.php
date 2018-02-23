<!doctype html>
<html>
<head>
    <title>Práctica web dinámica de la sesión 5</title>
</head>
<body>
<div align="center">
    <form action="funciones_usuario.php" method="post" id="frm_datos">
        <h1>Formulario</h1>
        <fieldset style="width: 50%">
            <legend>Captura dde selección de un número entero</legend>
            <span>Selecciona un número: </span>
            <select name="BoxNumbers">
                <option value="">--Selecciona un número</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </select>
            <input type="hidden" name="JonathanPerez" id="JonathanPerez" value="Jonathan Pérez">
            <br>
            <br>
            <input type="submit" value="Grabar Datos">
        </fieldset>
    </form>
</div>
</body>
</html>