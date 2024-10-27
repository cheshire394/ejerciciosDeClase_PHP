<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

/*1. Crea una aplicación web con un formulario en el que se pregunte al usuario su
nombre. A partir de ese momento y hasta que se cierre el navegador, en el resto de
páginas del sitio se le saludará con su nombre:

● index.php contiene el formulario y redirige a bienvenido.php si el usuario ya
se ha identificado

● bienvenido.php crea la cookie, muestra mensaje de bienvenida y contiene
enlaces a las páginas 1-3

● Las páginas 1-3 saludan al usuario y contienen enlaces a las páginas 1-3
2. Modifica el ejercicio anterior para que el sitio web olvide su nombre tras 2 minutos de
inactividad
3. Modifica el ejercicio anterior para incluir un botón en alguna de las páginas para que
el sitio olvide su nombre. */


if(isset($_POST['formulario1'])){

    $nombre = $_POST['nombre']; 

    setcookie('nombre', $nombre, time() + 120); 


    echo "Bienvenido $nombre, (con dolar post) selecciona un enlace <br>"; 

    include_once("enlaces.php"); 



}







/*4. Crearemos una aplicación web que:
● Muestre las cookies recibidas del navegador
● Incorpore un formulario que permita introducir una nueva cookie en el
navegador, indicando su nombre y su valor.
● Las nuevas cookies introducidas en el formulario deberán mostrarse a
continuación en la lista de la misma página, de la manera que se muestra en
la imagen adjunta */


/*5. Ahora le vamos a añadir un par de detalles a la página anterior: deberán poderse
introducir cookies sin valor, solamente con su nombre. En el formulario habrá un
dato más, el tiempo de vida de la cookie que se indicará en segundos. Cuando se
cubra ese campo, la cookie que se envíe deberá ser persistente*/  




/*6. Vamos a continuar con la misma página. En esta ocasión tenemos que crear un
nuevo botón que permita eliminar todas las cookies del navegador del usuario. Al
presionar el botón de borrado, se recargará la página y la lista de cookies deberá
quedar vacía.*/  



/*7. (Autenticación) Vamos a crear una página de login con la posibilidad de crear una
cuenta de usuario. Para ello crea una página inicial que ofrezca la posibilidad de
iniciar sesión o crear una cuenta (pueden ser páginas distintas utilizando la función
header y la variable global $_SERVER). Si se inicia sesión correctamente, se
muestran los datos del usuario (insertados al crear la cuenta). Si no, se vuelve a
pedir usuario y contraseña indefinidamente.*/  



/*8. Sobre el mismo ejercicio anterior, almacena en una cookie el último instante en que
el usuario visitó la página. Si es su primera visita, muestra un mensaje de
bienvenida. En caso contrario, muestra la fecha y hora de su anterior visita.*/










?>

        
</body>
</html>