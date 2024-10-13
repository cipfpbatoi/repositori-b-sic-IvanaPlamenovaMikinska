<html>
    <head>
        <title>Exercici 2</title>
    </head>
    <body>
        <h1>Exercici 2</h1>
        <p>Utilitza un bucle for per imprimir els números 
            parells del 0 al 20. Fes-ho també amb un bucle while.</p>
        <?php
        for($i = 0; $i < 21; $i++) {
            if($i % 2 == 0) {
                echo $i . "<br>";
            }
            
        }

        $i = 0;
        while($i < 21) {
            if($i % 2 == 0) {
                echo $i . "<br>";
            }
            $i++;
        }
        ?>
    </body>
</html>