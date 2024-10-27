<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="Ej2_auxiliar.php" method="post">
        <label for="titulo">Tiempo de espera: </label>
        <label for="ninos">Niños:</label>
        <input type="number" name="ninos" require>  <!--No pusiste esto: min=1 max=100-->
        <label for="puesto">Puesto:</label>
        <input type="number" name="puesto" require>
        <input type="submit" name="formulario" value="Enviar">
    </form>

</body>

</html>