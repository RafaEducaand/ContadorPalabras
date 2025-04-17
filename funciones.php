<?php
function analizarTexto($texto)
{
    $texto = limpiarTexto($texto);
    $palabras = separarPalabras($texto);
    $frecuencias = contarPalabras($palabras);
    ordenarPorFrecuencia($frecuencias);
    return $frecuencias;
}
function limpiarTexto($texto)
{
    $texto = mb_strtolower($texto, 'UTF-8');
    $texto = preg_replace('/[^\p{L}\s]/u', '', $texto); // Quita puntuación
    return $texto;
}

?>