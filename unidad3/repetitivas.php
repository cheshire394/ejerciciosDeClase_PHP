<?php

// 9. Escribir los 100 primeros números.
// Este ejercicio implica usar una estructura de repetición (como for o while) que recorra del 1 al 100 y muestre cada número en cada iteración.

// 10. Escribir los 100 primeros números múltiplos de 3.
// Se puede usar una estructura repetitiva que, dentro del bucle, incremente de 3 en 3 para obtener los múltiplos de 3, o bien filtrar números que sean divisibles por 3.

function multiplos3(){

    for($i = 1; $i <= 100; $i++){
        if($i % 3 === 0) echo $i. " es multiplo de 3 \n"; 
    }

}
//multiplos3(); 

// 11. Escribir los 100 primeros números al revés.
// Este ejercicio implica recorrer una secuencia del 100 al 1, usando un bucle decreciente, para mostrar los números en orden inverso.

// 12. Cálculo de la media de 10 números aleatorios (resultado con 2 dígitos decimales).
//PREGUNTAR COMO GENERAR NUMEROS FLOOR ALEATORIOS
function promedios(){
    $suma = 0; 
    $promedio = 0; 

    //creamos 10 numetos aleatorios. 
   for($i =0 ; $i < 10; $i++){

        $num = rand(1,100); //redondear a dos decimales, un numerpo float 
        $suma += $num; 
   }
   $promedio = $suma / 10;
   $promedio = number_format($promedio, 2);  //muestra la nota promedio con dos decimales

   echo "LA NOTA PROMEDIO ES: ". $promedio;

}
//promedios(); 

// 13. Cálculo de la suma de los pares y producto de los impares de 20 números aleatorios.

function operaciones(){

    $suma=0; 
    $producto = 1; 

    for($i = 0; $i < 20; $i++){

        $num = mt_rand(1,10); 

        if($num % 2 === 0) $suma+=$num; 
        else $producto*=$num; 

    }

    echo "El total de los números pares es ".$suma. "\n"; 
    echo "El producto de los números impares es ".$producto. "\n"; 



}
//operaciones(); 



// 14. Escribir las 10 primeras potencias de 2. Sin utilizar la función pow.
// Utilizar un bucle en el que se multiplique el número 2 por sí mismo de forma iterativa para obtener las primeras 10 potencias de 2.

function potencias(){

echo "La potencia usando pow: \n";    
for($i = 1; $i <= 10; $i++){

    $potenciaPow = pow(2,$i); 
    echo "2^$i = ".$potenciaPow."\n"; 
}
   
   

    echo "La potencia sin pow: \n"; 
    for($i = 1; $i <= 10; $i++){
        $potencia = 1; // Inicializamos la potencia en 1
        for($j = 1; $j <= $i; $j++) {
            $potencia *= 2; // Multiplicamos por 2, i veces
        }
        echo "2^$i = ".$potencia."\n"; 
    }
}
//potencias(); 

// 15. Mostrar la tabla de multiplicar de un número almacenado en una variable.

function tablaMultiplicar(){
    $num = 5; 

    for($i = 1; $i <= 10; $i++){
        echo $num . " * ". $i."= ". $num*$i."\n"; 
    }
}
//tablaMultiplicar(); 



// 16. Mostrar los números pares anteriores a un número.

function pares($num){

    if(is_numeric($num)) {

        echo "Numeros pares anteriores a ".$num . ":\n"; 
        for($i = $num-1; $i >= 1; $i--){
            if($i % 2 === 0) echo $i . " "; 
        }

        echo "\n"; 

    }else{
        echo "Error: se experaba un parametro numerico \n"; 
    }

}
//pares(10); 


// 17. Mostrar los números del 40 al 50.


// 18. Mostrar las letras de la "a" a la "z" [función ord()].
function abecedario(){

    //ord() le pasas por parametro un signo de la tabla ASCII y te devuelve el número que representa
    $Ascii_a = ord('a'); 
    $Ascii_z = ord('z'); 
 
    //Como ASCII esta ordenada lo utilizamos para recorrer...
    for($i = $Ascii_a; $i <= $Ascii_z; $i++){
        echo chr($i). " "; //chr() es una función que funciona a la invera que ord() es decir, le pasas un número de la tabla ASCII y te devuelve su simbolo. 
    }
    echo "\n"; 
}
//abecedario(); 


// 19. Sumar los números positivos hasta un número almacenado en una variable. Por ejemplo, si el número es 3, sumar 1+2+3.

function sumasNumero($num){
$suma = 0;
    if($num > 0) {
        for($i= 1 ; $i <= $num; $i++){
            echo $i. "+"; 

            $suma+= $i; 
        }
    }
    echo "= ". $suma. "\n"; 

}
//sumasNumero(4); 


// 20. Contar el número de veces que se tira un dado hasta que sale un 6.

function dado(){

    $contador=0; 
  do{

    $dado = mt_rand(1,6); 
    $contador++; 
  }while($dado !== 6); //HACER-MIENTRAS!!!!

  echo "EL numero de veces tiradas hasta que ha salido 6 son: ". $contador . "\n"; 

}
//dado(); 


// 21. Muestra por pantalla las tablas de multiplicar de los números del 1 al 10. Una tabla deberá estar separada de la siguiente por una línea en blanco.

function TablasMultiplicaciones(){

    for($i = 1; $i <= 10; $i++){

        for($j = 1; $j <= 10; $j++){

            echo trim($j ." x ". $i . " = ". $j*$i). "   <br>\n"; 
        }

       echo "<br> \n"; 
    }

   
}
//TablasMultiplicaciones(); 


// 22. Muestra por pantalla los índices de una matriz 4x4 de la siguiente forma:


    function matriz() {
        // Inicializar la matriz como un array vacío
        $matriz = [];
    
        // Iterar sobre las filas
        for ($i = 1; $i <= 4; $i++) {
            // Crear un array para almacenar cada fila
            $fila = [];
    
            // Iterar sobre las columnas
            for ($j = 1; $j <= 4; $j++) {
                // Agregar el índice de la posición actual a la fila
                $fila[] = $i.$j; 
            }
    
            // Agregar la fila a la matriz
            array_push($matriz, $fila); 
        }
    
        // Mostrar la matriz de índices
        foreach ($matriz as $fila) {
            echo implode(" ", $fila) . "\n";
        }
    }
    
    // Llamada a la función para mostrar la matriz
    //matriz();
    


   




?>