<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/*29. Prueba la función equivalente a checkdate de un ejercicio anterior con un formulario
que pida la fecha a comprobar. Las funciones de fecha deben estar almacenadas en
un archivo aparte.*/


function bisiesto($anio){

    //24. Escribe una función PHP que reciba un año y devuelva si es bisiesto. La regla dice
    //que es año bisiesto cuando es divisible por cuatro (como 2016) y no lo es por 100, a
    //no ser que lo sea también por 400.
    
    settype($anio, "integer"); //aseguramos que entra un numero
    
    if(($anio % 4 === 0 && $anio % 100 !== 0) || ($anio % 400 === 0)) $is_bisiesto = true; 
    else $is_bisiesto = false; 

   // echo "El mes de febrero introducido era en año bisiesto: <br>"; 
   // echo  $is_bisiesto ? 'true <br>' : 'false <br>'; 

    return $is_bisiesto; 

}




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
            $ultimo_dia_mes = date('t', $timeStamp); // puede ser... 28, 30 o 31..pero nunca dará 29 por no tiene en cuenta los bisiestos ... lo tenemos que hacer nosotros.


            //comprobacion adicionar para febrero...por los bisiestos
            if($mes == 02){
               
                $is_bisiesto = bisiesto($anio); 
                $ultimo_dia_mes = $is_bisiesto ? 29 : 28;  //anio bisiesto tiene 29 dias....febrero suele tener 28
                // cuidado con hacer esto, que no te modifica el valor de ultimo dia del mes ya que no estas guardado el valor en ninguna variable
                //$is_bisiesto ? $ultimo_dia_mes + 1 : $ultimo_dia_mes;
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
//checkFecha(); 

function checkFecha2(){

    $fecha = $_GET["fecha"]; 

    $arrayFecha = preg_split("/[\/\-]/", $fecha); 
    $dia = $arrayFecha[0]; 
    $mes = $arrayFecha[1]; 
    $anio = $arrayFecha[2]; 

    //CHECKDATE es super sencilla, solo tienes que saber que es una funcion que espera tres parametros en este ORDEN ($mes $dia $anio), por lo demas le da igual que sea
    //en formato numero, en string numerico, que sea 01 0 que sea 1... porque si tu le pasas una cadena numerica lo va a convertir automaticamente a integer y va a eliminar el 0 de la izq
    //por lo tanto $dia = "01" para checkdate siempre es 1. 

    $is_valida = checkdate($mes,$dia,$anio); 

    echo $is_valida ? " La fecha es valida <br> " : " La fecha no es válida <br>"; 
    return $is_valida; 

}
//checkFecha2(); 

/*30. Crea un formulario en HTML5 válido donde se pida la siguiente información:
● Nombre
● Correo electrónico
● Página web
● Sugerencia (textarea)
Y la envíe por GET al archivo alta.php donde se reciba dicha información y la
muestre en una tabla.*/

function mostrarDatos(){

    $nombre = $_GET["name"]; 
    $email = $_GET["email"]; 
    $web = $_GET["web"]; 
    $comentario = $_GET["comentario"]; 

    echo "
        <table border='1' style='border-collapse: collapse; background-color: rgb(168, 238, 238);'>
        <tr><th>nombre: </th><td>$nombre</td></tr>
        <tr><th>Correo electronico: </th><td>$email</td></tr>
        <tr><th>web: </th><td>$web</td></tr>
        <tr><th>comentario: </th><td>$comentario</td></tr
         </table>
    
    
    
    ";
}
//mostrarDatos(); 



/*31. Crea una aplicación web que reciba la base y la altura de un triángulo y devuelva el
área del triángulo.*/

//NO LO HAGO


/*32. Crea una aplicación web que reciba un número entero y devuelva una pirámide de
este tipo (con el número máximo que indique el número introducido por el usuario).*/

function piramide() {
    $numero_Max = 4;

    // Parte creciente de la pirámide
    for ($fila = 1; $fila <= $numero_Max; $fila++) {
        for ($num = 1; $num <= $fila; $num++) {
            echo $num; 
        }
        echo "\n"; // Salto de línea después de cada fila
    }

    // Parte decreciente de la pirámide
    for ($fila = $numero_Max - 1; $fila >= 1; $fila--) {
        
        for ($num = 1; $num <= $fila; $num++) { //casi lo sacas por ti misma, te falto poner esta segunda fila en sentido ascendente
            echo $num; 
        }
        echo "\n"; // Salto de línea después de cada fila
    }
}

//piramide(); 


/*33. Crea un formulario HTML5 válido donde se pida el nombre y edad del usuario y lo
envíe por POST al script info.php, que mostrará dichos datos por pantalla.*/

/*34. Crea un nuevo script mezcla.php donde se mostrará la información recibida desde
cualquiera de los métodos conocidos. Modifica los formularios de los ejercicios
anteriores para que apunten a este nuevo script PHP.*/ 

/*35. Modifica el ejercicio que mostraba la fecha en castellano, para que obtenga lo mismo
a partir de un día, mes y año introducido por el usuario. Antes de mostrar la fecha,
se debe comprobar que es correcta. Utiliza la misma página PHP para el formulario
de introducción de datos y para mostrar la fecha obtenida en castellano.
NOTA: Consulta las funciones checkdate y mktime en el manual de PHP.*/


function fechaCastellano(){


    $fecha = $_GET["fecha"];  //DD/MM/YYYY
    $arrFecha = preg_split("/[\/\-]/", $fecha); 


    $dia = (int)$arrFecha[0]; //dd
    $mes = (int)$arrFecha[1]; //mm
    $anio =(int) $arrFecha[2]; //yyyy

    $is_valida = checkdate($mes, $dia, $anio); 

    if($is_valida){

        echo "Fecha valida: <br>";

        $timeStamp = strtotime("$mes-$dia-$anio"); 

        $fechaIngles = date("l - m - Y", $timeStamp); 
        echo $fechaIngles; 


        $arrFecha = explode("-", $fechaIngles); 
        $dia = $arrFecha[0]; 
        $mes = $arrFecha[1]; 

        $diasSemana = [
            "Monday" => "Lunes",
            "Tuesday" => "Martes",
            "Wensday" => "Miércoles",
            "Thursday" => "Jueves", 
            "Friday" => "Viernes",
            "Saturday" => "Sábado", 
            "Sunday" => "Domingo"
        ]; 

        $diasMes = [

            "01" => "Enero",
            "02" => "Febrero",
            "03" => "Marzo",
            "04" => "Abril",
            "05" => "Mayo",
            "06" => "Junio",
            "07" => "Julio",
            "08" => "Agosto",
            "09" => "Septiembre",
            "10" => "Octubre",
            "11" => "Noviembre",
            "12" => "Diciembre"

        ]; 


        $dia = $diasSemana[$dia]; 
        $mes = $diasMes[$mes]; 
        

        echo "La fecha introducida ha sido: <br> ";
        echo "$dia - $mes - $anio <br>"; 

        

    

    }else{
        echo "La fecha introducida no es válida <br> \n"; 
    }





}
fechaCastellano(); 



?>


