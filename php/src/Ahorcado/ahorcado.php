<?php
include "funciones.php";

$palabra = "endoll";
$arrayAdivinadas = array();
for ( $i = 0; $i< strlen($palabra);$i++){
    $arrayAdivinadas[] = "_";
}
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $letra = $_POST["letra"];

    if (comprobarIntentos($palabra, $letra, $arrayAdivinadas)) {
        $mensaje = "<span class='correct'>Letra correcta</span>";
    } else {
        $mensaje = "<span class='incorrect'>Letra incorrecta</span>";
    }
}
?>

<html>

<head>
    <title>AHORCADO</title>
    <style>
        .correct {
            color: green;
        }

        .incorrect {
            color: red;
        }
    </style>
</head>

<body>
    <h1>AHORCADO</h1>

    <p>Palabra:</p>
    <p><?php mostrarArray($arrayAdivinadas); ?></p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="letra">Letra:</label>
        <input type="letra" id="letra" name="letra" maxlenght="1" required><br><br>
        <input type="submit" value="Enviar">
    </form>

    <p><?php echo $mensaje; ?></p>
</body>

</html>