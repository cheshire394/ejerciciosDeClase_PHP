<?php



    $url = $_SERVER['REQUEST_SCHEME']. "://" .$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
    // echo $url; 


    $navegador = $_SERVER['HTTP_USER_AGENT']; 
    $IP_CLIENTE = $_SERVER['REMOTE_ADDR']; 
    $IP_SERVIDOR = $_SERVER['SERVER_ADDR']; 
    $PROTOCOLO = $_SERVER['REQUEST_SCHEME'];  //HTTP O HTTPS
    $HOST = $_SERVER['HTTP_HOST']; //LOCALHOST
    $DIRECTORIO_PATH = $_SERVER['REQUEST_URI']; ///servidor/clasePHP/unidad2/examen.php
    $DIRECTORIO_RAIZ = $_SERVER['DOCUMENT_ROOT']; /////var/www/html 


    $ERROR = error_get_last();  
    $ERROR['message']; 



    $USUARIO = get_current_user(); 
    echo $USUARIO."<br>"; 



    $propietario = fileowner($_SERVER['PHP_SELF']); // Obtiene el UID del propietario
    echo "uid".$propietario."<br>"; // Imprime el UID del propietario
    // Si deseas el nombre del propietario, puedes usar posix_getpwuid()
    $info_propietario = posix_getpwuid($propietario); // Obtiene la información del propietario
    echo "aqui".$info_propietario['name']."<br>"; // Imprime el nombre del propietario


    //VARIABLES GLOBALES: 

    //basename, hace que solo se imprima el nombre de script en ejecucion o en el navegador, lo representes de la forma que lo representes
    $nombre1 = basename(__FILE__);                     //examen.php -->  NOMBRE DEL ARCHIVO EN EL NAVEGADOR
    $nombre2 = basename($_SERVER['PHP_SELF']);        //examen.php -->  NOMBRE DEL ARCHIVO EN EL NAVEGADOR


    $nombre3 = $_SERVER['PHP_SELF'];                   //servidor/clasePHP/unidad2/examen.php  --> RUTA HASTA LA CARPETA RAIZ DEL PROYECTO
    $nombre5 = $_SERVER['SCRIPT_NAME'];               //servidor/clasePHP/unidad2/examen.php  --> RUTA HASTA LA CARPETA RAIZ DEL PROYECTO
    $_SERVER['REQUEST_URI'];                         ///servidor/clasePHP/unidad2/examen.php

    $nombre4 = $_SERVER['SCRIPT_FILENAME'];        ///var/www/html/servidor/clasePHP/unidad2/examen.php --> RUTA COMPLETA INCLUIDO LOCALHOST

    $nombre5 = $_SERVER['DOCUMENT_ROOT'];          ///var/www/html  documento raiz, devuelve donde esta instalado el  (localhost)


    //FECHAS: 
    
  //  header("location: https://www.google.es/");   // --> debes de incluir la ruta completa el htpps: pero es indiferente que uses comillas simples o dobles;       

 // echo strpos('abc', 'a') === false ? 'No encontrado' : 'Encontrado';

 $var = 1; 

doubleval($var); 
 echo gettype($var); 

 //PRUEBAS SOBRE CONSTANTES: 

function contantes() {
    define('PI', 3.14); 
    $PI = 3.5; //PUEDES LLAMAR A UNA VARIABLE IGUAL QUE UNA CONSTANTE, PHP VA A SABER SI LLAMAS A LA VARIABLE O LA CONSTANTE POR EL $


        //PHP ES BASTANTE STRICTO CUANDO DEFINES UNA CONTANTE NO TE PERMITE MODIFICARLA, DA ERROR --> PHP Warning:  Constant PI already defined (pero no detiene su ejecución)

        //PI = "CAMBIO VALOR";  //DA ERROR PORQUE ESTAS LLAMANDO A LA CONSTANTE  -->  PHP Parse error:  syntax error, unexpected token "="  Y PESPERABA UN $

      //  define('PI', 3.54); //    No detiene el programa, solo da ese warning y simplemente no cambia su valor sino que ignora la segunda llamada a la constante

        //settype(PI, 'string'); //PHP Fatal error:  Uncaught Error: settype(): Argument #1 ($var) could not be passed by reference (da error de grave, detiene el programa, porque espera una $)

        strval(PI);   //CON ESTE FORMATO DE CAMBIAR VALORES , NO DETENIE EL PROGRAMA PERO LO IGNORA, ES DECIR NO CAMBIA SU VALOR
        echo gettype(PI) . "\n"; //double...

        echo PI . "    ". $PI. "\n"; 

        //Conclusión cunado defines una constante como define no pudes cambiar su varlor, ni tipo, ya que es ignorado. 
    
}
//constantes(); 




//como le asignas el valor por referencia, es una mismo espacio de memoria con dos variables si cambias una
//cambias la otra , ¿pero que pasa si eliminar una variale con unset?
// solo borraria esa variable, peor no la que le has pasado por referencia. 

function pasoRef(){
        $a = 10;
        $b = &$a;
        $a = 20;
        $b = 30;
        echo $a ."\n";  //30

        //ejemplo
        $a = [1, 2, 3];
        $b = &$a;
        unset($a); //eliminamos la variable
        echo $b[0]; //pero podemos seguir usando ese espacio de memoria con la otra variable que lo referenciaba.... 
}

//pasoRef(); 




//php es como js para estas cosas.. soble igualdad no tiene en cuenta el tipo, pero triple si tiene en cuenta los tipos , y devuleve o un 1 o nada, que hace que sea if o else...

function igualdades(){


        $resultado = '100' == 100; //son igualea  // en realidad devuelve un 1, que php lo interpreta como true...
        $resultado2 = '100' === 100; //son distintos // devuelve nada...

        echo "'100' == 100 ". " => " .$resultado. "    ->     ". " '100' === 100 "." => ".$resultado2. "\n";  //aqui puedes ver el 1 y la nada...

        if($resultado) echo "son iguales" . "\n"; 
        else echo "son distintos \n"; 

        if($resultado2) echo "son iguales" . "\n"; 
        else echo "son distintos \n";
}
//igualdades(); 



//esto nos lo enseño gabriel el año pasado, y con java era igual puede aumentar contador ++ a ambos lados de la variable
$x = 5;
$y = $x++ + ++$x;
echo $y. "\n";






//¿QUE DATOS PUEDEN OPERAR EN PHP?

function operandoCadenas(){

        //No salta ni warning ni error, por sumar cadenas puramente numericas
        $suma0= "12" + 3; 
        echo $suma0 . "\n"; //15 

        //llegamso a lo as curioso de php ...en cuento haya un numero en un cadena SIEMPRE QUE SE AL PRINCIPIO DE ESTA , php suma.... el tio chupa de todo 
        //eso si lanza un warning, no le hace mucha gracia... A non-numeric value encountered....pero el programa continua ejecutando,  si solo pasas numeros en el string no protesta. 
        $suma = "1abc" + 3; //nota* si el numero es 0 tambien traga...
        echo "$suma \n";   //resultado 4


        //ERROR : SI EL NUMERO ESTA AL FINAL O EN MEDIO DE LA CADENA LA COSA CAMBIA...HAY NO CHUPA Y LAZNZA ERROR.  -->   Unsupported operand types string + int  (detiene la ejecucion del programa)
        //$suma4 = "A1" + 3;
        //echo "$suma4 \n"; 


        //$suma3 = "true" + 3;  //si es una cadena true , esto lo interpreta como string y no como bool, y tal y como pasaba antes lanza error... //Unsupported operand types:string + int     
        //echo "$suma3 \n"; 

        //PHP Fatal error:  Uncaught TypeError: Unsupported operand types: string + int
        //$suma7 = "" + 3; 
        //echo "$suma7 \n";


        //RESUMIENDO -> EN CUANTO A CADENAS Y OPERACIONES ARITMETICAS SOLO SON POSIBLES SI SON CADENAS PUTAMENTE NUMERICAS O BIEN, EMPIEZAN POR NUMEROS AUQUE YA CON ESO LANZA UN WARNING
        //A non-numeric value encountered

}

operandoCadenas(); 


//ESTA PARTE ES MAS CURIOSA TODAVIA, COMO OPERAN LOS BOOLEANOS
function operandoBool(){

        $suma2 = true + 3; //4   ¿porqué? por que como hemos comentado antes php interpreta los trusty como 1. 
        echo "$suma2 \n"; 

        $suma5 = false + 3; // en cambio vemos que con false lo interpreta como 0, y el resultado se queda en 3
        echo "$suma5 \n"; 

        // ¿ y que mas interpreta php como un falsy??' es decir 0.... los null... un array vacio

        $suma6 = null + 3; 
        echo $suma6 . " =  null + 3 \n";


        $array = []; 
        $suma8 = $array[0] + 3; // un array vacio tambien da 0
        echo $suma8 . "   arrayVacio + 3 \n";

//resumiendo --> si es true, +1, si es un falsy (false, null, array[VACIO]) -> DEVUELVE UN 0; 

}
//operandoBool(); 



//Resumiendo php admite operaciones de cadenas solo si empizan con numeros o son numeros todo el string. 
// todo los que sea trusty le suma 1. por ejemplo un true...un numero distinto de 0 sea pos o neg
// todo los que sea falsy ..no da error pero no suma, por ejemplo un false, un array vacio o un valor null, el nuemro 0 da false.

function ordenIgualdad(){
         
    $a = [1, 2, 3];
    $b = [3,2,1];

    echo $a == $b ? 'Iguales' : 'Diferentes'; // Salida: 'Diferentes'


    //utiliza las claves para comprar los nuemros por eso da iguales aunque no sea el mismo orden
    $a = [1, 2, 3];
    $b = [1 => 2, 2 => 3, 0 => 1];
    echo $a == $b ? 'Iguales' : 'Diferentes';

    //el orden no importa, tienen los mismos numeros en el array, pues son iguales...me cambias un numero pues son distintos, al no ser que uses ===, que entonces si tiene en cuenta el orden
    


}
//ordenIgualdad(); 



function issetTest(){

    echo "Resultados de la funcion issetTest: \n"; 

$datos = [

    $vacia = "",
    $cero = 0,
    $ceroStr= "0",
    $null = null, // null aparece vacia con isset
    $boolf = false,
    $boolT = true,
    $num = 1,
    $string = "cadena",
    $arrayVacio = [],
    $array = [1,2,3], 
    //$noInicializo,
    

]; 


// isset se encarga de controlar si una variable esta definida y no es null --> todo lo demas va a devolver 1, es importante que tengas en cuenta que no tiene en cuenta si el valor es falsy
// quiero decir que isset devuelve 1, es decir true, con las variales que son 0, "", false...etc... 
//su finalidad es comprobar si una variables es esta definida y ademas no es null, unicamente
foreach($datos as $item){

    echo isset($item) . "  "; 
    if(isset($item)) echo " resultado true  \n"; 
    else echo " resultado false  \n"; 

}

echo isset($noInicializo). " varible no inicializada devuelve vacio con isset...  \n"; 
echo isset($noExiste) . "  variable que no existe llamada con isset devuelve vacio... \n"; 

echo "FIN DE LA FUNCION issetTest \n"; 


}
//issetTest(); 


function emptyTest(){

    echo "Resultados de la funcion emptyTest: \n"; 


    //Piensa que empty devuelve 1 (true) cuando esta vacio (pensamiento inverso que con isset ya que devolvia 1 cuando existe y con empty devuelve 1 cuando no existe); 
    // esto es muy muy importante tenerlo en cuenta porque nos va a devolver 1 cuando una variable no este inicializada o sea null, o incluso no exista, y sin embargo
    //isset nos devolvia un vacio con estas variables.

    //ademas si isset daba 1 con estos estos valores porque estaban definidos y existian, con empty nos devuelve 1 también porque son falsy (0, "0",  "") 

$datos = [

    $vacia = "", //true 1 es decir esta vacia....
    $cero = 0,  // true 1 
    $ceroStr= "0", //true 1
    $null = null, // null aparece vacia con isset  // 1 (true) con empty...
    $boolf = false, // true con empty
    $boolT = true, // false 
    $num = 127, //false
    $string = "cadena", //false
    $arrayVacio = [], //true porque esta vacio
    $array = [1,2,3], // false porque esta lleno
   // $noInicializo, //PHP Warning:  Undefined variable $noInicializo --> se queja pero continua la ejecucin del programa/ devuelve 1 (true)
    

]; 


foreach($datos as $item){

    echo empty($item) . " =>  elemento es: " . $item; 
    if(empty($item)) echo " resultado de empty true  \n"; 
    else echo " resultado de empty es  false  \n"; 

}

//empty no sirve para saber si una variable existe o esta incializada, de hecho devuelve 1, cuando ni si quiera existe... para eso debemos usar isset
echo empty($noInicializo). " varible no inicializada devuelve 1 con empty...  \n"; 
echo empty($noExiste) . "  variable que no existe llamada con empty devuelve 1 ... \n"; 

echo "FIN DE LA FUNCION EMPTYTEST() \n"; 


}
//emptyTest(); 





function prueba(&$param) {
    $param .= ' mundo';  //simplemente concadena caracteres
}
$a = 'Hola';
prueba($a);
echo $a ."\n"; //hola mundo

echo "3" . 3 * 2 ."\n"; //aqu vemos una vez mas que . solo concadena....sea numeros o sean cadenas,  no suma ni multiplica no confundir, eso si primero hace la operacion y luego concadena
//36   


function flotantes(){

        $var = 0.1 + 0.2;
        if ($var == 0.3) {
            echo "iguales \n"; 
        } else {
            echo "Diferentes \n"; //da diferentes, porque hace la suma en coma flotante, es decir coge mas numeros 0.30000004 por ejemplo
           
        }


        $var = 1 + 2; ///este mismo problema no sucede con los numeros enteros
        if ($var == 3) {
            echo "iguales \n"; 
        } else {
            echo "Diferentes \n"; 
           
        }
}
//flotantes(); 

function prioridades(){

    //aqui muestra como en ausencia de parentesis las divisiones tiene prioiriddad frente a las sumas
        $x = 5;
        $y = 10;
        $z = $x + $y / 2;  // si haces la suma primero y luego divides da 7.5, SIN EMBARGO SI TIENES EN CUENTA EL ORDEN DE PRIORIDAD EL RESULTADO ES 10.
        echo $z . "\n";

//Paréntesis () – Siempre se evalúan primero, y son útiles para cambiar el orden natural de evaluación.

//Multiplicación *, División /, Módulo % – Tienen la misma precedencia y se evalúan de izquierda a derecha.

//Suma + y Resta - – Se evalúan después de la multiplicación, división y módulo, también de izquierda a derecha.


}
//prioridades(); 



function sumar($a, $b = 2) {
    return $a + $b;
}

//echo sumar(3); //obtiene 5,  No creo que esto eentre 





//PRUEBAS CON CASTEOS:
function casteos(){


$int = 123; 
$cadenaNum = "123"; //convierte a integer / Float  / double => 123 /  /bool = 1  porque no es una cadena vacia
$cadenaLe = "abc"; //int , double, float=> 0 porque no lo puede convertir ninguno de sus numeros / bool = 1, porque la cadena no esta vacia es true; 
$cadenaMIX = "123ABC"; //convierte a integer / Float  / double => 123 (solo si esta ubicados al principio) si lo pasas a bool devuelve 1 porque la cadena no esta vacia



//casos que te resetean la vida, los trata como cadenas no como valores falsy, esto hace que si no hay numeros y lo pasas a int sea 0 (aunque ponga true), 
//ya que no puede convertir una cadena de texto a integer. 
//y si lo pasas a booleano siempre devuelve 1, aunque sea false o null, porque para php es una cadena que esta llena,no es un valor falsy... por lo tanto es 1. 

$cadenaBool = "true"; // si lo pasas a int devuelve 0 (porque lo considera un string sin datos numericos)  si lo pasas a bool devuelve 1. 
$cadenaBool2 = "false"; // bool => devuelve 1 porque la cadena no esta vacia y por lotanto es true, le da igual que lo de dentro sea false
$cadenaFalsy5 = "null";  //devuelve 1 de cadena no vacia al pasarlo a booleano

//conclusion : todas las cadenas  a pasarlas a bool si tienen contenido es 1 o true, independientemente de lo que haya escrito.
// todas las cadenas a pasarlas a int o float devuelven 0, al no ser que empiecen por numeros o sean una cadena de nuemeros; 



//este bloque falsys NO DEVUELVE NADA NI 0 NI 1 AL PASARLO A BOOLEANO (espacio vacio lo considera false entonces) // devuelven 0 al pasarlo a integer
$cadenaFalsy = 0; 
$cadenaFalsy2 = "0"; 
$cadenaFalsy3 = ""; // devueve 0 al pasarlo a int (valor falsy)
$cadenaFalsy4 = null; 

//todos los valosres falsy 


echo "\n"; 

$convesion= boolval($cadenaLe) ;
echo "resultado de convertir a bool " . $convesion . "\n"; 

$convesion2= intval($cadenaLe); 
echo "resultado de convertir a int/float/double " . $convesion2 . "\n"; 

if($convesion) echo " soy un bool"; 
else echo " no lo soy bool "; 

}
//casteos(); 

// variables static --> permiten que una variable no sea reseteada, sino que conserve su ultimo valor

function static1(){

   static  $num = 0; 
   ++$num; 
   echo $num . "  variable static \n"; 

}

function noStatic(){
    $num = 0; 
    ++$num; 
    echo $num  .  "  NO estatico \n"; 

}

//static1(); 
//noStatic(); 
//static1(); 
//noStatic(); 


//mas test con sumas raras 

function operandos(){

    echo "OPERANDOS \n"; 
    $cadena = "true";
    $valor = (int)$cadena;
    echo $valor; //0 (porque no puede pasar a integer una cadena se "true", "false" o "null" o "miprimapepa")

    echo "\n";

    //sin embargo si tratamos de suma o hacer una operacion entonces da error
   // $resultado = "hello" + 2; //Fatal error:  Uncaught TypeError: Unsupported operand types: string + int (en las diapositivas pone que daria 2, pero produce fallo de compilacion)
  //  echo $resultado;


   //devuelve espacios vacios interpretado como false
    $cadena = "";
    $booleano = (bool)$cadena;
    echo $booleano; //devuleve vacio, 

    echo "\n";

    $cadena = "0";
    $bool = boolval($cadena);
    echo $bool; // DEVUELVE VACIO

    if ($bool) echo "true"; 
    else echo "false .\n"; 


    $cadena = "123.45abc";
    $resultado = (int)$cadena;
    echo $resultado; //123
    echo "\n";


    echo "FIN OPERANDOS \n"; 

}
//operandos(); 


?>






  
    



