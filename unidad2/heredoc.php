<html>
    <head>
        <title>Ejercicio 3</title>
    </head>
    <body>
        <?php
            echo "<p>Mañana aprenderé las <strong>variables globales de PHP.</strong></p>";
            echo "<p><em>Este es un comando incorrecto: del c:\*.*</em></p>";

            // Con sintaxis heredoc
            echo <<<EOT
            Mañana aprenderé las <strong>variables globales de PHP.</strong><br/>
            <em>Este es un comando incorrecto: del c:\*.*</em>
            EOT;
        ?>
    </body>
</html> 