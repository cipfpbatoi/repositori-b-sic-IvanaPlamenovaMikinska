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

function resetearJuego() {
    $_SESSION['graella'] = inicializarGraella();
    $_SESSION['jugadorActual'] = 1;
}

function haGanadoHorizontal($graella, $jugadorActual) {
    for ($fila = 0; $fila < FILES; $fila++) {
        for ($col = 0; $col <= COLUMNES - 4; $col++) {
            if ($graella[$fila][$col] == $jugadorActual && 
                $graella[$fila][$col + 1] == $jugadorActual &&
                $graella[$fila][$col + 2] == $jugadorActual &&
                $graella[$fila][$col + 3] == $jugadorActual) {
                return true;
            }
        }
    }
    return false;
}

function haGanadoVertical($graella, $jugadorActual) {
    for ($col = 0; $col < COLUMNES; $col++) {
        for ($fila = 0; $fila <= FILES - 4; $fila++) {
            if ($graella[$fila][$col] == $jugadorActual && 
                $graella[$fila + 1][$col] == $jugadorActual &&
                $graella[$fila + 2][$col] == $jugadorActual &&
                $graella[$fila + 3][$col] == $jugadorActual) {
                return true;
            }
        }
    }
    return false;
}

function haGanadoDiagonal($graella, $jugadorActual) {
    for ($fila = 0; $fila <= FILES - 4; $fila++) {
        for ($col = 0; $col <= COLUMNES - 4; $col++) {
            if ($graella[$fila][$col] == $jugadorActual && 
                $graella[$fila + 1][$col + 1] == $jugadorActual &&
                $graella[$fila + 2][$col + 2] == $jugadorActual &&
                $graella[$fila + 3][$col + 3] == $jugadorActual) {
                return true;
            }
        }
    }
    
    for ($fila = 3; $fila < FILES; $fila++) {
        for ($col = 0; $col <= COLUMNES - 4; $col++) {
            if ($graella[$fila][$col] == $jugadorActual && 
                $graella[$fila - 1][$col + 1] == $jugadorActual &&
                $graella[$fila - 2][$col + 2] == $jugadorActual &&
                $graella[$fila - 3][$col + 3] == $jugadorActual) {
                return true;
            }
        }
    }
    return false;
}

function estaCompleto($graella) {
    foreach($graella[0] as $celda) {
        if($celda == 0) {
            return false;
        }
    }
    return true;
}