<?php
// Ejercicios de funciones de fecha

// 16. Escribe un programa PHP para convertir una fecha (cadena) a timestamp.


function strAfecha(){

    // Definimos las fechas en diferentes formatos
        $fecha1 = "1994-06-27"; 
        $fecha2 = "1994/06/27"; 
        $fecha3 = "27-06-1994"; 

    //  pasamos a segundos transcurridos con strtotime --> limite de fecha para poder usar strtotime es el 1 de enero de 1970
    $segundos1 = strtotime($fecha1); 
    $segundos2 = strtotime($fecha2); 
    $segundos3 = strtotime($fecha3); 

    //imprimimos la fecha con el nuevo formato, es importante hacer una conversion de fecha con strtotime() porque sino date no funciona
    echo $fecha1 . " convertida a segundos es ". $segundos1. " y para dar formato a la fecha ". date('d-m-y -> D', $segundos1) . "\n";  //D sia abreviado
    echo $fecha2 . " convertida a segundos es ". $segundos2. " y para dar formato a la fecha ". date('d-m-Y', $segundos2) . "\n";  //MAYUS Y muestra el año completo
    echo $fecha3 . " convertida a segundos es ". $segundos3. " y para dar formato a la fecha ". date('d-m-y', $segundos3) . "\n"; 


}
//strAfecha(); 


// 17. Escribe un programa PHP que muestre la hora, espere 3 segundos y vuelva a mostrar la hora.
// Usamos la función date() para mostrar la hora actual y sleep() para pausar el script por 3 segundos.

function pausarScript(){

    //establecemos en el script la zona horaria
    date_default_timezone_set("Europe/Madrid"); 


    echo "hora actual: ". date("H:i:s") . "\n"; 
    sleep(3);  //esperamos 3 SEGUNDO--> POR LO TANTO SLEEP TRABAJA CON SEGUNDOS.
    echo " 3 segundos después ". date('h:i:s'). "\n"; 
}
//pausarScript();



// 18. Escribe un script PHP para cambiar de día del mes a nombre del mes.
// Utilizamos la función date() para convertir un número a nombre del mes.

function formatearFecha(){
    $fecha = "27-06-1994"; 

    $fechaOriginal =  DateTime::createFromFormat('d-m-Y', $fecha);  //crea un obj fecha, con el formato que tiene , por ejemplo Y esta en mayusculas porque tiene 4 digitos
    $formatearFecha = $fechaOriginal->format('d-F-y'); 
    echo "La fecha original es: ". $fecha ." y la fecha formateada es ".$formatearFecha. "\n";

    //otra forma de hacerlo 
    $segundos = strtotime($fecha); 
    $formatearFecha2 = date('d-F-y', $segundos); 
    echo "La fecha original es: ". $fecha ." y la fecha formateada es ".$formatearFecha2. "\n";

}
//formatearFecha(); 

// 19. Escribe un script PHP que obtenga la fecha actual en formato "Friday the 13th".
// Usamos date() con diferentes formatos y condicionales para añadir sufijos personalizados.

function formatearFecha2(){

    $fechaSystem1 = date_default_timezone_get();
    date_default_timezone_set('Europe/Madrid'); //asigna al systema la zona horaria deseada 
    $fechaSystem2 = date_default_timezone_get();

    echo "Fecha sistema inicial ". $fechaSystem1. " fecha sistema después de la configuración (set) ". $fechaSystem2. " \n"; 

    $today = date('l  dS'); 
    echo $today , "\n"; 

    //utilizando createFormat
    $today2 = date('y-m-d'); 
    $fechaActual = DateTime::createFromFormat('y-m-d', $today2); 
    $fechaActualFormateada = $fechaActual->format('l dS');  // l -> dia de la semana, ejemplo monday, d dias 12, S añade el nd, th, st ect....
    echo $fechaActualFormateada . "\n"; 
    
}
//formatearFecha2(); 



// 20. Escribe un script PHP para obtener la hora actual en Los Angeles.
// Definimos la zona horaria de Los Angeles y mostramos la fecha y hora actual en ese formato.

function fechaToAngeles(){

    date_default_timezone_set("America/Los_Angeles"); 
    $systime = date('y-m-d -> H:i:s'); 
    echo "Fecha y hora en los Angeles ". $systime . "\n"; 

}
//fechaToAngeles(); 

// 21. Escribe un script PHP para obtener la última fecha de modificación de un fichero.
// Usamos filemtime() para obtener la fecha de modificación y date() para formatearla.

function modificacionFichero(){

    //primero asignamos la fecha correspondiente a nuestra zona horaria
    date_default_timezone_set("Europe/Madrid"); 

    $archivo = "Ej13.php"; 

    $modificadoSegundos = filemtime($archivo); 
    $creadoSegundos = filectime($archivo);

    $modificado = date('y-m-d  l  -> h:i:s',  $modificadoSegundos); 
    $creado = date('y-m-d  l  -> h:i:s',   $creadoSegundos); 

    echo "El archivo ". basename("/var/www/html/servidor/clasePHP/unidad2/Ej13.php") . " fue creado por ultima vez ". $creado. "\n"; 
    echo "El archivo ". basename("/var/www/html/servidor/clasePHP/unidad2/Ej13.php") . " fue modificado por ultima vez ". $modificado . "\n"; 

}
//modificacionFichero(); 

// 22. Escribe un script que muestre una cuenta atrás hasta el próximo cumpleaños.
// Definimos el próximo cumpleaños y calculamos la diferencia con la fecha actual.


function tiempoRestante(){

    //es muy importante que tengas en cuenta que $diferencia-> d , no es lo mismo que  $diferencia-> days
    //cuando usas days, te devuelve el total de dias sumando años, y meses por ejemplo 369 dias .... mientras que con d te devuelve 4 dias, y debes delogarlo en
    //$diferencia-> m  y $diferencia-> y para que te de el resultado bien 1 años y 4 dias... (por este motivo tenias mal el examen); 

    // Establecemos la zona horaria
    date_default_timezone_set("Europe/Madrid");

    // Definimos el próximo cumpleaños
    $cumpleanos = "2024-09-29";

    // Obtenemos la fecha actual
    $fechaActual = new DateTime();  // Obtiene la fecha actual directamente
    $fechaCumpleanos = new DateTime($cumpleanos);  // Fecha del cumpleaños

    // Calculamos la diferencia entre la fecha actual y el próximo cumpleaños
    $diferencia = $fechaActual->diff($fechaCumpleanos);

    // Si el cumpleaños ya ha pasado este año, calculamos para el próximo año
    if ($fechaActual > $fechaCumpleanos) {
        $fechaCumpleanos->modify('+1 year');
        $diferencia = $fechaActual->diff($fechaCumpleanos);
    }

    // Formateamos la salida

    echo "Faltan " . $diferencia->days . " días, " 
        . $diferencia->h . " horas, " 
        . $diferencia->i . " minutos y " 
        . $diferencia->s . " segundos para tu próximo cumpleaños.\n";
}

//tiempoRestante();


// 24. Escribe un script PHP para convertir una fecha con formato yyyy-mm-dd al formato dd-mm-yyyy.
// Usamos la función date() y strtotime() para cambiar el formato de la fecha.

function formatearFecha3(){

    $fechaOrginal = "1994-06-27"; 

    $fechaOrginalSeg = strtotime($fechaOrginal);
    $formatoFecha = date('d-m-y', $fechaOrginalSeg); 

    echo "Fecha original: ". $fechaOrginal . " fecha formateada: ". $formatoFecha . "\n"; 
}
//formatearFecha3(); 

// 25. Escribe un programa PHP que muestre el primer y último día del mes de una fecha determinada.
// Usamos la función date() y strtotime() para calcular el primer y último día del mes.


function ultimoDiaMes(){
    date_default_timezone_set("Europe/Madrid"); 

  
    $hoy = date('y-m-d'); 
    $hoySeg = strtotime($hoy); 

    $ultimoDiaMes = date('t', $hoySeg); 
    echo "Este mes tiene ". $ultimoDiaMes. " dias \n"; 


    //adcionalmente calcularemos cuantos dias faltan para terminar el mes: 

    $dia = date('d'); 
    $mes = date('m'); 
    $anio = date("y"); 
   

    $fecha_obj = new DateTime();  //si no tiene parametos coje la fecha de hoy
    $fecha_obj2 = new DateTime("$anio-$mes-$ultimoDiaMes"); //calcula la diferencia con esta fecha

    $diferencia = $fecha_obj-> diff($fecha_obj2); 

    echo "falta ". $diferencia-> days . " Para terminar el mes \n"; 

}
//ultimoDiaMes();


// 26. Escribe un programa PHP que muestre el número del mes previo al mes actual.
// Usamos date() y strtotime() para obtener el mes anterior.

function mesAnterior(){

    date_default_timezone_set("Europe/Madrid"); 

    $todayMes = date('m');  //m muestra el numero del mes actual

    $mesAnterior = $todayMes -1; 
    echo "Estamos en el mes numero  ". $todayMes. " y el mes anterior fue ". $mesAnterior;  
}
//mesAnterior(); 

/*27. Escribe un script PHP que muestre el mes actual y los 3 meses previos.
EJEMPLO: Jul - 2017
Jun - 2017
May - 2017
Apr - 2017
*/

function mesesPrevios(){

    date_default_timezone_set("Europe/Madrid"); 
    $today = date("y-F-d"); //cogemos la fecha de hoy
    $todayS = strtotime($today);  //convertimos a segundos
    $mes = date('m', $todayS); //cogemos el mes en NUMEROS (sino no podemos restarle luego); 

    echo "Hoy es ". $today. "\n"; 

    for($i = 0; $i < 3; $i++){ //creamos un for que recorra 3 posiciones
        $mes -= 1; //al mes numerico le restamos 1
        $fecha = date("y-$mes-d"); // creamos la fecha con los meses -1 , pero como quiere que sean en letras...
        $fechaS = strtotime($fecha); //lo pasamos a seg
        echo "los meses previos son ". date("y-F-d", $fechaS). "\n"; // y modificamos el formato
    }
}
//mesesPrevios();

// 28. Escribe un script PHP que incremente un mes a la fecha introducida.


/// REVISAR ESTE EJERCICIO
function FechamesSiguiente(){

    date_default_timezone_set("Europe/Madrid"); 

    $today = date('y-m-d'); //fecha actual
    $todaySeg = strtotime($today); 
    $mes = date('m', $todaySeg) + 1; 

   $mesSiguiente = date("y-$mes-d",  $todaySeg); 
   
   echo "La fecha de hoy del mes siguiente es: ". $mesSiguiente. "\n"; 
}
FechamesSiguiente(); 




?>
