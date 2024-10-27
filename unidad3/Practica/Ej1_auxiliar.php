<?php

function ej1()
{

    if (isset($_POST['formulario'])) {

        //recogemos las variables del formulario
        $dibujo = $_POST['caracter'];
        $n = $_POST['numero'];

        for ($i = 0; $i < $n; $i++) {
            //Usamos la funcion repeat
            // Espacio (que es lo que queremos añadir al principio), y marcamos la posición
            echo "<pre>"; 
            echo str_repeat(" ", $n - $i - 1);
            echo str_repeat($dibujo, $n + 2 * $i) . "<br>";
            echo "</pre>"; 
        }
        for ($i = $n - 2; $i >= 0; $i--) {
            echo "<pre>"; 
            echo str_repeat(" ", $n - $i - 1);
            echo str_repeat($dibujo, $n + 2 * $i) . "<br>";
            echo "</pre>"; 
        }
    }
}
ej1();
