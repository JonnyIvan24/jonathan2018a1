<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Práctica web dinámica de la sesion 4</title>
</head>
<body>
<div style="text-align: center">
    <table width="80%" align="center">
        <tr>
            <th scope="col">Número</th>
            <th scope="col">Cuadrado del número</th>
            <th scope="col">¿Es par o es non?</th>
        </tr>
    <?php
    for ($i = 1; $i <= 100; $i++){
        echo ("<tr>");
        echo ("<td>".$i."</td>");
        echo ("<td>".$i*$i."</td>");
        if ($i%2 == 1){
            echo ("<td>Es Non</td>");
        }else{
            echo ("<td>Es PAR</td>");
        }
        echo ("</tr>");
    }
    ?>
    </table>
</div>
</body>
</html>
