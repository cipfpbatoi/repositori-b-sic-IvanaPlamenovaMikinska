<?php session_start();
const FILES = 6;
const COLUMNES = 7;



if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

echo "[Sesion de: " . $_SESSION['user'] . "]";


include "funciones.php";

if (!isset($_SESSION['graella']) || !isset($_SESSION['jugadorActual'])) {
    resetearJuego();
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reiniciar"])) {
    resetearJuego();
    $mensaje = "<span class='correct'>El juego ha sido reiniciado.</span>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['columna'])) {
    $columna = $_POST['columna'];
    $_SESSION['graella'] = ferMoviment($_SESSION['graella'], $columna, $_SESSION['jugadorActual']);

    if (
        haGanadoHorizontal($_SESSION['graella'], $_SESSION['jugadorActual']) ||
        haGanadoVertical($_SESSION['graella'], $_SESSION['jugadorActual']) ||
        haGanadoDiagonal($_SESSION['graella'], $_SESSION['jugadorActual'])
    ) {
        $mensaje = "<span class='correct'>¡El Jugador " . $_SESSION['jugadorActual'] . " ha ganado!</span>";
        resetearJuego();
    } elseif (estaCompleto($_SESSION['graella'])) {
        $mensaje = "<span class='correct'>¡Empate!</span>";
        resetearJuego();
    } else {
        $_SESSION['jugadorActual'] = $_SESSION['jugadorActual'] == 1 ? 2 : 1;
    }
}

?>
<html>

<head>
    <title>Cuatro En Ralla</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <h1>Cuatro En Ralla</h1>
    <form method="POST">
        <?php
        echo pintarGraella($_SESSION['graella']);
        ?>
        <div>
            <button type="submit" name="columna" value="0" class="column-button">1</button>
            <button type="submit" name="columna" value="1" class="column-button">2</button>
            <button type="submit" name="columna" value="2" class="column-button">3</button>
            <button type="submit" name="columna" value="3" class="column-button">4</button>
            <button type="submit" name="columna" value="4" class="column-button">5</button>
            <button type="submit" name="columna" value="5" class="column-button">6</button>
            <button type="submit" name="columna" value="6" class="column-button">7</button>
        </div>
        <?php
        echo "<h3>Turno del Jugador " . ($_SESSION['jugadorActual'] == 1 ? "1 (Rojo)" : "2 (Amarillo)") . "</h3>";
        ?>
        <p><?php echo $mensaje; ?></p>

        <div class="button-container">
            <form method="post">
                <button type="submit" name="reiniciar">Reiniciar Juego</button>
            </form>
            <form method="post" action="../logout.php">
                <input type="submit" value="Cerrar sesión">
            </form>
            <form method="get" action="../seleccionarJuego.php">
                <input type="submit" value="Seleccionar juego">
            </form>
        </div>
    </form>
</body>

</html>