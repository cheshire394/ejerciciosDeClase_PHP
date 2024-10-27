<?php


//Ejercicios de arrays
///36. Crea una función en PHP que genere un array con 1000 números aleatorios entre 1 y 10.
//37. A partir del array anterior, crea una nueva función que cuente cuántas veces aparece
//determinado número en dicho array.

function aleatorios($buscarNum){

    $contadorNum = 0; 

    $numeros = []; 
    for($i = 0; $i < 1000; $i++){

        $num = mt_rand(1,10);
        array_push($numeros, $num); 
    }

    print_r($numeros); 

    foreach($numeros as $item){
        if($buscarNum == $item) $contadorNum++; 
    }

    echo "El numero $buscarNum aparece $contadorNum veces en el array \n"; 

}
//aleatorios(6); 





//38. Crea un array asociativo que almacene ciudades y su número de habitantes. Crea
//una función a la que se le pase dicho array y devuelva la ciudad con mayor número e habitantes.

$poblaciones = [

    "Madrid" => 700000,
    "Barcelona"=> 700000,
    "Teruel" => 50000

]; 

function mayorPoblacion($poblaciones){

    $maximaPoblacion = max($poblaciones); // devuelve el valor de la ciudad con más habitantes, pero ahora tenemos que buscar su clave...
   
    //Se puede buscar la clave, de un valor en el array de dos formas, la primera solo tiene en cuenta la primera aparicion. La segunda forma
    //consiste en crear un nuevo array que almacene todas las claves encontradas con ese valor.

    // Primera forma: 
        $clave = array_search($maximaPoblacion, $poblaciones); 
        echo "La ciudad con más habitantes es $clave \n<br>"; 

    // segunda forma: devolver todas la ciudades que coincidan con ese numero de población 
    $ciudadesPobladas = [];
    foreach($poblaciones as $key => $valor){
        
        if($valor == $maximaPoblacion){

            
            array_push($ciudadesPobladas, $key); 

        }
    }

    echo "La ciudades con más habitantes son: \n<br>"; 
    print_r($ciudadesPobladas); 

}   
//mayorPoblacion($poblaciones); 



//39. Crea un programa en PHP (no es necesario utilizar un formulario HTML) que realicela suma de dos vectores.
//NOTA: La suma de dos vectores de las mismas dimensiones es el resultado de
//sumar cada una de las coordenadas del primer vector, con su correspondiente
//coordenada del segundo. // el 40 es esto mismo

function sumaVectores(){

    $numeros = [1,2,3,4,5]; 
    $numeros2 = [1,2,3,4,5,6]; 
    $vectorSuma = []; 
    
    //nos aseguramos de que recorremos el vector más largo...
    $vectorMayor = max(count($numeros), count($numeros2)); 

    for($i=0; $i < $vectorMayor; $i++){

        $suma = $numeros[$i] + $numeros2[$i]; 
        array_push($vectorSuma, $suma); 

    }
    print_r($vectorSuma); 
}
//sumaVectores(); 



//41. Crea un programa en PHP que calcule la media de las notas contenidas en un array.

function promedio(){

    //vemos que este ejercicio se puede resolver de la misma manera con vectores sencillo y con arrays asociativos

    $notas = [8.5, 7.0, 9.2, 6.8, 10];
    $asignaturas = [
        "Matemáticas" => 8.5,
        "Historia" => 7.0,
        "Ciencias" => 9.2,
        "Literatura" => 6.8,
        "Educación Física" => 10
    ];

    $promedioNotas = 0.0; 
    $promedioAsig= 0.0; 

    //calculamos las logitudes: 
    $logitudNotas = count($notas); 
    $longitudAsig = count($asignaturas); 

    //calculamos la suma
    $sumaNotas = array_sum($notas); 
    if(!empty($notas))$promedioNotas = $sumaNotas / $logitudNotas; 
    echo "El vector notas tiene una nota promedio de $promedioNotas \n"; 

    $sumaAsig = array_sum($asignaturas); 
    if(!empty($asignaturas))$promedioAsig = $sumaAsig / $longitudAsig; 
    echo "El vector Asignaturas tiene una nota promedio de $promedioAsig \n"; 



}
//promedio();

//42. Igual que el anteior per recibiendo de un formulario

function promedioFormulario() {
    // Capturamos las notas desde el formulario (POST)
    if (isset($_POST['notas'])) {

        $notas = $_POST['notas'];
        
        // Separamos las notas usando el delimitador adecuado
        // siempre emprezar preg con /[]+/
        //en el interior se escapan los caractares especiales con \
        // , no se escapa porque no especial
        $notasArray = preg_split("/[\/\-\s,]+/", $notas);
        
    
        // Verificamos si el array de notas está vacío
        if (!empty($notasArray)) {
            // Calculamos el promedio de las notas
            $logitudNotas = count($notasArray);
            $sumaNotas = array_sum($notasArray);
            $promedioNotas = $sumaNotas / $logitudNotas;
            echo "El vector notas tiene una nota promedio de $promedioNotas <br>\n";
        } else {
            echo "No se han proporcionado notas válidas.<br>\n";
        }
        
        // Si quisieras trabajar con las asignaturas (comentado por ahora)
        
        $asignaturas = [
            'mates' => isset($_POST["mates"]) ? $_POST["mates"] : 0,
            'ingles' => isset($_POST["ingles"]) ? $_POST["ingles"] : 0,
            'lengua' => isset($_POST["lengua"]) ? $_POST["lengua"] : 0
        ];
        
        $longitudAsig = count($asignaturas);
        $sumaAsig = array_sum($asignaturas);
        if ($longitudAsig > 0) {
            $promedioAsig = $sumaAsig / $longitudAsig;
            echo "El vector Asignaturas tiene una nota promedio de $promedioAsig <br>\n";
        }
        
    } else {
        echo "No se recibieron notas desde el formulario.<br>\n";
    }
}
//promedioFormulario();




/*43. Crea otro formulario con un número diferente de notas y asigna como acción el
código PHP que has creado anteriormente, tendrás que diseñarlo de modo que
funcione para cualquier número de notas.*/

function notasExamen(){
    //RECOGEMOS LAS VARIABLES DEL PRIMER FORMULARIO
    if(isset($_POST['formulario1'])){

        $numNotas = $_POST['numNotas']; 
        $nombreAsig = $_POST['nombreAsig']; 


        //Creamos un nuevo formulario
        echo "<form method='post'>";

        for($i = 0; $i < $numNotas; $i++){

            echo"Introduce la nota $i " ."<input type='number' name=notas[]>"; 
        }
        echo "<input type='hidden' name=nombreAsig value=$nombreAsig><br>"; 
        echo "<button type='submit' name='formulario2'>Enviar</button>"; 
       
        echo "</form>";
    }

    if(isset($_POST['formulario2'])){

        $nombreAsig = $_POST['nombreAsig']; 
        $notas = $_POST['notas']; 

        echo "Estas son las notas de $nombreAsig<br>"; 

        foreach($notas as $nota){
            echo $nota . "<br>"; 
        }

    }


}
//notasExamen(); 








/*44. Modifica tu código PHP para que funcione con el formulario del archivo
notas_variable.html que permite introducir un número variable de notas.*/


function notasVariable(){

    if(isset($_GET['notas'])){ //notas se encuentra en el for del JS

        
            $notas = $_GET['notas']; 

        $logitudNotas = count($notas); 
        $suma = array_sum($notas); 

        $promedio2 = $suma / $logitudNotas; 

        echo "<h2> EL promedio de las notas es $promedio2 </h2>"; 
        }
    }
//notasVariable(); 




/*45. Crea una función que, utilizando las funciones de inserción y extracción de arrays,
devuelva el array que se le pasa en sentido inverso. Crea dos opciones, una con pop
y push y otra con shift y unshift.*/

function revertirManualmente(){

    $persona = [30,1994,  "Alicia","España", "Madrid"]; 


    //ordenar en sentido inverso utilizando los metodos propios de php, SIMPLEMENTE ES SABER QUE EXISTE RSORT
   // rsort($persona);
   // rsort($personaAsoc); 
  //  print_r($persona); 
   // print_r($personaAsoc); 

    //crear una forma manual de usar reverse...
    
  
    $revertido = []; 

    foreach($persona as $item){

        //capturamos el primer elemento, y lo eliminamos...
        $eliminarPrimero = array_shift($persona);

         //ahora los añadimos en posiciones inversas, es decir push lo añade al final.: 
         array_unshift($revertido, $eliminarPrimero);

    }
    print_r($revertido);

    /*EXPLICACION GRAFICA DE PORQUE SHIFT VA CON UNSHIFT Y POP DEBE DE IR CON PUSH, (TU LOGICA INICAL ERA PENSAR, QUE SI EXTRAES EL PRIMER ELEMENTO (UNSHIFT), 
    ESE ELEMENTO TIENE QUE IR AL FINAL(PUSH), PERO NO OLVIDES QUE ESTAMOS CREANDO UN ARRAY DENTRO DE UN BUCLE, Y QUE SI TU LO AÑADES AL FINAL, VAS A HACER UNA
    COPIA EXACTA DEL ARRAY QUE YA TIENES: 
    
            Array original: [30, 1994, "Alicia", "España", "Madrid"]

            Primera iteración:

                Extraes el primer elemento: 30 (con array_shift).
                Lo añades al principio del nuevo array con unshift:
                Nuevo array: [30]

            Segunda iteración:

                Extraes el primer elemento del array original: 1994 (con array_shift).
                Lo añades al principio del nuevo array con unshift:
                Nuevo array: [1994, 30]

            Tercera iteración:

                Extraes Alicia del array original.
                Lo añades al principio del nuevo array:
                Nuevo array: ["Alicia", 1994, 30]
            
    */

    //VAMOS A HACER ESTO MISMO PERO CON POP Y PUSH, EN UN ARRAY ASOCIATIVO
    $personaAsoc = ["edad" => 30,"anio" => 1994,  "nombre" => "Alicia", "pais"=>"España", "ciudad" => "Madrid"]; 
    unset($revertido); 
    $revertido = []; 

    foreach($personaAsoc as $item){
        $eliminarUltimo = array_pop($personaAsoc); 
        array_push($revertido, $eliminarUltimo); //añadir al nuevo array
    }
    print_r($revertido);




    }

//revertirManualmente();



/*46. Crea una matriz con el rango numérico que indique el usuario mediante un
formulario.*/


function crearMatriz(){
    $columnas = $_POST['columnas']; 
    $filas = $_POST['filas']; 
    $matriz = []; 

    // Generar la matriz con números aleatorios
    for($i = 0; $i < $filas; $i++){
        $fila = []; 
        for($j = 0; $j < $columnas; $j++){
            $numero = mt_rand(1, 10); // Genera un número aleatorio entre 1 y 10
            array_push($fila, $numero); // Añade el número a la fila
        }
        array_push($matriz, $fila); // Añade la fila a la matriz
    }

    // Mostrar la matriz en formato plano usando print_r()
    echo "<h3>Matriz generada (vista con print_r):</h3>";
    echo "<pre>";
    print_r($matriz);
    echo "</pre>";

    // Mostrar la matriz de forma más visual en una tabla HTML
    echo "<h3>Matriz generada en formato de tabla:</h3>";
    echo "<table border='1' style='border-collapse: collapse; background-color: rgb(180, 245, 245); border-color: rgb(55, 55, 85);'>";
    echo "<theader> Tabla generada con la matriz</theader>"; 
    echo "<tr><th>Index</th></tr>"; 
    for($i = 0; $i < $filas; $i++) {
        
        echo "<tr>"; //ESTAMOS DENTRO DE FILAS...POR LO TANTO PONEMOS TR PARA QUE FABRIQUE LA FILAS EL HTML
        echo "<th>$i</th>"; 
        for($j = 0; $j < $columnas; $j++) {

            echo "<td>" . $matriz[$i][$j] . "</td>";
        }
        echo "</tr>"; //CERRAMOS LA FILA... $i ES LA FILA... $J LA COLUMNA, LA SIGUIENTE ITERACION SERÁ LA SIGUIENTE FILA
    }
    echo "</table>";
}

//crearMatriz(); 


 
/*47. Crea una matriz con datos aleatorios y ordénala.*/

function matrizAleatoria(){

    $matriz = []; 
    for($i=0; $i < 5; $i++){

            $fila=[]; 
            for($j=0; $j < 5; $j++){

                $num = mt_rand(1,100); 
                array_push($fila, $num); 
            }

            sort($fila); //ordenada por filas.
            array_push($matriz, $fila); 
    }

   

    //Ahora vamos a organizar las columnas, para eso es necesario hacer una TRANSPOSICION: 
    for($i = 0; $i < count($matriz); $i++){

        /*Nota* -> Cambiar el inicio de j a $i solo tiene sentido en situaciones como la transposición de matrices 
        pero no para crear o llenar una matriz. */

        //paso 1) TRANSPONER LAS COLUMNAS A FILAS.
        for($j = $i; $j < count($matriz); $j++){ // se recomienda empezar por $i, en lugar de 0 por eficiencia en transposiciones.

            //la logica de zigzag que aplicas para las variables. 
            $intercambio = $matriz[$i][$j]; //guardamos su valor original.
            $matriz[$i][$j] = $matriz[$j][$i]; //intercambio su valor
            $matriz[$j][$i] = $intercambio; // y al valor anterio le damos el valor original

        }
    }

        //PASO 2) ORDENAR LAS FILAS (QUE EN REALIZADAD ERAN LAS ANTIGUAS COLUMNAS)
        
        for($i = 0; $i < count($matriz); $i++){
            sort($matriz[$i]); 
        }

        //paso 3) TRANSPONER NUEVAMENTE LA MATRIZ (IGUAL QUE EL PASO 1)
        for($j = $i; $j < count($matriz); $j++){ // se recomienda empezar por $i, en lugar de 0 por eficiencia en transposiciones.

            //la logica de zigzag que aplicas para las variables. 
            $intercambio = $matriz[$i][$j]; //guardamos su valor original.
            $matriz[$i][$j] = $matriz[$j][$i]; //intercambio su valor
            $matriz[$j][$i] = $intercambio; // y al valor anterio le damos el valor original

        }
        print_r($matriz); 
}
//matrizAleatoria(); 


//otra posible solición que le gusto más al profesor: Aplanar la matriz, a un unico vector, ordenarlo y despues pasarla a matriz.

function matrizAleatoria2() {
    $matriz = [];

    // Generar la matriz de 5x5 con números aleatorios
    for ($i = 0; $i < 5; $i++) {
        $fila = [];
        for ($j = 0; $j < 5; $j++) {
            $num = mt_rand(1, 100); // Genera números aleatorios entre 1 y 100
            array_push($fila, $num);
        }
        array_push($matriz, $fila);
    }

    echo "Matriz Original:\n";
    print_r($matriz);

    // Aplanar la matriz (convertir a un array unidimensional)
    $flatArray = [];
    foreach ($matriz as $fila) {
        $flatArray = array_merge($flatArray, $fila);
    }

    // Ordenar el array aplanado
    sort($flatArray);

    // Reconstruir la matriz (de 5x5) a partir del array ordenado
    $matrizOrdenada = [];
    $indice = 0;
    for ($i = 0; $i < 5; $i++) {
        $fila = [];
        for ($j = 0; $j < 5; $j++) {
            array_push($fila, $flatArray[$indice]);
            $indice++;
        }
        array_push($matrizOrdenada, $fila);
    }

    echo "Matriz Ordenada por Filas y Columnas:\n";
    print_r($matrizOrdenada);
}

//matrizAleatoria2();

/*
Ampliación:
- Números cubinfinitos
- Senda pirenaica
- Va de modas
*/




?>