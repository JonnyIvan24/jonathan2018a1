<?php
$servername = "localhost";
$username = "id2579345_alumnovalles";
$password = "hola123";
$database = "id2579345_tarea";
try{
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo ("<div align='center'><h1>Si se conecto</h1></div>");
}catch (PDOException $e){
    echo ("<div align='center'><h1>No se pudo conectar: </h1></div>" . $e->getMessage());
}
?>