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
