<html>
    <head>
        <title>Exercici 4</title>
    </head>
    <body>
        <h1>Exercici 4</h1>
        <p>Escriu un script que prenga una cadena de text i 
            compti el nombre de vocals. Imprimeix el resultat.</p>
            <?php
            $cadena = "Hola como estas";
            $vocales = ["a", "e", "i", "o", "u"];
            $contador = 0;

            for ($i=0; $i < strlen($cadena); $i++) {

                foreach($vocales as $vocal) 
                    if ($cadena[$i] === $vocal) {
                        $contador++;
                    }
                }
                echo "<b> $cadena </b>";
                echo "<br>Hay $contador vocales";
            ?>
    </body>
</html>