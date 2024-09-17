<html>
    <head>
        <title>Exercici 2</title>
    </head>
    <body>
        <h1>Exercici 2</h1>
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