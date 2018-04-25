<?php
/**
 * Created by PhpStorm.
 * User: Jonny
 * Date: 21/04/2018
 * Time: 07:22 PM
 */
require_once "conexion_libros.php";
$result ="";
$id = 1;
if($_FILES["archivo"]["error"]>0){//esta variable es necesaria para guardar algun archivo
    //si hay algun
echo "Error al cargar archivo";
}else{// si no hay error al cargar eel archivo
    $permitidos = array("image/gif"."image/png"."image/jpg");//tipos de archivos
    $limite_kb = 2000;//tamaño del archivo maximo permitido

    /* primero checar que el archivo cumpla con los requisitos en este ejemplo
    comprobamos el tipo y el tamaño */
    if(in_array($_FILES["archivo"]["type"], $permitidos) || $_FILES["archivo"]
        ["size"]<= $limite_kb * 1024){
        //si cumple primero creamos la ruta
        $ruta = '../images/'.$id.'/';
        // y despues lo concatenamos con el nombre
        $archivo = $ruta.$_FILES["archivo"]["name"];
        echo $ruta;

        if(!file_exists($ruta)){//verificamos la ruta
            mkdir($ruta);// asi creamos la carpeta
        }

        // esta validacion es para validar en caso de que ya exita el archivo
        if(!file_exists($archivo)){
            $result = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);
            if($result){
                echo ("Archivo guardado");
            }else{
                echo ("Archivo no guardado");
            }
        }else{
            echo("el archivo ya existe");
        }

    }else{//si no cumple mandamos mensaje
        echo ("Archivo no permitido o accede el tamaño");
    }
}
?>
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
<form action="ver_foto.php" method="post" onclick="">
    <input type="submit" value="Ver foto">
</form>
</body>
</html>
