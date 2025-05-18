<?php
namespace App;
// Establecer codificación UTF-8 para la salida y funciones internas
header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');

function analizarTexto($texto)
{
    $texto = asegurarUTF8($texto);
    $texto = limpiarTexto($texto);
    $palabras = separarPalabras($texto);
    $frecuencias = contarPalabras($palabras);
    ordenarPorFrecuencia($frecuencias);
    return $frecuencias;
}

function asegurarUTF8($texto)
{
    $encoding = mb_detect_encoding($texto, 'UTF-8, ISO-8859-1, ISO-8859-15', true);
    if ($encoding !== 'UTF-8') {
        $texto = mb_convert_encoding($texto, 'UTF-8', $encoding);
    }
    return $texto;
}

function limpiarTexto($texto)
{
    $texto = mb_strtolower($texto, 'UTF-8');
    $texto = eliminarTildes($texto); // <- Normaliza tildes
    $texto = preg_replace('/[^\p{L}\p{N}\s]/u', '', $texto); // Quita puntuación
    return $texto;
}

function eliminarTildes($texto)
{
    $originales = ['á','é','í','ó','ú','ü','ñ'];
    $reemplazos = ['a','e','i','o','u','u','ñ']; // se mantiene ñ
    return str_replace($originales, $reemplazos, $texto);
}

function separarPalabras($texto)
{
    return preg_split('/\s+/u', $texto);
}

function contarPalabras($palabras)
{
    $stopwords = file('stopwords.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    // Asegura UTF-8 y sin tildes para stopwords
    foreach ($stopwords as &$stopword) {
        $stopword = asegurarUTF8($stopword);
        $stopword = mb_strtolower($stopword, 'UTF-8');
        $stopword = eliminarTildes($stopword);
    }

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

function ordenarPorFrecuencia(&$frecuencias)
{
    arsort($frecuencias);
}

function mostrarResultado($resultado)
{
    if (empty($resultado)) {
        echo '<div class="alert alert-warning mt-4 text-center mx-auto" style="max-width: 600px;">
                No se encontraron palabras válidas en el texto.
              </div>';
        return;
    }

    echo '<div class="card shadow rounded-4 p-4 mx-auto mt-4" style="max-width: 600px;">';
    echo '<h4 class="text-center text-success mb-3">Resultados:</h4>';
    echo '<ul class="list-group">';
    foreach ($resultado as $palabra => $veces) {
        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                <span class='text-capitalize'>$palabra</span>
                <span class='badge bg-primary rounded-pill'>$veces</span>
              </li>";
    }
    echo '</ul>';
    echo '</div>';
}
?>
