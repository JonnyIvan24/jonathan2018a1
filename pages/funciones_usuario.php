<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Práctica web dinámica de la sesión 5</title>
</head>
<body>
<div style="text-align: center">
    <?php
    $numero = $_POST["BoxNumbers"];
    $minombre = $_POST["JonathanPerez"];
    if ($numero >=1){
        CrearTabla($numero);
    }else{
        echo ("<script language='JavaScript'>alert('Por favor selecciona un número');</script>");
    }
    echo ('<h3>Este "reto" de PHP lo programo '.$minombre.'</h3>');
    function CrearTabla($numero){
        echo ("<table width='50%' align='center'>");
        for ($i = 1 ; $i <= $numero ; $i++){
            echo ("<tr>");
            echo ("<td>".$numero."</td>");
            echo ("<td>".$numero."</td>");
            echo ("<td>".$numero."</td>");
            echo ("</tr>");
        }
        echo ("</table>");
        echo ("<br>");
        echo ("<br>");
    }
    ?>
</div>
</body>
</html>