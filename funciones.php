<?php
function analizarTexto($texto)
{
    $texto = limpiarTexto($texto);
    $palabras = separarPalabras($texto);
    $frecuencias = contarPalabras($palabras);
    ordenarPorFrecuencia($frecuencias);
    return $frecuencias;
}


?>