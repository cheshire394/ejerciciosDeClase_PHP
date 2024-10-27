<form method="post">
    Numeero de alumnos <input type="number" name="numero"/>
    Modulo: <input type="text" name="modulo"/>
    <br><input type="submit" name="formulario1" value="Enviar"/>  
</form>

<?php

    $numeroAlumnos = 0;

    if(isset($_POST['formulario1'])){
        $numeroAlumnos = $_POST['numero'];
        $modulo = $_POST['modulo'];
        echo "<form method='post'>";
        for ($i=0; $i < $numeroAlumnos; $i++) { 
            echo "Nota alumno $i" . '<input type="number" name="notas[]"/><br>';
        }

        echo '<input type="hidden" name="modulo" value="'.$modulo.'"/>';
        echo '<br><input type="submit" name="formulario2" value="Enviar"/>';  

        echo '</form>';
    }

    if(isset($_POST['formulario2'])){
        $notas = $_POST['notas'];
        $modulo = $_POST['modulo'];

        echo "La media de $modulo es: " . array_sum($notas)/count($notas);
    }


?>