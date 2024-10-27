<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica_Ej3</title>
</head>
<body>

<?php
        $nav = $_SERVER['HTTP_USER_AGENT']; 
        $ip_c = $_SERVER['REMOTE_ADDR']; 
        $ip_server = $_SERVER['SERVER_ADDR']; 
        $nombreFich = basename($_SERVER["PHP_SELF"]); 
        $protocolo = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == 'on' ? 'https' : 'http'; 
        $host = $_SERVER["HTTP_HOST"]; 
        $path = $_SERVER["REQUEST_URI"]; 
        $dir= $_SERVER["DOCUMENT_ROOT"]; 
        $php = phpversion(); 

     
echo "
        <table border='1'>

       
                
                <tr><th></th><th>Datos del servidor</th></tr>
        
                <tr><td>Navegador</td>          <td> $nav</td></tr>  
                <tr><td>ip del cliente</td>     <td> $ip_c </td></tr> 
                <tr><td>ip del servidor</td>    <td> $ip_server </td></tr> 
                <tr><td>Nombre del fichero</td> <td> $nombreFich </td></tr> 
                <tr><td>protocolo</td>          <td> $protocolo </td></tr> 
                <tr><td>host</td>               <td> $host</td></tr> 
                <tr><td>directorio padre</td>   <td> $path</td></tr> 
                <tr><td>directorio Raiz</td>    <td> $dir</td></tr> 
                <tr><td>version php</td>        <td> $php </td></tr>  

          

        




    </table>
"; 

?>


<?php

    $division = 5/0; 
    $ultimo_err = error_get_last(); //devuelve un array....

    $msj_err = $ultimo_err['line']; 

    echo "El ultimo error registrado es ". $msj_err; 



?>


    
</body>
</html>