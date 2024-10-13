<?php
session_start();


if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

echo "[Sesion de: " . $_SESSION['user'] . "]";


include "funciones.php";

if (!isset($_SESSION['palabra']) || !isset($_SESSION['arrayAdivinadas']) || !isset($_SESSION['intentosRestantes'])) {
    resetearJuego();
}

$palabra = $_SESSION['palabra'];
$arrayAdivinadas = $_SESSION['arrayAdivinadas'];
$intentosRestantes = $_SESSION['intentosRestantes'];
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["letra"])) {
    $letra = $_POST["letra"];

    if (comprobarIntentos($palabra, $letra, $_SESSION['arrayAdivinadas'])) {
        $mensaje = "<span class='correct'>Letra correcta</span>";
    } else {
        $_SESSION['intentosRestantes']--;
        $mensaje = "<span class='incorrect'>Letra incorrecta</span>";
    }

    if ($_SESSION['intentosRestantes'] <= 0) {
        $mensaje = "<span class='incorrect'>Has perdido. La palabra era: " . $palabra . "</span>";
        resetearJuego();
    } elseif (!in_array("_", $_SESSION['arrayAdivinadas'])) {
        $mensaje = "<span class='correct'>¡Felicidades, has ganado!</span>";
        resetearJuego();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reiniciar"])) {
    resetearJuego();
    $_SESSION['palabra'] = "endoll";
    $_SESSION['arrayAdivinadas'] = inicializarArrayAdivinadas($_SESSION['palabra']);
    $_SESSION['intentosRestantes'] = 6;
    $mensaje = "<span class='correct'>El juego ha sido reiniciado.</span>";
}

?>

<html>

<head>
    <title>AHORCADO</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <h1>AHORCADO</h1>

    <p>Palabra:</p>
    <p><?php mostrarArray($_SESSION['arrayAdivinadas']); ?></p>
    <p>Intentos restantes: <?php echo $_SESSION['intentosRestantes']; ?></p>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="letra">Letra:</label>
        <input type="letra" id="letra" name="letra" maxlength="1" required>
        <input type="submit" value="Enviar">
    </form>

    <p><?php echo $mensaje; ?></p>

    <div class="button-container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="reiniciar" value="1">
            <input type="submit" value="Reiniciar juego">
        </form>

        <form method="post" action="../logout.php">
            <input type="submit" value="Cerrar sesión">
        </form>

        <form method="get" action="../seleccionarJuego.php">
            <input type="submit" value="Seleccionar juego">
        </form>
    </div>
</body>

</html>