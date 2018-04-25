<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Subir una imagen</h2>
<form enctype="multipart/form-data" action="guardar_foto.php" method="POST" class="form-horizontal">
    <div class="form-group">
        <label for="archivo">Archivo: </label>
        <input name="archivo" type="file" id="archivo" accept="image/*">
    </div><br>
    <input type="submit" value="Guardar Imagen">
</form>
</body>
</html>