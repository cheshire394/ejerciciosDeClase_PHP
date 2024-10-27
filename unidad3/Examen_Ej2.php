<?php




if(isset($_POST['formulario1'])){

    //rscatamos los valores
        $palabra = $_POST['palabra']; 
        $intentos = $_POST['intentos']; 

        echo $palabra . $intentos; 

    echo  '<form method="post">'; 

   
    for($i =1; $i <= $intentos; $i++){
        echo "<label for='nombres'>Introduce el nombre $i: </label>"; 
        echo '<input type="text" name= nombres[] min="2"  required> '; 
        echo "<label for='letras'>Introduce la letra $i: </label>"; 
        echo '<input type="text" name= letras[]  maxlength="1"  required><br>';
        
    }

    echo "<input type='hidden' name='palabra' value='$palabra'>"; 
    echo "<input type='hidden' name='intentos' value='$intentos'>"; 
    echo '<button type="submit" name="formulario2">Enviar</button>'; 


    echo '</form>'; 


    }


if(isset($_POST['formulario2'])){

//rscatamos los valores
$palabra = $_POST['palabra']; 
$intentos = $_POST['intentos']; //number (lo rescatasres pero no lo vamos a utilizar)

//ARRAYS
$nombres = $_POST['nombres']; 
$letras = $_POST['letras'];

$longitud = count($letras); 



//ajustamos la palabra a lo requerimientos del ejercicio
$palabra = strtolower($palabra); 
$palabra = trim($palabra);


//convertimos a array para eliminar los caracteres repetidos esto no es necesario, ya que da igual que esten repetidos y lo pusiste en el examen
/*$arr_palabra = str_split($palabra); 
$sinRepetidos = []; 
 //palabra a partir de aqui es un array, sin caracteres repetidos
$palabra = array_unique($arr_palabra);*/


// igual puesto en el examen y no es necesario

//letras es un array, que queremos que no sea sensible a mayus y min, pasamos tos a minusculas,
//convertimos a string 
/*$cadenaLetras = implode($letras); 
$letrasMinus = strtolower($cadenaLetras); 
$longitudLetras = strlen($letrasMinus); */



//volvemosa conevertir a array  las letras
/*$letrasMinusArr = []; 

for($i = 0; $i <= $longitudLetras -1; $i++){

    array_push($letrasMinusArr, $letrasMinus[$i]); 
}
*/



//ahora tenemos los nombres de los participantes y las letras creamos un array asociativo. 

/*$aciertos = []; 
$longitud = count($nombres); 
$contAciertos = 0; */


//HASTA AQUI HICE EN EL EXAMEN, LO DESPUÉS LO HE AÑADIDO POSTERIORMENTE------------------------------------------------------------------------------------------------

$asociativo = []; //almacenara nombre y su cantidad de aciertos

for($i=0; $i < $longitud; $i++){

    $char = $letras[$i];  //obtemos la letra
    $char = strtolower($char); //como la palabra la hemos pasado a minuscula las leras tambien (no sensible a mayus y minusculas)


     //obtenemos el nombre de esa posición
     $nombre = $nombres[$i]; 

    // si NO existe esa clave ya (nombre)....entonces la inicializamos en el array asociativo como 0., pero si existe no hacemos nada, porque sino reseteariamos el contador
    if(!array_key_exists($nombre, $asociativo))  $asociativo[$nombre] = 0; //inicializamos su valor a 0 la primera vez que encontramos esa clave.


    //si la palabra contiene la letra de la posicion $i, que coincide con el nombre $i  (unico vinculo entre los dos arrays, su posición)
    $contiene = str_contains($palabra, $char); //palabra y char estan en minusculas ya....

    if($contiene){

        //aumentamos el valor del array asociativo para incremetar su contador
        $valorActual = $asociativo[$nombre]; 
        $valorActual++; 
        $asociativo[$nombre] = $valorActual; 
        
    
    }

    

}
//mostramos lo que el usuario ha introducido.... a modo de recordatorio....
print_r($asociativo); 

echo "<br>"; 

$resultado = empatados($asociativo); //retorna empate, si hay empate y sino retorna el nombre del ganador

echo "$resultado <br>"; 



}





function empatados($asociativo){


$ganador = obtenerGanador($asociativo);
$valorMaximo = $asociativo[$ganador]; //obtiene el valor maximo de arr asociativo para compararlo entre los valores
$listaEmpatados = []; 


$contador= 0; 

foreach($asociativo as $nombre => $valor){ 

    
    if($valor == $valorMaximo){  //si el valor actual coincide con el valor maximo

       $contador++; //contamos un valorMaximo más ... si solo hay un ganados será 1 y si hay más será > 1.
       array_push($listaEmpatados, $nombre); //almacenamos el nombre actual en un array para mostrar el nombre de los empatados cuando su valor coincide con el del ganador
    }
    
   
}

//no cercioramos de si la lista tiene más de un nombre almacenado, de ser asi, es porque hay empate y vamos a mostrar sus nombres...SINO HAY EMPATE NO SE EJECUTA...
$longitud = count($listaEmpatados); 
if($longitud > 1){
    echo "LISTA DE EMPATADOS: <br>"; 
   
    foreach($listaEmpatados as $i  => $nombre){
        $i = $i + 1; 
        echo "empatado numero $i  => $nombre <br>"; 
        
    }
}

//finalmente mostramos los resultados dependiendo de si hay empate o hay un ganador
$resultado =  $contador > 1 ?  'RESULTADO FINAL =>  EMPATE  '  : "RESULTADO FINAL GANADOR => $ganador";

return $resultado; 

}


function obtenerGanador($asociativo){

    $valorMaximo = max($asociativo); 
    $nombre = array_search($valorMaximo, $asociativo); //devuelve la clave(nombre) del valorMaximo (solamente la primera aparicion, no es util para establecer empates...)
    return $nombre; 
}




//añado despues del examen como correccion de clase

/*function determinarGanador($nombres, $letras, $palabra){

	$jugador=[]; 
    $tamaño = count($nombres); 
    
    
    for($i = 0; $i < $tamaño; $i++){
    
    		$letra = $letras[$i]; 
    		$nombre = strotolower($nombres[$i]); 
    		
    		//iniciar el jugador si no exite
    		if(!isset($jugadores[$nombre])){
    			$jugadores[$nombre] = 0; 
    		}
    		
    		//verifica si la letra esta en la palabra
    		if(strpos($palabra , $letra[$i])){
    		
    		
    		}
    		
    		//determinalr el ganador
    		$ganador = null; 
    		$max_aciertos = -1; 
    		
    		foreach($jugadores as $nombre => $aciertos){
    			
    			if($aciertos > $max_acietos){
    				$max_aciertos = $aciertos; 
    				$ganador = $nombre; 
    			}
    		
    		
    		}
    		
    		foreach($jugadores as $nombre => $aciertos){
    			
    			if($aciertos === $max_acietos && $nombre != $ganador){
    				$ganador = 'empate'; 
    				break; 
    			}
    		
    		
    		}
    		
    		return $ganador; 
    		
    }
    
    
    

}
}*/



?>