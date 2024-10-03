<?php

function inicializarGraella()
{
    $graella = array();
    for ($i = 0; $i < FILES; $i++) {
        for ($j = 0; $j < COLUMNES; $j++) {
            $graella[$i][$j] = 0;
        }
    }
    return $graella;
}

function pintarGraella($graella)
{
    $tabla = '<table>';
    foreach ($graella as $fila) {
        $tabla .= '<tr>';
        foreach ($fila as $celda) {
            if ($celda == 1) {
                $tabla .= '<td class="player1"></td>';
            } elseif ($celda == 2) {
                $tabla .= '<td class="player2"></td>';
            } else {
                $tabla .= '<td class="vacio"></td>';
            }
        }
        $tabla .= '</tr>';
    }
    $tabla .= '</table>';
    return $tabla;
}


function ferMoviment($graella, $columna, $jugadorActual)
{
    for ($filaActual = count($graella) - 1; $filaActual >= 0; $filaActual--) {
        if ($graella[$filaActual][$columna] == 0) {
            $graella[$filaActual][$columna] = $jugadorActual;
            return $graella;
        }
    }
    return $graella;
}
