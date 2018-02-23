<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Variables en PHP</title>
</head>
<body>
<?php
//imprime pantalla
echo ("Hola mundo");

$numero1 = 1;
$numero2 = 5;
//este es el ejercicio de la SUMA***********
$suma = ($numero1 + $numero2);

echo ("<br />");
echo ("<br />");

echo ("El resultado de la suma de: " . $numero1);
echo (" mas " . $numero2 . " es " . $suma);
// aqui termina el ejercicio de la SUMS *********

//Este es el ejercicio de la resta*********
$resta = ($numero2 - $numero1);
echo ("<br />");
echo ("<br />");

echo ($resta);
//aqui termina el ejercicio de la RESTA***********
echo ("<br />");
echo ("<br />");
echo ("el resultado de la multiplicacion es : " . $numero1*$numero2);
echo ("<br />");
echo ("<br />");
echo ("el resultado de la division es : " . $numero1/$numero2);

?>
</body>
</html>