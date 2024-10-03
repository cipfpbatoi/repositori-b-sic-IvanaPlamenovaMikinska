<html>

<head>
    <title>Cuatro En Ralla</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 10px dotted #fff;
            background-color: #000;
            display: inline-block;
            margin: 10px;
            color: white;
            font-size: 2rem;
            text-align: center;
            vertical-align: middle;
        }

        .player1 {
            background-color: red;
        }

        .player2 {
            background-color: yellow;
        }

        .vacio {
            background-color: white;
            border-color: #000;
        }
    </style>
</head>

<body>
    <h1>Cuatro En Ralla</h1>
    <?php
    const FILES = 6;
    const COLUMNES = 7;
    include "funciones.php";

    if (isset($_POST['graella']) && isset($_POST['jugadorActual'])) {
        $graella = unserialize($_POST['graella']);
        $jugadorActual = $_POST['jugadorActual'];
    } else {
        $graella = inicializarGraella();
        $jugadorActual = 1;
    }
    if (isset($_POST['columna'])) {
        $columna = $_POST['columna'];
        $graella = ferMoviment($graella, $columna, $jugadorActual);
        $jugadorActual = $jugadorActual == 1 ? 2 : 1;
    }
    echo pintarGraella($graella);

    echo "<h3>Turno del Jugador " . ($jugadorActual == 1 ? "1 (Rojo)" : "2 (Amarillo)") . "</h3>";

    ?>
    <form method="POST">
        <label for="columna">Elige una columna (1-7):</label>
        <select name="columna" id="columna">
            <option value="0">Columna 1</option>
            <option value="1">Columna 2</option>
            <option value="2">Columna 3</option>
            <option value="3">Columna 4</option>
            <option value="4">Columna 5</option>
            <option value="5">Columna 6</option>
            <option value="6">Columna 7</option>
        </select>
        <input type="hidden" name="graella" value="<?php echo htmlspecialchars(serialize($graella)); ?>">
        <input type="hidden" name="jugadorActual" value="<?php echo $jugadorActual; ?>">
        <button type="submit">Tirar</button>
    </form>
</body>

</html>