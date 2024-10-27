


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post">

        <label for="num">Introduce un numero: </label>
        <input type="number" min="1" name="num" id="num" required>

        <button type="submit" name="formulario1">Enviar</button>


    </form>
    
</body>
</html>




<?php

if(isset($_POST['formulario1'])){

$num = $_POST['num'];
$is_saltarin = saltarines($num); 

echo $is_saltarin ? 'SALTARINES <br>' : 'NORMALES <br>'; 
}


function saltarines($num){
    

  

        $is_saltarin = false; 
        $num = $_POST['num']; //recibe a traves del formulario un numero 
        $posicion = 0; 


        $num = strval($num); //convertimos numero en string

        $digitos= str_split($num); // separamos los digitos de tipo int

        $n = count($digitos);
        $visitado = array_fill(0, $n, false);  //creamos un array con el valor  false repetido $n veces

        $posicion = 0;

        for($i = 0; $i < $n; $i++){
            if($visitado[$posicion])return false; //salimos del metodo si la posicion  0 y retornaa false

            $visitado[$posicion] = true; 

            $saltos = $digitos[$posicion]; //avanzamos  los saltos 
            $posicion =($posicion + $saltos) % $n;  //summamos los saltos a la posicion para que avance y sacamos el modulo entre el numero de digitos

        }

        return $posicion == 0; 

    }



   
?>
















