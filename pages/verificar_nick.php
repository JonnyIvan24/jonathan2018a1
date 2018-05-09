<?php
require_once "conexion_libros.php";
$result;
$resultado = "<b>Nickname disponible</b>";
$resultado2 = "<b>Nickname no disponible</b>";

$nick = $_POST["txt_nick"];

    $sql = "SELECT nickname FROM autor WHERE nickname = '".$nick."'";
    $result = $conn->query($sql);
    $rows = $result->rowCount();
    $nick = "";
    if (empty($rows) || $rows == null || $rows == 0){
        echo ($resultado);
        die();
    }else{
        echo ($resultado2);
    }

$conn = null;
?>