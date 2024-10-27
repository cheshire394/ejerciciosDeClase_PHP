<?php

/* En particular, aquellos padawans que tienen un número de midiclorianos que, al ser escrito en base 5, 
resulta ser un número con más de un dígito 4 tienen una probabilidad particularmente alta de descarriarse. 

Por ejemplo, un padawan con 24 midiclorianos (en base 10) es propenso al lado oscuro porque, en base 5, ese mismo número es 44, 
que tiene más de un 4. Sin embargo, un aprendiz con 4.444 midiclorianos (de nuevo, en base 10) no lo es porque ese valor es 120.234 en base 5.

Los jedis quieren localizar los padawans propensos al lado oscuro lo antes posible para centrar sus esfuerzos en ellos.  */


function isDarkness($numero){

    $base = 5;
    $is_darkness = false; 
    $contador4 = 0; 
    
    
    $resultado = $numero / $base;  
    $resto = $numero % $base; 
    $numBase5 = $resto; 

    while($resultado >  0){

        //acumulamos los restos para pasar a Base 5.
        $resto = $resultado % $base; 

        $resultado = intdiv($resultado, $base); // Divides para obtener el próximo dígito sin perder precisión (condicion de salida)


        $num_cadena = strval($resto); //tenemos que pasar a cadena porque solo se puede concadenar cadenas
        $numBase5 .= $num_cadena;  //acumalador de todos los restos que se vayan generando...*/
    }

    $numBase5 = strrev($numBase5); //damos la vuelta a los numeros.

    // cuando resultado ya sea 0, entonces tenemos que ver cuantos 4 tienen la cadena $numBase5; 
    for($i = 0; $i < strlen($numBase5); $i++){

            if($numBase5[$i] == "4"){
                $contador4++; 
            } 
 
            if($contador4 >= 2){

                $is_darkness = true; 
                break; // salimos del for para mejorar la eficiencia si ya tenemos al menos 2 cuatros...
            }
            
    }

    echo "El numero introducido $numero es darkness: "; 
    echo $is_darkness ? "SI \n" : " NO \n"; 




}

$numeros = [
  
    27, //NO
    24,//SI
    4, //NO
    234, //SI
    4444,  //NO
]; 


foreach($numeros as $item){
     
    //isDarkness($item); 
} 






function isAmstrong($numero){

    $isAmtrong = false; 
    $potenecias = []; //alamacenara todas las potencias


        //convertimos a str, vamos a usar str_split y NO USAREMOS EXPLODE porque, explode requiere usar un delimitador oblicatoriamente y aqui no tenemos nada 
        //y obiamente no permite esto string vacío -> "".
        //sin embargo , str_split, tiene un uso bastante parecido a substr de sql, le pasas la variable (tipo string siempre, pero
        //bueno esto es igual en explode, ambos solo trabajan con str) y te genera un array con cada letra de la cadena, puedes opcionalmente pasarle un segundo
        //parametro numerico, que indicaria el numero de caracteres que van concadenados => str_split("hola", 2) => ho, la
    $numeroCadena = strval($numero); 
    $arrNumeros = str_split($numeroCadena); //devuelve un array tipo string



    $longitudArray = count($arrNumeros); // solo ejecutamos count una vez, mejorando la eficiencia
    for($i = 0; $i < $longitudArray; $i++){

        $potencia = pow($arrNumeros[$i], 3); //Elevamos al cubo. Pow ya nos va a devolver un integer, aunque arrNumeros fuera una cadena con split
       
        array_push($potenecias, $potencia); //creamos un nuevo array con las potencias.
    }

    //ahora vamos a obtener la suma de las potencias: 
    $suma = array_sum($potenecias); 
    
    if($suma == $numero) $isAmtrong = true; //si el numeto que entro es ingual a la suma de sus potencia al cubo, es un numero amstrong o Narcisita

    $array = [$suma, $isAmtrong]; //devolvemos el resultado de la suma por si fuera 1, que sea true y termine, is cubitoInfinito, para las otras dos posibilidades

    return $array; 
}


function cubiInfinita($numero){

    $isCubitoFinito= false; 

        
        //Segun el ejerccio se puede dar 3 situaciones cuando summamos las potencias de un numero elevadas al cubo(3)

        // situacion 1: que el numero sea 1 y entonces es cubitofinito = true; 
        // situacion 2: que sea un numero AMSTRONG O NARCISISTA => isCubitofinito = false.
        // situacion 3: que no sea ni 1 ni, amstrong, entonces hay que repetir el proceso hasta que nos de una de esas dos situaciones ---> llamada Recursiva al metodo.
       
        //Hemos preparado la funcion Amtrong para que devuelva un array con el resultado de la suma, por si fuera 1 terminar aquí con un true.
        // y también nos va a devolver si el nuemero pasado por su parametro es amstrong. si es amtrong terminamos con false

       
        //y si ese numero, no es amtrong, y tampo la suma es 1, tenemos que hacer una nueva llamada recursiva con el valor de la suma (¡no de numero inicial ojo!)
        //asi hasta que sea amstron o sea 1.

        $array = isAmstrong($numero); 

        $suma = $array[0];  //integer
        $isAmtrong = $array[1]; //booleano

     

        if($suma == 1)$isCubitoFinito= true; 
        elseif($isAmtrong) $isCubitoFinito= false; 
        else $isCubitoFinito= cubiInfinita($suma);   //si no es 1 y tampoco es amstrong, vuelve a comprobar si el resultado de la suma es amstrong con una llamada recursiva, pero esta vez con el resultado de la suma
        

        return $isCubitoFinito;//devolvemos un boolean

    }


    $numeros2= [
        1, 
        10,
        1243,
        513
    ]; 

foreach($numeros2 as $item){
  //  $isCubitoFinito = cubiInfinita($item); 
 //  echo  $isCubitoFinito ? "El numero $item es cubitoInfinito. \n" : "El numero $item NO es cubitoInfinito. \n"; 
}


function modas() {
    // Verificamos que los datos del formulario existen
    if(isset($_POST['vector']) && isset($_POST['N'])){
        echo "<p>Las variables se han recogido correctamente.</p><br>"; 
    }else{
        echo "<p>Las variables NO se han recogido correctamente.</p><br>"; 
        return;
    }

    // Recuperamos los valores del formulario
    $vector = $_POST['vector']; // array de valores
    $longitud = (int)$_POST['N']; // número de elementos (N)

    // Validar si N es mayor que el número de elementos proporcionados
    if(count($vector) < $longitud){
        echo "<p>No has introducido suficientes elementos para el valor de N especificado.</p>";
        return;
    }

    // Asegurarnos de que todos los elementos del array sean enteros
    for($i = 0; $i < count($vector); $i++) {
        $vector[$i] = (int)$vector[$i];
    }

    // Array asociativo para almacenar los números y su frecuencia
    $asociativo = [];

    // Recorremos el array y contamos las ocurrencias de cada número
    for($i = 0; $i < $longitud; $i++) {
        $numActual = $vector[$i];

        // Si el número no está en el array asociativo, inicializar su contador
        if(!array_key_exists($numActual, $asociativo)) {
            $contador = 0;

            // Contar cuántas veces aparece el número en el array
            for($j = 0; $j < $longitud; $j++) {
                if($numActual == $vector[$j]) {
                    $contador++;
                }
            }

            // Guardar el número y su frecuencia en el array asociativo
            $asociativo[$numActual] = $contador;
        }
    }

    // Encontrar el número con la mayor frecuencia (la moda)
    $maxFrecuencia = max($asociativo); // La mayor frecuencia
    $modas = array_keys($asociativo, $maxFrecuencia); // Números con esa frecuencia

    // Mostrar la(s) moda(s)
    echo "<h3>Moda(s):</h3>";
    foreach ($modas as $moda) {
        echo "<p>El número que está de moda es: $moda (aparece $maxFrecuencia veces)</p><br>";
    }

    // Mostrar el array asociativo para visualizar las frecuencias
    echo "<h3>Frecuencias de los elementos:</h3>";
    print_r($asociativo);
}

// Llamada a la función
//modas();

function pentagonicas($palabra){

    $palabra = strtolower($palabra); 
    $caracteres = str_split($palabra); // devolver un array con cada caracter de la palabra

   $existeA = false; 
   $existeE = false; 
   $existeI = false; 
   $existeO = false; 
   $existeU = false; 

    foreach($caracteres as $caracter){ //recorremos el array

     

    switch($caracter){

                    case "a":  $existeA = true; 
                                break;
                    case "e":   $existeE= true; 
                                break;
                    case "i":  $existeI = true; 
                                break;
                    case "o":   $existeO = true;  
                                break;
                    case "u":   $existeU = true; 
                                break;
                    
                
    }
    }

    if($existeA && $existeE && $existeI && $existeO && $existeU){
        $is_pentagonica = true; 
    }else $is_pentagonica = false; 

    return $is_pentagonica; 
    

}

$palabras = [
"albaricoque",//SI
"seculariza",//NO
"peliagudo", //SI
"abracadabra"  //NO

]; 

foreach($palabras as $palabra){

    //$is_pentagonica= pentagonicas($palabra);
    //echo $is_pentagonica ? 'si \n' : "no \n"; 

}


function monedasMayores() {
    if (isset($_POST["formulario1"])) {
        // Recogemos el valor tipos de moneda: 
        $tipos = $_POST['tipos']; // será el length de array
        $precioCoche = $_POST['precioCoche']; 
        // Creamos un nuevo formulario para que el usuario introduzca los valores y su número
        echo "<form method='post'>"; 
        echo '<label for="valores">Escribe sus valores: </label></br>'; 
        for ($i = 0; $i < $tipos; $i++) {
            echo '<input type="number" min="1" max="1000" maxlength="4" name="valores[]" id="valores" value="1"><br>';
        }
        echo '<label for="num_monedas">Escribe el número de monedas de cada valor: </label><br>'; 
        for ($i = 0; $i < $tipos; $i++) {
            echo '<input type="number" max="50" maxlength="2" name="num_monedas[]" id="num_monedas"><br>';
        }
        echo "<input type='hidden' name='precioCoche' value='$precioCoche'>"; 
        echo "<button type='submit' name='formulario2'>Enviar</button>"; 
        echo "</form>";
    }
    
    if (isset($_POST['formulario2'])) {
        // Rescatamos los valores que ha introducido el usuario en los últimos valores: 
        $arr_valores = $_POST['valores']; 
        $arr_num_monedas = $_POST['num_monedas']; 
        $precioCoche = $_POST['precioCoche']; 
        
        // Creamos un array de monedas y sus cantidades
        $monedas = [];
        for ($i = 0; $i < count($arr_valores); $i++) {
            $monedas[] = ['valor' => $arr_valores[$i], 'cantidad' => $arr_num_monedas[$i]];
        }
        
        // Ordenamos las monedas de mayor a menor valor
        usort($monedas, function($a, $b) {
            return $b['valor'] - $a['valor'];
        });

        // Intentamos comprar el coche usando las monedas de mayor valor
        $totalDinero = 0;  
        $monedasUsadas = array_fill(0, count($monedas), 0); // Array para contar las monedas utilizadas

        foreach ($monedas as $index => $moneda) {
            $valor = $moneda['valor'];
            $cantidad = $moneda['cantidad'];
            for ($j = 0; $j < $cantidad; $j++) {
                if ($totalDinero < $precioCoche) {
                    $totalDinero += $valor;
                    $monedasUsadas[$index]++; // Contamos la moneda utilizada
                }
            }
        }

        // Mostramos el resultado
        echo "Total acumulado: $totalDinero<br>"; 
        if ($totalDinero >= $precioCoche) {
            echo "Se puede comprar el coche: SI<br>";
        } else {
            echo "Se puede comprar el coche: NO<br>";
        }

        // Mostramos el array de monedas utilizadas
        echo "Monedas utilizadas: ";
        print_r($monedasUsadas);
    }
}

// Ejemplo de uso
// monedasMayores();

// Ejemplo de uso
// monedasMayores();
 monedasMayores();



?>













