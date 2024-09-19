<html>
    <head>
        <title>Exercici 5</title>
    </head>
    <body>
        <h1>Exercici 5</h1>
        <p>Crea un array multidimensional que represente una 
            taula de multiplicar del 1 al 5 i imprimeix els 
            resultats en forma de taula.</p>
            <?php
            $tablas = [
                "uno" => 1, 
                "dos" => 2, 
                "tres" => 3, 
                "cuatro" => 4, 
                "cinco" => 5];

                foreach($tablas as $clave => $valor) {
                    echo "<b>Tabla del $clave <br></b>";
                    for($i = 0; $i < 11; $i++) {
                        echo $valor." x ".$i." = ".($valor * $i)."<br>";
                        
                }
                echo "<br>";
                }
                
            ?>
    </body>
</html>