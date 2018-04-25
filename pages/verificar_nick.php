<?php
require_once "conexion_libros.php";
$result;
$resultado = "<b>Nickname disponible</b>";
$resultado2 = "<b>Nickname no disponible</b>";

$nick = $_POST["txt_nick"];

    $sql = "SELECT nickname FROM autor WHERE nickname = '".$nick."'";
    $result = $conn->query($sql);
    $rows = $result->fetchAll();
    $nick = "";
    if (empty($rows) || $rows == null){
        echo ($resultado);
        die();
    }else{
        echo ($resultado2);
    }

$conn = null;
?>