<?php

//days se diferencia de -> d , en que cuando susas days suma meses y años y hace el total,
// sin embargo ->d solo coge los dias (sin sumar meses o años)
// Función para calcular la diferencia en Europa (Madrid)
function europa(){
    date_default_timezone_set("Europe/Madrid"); 
    $today = new DateTime(); 
    $startWars = new DateTime("2025-01-01"); 
    $diferenciaEur = $today->diff($startWars); 
    
    return  $diferenciaEur->days . " días, " . $diferenciaEur->h . " horas, " . $diferenciaEur->i . " minutos, " . $diferenciaEur->s . " segundos\n"; 
}

// Función para calcular la diferencia en América (Nueva York)
function america(){
    date_default_timezone_set("America/New_York"); 
    $today = new DateTime(); 
    $startWars = new DateTime("2025-01-01"); 
    $diferenciaAme = $today->diff($startWars); 
    
    return $diferenciaAme->days . " días, " . $diferenciaAme->h . " horas, " . $diferenciaAme->i . " minutos, " . $diferenciaAme->s . " segundos\n"; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diferencias horarias</title>
</head>
<body>

<table border='1'>
    <h1>Hoy es: <?php echo date('d-m-Y H:i:s'); ?></h1>

    <tr></tr>
    <tr>
        <th>Continentes</th>
        <th>América (Nueva York)</th>
        <th>Europa (Madrid)</th>
    </tr>

    <tr>
        <td>Diferencia</td>
        <td><?php echo america() ?></td>
        <td><?php echo europa() ?></td>
    </tr>
</table>


</body>
</html>
