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
function separarPalabras($texto)
{
    return preg_split('/\s+/', $texto);
}
function contarPalabras($palabras)
{
    $stopwords = file('stopwords.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $frecuencias = [];

    foreach ($palabras as $palabra) {
        $palabra = trim($palabra);
        if ($palabra === '' || in_array($palabra, $stopwords)) {
            continue;
        }

        if (!isset($frecuencias[$palabra])) {
            $frecuencias[$palabra] = 1;
        } else {
            $frecuencias[$palabra]++;
        }
    }

    return $frecuencias;
}
?>