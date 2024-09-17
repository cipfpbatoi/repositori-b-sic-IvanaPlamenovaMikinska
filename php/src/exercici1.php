<html>
    <head>
        <title>Exercici 1</title>
    </head>
    <body>
        <h1>Exercici 1</h1>
    <?php
    $a = 5;
    $b = 3;
        function suma($a, $b) {
            return $a + $b;
        }
        function resta($a, $b) {
            return $a - $b;
        }
        function multiplicacion($a, $b) {
            return $a * $b;
        }
        echo "Suma: $a + $b = ",suma($a, $b) . "<br>";
        echo "Resta: $a - $b = ",resta($a, $b) . "<br>";
        echo "Multi: $a x $b = ",multiplicacion($a, $b) . "<br>";
        ?>
    </body>
</html>