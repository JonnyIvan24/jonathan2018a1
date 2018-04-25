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
    <script type="text/javascript" lenguage="javascript">
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
        var objeto_AJAX = crear_objeto_XMLHttpRequest();
        function verificar_nickname() {
            var URL = "verificar_nick.php";
            objeto_AJAX.open("POST", URL, true);
            objeto_AJAX.onreadystatechange = muestraResultado;
            objeto_AJAX.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            objeto_AJAX.send("nickname="document.getElementById("txt_nick").value);
        }
        function muestraResultado(){
            if (objeto_AJAX.readyState == 4 && objeto_AJAX.status == 200) //200 con este numero significa que todo salio bien
            {
                document.getElementById("alerta").innerHTML = objeto_AJAX.responseText;
            }
        }
    </script>
</head>
<body>
<div align="center">
    <fieldset style="text-align: left; width: 80%">
        <legend>Formulario para dar de alta a autores...</legend>
        <form action="#" method="post" id="form_autor" onsubmit="return validar_autor();">
            <label for="txt_nick">Nickname del autor: </label>
            <input type="text" name="txt_nick" id="txt_nick" onkeyup="javascript:verificar_nickname();">
            <a id="alerta"></a><br><br>
            <label for="txtnombres">Nombre del autor: </label>
            <input type="text" name="txtnombres" id="txtnombres"><br><br>
            <label for="txtapellidos">Apellido paterno del autor: </label>
            <input type="text" name="txtapellidop" id="txtapellidop"><br><br>
            <label for="txtapellidom">Apellido materno del autor: </label>
            <input type="text" name="txtapellidom" id="txtapellidom"><br><br>
            <label for="txtdireccion">Direccion completa del autor: </label>
            <input type="text" name="txtdireccion" id="txtdireccion"><br><br>
            <label for="txtpais">País: </label>
            <input type="text" name="txtpais" id="txtpais"><br><br>
            <input type="submit" value="Grabar datos" name="grabar_autor">
            <input type="reset" value="Limpiar campos" name="limpiar"><br>
        </form>
    </fieldset>
</div>
</body>
</html>