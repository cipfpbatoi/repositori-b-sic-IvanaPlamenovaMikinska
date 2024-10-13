<?php
function mostrarArray($array) {
    foreach ($array as $letra) {
        echo $letra . " ";
    }
}

function comprobarIntentos($palabra, $letra, &$arrayAdivinadas)
{
    $aciertos = false;
    for ($i = 0; $i < strlen($palabra); $i++) {
        if ($palabra[$i] === $letra) {
            $arrayAdivinadas[$i] = $palabra[$i];
            $aciertos = true;
        }
    }
    return $aciertos;
}

function inicializarArrayAdivinadas($palabra) {
    $arrayAdivinadas = array();
    for ($i = 0; $i < strlen($palabra); $i++) {
        $arrayAdivinadas[] = "_";
    }
    return $arrayAdivinadas;
}

function resetearJuego() {
    $_SESSION['palabra'] = "endoll";
    $_SESSION['arrayAdivinadas'] = inicializarArrayAdivinadas($_SESSION['palabra']);
    $_SESSION['intentosRestantes'] = 6;
}