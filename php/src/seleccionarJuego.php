<?php
session_start();

if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

?>

<html>
    <head>
        <title>Seleciona un Juego</title>
    </head>
    <body>
        <h1>Bienvenido, <?php echo $_SESSION['user']?>!</h1>
        <p>Elige un juego: </p>
        <ul>
            <li><a href="Ahorcado/ahorcado.php">Ahorcado</a></li>
            <li><a href="CuatroEnRalla/cuatroEnRalla.php">Cuatro en Ralla</a></li>
        </ul>
        <form method="post" action="logout.php">
            <input type="submit" value="Cerrar sesión">
        </form>
    </body>
</html>