<?php
require_once "conexion_libros.php";
$id = (int)$_GET['id'];
$sql = "SELECT * FROM autor WHERE id_autor=".$id;
//Ejecutamos la sentencia INSERT de SQL apartir de la conexion PDO
$autores = $conn->query($sql);
foreach ($autores as $autor){}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alta de autores</title>
    <script type="text/javascript">
        function validar_autor() {
            var nick = document.getElementById('txt_nick').value;
            var nombres = document.getElementById('txtnombres').value;
            var apellidop = document.getElementById('txtapellidop').value;
            var apellidom = document.getElementById('txtapellidom').value;
            var direccion = document.getElementById('txtdireccion').value;
            var pais = document.getElementById('txtpais').value;

            if(nick == null || nick.length == 0 || /^\s+$/.test(nick)){
                alert("Favor de escribir el nickname del autor");
                document.getElementById('txt_nick').focus();
                return false;
            }else if (nombres == null || nombres.length == 0 || /^\s+$/.test(nombres)){
                alert("Favor de escribir el nombre del autor");
                document.getElementById('txtnombres').focus();
                return false;
            }else if(apellidop == null || apellidop.length == 0 || /^\s+$/.test(apellidop)){
                alert("Favor de escribir el apellido paterno del autor");
                document.getElementById('txtapellidop').focus();
                return false;
            }else if(apellidom == null || apellidom.length == 0 || /^\s+$/.test(apellidom)) {
                alert("Favor de escribir el apellido materno del autor");
                document.getElementById('txtapellidom').focus();
                return false;
            }else if (direccion == null || direccion.length == 0 || /^\s+$/.test(direccion)){
                alert("Favorde escribir la direccion");
                document.getElementById('txtdireccion').focus();
                return false;
            }else if (pais == null || pais.length == 0 || /^\s+$/.test(pais)){
                alert("Favor de escribir el pais");
                document.getElementById('txtpais').focus();
                return false;
            }else {
                return true;
            }
        }
    </script>
</head>
<body>
<div align="center">
    <fieldset style="text-align: left; width: 80%">
        <legend>Formulario para dar de alta a autores...</legend>
        <form action="actualizar_autor.php?id=<?php echo $autor['id_autor'];?>" method="post" id="form_autor" onsubmit="return validar_autor();">
            <label for="txt_id">Nickname del autor: </label>
            <input type="text" name="txt_id" id="txt_id" value="<?php echo $autor['id_autor'];?>" disabled>
            <label for="txt_nick">Nickname del autor: </label>
            <input type="text" name="txt_nick" id="txt_nick" value="<?php echo $autor['nickname'];?>" disabled><br><br>
            <label for="txtnombres">Nombre del autor: </label>
            <input type="text" name="txtnombres" id="txtnombres" value="<?php echo $autor['nombre'];?>"><br><br>
            <label for="txtapellidos">Apellido paterno del autor: </label>
            <input type="text" name="txtapellidop" id="txtapellidop" value="<?php echo $autor['paterno'];?>"><br><br>
            <label for="txtapellidom">Apellido materno del autor: </label>
            <input type="text" name="txtapellidom" id="txtapellidom" value="<?php echo $autor['materno'];?>"><br><br>
            <label for="txtdireccion">Direccion completa del autor: </label>
            <input type="text" name="txtdireccion" id="txtdireccion" value="<?php echo $autor['direccion'];?>"><br><br>
            <label for="txtpais">País: </label>
            <input type="text" name="txtpais" id="txtpais" value="<?php echo $autor['pais'];?>"><br><br>
            <input type="submit" value="Actualizar datos" name="grabar_autor">
        </form>
    </fieldset>
</div>
</body>
</html