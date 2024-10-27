<?php

//Ejercicios de funciones
//23. Anteriormente hiciste un ejercicio que mostraba la fecha actual en castellano. Con el
//mismo objetivo (puedes utilizar el código ya hecho), crea una función que devuelva

include_once("Ejercicios.php");
$today = time(); // recuerda que es un timeStamp; 
//Fechastraductor($today); 


//24. Escribe una función PHP que reciba un año y devuelva si es bisiesto. La regla dice
//que es año bisiesto cuando es divisible por cuatro (como 2016) y no lo es por 100, a
//no ser que lo sea también por 400.

function bisiesto($anio){

    $is_bisiesto = false; 

    

    if(($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0)) {

        $is_bisiesto = true; 
    }

 // echo   $is_bisiesto ? "$anio es bisiesto" : "$anio No es bisiesto"; 

return $is_bisiesto; 


}
//echo bisiesto(2016). "\n"; 
//echo bisiesto(2017). "\n"; 




//25. Utiliza la función anterior para escribir una función equivalente a checkdate. Es decir,
//que reciba un dia, mes y año y diga si es una fecha válida.


function checkFecha(){

    $fecha = $_GET['fecha']; 

    echo "Fecha tal y como se recoge en el formulario : $fecha <br>\n";

    if(empty($fecha)){
        throw new Exception("No se ha introducido ninguna fecha en el formulario <br>\n"); 
    }

    //paso 1 dividimos la fecha en segmentos para validar uno a uno.....no vamos a utilizar explode por que el usuario puede utilizar el separador 
    //que quiera para separar la fecha, no nosotros quetemos contemplar todas las posibilidades
    //$arrayDate = explode("-", $fecha); 
    $arrayDate = preg_split("/[\/\-]/", $fecha);  

    $dia = $arrayDate[0]; 
    $mes = $arrayDate[1]; 
    $anio = $arrayDate[2]; 

    //comprobamos que años sea correctos.
    if($anio >= 0001 && $anio <= 9999) $anio_valido = true; 
    else {
        echo "El año introducido es anterior a.c. o superior a 9999 <br>\n"; 
        $anio_valido = false; 
    }

    //comprobamos que el mes sea correcto. 
    if($mes >= 01 && $mes <= 12) $mes_valido = true; 
    else{
        echo "El mes introducido es inferior a 01 o superior a 12 <br>\n"; 
        $mes_valido = false;
    } 

    //comprobamos que dias sea correctos
    if($dia >= 01 && $dia <= 28)$dia_valido = true; 
    elseif($dia >= 29 && $dia <= 31){

        echo "Hemos entrado entre 29 y 31 dias <br>\n"; 
        
     
            //comprobar los dias que tienen. //OJO MUCHO CUIDADO COMO USAS DATE PORQUE PARA QUE TE CALCULE BIEN EL ULTIMO DIA DEL MES TIENES QUE PONERLO A DIA 01
            $timeStamp = strtotime("$anio-$mes-01"); //strtotime espera recibir por parametro el formato americano yyyy-mm-dd; 
            $ultimo_dia_mes = date('t', $timeStamp); // puede ser... 29, 30 o 31..pero nunca dará 28 por no tiene en cuenta los bisiestos ... lo tenemos que hacer nosotros.


            //comprobacion adicionar para febrero...por los bisiestos
            if($mes == 02){
               
                $is_bisiesto = bisiesto($anio); 
                $ultimo_dia_mes = $is_bisiesto ? 29 : 28; 
                // cuidado con hacer esto, que no te modifica el valor de ultimo dia del mes ya que no estas guardado el valor en ninguna variable
                //$is_bisiesto ? $ultimo_dia_mes - 1 : $ultimo_dia_mes;
            }

            if($dia > $ultimo_dia_mes){
                $dia_valido=false; 
               
                if($mes == 02)  echo " EL mes  de febrero  tiene ".$ultimo_dia_mes." dias en el año $anio <br>"; 
                else echo " EL mes $mes  tiene ".$ultimo_dia_mes." <br>"; 

            }
            else  $dia_valido=true;

        
        

    }
    else{
        $dia_valido = false; 
        echo "el dia introducido es mayor a 31 dias  o menor a 01<br>\n"; 
    } 

    if($dia_valido && $mes_valido && $anio_valido) $fecha_valida = true; 
    else $fecha_valida = false; 

    echo $fecha_valida ? "La fecha se ha validado correctamente <br>\n" : "La fecha introducida no es válida <br>\n"; 
        


}

$fecha = "31-04-2016"; 
//checkFecha($fecha); 



function checkFechas2($fecha) {

    // Desglosamos la fecha en día, mes y año
    $fechaArr = explode('-', $fecha);
    
    // Verificamos si la fecha tiene el formato correcto
    if (count($fechaArr) != 3) {
        echo "Formato de fecha incorrecto \n";
        return false;
    }
    
    // Extraemos día, mes y año
    $dia = (int)$fechaArr[0];
    $mes = (int)$fechaArr[1];
    $anio = (int)$fechaArr[2];
    
    // Validamos que el año esté en un rango adecuado
    if ($anio <= 0 || $anio > 9999) {
        echo "El año no puede ser negativo o superior a 9999 \n";
        return false;
    }
    
    // Usamos checkdate para validar la fecha
    if (checkdate($mes, $dia, $anio)) {
        echo "Fecha válida \n";
        return true;
    } else {
        echo "Fecha no válida \n";
        return false;
    }
}

$fecha = "29-02-2016"; // Año bisiesto, debe ser válido
//checkFechas2($fecha);

$fecha = "31-04-2023"; // Abril no tiene 31 días, debe ser inválido
//checkFechas2($fecha);



////28. Ampliación: Escribe una función que devuelva la suma de los dígitos de un número.
//Nota: utilizar las funciones strlen y acceso a los elementos del número $num[$i]

function sumaDigitos(){

    $numeroLe = "123"; 
    $numero2 = 123; 
    $suma = 0; 


    //observamso que leg devuelve la logitud tanto de cadenas, como de integers
    // $leng =  strlen($numero); //3
    //$leng2 =  strlen($numero2); //3



    for($i=0; $i <=  strlen($numeroLe); $i++){

        $num = (int)$numeroLe[$i]; //tenemos que hacer la conversion para que no de error -->  $leng =  strlen($numero); //3
        $suma += $num; 

    }
    echo "La suma de los digitos es: ".$suma. "\n"; 

    //reseteamos para ver el funcionamiento con numeros
    $suma = 0; 
    $num = 0; 

    for($i=0; $i <=  strlen($numero2); $i++){

        $num = $numero2[$i]; //PHP Warning:  Trying to access array offset 
        $suma += $num; 

    }
    echo "La suma de los digitos es: ".$suma. "\n"; 

    //El error al tratar de acceder a numeros puros o integer, se produce porque el sistema  $numero2[$i] , no permite acceso a cada numero del numeros como con las cadenas
    //para ello simpre tendras que hacer una conversion


}
//sumaDigitos();

//27. Escribe una función que replique el operador resto (%).

function euclides($a, $b){

 if(!$a > 0 || !$b > 0) throw new Exception("los numeros introducidos por parametro deben de ser positivos"); 

 //tenemos que hayar el MCD entre dos numeros...
 $MCD = 0; 

 if($b === 0) $MCD = $a; // si b es 0, el MCD ES IGUAL A $a.
 else{

    //si no es el caso...tenemos que hayar el modulo de a y b., y mientras que no sea 0,   "El resto actual pasa a ser el divisor, y el valor de $b se convierte en el dividendo."...
    //pero recuerda que hay que seguir hayando el resto, es decir el modulo
    // y del numero A ya nos podemos olvidar que no nos va a volver a hacer falta más...salvo la primera vez

    $resto = $a % $b; 

    while($resto !== 0){

        $ultimoDivisor = $resto; // como resto va a cambiar su valor guardamos su ultimo valor antes, por si esta fuera la ultima vez que se ejecuta.
        $resto = $b % $resto; 

    }

    //si el resto es 0 sale del bucle y  --> MCD es el ultimo divisor.
    $MCD = $ultimoDivisor; 

 }

    
 echo "El MCD de $a y $b es: $MCD"; 

}
try{
    euclides(48, 18); 
}catch(Exception $e){
   echo  $e->getMessage(); 
}

//29. Escribe una función que compruebe si un número dado es un número Armstrong.
//Introducir el número mediante un formulario y comprobar que es positivo.
//Nota: un número N es Armstrong si tiene x dígitos y la suma de cada dígito elevado
//a x es igual a N.

function amstrong(){

    $num = 123; 
    $potencia = 0; 
    $amtrong = false; 

    

    $numLetra = strval($num); 
    $x = strlen($numLetra); // exponente (3); 

    for($i = 0; $i <  strlen($numLetra); $i++){

      //  echo $numLetra[$i]. "\n"; comprobamos que entran como letras individualmente...
      $itemNum = (int) $numLetra[$i]; //convetimos cada letra individual en int

      $potencia +=  pow($itemNum, $x);  //calculamos la potencia de cada exponente y sumamos el conjunto

      echo $itemNum . " ^$x = $potencia \n"; 
        
    }

    echo "Suma de las potencas totales ". $potencia. "\n";

    if($potencia === $num) $amtrong = true; 

    echo "El numero ". $num. " es un numero Amstrong: "; 
    echo $amtrong ? " true \n" : " False \n"; 

}
//amstrong(); 


?>




