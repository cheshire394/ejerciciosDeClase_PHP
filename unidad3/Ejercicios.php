<?php
// 1. Realiza un script que indique si una palabra almacenada en una variable es palíndroma o no.
// Pista: función strrev()


function palindromo(){
    $palindroma = "radar"; 
    $noPalindroma= "hola mundo"; 

    if($palindroma == strrev($palindroma)) echo "palindroma \n"; 
    else echo "no palindroma \n"; 
    
}
//palindromo(); 


// 2. Realiza un script que, dados cuatro números aleatorios almacenados en otras tantas variables,
// indique cuál es el mayor y cuál es el menor. Además, el resultado debe mostrar si el número obtenido es par o impar.
// Pista: función rand()

function aleatorios(){

    $numeros=[]; 

    for($i = 0; $i < 4; $i++){

            $num = rand(1,100); 


            if($num % 2 === 0 ) echo $num . " es un numero par \n"; 
            else echo $num . " es un numero impar \n"; 

          
            array_push($numeros, $num); 

            $mayor = max($numeros); 
            $menor = min($numeros);
    }
    echo "El numero mayo es ".$mayor. "\n"; 
    echo "El numero menor es ".$menor. "\n"; 
}
//aleatorios(); 





// 3. Escribe un script que muestre el día de la semana en el que estamos y si forma parte o no del fin de semana.
// Si no es fin de semana, debe mostrar cuántos días faltan para que lo sea.

function fechas(){

    $today = date('N');  // N devuelve el dia de la semana que estamos ejemplo luner = 1; 

    if($today === 6 || $today === 7) echo "Es finde semana :) \n"; 
    else {
        $contadorFinde = 6 - date('N'); 
        echo "No es finde semana y faltan ". $contadorFinde. " dias \n"; 
    }

}
//fechas(); 



 // 4. Crear un script PHP que muestre la fecha actual en castellano, incluyendo el día de la semana.
 // Utiliza variables para almacenar los nombres de los días de la semana y los meses en inglés y en español, 
 // y utiliza condicionales para realizar las traducciones necesarias.

 function Fechastraductor($fecha){

    date_default_timezone_set("Europe/Madrid"); 

   

    $todayMes = date('F', $fecha); //fecha es time(), que es un timestamp
    $todaySemana = date('l', $fecha); 
  


    $diasSemana = ["Sunday" => "Domingo", "Monday" => "Lunes", "Tuesday" => "Martes", "Wednesday" => "Miércoles", 
               "Thursday" => "Jueves", "Friday" => "Viernes", "Saturday" => "Sábado"];
    $meses = ["January" => "Enero", "February" => "Febrero", "March" => "Marzo", "April" => "Abril", 
          "May" => "Mayo", "June" => "Junio", "July" => "Julio", "August" => "Agosto", 
          "September" => "Septiembre", "October" => "Octubre", "November" => "Noviembre", "December" => "Diciembre"];

       
         $mesSpn = $meses[$todayMes]; //devuelve el valor de un array asociativo, metiendo su  [clave]
         $semanaSpn = $diasSemana[$todaySemana]; 

         //echo date("d/$mesSpn/y => $semanaSpn") . "\n";  //error que cometiste es trata de imprimir date asi .
         echo date('d', $fecha) . "/" . $mesSpn ."/". date('y', $fecha). "=>". $semanaSpn ."\n";
         
 }
 //Fechastraductor(time());  //RECUERDA QUE TIME() DEVUELVE TIMESTAMP; 

 
 // 5. Escribe un script PHP para determinar si la página actual se llama desde 'https' o 'http'.
 // Utiliza un operador condicional ternario.
 

 function protocolo(){
   
    $protocolo = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == 'on' ? 'https' : 'http'; 

    return $protocolo; 
 }
//echo protocolo() ."\n"; 

 // 6. Escribe un script PHP que genere un número entero aleatorio del 1 al 10 y diga si es primo o no.

 function primos(){

    $is_primo = true; 

    $num = rand(1, 10); 

    for($i = 2; $i < $num; $i++){

        if($num % $i === 0) {
                $is_primo = false; 
                break; 
        }


    }

    if($is_primo)  echo "El numero ". $num ." es primo \n"; 
    else  echo "El numero ". $num ." No es primo \n";
   

 }
 //primos(); 
 

 

 // 7. Escribe un script PHP que obtenga y muestre la hora en formato hh:mm:ss e indique qué hora será 10 segundos después.
 // EJEMPLO: Hora actual: 11:38:56 ; Hora dentro de 10’’: 11:39:06

 function sumaSegundos(){

    // Configuración de la zona horaria
    date_default_timezone_set("Europe/Madrid");

    // Obtención de la hora, minutos y segundos actuales
    $hora = date('H');
    $min = date('i');
    $seg = date('s'); 

     echo "hota actual: ".$hora.":".$min.":".$seg."\n"; 

    // Sumar 10 segundos
    $seg += 10;
    
    // Ajustar los segundos si superan 60
    if ($seg >= 60) {
        $seg -= 60;
        $min++;
    }

    // Ajustar los minutos si superan 60
    if ($min >= 60) {
        $min -= 60;
        $hora++;
    }

    // Ajustar las horas si superan 24
    if ($hora >= 24) {
        $hora -= 24;
    }

    echo "hota después de 10 segundos: ".$hora.":".$min.":".$seg."\n"; 
  
}
 //sumaSegundos(); 
 
 
 
 
 // 8. Escribe un script PHP que calcule el sueldo que le corresponde al trabajador de una empresa que cobra 40.000 euros anuales.
 // El programa debe realizar los cálculos en función de los siguientes criterios:
 // a. Si lleva más de 10 años en la empresa se le aplica un aumento del 10%.
 // b. Si lleva menos de 10 años pero más que 5 se le aplica un aumento del 7%.
 // c. Si lleva menos de 5 años pero más que 3 se le aplica un aumento del 5%.
 // d. Si lleva menos de 3 años se le aplica un aumento del 3%.
 // NOTA: debes utilizar obligatoriamente el operador += o *=.

 function aumentoSueldo($fecha_alta){

    $sueldo_base = 40000; // Valor sin punto decimal para evitar confusión
    $sueldo_aumentado = 0.0; 

    //convertimos a fecha objetos para poder comparar los años
    $today = new DateTime(); //fecha de hoy
    $fecha_alta = new DateTime($fecha_alta);  

    //sacamos la diferencia de años
    $dif = $today->diff($fecha_alta); 
    $antiguedad = $dif->y; //sacamos los años entre fechas. 

    echo $antiguedad . " años de antigüedad calculados \n"; 

    //NOTA* -> NO UTILICES SWITCH PARA CONDICIONES COMPLEJAS PORQUE FALLA...
    /**En PHP, los case no permiten evaluar expresiones complejas (como antiguedad > 10) 
     * dentro de los casos. Los valores de case se comparan directamente contra la variable proporcionada
     * en este caso, $antiguedad. 
     * Esto está causando que ninguno de los casos sea ejecutado como esperas, ya que las comparaciones no son válidas dentro del switch. */
    // Reemplazamos switch por if-else


    if ($antiguedad > 10) { 
        $sueldo_aumentado = $sueldo_base + ($sueldo_base * (10 / 100)); 
    } elseif ($antiguedad <= 10 && $antiguedad > 5) { 
        $sueldo_aumentado = $sueldo_base + ($sueldo_base * (7 / 100)); 
    } elseif ($antiguedad <= 5 && $antiguedad > 3) { 
        $sueldo_aumentado = $sueldo_base + ($sueldo_base * (5 / 100)); 
    } else { 
        $sueldo_aumentado = $sueldo_base + ($sueldo_base * (3 / 100)); 
    }

    return $sueldo_aumentado; 
}

$fecha_alta = "2020-06-10"; 
//echo aumentoSueldo($fecha_alta) . " sueldo aumentado \n";






 ?>