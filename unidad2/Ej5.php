<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>NO SE VA A IMPRIMIR NUNCA PORQUE EL HEADER TE VA A REDIRIGIR</h1>
    <?php   
        $ip_cliente = $_SERVER['REMOTE_ADDR']; 
        $ip_servidor = $_SERVER['SERVER_ADDR']; 

        echo "NO SE IMPRIME";
        $url = "https://aulavirtual32.educa.madrid.org/ies.villaverde.madrid/course/view.php?id=418&section=2#tabs-tree-start"; 
        header("location: $url");

        echo "NO SE IMPRIME";
    ?> 
    
</body>
</html>