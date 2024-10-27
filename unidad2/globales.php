<?php


// Ejercicio 5: Detectar y mostrar el navegador del cliente
echo "<h3>Ejercicio 5</h3>";
$nav = $_SERVER["HTTP_USER_AGENT"]; 
echo "El navegador utilizado es ". $nav ."\n"; 

// Ejercicio 6: Mostrar IP del cliente, IP del servidor y el nombre del archivo

echo "<h3>Ejercicio 6</h3>";


// IP del cliente usando $_SERVER['REMOTE_ADDR']
$client_ip = $_SERVER['REMOTE_ADDR'];
// IP del servidor usando $_SERVER['SERVER_ADDR']
$server_ip = $_SERVER['SERVER_ADDR'];
// Nombre del archivo actual usando $_SERVER['PHP_SELF']
$file_name = basename($_SERVER['PHP_SELF']);

echo "IP del cliente: " . $client_ip . "<br>";
echo "IP del servidor: " . $server_ip . "<br>";
echo "Nombre del archivo: " . $file_name;

echo "<hr>";

// Ejercicio 7: Mostrar protocolo, nombre del host y el path de la página
echo "<h3>Ejercicio 7</h3>";
// Obtener la URL completa usando $_SERVER['REQUEST_URI']
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// Protocolo (http o https) usando $_SERVER['REQUEST_SCHEME']
$protocol = $_SERVER['REQUEST_SCHEME'];
// Nombre del host usando $_SERVER['HTTP_HOST']
$host = $_SERVER['HTTP_HOST'];
// Path de la página usando $_SERVER['REQUEST_URI']
$path = $_SERVER['REQUEST_URI'];

echo "Protocolo: " . $protocol . "<br>";
echo "Nombre del host: " . $host . "<br>";
echo "Path: " . $path;

echo "<hr>";

// Ejercicio 8: Mostrar tabla con nombres y salarios
echo "<h3>Ejercicio 8</h3>";

$personas = [["nombre" => "pepe", "salario" => 1300], 
            ["nombre" => "juan", "salario" => 1500],
            ["nombre" => "diana", "salario" => 1200]
]; 

$itemPersonas = count($personas); 


for($i = 0; $i < count($personas); $i++){

    
                echo "<table border='1'>"; 
                echo"<tr>";
       
                    echo"</td>" . $personas[$i]["nombre"] . " "."</td>";
                    echo"</td>" . $personas[$i]["salario"]. " "."</td>";
        
                echo"</tr>";
                echo "</table>"; 
                

}







// Ejercicio 9: Redirigir a otra página web
echo "<h3>Ejercicio 9</h3>";

//header("location: www.google.com"); 
echo "Redirección desactivada por razones de demostración.";

echo "<hr>";

// Ejercicio 10: Contar el número de líneas en el fichero PHP actual
echo "<h3>Ejercicio 10</h3>";
// Almacenamos el nombre del fichero actual
$file = basename(__FILE__);
// Usamos la función file() para leer el archivo línea por línea en un array y contar las líneas
$num_lines = count(file($file));

echo "Número de líneas en este fichero: " . $num_lines;

echo "<hr>";

// Ejercicio 11: Mostrar versión de PHP
echo "<h3>Ejercicio 11</h3>";
// Usamos la función phpversion() para obtener la versión de PHP
echo "Versión de PHP: " . phpversion();

echo "<hr>";

/*
// Ejercicio 12: Mostrar el último error ocurrido
echo "<h3>Ejercicio 12</h3>";
// Forzamos un error dividiendo por cero
@($var = 1 / 0);
// Usamos error_get_last() para obtener el último error
$error = error_get_last();

if ($error) {
    echo "Último error ocurrido: " . $error['message'];
} else {
    echo "No ha ocurrido ningún error.";
}

echo "<hr>";
*/
// Ejercicio 13: Mostrar la URL completa de la página actual
echo "<h3>Ejercicio 13</h3>";
// Ya habíamos calculado la URL completa en el ejercicio 7
echo "URL completa: " . $url;

echo "<hr>";

// Ejercicio 14: Mostrar el propietario del script en ejecución
echo "<h3>Ejercicio 14</h3>";
// Usamos la función get_current_user() para obtener el propietario del script
echo "Propietario del script actual: " . get_current_user();

echo "<hr>";

// Ejercicio 15: Mostrar el directorio raíz del servidor
echo "<h3>Ejercicio 15</h3>";
// Usamos la variable $_SERVER['DOCUMENT_ROOT'] para obtener el directorio raíz del servidor
echo "Directorio raíz del servidor: " . $_SERVER['DOCUMENT_ROOT'];

?>
