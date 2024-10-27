<?php


/*Ejercicios básicos variables y operadores:
1. Escribe un programa PHP para intercambiar dos variables. Se debe mostrar su valor
antes y después del intercambio.
2. Escribe un script PHP en el que vayas cambiando el valor de una variable $temp
para que vaya cambiando de tipo. Después de cada cambio muestra su valor y su
tipo de datos en cada momento.
3. Escribe un script PHP que devuelva como resultado una página web con el siguiente
contenido:
Mañana aprenderé las variables globales de PHP.
Este es un comando incorrecto: del c:\*.*
Ampliación: busca la forma de que se muestren también con el mismo formato
(negrita y cursiva).
Ampliación II: busca qué es la sintaxis heredoc y cómo se utiliza. Pruébala en un
script.
4. Analiza el código del script PHP ambito_variables.php y trata de comprender lo
que se visualiza en cada parte del script. Compara el script con el resultado que ves
en la salida en el navegador*/


//1. 

function intercambio(){

    $var1 = 1; 
    $var2 = 2; 
    $aux = 0; 

    echo "Valores iniciales: " . "primer valor: ".$var1 . " segundo valor: ". $var2. "/n"; 

    $aux = $var1; 
    $var1 = $var2; 
    $var2 = $var1; 

    echo "Valores intercambiados: " . "primer valor: ". $var1 . " segundo valor: ". $var2. "/n"; 

}
//intercambio(); 


/*2. Escribe un script PHP en el que vayas cambiando el valor de una variable $temp
para que vaya cambiando de tipo. Después de cada cambio muestra su valor y su
tipo de datos en cada momento.*/


function tipos(){

$temp = 1; 
echo $temp . " es de tipo ". gettype($temp). "\n "; 
$temp = 1.0; 
echo $temp . " es de tipo ". gettype($temp). "\n "; 
$temp= "a"; 
echo $temp . " es de tipo ". gettype($temp). "\n "; 
$temp = "cadena"; 
echo $temp . " es de tipo ". gettype($temp). "\n "; 
$temp = true; 
echo $temp . " es de tipo ". gettype($temp). "\n "; 
$temp = "true"; 
echo $temp . " es de tipo ". gettype($temp). "\n "; 
}
//tipos(); 

/*3. Escribe un script PHP que devuelva como resultado una página web con el siguiente
contenido:
Mañana aprenderé las variables globales de PHP.
Este es un comando incorrecto: del c:\*.*
Ampliación: busca la forma de que se muestren también con el mismo formato
(negrita y cursiva).
Ampliación II: busca qué es la sintaxis heredoc y cómo se utiliza. Pruébala en un
script.*/ 

function formatoTexto(){

    echo "<p>Mañana aprenderé las <b><i>variables globales de PHP</i></b></p>"; 

}
formatoTexto(); 



/**4. Analiza el código del script PHP ambito_variables.php y trata de comprender lo
que se visualiza en cada parte del script. Compara el script con el resultado que ves
en la salida en el navegador*/ 


?>