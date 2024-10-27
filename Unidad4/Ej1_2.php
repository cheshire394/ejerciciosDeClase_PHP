<?php

$nombre = $_COOKIE['nombre']; 
echo "Bienvenida $nombre desde la cookie página dos<br>"; 

include_once("enlaces.php"); 


?>

<form method="post">
    <input type="submit" name="eliminar" value="Eliminar cookie"/>
</form>

<?php

    if(isset($_POST['eliminar'])){

       
        setcookie($_COOKIE['nombre'],"", time() - 1 ); 

        echo "La cookie  ha sido eliminada<br>"; 

    }





?>