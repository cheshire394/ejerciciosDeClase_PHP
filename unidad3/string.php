<?php

/** 48. Escribe una función que reciba una cadena y la devuelva del revés. */

function revierte() {


    $cadena = "Hola mundo"; 
    $longitud = strlen($cadena); 

    // Con funciones predefinidas
    $revertida = strrev($cadena); 
    echo "Usando strrev: " . $revertida . "\n"; 

    $vacio__revierte = "";

    // Manualmente

    //cuando recorrar un string, recuerda que es como los arrays, la logitud son 4 caracteres, per el primero es 0, por
    //lo tanyo cuando empiezas desde atras, tanto en string como en array, siempre -1
    for($i = $longitud - 1; $i >= 0; $i--) { // Corrección aquí
        $caracter = substr($cadena, $i, 1); // Obtiene el carácter actual
        $vacio__revierte .= $caracter; // Concatenar el carácter
    }
    
    echo "\nRevertida con substr: " . $vacio__revierte . "\n"; // Imprime la cadena revertida


    $vacio__revierte =""; 

    for($i = $longitud -1; $i >= 0; $i--){

            $char = $cadena[$i]; 
            $vacio__revierte .= $char; 

    }

    echo "\nRevertida manualmente : " . $vacio__revierte . "\n"; // Imprime la cadena revertida



}
//revierte(); 


/** 49. Ayudándote de la función anterior, escribe un formulario que pida una palabra o número y te diga si es o no un palíndromo o un número capicúa. */
/** 50. Modifícalo para que no tenga en cuenta mayúsculas y minúsculas. */

function palindromo(){

   // $cadena = $_GET['cadena']; 
    $cadena = "radar"; 
    $cadena = strtoupper($cadena); 

    if(isset($cadena)){
        
        $isPalindromo = false; 
        $cadenaRevertida = ""; 
        $longitud = strlen($cadena); 

        for($i = $longitud-1; $i >= 0; $i--){

            $char = $cadena[$i]; 
            $cadenaRevertida .= $char; 

        }

     if($cadena == $cadenaRevertida) $isPalindromo = true; 

     echo $isPalindromo ? '<p> es palindromo </p><br>' : ' <p>No es palindromo <p><br>'; 

    }else{

        echo "No se ha introducido ninguna cadena...<br>"; 
    }
}

//palindromo(); 



/** 51. Realiza un programa en PHP que dado un texto, cuente qué cantidad hay de cada vocal en dicho texto y lo muestre por pantalla. */
/** 52. Modifica el programa anterior para que tenga una función que reciba una cadena y devuelva un array asociativo con el número de veces que aparece cada vocal. */
function cuentaVocales(){

    //$texto = $_GET['texto']; 

    $texto = $_GET['texto']; 

    if(!isset($_GET['texto'])){
        echo "No se ha introducido ningun valor desde el formulario"; 
    } 

    $texto = strtolower($texto); 
    $longitud= strlen($texto); 
    $arrayAsociativo= []; 

    //contadores
    $contadorA = 0; 
    $contadorE = 0; 
    $contadorI = 0; 
    $contadorO = 0; 
    $contadorU = 0; 
    $contadorConsonantes=0;

    for($i = 0; $i < $longitud; $i++){

        $char = $texto[$i]; 

       


    switch($char){

        case  "a":  
            $contadorA++; 
            $arrayAsociativo["A"] = $contadorA; 
            
            break; 
        case ("e"): 
            $contadorE++; 
            $arrayAsociativo["E"] = $contadorE;
            break; 
        case ("i"):
            $contadorI++; 
            $arrayAsociativo["I"] = $contadorI;
            break; 
        case ("o"):
            $contadorO++; 
            $arrayAsociativo["O"] = $contadorO;
            break; 
        case ("u"):
            $contadorU++; 
            $arrayAsociativo["U"] = $contadorU;
            break; 
        default:
            $contadorConsonantes++;
            $arrayAsociativo["consonantes"] = $contadorConsonantes; 
            break; 

}
    }

    print_r($arrayAsociativo); 




}
//cuentaVocales(); 





/** 53. Crea un programa en PHP que reciba, mediante un formulario, un texto y devuelva solo la primera frase (hasta que encuentra un punto o llega al final, lo que suceda primero). */

function firstPhrase(){

   
    if(isset($_GET['texto'])){

        $texto = $_GET['texto']; 

        $linea = preg_split("/[.\n]/",$texto); 

        echo "<p> La primera linea introducida es: </p><br>"; 
        echo $linea[0]; 
    }else{
        echo "<p> No se ha introducido ningún texto</p> <br>"; 
    }


}
//firstPhrase(); 


/** 54. Crea un programa que sustituya cada ocurrencia de la subcadena "ko" y la reemplace por "no". */
/** 55. Modifica el ejercicio anterior para que reciba de un formulario el texto en el que se debe realizar
 * la sustitución, la cadena a buscar y la cadena por la que sustituirla. */
function replace(){

    $ocurrencia = "ko"; 
    $replace= "no"; 

    

    if(isset($_GET['texto'])){
        $cadenaOrg = $_GET['texto']; 
        $cadenaReplace = str_replace($ocurrencia, $replace, $cadenaOrg); 
        echo "$cadenaReplace \n";
    }else{
        echo "<p> No se ha introducido ningún texto</p> <br>"; 
    }
   
}
//replace(); 



/** 56. Implementa una aplicación web que reciba dos cadenas y devuelva el número de letras finales que coinciden entre ellas. Por ejemplo: si recibe madre y padre devuelve 4. */

function equals(){

    $cadena1 = "madre"; 
    $longitud = strlen($cadena1); 
    $cadena2 = "padre"; 
    $longitud2 = strlen($cadena2); 

    $coincidentes = ""; 

    $contador=0; 

    for($i = $longitud-1;  $i >= 0; $i--){

            $charCadena1 = $cadena1[$i]; //caracter actual de la cadena 1
            $charCadena2 = $cadena2[$i]; //caracter actual de la cadena 2

            if($charCadena1 === $charCadena2) $coincidentes .= $charCadena1; // si son iguales lo almaenamos

            if($charCadena1 === $charCadena2)$contador++; 
            else{
                break; 
            }
    }
    $coincidentes= strrev($coincidentes); 
    echo "El numero de caracteres iguales es: ". $contador . " y lo caracteres coincidentes son  $coincidentes"."\n"; 
}
//equals(); 




/** 57. Crea una función que reciba el número de DNI y devuelva la letra. Utiliza cadenas. La cadena con las posibles letras ordenadas es "TRWAGMYFPDXBNJZSQVHLCKE". */

/*Para saber cuál es la letra de tu DNI debes dividir el número de tu documento de identidad entre 23. 
Al ser un número primo esa división te da un resto y, a cada uno, se le asocia una letra. 
A cada resto le corresponde la siguiente letra en el DNI: El resto es 0: la letra es T. */


function letterDni(){

    $dni = "50489319";
    $longitud = strlen($dni); 

    if($longitud === 8){

        $resto = $dni % 23; 

        $asociativo = [
            "T" => 0, 
            "R" => 1,
            "W" => 2,
            "A" => 3,
            "G" => 4,
            "M" => 5,
            "Y" => 6,
            "F" => 7,
            "P" => 8,
            "D" => 9,
            "X" => 10,
            "B" => 11,
            "N" => 12,
            "J" => 13,
            "Z" => 14,
            "S" => 15,
            "Q" => 16,
            "V" => 17,
            "H" => 18,
            "L" => 19,
            "C" => 20,
            "K" => 21,
            "E" => 22,
        ];

        $key = array_search($resto, $asociativo); 

        echo "La letra del dni $dni es : $key \n"; 


    }
}
//letterDni();




?>