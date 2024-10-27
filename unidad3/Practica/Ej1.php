<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- Llamamos al la funcion que está en un script auxiliar -->
    <form action="Ej1_auxiliar.php" method="post">
        <label for="titulo">Hexágono: </label>
        <label for="numero">N:</label>
        <input type="number" name="numero" min="1" require>
        <label for="caracter">C:</label>
        <input type="text" name="caracter" require>
        <input type="submit" name="formulario" value="Enviar">
    </form>

</body>

</html>