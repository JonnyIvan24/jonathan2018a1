<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Variables en PHP</title>
</head>
<body>
<?php
$operador1 = 58;
$operador2 = 42;
$suma = ($operador2 + $operador2);
$resta = ($operador1 - $operador2);
$multiplicacion = ($operador1 * $operador2);
$division = ($operador1 / $operador2);
echo ("<h4>La suma de esos dos números es: $suma</h4>");
echo ("<h4>La resta de esos dos números es: $resta</h4>");
echo ("<h4>La multiplicación de esos dos números es: $multiplicacion</h4>");
echo ("<h4>La división de esos dos números es: $division</h4>");
echo ("<br />");
$MiNombre = "Jonathan";
echo ("Mi nombre tiene ". strlen($MiNombre). " caracteres");
echo ("<br />");
echo ("Mi nombre tiene ". str_word_count($MiNombre). " palabras");
echo ("<br />");
echo ("Mi nombre en sentido inverso se escribe así: ". strrev($MiNombre));
echo ("<br />");
echo ("La letra t en mi nombre esta en la posición: ". strpos($MiNombre, "t"));
echo ("<br />");
echo ("La letra t en mi nombre la remplaze por la letra Z entonces mi nombre queda así: ". str_replace("t", "Z", $MiNombre));
echo ("<br />");

date_default_timezone_set('America/Mexico_city');
$fecha = date("d/m/Y");
$hora = date("h:i a");
echo ("<h3>Fecha: ". $fecha. "</h3>");
echo ("<h3>Hora: ". $hora. "</h3>");

?>
</body>
</html>