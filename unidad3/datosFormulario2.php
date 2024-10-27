<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<fieldset style="background-color: yellow"; >
    <legend>Ejercicio formulario: </legend>

    <form method="post">
    <label for="num">Introduce el numero de alumnos</label>
    <input type="text" name="numAlum" id="num">
    <br>
    <label for="asig">Introduce el nombre de la asignatura: </label>
    <input type="text" name="asig" id="asig">
    <br>
    <button type="submit" name="formulario1">Enviar</button>
    </form>
</fieldset>



<?php

    if(isset($_POST['numAlum'])){

        $numAlum = $_POST['numAlum']; //recogemos el numero de alumnos introducidos en el anterior formulario
        $asig = $_POST['asig']; //nombre de la asginatura

    echo "<form method='post'>";     
        for($i=0; $i < $numAlum; $i++){
            echo "Nota para el alumno $i: <input type='text' name='notas[]'<br>>" ; //creamos un input con formato array
        }

    echo "<input type='hidden' name='asig' value='$asig'><br>"; //enviamos el segundo formulario 
    echo "<button type='submit' name='formulario2'>Enviar</button>"; //enviamos al segundo formulario

    echo"</form>"; 

    }

    /* el sistema no solo calculará la media de las notas de los alumnos para un módulo, sino que también deberá:

    Mostrar la nota más alta y más baja.
    Clasificar las notas en rangos y contar cuántos estudiantes están en cada rango:
        Sobresaliente: 9-10
        Notable: 7-8.9
        Aprobado: 5-6.9
        Suspenso: 0-4.9
    Comprobar que las notas ingresadas están dentro de un rango válido (0 a 10) y mostrar un mensaje de error si no lo están. */

    if(isset($_POST['formulario2'])){

        //recogemos el nombre de la asignatura y las notas
        $asig = $_POST['asig']; 
        $notas = $_POST['notas'];

         //PASO 1) COMPROBAR QUE LAS NOTAS ESTEN EN RANGO
         foreach($notas as $item){
            if($item > 10 || $item < 0){
              echo("La nota $item no comprende un valor entre 1 y 10, vuelve a introducir las notas <br>"); 

            }
        }

        //PASO 2) SACAR LA NOTA MAXIMA Y LA MINMA
        $maxima = max($notas); 
        $minima = min($notas); 
        
        echo "<p>La nota máxima es $maxima y la nota minima es $minima <br>"; 

        //PASO 3) PROMEDIO
        $suma = array_sum($notas);
        $longitud = count($notas); 

        if(!empty($notas)) $promedio = $suma / $longitud; 
        echo "<p> la nota promedio es $promedio"; 

        //PASO 4) CLASIFICAR LOS ALUMNOS SEGUN SU NOTA
        $asociativo = []; 

       foreach($notas as $item){


            if($item >= 0 && $item <= 4.9){
                $asociativo[$item] = "suspenso"; 

            }elseif($item >= 5 && $item <= 6.9){
                $asociativo[$item] = "suficiente"; 

            }elseif($item >= 7 && $item <= 8.9){
                $asociativo[$item] = "notable"; 
            }else{
                $asociativo[$item] = "sobresaliente"; 
            }

       }

       print_r($asociativo). "<br>"; 





       


    }






?>
    
</body>
</html>