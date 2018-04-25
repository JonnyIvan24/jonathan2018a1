<?php
/**
 * Created by PhpStorm.
 * User: Jonny
 * Date: 21/04/2018
 * Time: 08:19 PM
 */
$id = 1;
$path = "../images/".$id;
if(file_exists($path)){//checamos que exista la carpeta o directorio
    $directorio = opendir($path);//si existe abrimos el directorio
    while ($archivo = readdir($directorio)){// listamos lo que contenga
        if(!is_dir($archivo)){// omitimos si son directorios
            //nombre de la imagen con su ruta
            echo ("<div data='".$path."/".$archivo."'>
            <a href='".$path."/".$archivo."' 
            title='Ver archivo adjunto'>".$archivo."
            <span class='glyphicon glyphicon-picture'>
            </span></a>");
            //link para eliminar la imagen
            echo ("$archivo <a href='borrar_foto.php?archivo=".$archivo."' class='delete'
            title='Ver archivo adjunto' ><span 
            class='glyphicon glyphicon-trash' aria-hidden='true'>
            a</span></a></div> ");
            echo ("<img src='../images/$id/$archivo' width='400'> ");//mostramos la imagen
        }
    }

}else{
    echo "no se encuentra el directorio";
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
</body>
</html>
