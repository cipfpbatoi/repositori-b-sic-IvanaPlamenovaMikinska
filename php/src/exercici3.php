<html>
    <head>
        <title>Exercici 3</title>
    </head>
    <body>
        <h1>Exercici 3</h1>
        <p>Escriu una funció que prenga un array de números, 
            calculi la mitjana i retorni el resultat. Utilitza 
            aquesta funció per imprimir la mitjana d'un array de 
            cinc números.</p>
        <?php
        $arrayNumeros = [5,6,7,8,9];
        $sumaNumeros = 0;
        $contador = 0;

        echo "Numeros: ";
        foreach($arrayNumeros as $numeros) {
            echo $numeros , " ";
            $sumaNumeros += $numeros;
            $contador++;
        }
        $resultadoFinal = $sumaNumeros / $contador;
        echo "<br>La media es: " , $resultadoFinal;
        ?>
    </body>
</html>