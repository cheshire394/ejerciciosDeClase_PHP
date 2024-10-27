<?php
function tiempo()
{
    //Variables
    $ninos = 0;
    $posicion = 0;
    $regalos = [];

    if (isset($_POST['formulario'])) {

        //Asigno las variables del formulario
        $ninos = $_POST['ninos'];
        $posicion = $_POST['puesto'];

        echo "<form action='' method='post'>";
        for ($i = 0; $i < $ninos; $i++) {

            echo "<label for='regalos'>Regalos:</label>";
            echo "<input type='number' name='regalos[]' require>";
        }

        echo "<input type='hidden' name='ninos' value='$ninos'>";
        echo "<input type='hidden' name='puesto' value='$posicion'>";
        echo "<input type='submit' name='formulario2'  value='Enviar'>";
        echo "</form>";
    }

    if (isset($_POST['formulario2'])) {

        $ninos = $_POST['ninos'];
        $posicion = $_POST['puesto']; 
        $regalos = $_POST['regalos'];
        $tiempo = 0;


        for ($i = 0; $i < $ninos; $i++) {

            if ($i == $posicion - 1) {
                break;
            }

            $tiempo += $regalos[$i] * 2;
            $regalos[$i] = $regalos - 1;
        }
        echo "n= " . $ninos . " ,a= " . $posicion . " ,regalos=" . implode(",", $regalos) . "<br>";
        echo "Tiempo de espera: " . $tiempo . " minutos.";
    }
}
//tiempo();


function correccion(){

    $ninos = $_POST['ninos'];
    $posicion = $_POST['puesto'] - 1; /**posicion - 1 porque el array empieza en 1 en el ejemplo */
    $regalos = $_POST['regalos'];
    $tiempo = 0;

    while($regalos[$posicion] > 0){

        for($i = 0; $i < $ninos; $i++){

            if($regalos[$i] > 0){
                $tiempo += 2; 
                $regalos[$i]--; 


                if($i == $posicion && $regalos[$i] == 0){
                    break; 
                }
            }


        }

    }

    echo "Tiempo de espera: ".$tiempo; 

}
correccion(); 
